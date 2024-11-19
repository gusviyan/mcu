<?php
// Include the database connection file
include('koneksi.php');

// Check if the form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $nama = $_POST['nama'];
    $rm = $_POST['rm'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin']; // Corrected here
    $tanggal = $_POST['tanggal'];
    $penjamin = $_POST['penjamin'];
    $asuransi = isset($_POST['asuransi']) ? $_POST['asuransi'] : '';
    $paket = $_POST['paket'];
    $usia_tahun = $_POST['usia_tahun'];
    $usia_bulan = $_POST['usia_bulan'];
    $amfetamin = $_POST['amfetamin'];
    $metamfetamin = $_POST['metamfetamin'];
    $thc = $_POST['thc'];
    $morfin = $_POST['morfin'];
    $kokain = $_POST['kokain'];
    $benzodiazepin = $_POST['benzodiazepin'];



    $sql = "INSERT INTO narkoba   (nama, rm, tgl_lahir, jenis_kelamin, tanggal, penjamin, asuransi, paket, usia_tahun, usia_bulan,
                                amfetamin, metamfetamin, thc, morfin, kokain, benzodiazepin)
            VALUES ('$nama', '$rm', '$tgl_lahir', '$jenis_kelamin', '$tanggal', '$penjamin', '$asuransi', '$paket', '$usia_tahun', '$usia_bulan',
                    '$amfetamin', '$metamfetamin', '$thc', '$morfin', '$kokain', '$benzodiazepin')";

    if ($conn->query($sql) === TRUE) {
        // Close the database connection
        $conn->close();

        // Redirect to anamnesa.html
        header("Location: /mcu/narkoba/hasil-narkoba.php ");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    // If the form data is not submitted through POST method, redirect to the form page
    header("Location: your_form_page.php");
    exit();
}
