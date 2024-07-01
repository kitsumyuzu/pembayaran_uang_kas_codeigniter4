        <div class="main-panel">
    
            <div class="content">

                <div class="page-inner py-3">

                    <div class="row">

                        <?php if (in_array(session() -> get('level'), [1])) { ?>

                            <div class="col-md-3">
                                
                                <div class="card">

                                    <div class="card-header">

                                        <div class="d-flex align-items-center">

                                            <h4 class="card-title"><i class="mr-2 fas fa-archive"></i><b>INSERT DATA</b></h4>

                                        </div>
                                        
                                    </div>

                                    <form action="<?= base_url('/home/action_add_invoice') ?>" method="post">
                                
                                        <div class="card-body">

                                            <div class="row">

                                                <div class="form-group col-md-12">

                                                    <div class="input-icon">

                                                        <span class="input-icon-addon">

                                                            <i class="fas fa-chalkboard-user"></i>

                                                        </span>

                                                        <select class="form-control" name="murid_input">

                                                            <option disabled selected>Select Murid</option>

                                                            <?php foreach ($murid as $data) { ?>

                                                                <option value="<?php echo $data -> user ?>"><?php echo ucwords($data -> nama_murid) ?></option>

                                                            <?php } ?>

                                                        </select>

                                                    </div>

                                                </div>

                                                <div class="form-group col-md-12">

                                                    <div class="input-icon">

                                                        <span class="input-icon-addon">

                                                            <i class="fas fa-calendar"></i>

                                                        </span>

                                                        <input type="date" name="date_input" id="date_input" placeholder="date" class="form-control">

                                                    </div>

                                                </div>

                                                <div class="form-group col-md-12">

                                                    <div class="input-icon">

                                                        <span class="input-icon-addon">

                                                            <i class="fas fa-money-bill"></i>

                                                        </span>

                                                        <input type="text" name="total_input" id="total_input" placeholder=" " class="form-control">

                                                    </div>

                                                </div>

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

                                            <table id="limit-data-20" class="table table-striped table-hover table-bordered-bg-dark">

                                                <thead>

                                                    <tr style="text-align: center;">

                                                        <th style="width: 10%">#</th>
                                                        <th>Nama Murid</th>
                                                        <th>Tanggal</th>
                                                        <th>Total</th>

                                                        <th style="width: 10%">Action</th>

                                                    </tr>

                                                </thead>

                                                <tbody>

                                                    <?php

                                                        $no = 1;

                                                        foreach ($invoice as $_data) {

                                                            $tanggal_uangkas = new DateTime($_data -> uangkas_tanggal);

                                                    ?>

                                                        <tr>

                                                            <td align="center"><?php echo $no++ ?></td>
                                                            <td align="center"><?php echo ucwords($_data -> nama_murid) ?></td>
                                                            <td align="center"><?php echo ucwords($tanggal_uangkas -> format('d F Y')) ?></td>
                                                            <td align="center"><?php echo number_format($_data -> uangkas_total, 0, '.', ',') ?></td>
                                                            
                                                            <td align="center">

                                                                <a href="<?= base_url('/home/delete_invoice_data/'.$_data -> id_uangkas) ?>">

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

                        <?php } else if (in_array(session() -> get('level'), [2, 3])) { ?>

                            <div class="col-md-12">

                                <div class="card">

                                    <div class="card-header">

                                        <div class="d-flex align-items-center">

                                            <h4 class="card-title"><i class="mr-2 fas fa-archive"></i><b>DATABASE</b></h4>

                                        </div>
                                        
                                    </div>

                                    <div class="card-body">

                                        <div class="table-responsive">

                                            <table id="limit-data-20" class="table table-striped table-hover table-bordered-bg-dark">

                                                <thead>

                                                    <tr style="text-align: center;">

                                                        <th style="width: 10%">#</th>
                                                        <th>Nama Murid</th>
                                                        <th>Tanggal</th>
                                                        <th>Total</th>

                                                    </tr>

                                                </thead>

                                                <tbody>

                                                    <?php

                                                        $no = 1;

                                                        foreach ($invoice as $_data) {

                                                            $tanggal_uangkas = new DateTime($_data -> uangkas_tanggal);

                                                    ?>

                                                            <tr>

                                                                <td align="center"><?php echo $no++ ?></td>
                                                                <td align="center"><?php echo ucwords($_data -> nama_murid) ?></td>
                                                                <td align="center"><?php echo ucwords($tanggal_uangkas -> format('d F Y')) ?></td>
                                                                <td align="center"><?php echo number_format($_data -> uangkas_total, 0, '.', ',') ?></td>
                                                                
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

                        <?php } else if (in_array(session() -> get('level'), [4])) { ?>

                            <?php

                                foreach($rombel as $_data) {

                                    if ($_data -> bendahara == session() -> get('id')) {
                                        
                            ?>

                                        <div class="col-md-3">
                                
                                            <div class="card">

                                                <div class="card-header">

                                                    <div class="d-flex align-items-center">

                                                        <h4 class="card-title"><i class="mr-2 fas fa-archive"></i><b>INSERT DATA</b></h4>

                                                    </div>
                                                    
                                                </div>

                                                <form action="<?= base_url('/home/action_add_invoice') ?>" method="post">
                                            
                                                    <div class="card-body">

                                                        <div class="row">

                                                            <div class="form-group col-md-12">

                                                                <div class="input-icon">

                                                                    <span class="input-icon-addon">

                                                                        <i class="fas fa-chalkboard-user"></i>

                                                                    </span>

                                                                    <select class="form-control" name="murid_input">

                                                                        <option disabled selected>Select Murid</option>

                                                                        <?php foreach ($murid as $data) { ?>

                                                                            <option value="<?php echo $data -> user ?>"><?php echo ucwords($data -> nama_murid) ?></option>

                                                                        <?php } ?>

                                                                    </select>

                                                                </div>

                                                            </div>

                                                            <div class="form-group col-md-12">

                                                                <div class="input-icon">

                                                                    <span class="input-icon-addon">

                                                                        <i class="fas fa-calendar"></i>

                                                                    </span>

                                                                    <input type="date" name="date_input" id="date_input" placeholder="date" class="form-control">

                                                                </div>

                                                            </div>

                                                            <div class="form-group col-md-12">

                                                                <div class="input-icon">

                                                                    <span class="input-icon-addon">

                                                                        <i class="fas fa-money-bill"></i>

                                                                    </span>

                                                                    <input type="text" name="total_input" id="total_input" placeholder=" " class="form-control">

                                                                </div>

                                                            </div>

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

                                                        <table id="limit-data-20" class="table table-striped table-hover table-bordered-bg-dark">

                                                            <thead>

                                                                <tr style="text-align: center;">

                                                                    <th style="width: 10%">#</th>
                                                                    <th>Nama Murid</th>
                                                                    <th>Tanggal</th>
                                                                    <th>Total</th>

                                                                    <th style="width: 25%">Action</th>

                                                                </tr>

                                                            </thead>

                                                            <tbody>

                                                                <?php

                                                                    $no = 1;

                                                                    foreach ($invoice as $_data) {
                                                                        
                                                                        $tanggal_uangkas = new DateTime($_data -> uangkas_tanggal);

                                                                ?>

                                                                        <tr>

                                                                            <td align="center"><?php echo $no++ ?></td>
                                                                            <td align="center"><?php echo ucwords($_data -> nama_murid) ?></td>
                                                                            <td align="center"><?php echo ucwords($tanggal_uangkas -> format('d F Y')) ?></td>
                                                                            <td align="center"><?php echo number_format($_data -> uangkas_total, 0, '.', ',') ?></td>
                                                                            
                                                                            <td align="center">

                                                                                <?php if ($_data -> uangkas_murid !== session() -> get('id')) { ?>

                                                                                    <a href="<?= base_url('/home/delete_invoice_data/'.$_data -> id_uangkas) ?>">

                                                                                        <button type="button" data-toggle="tooltip" class="btn btn-link btn-danger btn-lg" data-original-title="Delete data"><i class="fas fa-trash"></i></button>

                                                                                    </a>

                                                                                <?php } else { ?>

                                                                                    <a href="<?= base_url('/home/delete_invoice_data/'.$_data -> id_uangkas) ?>">

                                                                                        <button type="button" data-toggle="tooltip" class="btn btn-link btn-success btn-lg" data-original-title="Pays"><i class="fas fa-wallet"></i></button>

                                                                                    </a>

                                                                                <?php } ?>
                                                                            
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

                            <?php

                                    } else {

                            ?>

                                        <div class="col-md-12">

                                            <div class="card">

                                                <div class="card-header">

                                                    <div class="d-flex align-items-center">

                                                        <h4 class="card-title"><i class="mr-2 fas fa-archive"></i><b>DATABASE</b></h4>

                                                    </div>
                                                    
                                                </div>

                                                <div class="card-body">

                                                    <div class="table-responsive">

                                                        <table id="limit-data-20" class="table table-striped table-hover table-bordered-bg-dark">

                                                            <thead>

                                                                <tr style="text-align: center;">

                                                                    <th style="width: 10%">#</th>
                                                                    <th>Nama Murid</th>
                                                                    <th>Tanggal</th>
                                                                    <th>Total</th>

                                                                    <th style="width: 10%">Action</th>

                                                                </tr>

                                                            </thead>

                                                            <tbody>

                                                                <?php

                                                                    $no = 1;

                                                                    foreach ($invoice as $_data) {

                                                                        if ($_data -> uangkas_murid == session() -> get('id')) {

                                                                            $tanggal_uangkas = new DateTime($_data -> uangkas_tanggal);

                                                                ?>

                                                                            <tr>

                                                                                <td align="center"><?php echo $no++ ?></td>
                                                                                <td align="center"><?php echo ucwords($_data -> nama_murid) ?></td>
                                                                                <td align="center"><?php echo ucwords($tanggal_uangkas -> format('d F Y')) ?></td>
                                                                                <td align="center"><?php echo number_format($_data -> uangkas_total, 0, '.', ',') ?></td>
                                                                                
                                                                                <td align="center">

                                                                                    <a href="<?= base_url('/home/delete_invoice_data/'.$_data -> id_uangkas) ?>">

                                                                                        <button type="button" data-toggle="tooltip" class="btn btn-link btn-success btn-lg" data-original-title="Pays"><i class="fas fa-wallet"></i></button>

                                                                                    </a>
                                                                                
                                                                                </td>

                                                                            </tr>

                                                                <?php


                                                                        }

                                                                    }

                                                                ?>

                                                            </tbody>

                                                        </table>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                            <?php
                                    }

                                }

                            ?>

                        <?php } ?>

                    </div>

                </div>

            </div>