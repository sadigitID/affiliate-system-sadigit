
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <span class="card-icon"><i class="flaticon-squares-1 text-primary"></i></span>
            <h3 class="card-label">Change Password</h3>
        </div>
    </div>
    <div class="card-body">

        <?= $this->session->flashdata('message'); ?>

        <form action="<?= base_url('auth/change_password'); ?>" method="post">
            <div class="form-group row">
                <label class="col-2 col-form-label">Password Lama</label>
                <div class="col-10">
                    <input class="form-control" type="password" name="password_lama">
                    <?= form_error('password_lama', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2 col-form-label">Password Baru</label>
                <div class="col-10">
                    <input class="form-control" type="password" name="new_password1">
                    <?= form_error('new_password1', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2 col-form-label">Konfirmasi Password Baru</label>
                <div class="col-10">
                    <input class="form-control" type="password" name="new_password2">
                    <?= form_error('new_password2', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group d-flex flex-wrap">
                <button type="submit" id="kt_login_forgot_form_submit_button" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-4">Save</button>
            </div>
        </form>


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