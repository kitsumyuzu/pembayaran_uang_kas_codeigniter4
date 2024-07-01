        <div class="main-panel">

            <div class="content">

                <div class="page-inner py-3">

                    <div class="row">

                        <div class="col-md-3">

                            <div class="card">

                                <div class="card-header">

                                    <div class="d-flex align-items-center">

                                        <h4 class="card-title"><i class="mr-2 fas fa-archive"></i><b>INSERT DATA</b></h4>

                                    </div>

                                </div>

                                <form action="<?= base_url('/home/action_add_rombel_data') ?>" method="post">

                                    <div class="card-body">

                                        <div class="row">

                                            <!-- Major name -->
                                            
                                                <div class="form-group col-md-12">

                                                    <div class="input-icon">

                                                        <span class="input-icon-addon">

                                                            <i class="fas fa-address-card"></i>

                                                        </span>
                                                        
                                                        <select class="form-control" name="major_input" required>

                                                            <option disabled selected>Select Major</option>
                                                            
                                                            <?php

                                                                foreach ($majorData as $_data) {

                                                            ?>

                                                                <option value="<?php echo $_data -> nama_jurusan ?>"><?php echo ucwords($_data -> nama_jurusan) ?></option>

                                                            <?php

                                                                }

                                                            ?>

                                                        </select>
                                                    
                                                    </div>
                                    
                                                </div>

                                            <!-- End Major name -->

                                            <!-- Class name -->
                                            
                                                <div class="form-group col-md-12">

                                                    <div class="input-icon">

                                                        <span class="input-icon-addon">

                                                            <i class="fas fa-chalkboard-user"></i>

                                                        </span>
                                                        
                                                        <select class="form-control" name="class_input" required>

                                                            <option disabled selected>Select Class</option>
                                                            
                                                            <?php

                                                                foreach ($classData as $_data) {

                                                            ?>

                                                                <option value="<?php echo $_data -> nama_kelas ?>"><?php echo strtoupper($_data -> nama_kelas) ?></option>

                                                            <?php

                                                                }

                                                            ?>

                                                        </select>
                                                    
                                                    </div>
                                    
                                                </div>

                                            <!-- End Class name -->

                                            <!-- Class name -->
                                            
                                                <div class="form-group col-md-12">

                                                    <div class="input-icon">

                                                        <span class="input-icon-addon">

                                                            <i class="fas fa-chalkboard-user"></i>

                                                        </span>
                                                        
                                                        <select class="form-control" name="class_room_input">

                                                            <option disabled selected>Select Class Room</option>
                                                            <option value="a">A</option>
                                                            <option value="b">B</option>
                                                            <option value="c">C</option>
                                                            <option value="d">D</option>
                                                            <option value="e">E</option>
                                                            <option value="f">F</option>
                                                            <option value="g">G</option>
                                                            <option value="h">H</option>
                                                            <option value="i">I</option>
                                                            <option value="j">J</option>
                                                            <option value="k">K</option>
                                                            <option value="l">L</option>
                                                            <option value="m">M</option>
                                                            <option value="n">N</option>
                                                            <option value="o">O</option>
                                                            <option value="p">P</option>
                                                            <option value="q">Q</option>
                                                            <option value="r">R</option>
                                                            <option value="s">S</option>
                                                            <option value="t">T</option>
                                                            <option value="u">U</option>
                                                            <option value="v">V</option>
                                                            <option value="w">W</option>
                                                            <option value="x">X</option>
                                                            <option value="y">Y</option>
                                                            <option value="z">Z</option>

                                                        </select>
                                                    
                                                    </div>
                                    
                                                </div>

                                            <!-- End Class name -->

                                            <!-- Teacher name -->
                                            
                                                <div class="form-group col-md-12">

                                                    <div class="input-icon">

                                                        <span class="input-icon-addon">

                                                            <i class="fas fa-ruler"></i>

                                                        </span>
                                                        
                                                        <select class="form-control" name="teacher_input" required>

                                                            <option disabled selected>Select Teacher</option>
                                                            
                                                            <?php

                                                                foreach ($teacherData as $_data) {

                                                            ?>

                                                                <option value="<?php echo $_data -> user ?>"><?php echo ucwords($_data -> nama_guru) ?></option>

                                                            <?php

                                                                }

                                                            ?>

                                                        </select>
                                                    
                                                    </div>
                                    
                                                </div>

                                            <!-- End Teacher name -->

                                            <!-- Student name -->
                                            
                                                <div class="form-group col-md-12">

                                                    <div class="input-icon">

                                                        <span class="input-icon-addon">

                                                            <i class="fas fa-graduation-cap"></i>

                                                        </span>
                                                        
                                                        <select class="form-control" name="treasurer_input" required>

                                                            <option disabled selected>Select Student</option>
                                                            
                                                            <?php

                                                                foreach ($studentData as $_data) {

                                                            ?>

                                                                <option value="<?php echo $_data -> user ?>"><?php echo ucwords($_data -> nama_murid) ?></option>

                                                            <?php

                                                                }

                                                            ?>

                                                        </select>
                                                    
                                                    </div>
                                    
                                                </div>

                                            <!-- End Student name -->

                                            <!-- class bill -->

                                                <div class="form-group col-md-12">

                                                    <div class="input-icon">

                                                        <span class="input-icon-addon">

                                                            <i class="fas fa-money-bill"></i>

                                                        </span>

                                                        <input type="text" name="bills" id="bills" placeholder=" " class="form-control">

                                                    </div>

                                                </div>

                                            <!-- End class bill -->
                                            
                                        </div>
                                        
                                    </div>

                                    <div class="card-footer d-flex justify-content-center">

                                        <button type="submit" class="btn btn-round btn-success mr-2">Submit</button>

                                    </div>

                                </form>

                            </div>

                        </div>

                        <div class="col-md-9">

                            <div class="card">

                                <div class="card-header">

                                    <div class="d-flex align-items-center">

                                        <h4 class="card-title"><i class="mr-2 fas fa-archive"></i><b>DATABASE</b></h4>

                                    </div>

                                </div>

                                <div class="card-body">

                                    <div class="table-responsive">

                                        <table id="limit-data-10" class="table table-striped table-hover table-bordered-bg-dark mt-4">

                                            <thead>

                                                <tr style="text-align: center;">

                                                    <th style="width: 10%">#</th>
                                                    <th style="width: 50%">Kelas</th>
                                                    <th>Wali Kelas</th>
                                                    <th>Bendahara</th>

                                                    <th style="width: 30%">Action</th>

                                                </tr>

                                            </thead>

                                            <tbody>

                                                <?php

                                                    $no = 1;

                                                    foreach ($rombelData as $_data) {

                                                ?>
                                                    <tr>

                                                        <td align="center"><?php echo $no++ ?></td>
                                                        <td align="center"><?php echo strtoupper($_data -> jurusan_rombel) ?></td>
                                                        <td align="center"><?php echo ucwords($_data -> nama_guru) ?></td>
                                                        <td align="center"><?php echo ucwords($_data -> nama_murid) ?></td>

                                                        <td align="center">
                                                            
                                                            <a href="<?= base_url('/home/update_rombel_data/'.$_data -> id_rombel) ?>">
                                                                
                                                                <button type="button" data-toggle="tooltip" class="btn btn-link btn-info btn-lg" data-original-title="Update data"><i class="fas fa-edit"></i></button>
                                                            
                                                            </a>

                                                            <a href="<?= base_url('/home/delete_rombel_data/'.$_data -> id_rombel) ?>">

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