<!-- start of modal tambah bonus -->
<div class="modal" id="modal_bonus" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Bonus</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="form_bonus">
				<div class="modal-body">
					<input class="d-none" type="text" id="id_bonus" name="id_bonus" autocomplete="off" />
					<div class="form-group row">
						<label class="col-form-label col-4" for="id_user ">Nama Affiliator</label>
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
						<label class="col-form-label col-4" for="jml_bonus ">Jumlah Bonus</label>
						<div class="col-8">
							<input class="form-control " type="text" placeholder="Jumlah Bonus" id="jml_bonus" name="jml_bonus" autocomplete="off" />
						</div>
					</div>
					<div class="form-group row">
						<label class="col-form-label col-4" for="catatan ">Catatan</label>
						<div class="col-8">
							<input class="form-control " type="text" placeholder="Catatan" id="catatan" name="catatan" autocomplete="off" />
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


<div class="card card-custom">
	<div class="card-header">
		<div class="card-title">
			<span class="card-icon"><i class="flaticon-squares-1 text-primary"></i></span>
			<h3 class="card-label">Manajemen Bonus</h3>
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
					<th>No</th>
					<th>Nama user</th>
					<th>jumlah bonus</th>
					<th>catatan</th>
					<th>tanggal bonus</th>
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
				"url": '<?= base_url('admin/bonus/tb_bonus/') ?>',
				"type": "POST"
			},
			"ordering": false
		});
	})

	const tambahBonus = async () => {
		$('#form_bonus')[0].reset()
		$('#modal_bonus').modal('show')
	}

	const printPDF = async () => {
		$('#form_printPDF')[0].reset()
		$('#modal_printPDF').modal('show')
	}

	const _edit = async (id_bonus) => {
		await $.ajax({
			type: "post",
			url: "<?= base_url('admin/bonus/getBonus') ?>",
			data: {
				id_bonus
			},
			dataType: "json",
			success: function(res) {
				$('#id_bonus').val(res.id_bonus)
				$('#id_user').val(res.id_user)
				$('#jml_bonus').val(res.jml_bonus)
				$('#catatan').val(res.catatan)
				$('#tanggal_bonus').val(res.tanggal_bonus)
				$('#modal_bonus').modal('show')
			},
			error(err) {
				Swal.fire('', 'terjadi kesalahan saat mengambil data bonus', 'error');
			}
		});
	}

	const _delete = async (id_bonus) => {
		const result = await confirm('apakah anda yakin akan menghapus bonus ini?')

		if (!result.isConfirmed) return;

		await $.ajax({
			type: "post",
			url: "<?= base_url('admin/bonus/delete') ?>",
			data: {
				id_bonus
			},
			dataType: "json",
			success: function(res) {
				Swal.fire('', 'berhasil menghapus bonus', 'success')
				table.ajax.reload()
			},
			error(err) {
				Swal.fire('', 'terjadi kesalahan saat menghapus bonus', 'error');
			}
		});
	}

	const save = async (btn) => {
		btn.prop('disabled', true)
		const data = $('#form_bonus').serializeArray()
		await $.ajax({
			type: "post",
			url: "<?= base_url('admin/bonus/save') ?>",
			data,
			dataType: "json",
			success: function(res) {
				if (res.status) {
					$('#modal_bonus').modal('hide');
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