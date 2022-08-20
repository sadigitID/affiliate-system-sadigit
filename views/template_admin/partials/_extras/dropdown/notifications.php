<!--begin::Header-->
<div class="d-flex flex-column pt-12 bgi-size-cover bgi-no-repeat rounded-top" style="background-image: url(<?= base_url() ?>assets/media/misc/bg-1.jpg)">

	<!--begin::Title-->
	<h4 class="d-flex flex-center rounded-top">
		<span class="text-white">User Notifications</span>
		<span class="btn btn-text btn-success btn-sm font-weight-bold btn-font-md ml-2"><?= $pemberkasan + $wawancara + $akad + $plafond ?> new</span>
	</h4>

	<!--end::Title-->

	<!--begin::Tabs-->
	<ul class="nav nav-bold nav-tabs nav-tabs-line nav-tabs-line-3x nav-tabs-line-transparent-white nav-tabs-line-active-border-success mt-3 px-8" role="tablist">
		<li class="nav-item">
			<a class="nav-link active show" data-toggle="tab" href="#topbar_notifications_notifications">Alerts</a>
		</li>
	</ul>

	<!--end::Tabs-->
</div>

<!--end::Header-->

<!--begin::Content-->
<div class="tab-content">

	<!--begin::Tabpane-->
	<div class="tab-pane active show p-8" id="topbar_notifications_notifications" role="tabpanel">

		<!--begin::Scroll-->
		<div class="scroll pr-7 mr-n7" data-scroll="true" data-height="300" data-mobile-height="200">
			<style>
				.pointers {
					cursor: pointer;
				}
			</style>
			<?php if ($pemberkasan > 0) : ?>
				<!--begin::Item-->
				<div class="d-flex align-items-center mb-6 pointers" onclick="redirect()">
					<!--begin::Symbol-->
					<div class="symbol symbol-40 symbol-light-primary mr-5">
						<span class="symbol-label">
							<span class="svg-icon svg-icon-lg svg-icon-primary">

								<!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Files/Group-folders.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<rect x="0" y="0" width="24" height="24" />
										<path d="M4.5,21 L21.5,21 C22.3284271,21 23,20.3284271 23,19.5 L23,8.5 C23,7.67157288 22.3284271,7 21.5,7 L11,7 L8.43933983,4.43933983 C8.15803526,4.15803526 7.77650439,4 7.37867966,4 L4.5,4 C3.67157288,4 3,4.67157288 3,5.5 L3,19.5 C3,20.3284271 3.67157288,21 4.5,21 Z" fill="#000000" opacity="0.3" />
										<path d="M2.5,19 L19.5,19 C20.3284271,19 21,18.3284271 21,17.5 L21,6.5 C21,5.67157288 20.3284271,5 19.5,5 L9,5 L6.43933983,2.43933983 C6.15803526,2.15803526 5.77650439,2 5.37867966,2 L2.5,2 C1.67157288,2 1,2.67157288 1,3.5 L1,17.5 C1,18.3284271 1.67157288,19 2.5,19 Z" fill="#000000" />
									</g>
								</svg>
								<!--end::Svg Icon-->
							</span>
						</span>
					</div>

					<!--end::Symbol-->

					<!--begin::Text-->
					<div class="d-flex flex-column font-weight-bold">
						<span class="text-dark text-hover-primary mb-1 font-size-lg">Pemberkasan</span>
						<span class="text-muted"><?= $pemberkasan ?> Pemberkasan belum di proses</span>
					</div>

					<!--end::Text-->
				</div>

				<!--end::Item-->
			<?php endif; ?>


			<?php if ($wawancara > 0) : ?>
				<!--begin::Item-->
				<div class="d-flex align-items-center mb-6 pointers" onclick="redirect()">

					<!--begin::Symbol-->
					<div class="symbol symbol-40 symbol-light-warning mr-5">
						<span class="symbol-label">
							<span class="svg-icon svg-icon-lg svg-icon-warning">
								<!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Communication/Chat5.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<rect x="0" y="0" width="24" height="24" />
										<path d="M21.9999843,15.009808 L22.0249378,15 L22.0249378,19.5857864 C22.0249378,20.1380712 21.5772226,20.5857864 21.0249378,20.5857864 C20.7597213,20.5857864 20.5053674,20.4804296 20.317831,20.2928932 L18.0249378,18 L6,18 C4.34314575,18 3,16.6568542 3,15 L3,6 C3,4.34314575 4.34314575,3 6,3 L19,3 C20.6568542,3 22,4.34314575 22,6 L22,15 C22,15.0032706 21.9999948,15.0065399 21.9999843,15.009808 Z" fill="#000000" opacity="0.3" />
										<path d="M7.5,12 C6.67157288,12 6,11.3284271 6,10.5 C6,9.67157288 6.67157288,9 7.5,9 C8.32842712,9 9,9.67157288 9,10.5 C9,11.3284271 8.32842712,12 7.5,12 Z M12.5,12 C11.6715729,12 11,11.3284271 11,10.5 C11,9.67157288 11.6715729,9 12.5,9 C13.3284271,9 14,9.67157288 14,10.5 C14,11.3284271 13.3284271,12 12.5,12 Z M17.5,12 C16.6715729,12 16,11.3284271 16,10.5 C16,9.67157288 16.6715729,9 17.5,9 C18.3284271,9 19,9.67157288 19,10.5 C19,11.3284271 18.3284271,12 17.5,12 Z" fill="#000000" opacity="0.3" />
									</g>
								</svg>
								<!--end::Svg Icon-->
							</span>
						</span>
					</div>

					<!--end::Symbol-->

					<!--begin::Text-->
					<div class="d-flex flex-column font-weight-bold">
						<span class="text-dark text-hover-warning mb-1 font-size-lg">Wawancara</span>
						<span class="text-muted"><?= $wawancara ?> Wawancara belum di proses</span>
					</div>

					<!--end::Text-->
				</div>

				<!--end::Item-->
			<?php endif; ?>



			<?php if ($akad > 0) : ?>
				<!--begin::Item-->
				<div class="d-flex align-items-center mb-6 pointers" onclick="redirect()">

					<!--begin::Symbol-->
					<div class="symbol symbol-40 symbol-light-info mr-5">
						<span class="symbol-label">
							<span class="svg-icon svg-icon-lg svg-icon-info">

								<!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Files/Group-folders.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<rect x="0" y="0" width="24" height="24" />
										<path d="M4.5,21 L21.5,21 C22.3284271,21 23,20.3284271 23,19.5 L23,8.5 C23,7.67157288 22.3284271,7 21.5,7 L11,7 L8.43933983,4.43933983 C8.15803526,4.15803526 7.77650439,4 7.37867966,4 L4.5,4 C3.67157288,4 3,4.67157288 3,5.5 L3,19.5 C3,20.3284271 3.67157288,21 4.5,21 Z" fill="#000000" opacity="0.3" />
										<path d="M2.5,19 L19.5,19 C20.3284271,19 21,18.3284271 21,17.5 L21,6.5 C21,5.67157288 20.3284271,5 19.5,5 L9,5 L6.43933983,2.43933983 C6.15803526,2.15803526 5.77650439,2 5.37867966,2 L2.5,2 C1.67157288,2 1,2.67157288 1,3.5 L1,17.5 C1,18.3284271 1.67157288,19 2.5,19 Z" fill="#000000" />
									</g>
								</svg>
								<!--end::Svg Icon-->
							</span>
						</span>
					</div>

					<!--end::Symbol-->

					<!--begin::Text-->
					<div class="d-flex flex-column font-weight-bold">
						<span class="text-dark text-hover-info mb-1 font-size-lg">Akad</span>
						<span class="text-muted"><?= $akad ?> Akad belum di proses</span>
					</div>

					<!--end::Text-->
				</div>

				<!--end::Item-->
			<?php endif; ?>



			<?php if ($plafond > 0) : ?>
				<!--begin::Item-->
				<div class="d-flex align-items-center mb-6 pointers" onclick="redirect()">

					<!--begin::Symbol-->
					<div class="symbol symbol-40 symbol-light-danger mr-5">
						<span class="symbol-label">
							<span class="svg-icon svg-icon-lg svg-icon-danger">

								<!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Shopping/Dollar.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<rect x="0" y="0" width="24" height="24" />
										<rect fill="#000000" opacity="0.3" x="11.5" y="2" width="2" height="4" rx="1" />
										<rect fill="#000000" opacity="0.3" x="11.5" y="16" width="2" height="5" rx="1" />
										<path d="M15.493,8.044 C15.2143319,7.68933156 14.8501689,7.40750104 14.4005,7.1985 C13.9508311,6.98949895 13.5170021,6.885 13.099,6.885 C12.8836656,6.885 12.6651678,6.90399981 12.4435,6.942 C12.2218322,6.98000019 12.0223342,7.05283279 11.845,7.1605 C11.6676658,7.2681672 11.5188339,7.40749914 11.3985,7.5785 C11.2781661,7.74950085 11.218,7.96799867 11.218,8.234 C11.218,8.46200114 11.2654995,8.65199924 11.3605,8.804 C11.4555005,8.95600076 11.5948324,9.08899943 11.7785,9.203 C11.9621676,9.31700057 12.1806654,9.42149952 12.434,9.5165 C12.6873346,9.61150047 12.9723317,9.70966616 13.289,9.811 C13.7450023,9.96300076 14.2199975,10.1308324 14.714,10.3145 C15.2080025,10.4981676 15.6576646,10.7419985 16.063,11.046 C16.4683354,11.3500015 16.8039987,11.7268311 17.07,12.1765 C17.3360013,12.6261689 17.469,13.1866633 17.469,13.858 C17.469,14.6306705 17.3265014,15.2988305 17.0415,15.8625 C16.7564986,16.4261695 16.3733357,16.8916648 15.892,17.259 C15.4106643,17.6263352 14.8596698,17.8986658 14.239,18.076 C13.6183302,18.2533342 12.97867,18.342 12.32,18.342 C11.3573285,18.342 10.4263378,18.1741683 9.527,17.8385 C8.62766217,17.5028317 7.88033631,17.0246698 7.285,16.404 L9.413,14.238 C9.74233498,14.6433354 10.176164,14.9821653 10.7145,15.2545 C11.252836,15.5268347 11.7879973,15.663 12.32,15.663 C12.5606679,15.663 12.7949989,15.6376669 13.023,15.587 C13.2510011,15.5363331 13.4504991,15.4540006 13.6215,15.34 C13.7925009,15.2259994 13.9286662,15.0740009 14.03,14.884 C14.1313338,14.693999 14.182,14.4660013 14.182,14.2 C14.182,13.9466654 14.1186673,13.7313342 13.992,13.554 C13.8653327,13.3766658 13.6848345,13.2151674 13.4505,13.0695 C13.2161655,12.9238326 12.9248351,12.7908339 12.5765,12.6705 C12.2281649,12.5501661 11.8323355,12.420334 11.389,12.281 C10.9583312,12.141666 10.5371687,11.9770009 10.1255,11.787 C9.71383127,11.596999 9.34650161,11.3531682 9.0235,11.0555 C8.70049838,10.7578318 8.44083431,10.3968355 8.2445,9.9725 C8.04816568,9.54816454 7.95,9.03200304 7.95,8.424 C7.95,7.67666293 8.10199848,7.03700266 8.406,6.505 C8.71000152,5.97299734 9.10899753,5.53600171 9.603,5.194 C10.0970025,4.85199829 10.6543302,4.60183412 11.275,4.4435 C11.8956698,4.28516587 12.5226635,4.206 13.156,4.206 C13.9160038,4.206 14.6918294,4.34533194 15.4835,4.624 C16.2751706,4.90266806 16.9686637,5.31433061 17.564,5.859 L15.493,8.044 Z" fill="#000000" />
									</g>
								</svg>
								<!--end::Svg Icon-->
							</span>
						</span>
					</div>

					<!--end::Symbol-->

					<!--begin::Text-->
					<div class="d-flex flex-column font-weight-bold">
						<span class="text-dark text-hover-danger mb-1 font-size-lg">Plafond</span>
						<span class="text-muted"><?= $plafond ?> Plafond belum di proses</span>
					</div>

					<!--end::Text-->
				</div>

				<!--end::Item-->
			<?php endif; ?>

		</div>

		<!--end::Scroll-->

	</div>

	<!--end::Tabpane-->
</div>

<!--end::Content-->
<script>
	const redirect = () => window.location.href = '<?= base_url('booking') ?>';
</script>