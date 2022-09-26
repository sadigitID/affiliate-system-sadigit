<!--begin::Body-->
<body  id="kt_body"  class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading"  >
<!--begin::Container-->
<div class=" container ">
    <!--begin::Profile 2-->
    <div class="d-flex flex-row">
            <!--begin::Aside-->
            <div class="flex-row-auto offcanvas-mobile w-300px w-xl-350px" id="kt_profile_aside">
                <!--begin::Card-->
                <div class="card card-custom">
                    <!--begin::Body-->
                    <div class="card-body pt-15">
                         <!--begin::User-->
                         <div class="text-center mb-10">
                            <div class="symbol symbol-60 symbol-circle symbol-xl-90">
                                <!-- <img class="symbol symbol-60 symbol-circle symbol-xl-90" src="<?= base_url('assets/media/users/default.jpg'); ?>"> -->
			                    <span class="symbol-label text-success text-uppercase font-weight-bolder font-size-h1"><?= substr($this->session->userdata('email'), 0, 3) ?></span>
                                <i class="symbol-badge symbol-badge-bottom bg-success"></i>
                            </div>

                            <h4 class="font-weight-bold my-2">
                                <?= $user['nama_lengkap']; ?>
                            </h4>
                            <div class="text-muted mb-2">
                                Member Since <?= date('d F Y', strtotime($user['created_at'])); ?>
                            </div>
                        </div>
                        <!--end::User-->

                        <!--begin::Contact-->
                        <div class="mb-8 text-center">
                            <a href="<?= $user['link_fb']; ?>" class="btn btn-icon btn-circle btn-light-facebook mr-2">
                                <i class="socicon-facebook"></i>
                            </a>
                            <a href="<?= $user['link_ig']; ?>" class="btn btn-icon btn-circle btn-light-instagram mr-2">
                                <i class="socicon-instagram"></i>
                            </a>
                            <a href="<?= $user['link_yutub']; ?>" class="btn btn-icon btn-circle btn-light-youtube">
                                <i class="socicon-youtube"></i>
                            </a>
                        </div>
                        <!--end::Contact-->

                
                            <!--begin::Contact-->
                            <div class="pt-6 pb-8">
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
                            </div>
                            <!-- <div class="d-flex align-items-center justify-content-between mb-3">
                                <span class="text-muted">Member since <?= date('d F Y',strtotime($user['created_at'])); ?></span>
                            </div> -->
                        <!--end::Contact-->

                        <!--begin::Nav-->
                        <div class="navi navi-bold navi-hover navi-active navi-link-rounded">
                            <div class="navi-item mb-2">
                                <a href="<?= base_url('affiliator/Edit_profile') ?>" class="navi-link py-4 active">
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
                                <a  href="<?= base_url('affiliator/Change_password') ?>" class="navi-link py-4 ">
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

            <!--begin::Content-->
            <div class="flex-row-fluid ml-lg-8">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-lg-6">
                        <!--begin::List Widget 10-->
                        <div class="card card-custom  card-stretch gutter-b">
                            <!--begin::Card-->
                            <div class="card" style="width: 40rem;">
                                <!--begin::Header-->
                                    <div class="card-header">
                                        <div class="card-title align-items-start flex-column">
                                            <h3 class="card-label font-weight-bolder text-dark">Personal Information</h3>
                                            <span class="text-muted font-weight-bold font-size-sm mt-1">Change your personal information</span>
                                        </div>
                                    </div>
                                <!--end::Header-->

                                <!--begin::Form-->
                                <?= $this->session->flashdata('message'); ?>
                                <form action="<?= base_url('affiliator/edit_profile/updateUser') ?>" method="post" class="form offcanvas-mobile w-350px w-xxl-750px" id="editFrm" name="editFrm">
                                    <div class="card-body">
                                    <!--begin::Heading-->
                                    <!--begin::Form Group-->
                                        <div class="form-group row">
                                            <label class="col-xl-6 col-lg-3 col-form-label" for="nama_lengkap">Full Name</label>
                                            <div class="col-lg-9 col-xl-8">
                                                <div class="input-group input-group-lg input-group-solid">
                                                    <input class="form-control form-control-lg form-control-solid" type="text" id="nama_lengkap" name="nama_lengkap" value="<?= $user['nama_lengkap']; ?>" />
                                                    <?= form_error('nama_lengkap', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    <!--begin::Form Group-->
                                        <div class="form-group row">
                                            <label class="col-xl-6 col-lg-3 col-form-label" for="province_id">Province</label>
                                            <div class="col-lg-9 col-xl-8">
                                                <select id="province_id" name="province_id" class="form-control form-control-lg form-control-solid">
                                                    <option value="<?= $user['province_id']; ?>"><?= $user['province_name']; ?></option>
                                                    <?php 
                                                        foreach ($provinces as $province) {
                                                            ?>
                                                            <option <?= ($user['province_id'] == $province['province_id']) ? 'selected' : '';?> value="<?php echo $province['province_id'];?>"><?php echo $province['province_name'];?></option>}
                                                            <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <?= form_error('province_id', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    <!--begin::Form Group-->
                                        <div class="form-group row">
                                            <label id="city_id" name="city_id" class="col-xl-6 col-lg-3 col-form-label" for="city_id">County/City</label>
                                            <div id="city_id">
                                                <select class="form-control form-control-lg form-control-solid">
                                                    <option value="">-- Pilih Kabupaten/Kota --</option>
                                                    <?php 
                                                        foreach ($cities as $city) {
                                                            ?>
                                                            <option <?= ($user['city_id'] == $city['city_id']) ? 'selected' : '';?> value="<?php echo $city['city_id'];?>"><?php echo $city['city_name'];?></option>}
                                                            <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <?= form_error('city_id', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    <!--begin::Form Group-->
                                        <div class="form-group row">
                                            <label class="col-xl-6 col-lg-3 col-form-label" for="district_id">District</label>
                                            <div id="district_id">
                                                <select id="district_id" name="district_id" class="form-control form-control-lg form-control-solid">
                                                    <option value="">-- Pilih Kecamatan --</option>
                                                    <?php 
                                                        foreach ($districts as $district) {
                                                            ?>
                                                            <option <?= ($user['district_id'] == $district['district_id']) ? 'selected' : '';?> value="<?php echo $district['district_id'];?>"><?php echo $district['district_name'];?></option>}
                                                            <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <?= form_error('district_id', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div> 
                                    <!--begin::Form Group-->
                                        <div class="form-group row">
                                            <label class="col-xl-6 col-lg-3 col-form-label" for="alamat_lengkap">Complete Address</label>
                                            <div class="col-lg-9 col-xl-8">
                                                <div class="input-group input-group-lg input-group-solid">
                                                    <input id="alamat_lengkap" name="alamat_lengkap" class="form-control form-control-lg form-control-solid" type="text" value="<?= $user['alamat_lengkap']; ?>" />
                                                    <?= form_error('alamat_lengkap', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    <!--begin::Form Group-->
                                        <div class="form-group row">
                                            <label class="col-xl-6 col-lg-3 col-form-label" for="email">Email Address</label>
                                            <div class="col-lg-9 col-xl-8">
                                                <div class="input-group input-group-lg input-group-solid">
                                                    <div class="input-group-prepend"><span class="input-group-text"><i class="la la-at"></i></span></div>
                                                    <input id="email" name="email" type="text" class="form-control form-control-lg form-control-solid" value="<?= $user['email']; ?>" readonly />
                                                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    <!--begin::Form Group-->
                                        <div class="form-group row">
                                            <label class="col-xl-6 col-lg-3 col-form-label" for="no_hp">Phone Number</label>
                                            <div class="col-lg-9 col-xl-8">
                                                <div class="input-group input-group-lg input-group-solid">
                                                    <input id="no_hp" name="no_hp" class="form-control form-control-lg form-control-solid" type="text" value="<?= $user['no_hp']; ?>" />
                                                    <?= form_error('no_hp', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-lg-9 col-xl-8"> 
                                                <button type="sumbit" class="btn btn-success mr-2">Save Changes</button>
                                            </div>
                                            </div>
                                        </div>
                                </form>
                                <!--END::Form Group-->
                            </div>
                            <!--end::Card-->
                            
                        </div>
                        <!--end: List Widget 10-->
                    </div>
                    <!-- end::col -->
                </div>
                <!-- end::row -->

        </div>
        <!--end::Content-->
    </div>
    <!--end::Profile 2-->
</div>    
<!--end::Container-->
</body>
<!--end::Body-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
         $(document).ready(function(){
            $("#province_id").change(function(){
                // Here we will run an ajax request
                var province_id = $(this).val();  // Selected country id
                $.ajax({
                    url : '<?php echo base_url('edit_profile/get_city')?>/',
                    type: 'POST',
                    data:{province_id:province_id},
                    dataType: 'json',
                    success: function(response){
                        if(response['city_id']) {
                            $("#city_id").html(response['city_id']);
                        } 

                    }
                });
                $("#citiesBox").html("<select name=\"city\" id=\"city\" class=\"form-control\">\
                    <option value=\"\">Select a City</option>\
                </select>");

            });


            

            $(document).on("change","#city_id",function(){
                var city_id = $(this).val();  // Selected state id
                $.ajax({
                    url : '<?php echo base_url('edit_profile/get_district')?>/',
                    type: 'POST',
                    data:{city_id:city_id},
                    dataType: 'json',
                    success: function(response){
                        if(response['district_id']) {
                            $("#district_id").html(response['district_id']);
                        } 
                    }
                    
                });
                //alert(state_id)
            })
        });

        $("#editFrm").submit(function(event){
            event.preventDefault();

            $.ajax({
                url : '<?php echo base_url('edit_profile/index'.$user['email'])?>',
                type: 'post',
                data: $(this).serializeArray(),
                dataType : 'json',
                success: function(response){
                    if (response['status'] == 0) {
                        if (response['nama_lengkap']) {
                            $(".nama_lengkap_error").html(response['nama_lengkap']);
                        } else {
                            $(".nama_lengkap_error").html("");
                        }

                        if (response['province_id']) {
                            $(".province_id_error").html(response['province_id']);
                        } else {
                            $(".province_id_error").html("");
                        }

                        if (response['city_id']) {
                            $(".city_id_error").html(response['city_id']);
                        } else {
                            $(".city_id_error").html("");
                        }

                        if (response['district_id']) {
                            $(".district_id_error").html(response['district_id']);
                        } else {
                            $(".district_id_error").html("");
                        }

                        if (response['email']) {
                            $(".email_error").html(response['email']);
                        } else {
                            $(".email_error").html("");
                        }

                        if (response['alamat_lengkap']) {
                            $(".alamat_lengkap_error").html(response['alamat_lengkap']);
                        } else {
                            $(".alamat_lengkap_error").html("");
                        }

                        if (response['no_hp']) {
                            $(".no_hp_error").html(response['no_hp']);
                        } else {
                            $(".no_hp_error").html("");
                        }
                    } else {
                        window.location.href="<?php echo base_url('edit_profile/index')?>";
                    }
                    //console.log(response)
                }
            })
        });
    </script>

</html>