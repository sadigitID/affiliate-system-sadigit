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
                                                    <div class="symbol-label" style="background-image:url('assets/media/users/300_21.jpg')"></div>
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





    <!-- begin::User Panel-->

    <!-- end::User Panel-->


    <!--begin::Quick Cart-->

    <!--end::Quick Cart-->

    <!--begin::Quick Panel-->

    <!--end::Quick Panel-->

    <!--begin::Chat Panel-->

    <!--end::Chat Panel-->

    <!--begin::Scrolltop-->

    <!--end::Scrolltop-->

    <!--begin::Sticky Toolbar-->

    <!--end::Sticky Toolbar-->
    <!--begin::Demo Panel-->

    <!--end::Demo Panel-->

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
    <script src="assets/plugins/global/plugins.bundle.js"></script>
    <script src="assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
    <script src="assets/js/scripts.bundle.js"></script>
    <!--end::Global Theme Bundle-->


    <!--begin::Page Scripts(used by this page)-->
    <script src="assets/js/pages/widgets.js"></script>
    <script src="assets/js/pages/custom/profile/profile.js"></script>
    <!--end::Page Scripts-->
</body>
<!--end::Body-->

</html>