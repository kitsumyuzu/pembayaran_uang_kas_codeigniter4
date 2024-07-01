    <div class="wrapper">

		<div class="main-header">

			<!-- Logo Header -->

                <div class="logo-header" data-background-color="dark2">

					<a href="<?= base_url('/home/dashboard') ?>" class="logo">

						<p class="navbar-brand" style="background: linear-gradient(48deg, rgba(251,115,4,1) 30%, rgba(255,255,255,1) 70%); -webkit-text-fill-color: transparent; -webkit-background-clip: text; background-clip: text; font-size: 13.5px;"><b>Sekolah Permata Harapan</b></p>

					</a>

                    <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">

                        <span class="navbar-toggler-icon">

                            <i class="fas fa-bars"></i>

                        </span>

                    </button>

                    <button class="topbar-toggler more">
                        
                        <i class="fa fa-search"></i>
                    
                    </button>

                    <div class="nav-toggle">

                        <button class="btn btn-toggle toggle-sidebar">

                            <i class="fas fa-bars"></i>

                        </button>

                    </div>

                </div>

			<!-- End Logo Header -->

			<!-- Navbar Header -->

				<nav class="navbar navbar-header navbar-expand-lg" data-background-color="dark">
					
					<div class="container-fluid">
						
						<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">

							<li class="nav-item toggle-nav-search hidden-caret">

								<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">

									<i class="fa fa-search"></i>

								</a>

							</li>

							<!-- Account -->
							
								<li class="nav-item dropdown hidden-caret">

									<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">

										<div class="avatar-sm">

											<img src="<?= base_url('Images/'.(session() -> get('profile') ? session() -> get('profile') : 'default.png')) ?>" alt="..." class="avatar-img rounded-circle">

										</div>

									</a>

									<ul class="dropdown-menu dropdown-user animated fadeIn">

										<div class="dropdown-user-scroll scrollbar-outer">

											<li>

												<div class="user-box">

													<div class="avatar-lg">

														<img src="<?= base_url('Images/'.(session() -> get('profile') ? session() -> get('profile') : 'default.png')) ?>" alt="image profile" class="avatar-img rounded">

													</div>

													<div class="u-text">

														<h4><?php echo ucwords(session() -> username) ?></h4>
														<p class="text-muted"><?php echo session() -> email ?></p>
														<a href="<?= base_url('/home/') ?>" class="btn btn-xs btn-secondary btn-sm">View Profile</a>

													</div>

												</div>

											</li>

											<li>

												<div class="dropdown-divider"></div>

													<a class="dropdown-item" href="<?= base_url('/home/authentication_logout') ?>">

														<i class="col-2 fas fa-power-off" style="color: red;"></i>Logout

													</a>

											</li>

										</div>

									</ul>

								</li>

							<!-- End Account -->
							
						</ul>

					</div>

				</nav>

			<!-- End Navbar -->

		</div>

		<!-- Sidebar -->

			<div class="sidebar sidebar-style-2" data-background-color="dark2">

				<div class="sidebar-wrapper scrollbar scrollbar-inner">

					<div class="sidebar-content">

						<ul class="nav nav-primary">

							<li class="nav-item active">

								<a href="<?= base_url('/home/dashboard') ?>">

									<i class="fas fa-home"></i>
									<p>Dashboard</p>
									
								</a>

							</li>

							<?php

								if (in_array(session() -> get('level'), [1])) {

							?>

								<li class="nav-item">
									
									<a href="<?= base_url('/home/user_data') ?>">

										<i class="fas fa-user" style="color: #FBAED2;"></i>
										<p>User</p>
										
									</a>

								</li>

								<li class="nav-item">
									
									<a href="<?= base_url('/home/teacher_data') ?>">

										<i class="fas fa-ruler" style="color: #FBAED2;"></i>
										<p>Teacher</p>
										
									</a>

								</li>

								<li class="nav-item">
									
									<a href="<?= base_url('/home/student_data') ?>">

										<i class="fas fa-graduation-cap" style="color: #FBAED2;"></i>
										<p>Student</p>
										
									</a>

								</li>
								
								<li class="nav-item">

									<a href="#school-management" data-toggle="collapse">

										<i class="fas fa-school mr-2"></i>
										<p>School</p>
										<span class="caret"></span>

									</a>

									<div class="collapse" id="school-management">

										<ul class="nav nav-collapse subnav">

											<li>

												<a href="<?= base_url('/home/major_data') ?>">

													<i class="fas fa-address-card" style="color: #adfff3;"></i>
													<p>Major</p>

												</a>

												<a href="<?= base_url('/home/class_data') ?>">

													<i class="fas fa-chalkboard-user" style="color: #adfff3;"></i>
													<p>Class</p>

												</a>

												<a href="<?= base_url('/home/rombel_data') ?>">

													<i class="fas fa-chalkboard" style="color: #adfff3;"></i>
													<p>Rombel</p>

												</a>

											</li>

										</ul>

									</div>

								</li>
								
								<li class="nav-item">

									<a href="<?= base_url('/home/invoice_data') ?>">

										<i class="fas fa-file-invoice-dollar" style="color: #8CFF9E;"></i>
										<p>Invoice</p>

									</a>

								</li>

							<?php

								} else if (in_array(session() -> get('level'), [2, 3, 4])) {

							?>

								<li class="nav-section">
									
									<span class="sidebar-mini-icon">

										<i class="fas fa-window-minimize"></i>

									</span>

									<h4 class="text-section"><i class="fas fa-wallet mr-2"></i>Payment Menu</h4>

								</li>

									<li class="nav-item">

										<a href="<?= base_url('/home/invoice_data') ?>">

											<i class="fas fa-file-invoice-dollar" style="color: #8CFF9E;"></i>
											<p>Invoice</p>

										</a>

									</li>

							<?php

								}

							?>

						</ul>

					</div>

				</div>

			</div>

		<!-- End Sidebar -->