<!--begin::Body-->

<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">

    <!--begin::Main-->
    <!--begin::Card-->
    <div class="card card-custom">
        <!--begin::Header-->
        <div class="card-header py-3">
            <div class="card-title align-items-start flex-column">
                <h3 class="card-label font-weight-bolder text-dark">Account Information</h3>
                <span class="text-muted font-weight-bold font-size-sm mt-1">Change your password</span>
            </div>
            <?= $this->session->flashdata('message'); ?>
        </div>
        <!--end::Header-->
        <!--begin::Form-->
        <form method="post" action="<?= base_url('affiliator/Change_password/change_password'); ?>" class="form offcanvas-mobile w-350px w-xxl-750px">
            <div class="card-body offcanvas-mobile w-350px w-xxl-1000px">
                <!--begin::Heading-->
                <!--begin::Form Group-->
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">Password Lama</label>
                    <div class="col-lg-9 col-xl-6">
                        <div class="input-group input-group-lg input-group-solid">
                            <input type="password" id="password" name="password" class="form-control form-control-lg form-control-solid" value="" />
                        </div>
                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <!--begin::Form Group-->
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">Password Baru</label>
                    <div class="col-lg-9 col-xl-6">
                        <div class="input-group input-group-lg input-group-solid">
                            <input type="password" id="password1" name="password1" class="form-control form-control-lg form-control-solid" value="" />
                        </div>
                        <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <!--begin::Form Group-->
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">Konfirmasi Password Baru</label>
                    <div class="col-lg-9 col-xl-6">
                        <div class="input-group input-group-lg input-group-solid">
                            <input type="password" id="password2" name="password2" class="form-control form-control-lg form-control-solid" value="" />
                        </div>
                        <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-3 col-xl-6">
                        <button type="sumbit" class="btn btn-success mr-2">Save Changes</button>
                    </div>
                </div>
            </div>
    </div>

    </form>
    <!--end::Form-->
    </div>
    <!--end::Card-->
    </div>
    <!--end::Main-->

</body>
<!--end::Body-->

</html>