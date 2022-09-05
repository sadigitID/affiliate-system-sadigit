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
								<option value="">No Selected</option>

								<?php
								foreach($namaUser as $nama){ ?>
									<option value="<?=$nama->id_user?>"><?=$nama->nama_lengkap?></option>
								<?php } ?>

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
			<h3 class="card-label">data bonus affiliator</h3>
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
		<!-- Button print PDF -->
		<div class="card-toolbar">
			<span class="btn btn-light-primary svg-icon svg-icon-primary svg-icon-2x" onclick="printPDF()"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Devices\Printer.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
					<rect x="0" y="0" width="24" height="24"/>
					<path d="M16,17 L16,21 C16,21.5522847 15.5522847,22 15,22 L9,22 C8.44771525,22 8,21.5522847 8,21 L8,17 L5,17 C3.8954305,17 3,16.1045695 3,15 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,15 C21,16.1045695 20.1045695,17 19,17 L16,17 Z M17.5,11 C18.3284271,11 19,10.3284271 19,9.5 C19,8.67157288 18.3284271,8 17.5,8 C16.6715729,8 16,8.67157288 16,9.5 C16,10.3284271 16.6715729,11 17.5,11 Z M10,14 L10,20 L14,20 L14,14 L10,14 Z" fill="#000000"/>
					<rect fill="#000000" opacity="0.3" x="8" y="2" width="8" height="2" rx="1"/>
				</g>
			</svg><!--end::Svg Icon--> Print PDF</span>
		</div>
		<!-- Button print Excel -->
		<div class="card-toolbar">
			<span class="btn btn-light-primary svg-icon svg-icon-primary svg-icon-2x" onclick="printExcel()"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Devices\Printer.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
					<rect x="0" y="0" width="24" height="24"/>
					<path d="M16,17 L16,21 C16,21.5522847 15.5522847,22 15,22 L9,22 C8.44771525,22 8,21.5522847 8,21 L8,17 L5,17 C3.8954305,17 3,16.1045695 3,15 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,15 C21,16.1045695 20.1045695,17 19,17 L16,17 Z M17.5,11 C18.3284271,11 19,10.3284271 19,9.5 C19,8.67157288 18.3284271,8 17.5,8 C16.6715729,8 16,8.67157288 16,9.5 C16,10.3284271 16.6715729,11 17.5,11 Z M10,14 L10,20 L14,20 L14,14 L10,14 Z" fill="#000000"/>
					<rect fill="#000000" opacity="0.3" x="8" y="2" width="8" height="2" rx="1"/>
				</g>
			</svg><!--end::Svg Icon--> Print Excel</span>
		</div>
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

	function printExcel() {
		window.location.href="<?= base_url('admin/bonus_excel'); ?>";
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