<div class="modal" id="modal_produk" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Kelola Produk</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="form_produk">
				<div class="modal-body">
					<input class="d-none" type="text" id="id_produk" name="id_produk" autocomplete="off" />
					<div class="form-group row">
						<label class="col-form-label col-4" for="nama_produk ">Nama produk</label>
						<div class="col-8">
							<input class="form-control " type="text" placeholder="masukan nama produk" id="nama_produk" name="nama_produk" autocomplete="off" />
						</div>
					</div>
					<div class="form-group row">
						<label class="col-form-label col-4" for="harga_produk ">Harga produk</label>
						<div class="col-8">
							<input class="form-control " type="number" placeholder="masukan harga produk" id="harga_produk" name="harga_produk" autocomplete="off" />
						</div>
					</div>
					<div class="form-group row">
						<label class="col-form-label col-4" for="jml_komisi ">Jumlah komisi</label>
						<div class="col-8">
							<input class="form-control " type="number" placeholder="masukan jumlah komisi" id="jml_komisi" name="jml_komisi" autocomplete="off" />
						</div>
					</div>
					<div class="form-group row">
						<label class="col-form-label col-4" for="deskripsi_produk">Deskripsi produk</label>
						<div class="col-8">
							<input class="form-control " type="text" placeholder="masukan deskripsi produk" id="deskripsi_produk" name="deskripsi_produk" autocomplete="off" />
						</div>
					</div>
					<div class="form-group row">
						<label class="col-form-label col-4" for="link_produk">Link produk</label>
						<div class="col-8">
							<input class="form-control " type="text" placeholder="masukan link produk" id="link_produk" name="link_produk" autocomplete="off" />
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

<div class="card card-custom">
	<div class="card-header">
		<div class="card-title">
			<span class="card-icon"><i class="flaticon-squares-1 text-primary"></i></span>
			<h3 class="card-label">Kelola Produk</h3>
		</div>
		<div class="card-toolbar">
			<span class="btn btn-light-primary" onclick="tambahProduk()">Tambah Produk</span>
		</div>
	</div>
	<div class="card-body">
		<!--begin: Datatable-->
		<table class="table table-bordered" id="table" style="margin-top: 13px !important">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama produk</th>
					<th>Harga produk</th>
					<th>Jumlah komisi</th>
					<th>Deskripsi produk</th>
					<th>Link produk</th>
					<th>
						<center>Aksi</center>
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
				"url": '<?= base_url('admin/produk/tb_produk/') ?>',
				"type": "POST"
			},
			"ordering": false
		});
	})

	const tambahProduk = async () => {
		$('#form_produk')[0].reset()
		$('#modal_produk').modal('show')
	}

	const _edit = async (id_produk) => {
		await $.ajax({
			type: "post",
			url: "<?= base_url('admin/produk/getProduk') ?>",
			data: {
				id_produk
			},
			dataType: "json",
			success: function(res) {
				$('#id_produk').val(res.id_produk)
				$('#nama_produk').val(res.nama_produk)
				$('#harga_produk').val(res.harga_produk)
				$('#jml_komisi').val(res.jml_komisi)
				$('#deskripsi_produk').val(res.deskripsi_produk)
				$('#link_produk').val(res.link_produk)
				$('#modal_produk').modal('show')
			},
			error(err) {
				Swal.fire('', 'terjadi kesalahan saat mengambil data produk', 'error');
			}
		});
	}

	const _delete = async (id_produk) => {
		const result = await confirm('apakah anda yakin akan menghapus produk ini?')

		if (!result.isConfirmed) return;

		await $.ajax({
			type: "post",
			url: "<?= base_url('admin/produk/delete') ?>",
			data: {
				id_produk
			},
			dataType: "json",
			success: function(res) {
				Swal.fire('', 'berhasil menghapus produk', 'success')
				table.ajax.reload()
			},
			error(err) {
				Swal.fire('', 'terjadi kesalahan saat menghapus produk', 'error');
			}
		});
	}

	const save = async (btn) => {
		btn.prop('disabled', true)
		const data = $('#form_produk').serializeArray()
		await $.ajax({
			type: "post",
			url: "<?= base_url('admin/produk/save') ?>",
			data,
			dataType: "json",
			success: function(res) {
				if (res.status) {
					$('#modal_produk').modal('hide');
					Swal.fire("", "Berhasil menyimpan data", "success");
					table.ajax.reload();
					$('#form_produk').find('.text-danger').remove()
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