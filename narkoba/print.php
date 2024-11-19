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
          $sql = "SELECT * FROM narkoba WHERE rm = '$rm'";;
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
        $sql = "SELECT * FROM narkoba WHERE rm = '$rm'";;
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          // Output data of each row
          while ($row = $result->fetch_assoc()) {
            $amfetamin_status = getAmpfetaminStatus($row["amfetamin"]);
            $metamfetamin_status = getMetamfetaminStatus($row["metamfetamin"]);
            $thc_status = getTHCStatus($row["thc"]);
            $morfin_status = getMorfinStatus($row["morfin"]);
            $kokain_status = getkokainStatus($row["kokain"]);
            $benzodiazepin_status = getBenzodiazepinStatus($row["benzodiazepin"]);


            echo "<tr><td colspan='2'><strong style='font-size: 16px;'>HASIL PEMERIKSAAN</strong></td></tr>";

            echo "<tr><td>&emsp;&emsp;<strong>NAPZA :</strong></td><td>";
            echo "<tr><td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<strong>Amfetamin :</strong></td><td>"  . $row["amfetamin"] . "  <strong>" . $amfetamin_status . "</strong><br><br><br><br><br><small>(Nilai Normal : Negatif)</small></td></tr>";
            echo "<tr><td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<strong>Metamfetamin :</strong></td><td>"  . $row["metamfetamin"] . " <strong>" . $metamfetamin_status . "</strong><br><br><br><br><br><small>(Nilai Normal : Negatif)</small></td></tr>";
            echo "<tr><td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<strong>THC / Canabis :</strong></td><td>"  . $row["thc"] . "  <strong>" . $thc_status . "</strong><br><br><br><br><br><small>(Nilai Normal : Negatif)</small></td></tr>";
            echo "<tr><td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<strong>Morfin :</strong></td><td>"  . $row["morfin"] . "  <strong>" . $morfin_status . "</strong><br><br><br><br><br><small>(Nilai Normal : Negatif)</small></td></tr>";
            echo "<tr><td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<strong>Kokain :</strong></td><td>"  . $row["kokain"] . "  <strong>" . $kokain_status . "</strong><br><br><br><br><br><small>(Nilai Normal : Negatif)<br><br><br><br>(Nilai Normal Wanita: 0 - 20 mm/jam)</small></td></tr>";
            echo "<tr><td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<strong>Benzodiapin :</strong></td><td>"  . $row["benzodiazepin"] . "  <strong>" . $benzodiazepin_status . "</strong><br><br><br><br><br><small>(Nilai Normal : Negatif)</small></td></tr>";


            // // Kesan
            // echo "<tr>
            //       <td style='font-size: 16px; font-weight: bold;'>KESAN:</td>
            //       <td style='font-size: 12px; font-family: Arial, sans-serif; line-height: 1; padding: 1; border: 1; margin: 0; white-space: pre-wrap;'>" . nl2br($row["kesan"]) . "</td>
            //     </tr>";










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

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>