<!--begin::Body-->

<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">

    <!--begin::Main-->

   
                                    <!--begin::Profile Card-->
                                    <div class="card" style="width: 30rem;">
                                        <!--begin::Body-->
                                        <div class="card-body">
                                            <!--begin::User-->
                                            <div class="d-flex align-self-start">
                                                <div class="symbol symbol-60 symbol-xxl-100 mr-3 align-self-start align-self-xxl-center">
                                                    <img class="rounded float-start" src="<?= base_url('assets/media/users/default.jpg');?>">
                                                    <i class="symbol-badge bg-success"></i>
                                                </div>
                                                <div class="align-self-center mb-3 ">
                                                    <a href="#" class="font-weight-bolder font-size-h5 text-dark-75 text-hover-primary">
                                                        <?= $tb_users['nama_lengkap']; ?>
                                                    </a>
                                                    <div class="text-muted">
                                                        Affiliator
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::User-->

                                            <!--begin::Contact-->
                                            <div class="py-6">
                                                <div class="d-flex align-items-center justify-content-between mb-3">
                                                    <span class="text"><?= $tb_users['nama_lengkap']; ?></span>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between mb-3">
                                                    <span class="text"><?= $tb_users['email']; ?></span>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between mb-3">
                                                    <span class="text"><?= $tb_users['no_hp']; ?></span>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between mb-3">
                                                    <span class="text"><?= $tb_users['alamat_lengkap']; ?></span>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between mb-3">
                                                    <span class="text-muted">Member since <?= date('d F Y', $tb_users['created_at']); ?></span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                                        <button type="button" class="btn btn-light-danger font-weight-bold btn-sm">Deactivate your account ?</button>
                                                    </div>
                                                </div>
                                            <!--end::Contact-->
                                                <!--begin::Form Group-->
                                                

                                        </form>
                                        <!--end::Form-->
                                    </div>
                                    <!--end::Card-->
                                </div>
                                <!--end::Content-->
                            <!-- </div> -->
                            <!--end::Profile Account Information-->
                        </div>
                        <!--end::Container-->
                    </div>
                    <!--end::Entry-->
                </div>
                <!--end::Content-->

            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Main-->

</body>
<!--end::Body-->

</html>