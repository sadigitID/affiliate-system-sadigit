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
                        <?= $user['nama_lengkap']; ?>
                    </a>
                    <div class="text-muted">
                        Affiliator
                    </div>
                </div>
            </div>
            <!--end::User-->

            <!--begin::Contact-->
            <div class="py-6">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="font-weight-bold mr-2">Name:</span>
                    <span class="text-muted"><?= $user['nama_lengkap']; ?></span>
                </div>
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="font-weight-bold mr-2">Email:</span>
                    <span class="text-muted"><?= $user['email']; ?></span>
                </div>
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="font-weight-bold mr-2">Phone:</span>
                    <span class="text-muted"><?= $user['no_hp']; ?></span>
                </div>
                <div class="d-flex align-items-center justify-content-between">
                    <span class="font-weight-bold mr-2">Location:</span>
                    <span class="text-muted"><?= $user['alamat_lengkap']; ?></span>
                </div>
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <span class="text-muted">Member since <?= date('d F Y', $user['created_at']); ?></span>
                </div>
            </div>

            <!--end::Contact-->
        </div>
        <!--end::Card-->
    </div>
    <!--end::Content-->
</body>
<!--end::Body-->
</html>