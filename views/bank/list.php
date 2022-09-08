<div class="modal" id="modal_bank" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Bank</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="form_bank">
				<div class="modal-body">
					<input class="d-none" type="text" id="id" name="id" autocomplete="off" />
					<div class="form-group row">
						<label class="col-form-label col-4" for="nama_bank ">Bank</label>
						<div class="col-8">
							<input class="form-control " type="text" placeholder="masukan nama Bank" id="nama_bank" name="nama_bank" autocomplete="off" />
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
			<h3 class="card-label">Referensi Bank</h3>
		</div>
		<div class="card-toolbar">
			<span class="btn btn-light-primary" onclick="tambahBank()">Tambah bank</span>
		</div>
	</div>
	<div class="card-body">
		<!--begin: Datatable-->
		<table class="table table-bordered" id="table" style="margin-top: 13px !important">
			<thead>
				<tr>
					<th>No</th>
					<th>Bank</th>
					<th>
						<center>Aksi</center>
					</th>
				</tr>
			</thead>
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
			"processing": false,
			"serverSide": true,
			"order": [],
			"ajax": {
				"url": '<?= base_url('bank/dat_list/') ?>',
				"type": "POST"
			},
			"ordering": false
		});
	})

	const tambahBank = async () => {
		$('#form_bank')[0].reset()
		$('#modal_bank').modal('show')
	}

	const _edit = async (id) => {
		await $.ajax({
			type: "post",
			url: "<?= base_url('bank/getBank') ?>",
			data: {
				id
			},
			dataType: "json",
			success: function(res) {
				$('#id').val(res.id)
				$('#nama_bank').val(res.nama_bank)
				$('#modal_bank').modal('show')
			},
			error(err) {
				Swal.fire('', 'terjadi kesalahan saat mengambil data bank', 'error');
			}
		});
	}

	const _delete = async (id) => {
		const result = await confirm('apakah anda yakin akan menghapus bank ini?')

		if (!result.isConfirmed) return;

		await $.ajax({
			type: "post",
			url: "<?= base_url('bank/delete') ?>",
			data: {
				id
			},
			dataType: "json",
			success: function(res) {
				Swal.fire('', 'berhasil menghapus bank', 'success')
				table.ajax.reload()
			},
			error(err) {
				Swal.fire('', 'terjadi kesalahan saat menghapus bank', 'error');
			}
		});
	}

	const save = async (btn) => {
		btn.prop('disabled', true)
		const data = $('#form_bank').serializeArray()
		await $.ajax({
			type: "post",
			url: "<?= base_url('bank/save') ?>",
			data,
			dataType: "json",
			success: function(res) {
				if (res.status) {
					$('#modal_bank').modal('hide');
					Swal.fire("", "Berhasil menyimpan data", "success");
					table.ajax.reload();
					$('#form_bank').find('.text-danger').remove()
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