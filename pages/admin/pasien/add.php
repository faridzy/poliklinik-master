<h2 class="content-title">Tambah Data Pasien</h2>
<a href=".?p=<?php echo $_GET['p']; ?>" class="btn btn-default pull-right btn-back">
    <i class="fa fa-arrow-left"></i> Kembali
</a>
<hr>
<div class="box dark">
    <header>
        <h5>Tambah Data Pasien</h5>

        <div class="toolbar">
            <ul class="nav">
                <li class="">
                    <a class="accordion-toggle minimize-box" data-toggle="collapse" href="#div-1">
                        <i class="fa fa-minus"></i>
                    </a>
                </li>
            </ul>
        </div>
    </header>
     <?php
            if (isset($_SESSION['message'])) {
                ?>
                <div class="alert alert-<?php echo $_SESSION['message']['status'] ?> alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php echo $_SESSION['message']['text']; ?>.
                </div>

                <?php
                $_SESSION['message'] = null;
            }
        ?>
    <div id="div-1" class="accordion-body collapse in body">
        <form method="post" action="" class="form-horizontal">

            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Nama Pasien (*)</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="name" placeholder="Input Nama Pasien ..." style="text-transform:capitalize" autocomplete="off" required >
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Gender (*)</label>
                <div class="col-sm-7">
                    <select class="form-control" name="gender" required >
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Alamat (*)</label>
                <div class="col-sm-7">
                    <textarea class="form-control" name="address" placeholder="Alamat Pasien ..." style="text-transform:capitalize" autocomplete="off"  ></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Telepon</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="telp" placeholder="Telepon Pasien ..." autocomplete="off" required>
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-push-2 col-lg-7">
                    <input type="submit" name="save" class="btn btn-primary pull-right flat add" onclick="" id="btn-simpan" value="Simpan">
                </div>
            </div>
        </form>
    </div>
</div>

<?php
if (isset($_POST['save'])) {
    $name       = $_POST['name'];
    $gender     = $_POST['gender'];
    $address    = $_POST['address'];
    $telp       = $_POST['telp'];
    $insert     = $data->create($page, ['name' => $name, 'gender' => $gender,
        'address' => $address, 'telp' => $telp]);
}
?>
