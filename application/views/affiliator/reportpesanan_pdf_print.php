<html>

<head>
    <title>Cetak PDF</title>
    <style>
        .table {
            border-collapse: collapse;
            table-layout: fixed;
            width: 500px;
        }

        .table th {
            padding: 2px;
        }

        .table td {
            word-wrap: break-word;
            width: 1%;
            padding: 1px;
        }
    </style>
</head>

<body>
    <h4 style="margin-bottom: 5px;">Data Pesanan</h4>
    <?php echo $label ?>
    <table class="table" border="1" width="100%" style="margin-top: 10px;">
        <tr>
            <th>No Pesanan</th>
            <th>Nama Produk</th>
            <th>Status Pesanan</th>
            <th>Jumlah Komisi</th>
            <th>Tanggal Pesanan</th>
            <th>Status Komisi</th>
        </tr>
        <?php
        if (empty($export)) { // Jika data tidak ada
            echo "<tr><td colspan='6'>Data tidak ada</td></tr>";
        } else { // Jika jumlah data lebih dari 0 (Berarti jika data ada)
            foreach ($export as $data) { // Looping hasil data transaksi
                $tanggal_pesanan = date('d-m-Y', strtotime($data->tanggal_pesanan)); // Ubah format tanggal jadi dd-mm-yyyy
                
                if ($data->status_komisi == 1) {
                    $status_komisi = '<p> Pesanan Masuk </p>';
                } else {
                    $status_komisi = '<p> Pesanan Selesai </p>';
                }
    
                if ($data->status_pesanan == 1) {
                    $status_pesanan = '<p> Pesanan Masuk </p>';
                } else {
                    $status_pesanan = '<p> Pesanan Selesai </p>';
                }
                
                echo "<tr>";
                echo "<td>" . $data->id_pesanan . "</td>";
                echo "<td>" . $data->nama_produk . "</td>";
                echo "<td>" . $status_pesanan . "</td>";
                echo "<td>" . $data->jml_komisi . "</td>";
                echo "<td>" . $tanggal_pesanan . "</td>";
                echo "<td>" . $status_komisi . "</td>";
                echo "</tr>";
            }
        }
        ?>
    </table>
</body>

</html>