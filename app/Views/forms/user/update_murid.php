        <div class="main-panel">

            <div class="content">

                <div class="page-inner py-3">

                    <div class="row">

                        <div class="col-md-9">

                            <div class="card">

                                <!-- Card Header -->

                                    <div class="card-header">

                                        <div class="d-flex align-items-center">

                                            <h4 class="card-title"><i class="mr-2 fas fa-archive"></i><b>UPDATE DATA</b></h4>
                                            <ul class="breadcrumbs">

                                                <li class="nav-home">

                                                    <a href="<?= base_url('/home/dashboard') ?>" class="fas fa-home"></a>

                                                </li>

                                                <li class="separator">

                                                    <i class="fas fa-caret-right"></i>

                                                </li>

                                                    <li class="nav-item">

                                                        <a>student</a>

                                                    </li>

                                                <li class="separator">

                                                    <i class="fas fa-caret-right"></i>

                                                </li>

                                                    <li class="nav-item">

                                                        <a>student_data</a>

                                                    </li>

                                                <li class="separator">

                                                    <i class="fas fa-caret-right"></i>

                                                </li>

                                                    <li class="nav-item">

                                                        <a>update_student_data</a>

                                                    </li>

                                            </ul>

                                            <a href="<?= base_url('/home/student_data/') ?>" class="ml-auto">
                                        
                                                <button class="btn btn-danger btn-round"><i class="mr-2 fas fa-angle-double-left"></i> Back </button>

                                            </a>

                                        </div>

                                    </div>

                                <!-- End Card Header -->

                                <form action="<?= base_url('/home/action_update_student_data') ?>" method="post" enctype="multipart/form-data">

                                    <input type="hidden" name="idUser" value="<?php echo $userData -> id_user ?>">
                                    <input type="hidden" name="old_images" value="<?php echo $userData -> profile ?>">
                                    <input type="hidden" name="idStudent" value="<?php echo $studentData -> user ?>">

                                    <!-- Card Body -->

                                        <div class="card-body">

                                            <div class="row">

                                                <!-- Username -->

                                                    <div class="form-group col-md-3">

                                                        <label for="username_input">Username <span style="color: red;">*</span></label>

                                                        <div class="input-icon">

                                                            <span class="input-icon-addon">

                                                                <i class="fas fa-user"></i>

                                                            </span>
                                                            
                                                            <input type="text" value="<?php echo $userData -> username ?>" name="username_input" id="username_input" placeholder="username" class="form-control" maxlength="30" required autofocus>
                                                        
                                                        </div>

                                                    </div>

                                                <!-- End Username -->

                                                <!-- Email -->

                                                    <div class="form-group col-md-3">

                                                        <label for="email_input">Email <span style="color: red;">*</span></label>

                                                        <div class="input-icon">

                                                            <span class="input-icon-addon">

                                                                <i class="fas fa-envelope"></i>

                                                            </span>
                                                            
                                                            <input type="email" value="<?php echo $userData -> email ?>" name="email_input" id="email_input" placeholder="example@gmail.com" class="form-control" maxlength="45" required>
                                                        
                                                        </div>
                                                        
                                                    </div>

                                                <!-- End Email -->

                                            </div>
                                            
                                            <div class="row">

                                                <!-- NIK -->

                                                    <div class="form-group col-md-3">

                                                        <label for="nis_input">NIS <span style="color: red;">*</span></label>

                                                        <div class="input-icon">

                                                            <span class="input-icon-addon">

                                                                <i class="fas fa-user"></i>

                                                            </span>
                                                            
                                                            <input type="text" value="<?php echo $studentData -> nis ?>" name="nis_input" id="nis_input" placeholder="nis" class="form-control" maxlength="20" required>
                                                        
                                                        </div>
                                                        

                                                    </div>

                                                <!-- End NIK -->

                                                <!-- Nickname -->

                                                    <div class="form-group col-md-3">

                                                        <label for="name_input">Nickname <span style="color: red;">*</span></label>

                                                        <div class="input-icon">

                                                            <span class="input-icon-addon">

                                                                <i class="fas fa-user"></i>

                                                            </span>
                                                            
                                                            <input type="text" value="<?php echo $studentData -> nama_murid ?>" name="name_input" id="name_input" placeholder="name" maxlength="100" class="form-control" required>
                                                        
                                                        </div>
                                                        
                                                    </div>
                                                    
                                                <!-- End Nickname -->

                                                <!-- Gender -->

                                                    <div class="form-group col-md-3">

                                                        <label for="gender_input">Gender <span style="color: red;">*</span></label>

                                                        <div class="input-icon">

                                                            <span class="input-icon-addon">

                                                                <i class="fas fa-user"></i>

                                                            </span>
                                                            
                                                            <select name="gender_input" id="gender_input" class="form-control" required>

                                                                <option selected disabled>Select Gender</option>
                                                                <option value="laki-laki" <?php echo ($studentData -> jenis_kelamin_murid == 'laki-laki') ? 'selected' : '' ?>>Laki - Laki</option>
                                                                <option value="perempuan" <?php echo ($studentData -> jenis_kelamin_murid == 'perempuan') ? 'selected' : '' ?>>Perempuan</option>

                                                            </select>
                                                        
                                                        </div>

                                                    </div>
                                                    
                                                <!-- End Gender -->

                                                <!-- Birthdate -->

                                                    <div class="form-group col-md-3">

                                                        <label for="birthdate_input">Birthdate</label>

                                                        <div class="input-icon">

                                                            <span class="input-icon-addon">

                                                                <i class="fas fa-calendar"></i>

                                                            </span>
                                                            
                                                            <input type="date" value="<?php echo $studentData -> tanggal_lahir_murid ?>" name="birthdate_input" id="birthdate_input" placeholder="birthdate" class="form-control">
                                                        
                                                        </div>
                                                        

                                                    </div>
                                                    
                                                <!-- End Birthdate -->

                                                <!-- Birthplace -->

                                                    <div class="form-group col-md-3">

                                                        <label for="birthplace_input">Birthplace</label>

                                                        <div class="input-icon">

                                                            <span class="input-icon-addon">

                                                                <i class="fas fa-home"></i>

                                                            </span>
                                                            
                                                            <input type="text" value="<?php echo $studentData -> tempat_lahir_murid ?>" name="birthplace_input" id="birthplace_input" placeholder="birthplace" class="form-control">
                                                        
                                                        </div>
                                                        

                                                    </div>
                                                    
                                                <!-- End Birthplace -->

                                                <!-- Phone Number -->

                                                    <div class="form-group col-md-3">

                                                        <label for="phone_number_input">Phone Number</label>

                                                        <div class="input-group mb-3">

                                                            <div class="input-group-prepend">
                                                            
                                                                <span class="input-group-text">+62</span>
                                                            
                                                            </div>

                                                            <input type="text" value="<?php echo substr($studentData -> no_handphone_murid, 4) ?>" name="phone_number_input" id="phone_number_input" placeholder="8XX-XXXX-XXXX" pattern="8[0-9]{2}-[0-9]{4}-[0-9]{4,5}" class="form-control" maxlength="16">
                                                        
                                                        </div>
                                                        
                                                    </div>
                                                    
                                                <!-- End Phone Number -->
                                                
                                                <!-- Address -->

                                                    <div class="form-group col-md-3">

                                                        <label for="address_input">Address</label>

                                                        <div class="input-icon">

                                                            <span class="input-icon-addon">

                                                                <i class="fas fa-map-location-dot"></i>

                                                            </span>
                                                            
                                                            <input type="text" value="<?php echo $studentData -> alamat_murid ?>" name="address_input" id="address_input" placeholder="address" maxlength="100" class="form-control">
                                                        
                                                        </div>
                                                        
                                                    </div>
                                                    
                                                <!-- End Address -->

                                                <!-- Class -->

                                                    <div class="form-group col-md-3">

                                                        <label for="rombel_input">Class</label>

                                                        <div class="input-icon">

                                                            <span class="input-icon-addon">

                                                                <i class="fas fa-chalkboard-user"></i>

                                                            </span>
                                                            
                                                            <select class="form-control" name="rombel_input" required>

                                                                <option disabled selected>Select Class</option>
                                                                
                                                                <?php

                                                                    foreach ($rombelData as $_data) {

                                                                ?>

                                                                    <option value="<?php echo $_data -> id_rombel ?>" <?php echo ($studentData -> kelas == $_data -> id_rombel) ? 'selected' : '' ?>><?php echo strtoupper($_data -> jurusan_rombel) ?></option>

                                                                <?php

                                                                    }

                                                                ?>

                                                            </select>
                                                        
                                                        </div>
                                        
                                                    </div>

                                                <!-- End Class -->

                                                <!-- Profile -->

                                                    <div class="form-group col-md-12">

                                                        <label for="profile_input">Profile</label>

                                                        <div class="input-icon">

                                                            <span class="input-icon-addon">

                                                                <i class="fas fa-image"></i>

                                                            </span>
                                                            
                                                            <input value="<?php echo ($userData -> profile ? $userData -> profile : 'default.png') ?>" type="file" name="profile_input" id="profile_input" class="form-control" accept=".png, .jpeg, .svg, .jpg, .webp">
                                                        
                                                        </div>
                                                        
                                                    </div>
                                                    
                                                <!-- End Profile -->

                                            </div>
                                        
                                        </div>

                                    <!-- End Card Body -->

                                    <!-- Card Footer -->

                                        <div class="card-footer">

                                            <button type="submit" class="btn btn-round btn-success mr-2">Submit</button>

                                        </div>

                                    <!-- End Card Footer -->

                                </form>

                            </div>

                        </div>

                        <div class="col-md-3">

                            <div class="card">

                                <!-- Card Header -->

                                    <div class="card-header">

                                        <div class="d-flex align-items-center">

                                            <h4 class="card-title"><i class="mr-2 fas fa-image-portrait"></i><b>PROFILE PREVIEW</b></h4>

                                        </div>

                                    </div>

                                <!-- End Card Header -->

                                <!-- Card Body -->

                                    <div class="card-body">

                                        <img id="image_preview" src="<?= base_url('Images/'.($userData -> profile ? $userData -> profile : 'default.png')) ?>" alt="_blank" class="mx-auto d-block avatar-img rounded-circle shadow-4" style="width: 171px; height: 171px">

                                    </div>

                                <!-- End Card Body -->

                            </div>

                        </div>

                    </div>
                    
                </div>

            </div>