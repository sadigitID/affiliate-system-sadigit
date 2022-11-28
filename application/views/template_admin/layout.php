<!--begin::Main-->
<?php $this->load->view('template_admin/partials/_header-mobile') ?>
<div class="d-flex flex-column flex-root">
	
	<!--begin::Page-->
	<div class="d-flex flex-row flex-column-fluid page">
		<?php $this->load->view('template_admin/partials/_aside') ?>

		<!--begin::Wrapper-->
		<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
			<?php $this->load->view('template_admin/partials/_header') ?>

			<!--begin::Content-->
			<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
				<!--Content area here-->
				<div class="container-fluid">
					<?php $this->load->view("$view") ?>
				</div>
			</div>
			<!--end::Content-->

			<?php $this->load->view('template_admin/partials/_footer') ?>
		</div>
		<!--end::Wrapper-->

	</div>
	<!--end::Page-->

</div>
<!--end::Main-->