<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <base href="../../../../">
    <meta charset="utf-8" />
    <title>Checkout Produk</title>
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

    <div class="card card-custom">
	<div class="card-header">
		<h3 class="card-title">
			Checkout Produk
		</h3>
	</div>
    <br>
	<!--begin::Form-->
	<form id="form_checkout">
		<div class="container">

            <!--begin::Form Group-->
            <div class="form-group">
                <label class="font-size-h6 font-weight-bolder text-dark">Nama Lengkap</label>
                <input type="text" class="form-control form-control-solid h-auto py-7 px-6 border-0 rounded-lg font-size-h6" name="nama_pembeli" id="nama_pembeli" placeholder="Nama Lengkap" value="<?= set_value('nama_pembeli') ?>" autocomplete="off" required />
                <?= form_error('nama_pembeli', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <!--end::Form Group-->

            <!--begin::Form Group-->
            <div class="form-group">
                <label class="font-size-h6 font-weight-bolder text-dark">Nomer WhatsApp</label>
                <input type="number" class="form-control form-control-solid h-auto py-7 px-6 border-0 rounded-lg font-size-h6" name="no_wa_pembeli" id="no_wa_pembeli" placeholder="Nomer Whatsapp" value="<?= set_value('no_wa_pembeli') ?>" autocomplete="off" required />
                <?= form_error('no_wa_pembeli', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <!--end::Form Group-->

            <!-- begin::Form Group-->
			<div class="form-group">
				<label class="font-size-h6 font-weight-bolder text-dark">Nama Produk</label>
				<select class="form-control form-control-solid h-auto py-7 px-6 border-0 rounded-lg font-size-h6" id="id_produk" name="id_produk" required>
                    <option  value="">---Select Product---</option>   
                    <?php foreach ($produk as $produk) : ?>
						<option value="<?= $produk->id_produk ?>"><?= $produk->nama_produk ?></option>
				    <?php endforeach; ?>
				</select>
			</div>
            <!--end::Form Group -->

            <!-- begin::Form Group-->
			<div class="form-group">
				<label class="font-size-h6 font-weight-bolder text-dark">Foto Bukti Pembayaran</label>
				<div></div>
				<div class="custom-file">
					<input type="file" class="custom-file-input" id="foto_pembayaran" accept="image/png, image/jpeg, image/jpg, image/gif"/>
					<label class="custom-file-label" for="foto_pembayaran">Choose file</label>
				</div>
                
			</div>
            <!--end::Form Group -->

            <input class="form-control " type="hidden" placeholder="tanggal_pembayaran" id="tanggal_pembayaran" name="tanggal_pembayaran" value="<?php echo date("Y-m-d") ?>"/>

            <div class="form-group">
                <button type="button" class="btn btn-light-primary" onclick="save($(this))">Simpan</button>
                <button type="reset" name="btn" class="btn btn-secondary">Reset</button>
            </div>

		</div>
	</form>
	<!--end::Form-->
</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script>
        var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";
    </script>

    <script>
	let table
	// $(document).ready(async () => {
	// 	table = $('#table').DataTable({
	// 		"responsive": true,
	// 		"processing": true,
	// 		"serverSide": true,
	// 		"order": [],
	// 		"ajax": {
	// 			"url": '<?= base_url('checkout_produk/tb_pesanan') ?>',
	// 			"type": "POST"
	// 		},
	// 		"ordering": false
	// 	});
	// })

	const save = async (btn) => {
		btn.prop('disabled', true)
		const data = $('#form_checkout').serializeArray()
		await $.ajax({
			type: "post",
            
			url: "<?= base_url('checkout_produk/save') ?>",
			data,
			dataType: "json",
			success: function(res) {
				if (res.status) {
                    window.location.href = "sadigit_affiliate/checkout_produk_terimakasih";
				} else {

					$.each(res.messages, function(key, value) {
						const element = $('[name ="' + key + '"]');
						element
							.removeClass('is-invalid')
							.addClass(value.length > 0 ? 'is-invalid' : '')
							.closest('div.form-group')
							.find('.text-danger')
							.remove();
						element.removeClass('is-invalid')
						// .addClass(value.length > 0 ? 'is-invalid' : '')
						if (element.parents('.input-group').length) {
							$('.div' + key).html(value);
						} else if ($('#' + key + '').hasClass('select')) {
							element.parents().find('.select2-container').after(value);
						} else {
							element.after(value);
						}
					});
				}
			},
			error(err) {
				Swal.fire('', 'terjadi kesalahan', 'error')
			},
			complete() {
				btn.prop('disabled', false)

			}
		});
	}
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

