<form method="post" action="" class="form-horizontal" autocomplete="off" enctype="multipart/form-data">
<!--    <input type="hidden" name="url" value="{{ url('/admin/semester') }}">-->
<!--    <input type="hidden" name="url_add" value="{{ url('/admin/semester/add') }}">-->

    <div class="modal-body">
        <div class="form-group">
            <label for="name" class="col-sm-3 control-label">Nama Pengguna (*)</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" name="name" placeholder="Input Nama Pengguna ..." style="text-transform:capitalize" autocomplete="off" required>
            </div>
        </div>
        <div class="form-group">
            <label for="name" class="col-sm-3 control-label">Email (*)</label>
            <div class="col-sm-7">
                <input type="email" class="form-control" name="email" placeholder="Input Email Pengguna ..." style="text-transform:capitalize" autocomplete="off" required>
            </div>
        </div>
          <div class="form-group">
            <label for="name" class="col-sm-3 control-label">Password (*)</label>
            <div class="col-sm-7">
                <input type="password" class="form-control" name="password" placeholder="Input Password Pengguna ..." style="text-transform:capitalize" autocomplete="off" required>
            </div>
        </div>
         <div class="form-group">
            <label for="name" class="col-sm-3 control-label">Status Pengguna (*)</label>
            <div class="col-sm-7">
                <select class="form-control" name="active" required>
                    <option value="1">Aktif</option>
                    <option value="0">Tidak Aktif</option>
                </select>
            </div>
        </div>

        <p>Keterangan (*) : Wajib Diisi</p>
    </div>
    <div class="modal-footer">
        <button data-dismiss="modal" class="btn btn-default flat"><span class="glyphicon glyphicon-ban-circle"></span> Batal</button>
        <input type="submit" name="save" class="btn btn-primary pull-right flat add" onclick="" id="btn-simpan" value="Simpan">
    </div><!-- /.box-footer -->
</form>

<div class="overlay" id="loading6" style="display:none">
    <i class="fa fa-refresh fa-spin"></i>
</div>

<?php
if (isset($_POST['save'])) {
    $name       = $_POST['name'];
    $email     = $_POST['email'];
    $password    = $_POST['password'];
    $active     = $_POST['active'];
    $insert     = $data->create($page, ['name' => $name, 'email' => $email,
        'password' => $password, 'active' => $active]);
}
?>