<!--begin::Header-->
<div id="kt_header" class="header header-fixed">
	<!--begin::Container-->
	<div class="container-fluid d-flex align-items-stretch justify-content-between">
		<div></div>

		<!--begin::Topbar-->
		<div class="topbar">

			<!--begin::User-->
			<div class="dropdown">
				<!--begin::Toggle-->
				<div class="topbar-item" data-toggle="dropdown" data-offset="0px,0px">
					<div class="
							btn btn-icon
							w-auto
							btn-clean
							d-flex
							align-items-center
							btn-lg
							px-2
						">
						<span class="
								text-muted
								font-weight-bold font-size-base
								d-none d-md-inline
								mr-1
							">Hallo,</span>
						<span class="
								text-dark-50
								font-weight-bolder font-size-base
								d-none d-md-inline
								mr-3
							">
							<?= $this->session->userdata('nama_lengkap') ?></span>
						<span class="symbol symbol-35 symbol-light-success">
							<span class="symbol-label font-size-h5 font-weight-bold"><?= substr($this->session->userdata('nama_lengkap'), 0, 1) ?></span>
						</span>
					</div>
				</div>

				<!--end::Toggle-->

				<!--begin::Dropdown-->
				<div class="
						dropdown-menu
						p-0
						m-0
						dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg
						p-0
					">
					<?php $this->load->view('template/partials/_extras/dropdown/user') ?>
				</div>

				<!--end::Dropdown-->
			</div>

			<!--end::User-->
		</div>

		<!--end::Topbar-->
	</div>

	<!--end::Container-->
</div>

<!--end::Header-->