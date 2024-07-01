        <div class="main-panel">

            <div class="content">

                <div class="page-inner py-3">

                    <div class="row">

						<div class="col-md-12">

							<div class="card">

								<!-- Card Header -->

									<div class="card-header">

										<div class="d-flex align-items-center">

											<h4 class="card-title"><i class="mr-2 fas fa-archive"></i><b>DATABASE</b></h4>
                                            <ul class="breadcrumbs">

                                                <li class="nav-home">

                                                    <a href="<?= base_url('/home/dashboard') ?>" class="fas fa-home"></a>

                                                </li>

                                                <li class="separator">

                                                    <i class="fas fa-caret-right"></i>

                                                </li>

													<li class="nav-item">

														<a>user</a>

													</li>

												<li class="separator">

                                                    <i class="fas fa-caret-right"></i>

                                                </li>

													<li class="nav-item">

														<a>data_user</a>

													</li>

                                            </ul>

										</div>

									</div>

								<!-- End Card Header -->

								<!-- Card Body -->

								<div class="card-body">

									<!-- Data Table -->

										<div class="table-responsive">

											<table id="limit-data-10" class="table table-striped table-hover table-bordered-bg-dark mt-4">

												<thead>

													<tr style="text-align: center;">

														<th>#</th>
														<th>Profile</th>
														<th>Username</th>
														<th>Email</th>
														<th>Password</th>
														<th>Level</th>

													</tr>

												</thead>
												
												<tbody>

													<?php

														$_row = 1;

														foreach ($userData as $_data) {

													?>

														<tr>

															<td align="center"><?php echo $_row++ ?></td>
															<td align="center"><img src="<?= base_url('Images/'.($_data -> profile ? $_data -> profile : 'default.png')) ?>" style="border-radius: 50%; width: 50px; height: 50px;"></td>
															<td align="center"><?php echo $_data -> username ? $_data -> username : '-' ?></td>
															<td align="center"><?php echo $_data -> email ? $_data -> email : '-' ?></td>
															<td align="center"><?php echo $_data -> password ? $_data -> password : '-' ?></td>
															<td align="center"><?php echo ucwords($_data -> nama_level) ?></td>
															
														</tr>

													<?php

														}

													?>
													
												</tbody>

											</table>

										</div>

									<!-- End Data Table -->

								</div>

							</div>

						</div>

					</div>

                </div>

            </div>