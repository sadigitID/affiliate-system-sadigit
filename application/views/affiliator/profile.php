<!--begin::Body-->
<body  id="kt_body"  class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading"  >
<!--begin::Container-->
<div class=" container ">
    <!--begin::Profile 2-->
    <div class="d-flex flex-row">
            <!--begin::Aside-->
            <div class="flex-row-auto offcanvas-mobile w-300px w-xxl-350px" id="kt_profile_aside">
                <!--begin::Card-->
                <div class="card card-custom card-stretch">
                    <!--begin::Body-->
                    <div class="card-body pt-4">
                         <!--begin::Toolbar-->
                            <div class="d-flex justify-content-end">
                                <div class="dropdown dropdown-inline">
                                    <i class="ki ki-bold-more-hor"></i>
                                </div>  
                            </div>
                            <!--end::Toolbar-->
                            
                        <!--begin::User-->
                        <div class="d-flex align-items-center">
                            <div class="symbol symbol-60 symbol-xxl-100 mr-5 align-self-start align-self-xxl-center">
                                <div class="symbol-label" style="background-image:url('assets/media/users/300_21.jpg')"></div>
                                <i class="symbol-badge bg-success"></i>
                            </div>
                            <div>
                                <a href="<?= base_url().'affiliator/profile/' ?>" class="font-weight-bolder font-size-h5 text-dark-75 text-hover-primary">
                                    <?= $user['nama_lengkap']; ?>
                                </a>
                                <div class="text-muted">
                                    <?= $user['role']; ?>
                                </div>
                                <div class="mt-2">
                                    <a href="<?= $user['link_fb']; ?>" class="btn btn-icon btn-circle btn-light-facebook mr-2 "><i class="socicon-facebook"></i></a>
                                    <a href="<?= $user['link_ig']; ?>" class="btn btn-icon btn-circle btn-light-instagram mr-2"><i class="socicon-instagram"></i></a>
                                    <a href="<?= $user['link_yutub']; ?>" class="btn btn-icon btn-circle btn-light-youtube"><i class="socicon-youtube"></i></a>
                                </div>
                            </div>
                        </div>
                        <!--end::User-->

                        <!--begin::Contact-->
                        <div class="py-9">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="font-weight-bold mr-2">Name:</span>
                                <span class="text-muted"><?= $user['nama_lengkap']; ?></span>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="font-weight-bold mr-2">Email:</span>
                                <span class="text-muted"><?= $user['email']; ?></span>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <span class="font-weight-bold mr-2">Phone:</span>
                                <span class="text-muted"><?= $user['no_hp']; ?></span>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <span class="font-weight-bold mr-2">Location:</span>
                                <span class="text-muted"><?= $user['alamat_lengkap']; ?></span>
                            </div>
                        </div>
                        <!--end::Contact-->

                        <!--begin::Nav-->
                        <div class="navi navi-bold navi-hover navi-active navi-link-rounded">
                            <div class="navi-item mb-2">
                                <a href="<?= base_url().'affiliator/profile/' ?>" class="navi-link py-4 active">
                                    <span class="navi-icon mr-2">
                                        <span class="svg-icon"><!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24"/>
                                                <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero"/>
                                                <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3"/>
                                            </g>
                                        </svg><!--end::Svg Icon--></span>                   
                                    </span>
                                    <span class="navi-text font-size-lg">
                                        Personal Information
                                    </span>
                                </a> 
                            </div>
                            <div class="navi-item mb-2">
                                <a href="<?= base_url().'affiliator/edit_profile/' ?>" class="navi-link py-4 ">
                                    <span class="navi-icon mr-2">
                                        <span class="svg-icon"><!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24"/>
                                                <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero"/>
                                                <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3"/>
                                            </g>
                                        </svg><!--end::Svg Icon--></span>                   
                                    </span>
                                    <span class="navi-text font-size-lg">
                                        Change Personal Information
                                    </span>
                                </a> 
                            </div>
                            <div class="navi-item mb-2">
                                <a  href="<?= base_url('affiliator/change_password/') ?>" class="navi-link py-4 ">
                                    <span class="navi-icon mr-2">
                                        <span class="svg-icon"><!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24"/>
                                                <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
                                            </g>
                                        </svg><!--end::Svg Icon--></span>                   
                                    </span>
                                    <span class="navi-text font-size-lg">
                                        Change Passwort
                                    </span>
                                </a>
                            </div>
                        </div>
                        <!--end::Nav-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Aside-->

    <div class="flex-row-fluid ml-lg-8">
        <!--begin::Advance Table: Widget 7-->
        <div class="card card-custom gutter-b">
            <!--begin::Header-->
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label font-weight-bolder text-dark">Personal Information</span>
                    <span class="text-muted font-weight-bold font-size-sm mt-3">Member since <?= date('d F Y',strtotime($user['created_at'])); ?></span>
                </h3>
            </div>
            <!--end::Header-->

            <!--begin::Body-->
            <div class="card-body pt-2 pb-0 mt-n3">
                <div class="tab-content mt-5" id="myTabTables12">
                    <!--begin::Tap pane-->
                    <div class="tab-pane fade show active" id="kt_tab_pane_12_3" role="tabpanel" aria-labelledby="kt_tab_pane_12_3">
                        <!--begin::Table-->
                        <div class="table">
                                <!-- <tbody> -->
                                    <!--begin::Form Group-->
                                    <div class="form-group row">
                                        <div class=" col-xl-12 d-flex align-items-center justify-content-between ">
                                            <span class="font-weight-bold mr-6">Name Full:</span>
                                            <span class="text-muted"><?= $user['nama_lengkap']; ?></span>
                                        </div>
                                    </div>
                                    <!--end::Form Group-->
                                    <!--begin::Form Group-->
                                    <div class="form-group row">
                                        <div class=" col-xl-12 col-lg-3 d-flex align-items-center justify-content-between ">
                                            <span class="font-weight-bold mr-6">Province:</span>
                                            <span class="text-muted"><?= $user['province_name']; ?></span>
                                        </div>
                                    </div>
                                    <!--end::Form Group-->
                                    <!--begin::Form Group-->
                                    <div class="form-group row">
                                        <div class=" col-xl-12 col-lg-3 d-flex align-items-center justify-content-between ">
                                            <span class="font-weight-bold mr-6">County/City:</span>
                                            <span class="text-muted"><?= $user['city_name']; ?></span>
                                        </div>
                                    </div>
                                    <!--end::Form Group-->
                                    <!--begin::Form Group-->
                                    <div class="form-group row">
                                        <div class=" col-xl-12 col-lg-3 d-flex align-items-center justify-content-between ">
                                            <span class="font-weight-bold mr-6">District:</span>
                                            <span class="text-muted"><?= $user['district_name']; ?></span>
                                        </div>
                                    </div>
                                    <!--end::Form Group-->
                                    <!--begin::Form Group-->
                                    <div class="form-group row">
                                        <div class=" col-xl-12 col-lg-3 d-flex align-items-center justify-content-between ">
                                            <span class="font-weight-bold mr-6">Complete Address:</span>
                                            <span class="text-muted"><?= $user['alamat_lengkap']; ?></span>
                                        </div>
                                    </div>
                                    <!--begin::Form Group-->
                                    <div class="form-group row">
                                        <div class=" col-xl-12 col-lg-3 d-flex align-items-center justify-content-between ">
                                            <span class="font-weight-bold mr-6">Email Address:</span>
                                            <span class="text-muted"><?= $user['email']; ?></span>
                                        </div>
                                    </div>
                                    <!--end::Form Group-->
                                    <!--begin::Form Group-->
                                    <div class="form-group row">
                                        <div class=" col-xl-12 col-lg-3 d-flex align-items-center justify-content-between ">
                                            <span class="font-weight-bold mr-6">Phone Number:</span>
                                            <span class="text-muted"><?= $user['no_hp']; ?></span>
                                        </div>
                                    </div>
                                    <!--end::Form Group-->
                                <!-- </tbody> -->
                        </div>
                        <!--end::Table-->
                    </div>
                    <!--end::Tap pane-->
                </div>
            </div>
            <!--end::Body-->
        </div>
        <!--end::Advance Table Widget 7-->
    </div>

    </div>
    <!--end::Profile 2-->
</div>    
<!--end::Container-->
</body>
<!--end::Body-->
</html>