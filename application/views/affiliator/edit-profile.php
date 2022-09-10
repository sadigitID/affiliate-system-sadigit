<!--begin::Body-->
<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
    <div class=" container ">
        <!--begin::Profile Account Information-->
        <div class="d-flex flex-row">
            <!--begin::Aside-->
            <div class="flex-row-auto offcanvas-mobile w-250px w-xxl-350px" id="kt_profile_aside">
                <!--begin::Profile Card-->
                <div class="card card-custom card-stretch">
                    <!--begin::Body-->
                    <div class="card-body pt-4">

                        <!--begin::User-->
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-60 symbol-xxl-100 mr-5 align-self-start align-self-xxl-center">
                                    <div class="symbol-label" style="background-image:url('assets/media/users/300_21.jpg')"></div>
                                    <i class="symbol-badge bg-success"></i>
                                </div>
                                <div>
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
                            <div class="py-9">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <span class="text"><?= $user['nama_lengkap']; ?></span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <span class="text"><?= $user['province_name']; ?></span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <span class="text"><?= $user['city_name']; ?></span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <span class="text"><?= $user['district_name']; ?></span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <span class="text"><?= $user['alamat_lengkap']; ?></span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <span class="text"><?= $user['email']; ?></span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <span class="text"><?= $user['no_hp']; ?></span>
                                </div>
                            </div>
                        <!--end::Contact-->

                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Profile Card-->
            </div>
            <!--end::Aside-->

    <!--begin::Content-->
        <div class="flex-fill ml-lg-3">
            <!--begin::Card-->
                <div class="card" style="width: 35rem;">
                    <!--begin::Header-->
                        <div class="card-header">
                            <div class="card-title align-items-start flex-column">
                                <h3 class="card-label font-weight-bolder text-dark">Account Information</h3>
                                <span class="text-muted font-weight-bold font-size-sm mt-1">Change your account settings</span>
                            </div>
                        </div>
                    <!--end::Header-->

                        <!--begin::Form-->
                        <form action="<?= base_url('affiliator/edit_profile/edit_profile'); ?>" method="get" class="form offcanvas-mobile w-350px w-xxl-750px">
                            <div class="card-body offcanvas-mobile w-50px w-xxl-600px">
                            <!--begin::Heading-->
                                <!--begin::Form Group-->
                                <div class="form-group row">
                                    <label class="col-xl-6 col-lg-3 col-form-label">Nama Lengkap</label>
                                    <div class="col-lg-9 col-xl-9">
                                        <div class="input-group input-group-lg input-group-solid">
                                            <input class="form-control form-control-lg form-control-solid" type="text" id="nama_lengkap" name="nama_lengkap" value="<?= $user['nama_lengkap']; ?>" />
                                            <?= form_error('nama_lengkap', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                </div>
                                <!--begin::Form Group-->
                                <div class="form-group row">
                                    <label class="col-xl-6 col-lg-3 col-form-label">Provinsi</label>
                                    <div class="col-lg-9 col-xl-9">
                                        <select id="province_id" name="province_id" class="form-control form-control-lg form-control-solid">
                                            <option value="<?= $user['province_id']; ?>"><?= $user['province_name']; ?></option>
                                            <option >-- Pilih Provinsi --</option>
                                                <?php
                                                foreach($provinces as $province){ ?>
                                                    <option value="<?=$province->province_id?>"><?=$province->province_name?></option>
                                                <?php } ?>
                                        </select>
                                    </div>
                                    <?= form_error('province_id', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <!--begin::Form Group-->
                                <div class="form-group row">
                                    <label id="city_id" name="city_id" class="col-xl-6 col-lg-3 col-form-label">Kabupaten/Kota</label>
                                    <div class="col-lg-9 col-xl-9">
                                        <select class="form-control form-control-lg form-control-solid">
                                            <option value="<?= $user['city_id']; ?>"><?= $user['city_name']; ?></option>
                                            <option>-- Pilih Kabupaten --</option> 
                                        </select>
                                    </div>
                                        <?= form_error('city_id', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <!--begin::Form Group-->

                                <!--begin::Form Group-->
                                <div class="form-group row">
                                    <label class="col-xl-6 col-lg-3 col-form-label">Kecamatan</label>
                                    <div class="col-lg-9 col-xl-9">
                                        <select id="district_id" name="district_id" class="form-control form-control-lg form-control-solid">
                                            <option value="<?= $user['district_id']; ?>"><?= $user['district_name']; ?></option>
                                            <option value="">-- Pilih Kecamatan --</option>
                                        </select>
                                    </div>
                                        <?= form_error('district_id', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <!--begin::Form Group-->
                                <div class="form-group row">
                                    <label class="col-xl-6 col-lg-3 col-form-label">Alamat Lengkap</label>
                                    <div class="col-lg-9 col-xl-9">
                                        <div class="input-group input-group-lg input-group-solid">
                                            <input id="alamat_lengkap" name="alamat_lengkap" class="form-control form-control-lg form-control-solid" type="text" value="<?= $user['alamat_lengkap']; ?>" />
                                            <?= form_error('alamat_lengkap', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                </div>
                                <!--begin::Form Group-->
                                <div class="form-group row">
                                    <label class="col-xl-6 col-lg-3 col-form-label">Email</label>
                                    <div class="col-lg-9 col-xl-9">
                                        <div class="input-group input-group-lg input-group-solid">
                                            <div class="input-group-prepend"><span class="input-group-text"><i class="la la-at"></i></span></div>
                                            <input id="email" name="email" type="text" class="form-control form-control-lg form-control-solid" value="<?= $user['email']; ?>" readonly />
                                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                </div>
                                <!--begin::Form Group-->
                                <div class="form-group row">
                                    <label class="col-xl-6 col-lg-3 col-form-label">No WhatsApp</label>
                                    <div class="col-lg-9 col-xl-9">
                                        <div class="input-group input-group-lg input-group-solid">
                                            <input id="no_hp" name="no_hp" class="form-control form-control-lg form-control-solid" type="text" value="<?= $user['no_hp']; ?>" />
                                        
                                            <?= form_error('no_hp', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-9 col-xl-9"> 
                                        <button type="sumbit" class="btn btn-success mr-2">Save Changes</button>
                                    </div>
                                    </div>
                                </div>
                        </form>
                        <!--END::Form Group-->
                </div>
                <!--end::Card-->
        </div>
    <!--end::Content-->

        </div>
        <!--end::Profile Account Information-->
    </div>
    <!--end::Container-->
</body>
<!--end::Body-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {

            $('#province_id').change(function() {
                var province_id = $('#province_id').val();
                if (province_id != '') {
                    $.ajax({
                        url: "<?php echo base_url(); ?>dropdowns/get_city",
                        method: "POST",
                        data: {
                            province_id: province_id
                        },
                        success: function(data) {
                            $('#city_id').html(data);
                        }
                    });
                } else {
                    $('#city_id').html('<option value="">-- Pilih Kabupaten/Kota --</option>');
                    $('#district_id').html('<option value="">-- Pilih Kecamatan --</option>');
                }
            });

            $('#city_id').change(function() {
                var city_id = $('#city_id').val();
                if (city_id != '') {
                    $.ajax({
                        url: "<?php echo base_url(); ?>dropdowns/get_district",
                        method: "POST",
                        data: {
                            city_id: city_id
                        },
                        success: function(data) {
                            $('#district_id').html(data);
                        }
                    });
                } else {
                    $('#district_id').html('<option value="">-- Pilih Kecamatan --</option>');
                }
            });


        });
    </script>

</html>