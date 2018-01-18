<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
 <link rel="stylesheet" href="../../../assets/plugins/bootstrap/css/bootstrap.css" />
<body>

<?php
require_once '../../../module/rekam_medis.php';
$data= new rekam_medis();

$result = $data->getByID($_GET['id']);
//        print_r($result);
?>
<div class="container">
    <div class="col-xs-6">
        <address>
            <strong>Pasien :</strong><br>
            <?php echo $result['NAMA_PASIEN'] ?><br>
        </address>
    </div>
    <div class="col-xs-6 text-right">
        <address>
            <strong>Petugas :</strong><br>
            <?php echo $_SESSION['username']; ?><br>
        </address>
    </div>
    <div class="col-xs-6">
        <address>
            <strong>Dokter :</strong><br>
            <?php echo $result['NAMA_DOKTER'] ?><br>
        </address>
    </div>
    <div class="col-xs-6 text-right">
        <address>
            <strong>Tanggal Rekam medis :</strong><br>
            <?php echo $result['DATE_TRANSACTION'] ?><br>
        </address>
    </div>
<div class="col-xs-12">
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="text-center"><strong>Detail Obat</strong></h3>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-condensed">
                <thead>
                <tr>
                    <td><strong></strong></td>
                    <td class="text-center"><strong>Harga</strong></td>
                    <td class="text-center"><strong>Qty</strong></td>
                    <td class="text-right"><strong>Total</strong></td>
                </tr>
                </thead>
                <tbody>
                <?php
                    $detail = $data->getDetailByID($result['ID']);
                    $poli = $data->getPoliByID($result['ID_POLI']);
                    for ($i = 0; $i < count($detail); $i++) {
                        $obat = $data->getObatByID($detail[$i]['ID_OBAT']);
                ?>
                        <tr>
                            <td><?php echo $obat['NAME'] ?></td>
                            <td class="text-center"><?php echo number_format($obat['PRICE'],2); ?></td>
                            <td class="text-center"><?php echo $detail[$i]['QTY'] ?></td>
                            <td class="text-right"><?php echo number_format($detail[$i]['QTY'] * $obat['PRICE'],2) ?></td>
                        </tr>
                <?php
                    }
                ?>
                <tr>
                    <td class="emptyrow"></td>
                    <td class="emptyrow"></td>
                    <td class="emptyrow text-center"><strong>Biaya Administrasi Poli</strong></td>
                    <td class="emptyrow text-right"><?php echo number_format($poli['PRICE'],2) ?></td>
                </tr>
                <tr>
                    <td class="emptyrow"><i class="fa fa-barcode iconbig"></i></td>
                    <td class="emptyrow"></td>
                    <td class="emptyrow text-center"><strong>Total</strong></td>
                    <td class="emptyrow text-right"><?php echo number_format($result['TOTAL'],2) ?></td>
                </tr>
                </tbody>
            </table>
             
        </div>
    </div>
</div>
</div>
</div>
</body>
</html>