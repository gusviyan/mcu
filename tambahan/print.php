<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    header {
      text-align: left;
      margin-bottom: 20px;
      margin-left: 40px;
    }

    .company-logo {
      display: inline-block;
      width: 50px;
      /* Sesuaikan lebar logo */
      vertical-align: middle;
    }

    .company-info {
      display: inline-block;
      vertical-align: middle;
      margin-left: 14px;
      font-size: 12px;
      text-align: left;
    }

    .company-info h3 {
      margin: 0;
      font-size: 14px;
    }

    .company-address {
      margin-top: 10px;
    }

    .result {
      border: 0px solid #ddd;
      /* Gaya border */
      padding: 10px;
      text-align: left;
      margin: 0 auto;
      /* Untuk menempatkan di tengah */
      max-width: 1000px;
      /* Sesuaikan lebar maksimum */
      font-size: 12px;
      line-height: 3px;
    }

    .result1 {
      border: 2px solid #000;
      /* Gaya border */
      padding: 10px;
      text-align: left;
      margin: 0 auto;
      /* Untuk menempatkan di tengah */
      max-width: 1000px;
      /* Sesuaikan lebar maksimum */
      font-size: 12px;
      line-height: 3px;
    }

    .title-container {
      text-align: center;
      margin-bottom: 20px;
      border: 0px solid #000;
      max-width: auto;
      position: center;
    }

    .print-btn {
      position: fixed;
      bottom: 20px;
      right: 20px;
      z-index: 999;
    }

    @media print {
      .print-btn {
        display: none;
      }
    }

    .footer {
      font-size: 18px;
      font-weight: bold;
      text-decoration: underline;
      text-align: left;
      margin-left: 40px;
      /* margin-left: 400px; */
    }

    .footer img {
    width: 25%; /* Sesuaikan sesuai kebutuhan */
    height: 25%; /* Sesuaikan sesuai kebutuhan */
    }

    .footer2 {
      font-size: 16px;
      text-align: left;
      margin-left: 100px;
      /* margin-left: 420px */

    }
  </style>
</head>

<body>

  <header>
    <img src="/mcu/logo.png" alt="Company Logo" class="company-logo">
    <div class="company-info">
      <h3>Rumah Sakit Permata Pamulang</h3>
      <p>Jl Siliwangi No 1A, Pamulang, Tangerang Selatan 15416<br>Telp. 021-74709079, 021-74704999 (hunting) ; Fax. 021-74709073</p>
    </div>
  </header>

  <div class="container mt 1">
    <div class="title-container">
      <h3>KESIMPULAN <br> HASIL MEDICAL CHECKUP</h3>
    </div>
    <div class="result1">
      <table class="table">
        <tbody>
          <?php
          // Include the database connection file
          include('koneksi.php');
          include_once(__DIR__ . '/../function/value.php');

          // Get the name parameter from the URL
          $rm = isset($_GET['rm']) ? $_GET['rm'] : '';

          // Retrieve data from the table based on the provided name
          $sql = "SELECT * FROM tambahan WHERE rm = '$rm'";;
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
              echo "<tr><td><strong>Nama :</strong></td><td>" . $row["nama"] . "</td></tr>";
              echo "<tr><td><strong>No RM :</strong></td><td>" . $row["rm"] . "</td></tr>";
              echo "<tr><td><strong>Tanggal Lahir :</strong></td><td>" . $row["tgl_lahir"] . "</td></tr>";
              echo "<tr><td><strong>Jenis Kelamin :</strong></td><td>" . $row["jenis_kelamin"] . "</td></tr>";
              echo "<tr><td><strong>Tanggal pemeriksaan :</strong></td><td>" . $row["tanggal"] . "</td></tr>";
              echo "<tr><td><strong>Penjamin :</strong></td><td>" . $row["penjamin"] . "</td></tr>";
              if (!empty($row["asuransi"])) {
                echo "<tr><td><strong>Asuransi :</strong></td><td>" . $row["asuransi"] . "</td></tr>";
              }
              echo "<tr><td><strong>Paket :</strong></td><td>" . $row["paket"] . "</td></tr>";
              echo "<tr><td><strong>Usia :</strong></td><td>" . $row["usia_tahun"] . " Tahun " . $row["usia_bulan"] . " Bulan</td></tr>";
            }
          } else {
            echo "<tr><td colspan='2'>Tidak ada data ditemukan.</td></tr>";
          }
          $conn->close();
          ?>
        </tbody>
      </table>
    </div>
  </div>

  <div class="result">
    <table class="table">
      <tbody>
        <?php
        // Include the database connection file
        include('koneksi.php');
        include_once(__DIR__ . '/../function/value.php');

        // Get the name parameter from the URL
        $rm = isset($_GET['rm']) ? $_GET['rm'] : '';

        // Retrieve data from the table based on the provided name
        $sql = "SELECT * FROM tambahan WHERE rm = '$rm'";;
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          // Output data of each row
          while ($row = $result->fetch_assoc()) {
            $hemoglobin_status = getHemoglobinStatus($row["hemoglobin"], $row["jenis_kelamin"]);
            $hematokrit_status = getHematokritStatus($row["hematokrit"], $row["jenis_kelamin"]);
            $trombosit_status = getTrombositStatus($row["trombosit"]);
            $leukosit_status = getLeukositStatus($row["leukosit"]);
            $led_status = getLedStatus($row["led"], $row["jenis_kelamin"]);
            $eritrosit_status = geteritrositStatus($row["eritrosit"], $row["jenis_kelamin"]);
            $mcv_status = getMCVStatus($row["mcv"]);
            $mch_status = getMCHStatus($row["mch"]);
            $sgot_status = getSGOTStatus($row["sgot"], $row["jenis_kelamin"]);
            $sgpt_status = getSGPTStatus($row["sgpt"], $row["jenis_kelamin"]);
            $kolesterol_status = getKolesterolStatus($row["kolesterol"]);
            $hdl_status = getHDLStatus($row["hdl"], $row["jenis_kelamin"]);
            $ldl_status = getLDLStatus($row["ldl"]);
            $tg_status = gettgStatus($row["tg"]);
            $asamurat_status = getAsamuratStatus($row["asam_urat"], $row["jenis_kelamin"]);
            $ureum_status = getUreumStatus($row["ureum"], $row["jenis_kelamin"]);
            $creatin_status = getCreatinStatus($row["creatin"], $row["jenis_kelamin"]);
            $glucosapuasa_status = getGlucosapuasaStatus($row["glucosa_puasa"], $row["jenis_kelamin"]);
            $glucosapp_status = getGlucosappStatus($row["glucosa_pp"], $row["jenis_kelamin"]);


            //anamnesa
            echo "<tr><td colspan='2'><strong style='font-size: 16px;'>ANAMNESA</strong></td></tr>";
            if (!empty($row["keluhan"])) {
              echo "<tr>
               <td style='font-size: 12px; font-weight: bold;'>Keluhan :</td>
                     <td style='font-size: 12px; font-family: Arial, sans-serif; line-height: 1; padding: 1; border: 1; margin: 0; white-space: pre-wrap;'>" . nl2br($row["keluhan"]) . "</td>
                   </tr>";
            }
            if (!empty($row["riwayatdahulu"])) {
              echo "<tr><td><strong>Riwayat Penyakit Dahulu :</strong></td><td>" . $row["riwayatdahulu"] . "</td></tr>";
            }
            if (!empty($row["riwayatkeluarga"])) {
              echo "<tr>
               <td style='font-size: 12px; font-weight: bold;'>Riwayat Penyakit Keluarga :</td>
                     <td style='font-size: 12px; font-family: Arial, sans-serif; line-height: 1; padding: 1; border: 1; margin: 0; white-space: pre-wrap;'>" . nl2br($row["riwayatkeluarga"]) . "</td>
                   </tr>";
            }

            if (!empty($row["merokok"])) {
              echo "<tr><td><strong>Riwayat Kebiasaan :</strong></td><td>";
            }
            if (!empty($row["merokok"])) {
              echo "<tr><td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<strong>Merokok :</strong></td><td>"  . $row["merokok"] . "</td></tr>";
            }
            if (!empty($row["olahraga"])) {
              echo "<tr><td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<strong>Olahraga :</strong></td><td>"  . $row["olahraga"] . "</td></tr>";
            }
            if (!empty($row["j_olahraga"])) {
              echo "<tr><td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<strong>Jenis Olahraga :</strong></td><td>"  . $row["j_olahraga"] . "</td></tr>";
            }
            if (!empty($row["alkohol"])) {
              echo "<tr><td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<strong>Alkohol :</strong></td><td>"  . $row["alkohol"] . "</td></tr>";
            }
            if (!empty($row["obat"])) {
              echo "<tr><td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<strong>Obat-obatan :</strong></td><td>"  . $row["obat"] . "</td></tr>";
            }
            if (!empty($row["alergi"])) {
              echo "<tr>
               <td style='font-size: 12px; font-weight: bold;'>Alergi :</td>
                     <td style='font-size: 12px; font-family: Arial, sans-serif; line-height: 1; padding: 1; border: 1; margin: 0; white-space: pre-wrap;'>" . nl2br($row["alergi"]) . "</td>
                   </tr>";
            }

            //Pemeriksaan Fisiks
            if (!empty($row["berat_badan"])) {
              echo "<tr><td><strong>Antropometri</strong></td><td>";
            }
            if (!empty($row["berat_badan"])) {
              echo "<tr><td>&emsp;&emsp;<strong>Berat Badan :</strong></td><td>"  . $row["berat_badan"] . " Kg</td></tr>";
            }
            if (!empty($row["tinggi_badan"])) {
              echo "<tr><td>&emsp;&emsp;<strong>Tinggi Badan :</strong></td><td>"  . $row["tinggi_badan"] . " cm</td></tr>";
            }
            echo "<tr><td>&emsp;&emsp;<strong>BMI :</strong></td><td>"  . $row["bmi_status"] . " </td></tr>";

            if (!empty($row["tensi"])) {
              echo "<tr><td><strong>Tanda-tanda vital</strong></td><td>";
            }
            if (!empty($row["tensi"])) {
              echo "<tr><td>&emsp;&emsp;<strong>Tensi :</strong></td><td>"  . $row["tensi"] . " mmHg</td></tr>";
            }
            if (!empty($row["nadi"])) {
              echo "<tr><td>&emsp;&emsp;<strong>Nadi :</strong></td><td>"  . $row["nadi"] . " x/menit</td></tr>";
            }
            if (!empty($row["respirasi"])) {
              echo "<tr><td>&emsp;&emsp;<strong>Respirasi :</strong></td><td>"  . $row["respirasi"] . " x/menit</td></tr>";
            }
            if (!empty($row["suhu"])) {
              echo "<tr><td>&emsp;&emsp;<strong>Suhu :</strong></td><td>"  . $row["suhu"] . " &deg C</td></tr>";
            }

            //Mata
            if (!empty($row["butawarna"])) {
              echo "<tr><td colspan='2'><strong style='font-size: 16px;'>MATA</strong></td></tr>";
            }
            if (!empty($row["butawarna"])) {
              echo "<tr><td>&emsp;&emsp;<strong>Buta Warna :</strong></td><td>"  . $row["butawarna"] . "</td></tr>";
            }
            if (!empty($row["konjunctiva"])) {
              echo "<tr><td>&emsp;&emsp;<strong>Konjunctiva :</strong></td><td>"  . $row["konjunctiva"] . " </td></tr>";
            }
            if (!empty($row["sclera"])) {
              echo "<tr><td>&emsp;&emsp;<strong>Sclera :</strong></td><td>"  . $row["sclera"] . " </td></tr>";
            }
            if (!empty($row["palpebra"])) {
              echo "<tr><td>&emsp;&emsp;<strong>Palpebra :</strong></td><td>"  . $row["palpebra"] . " </td></tr>";
            }
            if (!empty($row["refleks_cahaya"])) {
              echo "<tr><td>&emsp;&emsp;<strong>Refleks Cahaya :</strong></td><td>"  . $row["refleks_cahaya"] . " </td></tr>";
            }
            if (!empty($row["od"])) {
              echo "<tr><td>&emsp;&emsp;<strong>Visus :</strong></td><td>";
            }
            if (!empty($row["od"])) {
              echo "<tr>
               <td style='font-size: 14px; font-weight: bold;'>OD:</td>
                     <td style='font-size: 12px; font-family: Arial, sans-serif; line-height: 1; padding: 1; border: 1; margin: 0; white-space: pre-wrap;'>" . nl2br($row["od"]) . "</td>
                   </tr>";
            }
            if (!empty($row["os"])) {
              echo "<tr>
               <td style='font-size: 14px; font-weight: bold;'>OS:</td>
                     <td style='font-size: 12px; font-family: Arial, sans-serif; line-height: 1; padding: 1; border: 1; margin: 0; white-space: pre-wrap;'>" . nl2br($row["os"]) . "</td>
                   </tr>";
            }
            if (!empty($row["catatan"])) {
              echo "<tr><td>&emsp;&emsp;;<strong>Catatan :</strong></td><td>"  . $row["catatan"] . "</td></tr>";
            }

            //Mulut
            if (!empty($row["faring"])) {
              echo "<tr><td colspan='2'><strong style='font-size: 16px;'>MULUT</strong></td></tr>";
            }
            if (!empty($row["faring"])) {
              echo "<tr><td>&emsp;&emsp;<strong>Faring :</strong></td><td>"  . $row["faring"] . "</td></tr>";
            }
            if (!empty($row["tonsil"])) {
              echo "<tr><td>&emsp;&emsp;<strong>Tonsil :</strong></td><td>"  . $row["tonsil"] . "</td></tr>";
            }
            if (!empty($row["gigi"])) {
              echo "<tr><td>&emsp;&emsp;<strong>Gigi :</strong></td><td>"  . $row["gigi"] . " </td></tr>";

              //Leher
              if (!empty($row["kgb"])) {
                echo "<tr><td colspan='2'><strong style='font-size: 16px;'>LEHER</strong></td></tr>";
              }
              if (!empty($row["kgb"])) {
                echo "<tr><td>&emsp;&emsp;<strong>Pembesaran KGB :</strong></td><td>"  . $row["kgb"] . "</td></tr>";
              }
              if (!empty($row["tyroid"])) {
                echo "<tr><td>&emsp;&emsp;<strong>Pembesaran Tyroid :</strong></td><td>"  . $row["tyroid"] . "</td></tr>";
              }

              //Telinga
              if (!empty($row["tympani"])) {
                echo "<tr><td colspan='2'><strong style='font-size: 16px;'>TELINGA</strong></td></tr>";
              }
              if (!empty($row["tympani"])) {
                echo "<tr><td>&emsp;&emsp;<strong>Membran Tympani :</strong></td><td>"  . $row["tympani"] . "</td></tr>";
              }
              if (!empty($row["prope"])) {
                echo "<tr><td>&emsp;&emsp;<strong>Serumen Prope :</strong></td><td>"  . $row["prope"] . "</td></tr>";
              }
              if (!empty($row["infeksi"])) {
                echo "<tr><td>&emsp;&emsp;<strong>Infeksi :</strong></td><td>"  . $row["infeksi"] . "</td></tr>";
              }

              //Costovertebra
              if (!empty($row["perkusi_jantung"])) {
                echo "<tr><td colspan='2'><strong style='font-size: 16px;'>COSTROVERTEBRA</strong></td></tr>";
                echo "<tr><td colspan='2'><strong style='font-size: 14px;'>Jantung</strong></td></tr>";
              }
              if (!empty($row["perkusi_jantung"])) {
                echo "<tr><td>&emsp;&emsp;<strong>Perkusi :</strong></td><td>"  . $row["perkusi_jantung"] . "</td></tr>";
              }
              if (!empty($row["auskultasi_jantung"])) {
                echo "<tr>
               <td style='font-size: 12px; font-weight: bold;'>&emsp;&emsp;Auskultasi:</td>
                     <td style='font-size: 12px; font-family: Arial, sans-serif; line-height: 1; padding: 1; border: 1; margin: 0; white-space: pre-wrap;'>" . nl2br($row["auskultasi_jantung"]) . "</td>
                   </tr>";
              }

              if (!empty($row["perkusi"])) {
                echo "<tr><td colspan='2'><strong style='font-size: 14px;'>PULMO</strong></td></tr>";
              }
              if (!empty($row["perkusi"])) {
                echo "<tr><td>&emsp;&emsp;<strong>Perkusi :</strong></td><td>"  . $row["perkusi_pulmo"] . "</td></tr>";
              }
              if (!empty($row["auskultasi_pulmo"])) {
                echo "<tr>
               <td style='font-size: 12px; font-weight: bold;'>&emsp;&emsp;Auskultasi:</td>
                     <td style='font-size: 12px; font-family: Arial, sans-serif; line-height: 1; padding: 1; border: 1; margin: 0; white-space: pre-wrap;'>" . nl2br($row["auskultasi_pulmo"]) . "</td>
                   </tr>";
              }

              //Abdomen
              if (!empty($row["perkusi_jantung"])) {
                echo "<tr><td colspan='2'><strong style='font-size: 16px;'>ABDOMEN</strong></td></tr>";
              }
              if (!empty($row["perkusi_jantung"])) {
                echo "<tr><td>&emsp;&emsp;<strong>Inspeksi :</strong></td><td>"  . $row["inspeksi_abdomen"] . "</td></tr>";
              }
              if (!empty($row["auskultasi_jantung"])) {
                           echo "<tr>
               <td style='font-size: 12px; font-weight: bold;'>&emsp;&emsp;Palpalsi:</td>
                     <td style='font-size: 12px; font-family: Arial, sans-serif; line-height: 1; padding: 1; border: 1; margin: 0; white-space: pre-wrap;'>" . nl2br($row["palpalsi_abdomen"]) . "</td>
                   </tr>";
              }
              if (!empty($row["auskultasi_abdomen"])) {
                echo "<tr>
               <td style='font-size: 12px; font-weight: bold;'>&emsp;&emsp;Auskultasi:</td>
                     <td style='font-size: 12px; font-family: Arial, sans-serif; line-height: 1; padding: 1; border: 1; margin: 0; white-space: pre-wrap;'>" . nl2br($row["auskultasi_abdomen"]) . "</td>
                   </tr>";
              }
              if (!empty($row["ginjal"])) {
                echo "<tr><td>&emsp;&emsp;<strong>Ginjal :</strong></td><td>"  . $row["ginjal"] . "</td></tr>";
              }

              //Ekstremitas Atas
              if (!empty($row["ektremitas_atas"])) {
                echo "<tr>
               <td style='font-size: 14px; font-weight: bold;'>Ekstremitas Atas:</td>
                     <td style='font-size: 12px; font-family: Arial, sans-serif; line-height: 1; padding: 1; border: 1; margin: 0; white-space: pre-wrap;'>" . nl2br($row["ekstremitas_atas"]) . "</td>
                   </tr>";
              }

              if (!empty($row["ekstremitas_bawah"])) {
                echo "<tr>
               <td style='font-size: 14px; font-weight: bold;'>Ekstremitas Bawah:</td>
                     <td style='font-size: 12px; font-family: Arial, sans-serif; line-height: 1; padding: 1; border: 1; margin: 0; white-space: pre-wrap;'>" . nl2br($row["ekstremitas_bawah"]) . "</td>
                   </tr>";
              }

              //Kulit
              if (!empty($row["tumor"])) {
                echo "<tr><td colspan='2'><strong style='font-size: 16px;'>KULIT</strong></td></tr>";
              }
              if (!empty($row["tumor"])) {
                echo "<tr><td>&emsp;&emsp;<strong>Tumor :</strong></td><td>"  . $row["tumor"] . "</td></tr>";
              }
              if (!empty($row["kelainan_kulit"])) {
                echo "<tr><td>&emsp;&emsp;<strong>Kelainan Kulit :</strong></td><td>"  . $row["kelainan_kulit"] . "</td></tr>";
              }

              //Laboratorium
              if (!empty($row["hemoglobin"])) {
                echo "<tr><td colspan='2'><strong style='font-size: 16px;'>LABORATORIUM</strong></td></tr>";
              }

              echo "<tr><td>&emsp;&emsp;<strong>a. Darah Lengkap :</strong></td><td>";
              if (!empty($row["hemoglobin"])) {
                echo "<tr><td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<strong>Hemoglobin :</strong></td><td>"  . $row["hemoglobin"] . " g/dl <strong>" . $hemoglobin_status . "</strong><br><br><br><br><br><small>(Nilai Normal Pria: 13.2 - 11.75 g/dL)<br><br><br><br>(Nilai Normal Wanita: 12 - 16 g/dL)</small></td></tr>";
              }
              if (!empty($row["hematokrit"])) {
                echo "<tr><td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<strong>Hematokrit :</strong></td><td>"  . $row["hematokrit"] . " % <strong>" . $hematokrit_status . "</strong><br><br><br><br><br><small>(Nilai Normal Pria: 40 - 52 %)<br><br><br><br>(Nilai Normal Wanita: 35 - 47 %)</small></td></tr>";
              }
              if (!empty($row["trombosit"])) {
                echo "<tr><td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<strong>Trombosit :</strong></td><td>"  . $row["trombosit"] . " x 10³ μL <strong>" . $trombosit_status . "</strong><br><br><br><br><br><small>(Nilai Normal : 150 - 400 10³  μL)</small></td></tr>";
              }
              if (!empty($row["leukosit"])) {
                echo "<tr><td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<strong>Leukosit :</strong></td><td>"  . $row["leukosit"] . " x 10³ μL <strong>" . $leukosit_status . "</strong><br><br><br><br><br><small>(Nilai Normal : 5 - 10 10³  μL)</small></td></tr>";
              }
              if (!empty($row["led"])) {
                echo "<tr><td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<strong>LED :</strong></td><td>"  . $row["led"] . " mm/jam <strong>" . $led_status . "</strong><br><br><br><br><br><small>(Nilai Normal Pria: 0 - 10 mm/jam)<br><br><br><br>(Nilai Normal Wanita: 0 - 20 mm/jam)</small></td></tr>";
              }
              if (!empty($row["eritrosit"])) {
                echo "<tr><td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<strong>Eritrosit :</strong></td><td>"  . $row["eritrosit"] . " x 10³ μL <strong>" . $eritrosit_status . "</strong><br><br><br><br><br><small>(Nilai Normal Pria: 4.4 - 5.9 juta/μL)<br><br><br><br>(Nilai Normal Wanita: 3.8 - 5.2 juta/μL)</small></td></tr>";
              }
              if (!empty($row["hitung_jenis"])) {
              }
              if (!empty($row["mcv"])) {
                echo "<tr><td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<strong>MCV :</strong></td><td>"  . $row["mcv"] . " fl <strong>" . $mcv_status . "</strong><br><br><br><br><br><small>(Nilai Normal : 80 - 100 fl)</small></td></tr>";
              }
              if (!empty($row["mch"])) {
                echo "<tr><td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<strong>MCH :</strong></td><td>"  . $row["mch"] . " pg <strong>" . $mch_status . "</strong><br><br><br><br><br><small>(Nilai Normal : 26 - 34 pg)</small></td></tr>";
              }

              if (!empty($row["sgot"])) {
                echo "<tr><td>&emsp;&emsp;<strong>b. Fungsi Hati :</strong></td><td>";
              }
              if (!empty($row["sgot"])) {
                echo "<tr><td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<strong>SGOT :</strong></td><td>"  . $row["sgot"] . " μ/L <strong>" . $sgot_status . "</strong><br><br><br><br><br><small>(Nilai Normal : 0 - 50 μ/L)</small></td></tr>";
              }
              if (!empty($row["sgpt"])) {
                echo "<tr><td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<strong>SGPT :</strong></td><td>"  . $row["sgpt"] . " μ/L <strong>" . $sgpt_status . "</strong><br><br><br><br><br><small>(Nilai Normal Pria : 0 - 50 μ/L)<br><br><br><br>(Nilai Normal Wanita: 0 - 35 μ/L)</small></td></tr>";
              }
              if (!empty($row["kolesterol"])) {
                echo "<tr><td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<strong>Kolesterol Total :</strong></td><td>"  . $row["kolesterol"] . " mg/dl <strong>" . $kolesterol_status . "</strong><br><br><br><br><br><small>(Nilai Normal : < 200 mg/dl)</small></td></tr>";
              }
              if (!empty($row["hdl"])) {
                echo "<tr><td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<strong>HDL :</strong></td><td>"  . $row["hdl"] . " mg/dl <strong>" . $hdl_status . "</strong><br><br><br><br><br><small>(Nilai Normal Pria : > 31- 63 mg/dl)<br><br><br><br>(Nilai Normal Wanita: 37 - 92 mg/dl)</small></td></tr>";
              }
              if (!empty($row["ldl"])) {
                echo "<tr><td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<strong>LDL :</strong></td><td>"  . $row["ldl"] . " mg/dl <strong>" . $ldl_status . "</strong><br><br><br><br><br><small>(Nilai Normal : < 130 mg/dl)</small></td></tr>";
              }
              if (!empty($row["tg"])) {
                echo "<tr><td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<strong>Trigliserida :</strong></td><td>"  . $row["tg"] . " mg/dl <strong>" . $tg_status . "</strong><br><br><br><br><br><small>(Nilai Normal : < 150 mg/dl)</small></td></tr>";
              }

              if (!empty($row["asam_urat"])) {
                echo "<tr><td>&emsp;&emsp;<strong>c. Fungsi Ginjal :</strong></td><td>";
              }
              if (!empty($row["asam_urat"])) {
                echo "<tr><td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<strong>Asam Urat Darah :</strong></td><td>"  . $row["asam_urat"] . " mg/dl <strong>" . $asamurat_status . "</strong><br><br><br><br><br><small>(Nilai Normal Pria: 2.5 - 7 mg/dL)<br><br><br><br>(Nilai Normal Wanita: 1.5 - 7 mg/dL)</small></td></tr>";
              }
              if (!empty($row["ureum"])) {
                echo "<tr><td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<strong>Ureum :</strong></td><td>"  . $row["ureum"] . " mg/dl <strong>" . $ureum_status . "</strong><br><br><br><br><br><small>(Nilai Normal Pria: 20 - 40 mg/dL)</small></td></tr>";
              }
              if (!empty($row["creatin"])) {
                echo "<tr><td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<strong>Creatin :</strong></td><td>"  . $row["creatin"] . " mg/dl <strong>" . $creatin_status . "</strong><br><br><br><br><br><small>(Nilai Normal Pria: 0.6 - 1.5 mg/dL)</small></td></tr>";
              }

              if (!empty($row["glucosa_puasa"])) {
                echo "<tr><td>&emsp;&emsp;<strong>e. Gula Darah :</strong></td><td>";
              }
              if (!empty($row["glucosa_puasa"])) {
                echo "<tr><td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<strong>Glucosa Puasa :</strong></td><td>"  . $row["glucosa_puasa"] . " mg/dl <strong>" . $glucosapuasa_status . "</strong><br><br><br><br><br><small>(Nilai Normal Pria: 80 - 100 mg/dL)</small></td></tr>";
              }
              if (!empty($row["glucosa_pp"])) {
                echo "<tr><td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<strong>Glucosa 2 Jam PP :</strong></td><td>"  . $row["glucosa_pp"] . " mg/dl <strong>" . $glucosapp_status . "</strong><br><br><br><br><br><small>(Nilai Normal Pria: 80 - 140 mg/dL)</small></td></tr>";
              }

              if (!empty($row["urinalisa"])) {
                echo "<tr><td>&emsp;&emsp;<strong>f. Imunoserologi :</strong></td><td>";
              }
              if (!empty($row["hbsag"])) {
                echo "<tr><td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<strong>HBsAG :</strong></td><td>"  . $row["hbsag"] . "";
              }
              if (!empty($row["urinalisa"])) {
                echo "<tr><td>&emsp;&emsp;<strong>c. Urinalisa :</strong></td><td>" . $row["urinalisa"] . " pH <strong>" . $urinalisa_status . "</strong><br><br><br><br><br><small>(Nilai Normal : 5 - 8 pH)</small></td></tr>";
              }

              //thorax
              if (!empty($row["thorax"])) {
                echo "<tr>
              <td style='font-size: 16px; font-weight: bold;'>RONTGEN THORAX:</td>
                    <td style='font-size: 12px; font-family: Arial, sans-serif; line-height: 1; padding: 1; border: 1; margin: 0; white-space: pre-wrap;'>" . nl2br($row["thorax"]) . "</td>
                  </tr>";
              }

              //Kesan
              if (!empty($row["kesan"])) {
                echo "<tr>
                    <td style='font-size: 16px; font-weight: bold;'>KESAN:</td>
                    <td style='font-size: 12px; font-family: Arial, sans-serif; line-height: 1; padding: 1; border: 1; margin: 0; white-space: pre-wrap;'>" . nl2br($row["kesan"]) . "</td>
                  </tr>";
              }

              //Anjuran
              if (!empty($row["anjuran"])) {
                echo "<tr>
                    <td style='font-size: 16px; font-weight: bold;'>ANJURAN:</td>
                    <td style='font-size: 12px; font-family: Arial, sans-serif; line-height: 1; padding: 1; border: 1; margin: 0; white-space: pre-wrap;'>" . nl2br($row["anjuran"]) . "</td>
                  </tr>";
              }
            }
          }
        } else {
          echo "<tr><td colspan='2'>Tidak ada data ditemukan.</td></tr>";
        }

        $conn->close();
        ?>
      </tbody>
    </table>
  </div>
  </div>

  <div class="footer">
    <img src="/mcu/footer.png" alt="Signature Footer" />
</div>

  <div class="footer2">
    Penanggung Jawab
  </div>


  <div class="print-btn">
    <button class="btn btn-primary" onclick="window.print()">Print</button>
  </div>

</body>

</html>