<!-- start of modal tambah bonus -->
<div class="modal" id="modal_rekening" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Rekening</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="form_rekening">
				<div class="modal-body">
					<input class="d-none" type="text" id="id_rek" name="id_rek" autocomplete="off" />
					<div class="form-group row">
						<label class="col-form-label col-4" for="id_bank ">Nama Bank</label>
						<div class="col-8">
							<!-- <input class="form-control " type="text" placeholder="Nama Affiliator" id="id_user" name="id_user" autocomplete="off" /> -->
							<select class="form-control" id="id_bank" name="id_bank" required>
								<?php foreach ($bank as $bank) : ?>
									<option value="<?= $bank->id_bank ?>"><?= $bank->nama_bank ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-form-label col-4" for="nama_pemilik_rek ">Nama Pemilik Rekening</label>
						<div class="col-8">
							<input class="form-control" type="text" placeholder="Nama Pemilik Rekening" id="nama_pemilik_rek" name="nama_pemilik_rek" autocomplete="off" />
						</div>
					</div>
					<div class="form-group row">
						<label class="col-form-label col-4" for="no_rek ">No Rekening</label>
						<div class="col-8">
							<input class="form-control " type="text" placeholder="No Rekening" id="no_rek" name="no_rek" autocomplete="off" />
						</div>
					</div>
					<input class="d-none" type="text" id="id_user" name="id_user" autocomplete="off"  value="<>"/>
					<!-- <input class="form-control " type="hidden" placeholder="email" id="id_user" name="id_user" autocomplete="off" value="<?= $this->session->userdata('email') ?>"/>                
				 -->
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
			<h3 class="card-label">Manajemen Rekening</h3>
		</div>
		<div class="card-toolbar">
			<span class="btn btn-light-primary" onclick="tambahRekening()">Tambah Rekening</span>
		</div>
	</div>
	<div class="card-body">
		<!--begin: Datatable-->
		<table class="table table-bordered" id="table" style="margin-top: 13px !important">
			<thead>
				<tr>
					<th>Nama Bank</th>
					<th>Nama Pemilik Rekening</th>
					<th>No Rekening</th>
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
				"url": '<?= base_url('affiliator/rekening/tb_rekening/') ?>',
				"type": "POST"
			},
			"ordering": false
		});
	})

	const tambahRekening = async () => {
		$('#form_rekening')[0].reset()
		$('#modal_rekening').modal('show')
	}

	// const printPDF = async () => {
	// 	$('#form_printPDF')[0].reset()
	// 	$('#modal_printPDF').modal('show')
	// }

	const _edit = async (id_user) => {
		await $.ajax({
			type: "post",
			url: "<?= base_url('affiliator/rekening/getRekening') ?>",
			data: {
				id_user
			},
			dataType: "json",
			success: function(res) {
				$('#id_bank').val(res.id_bank)
				$('#nama_pemilik_rek').val(res.nama_pemilik_rek)
				$('#no_rek').val(res.no_rek)
				$('#modal_rekening').modal('show')
			},
			error(err) {
				Swal.fire('', 'terjadi kesalahan saat mengambil data rekening', 'error');
			}
		});
		
	}

	const _delete = async (id_user) => {
		const result = await confirm('apakah anda yakin akan menghapus rekening ini?')

		if (!result.isConfirmed) return;

		await $.ajax({
			type: "post",
			url: "<?= base_url('affiliator/rekening/delete') ?>",
			data: {
				id_user
			},
			dataType: "json",
			success: function(res) {
				Swal.fire('', 'berhasil menghapus rekening', 'success')
				table.ajax.reload()
			},
			error(err) {
				Swal.fire('', 'terjadi kesalahan saat menghapus rekening', 'error');
			}
		});
	}

	const save = async (btn) => {
		btn.prop('disabled', true)
		const data = $('#form_rekening').serializeArray()
		await $.ajax({
			type: "post",
			url: "<?= base_url('affiliator/rekening/save') ?>",
			data,
			dataType: "json",
			success: function(res) {
				if (res.status) {
					$('#modal_rekening').modal('hide');
					Swal.fire("", "Berhasil menyimpan data", "success");
					table.ajax.reload();
					$('#form_rekening').find('.text-danger').remove()
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