<html>

<head>
  <title>Cetak PDF</title>
  <style>
    .table {
      border-collapse: collapse;
      table-layout: fixed;
      width: 630px;
    }

    .table th {
      padding: 5px;
    }

    .table td {
      word-wrap: break-word;
      width: 20%;
      padding: 5px;
    }
  </style>
</head>

<body>
  <h4 style="margin-bottom: 5px;">Data Transaksi</h4>
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
        $tanggal_bonus = date('d-m-Y', strtotime($data->tanggal_bonus)); // Ubah format tanggal jadi dd-mm-yyyy
        $jml_bonus = number_format($data->jml_bonus);
        
        echo "<tr>";
        echo "<td style='width: 80px;'>" . $tanggal_bonus . "</td>";
        echo "<td style='width: 100px;'>" . $data->nama_lengkap . "</td>";
        echo "<td style='width: 300px;'>" . $jml_bonus . "</td>";
        echo "<td style='width: 60px;'>" . $data->catatan . "</td>";
        echo "</tr>";
      }
    }
    ?>
  </table>
</body>

</html>