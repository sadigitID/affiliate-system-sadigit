<!--begin::Aside-->
<div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">

	<!--begin::Brand-->
	<div class="brand flex-column-auto" id="kt_brand">

		<!--begin::Logo-->
		<a href="<?= base_url('affiliator/affiliator') ?>" class="brand-logo">
			<h4 style="color:white;">SADIGIT Affiliate</h4>
		</a>

		<!--end::Logo-->

		<!--begin::Toggle-->
		<button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
			<span class="svg-icon svg-icon svg-icon-xl">

				<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Angle-double-left.svg-->
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
					<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						<polygon points="0 0 24 0 24 24 0 24" />
						<path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z" fill="#000000" fill-rule="nonzero" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999)" />
						<path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)" />
					</g>
				</svg>

				<!--end::Svg Icon-->
			</span>
		</button>

		<!--end::Toolbar-->
	</div>

	<!--end::Brand-->

	<!--begin::Aside Menu-->
	<div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">

		<!--begin::Menu Container-->
		<div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">

			<!--begin::Menu Nav-->
			<ul class="menu-nav">

				<li class="menu-item <?= $active == 'affiliator/affiliator' ? 'menu-item-active' : '' ?>" aria-haspopup="true">
					<a href="<?= base_url('affiliator/affiliator') ?>" class="menu-link">
						<span class="svg-icon menu-icon">
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
								<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									<polygon points="0 0 24 0 24 24 0 24" />
									<path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
									<rect fill="#000000" x="6" y="11" width="9" height="2" rx="1" />
									<rect fill="#000000" x="6" y="15" width="5" height="2" rx="1" />
								</g>

							</svg>

						</span>
						<span class="menu-text">Dashboard</span>
					</a>
				</li>

				<li class="menu-section ">
					<h4 class="menu-text">Menu</h4>
					<i class="menu-icon ki ki-bold-more-hor icon-md"></i>
				</li>

				<!-- <li class="menu-item <?= $active == 'affiliator/bank' ? 'menu-item-active' : '' ?>" aria-haspopup="true">
					<a href="<?= base_url('affiliator/bank') ?>" class="menu-link">
						<span class="svg-icon menu-icon">
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
								<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									<polygon points="0 0 24 0 24 24 0 24" />
									<path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
									<rect fill="#000000" x="6" y="11" width="9" height="2" rx="1" />
									<rect fill="#000000" x="6" y="15" width="5" height="2" rx="1" />
								</g>

							</svg>

						</span>
						<span class="menu-text">Data Bank</span>
					</a>
				</li> -->

				<!-- START PRODUK MENU -->
				<li class="menu-item <?= $active == 'affiliator/produk' ? 'menu-item-active' : '' ?>" aria-haspopup="true">
					<a href="<?= base_url('affiliator/produk') ?>" class="menu-link">
						<span class="svg-icon menu-icon svg-icon-primary">
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
								<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									<rect x="0" y="0" width="24" height="24" />
									<path d="M4,9.67471899 L10.880262,13.6470401 C10.9543486,13.689814 11.0320333,13.7207107 11.1111111,13.740321 L11.1111111,21.4444444 L4.49070127,17.526473 C4.18655139,17.3464765 4,17.0193034 4,16.6658832 L4,9.67471899 Z M20,9.56911707 L20,16.6658832 C20,17.0193034 19.8134486,17.3464765 19.5092987,17.526473 L12.8888889,21.4444444 L12.8888889,13.6728275 C12.9050191,13.6647696 12.9210067,13.6561758 12.9368301,13.6470401 L20,9.56911707 Z" fill="#000000" />
									<path d="M4.21611835,7.74669402 C4.30015839,7.64056877 4.40623188,7.55087574 4.5299008,7.48500698 L11.5299008,3.75665466 C11.8237589,3.60013944 12.1762411,3.60013944 12.4700992,3.75665466 L19.4700992,7.48500698 C19.5654307,7.53578262 19.6503066,7.60071528 19.7226939,7.67641889 L12.0479413,12.1074394 C11.9974761,12.1365754 11.9509488,12.1699127 11.9085461,12.2067543 C11.8661433,12.1699127 11.819616,12.1365754 11.7691509,12.1074394 L4.21611835,7.74669402 Z" fill="#000000" opacity="0.3" />
								</g>
							</svg>
						</span>
						<span class="menu-text">Produk</span>
					</a>
				</li>
				<!-- END PRODUK MENU -->

				<!-- START PESANAN MENU -->
				<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
					<a href="javascript:;" class="menu-link menu-toggle">
						<span class="svg-icon menu-icon svg-icon-primary">
							<!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Shopping\Cart1.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
								<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									<rect x="0" y="0" width="24" height="24" />
									<path d="M18.1446364,11.84388 L17.4471627,16.0287218 C17.4463569,16.0335568 17.4455155,16.0383857 17.4446387,16.0432083 C17.345843,16.5865846 16.8252597,16.9469884 16.2818833,16.8481927 L4.91303792,14.7811299 C4.53842737,14.7130189 4.23500006,14.4380834 4.13039941,14.0719812 L2.30560137,7.68518803 C2.28007524,7.59584656 2.26712532,7.50338343 2.26712532,7.4104669 C2.26712532,6.85818215 2.71484057,6.4104669 3.26712532,6.4104669 L16.9929851,6.4104669 L17.606173,3.78251876 C17.7307772,3.24850086 18.2068633,2.87071314 18.7552257,2.87071314 L20.8200821,2.87071314 C21.4717328,2.87071314 22,3.39898039 22,4.05063106 C22,4.70228173 21.4717328,5.23054898 20.8200821,5.23054898 L19.6915238,5.23054898 L18.1446364,11.84388 Z" fill="#000000" opacity="0.3" />
									<path d="M6.5,21 C5.67157288,21 5,20.3284271 5,19.5 C5,18.6715729 5.67157288,18 6.5,18 C7.32842712,18 8,18.6715729 8,19.5 C8,20.3284271 7.32842712,21 6.5,21 Z M15.5,21 C14.6715729,21 14,20.3284271 14,19.5 C14,18.6715729 14.6715729,18 15.5,18 C16.3284271,18 17,18.6715729 17,19.5 C17,20.3284271 16.3284271,21 15.5,21 Z" fill="#000000" />
								</g>
							</svg>
							<!--end::Svg Icon-->
						</span>
						<span class="menu-text">Pesanan Affiliate</span>
						<i class="menu-arrow"></i>
					</a>
					<div class="menu-submenu">
						<i class="menu-arrow"></i>
						<ul class="menu-subnav">
							<li class="menu-item menu-item-parent" aria-haspopup="true">
								<span class="menu-link">
									<span class="menu-text">Pesanan</span>
								</span>
							</li>
							<li class="menu-item <?= $active == 'affiliator/pesanan' ? 'menu-item-active' : '' ?>" aria-haspopup="true">
								<a href="<?= base_url('affiliator/pesanan') ?>" class="menu-link">
									<i class="menu-bullet menu-bullet-dot">
										<span>
										</span>
									</i>
									<span class="menu-text">Data Tracking</span>
								</a>
							</li>

							<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
								<a href="javascript:;" class="menu-link menu-toggle">
									<i class="menu-bullet menu-bullet-dot">
										<span></span>
									</i>
									<span class="menu-text">Export Data Pesanan</span>
									<i class="menu-arrow"></i>
								</a>
								<div class="menu-submenu">
									<i class="menu-arrow"></i>
									<ul class="menu-subnav">
										<li class="menu-item <?= $active == 'affiliator/reportbonus_pdf' ? 'menu-item-active' : '' ?>" aria-haspopup="true">
											<a href="<?= base_url('affiliator/reportbonus_pdf') ?>" class="menu-link">
												<i class="menu-bullet menu-bullet-line">
													<span></span>
												</i>
												<span class="menu-text">PDF</span>
											</a>
										</li>
										<li class="menu-item" aria-haspopup="true">
											<a href="#" class="menu-link">
												<i class="menu-bullet menu-bullet-line">
													<span></span>
												</i>
												<span class="menu-text">Excel</span>
											</a>
										</li>
									</ul>
								</div>
							</li>

							<li class="menu-item <?= $active == 'affiliator/bonus_komisi' ? 'menu-item-active' : '' ?>" aria-haspopup="true">
								<a href="<?= base_url('affiliator/bonus_komisi') ?>" class="menu-link">
									<i class="menu-bullet menu-bullet-dot">
										<span>
										</span>
									</i>
									<span class="menu-text">Bonus Komisi</span>
								</a>
							</li>
						</ul>
					</div>
				</li>
				<!-- END PESANAN MENU -->


				<!-- start menu -->
				<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                	<a href="javascript:;" class="menu-link menu-toggle">
				  		<span class="svg-icon menu-icon">
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<polygon points="0 0 24 0 24 24 0 24" />
										<path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
										<rect fill="#000000" x="6" y="11" width="9" height="2" rx="1" />
										<rect fill="#000000" x="6" y="15" width="5" height="2" rx="1" />
									</g>
								</svg>
						</span>
							<span class="menu-text">Pengaturan</span>
							<i class="menu-arrow"></i>
					</a>
                  	<div class="menu-submenu">
                    	<i class="menu-arrow"></i>
                    		<ul class="menu-subnav">
                      			<li class="menu-item menu-item-parent" aria-haspopup="true">
                        			<span class="menu-link">
										<span class="menu-text">Bonus</span>
									</span>
                      			</li>
								<li class="menu-item <?= $active == 'affiliator/Rekening' ? 'menu-item-active' : '' ?>" aria-haspopup="true">
								<a href="<?= base_url('affiliator/Rekening') ?>" class="menu-link">
									<i class="menu-bullet menu-bullet-dot">
										<span>

										</span>
									</i>
									<span class="menu-text">Rekening</span>
								</a>
                      			</li>

								<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                        			<a href="javascript:;" class="menu-link menu-toggle">
                          				<i class="menu-bullet menu-bullet-dot">
                            				<span></span>
                          				</i>
                          				<span class="menu-text">Account</span>
                          				<i class="menu-arrow"></i>
                        			</a>
									<div class="menu-submenu">
										<i class="menu-arrow"></i>
										<ul class="menu-subnav">
											<li class="menu-item <?= $active == 'affiliator/Profile' ? 'menu-item-active' : '' ?>" aria-haspopup="true">
												<a href="<?= base_url('affiliator/Profile') ?>" class="menu-link">
												<i class="menu-bullet menu-bullet-line">
													<span></span>
												</i>
												<span class="menu-text">Profile</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
											<a href="<?= base_url('affiliator/Edit_profile') ?>" class="menu-link">
												<i class="menu-bullet menu-bullet-line">
													<span></span>
												</i>
												<span class="menu-text">Edit Profile</span>
												</a>
											</li>
											<li class="menu-item <?= $active == 'affiliator/Change_password' ? 'menu-item-active' : '' ?>" aria-haspopup="true">
												<a href="<?= base_url('affiliator/Change_password') ?>" class="menu-link">
												<i class="menu-bullet menu-bullet-line">
													<span></span>
												</i>
												<span class="menu-text">Change Password</span>
												</a>
											</li>
										</ul>
									</div>
								</li>
                    		</ul>
                  	</div>
                </li>
				<!-- end menu -->

			</ul>

			<!--end::Menu Nav-->
		</div>

		<!--end::Menu Container-->
	</div>

	<!--end::Aside Menu-->
</div>

<!--end::Aside-->