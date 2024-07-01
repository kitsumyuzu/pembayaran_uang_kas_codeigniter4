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

														<a>teacher</a>

													</li>

												<li class="separator">

                                                    <i class="fas fa-caret-right"></i>

                                                </li>

													<li class="nav-item">

														<a>teacher_data</a>

													</li>

                                            </ul>

											<?php

												if (in_array(session() -> get('level'), [1])) {

											?>

												<a href="<?= base_url('/home/add_teacher_data/') ?>" class="ml-auto">
											
													<button class="btn btn-success btn-round"><i class="mr-2 fas fa-user-plus"></i> Add Teacher </button>

												</a>

											<?php

												}

											?>

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
														<th>NIK</th>
														<th>Nama</th>
														<th>Jenis Kelamin</th>
														<th>Tanggal & Tempat Lahir</th>
                                                        <th>No Handphone</th>
                                                        <th>Alamat</th>

														<th style="width: 10%;">Action</th>

													</tr>

												</thead>
												
												<tbody>

													<?php

														$_row = 1;

														foreach ($teacherData as $_data) {

                                                            $tanggal_lahir_guru = new DateTime($_data -> tanggal_lahir_guru);

													?>

														<tr>

															<td align="center"><?php echo $_row++ ?></td>
															<td align="center"><?php echo $_data -> nik ? $_data -> nik : '-' ?></td>
															<td align="center"><?php echo ucwords($_data -> nama_guru) ? ucwords($_data -> nama_guru) : '-' ?></td>
															<td align="center"><?php echo ucwords($_data -> jenis_kelamin_guru) ? ucwords($_data -> jenis_kelamin_guru) : '-' ?></td>
															<td align="center"><?php echo ucwords($_data -> tempat_lahir_guru) . ', ' . $tanggal_lahir_guru -> format('d F Y') ? ucwords($_data -> tempat_lahir_guru) . ', ' . $tanggal_lahir_guru -> format('d F Y') : '-' ?></td>
															<td align="center"><?php echo $_data -> no_handphone_guru ? $_data -> no_handphone_guru : '-' ?></td>
															<td align="center"><?php echo ucwords($_data -> alamat_guru) ? ucwords($_data -> alamat_guru) : '-' ?></td>

															<td align="center">

																<div class="form-button-action">

																	<a href="<?= base_url('/home/update_teacher_data/'.$_data -> user) ?>">

																		<button type="button" data-toggle="tooltip" class="btn btn-link btn-primary btn-lg" data-original-title="Edit data"><i class="fas fa-edit"></i></button>

																	</a>

																	<a href="<?= base_url('/home/delete_teacher_data/'.$_data -> user) ?>">

																		<button type="button" data-toggle="tooltip" class="btn btn-link btn-danger btn-lg" data-original-title="Delete data"><i class="fas fa-trash"></i></button>

																	</a>

																</div>

															</td>
															
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