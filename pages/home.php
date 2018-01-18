<?php
require_once "module/home.php";
$home= new home();
?>
<h2>Selamat Datang di Sistem Poliklinik Berkah Jaya</h2>
<div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-users fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                    <?php 
                                    $data=$home->countPasien();
                                    echo $data['JUMLAH'];

                                     ?>
                                         
                                     </div>
                                    <div>Pasien</div>
                                </div>
                            </div>
                        </div>
                        <a href=".?p=pasien">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user-circle fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                        <?php 
                                    $data=$home->countDokter();
                                    echo $data['JUMLAH'];

                                     ?>
                                    </div>
                                    <div>Dokter</div>
                                </div>
                            </div>
                        </div>
                        <a href=".?p=dokter">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-home fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                        
                                    <?php 
                                    $data=$home->countPoli();
                                    echo $data['JUMLAH'];

                                     ?>
                                    </div>
                                    <div>Poli!</div>
                                </div>
                            </div>
                        </div>
                        <a href=".?p=poli">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-handshake-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                        
                                        <?php 
                                    $data=$home->countObat();
                                    echo $data['JUMLAH'];

                                     ?>
                                    </div>
                                    <div>Obat</div>
                                </div>
                            </div>
                        </div>
                        <a href=".?p=obat">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Riwayat Rekam Medis
                            <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        Actions
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a href="#">Action</a>
                                        </li>
                                        <li><a href="#">Another action</a>
                                        </li>
                                        <li><a href="#">Something else here</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>NAMA PASIEN</th>
                                                    <th>NAMA POLI</th>
                                                    <th>NAMA DOKTER</th>
                                                    <th>STATUS CEK</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $result = $home->getAll();
                                                    //                    print_r($result);
                                                    $i = 1;
                                                    for ($x = 0; $x < count($result); $x++) {
                                                ?>
                                                        <tr class="odd gradeX">
                                                            <td class="col-md-1"><?php echo $i; ?></td>
                                                            <td><?php echo $result[$x]['NAMA_PASIEN']; ?></td>
                                                            <td><?php echo $result[$x]['NAMA_POLI']; ?></td>
                                                            <td><?php echo $result[$x]['NAMA_DOKTER']; ?></td>
                                                            <td>
                                                                <?php if ($result[$x]['STATUS_CEK'] == 0) { ?>
                                                                    <label class="btn btn-warning">Belum dicek</label>
                                                                <?php } else { ?>
                                                                    <label class="btn btn-success">Sudah dicek</label>
                                                                <?php }  ?>
                                                            </td>
                                                        </tr>
                                                <?php
                                                        $i++;
                                                    }
                                             ?>
                                                
                
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.col-lg-4 (nested) -->
                                
                                <!-- /.col-lg-8 (nested) -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-8 -->
               
                <!-- /.col-lg-4 -->
            </div>