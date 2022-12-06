<html>

<head>
  <title>Cetak PDF</title>
  <style>
    .table {
      border-collapse: collapse;
      table-layout: fixed;
      width: 650px;
    }

    .table th {
      padding: 5px;
    }

    .table td {
      word-wrap: break-word;
      width: 15%;
      padding: 5px;
    }
  </style>
</head>

<body>
  <h4 style="margin-bottom: 5px;">Data Bonus</h4>
  <?php echo $label ?>
  <table class="table" border="1" width="100%" style="margin-top: 10px;">
    <tr>
      <th>Tanggal</th>
      <th>Nama User</th>
      <th>Jumlah Bonus</th>
      <th>Catatan</th>
    </tr>
    <?php
    if (empty($export)) { // Jika data tidak ada
      echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
    } else { // Jika jumlah data lebih dari 0 (Berarti jika data ada)
      foreach ($export as $data) { // Looping hasil data transaksi
        $jml_bns = "Rp " . number_format($data->jml_bonus, 2, ',', '.');
        $tanggal_bonus = date('d-m-Y', strtotime($data->tanggal_bonus)); // Ubah format tanggal jadi dd-mm-yyyy

        echo "<tr>";
        echo "<td style='width: 80px;'>" . $tanggal_bonus . "</td>";
        echo "<td style='width: 150px;'>" . $data->nama_lengkap . "</td>";
        echo "<td style='width: 100px;'>" . $jml_bns . "</td>";
        echo "<td style='width: 300px;'>" . $data->catatan . "</td>";
        echo "</tr>";
      }
    }
    ?>
  </table>
</body>

</html>