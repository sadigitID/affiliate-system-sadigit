<link href="<?php echo base_url('assets/libraries/bootstrap-datepicker/css/bootstrap-datepicker.min.css') ?>" rel="stylesheet">
<div class="modal" id="modal_pdf" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Bonus</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="form_pdf" method="get" action="<?php echo base_url('admin/reportbonus_pdf/index') ?>">
				<div class="modal-body">
					<!-- <input class="d-none" type="text" id="id_bonus" name="id_bonus" autocomplete="off" /> -->
					<div class="form-group row">
						<label class="col-form-label col-4" for="id_user ">Dari Tanggal</label>
						<div class="col-8">
						<input type="text" name="tgl_awal" value="<?= @$_GET['tgl_awal'] ?>" class="form-control tgl_awal" placeholder="Tanggal Awal" autocomplete="off">	
						<!-- <input class="form-control " type="text" placeholder="masukan nama user" id="id_user" name="id_user" autocomplete="off" /> -->
						</div>
					</div>
					<div class="form-group row">
						<label class="col-form-label col-4" for="jml_bonus ">Sampai Tanggal</label>
						<div class="col-8">
						<input type="text" name="tgl_akhir" value="<?= @$_GET['tgl_akhir'] ?>" class="form-control tgl_akhir" placeholder="Tanggal Akhir" autocomplete="off">	
						<!-- <input class="form-control " type="text" placeholder="masukan jumlah bonus" id="jml_bonus" name="jml_bonus" autocomplete="off" /> -->
						</div>
					</div>
					
					<!-- <input class="form-control " type="hidden" placeholder="tanggal_bonus" id="tanggal_bonus" name="tanggal_bonus" autocomplete="off" value="<?php echo date("Y-m-d") ?>"/> -->
				</div>
			</form>
			<div class="modal-footer">
			<button type="submit" name="filter" value="true" class="btn btn-primary">TAMPILKAN</button>	
			<!-- <button type="button" class="btn btn-light-primary" onclick="save($(this))">Simpan</button> -->
				<!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button> -->
			</div>
		</div>
	</div>
</div>

<div class="card card-custom">
	<div class="card-header">
		<div class="card-title">
			<span class="card-icon"><i class="flaticon-squares-1 text-primary"></i></span>
			<h3 class="card-label">data bonus affiliator</h3>
		</div>
		
		<!-- <!-- <div class="card-toolbar">
			<span class="btn btn-light-primary">Export Data</span>
		</div> -->
		<div style="padding: 15px;">
        <h3 style="margin-top: 0;"><b>Laporan PDF Plus Filter Periode Tanggal</b></h3>
        <hr />
        <form method="get" action="<?php echo base_url('admin/reportbonus_pdf/index') ?>">
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
	</div> 
	<?php
            if(isset($_GET['filter'])) // Jika user mengisi filter tanggal, maka munculkan tombol untuk reset filter
                echo '<a href="'.base_url('admin/reportbonus_pdf/index').'" class="btn btn-default">RESET</a>';
            ?>
			<hr />
        <h4 style="margin-bottom: 5px;"><b>Data Transaksi</b></h4>
        <?php echo $label ?><br />
        <div style="margin-top: 5px;">
            <a href="<?php echo $url_cetak ?>">CETAK PDF</a>
        </div>
	<div class="card-body">
		<!--begin: Datatable-->
		<table class="table table-bordered" id="table" style="margin-top: 13px !important">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama user</th>
					<th>jumlah bonus</th>
					<th>catatan</th>
					<th>tanggal bonus</th>
				</tr>
			</thead>
			<tbody>

			</tbody>
		</table>
		<!--end: Datatable-->
	</div>
</div>
<!--end::Card-->
<script>
	let table
	$(document).ready(async () => {
		table = $('#table').DataTable({
			"responsive": true,
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				"url": '<?= base_url('admin/bonus/tb_bonus/') ?>',
				"type": "POST"
			},
			"ordering": false
		});
	})

	const tambahBonus = async () => {
		$('#form_pdf')[0].reset()
		$('#modal_pdf').modal('show')
	}


</script>
<script src="<?php echo base_url('assets/libraries/bootstrap-datepicker/js/bootstrap-datepicker.min.js') ?>"></script>
<script>
    $(document).ready(function(){
        setDateRangePicker(".tgl_awal", ".tgl_akhir")
    })
    </script>