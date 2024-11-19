<?php
// Start session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // If not, redirect to the login page
    header("Location: login.php");
    exit();
}

// Include the database connection file
include 'koneksi.php';

// Function to get record count from a table
function getTableCount($conn, $table)
{
    $sql = "SELECT COUNT(*) as count FROM $table";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['count'];
    } else {
        // Handle query error
        return 0; // Return 0 on error for simplicity
    }
}

// Get counts for each table
$basicCount = getTableCount($conn, 'basic');
$standartCount = getTableCount($conn, 'standart');
$preemployeePriaCount = getTableCount($conn, 'preemployee_pria');
$preemployeeWanitaCount = getTableCount($conn, 'preemployee_wanita');
$umrohCount = getTableCount($conn, 'umroh');
$hidupSehatCount = getTableCount($conn, 'hidup_sehat');
$calonKaryawanCount = getTableCount($conn, 'calon_karyawan');
$kartapCount = getTableCount($conn, 'kartap');
$tambahanCount = getTableCount($conn, 'tambahan');
$customCount = getTableCount($conn, 'custom');

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MCU RS Perpam</title>
    <link rel="stylesheet" href="style_index.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Include Chart.js -->
    <style>
        body {
            background-color: white;
            /* Non-transparent background */
        }

        .chart-container {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 80vw;
            /* Half the width of the screen */
            height: 80vh;
            /* One-third the height of the screen */
            background-color: 'rgba(75, 192, 192, 0.1)', ;
        }

        canvas {
            width: 100% !important;
            height: 100% !important;
        }
    </style>
</head>

<body>
    <img src="logors.png" alt="Logo" class="logo">

    <div class="navbar">
        <a class="active" href="basic/hasil-basic.php">Hasil MCU</a>
        <a href="./basic/index.php">MCU Basic</a>
        <a href="./standart/index.php">MCU Standar</a>
        <div class="dropdown">
            <a href="index.html" class="dropbtn">Pre Employee</a>
            <div class="dropdown-content">
                <a href="./preemployee/pria/index.php">Pria</a>
                <a href="./preemployee/wanita/index.php">Wanita</a>
                <!-- Add more submenu items as needed -->
            </div>
        </div>
        <a href="./umroh/index.php">MCU Umroh </a>
        <a href="./hidup sehat/index.php">Program Hidup Sehat</a>
        <a href="./calonkaryawan/index.php">Calon Karyawan</a>
        <a href="./kartap/index.php">Karyawan Tetap</a>
        <a href="./tambahan/index.php">Tambahan</a>
        <a href="./custom/index.php">Custom</a>
        <a href="./narkoba/index.php">Tes Narkoba</a>
        <a href="logout.php">Logout</a>
    </div>
    <h2 class="welcome-text">Selamat datang, <?php echo $_SESSION['username']; ?>!</h2>

    <div id="current-time"></div>

    <!-- Chart container -->
    <div class="chart-container">
        <canvas id="myChart"></canvas>
    </div>

    <script>
        // Function to get the current time
        function getCurrentTime() {
            var now = new Date();
            var day = now.toLocaleDateString('en-US', {
                weekday: 'long'
            });
            var date = now.toLocaleDateString('en-US', {
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            });
            var time = now.toLocaleTimeString('en-US', {
                hour: 'numeric',
                minute: 'numeric',
                second: 'numeric',
                hour12: false
            });
            return day + ', ' + date + ' ' + time;
        }

        // Update time every second
        function updateTime() {
            var currentTimeElement = document.getElementById('current-time');
            if (currentTimeElement) {
                currentTimeElement.innerHTML = getCurrentTime();
            }
        }

        // Call updateTime every second
        setInterval(updateTime, 1000);

        // Chart.js script
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                    'MCU Basic',
                    'MCU Standar',
                    'Preemployee\nPria',
                    'Preemployee\nWanita',
                    'MCU Umroh',
                    'Program\nHidup Sehat',
                    'Calon\nKaryawan',
                    'Karyawan\nTetap',
                    'Tambahan',
                    'Custom'
                ],
                datasets: [{
                    label: 'Jumlah Pasien',
                    data: [
                        <?php echo $basicCount; ?>,
                        <?php echo $standartCount; ?>,
                        <?php echo $preemployeePriaCount; ?>,
                        <?php echo $preemployeeWanitaCount; ?>,
                        <?php echo $umrohCount; ?>,
                        <?php echo $hidupSehatCount; ?>,
                        <?php echo $calonKaryawanCount; ?>,
                        <?php echo $kartapCount; ?>,
                        <?php echo $tambahanCount; ?>,
                        <?php echo $customCount; ?>
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)', // Color for basicCount
                        'rgba(54, 162, 235, 0.2)', // Color for standartCount
                        'rgba(255, 206, 86, 0.2)', // Color for preemployeePriaCount
                        'rgba(75, 192, 192, 0.2)', // Color for preemployeeWanitaCount
                        'rgba(153, 102, 255, 0.2)', // Color for umrohCount
                        'rgba(255, 159, 64, 0.2)', // Color for hidupSehatCount
                        'rgba(99, 255, 132, 0.2)', // Color for calonKaryawanCount
                        'rgba(235, 54, 162, 0.2)', // Color for kartapCount
                        'rgba(206, 86, 255, 0.2)', // Color for tambahanCount
                        'rgba(192, 75, 192, 0.2)' // Color for customCount
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(99, 255, 132, 1)',
                        'rgba(235, 54, 162, 1)',
                        'rgba(206, 86, 255, 1)',
                        'rgba(192, 75, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>

</html>