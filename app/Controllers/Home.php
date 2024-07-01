<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Schema;

class Home extends BaseController {

	// ================================================================================================================================ //

		public function index() {

			if (session() -> get('id') == NULL) {

                // Return a view of login the user haven't logged in yet

                    return view('login');

            } else if (session() -> get('id') > 0) {

                // Redirect an user back into dashboard pages

                    return redirect() -> to('/home/dashboard');

            }

		}

		public function dashboard() {

            if (session() -> get('id') > 0) {

                // Return a view base from a file specified

                    echo view('layout/_header');
                    echo view('layout/_menu');

                    echo view('pages/dashboard');
                    echo view('layout/_footer');

            } else {

                // Redirect an user back into login pages

                    return redirect() -> to('/home/');

            }

        }
		
	// ================================================== [ Authentication System ] =================================================== //

        public function authentication_login() {

            $Schema = new Schema();

                // Collecting data by " name " attribute from HTML document

                    $authentication_account = $this -> request -> getPost('account_input_username');
                    $authentication_password = $this -> request -> getPost('account_input_password');

                /**
                 * Filter a input username with email, if the input was an email then login with session of email
                 * else if the input was username then login with session of username

                 * Convert inputted data into an array, and find the data from database of " authentication_account " table
                */

                    if (filter_var($authentication_account, FILTER_VALIDATE_EMAIL)) {
                        
                        $_data = array('email' => $authentication_account, 'password' => md5($authentication_password));

                    } else {

                        $_data = array('username' => $authentication_account, 'password' => md5($authentication_password));

                    }
                    
                    $data_filter = $Schema -> getWhere2('user', $_data);

                // ==================================================================================================== //

                    if ($data_filter > 0) {

                        session() -> set('username', $data_filter['username']);
                        session() -> set('email', $data_filter['email']);
                        session() -> set('level', $data_filter['level']);
                        session() -> set('profile', $data_filter['profile']);
                        session() -> set('id', $data_filter['id_user']);

                        // Redirect an user into dashboard pages

                            return redirect() -> to('/home/dashboard');

                    } else {

                        // Redirect an user back into home pages

                            return redirect() -> to('/home/');

                    };
            
        }

        public function authentication_logout() {

            session() -> destroy(); // Destroy session that existed in a user

            // Redirect an user back into login pages

                return redirect() -> to('/home/authentication_login');

        }

    // ================================================== [ User Management System ] =================================================== //

        public function user_data() {

            if (in_array(session() -> get('level'), [1]) || session() -> get('id') > 0) {

                $Schema = new Schema();

                // Fetching data

                    $on = 'user.level = level.id_level';

                    $_fetch['userData'] = $Schema -> visual_join2('user', 'level', $on);

                // Return a view base from a file specified

                    echo view('layout/_header');
                    echo view('layout/_menu');

                    echo view('pages/user/data_user', $_fetch);
                    echo view('layout/_footer');

            } else {

                //  Redirect an user back into dashboard pages

                    return redirect() -> to('/Home/dashboard');
                
            }

        }

        public function teacher_data() {

            if (in_array(session() -> get('level'), [1]) || session() -> get('id') > 0) {

                $Schema = new Schema();

                // Fetching data

                    $_fetch['teacherData'] = $Schema -> visual('guru');

                // Return a view base from a file specified

                    echo view('layout/_header');
                    echo view('layout/_menu');

                    echo view('pages/user/data_guru', $_fetch);
                    echo view('layout/_footer');

            }

        }

        public function student_data() {

            if (in_array(session() -> get('level'), [1]) || session() -> get('id') > 0) {

                $Schema = new Schema();

                // Fetching data

                    $on = 'murid.kelas = rombel.id_rombel';

                    $_fetch['studentData'] = $Schema -> visual_join2('murid', 'rombel', $on);

                // Return a view base from a file specified

                    echo view('layout/_header');
                    echo view('layout/_menu');

                    echo view('pages/user/data_murid', $_fetch);
                    echo view('layout/_footer');

            }

        }


        public function add_teacher_data() {

            if (in_array(session() -> get('roles'), [1]) || session() -> get('id') > 0) {

                // Return a view base from a file specified

                    echo view('layout/_header');
                    echo view('layout/_menu');

                    echo view('forms/user/insert_guru');
                    echo view('layout/_footer');

            } else {

                // Redirect an user back into dashboard pages

                    return redirect() -> to('/home/dashboard');

            }

        }

        public function action_add_teacher_data() {

            $Schema = new Schema();

                // Authentication data collection

                    $username = $this -> request -> getPost('username_input');
                    $email = $this -> request -> getPost('email_input');
                    $password = $this -> request -> getPost('password_input');
                    $profile = $this -> request -> getFile('profile_input');

                // Personal information data collection

                    $nik = $this -> request -> getPost('nik_input');
                    $name = $this -> request -> getPost('name_input');
                    $gender = $this -> request -> getPost('gender_input');
                    $birthdate = $this -> request -> getPost('birthdate_input');
                    $birthplace = $this -> request -> getPost('birthplace_input');
                    $phone_number = $this -> request -> getPost('phone_number_input');
                    $address = $this -> request -> getPost('address_input');

                // Image validate

                    if ($profile && $profile -> isValid() && ! $profile -> hasMoved()) {

                        $images = $profile -> getRandomName();
                        $profile -> move('Images/', $images);

                    }

                // Convert data into an array and add into databases

                    $_userData = array(
                        
                        'username' => $username,
                        'email' => $email, 
                        'password' => md5($password),
                        'level' => '2',
                        'profile' => $images,
                    
                    );

                    if (in_array(session() -> get('level'), [1]) || session() -> get('id') > 0) {

                        $Schema -> add_data('user', $_userData);

                    } else {

                        // Redirect an user back into dashboard pages

                            return redirect() -> to('/home/dashboard');

                    }

                // Convert data into an array and add into databases

                    // Fetching data

                        $_fetch = array('username' => $username);
                        $_where = $Schema -> getWhere2('user', $_fetch);

                        $_id = $_where['id_user'];

                        $_guruData = array(

                            'nik' => $nik,
                            'nama_guru' => $name,
                            'jenis_kelamin_guru' => $gender,
                            'tanggal_lahir_guru' => $birthdate,
                            'tempat_lahir_guru' => $birthplace,
                            'no_handphone_guru' => '+62 ' . $phone_number,
                            'alamat_guru' => $address,
                            'user' => $_id

                        );

                        if (in_array(session() -> get('roles'), [1]) || session() -> get('id') > 0) {

                            $Schema -> add_data('guru', $_guruData);

                        } else {

                            // Redirect an user back into dashboard pages

                                return redirect() -> to('/home/dashboard');

                        }

                    // Redirect an user back into teacher pages

                        return redirect() -> to('/home/teacher_data');

        }

        public function update_teacher_data($_id) {

            if (in_array(session() -> get('roles'), [1]) || session() -> get('id') > 0) {

                $Schema = new Schema();

                // Fetching data

                    $_userData = array('id_user' => $_id);
                    $_teacher = array('user' => $_id);

                    $_fetch['userData'] = $Schema -> getWhere('user', $_userData);
                    $_fetch['teacherData'] = $Schema -> getWhere('guru', $_teacher);

                // Return a view base from a file specified

                    echo view('layout/_header');
                    echo view('layout/_menu');

                    echo view('forms/user/update_guru', $_fetch);
                    echo view('layout/_footer');

            } else {

                // Redirect an user back into dashboard pages

                    return redirect() -> to('/home/dashboard');

            }

        }

        public function action_update_teacher_data() {

            $Schema = new Schema();

                // Authentication data collection

                    $username = $this -> request -> getPost('username_input');
                    $email = $this -> request -> getPost('email_input');
                    $profile = $this -> request -> getFile('profile_input');
                    $_idUser = $this -> request -> getPost('idUser');
                    $_oldImages = $this -> request -> getPost('old_images');

                // Personal information data collection

                    $nik = $this -> request -> getPost('nik_input');
                    $name = $this -> request -> getPost('name_input');
                    $gender = $this -> request -> getPost('gender_input');
                    $birthdate = $this -> request -> getPost('birthdate_input');
                    $birthplace = $this -> request -> getPost('birthplace_input');
                    $phone_number = $this -> request -> getPost('phone_number_input');
                    $address = $this -> request -> getPost('address_input');
                    $_idTeacher = $this -> request -> getPost('idTeacher');

                // Image validate

                    if ($profile && $profile -> isValid() && ! $profile -> hasMoved()) {

                        if ($_oldImages == 'default.png') {

                            $images = $profile -> getRandomName();
                            $profile -> move('Images/', $images);
                            
                        } else {

                            if (file_exists('Images/'.$_oldImages)) {

                                unlink('Images/'.$_oldImages);

                            }
                            
                            $images = $profile -> getRandomName();
                            $profile -> move('Images/', $images);

                        }


                    }

                // Convert data into an array and add into databases

                    $_where = array('id_user' => $_idUser);

                    $_userData = array(
                        
                        'username' => $username,
                        'email' => $email,
                        'profile' => $images,
                    
                    );

                    if (in_array(session() -> get('level'), [1]) || session() -> get('id') > 0) {

                        $Schema -> edit_data('user', $_userData, $_where);

                    } else {

                        // Redirect an user back into dashboard pages

                            return redirect() -> to('/home/dashboard');

                    }

                // Convert data into an array and add into databases

                    // Fetching data

                        $_where2 = array('user' => $_idTeacher);

                        $_teacherData = array(

                            'nik' => $nik,
                            'nama_guru' => $name,
                            'jenis_kelamin_guru' => $gender,
                            'tanggal_lahir_guru' => $birthdate,
                            'tempat_lahir_guru' => $birthplace,
                            'no_handphone_guru' => '+62 ' . $phone_number,
                            'alamat_guru' => $address,

                        );

                        if (in_array(session() -> get('roles'), [1]) || session() -> get('id') > 0) {

                            $Schema -> edit_data('guru', $_teacherData, $_where2);

                        } else {

                            // Redirect an user back into dashboard pages

                                return redirect() -> to('/home/dashboard');

                        }

                    // Redirect an user back into teacher pages

                        return redirect() -> to('/home/teacher_data');

        }

        public function delete_teacher_data($_id) {

            $Schema = new Schema();

            $_userData = array('id_user' => $_id);
            $_teacherData = array('user' => $_id);

            // Delete data from databases

                if (in_array(session() -> get('level'), [1])) {

                    $Schema -> delete_data('user', $_userData);
                    $Schema -> delete_data('guru', $_teacherData);

                } else {

                    // Redirect an user back into dashboard pages

                        return redirect() -> to('/home/dashboard');

                }

                // Redirect an user back into teacher pages

                    return redirect() -> to('/home/teacher_data');

        }


        public function add_student_data() {

            if (in_array(session() -> get('roles'), [1]) || session() -> get('id') > 0) {

                $Schema = new Schema();

                // Fetching data

                    $_fetch['studentData'] = $Schema -> visual('rombel');

                // Return a view base from a file specified

                    echo view('layout/_header');
                    echo view('layout/_menu');

                    echo view('forms/user/insert_murid', $_fetch);
                    echo view('layout/_footer');

            } else {

                // Redirect an user back into dashboard pages

                    return redirect() -> to('/home/dashboard');

            }

        }

        public function action_add_student_data() {

            $Schema = new Schema();

                // Authentication data collection

                    $username = $this -> request -> getPost('username_input');
                    $email = $this -> request -> getPost('email_input');
                    $password = $this -> request -> getPost('password_input');
                    $profile = $this -> request -> getFile('profile_input');

                // Personal information data collection

                    $nis = $this -> request -> getPost('nis_input');
                    $name = $this -> request -> getPost('name_input');
                    $gender = $this -> request -> getPost('gender_input');
                    $birthdate = $this -> request -> getPost('birthdate_input');
                    $birthplace = $this -> request -> getPost('birthplace_input');
                    $phone_number = $this -> request -> getPost('phone_number_input');
                    $address = $this -> request -> getPost('address_input');
                    $rombel = $this -> request -> getPost('rombel_input');

                // Image validate

                    if ($profile -> isValid() && ! $profile -> hasMoved()) {

                        $images = $profile -> getRandomName();
                        $profile -> move('Images/', $images);

                    }

                // Convert data into an array and add into databases

                    $_userData = array(
                        
                        'username' => $username,
                        'email' => $email, 
                        'password' => md5($password),
                        'level' => '4',
                        'profile' => $images,
                    
                    );

                    if (in_array(session() -> get('level'), [1]) || session() -> get('id') > 0) {

                        $Schema -> add_data('user', $_userData);

                    } else {

                        // Redirect an user back into dashboard pages

                            return redirect() -> to('/home/dashboard');

                    }

                // Convert data into an array and add into databases

                    // Fetching data

                        $_fetch = array('username' => $username);
                        $_where = $Schema -> getWhere2('user', $_fetch);

                        $_id = $_where['id_user'];

                        $_muridData = array(

                            'nis' => $nis,
                            'nama_murid' => $name,
                            'jenis_kelamin_murid' => $gender,
                            'tanggal_lahir_murid' => $birthdate,
                            'tempat_lahir_murid' => $birthplace,
                            'no_handphone_murid' => '+62 ' . $phone_number,
                            'alamat_murid' => $address,
                            'kelas' => $rombel,
                            'user' => $_id

                        );

                        if (in_array(session() -> get('roles'), [1]) || session() -> get('id') > 0) {

                            $Schema -> add_data('murid', $_muridData);

                        } else {

                            // Redirect an user back into dashboard pages

                                return redirect() -> to('/home/dashboard');

                        }

                    // Redirect an user back into student pages

                        return redirect() -> to('/home/student_data');

        }

        public function update_student_data($_id) {

            if (session() -> get('id') > 0) {

                $Schema = new Schema();

                // Fetching data

                    $_userData = array('id_user' => $_id);
                    $_studentData = array('user' => $_id);

                    $_fetch['userData'] = $Schema -> getWhere('user', $_userData);
                    $_fetch['studentData'] = $Schema -> getWhere('murid', $_studentData);
                    $_fetch['rombelData'] = $Schema -> visual('rombel');

                // Return a view base from a file specified

                    echo view('layout/_header');
                    echo view('layout/_menu');

                    echo view('forms/user/update_murid', $_fetch);
                    echo view('layout/_footer');

            } else {

                // Redirect an user back into dashboard pages

                    return redirect() -> to('/home/dashboard');

            }

        }

        public function action_update_student_data() {

            $Schema = new Schema();

                // Authentication data collection

                    $username = $this -> request -> getPost('username_input');
                    $email = $this -> request -> getPost('email_input');
                    $profile = $this -> request -> getFile('profile_input');
                    $_idUser = $this -> request -> getPost('idUser');
                    $_oldImages = $this -> request -> getPost('old_images');

                // Personal information data collection

                    $nis = $this -> request -> getPost('nis_input');
                    $name = $this -> request -> getPost('name_input');
                    $gender = $this -> request -> getPost('gender_input');
                    $birthdate = $this -> request -> getPost('birthdate_input');
                    $birthplace = $this -> request -> getPost('birthplace_input');
                    $phone_number = $this -> request -> getPost('phone_number_input');
                    $address = $this -> request -> getPost('address_input');
                    $rombel = $this -> request -> getPost('rombel_input');
                    $_idStudent = $this -> request -> getPost('idStudent');

                // Image validate

                    if ($profile -> isValid() && ! $profile -> hasMoved()) {

                        if ($_oldImages == 'default.png') {

                            $images = $profile -> getRandomName();
                            $profile -> move('Images/', $images);
                            
                        } else {

                            if (file_exists('Images/'.$_oldImages)) {

                                unlink('Images/'.$_oldImages);

                            }
                            
                            $images = $profile -> getRandomName();
                            $profile -> move('Images/', $images);

                        }

                    }

                // Convert data into an array and add into databases

                    $_where = array('id_user' => $_idUser);

                    $_userData = array(
                        
                        'username' => $username,
                        'email' => $email,
                        'profile' => $images,
                    
                    );

                    if (session() -> get('id') > 0) {

                        $Schema -> edit_data('user', $_userData, $_where);

                    } else {

                        // Redirect an user back into dashboard pages

                            return redirect() -> to('/home/dashboard');

                    }

                // Convert data into an array and add into databases

                    // Fetching data

                        $_where2 = array('user' => $_idStudent);

                        $_studentData = array(

                            'nis' => $nis,
                            'nama_murid' => $name,
                            'jenis_kelamin_murid' => $gender,
                            'tanggal_lahir_murid' => $birthdate,
                            'tempat_lahir_murid' => $birthplace,
                            'no_handphone_murid' => '+62 ' . $phone_number,
                            'alamat_murid' => $address,
                            'kelas' => $rombel

                        );

                        if (session() -> get('id') > 0) {

                            $Schema -> edit_data('murid', $_studentData, $_where2);

                        } else {

                            // Redirect an user back into dashboard pages

                                return redirect() -> to('/home/dashboard');

                        }

                    // Redirect an user back into student pages

                        return redirect() -> to('/home/student_data');

        }

        public function delete_student_data($_id) {

            $Schema = new Schema();

            $_userData = array('id_user' => $_id);
            $_studentData = array('user' => $_id);

            // Get images

                $userProfile = $Schema -> getWhere('user', $_userData);
                $profileImage = $userProfile -> profile;

            // Delete data from databases

                if (in_array(session() -> get('level'), [1])) {

                    $Schema -> delete_data('user', $_userData);
                    $Schema -> delete_data('murid', $_studentData);

                    if ($profileImage !== 'default.png') {

                        if (file_exists('Images/'.$profileImage)) {

                            unlink('Images/'.$profileImage);

                        }
                        
                    }

                } else {

                    // Redirect an user back into dashboard pages

                        return redirect() -> to('/home/dashboard');

                }

                // Redirect an user back into student pages

                    return redirect() -> to('/home/student_data');

        }

    // ================================================== [ Majoring System ] =================================================== //

        public function major_data() {

            if (session() -> get('id') > 0) {

                $Schema = new Schema();

                $_fetch['majorData'] = $Schema -> visual('jurusan');

                echo view('layout/_header');
                echo view('layout/_menu');

                echo view('pages/school/major_data', $_fetch);
                echo view('layout/_footer');

            } else {

                return redirect() -> to('/home/dashboard');
                
            }

        }

        public function action_add_major_data() {

            $Schema = new Schema();

                // Authentication data collection

                    $major_name = $this -> request -> getPost('major_name_input');

                // Convert data into an array and add into databases

                    $_majorData = array(
                        
                        'nama_jurusan' => $major_name,
                    
                    );

                    if (in_array(session() -> get('level'), [1]) || session() -> get('id') > 0) {

                        $Schema -> add_data('jurusan', $_majorData);

                    } else {

                        // Redirect an user back into dashboard pages

                            return redirect() -> to('/home/dashboard');

                    }

                    // Redirect an user back into major pages

                        return redirect() -> to('/home/major_data');

        }

        public function delete_major_data($_id) {

            $Schema = new Schema();

            $_majorData = array('id_jurusan' => $_id);

            // Delete data from databases

                if (in_array(session() -> get('level'), [1])) {

                    $Schema -> delete_data('jurusan', $_majorData);

                } else {

                    // Redirect an user back into dashboard pages

                        return redirect() -> to('/home/dashboard');

                }

                // Redirect an user back into major pages

                    return redirect() -> to('/home/major_data');

        }

    // ================================================== [ Class System ] =================================================== //

        public function class_data() {

            if (session() -> get('id') > 0) {

                $Schema = new Schema();

                $_fetch['classData'] = $Schema -> visual('kelas');

                echo view('layout/_header');
                echo view('layout/_menu');

                echo view('pages/school/class_data', $_fetch);
                echo view('layout/_footer');

            } else {

                return redirect() -> to('/home/dashboard');
                
            }

        }

        public function action_add_class_data() {

            $Schema = new Schema();

                // Authentication data collection

                    $class_name = $this -> request -> getPost('class_name_input');

                // Convert data into an array and add into databases

                    $_classData = array(
                        
                        'nama_kelas' => $class_name,
                    
                    );

                    if (in_array(session() -> get('level'), [1]) || session() -> get('id') > 0) {

                        $Schema -> add_data('kelas', $_classData);

                    } else {

                        // Redirect an user back into dashboard pages

                            return redirect() -> to('/home/dashboard');

                    }

                    // Redirect an user back into class pages

                        return redirect() -> to('/home/class_data');

        }

        public function delete_class_data($_id) {

            $Schema = new Schema();

            $_classData = array('id_kelas' => $_id);

            // Delete data from databases

                if (in_array(session() -> get('level'), [1])) {

                    $Schema -> delete_data('kelas', $_classData);

                } else {

                    // Redirect an user back into dashboard pages

                        return redirect() -> to('/home/dashboard');

                }

                // Redirect an user back into class pages

                    return redirect() -> to('/home/class_data');

        }

    // ================================================== [ Rombel System ] =================================================== //
    
        public function rombel_data() {

            if (session() -> get('id') > 0) {

                $Schema = new Schema();
                
                $on = 'rombel.wali_kelas = guru.id_guru';
                $on1 = 'rombel.bendahara = murid.user';

                $_fetch['rombelData'] = $Schema -> visual_join3('rombel', 'guru', 'murid', $on, $on1);

                $_fetch['majorData'] = $Schema -> visual('jurusan');
                $_fetch['classData'] = $Schema -> visual('kelas');
                $_fetch['teacherData'] = $Schema -> visual('guru');
                $_fetch['studentData'] = $Schema -> visual('murid');

                echo view('layout/_header');
                echo view('layout/_menu');

                echo view('pages/school/rombel_data', $_fetch);
                echo view('layout/_footer');

            } else {

                return redirect() -> to('/home/dashboard');
                
            }

        }

        public function action_add_rombel_data() {

            $Schema = new Schema();

                // Authentication data collection

                    $major = $this -> request -> getPost('major_input');
                    $class = $this -> request -> getPost('class_input');
                    $class_room = $this -> request -> getPost('class_room_input');
                    $teacher = $this -> request -> getPost('teacher_input');
                    $treasurer = $this -> request -> getPost('treasurer_input');
                    $classbills = $this -> request -> getPost('bills');

                // Convert data into an array and add into databases

                    $_rombelData = array(
                        
                        'jurusan_rombel' => $major . ' ' . $class . ' ' . $class_room,
                        'wali_kelas' => $teacher,
                        'bendahara' => $treasurer,
                        'rombel_uangkas' => $classbills
                    
                    );

                    if (in_array(session() -> get('level'), [1]) || session() -> get('id') > 0) {

                        $Schema -> add_data('rombel', $_rombelData);

                    } else {

                        // Redirect an user back into dashboard pages

                            return redirect() -> to('/home/dashboard');

                    }

                    // Redirect an user back into class pages

                        return redirect() -> to('/home/rombel_data');

        }

        public function update_rombel_data($_id) {

            if (in_array(session() -> get('roles'), [1]) || session() -> get('id') > 0) {

                $Schema = new Schema();

                // Fetching data

                    $_userData = array('id_rombel' => $_id);

                    $_fetch['rombelData'] = $Schema -> getWhere('rombel', $_userData);
                    $_fetch['majorData'] = $Schema -> visual('jurusan');
                    $_fetch['classData'] = $Schema -> visual('kelas');
                    $_fetch['teacherData'] = $Schema -> visual('guru');
                    $_fetch['studentData'] = $Schema -> visual('murid');

                // Return a view base from a file specified

                    echo view('layout/_header');
                    echo view('layout/_menu');

                    echo view('forms/update_rombel', $_fetch);
                    echo view('layout/_footer');

            } else {

                // Redirect an user back into dashboard pages

                    return redirect() -> to('/home/dashboard');

            }

        }

        public function action_update_rombel_data() {

            $Schema = new Schema();

                // Personal information data collection

                    $major = $this -> request -> getPost('major_input');
                    $class = $this -> request -> getPost('class_input');
                    $class_room = $this -> request -> getPost('class_room_input');
                    $teacher = $this -> request -> getPost('teacher_input');
                    $treasurer = $this -> request -> getPost('treasurer_input');
                    $classbills = $this -> request -> getPost('bills');
                    $_idRombel = $this -> request -> getPost('idRombel');

                // Convert data into an array and add into databases

                    $_where = array('id_rombel' => $_idRombel);

                    $_rombelData = array(
                        
                        'jurusan_rombel' => $major . ' ' . $class . ' ' . $class_room,
                        'wali_kelas' => $teacher,
                        'bendahara' => $treasurer,
                        'rombel_uangkas' => $classbills
                    
                    );

                    if (in_array(session() -> get('level'), [1]) || session() -> get('id') > 0) {

                        $Schema -> edit_data('rombel', $_rombelData, $_where);

                    } else {

                        // Redirect an user back into dashboard pages

                            return redirect() -> to('/home/dashboard');

                    }

                    // Redirect an user back into student pages

                        return redirect() -> to('/home/rombel_data');

        }

        public function delete_rombel_data($_id) {

            $Schema = new Schema();

            $_rombelData = array('id_rombel' => $_id);

            // Delete data from databases

                if (in_array(session() -> get('level'), [1])) {

                    $Schema -> delete_data('rombel', $_rombelData);

                } else {

                    // Redirect an user back into dashboard pages

                        return redirect() -> to('/home/dashboard');

                }

                // Redirect an user back into rombel pages

                    return redirect() -> to('/home/rombel_data');

        }

    // ================================================== [ Invoice Management System ] =================================================== //
    
        public function invoice_data() {

            if (session() -> get('id') > 0) {

                $Schema = new Schema();

                $on = 'uangkas.uangkas_murid = murid.user';
                $on1 = 'rombel.bendahara = murid.id_murid';

                $_fetch['murid'] = $Schema -> visual('murid');
                $_fetch['rombel'] = $Schema -> visual('rombel');
                $_fetch['invoice'] = $Schema -> visual_join3('uangkas', 'murid', 'rombel', $on, $on1);

                echo view('layout/_header');
                echo view('layout/_menu');

                echo view('pages/invoice/invoice_data', $_fetch);
                echo view('layout/_footer');
            
            } else {

                return redirect() -> to('/home/dashboard');

            }

        }

        public function action_add_invoice() {

            $Schema = new Schema();

                // Authentication data collection

                    $murid = $this -> request -> getPost('murid_input');
                    $date = $this -> request -> getPost('date_input');
                    $total = $this -> request -> getPost('total_input');

                // Convert data into an array and add into databases

                    $_uangkasData = array(
                        
                        'uangkas_murid' => $murid,
                        'uangkas_tanggal' => $date,
                        'uangkas_total' => $total
                    
                    );

                    if (in_array(session() -> get('level'), [1, 4]) || session() -> get('id') > 0) {

                        $Schema -> add_data('uangkas', $_uangkasData);

                    } else {

                        // Redirect an user back into dashboard pages

                            return redirect() -> to('/home/dashboard');

                    }

                    // Redirect an user back into class pages

                        return redirect() -> to('/home/invoice_data');

        }

        public function delete_invoice_data($_id) {

            $Schema = new Schema();

            $_uangkasData = array('id_uangkas' => $_id);

            // Delete data from databases

                if (in_array(session() -> get('level'), [1, 4])) {

                    $Schema -> delete_data('uangkas', $_uangkasData);

                } else {

                    // Redirect an user back into dashboard pages

                        return redirect() -> to('/home/dashboard');

                }

                // Redirect an user back into rombel pages

                    return redirect() -> to('/home/invoice_data');

        }
    

}