<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Pasien</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>

  <div class="container mt-5">
    <h2>Hasil Medical Check UP Program Hidup Sehat</h2>

    <div class="mb-3">
      <div class="btn-group">
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Pilih Paket
        </button>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="/mcu/basic/hasil-basic.php">Basic</a>
          <a class="dropdown-item" href="/mcu/standart/hasil-standart.php">Standard</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/mcu/preemployee/pria/hasil-preemployee-pria.php">Pre-Employee Pria</a>
          <a class="dropdown-item" href="/mcu/preemployee/wanita/hasil-preemployee-wanita.php">Pre-Employee Wanita</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/mcu/umroh/hasil-umroh.php">Umroh</a>
          <a class="dropdown-item" href="/mcu/hidup sehat/hasil-hidupsehat.php">Program Hidup Sehat</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/mcu/calonkaryawan/hasil-calon-karyawan.php">Calon Karyawan</a>
          <a class="dropdown-item" href="/mcu/kartap/hasil-karyawan-tetap.php">Karyawan Tetap</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/mcu/tambahan/hasil-tambahan.php">Tambahan</a>
          <a class="dropdown-item" href="/mcu/custom/hasil-custom.php">Custom</a>
          <a class="dropdown-item" href="/mcu/narkoba/hasil-narkoba.php">Tes Narkoba</a>
        </div>
      </div>
      <a href="/mcu/index.php" class="btn btn-primary ml-2">Home</a>
    </div>


    <!-- Form untuk pencarian -->
    <form method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="mb-3">
      <div class="form-row align-items-end">
        <div class="col-md-3 mb-2">
          <input type="text" name="search_nama" class="form-control" placeholder="Cari berdasarkan nama">
        </div>
        <div class="col-md-3 mb-2">
          <input type="text" name="search_rm" class="form-control" placeholder="Cari berdasarkan RM">
        </div>
        <div class="col-md-3 mb-2">
          <input type="date" name="search_tanggal" class="form-control" placeholder="Cari berdasarkan tanggal">
        </div>
        <div class="col-md-3 mb-2">
          <button type="submit" class="btn btn-primary">Cari</button>
        </div>
      </div>
    </form>


    <!-- Tabel data pasien -->
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Nama</th>
          <th>RM</th>
          <th>Tanggal Pemeriksaan</th>
          <th>Paket</th>
          <th> </th>
        </tr>
      </thead>
      <tbody>
        <?php
        // Include the database connection file
        include('koneksi.php');

        // Query pencarian
        $search_nama = isset($_GET['search_nama']) ? $_GET['search_nama'] : '';
        $search_rm = isset($_GET['search_rm']) ? $_GET['search_rm'] : '';
        $search_tanggal = isset($_GET['search_tanggal']) ? $_GET['search_tanggal'] : '';

        $sql = "SELECT * FROM hidup_sehat WHERE nama LIKE '%$search_nama%' AND rm LIKE '%$search_rm%'";

        // Jika ada tanggal yang dimasukkan, tambahkan kondisi pencarian berdasarkan tanggal ke kueri SQL
        if (!empty($search_tanggal)) {
          $sql .= " AND tanggal = '$search_tanggal'";
        }

        // Tambahkan ORDER BY untuk mengurutkan berdasarkan tanggal terbaru
        $sql .= " ORDER BY tanggal DESC";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          // Output data of each row
          while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["nama"] . "</td>";
            echo "<td>" . $row["rm"] . "</td>";
            echo "<td>" . $row["tanggal"] . "</td>";
            echo "<td>" . $row["paket"] . "</td>";
            echo "<td>";
            if (!empty($row["hemoglobin"])) {
              echo "<button class='btn btn-secondary mr-2 mb-2' disabled title='Hasil Lab sudah ada'>Hasil Lab</button>";
          } else {
              echo "<a href='lab.php?rm=" . $row["rm"] . "' class='btn btn-warning mr-2 mb-2'>Lab</a>";
          }
          if (!empty($row["hbsag"])) {
            echo "<button class='btn btn-secondary mr-2 mb-2' disabled title='Hasil Lab sudah ada'>Hasil Lab</button>";
        } else {
            echo "<a href='lab.php?rm=" . $row["rm"] . "' class='btn btn-warning mr-2 mb-2'>Lab</a>";
        }
          echo "<button class='btn btn-primary mr-2 mb-2' onclick='printData(\"" . $row["rm"] . "\")'>View</button>";
          
          
          }
        } else {
          echo "<tr><td colspan='5'>Tidak ada data ditemukan.</td></tr>";
        }
        $conn->close();
        ?>
      </tbody>
    </table>
  </div>

  <script>
    function printData(rm) {
      // You can implement your print logic here
      // For example, open a new window with printable content
      window.open('print.php?rm=' + rm, '_blank');
    }
  </script>

</body>

</html>