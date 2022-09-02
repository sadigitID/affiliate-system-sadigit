<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <base href="../../../../">
    <meta charset="utf-8" />
    <title>Sign Up | AFFILIATE</title>
    <meta name="description" content="Singin page example" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="canonical" href="https://keenthemes.com/metronic" />

    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->


    <!--begin::Page Custom Styles(used by this page)-->
    <link href="<?= base_url(''); ?>/assets/css/pages/login/login-3.css" rel="stylesheet" type="text/css" />
    <!--end::Page Custom Styles-->

    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="<?= base_url(''); ?>/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(''); ?>/assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(''); ?>/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles-->

    <!--begin::Layout Themes(used by all pages)-->

    <link href="<?= base_url(''); ?>/assets/css/themes/layout/header/base/light.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(''); ?>/assets/css/themes/layout/header/menu/light.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(''); ?>/assets/css/themes/layout/brand/dark.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(''); ?>/assets/css/themes/layout/aside/dark.css" rel="stylesheet" type="text/css" />
    <!--end::Layout Themes-->

    <link rel="shortcut icon" href="<?= base_url(''); ?>/assets/media/logos/favicon.ico" />

</head>
<!--end::Head-->

<!--begin::Body-->

<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">

    <!--begin::Main-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Login-->
        <div class="login login-3 wizard d-flex flex-column flex-lg-row flex-column-fluid wizard" id="kt_login">
            <!--begin::Aside-->
            <div class="login-aside d-flex flex-column flex-row-auto">
                <!--begin::Aside Top-->
                <div class="d-flex flex-column-auto flex-column pt-15 px-30">
                    <!--begin::Aside header-->
                    <a href="#" class="login-logo py-6">
                        <img src="<?= base_url(''); ?>/assets/media/logos/logo-1.png" class="max-h-70px" alt="" />
                    </a>
                    <!--end::Aside header-->

                    <!--begin: Wizard Nav-->
                    <div class="wizard-nav pt-5 pt-lg-30">
                        <!--begin::Wizard Steps-->
                        <div class="wizard-steps">
                        </div>
                        <!--end::Wizard Steps-->
                    </div>
                    <!--end: Wizard Nav-->
                </div>
                <!--end::Aside Top-->

                <!--begin::Aside Bottom-->
                <div class="aside-img-wizard d-flex flex-row-fluid bgi-no-repeat bgi-position-y-bottom bgi-position-x-center pt-2 pt-lg-5" style="background-position-y: calc(100% + 3rem); background-image: url(<?= base_url(''); ?>/assets/media/svg/illustrations/features.svg)">
                </div>
                <!--end::Aside Bottom-->
            </div>
            <!--begin::Aside-->

            <!--begin::Content-->
            <div class="login-content flex-column-fluid d-flex flex-column p-10">
                <!--begin::Wrapper-->
                <div class="d-flex flex-row-fluid flex-center">
                    <!--begin::Signin-->
                    <div class="login-form login-form-signup">
                        <!--begin::Form-->
                        <form class="form" method="POST" action="<?= base_url('auth/registration'); ?>" novalidate="novalidate" id="kt_login_signup_form">
                            <!--begin: Wizard Step 1-->
                            <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                                <!--begin::Title-->
                                <div class="pb-10 pb-lg-15">
                                    <h3 class="font-weight-bolder text-dark display5">Create Account</h3>
                                    <div class="text-muted font-weight-bold font-size-h4">
                                        Already have an Account ?
                                        <a href="<?= base_url('auth'); ?>" class="text-primary font-weight-bolder">Sign In</a>
                                    </div>
                                </div>
                                <!--begin::Title-->

                                <!--begin::Form Group-->
                                <div class="form-group">
                                    <label class="font-size-h6 font-weight-bolder text-dark">Nama</label>
                                    <input type="text" class="form-control h-auto py-7 px-6 border-0 rounded-lg font-size-h6" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap" value="<?= set_value('nama_lengkap') ?>" required />
                                    <?= form_error('nama_lengkap', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <!--end::Form Group-->

                                <!--begin::Form Group-->
                                <div class="form-group">
                                    <label class="font-size-h6 font-weight-bolder text-dark">Password</label>
                                    <input type="password" class="form-control h-auto py-7 px-6 border-0 rounded-lg font-size-h6" name="password" placeholder="Password" required />
                                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <!--end::Form Group-->
                                <!--begin::Form Group-->
                                <div class="form-group">
                                    <label class="font-size-h6 font-weight-bolder text-dark">Provinsi</label>
                                    <select id='provinces' class="form-control h-auto py-7 px-6 border-0 rounded-lg font-size-h6">
                                        <option>-- Pilih Provinsi --</option>
                                        <?php
                                        foreach ($provinces as $province) {
                                            echo '<option value="' . $province['province_id'] . '">' . $province['province_name'] . '</option>';
                                        } ?>
                                    </select>
                                    <!-- <input type="text" class="form-control h-auto py-7 px-6 border-0 rounded-lg font-size-h6" name="province_id" id="province_id" placeholder="Provinsi" value="<?= set_value('province_id') ?>" required />
                                    <?= form_error('provinsi', '<small class="text-danger pl-3">', '</small>'); ?>  -->
                                </div>
                                <!--end::Form Group-->
                                <!--begin::Form Group-->
                                <div class="form-group">
                                    <label class="font-size-h6 font-weight-bolder text-dark">Kabupaten</label>
                                    <select id='cities' class="form-control h-auto py-7 px-6 border-0 rounded-lg font-size-h6">
                                        <option>-- Pilih Kabupaten --</option>
                                    </select>
                                    <!-- <input type="text" class="form-control h-auto py-7 px-6 border-0 rounded-lg font-size-h6" name="city_id" id="city_id" placeholder="Kabupaten/Kota" value="<?= set_value('city_id') ?>" required />
                                    <?= form_error('kabupaten', '<small class="text-danger pl-3">', '</small>'); ?> -->
                                </div>
                                <!--end::Form Group-->
                                <!--begin::Form Group-->
                                <div class="form-group">
                                    <label class="font-size-h6 font-weight-bolder text-dark">Kecamatan</label>
                                    <select id='districts' class="form-control h-auto py-7 px-6 border-0 rounded-lg font-size-h6">
                                        <option value="">-- Pilih Kecamatan --</option>
                                    </select>
                                    <!-- <input type="text" class="form-control h-auto py-7 px-6 border-0 rounded-lg font-size-h6" name="district_id" id="district_id" placeholder="Kecamatan" value="<?= set_value('district_id') ?>" required />
                                    <?= form_error('kecamatan', '<small class="text-danger pl-3">', '</small>'); ?> -->
                                </div>
                                <!--end::Form Group-->

                                <!--begin::Form Group-->
                                <div class="form-group">
                                    <label class="font-size-h6 font-weight-bolder text-dark">Alamat Lengkap</label>
                                    <input type="text" class="form-control h-auto py-7 px-6 border-0 rounded-lg font-size-h6" name="alamat_lengkap" placeholder="ALamat Lengkap" value="<?= set_value('alamat_lengkap') ?>" required />
                                    <?= form_error('alamat_lengkap', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <!--end::Form Group-->
                                <!--begin::Form Group-->
                                <div class="form-group">
                                    <label class="font-size-h6 font-weight-bolder text-dark">Email</label>
                                    <input type="text" class="form-control h-auto py-7 px-6 border-0 rounded-lg font-size-h6" name="email" placeholder="Email" value="<?= set_value('email') ?>" />
                                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <!--end::Form Group-->

                                <!--begin::Form Group-->
                                <div class="form-group">
                                    <label class="font-size-h6 font-weight-bolder text-dark">No Telephon</label>
                                    <input type="text" class="form-control h-auto py-7 px-6 border-0 rounded-lg font-size-h6" name="no_hp" placeholder="No telephon" value="<?= set_value('no_hp') ?>" required />
                                    <?= form_error('no_hp', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <!--end::Form Group-->

                                <!--begin::Form Group-->
                                <div class="form-group">
                                    <label class="font-size-h6 font-weight-bolder text-dark">Link Akun Tiktok</label>
                                    <input type="text" class="form-control h-auto py-7 px-6 border-0 rounded-lg font-size-h6" name="link_tiktok" placeholder="Link Akun Tiktok" value="<?= set_value('link_tiktok') ?>" required />
                                    <?= form_error('link_tiktok', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <!--end::Form Group-->
                                <!--begin::Form Group-->
                                <div class="form-group">
                                    <label class="font-size-h6 font-weight-bolder text-dark">Link Akun Facebook</label>
                                    <input type="text" class="form-control h-auto py-7 px-6 border-0 rounded-lg font-size-h6" name="link_fb" placeholder="Link Akun Facebook" value="<?= set_value('link_fb') ?>" required />
                                    <?= form_error('link_fb', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <!--end::Form Group-->
                                <!--begin::Form Group-->
                                <div class="form-group">
                                    <label class="font-size-h6 font-weight-bolder text-dark">Link Akun Instagram</label>
                                    <input type="text" class="form-control h-auto py-7 px-6 border-0 rounded-lg font-size-h6" name="link_ig" placeholder="Link Akun Instagram" value="<?= set_value('link_ig') ?>" required />
                                    <?= form_error('link_ig', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <!--end::Form Group-->
                                <!--begin::Form Group-->
                                <div class="form-group">
                                    <label class="font-size-h6 font-weight-bolder text-dark">Link Akun Youtube</label>
                                    <input type="text" class="form-control h-auto py-7 px-6 border-0 rounded-lg font-size-h6" name="link_yutub" placeholder="Link Akun Youtube" value="<?= set_value('link_yutub') ?>" required />
                                    <?= form_error('link_yutub', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <!--end::Form Group-->
                                <div class="form-group d-flex flex-wrap">
                                    <button type="submit" id="kt_login_forgot_form_submit_button" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-4">Submit</button>
                                </div>


                                <!--begin: Wizard Actions-->
                                <div class="d-flex justify-content-between pt-3">

                                </div>
                                <!--end: Wizard Actions-->
                            </div>
                            <!--end: Wizard Step 1-->

                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Signin-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Login-->
    </div>
    <!--end::Main-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type='text/javascript'>
        var baseURL = "<?php echo base_url(); ?>";

        $(document).ready(function() {
            $('#provinces').change(function() {
                var provinces = $(this).val();

                $.ajax({
                    url: '<?= base_url('Dropdowns/get_city/') ?>',
                    method: 'post',
                    data: {
                        provinces: provinces
                    },
                    dataType: 'json',
                    success: function(response) {
                        $('#cities').find('option').not(':first').remove();
                        $('#districts').find('option').not(':first').remove();

                        $.each(response, function(index, data) {
                            $('#cities').append('<option value="' + data['city_id'] + '">' + data['city_name'] + '</option>');
                        });
                    }
                });
            });

            $('#cities').change(function() {
                var cities = $(this).val();

                $.ajax({
                    url: '<?= base_url('Dropdowns/get_district/') ?>',
                    method: 'post',
                    data: {
                        cities: cities
                    },
                    dataType: 'json',
                    success: function(response) {
                        $('#districts').find('option').not(':first').remove();

                        $.each(response, function(index, data) {
                            $('#districts').append('<option value="' + data['district_id'] + '">' + data['district_name'] + '</option>');
                        });
                    }
                });
            });

        });
    </script>

    <script>
        var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";
    </script>
    <!--begin::Global Config(global config for global JS scripts)-->
    <script>
        var KTAppSettings = {
            "breakpoints": {
                "sm": 576,
                "md": 768,
                "lg": 992,
                "xl": 1200,
                "xxl": 1400
            },
            "colors": {
                "theme": {
                    "base": {
                        "white": "#ffffff",
                        "primary": "#3699FF",
                        "secondary": "#E5EAEE",
                        "success": "#1BC5BD",
                        "info": "#8950FC",
                        "warning": "#FFA800",
                        "danger": "#F64E60",
                        "light": "#E4E6EF",
                        "dark": "#181C32"
                    },
                    "light": {
                        "white": "#ffffff",
                        "primary": "#E1F0FF",
                        "secondary": "#EBEDF3",
                        "success": "#C9F7F5",
                        "info": "#EEE5FF",
                        "warning": "#FFF4DE",
                        "danger": "#FFE2E5",
                        "light": "#F3F6F9",
                        "dark": "#D6D6E0"
                    },
                    "inverse": {
                        "white": "#ffffff",
                        "primary": "#ffffff",
                        "secondary": "#3F4254",
                        "success": "#ffffff",
                        "info": "#ffffff",
                        "warning": "#ffffff",
                        "danger": "#ffffff",
                        "light": "#464E5F",
                        "dark": "#ffffff"
                    }
                },
                "gray": {
                    "gray-100": "#F3F6F9",
                    "gray-200": "#EBEDF3",
                    "gray-300": "#E4E6EF",
                    "gray-400": "#D1D3E0",
                    "gray-500": "#B5B5C3",
                    "gray-600": "#7E8299",
                    "gray-700": "#5E6278",
                    "gray-800": "#3F4254",
                    "gray-900": "#181C32"
                }
            },
            "font-family": "Poppins"
        };
    </script>
    <!--end::Global Config-->

    <!--begin::Global Theme Bundle(used by all pages)-->
    <script src="<?= base_url(''); ?>/assets/plugins/global/plugins.bundle.js"></script>
    <script src="<?= base_url(''); ?>/assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
    <script src="<?= base_url(''); ?>/assets/js/scripts.bundle.js"></script>
    <!--end::Global Theme Bundle-->


    <!--begin::Page Scripts(used by this page)-->
    <script src="<?= base_url(''); ?>/assets/js/pages/custom/login/login-3.js"></script>
    <!--end::Page Scripts-->


</body>
<!-- end::Body -->

</html>