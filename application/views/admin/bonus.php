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
					<input class="form-control " type="hidden" placeholder="tanggal_bonus" id="tanggal_bonus" name="tanggal_bonus" autocomplete="off" value="<?php echo date("Y-m-d") ?>" />
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
			<div class="d-grid gap-2 d-md-block">
				<span class="btn btn-light-primary" onclick="tambahBonus()">Tambah Bonus</span>

				<!--begin::Dropdown-->
				<div class="dropdown dropdown-inline mr-2">
                <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="svg-icon svg-icon-md">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/Design/PenAndRuller.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"></rect>
                                <path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3"></path>
                                <path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000"></path>
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span> Export
                </button>

                <!--begin::Dropdown Menu-->
                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                    <!--begin::Navigation-->
                    <ul class="navi flex-column navi-hover py-2">
                        <li class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">
                            Choose an option:
                        </li>
                        <li class="navi-item">
							<a href="<?= base_url('admin/reportbonus_pdf') ?>" class="navi-link">
								<span class="navi-icon"><i class="la la-file-pdf-o"></i></span>
								<span class="navi-text">PDF</span>
							</a>
                        </li>
                        <li class="navi-item">
                            <a href="<?= base_url('admin/reportbonus_excel') ?>" class="navi-link">
                                <span class="navi-icon"><i class="la la-file-excel-o"></i></span>
                                <span class="navi-text">Excel</span>
                            </a>
                        </li>
                    </ul>
                    <!--end::Navigation-->
                </div>
                <!--end::Dropdown Menu-->
            </div>
            <!--end::Dropdown-->
			</div>
		</div>
	</div>
	<div class="card-body">
		<!--begin: Datatable-->
		<table class="table table-bordered" id="table" style="margin-top: 13px !important">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama user</th>
					<th>Jumlah bonus</th>
					<th>Catatan</th>
					<th>Tanggal bonus</th>
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