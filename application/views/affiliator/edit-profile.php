<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <span class="card-icon"><i class="flaticon-squares-1 text-primary"></i></span>
            <h3 class="card-label">Total Komisi</h3>
        </div>
    </div>
    <div class="card-body">
        <?= form_open_multipart('affiliator/edit_profile'); ?>
        <div class="form-group row">
            <label class="col-2 col-form-label">Nama Lengkap</label>
            <div class="col-10">
                <input class="form-control" type="text" name="nama" value="<?= $tb_users['nama_lengkap']; ?>">
                <?= form_error('nama_lengkap', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-2 col-form-label">Provinsi</label>
            <div class="col-10">
                <input class="form-control" type="text" name="provinsi" value="<?= $tb_users['provinsi']; ?>">
                <?= form_error('provinsi', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-2 col-form-label">Kabupaten</label>
            <div class="col-10">
                <input class="form-control" type="text" name="kabupaten" value="<?= $tb_users['kabupaten']; ?>">
                <?= form_error('kabupaten', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-2 col-form-label">Kecamatan</label>
            <div class="col-10">
                <input class="form-control" type="text" name="kecamatan" value="<?= $tb_users['kecamatan']; ?>">
                <?= form_error('kecamatan', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-2 col-form-label">Alamat Lengkap</label>
            <div class="col-10">
                <input class="form-control" type="text" name="alamat_lengkap" value="<?= $tb_users['alamat_lengkap']; ?>">
                <?= form_error('alamat_lengkap', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-2 col-form-label">Email</label>
            <div class="col-10">
                <input class="form-control" type="text" name="email" value="<?= $tb_users['email']; ?>" readonly>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-2 col-form-label">No Handphone</label>
            <div class="col-10">
                <input class="form-control" type="text" name="no_hp" value="<?= $tb_users['no_hp']; ?>">
                <?= form_error('no_hp', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
        </div>
        <div class="form-group d-flex flex-wrap">
            <button type="submit" id="kt_login_forgot_form_submit_button" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-4">Save</button>
        </div>


        <!--begin: Datatable-->
        <!-- <table class="table table-bordered" id="table" style="margin-top: 13px !important">
			<thead>
				<tr>
					<th>No</th>
					<th>Keterangan</th>
                    <th>Jumlah</th>
                    <th>Tanggal</th>
				</tr>
			</thead>
		</table> -->
        <!--end: Datatable-->
        <!-- </div> -->
    </div>
    <!--end::Card-->

    <!-- script area -->
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
    </script>