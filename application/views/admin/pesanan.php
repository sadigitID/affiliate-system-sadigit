<!-- start of modal tambah bonus -->
<div class="modal" id="modal_pesanan" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Pesanan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="form_pesanan">
				<div class="modal-body">
					<input class="d-none" type="text" id="id_pesanan" name="id_pesanan" autocomplete="off" />
					<div class="form-group row">
						<label class="col-form-label col-4" for="id_user ">No Pesanan</label>
						<div class="col-8">
							<!-- <input class="form-control " type="text" placeholder="Nama Affiliator" id="id_user" name="id_user" autocomplete="off" /> -->
							<input class="form-control " type="text" placeholder="Nama Produk" id="nama_produk" name="nama_produk" autocomplete="off"  />
						</div>
					</div>
					<div class="form-group row">
						<label class="col-form-label col-4" for="id_user ">Nama Pembeli</label>
						<div class="col-8">
							<!-- <input class="form-control " type="text" placeholder="Nama Affiliator" id="id_user" name="id_user" autocomplete="off" /> -->
							<select class="form-control" id="id_user" name="id_user" required>
								<?php foreach ($user as $user) : ?>
									<option value="<?= $user->id_user ?>"><?= $user->nama_lengkap ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-form-label col-4" for="nama_produk ">Nama Produk</label>
						<div class="col-8">
							<input class="form-control " type="text" placeholder="Nama Produk" id="nama_produk" name="nama_produk" autocomplete="off"  />
						</div>
					</div>
					<div class="form-group row">
						<label class="col-form-label col-4" for="total_pesanan ">Total Pesanan</label>
						<div class="col-8">
							<input class="form-control " type="text" placeholder="Total Pesanan" id="total_pesanan" name="total_pesanan" autocomplete="off" />
						</div>
					</div>
                    <div class="form-group row">
						<label class="col-form-label col-4" for="status_pesanan ">Status Pesanan</label>
						<div class="col-8">
							<input class="form-control " type="text" placeholder="Status Pesanan" id="status_pesanan" name="status_pesanan" autocomplete="off" />
						</div>
					</div>
					<div class="form-group row">
						<label class="col-form-label col-4" for="tanggal_pembayaran ">Tanggal Pembayaran</label>
						<div class="col-8">
							<input class="form-control " type="text" placeholder="Tanggal Pembayaran" id="tanggal_pembayaran" name="tanggal_pembayaran" autocomplete="off" />
						</div>
					</div>
                    <div class="form-group row">
						<label class="col-form-label col-4" for="foto_bukti_pembayaran ">Foto Bukti Pembayaran</label>
						<div class="col-8">
							<input class="form-control " type="text" placeholder="Foto Bukti Pembayaran" id="foto_bukti_pembayaran" name="foto_bukti_pembayaran" autocomplete="off" />
						</div>
					</div>
					<div class="form-group row">
						<label class="col-form-label col-4" for="id_user ">Nama Affiliator</label>
						<div class="col-8">
                            <select class="form-control" id="id_user" name="id_user" required>
                                    <?php foreach ($user as $user) : ?>
                                        <option value="<?= $user->id_user ?>"><?= $user->nama_lengkap ?></option>
                                    <?php endforeach; ?>
							</select>
						</div>
					</div>
                    <div class="form-group row">
						<label class="col-form-label col-4" for="jml_komisi ">Jumlah Komisi AFF</label>
						<div class="col-8">
							<input class="form-control " type="text" placeholder="Jumlah Komisi AFF" id="jml_komisi" name="jml_komisi" autocomplete="off" />
						</div>
					</div>
					<input class="form-control " type="hidden" placeholder="tanggal_bonus" id="tanggal_bonus" name="tanggal_bonus" autocomplete="off" value="<?php echo date("Y-m-d") ?>"/>
				</div>
			</form>
			<div class="modal-footer">
				<button type="button" class="btn btn-light-primary" onclick="save($(this))">Simpan</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>
<!-- end of modal tambah bonus -->

<!-- start of export data pdf -->
<div class="modal" id="modal_printPDF" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Print PDF</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="form_printPDF">
				<div class="modal-body">
					<div class="form-group row">
						<label class="col-form-label col-4" for="id_user ">Dari Tanggal</label>
						<div class="col-8">
							<input type="date" class="form-control" name="tgl_awal">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-form-label col-4" for="id_user ">Sampai Tanggal</label>
						<div class="col-8">
							<input type="date" class="form-control" name="tgl_akhir">
						</div>
					</div>

				</div>
			</form>
			<div class="modal-footer">
				<button type="button" class="btn btn-light-primary" onclick="save($(this))">Simpan</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>
<!-- end of export data pdf -->



<div class="card card-custom">
	<div class="card-header">
		<div class="card-title">
			<span class="card-icon"><i class="flaticon-squares-1 text-primary"></i></span>
			<h3 class="card-label">Manajemen Pesanan</h3>
		</div>
		<div class="card-toolbar">
			<span class="btn btn-light-primary" onclick="tambahBonus()">Tambah Bonus</span>
		</div>
		<div class="card-toolbar">
			<span class="btn btn-light-primary" onclick="tambahBonus()">Tambah Bonus</span>
		</div>
	</div>
	<div class="card-body">
		<!--begin: Datatable-->
		<table class="table table-bordered" id="table" style="margin-top: 13px !important">
			<thead>
				<tr>
					<th>No Pesanan</th>
					<th>Nama Pembeli</th>
					<th>Nama Produk</th>
					<th>Total Pesanan</th>
					<th>Status Pesanan </th>
                    <th>Tanggal Pembayaran</th>
					<th>Foto Bukti Pembayaran</th>
                    <th>Nama Affiliator</th>
					<th>Jumlah Komisi AFF</th>
					<th>
						<center>Status Komisi</center>
					</th>
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
				"url": '<?= base_url('admin/pesanan/tb_pesanan/') ?>',
				"type": "POST"
			},
			"ordering": false
		});
	})

	const tambahBonus = async () => {
		$('#form_pesanan')[0].reset()
		$('#modal_pesanan').modal('show')
	}

	const printPDF = async () => {
		$('#form_printPDF')[0].reset()
		$('#modal_printPDF').modal('show')
	}

	const _edit = async (id_pesanan) => {
		await $.ajax({
			type: "post",
			url: "<?= base_url('admin/pesanan/getBonus') ?>",
			data: {
				id_pesanan
			},
			dataType: "json",
			success: function(res) {
				$('#id_pesanan').val(res.id_pesanan)
				$('#id_user').val(res.id_user)
				$('#id_produk').val(res.id_produk)
				$('nama_produk').val(res.catatan)
				$('#harga_jual').val(res.harga_jual)
                $('#nama_pembeli').val(res.nama_pembeli)
				$('#tanggal_pembayaran').val(res.tanggal_pembayaran)
				$('#tanggal_pesanan').val(res.tanggal_pesanan)
				$('#foto_pembayaran').val(res.foto_pembayaran)
				$('#no_wa_pembeli').val(res.no_wa_pembeli)
                $('#status_komisi').val(res.status_komisi)
				$('#status_pesanan').val(res.status_pesanan)
				$('#modal_pesanan').modal('show')
			},
			error(err) {
				Swal.fire('', 'terjadi kesalahan saat mengambil data bonus', 'error');
			}
		});
	}

	const _delete = async (id_pesanan) => {
		const result = await confirm('apakah anda yakin akan menghapus pesanan ini?')

		if (!result.isConfirmed) return;

		await $.ajax({
			type: "post",
			url: "<?= base_url('admin/pesanan/delete') ?>",
			data: {
				id_pesanan
			},
			dataType: "json",
			success: function(res) {
				Swal.fire('', 'berhasil menghapus pesanan', 'success')
				table.ajax.reload()
			},
			error(err) {
				Swal.fire('', 'terjadi kesalahan saat menghapus pesanan', 'error');
			}
		});
	}

	const save = async (btn) => {
		btn.prop('disabled', true)
		const data = $('#form_bonus').serializeArray()
		await $.ajax({
			type: "post",
			url: "<?= base_url('admin/pesanan/save') ?>",
			data,
			dataType: "json",
			success: function(res) {
				if (res.status) {
					$('#modal_pesanan').modal('hide');
					Swal.fire("", "Berhasil menyimpan data", "success");
					table.ajax.reload();
					$('#form_bonus').find('.text-danger').remove()
				} else {

					$.each(res.messages, function(key, value) {
						const element = $('[name ="' + key + '"]');
						element
							.removeClass('is-invalid')
							.addClass(value.length > 0 ? 'is-invalid' : '')
							.closest('div.form-group')
							.find('.text-danger')
							.remove();
						element.removeClass('is-invalid')
						// .addClass(value.length > 0 ? 'is-invalid' : '')
						if (element.parents('.input-group').length) {
							$('.div' + key).html(value);
						} else if ($('#' + key + '').hasClass('select')) {
							element.parents().find('.select2-container').after(value);
						} else {
							element.after(value);
						}
					});
				}
			},
			error(err) {
				Swal.fire('', 'terjadi kesalahan', 'error')
			},
			complete() {
				btn.prop('disabled', false)

			}
		});
	}
</script>