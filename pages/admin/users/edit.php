<h2 class="content-title">Edit Data Dokter</h2>
<a href=".?p=<?php echo $_GET['p']; ?>" class="btn btn-default pull-right btn-back">
    <i class="fa fa-arrow-left"></i> Kembali
</a>
<hr>
<div class="box dark">
    <header>
        <a href="#" class="icons btn-warning" id="btn-edit"><i class="fa fa-pencil-square-o"></i></a>
        <a href="#" class="icons btn-primary" id="btn-cancel" style="display: none"><i class="fa fa-undo"></i></a>

        <h5>Edit Data Pengguna</h5>

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
        $result = $data->getByID($_GET['id']);
    ?>

    <div id="div-1" class="accordion-body collapse in body">
        <form action="" method="post" class="form-horizontal">

            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Nama Pengguna (*)</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="name" value="<?php echo $result['NAME'] ?>"  placeholder="Input Nama Dokter ..." style="text-transform:capitalize" autocomplete="off" required readonly>
                </div>
            </div>
             <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-7">
                    <input type="email" class="form-control" name="telp" value="<?php echo $result['EMAIL'] ?>"  placeholder="Telepon Dokter ..." autocomplete="off">
                </div>
            </div>
             <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-7">
                    <input type="password" class="form-control" name="telp" value="<?php echo $result['PASSWORD'] ?>"  placeholder="Telepon Dokter ..." autocomplete="off">
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Status Pengguna (*)</label>
                <div class="col-sm-7">
                    <select class="form-control" name="gender" required readonly>
                        <option value="L" <?php if ($result['ACTIVE'] == '0') echo "selected"; ?>>Tidak Aktif</option>
                        <option value="P" <?php if ($result['ACTIVE'] == '1') echo "selected"; ?>>Aktif</option>
                    </select>
                </div>
            </div>
    

            <div class="form-group">
                <div class="col-lg-push-2 col-lg-7">
                    <input type="submit" id="btn-save" name="edit" value="Simpan" class="btn btn-primary" disabled/>
                </div>
            </div>
        </form>
    </div>
</div>

<?php
if (isset($_POST['edit'])) {
    echo "Test";
   
    $name       = $_POST['name'];
    $email     = $_POST['email'];
    $password    = $_POST['password'];
    $active     = $_POST['active'];
    $id         = $_GET['id'];

    $update     = $data->update($page, $id, ['name' => $name, 'email' => $email, 'password' => $password,
        'active' => $active]);
}
?>