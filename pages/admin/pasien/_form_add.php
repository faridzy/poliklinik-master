<form method="post" action="" class="form-horizontal" autocomplete="off" enctype="multipart/form-data">
<!--    <input type="hidden" name="url" value="{{ url('/admin/semester') }}">-->
<!--    <input type="hidden" name="url_add" value="{{ url('/admin/semester/add') }}">-->

    <div class="modal-body">
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
    $gender     = $_POST['gender'];
    $address    = $_POST['address'];
    $telp       = $_POST['telp'];
    $insert     = $data->create($page, ['name' => $name, 'gender' => $gender,
        'address' => $address, 'telp' => $telp]);
}
?>