<!-- start of modal tambah bonus -->
<div class="modal" id="modal_confirm" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Konfirmasi Pesanan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="form_confirm">
				<div class="modal-body">
                    <button type="button" class="btn btn-light-primary" onclick="selesaikan($(this))">Selesaikan</button>
				    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- end of modal tambah bonus -->

<div class="card card-custom">
	<div class="card-header">
		<div class="card-title">
			<span class="card-icon"><i class="flaticon-squares-1 text-primary"></i></span>
			<h3 class="card-label">Data Pesanan</h3>
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
					<th>Status Pesanan</th>
                    <th>Tanggal Pembayaran</th>
                    <th>Foto Bukti Pembayaran</th>
                    <th>Nama Affiliator</th>
                    <th>Jumlah Komisi</th>
                    <th>Status Komisi</th>
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
				"url": '<?= base_url('admin/pesanan/tb_pesanan/') ?>',
				"type": "POST"
			},
			"ordering": false
		});
	})

    const _confirm = async () => {
		$('#form_confirm')[0].reset()
		$('#modal_confirm').modal('show')
	}

    const selesaikan = async (btn) => {
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