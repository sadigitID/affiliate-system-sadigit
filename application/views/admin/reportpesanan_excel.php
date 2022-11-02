<div class="card card-custom" style="padding: 15px;">
    <div class="card-header">
        <div class="card-body">
            <div class="card-title">
                <span class="card-icon"><i class="flaticon-squares-1 text-primary"></i></span>
                <h3 class="card-label">Print Data Pesanan Excel</h3>
            </div>
            <form method="get" action="<?php echo base_url('admin/reportpesanan_excel/index') ?>">
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label>Filter Tanggal</label>
                            <div class="input-group">
                                <input type="date" name="tgl_awal" value="<?= @$_GET['tgl_awal'] ?>" class="form-control tgl_awal" placeholder="Tanggal Awal" autocomplete="off">
                                <span class="input-group-addon">s/d</span>
                                <input type="date" name="tgl_akhir" value="<?= @$_GET['tgl_akhir'] ?>" class="form-control tgl_akhir" placeholder="Tanggal Akhir" autocomplete="off">
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" name="filter" value="true" class="btn btn-primary">TAMPILKAN</button>
                <?php
                if (isset($_GET['filter']))
                    echo '<a href="' . base_url('admin/reportpesanan_excel/index') . '" class="btn btn-default">RESET</a>';
                ?>
            </form>
            <hr />
            <h4 style="margin-bottom: 5px;"><b>Data PEsanan</b></h4>
            <?php echo $label ?><br />
            <div style="margin-top: 5px;">
                <a href="<?php echo $url_export ?>">CETAK EXCEL</a>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th>No Pesanan</th>
                        <th>Nama Pembeli</th>
                        <th>Nama Produk</th>
                        <th>Total Pesanan</th>
                        <th>Status Pesanan</th>
                        <th>Tanggal Pembayaran</th>
                        <th>Foto Bukti Pembayaran</th>
                        <th>Nama Affiliator</th>
                        <th>Jumlah Komisi</th>
                        <th>Status Komisi</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (empty($export)) { // Jika data tidak ada
                            echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
                        } else { // Jika jumlah data lebih dari 0 (Berarti jika data ada)
                            foreach ($export as $data) { // Looping hasil data export
                                $tanggal_pembayaran = date('d-m-Y', strtotime($data->tanggal_pembayaran)); // Ubah format tanggal jadi dd-mm-yyyy

                                echo "<tr>";
                                echo "<td>" . $data->id_pesanan . "</td>";
                                echo "<td>" . $data->nama_pembeli . "</td>";
                                echo "<td>" . $data->nama_produk . "</td>";
                                echo "<td>" . $data->harga_jual . "</td>";
                                echo "<td>" . $data->status_pesanan . "</td>";
                                echo "<td>" . $tanggal_pembayaran . "</td>";
                                echo "<td>" . $data->foto_pembayaran . "</td>";
                                echo "<td>" . $data->id_user . "</td>";
                                echo "<td>" . $data->status_komisi . "</td>";
                                echo "<td>" . $data->status_komisi . "</td>";
                                echo "</tr>";
                            }
                        }
                        ?>
                </table>
            </div>

            <script src="<?php echo base_url('assets/libraries/bootstrap-datepicker/js/bootstrap-datepicker.min.js'); ?>"></script> <!-- Load file bootstrap-datepicker.min.js -->
            <script>
                function setDatePicker() {
                    $(".datepicker").datepicker({
                        format: "yyyy-mm-dd",
                        todayHighlight: true,
                        autoclose: true
                    }).attr("readonly", "readonly").css({
                        "cursor": "pointer",
                        "background": "white"
                    });
                }
            </script>
            </body>

            </html>