<div class="card card-custom" style="padding: 15px;">
    <div class="card-header">
        <div class="card-title">
            <span class="card-icon"><i class="flaticon-squares-1 text-primary"></i></span>
            <h3 class="card-label">Print Data Pesanan PDF</h3>
        </div>
    </div>
    <div class="card-body">
        <form method="get" action="<?php echo base_url('affiliator/reportpesanan_pdf/index') ?>">
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <div class="form-group">
                        <label>Filter Tanggal</label>
                        <div class="input-group">
                            <input type="date" name="tgl_awal" value="<?= @$_GET['tgl_awal'] ?>" class="form-control tgl_awal" placeholder="Tanggal Awal" autocomplete="off">
                            <span class="input-group-addon"> s/d </span>
                            <input type="date" name="tgl_akhir" value="<?= @$_GET['tgl_akhir'] ?>" class="form-control tgl_akhir" placeholder="Tanggal Akhir" autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" name="filter" value="true" class="btn btn-primary">TAMPILKAN</button>
            <?php
            if (isset($_GET['filter']))
                echo '<a href="' . base_url('affiliator/reportpesanan_pdf/index') . '" class="btn btn-default">RESET</a>';
            ?>
        </form>
        <hr />
        <h4 style="margin-bottom: 5px;"><b>Data Pesanan</b></h4>
        <?php echo $label ?><br />
        <div style="margin-top: 5px;">
            <a href="<?php echo $url_cetak ?>">CETAK PDF</a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered" id="table" style="margin-top: 13px !important">
                <thead>
                    <tr>
                        <th>No Pesanan</th>
                        <th>Nama Produk</th>
                        <th>Status Pesanan</th>
                        <th>Jumlah Komisi</th>
                        <th>Tanggal Pesanan</th>
                        <th>Status Komisi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (empty($export)) { // Jika data tidak ada
                        echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
                    } else { // Jika jumlah data lebih dari 0 (Berarti jika data ada)
                        foreach ($export as $data) { // Looping hasil data export
                            $jml_kms = "Rp " . number_format($data->jml_komisi, 2, ',', '.');
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
                            echo "<td>" . $jml_kms . "</td>";
                            echo "<td>" . $tanggal_pesanan . "</td>";
                            echo "<td>" . $status_komisi . "</td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Include File JS Bootstrap -->
<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
<!-- Include library Bootstrap Datepicker -->
<script src="<?php echo base_url('assets/libraries/bootstrap-datepicker/js/bootstrap-datepicker.min.js') ?>"></script>
<!-- Include File JS Custom (untuk fungsi Datepicker) -->
<script src="<?php echo base_url('assets/js/custom.js') ?>"></script>
<script>
    $(document).ready(function() {
        setDateRangePicker(".tgl_awal", ".tgl_akhir")
    })
</script>