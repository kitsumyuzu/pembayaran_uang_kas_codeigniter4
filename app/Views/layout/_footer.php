                <footer class="footer">

                    <div class="container-fluid">

                        <nav class="pull-left">

                            <ul class="nav">
                                
                                <li class="nav-item">

                                    <a class="nav-link" href="https://www.instagram.com/permataharapanku/">@permataharapanku</a>

                                </li>

                                <li class="nav-item">

                                    <a class="nav-link" href="https://www.instagram.com/stmikgici/">@stmikgici</a>

                                </li>

                            </ul>

                        </nav>

                        <div class="copyright ml-auto">

                            <i class="fas fa-heart" style="color: red;"></i> Copyright ©️ 2023 Kitsumyuzu Production <i class="fas fa-microchip" style="color: #bf00ff;"></i>

                        </div>

                    </div>

                </footer>

            </div>
            
        </div>

            <!--   Core JS Files   -->

                <script src="<?= base_url('Vendors') ?>/js/core/jquery.3.2.1.min.js"></script>
                <script src="<?= base_url('Vendors') ?>/js/core/popper.min.js"></script>
                <script src="<?= base_url('Vendors') ?>/js/core/bootstrap.min.js"></script>

            <!-- jQuery UI -->

                <script src="<?= base_url('Vendors') ?>/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
                <script src="<?= base_url('Vendors') ?>/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

            <!-- jQuery Scrollbar -->

                <script src="<?= base_url('Vendors') ?>/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


            <!-- Chart JS -->

                <script src="<?= base_url('Vendors') ?>/js/plugin/chart.js/chart.min.js"></script>

            <!-- jQuery Sparkline -->

                <script src="<?= base_url('Vendors') ?>/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

            <!-- Chart Circle -->

                <script src="<?= base_url('Vendors') ?>/js/plugin/chart-circle/circles.min.js"></script>

            <!-- Datatables -->

                <script src="<?= base_url('Vendors') ?>/js/plugin/datatables/datatables.min.js"></script>

            <!-- Bootstrap Notify -->

                <script src="<?= base_url('Vendors') ?>/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

            <!-- jQuery Vector Maps -->

                <script src="<?= base_url('Vendors') ?>/js/plugin/jqvmap/jquery.vmap.min.js"></script>
                <script src="<?= base_url('Vendors') ?>/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

            <!-- Sweet Alert -->

                <script src="<?= base_url('Vendors') ?>/js/plugin/sweetalert/sweetalert.min.js"></script>

            <!-- Atlantis JS -->

                <script src="<?= base_url('Vendors') ?>/js/atlantis.min.js"></script>

            <!-- Scripting -->

                <script>

                    $(document).ready(function() {

                        $("#show-password").on('click', function(event) {

                            event.preventDefault();

                            if($('#password_input').attr("type") == "password") {

                                $('#password_input').attr('type', 'text');
                                $('.fa-eye-slash').addClass('fa-eye');
                                $('.fa-eye').removeClass('fa-eye-slash');

                            } else {

                                $('#password_input').attr('type', 'password');
                                $('.fa-eye').addClass('fa-eye-slash');
                                $('.fa-eye-slash').removeClass('fa-eye');

                            };

                        });

                    });

                    document.getElementById("profile_input").onchange = function() {

                        document.getElementById("image_preview").src = URL.createObjectURL(profile_input.files[0]);

                    }

                </script>

                <script>

                    $(document).ready(function() {
                        
                        // Limit table shown 20 data

                            $('#limit-data-20').DataTable({

                                "pageLength": 20,

                            });

                        // Limit table shown 10 data

                            $('#limit-data-10').DataTable({

                                "pageLength": 10,

                            });

                        // Limit table shown 10 data

                            $('#limit-data-kelas').DataTable({

                                "pageLength": 12,

                            });

                    });

                </script>

    </body>

    <style>

        /* Remove scroll bar */

        *::-webkit-scrollbar {

            display: none;

        }

        *::-webkit-file-upload-button {

            color: #fff;
            background-color: #89cff0;
            border-radius: 10px;
            border: none;

        }
        
    </style>

</html>