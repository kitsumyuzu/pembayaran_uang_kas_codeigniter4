        <div class="main-panel">

            <div class="content">

                <div class="page-inner py-3">

                    <div class="row d-flex justify-content-center align-items-center">

                        <div class="col-md-4">

                            <div class="card">

                                <div class="card-header">

                                    <div class="d-flex align-items-center">

                                        <h4 class="card-title"><i class="mr-2 fas fa-archive"></i><b>UPDATE DATA</b></h4>
                                        <a href="<?= base_url('/home/rombel_data/') ?>" class="ml-auto">
                                        
                                            <button class="btn btn-danger btn-round"><i class="mr-2 fas fa-angle-double-left"></i> Back </button>

                                        </a>

                                    </div>

                                </div>

                                <form action="<?= base_url('/home/action_update_rombel_data') ?>" method="post">

                                    <input type="hidden" name="idRombel" value="<?php echo $rombelData -> id_rombel ?>">

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

                                                                <option value="<?php echo $_data -> nama_jurusan ?>" <?php echo ($_data -> nama_jurusan == $_data -> nama_jurusan) ? 'selected' : '' ?>><?php echo ucwords($_data -> nama_jurusan) ?></option>

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

                                                                <option value="<?php echo $_data -> nama_kelas ?>" <?php echo ($_data -> nama_kelas == $_data -> nama_kelas) ? 'selected' : '' ?>><?php echo strtoupper($_data -> nama_kelas) ?></option>

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

                                                                <option value="<?php echo $_data -> id_guru ?>" <?php echo ($rombelData -> wali_kelas == $_data -> id_guru) ? 'selected' : '' ?>><?php echo ucwords($_data -> nama_guru) ?></option>

                                                            <?php

                                                                }

                                                            ?>

                                                        </select>
                                                    
                                                    </div>
                                    
                                                </div>

                                            <!-- End Teacher name -->

                                            <!-- Teacher name -->
                                            
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

                                                                <option value="<?php echo $_data -> user ?>" <?php echo ($rombelData -> bendahara == $_data -> id_murid) ? 'selected' : '' ?>><?php echo ucwords($_data -> nama_murid) ?></option>

                                                            <?php

                                                                }

                                                            ?>

                                                        </select>
                                                    
                                                    </div>
                                    
                                                </div>

                                            <!-- End Teacher name -->

                                            <!-- class bill -->

                                                <div class="form-group col-md-12">

                                                    <div class="input-icon">

                                                        <span class="input-icon-addon">

                                                            <i class="fas fa-money-bill"></i>

                                                        </span>

                                                        <input value="<?php echo $rombelData -> rombel_uangkas ?>" type="text" name="bills" id="bills" placeholder=" " class="form-control">

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

                    </div>

                </div>

            </div>