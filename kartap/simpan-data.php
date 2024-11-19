<?php
// Include the database connection file
include('koneksi.php');

// Check if the form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $nama = $_POST['nama'];
    $rm = $_POST['rm'];
    $tanggal = $_POST['tanggal'];
    $penjamin = $_POST['penjamin'];
    $asuransi = isset($_POST['asuransi']) ? $_POST['asuransi'] : '';
    $paket = $_POST['paket'];
    $usia = $_POST['usia'];
    $keluhan = nl2br($_POST['keluhan']);
    $riwayatdahulu = $_POST['riwayatdahulu'];
    $riwayatkeluarga = nl2br($_POST['riwayatkeluarga']);
    $merokok = $_POST['merokok'];
    $alkohol = $_POST['alkohol'];
    $obat = $_POST['obat'];
    $olahraga = $_POST['olahraga'];
    $riwayatalergi = $_POST['riwayatalergi'];
    $alergi = nl2br($_POST['alergi']);
    $perkusi_jantung = $_POST['perkusi'];
    $auskultasi_jantung = nl2br($_POST['jantung-auskultasi']);
    $perkusi_pulmo = $_POST['pulmo-perkusi'];
    $auskultasi_pulmo = nl2br($_POST['pulmo-auskultasi']);
    $inspeksi_abdomen = $_POST['inspeksi'];
    $palpalsi_abdomen = nl2br($_POST['palpalsi']);
    $auskultasi_abdomen = nl2br($_POST['auskultasi']);
    $ginjal = $_POST['ginjal'];
    $ekstremitas_atas = nl2br($_POST['ekstremitas-atas']);
    $ekstremitas_bawah = nl2br($_POST['ekstremitas-bawah']);
    $tumor = $_POST['tumor'];
    $kelainan_kulit = $_POST['kelainan-kulit'];
    $berat_badan = $_POST['berat_badan'];
    $tinggi_badan = $_POST['tinggi_badan'];
    $bmi = $_POST['bmi'];
    $bmi_status = $_POST['bmi_status'];
    $tensi = $_POST['tensi'];
    $nadi = $_POST['nadi'];
    $respirasi = $_POST['respirasi'];
    $suhu = $_POST['suhu'];
    $butawarna = $_POST['butawarna'];
    $konjunctiva = $_POST['konjunctiva'];
    $sclera = $_POST['sclera'];
    $palpebra = $_POST['palpebra'];
    $refleks_cahaya = $_POST['refleks_cahaya'];
    $od = nl2br($_POST['od']);
    $os = nl2br($_POST['os']);
    $catatan = $_POST['catatan'];
    $faring = $_POST['faring'];
    $tonsil = $_POST['tonsil'];
    $gigi = $_POST['gigi'];
    $kgb = $_POST['kgb'];
    $tyroid = $_POST['tyroid'];
    $tympani = $_POST['tympani'];
    $prope = $_POST['prope'];
    $infeksi = $_POST['infeksi'];
    // $hbsag = $_POST['$hbsag'];
    // $thorax = nl2br($_POST['thorax']);
    // $kesan = nl2br($_POST['kesan']);
    // $anjuran = nl2br($_POST['anjuran']);


    $sql = "INSERT INTO kartap   (nama, rm, tanggal, penjamin, asuransi, paket, usia,
                                keluhan, riwayatdahulu, riwayatkeluarga, merokok, alkohol, obat, olahraga, riwayatalergi, alergi,
                                perkusi_jantung, auskultasi_jantung, perkusi_pulmo, auskultasi_pulmo, inspeksi_abdomen, palpalsi_abdomen, auskultasi_abdomen, ginjal, ekstremitas_atas, ekstremitas_bawah, tumor, kelainan_kulit,
                                berat_badan, tinggi_badan, bmi, bmi_status, tensi, nadi, respirasi, suhu, butawarna, konjunctiva, sclera, palpebra, refleks_cahaya, od, os, catatan, faring, tonsil, gigi, kgb, tyroid, tympani, prope, infeksi)
            VALUES ('$nama', '$rm', '$tanggal', '$penjamin', '$asuransi', '$paket', '$usia',
                    '$keluhan', '$riwayatdahulu', '$riwayatkeluarga', '$merokok', '$alkohol', '$obat', '$olahraga', '$riwayatalergi', '$alergi',
                    '$perkusi_jantung', '$auskultasi_jantung', '$perkusi_pulmo', '$auskultasi_pulmo', '$inspeksi_abdomen', '$palpalsi_abdomen', '$auskultasi_abdomen', '$ginjal', '$ekstremitas_atas', '$ekstremitas_bawah', '$tumor', '$kelainan_kulit',
                    '$berat_badan', '$tinggi_badan', '$bmi', '$bmi_status', '$tensi', '$nadi', '$respirasi', '$suhu', '$butawarna', '$konjunctiva', '$sclera', '$palpebra', '$refleks_cahaya', '$od', '$os', '$catatan', '$faring', '$tonsil', '$gigi', '$kgb', '$tyroid', '$tympani', '$prope', '$infeksi')";

    if ($conn->query($sql) === TRUE) {
        // Close the database connection
        $conn->close();

        // Redirect to anamnesa.html
        header("Location: /mcu/kartap/hasil-karyawan-tetap.php ");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    // If the form data is not submitted through POST method, redirect to the form page
    header("Location: your_form_page.php");
    exit();
}
