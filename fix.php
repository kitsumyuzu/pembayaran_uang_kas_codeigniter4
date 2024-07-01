    <?php if (in_array(session() -> get('level'), [1])) { ?>

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

                                    if (in_array(session() -> get('level'), [3])) {

                                        if ($_data -> uangkas_murid == session() -> get('id')) {

                                            $tanggal_uangkas = new DateTime($_data -> uangkas_tanggal);

                            ?>

                                <tr>

                                    <td align="center"><?php echo $no++ ?></td>
                                    <td align="center"><?php echo ucwords($_data -> nama_murid) ?></td>
                                    <td align="center"><?php echo ucwords($tanggal_uangkas -> format('d F Y')) ?></td>
                                    <td align="center"><?php echo number_format($_data -> uangkas_total, 0, '.', ',') ?></td>
                                    
                                    <?php if (in_array(session() -> get('level'), [1])) { ?>

                                        <td align="center">

                                            <a href="<?= base_url('/home/delete_invoice_data/'.$_data -> id_uangkas) ?>">

                                                <button type="button" data-toggle="tooltip" class="btn btn-link btn-danger btn-lg" data-original-title="Delete data"><i class="fas fa-trash"></i></button>

                                            </a>
                                        
                                        </td>

                                    <?php } else if (in_array(session() -> get('level'), [3])) { ?>
                                    
                                        <td align="center">

                                            <a href="<?= base_url('/home/') ?>">

                                                <button type="button" data-toggle="tooltip" class="btn btn-link btn-success btn-lg" data-original-title="Pays"><i class="fas fa-wallet"></i></button>

                                            </a>
                                        
                                        </td>
                                        
                                    <?php } ?>

                                </tr>

                            <?php

                                        }

                                    } else if (in_array(session() -> get('level'), [1])) {

                                        $tanggal_uangkas = new DateTime($_data -> uangkas_tanggal);

                            ?>

                                <tr>

                                    <td align="center"><?php echo $no++ ?></td>
                                    <td align="center"><?php echo ucwords($_data -> nama_murid) ?></td>
                                    <td align="center"><?php echo ucwords($tanggal_uangkas -> format('d F Y')) ?></td>
                                    <td align="center"><?php echo number_format($_data -> uangkas_total, 0, '.', ',') ?></td>
                                    
                                    <?php if (in_array(session() -> get('level'), [1])) { ?>

                                        <td align="center">

                                            <a href="<?= base_url('/home/delete_invoice_data/'.$_data -> id_uangkas) ?>">

                                                <button type="button" data-toggle="tooltip" class="btn btn-link btn-danger btn-lg" data-original-title="Delete data"><i class="fas fa-trash"></i></button>

                                            </a>
                                        
                                        </td>

                                    <?php } else if (in_array(session() -> get('level'), [3])) { ?>
                                    
                                        <td align="center">

                                            <a href="<?= base_url('/home/') ?>">

                                                <button type="button" data-toggle="tooltip" class="btn btn-link btn-success btn-lg" data-original-title="Pays"><i class="fas fa-wallet"></i></button>

                                            </a>
                                        
                                        </td>
                                        
                                    <?php } ?>

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

    <?php } else if (in_array(session() -> get('level'), [3])) { ?>

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

                                    if (in_array(session() -> get('level'), [3])) {

                                        if ($_data -> uangkas_murid == session() -> get('id')) {

                                            $tanggal_uangkas = new DateTime($_data -> uangkas_tanggal);

                            ?>

                                <tr>

                                    <td align="center"><?php echo $no++ ?></td>
                                    <td align="center"><?php echo ucwords($_data -> nama_murid) ?></td>
                                    <td align="center"><?php echo ucwords($tanggal_uangkas -> format('d F Y')) ?></td>
                                    <td align="center"><?php echo number_format($_data -> uangkas_total, 0, '.', ',') ?></td>
                                    
                                    <?php if (in_array(session() -> get('level'), [1])) { ?>

                                        <td align="center">

                                            <a href="<?= base_url('/home/delete_invoice_data/'.$_data -> id_uangkas) ?>">

                                                <button type="button" data-toggle="tooltip" class="btn btn-link btn-danger btn-lg" data-original-title="Delete data"><i class="fas fa-trash"></i></button>

                                            </a>
                                        
                                        </td>

                                    <?php } else if (in_array(session() -> get('level'), [3])) { ?>
                                    
                                        <td align="center">

                                            <a href="<?= base_url('/home/delete_invoice_data/'.$_data -> id_uangkas) ?>">

                                                <button type="button" data-toggle="tooltip" class="btn btn-link btn-success btn-lg" data-original-title="Pays"><i class="fas fa-wallet"></i></button>

                                            </a>
                                        
                                        </td>
                                        
                                    <?php } ?>

                                </tr>

                            <?php

                                        }

                                    } else if (in_array(session() -> get('level'), [1])) {

                                        $tanggal_uangkas = new DateTime($_data -> uangkas_tanggal);

                            ?>

                                <tr>

                                    <td align="center"><?php echo $no++ ?></td>
                                    <td align="center"><?php echo ucwords($_data -> nama_murid) ?></td>
                                    <td align="center"><?php echo ucwords($tanggal_uangkas -> format('d F Y')) ?></td>
                                    <td align="center"><?php echo number_format($_data -> uangkas_total, 0, '.', ',') ?></td>
                                    
                                    <?php if (in_array(session() -> get('level'), [1])) { ?>

                                        <td align="center">

                                            <a href="<?= base_url('/home/delete_invoice_data/'.$_data -> id_uangkas) ?>">

                                                <button type="button" data-toggle="tooltip" class="btn btn-link btn-danger btn-lg" data-original-title="Delete data"><i class="fas fa-trash"></i></button>

                                            </a>
                                        
                                        </td>

                                    <?php } else if (in_array(session() -> get('level'), [3])) { ?>
                                    
                                        <td align="center">

                                            <a href="<?= base_url('/home/') ?>">

                                                <button type="button" data-toggle="tooltip" class="btn btn-link btn-success btn-lg" data-original-title="Pays"><i class="fas fa-wallet"></i></button>

                                            </a>
                                        
                                        </td>
                                        
                                    <?php } ?>

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

    <?php } ?>