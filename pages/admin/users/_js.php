<script>
    $('#btn-edit').on('click', function () {
        $('input[name="name"]').attr('readonly', false);
        $('select[name="email"]').attr('readonly', false);
        $('select[name="password"]').attr('readonly', false);
        $('input[name="active"]').attr('readonly', false);

        $('#btn-edit').css('display', 'none');
        $('#btn-cancel').css('display', 'block');
        $('#btn-save').removeAttr('disabled');
    });

    $('#btn-cancel').on('click', function () {
        $('input[name="name"]').attr('readonly', true);
        $('select[name="email"]').attr('readonly', true);
        $('select[name="password"]').attr('readonly', true);
        $('textarea[name="active"]').attr('readonly', true);

        $('#btn-edit').css('display', 'block');
        $('#btn-cancel').css('display', 'none');
        $('#btn-save').attr('disabled', true);
    });

    function onDelete(id) {
        var url    = $('#url-delete' + id).val();
        console.log(url);
        swal({
                title   : 'Anda yakin',
                text    : 'Apakah anda yakin ingin menghapus data ini ?',
                type    :  'warning',
                showCancelButton : true
            },
            function (isConfirm) {
                if (isConfirm) {
                    location = url;
                }
            });
    }
</script>