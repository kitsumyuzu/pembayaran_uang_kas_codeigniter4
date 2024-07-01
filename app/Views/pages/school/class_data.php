        <div class="main-panel">

            <div class="content">

                <div class="page-inner py-3">

                    <div class="row">

                        <div class="col-md-4">

                            <div class="card">

                                <div class="card-header">

                                    <div class="d-flex align-items-center">

                                        <h4 class="card-title"><i class="mr-2 fas fa-archive"></i><b>INSERT DATA</b></h4>

                                    </div>

                                </div>

                                <form action="<?= base_url('/home/action_add_class_data') ?>" method="post">

                                    <div class="card-body">

                                        <div class="row">

                                            <!-- Major name -->
                                            
                                                <div class="form-group col-md-12 d-flex justify-content-center">

                                                    <div class="input-icon">

                                                        <span class="input-icon-addon">

                                                            <i class="fas fa-chalkboard-user"></i>

                                                        </span>
                                                        
                                                        <input type="text" name="class_name_input" id="class_name_input" placeholder="Class" class="form-control" maxlength="30" required autofocus>
                                                    
                                                    </div>
                                    
                                                </div>

                                            <!-- End Major name -->

                                        </div>
                                        
                                    </div>

                                    <div class="card-footer d-flex justify-content-center">

                                        <button type="submit" class="btn btn-round btn-success mr-2">Submit</button>

                                    </div>

                                </form>

                            </div>

                        </div>

                        <div class="col-md-8">

                            <div class="card">

                                <div class="card-header">

                                    <div class="d-flex align-items-center">

                                        <h4 class="card-title"><i class="mr-2 fas fa-archive"></i><b>DATABASE</b></h4>

                                    </div>

                                </div>

                                <div class="card-body">

                                    <div class="table-responsive">

                                        <table id="limit-data-kelas" class="table table-striped table-hover table-bordered-bg-dark mt-4">

                                            <thead>

                                                <tr style="text-align: center;">

                                                    <th style="width: 10%">#</th>
                                                    <th>Nama kelas</th>

                                                    <th style="width: 10%">Action</th>

                                                </tr>

                                            </thead>

                                            <tbody>

                                                <?php

                                                    $no = 1;

                                                    foreach ($classData as $_data) {

                                                ?>

                                                    <tr>

                                                        <td align="center"><?php echo $no++ ?></td>
                                                        <td align="center"><?php echo strtoupper($_data -> nama_kelas) ?></td>
                                                        
                                                        <td align="center">

                                                            <a href="<?= base_url('/home/delete_major_data/'.$_data -> id_kelas) ?>">

                                                                <button type="button" data-toggle="tooltip" class="btn btn-link btn-danger btn-lg" data-original-title="Delete data"><i class="fas fa-trash"></i></button>

                                                            </a>
                                                        
                                                        </td>

                                                    </tr>

                                                <?php

                                                    }

                                                ?>

                                            </tbody>

                                        </table>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>