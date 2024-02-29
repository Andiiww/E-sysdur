<div class="container-fluid">
    <!-- <h1 class="h3 mb-2 text-gray-800"><?=$title;?></h1> -->
    <div class="container col-lg-12">
        <div class="card o-hidden border-0 shadow-lg mx-auto bg-card-body">
            <div class="card-body ">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4"><?=$title;?></h1>
                            </div>
                            <form class="user" method="post" action="#" id="UbahPassword">
                                <div class="modal-body form">
                                    <div class="form-group">
                                        <label for="kode">Masukan Password Baru</label>
                                        <input type="password" class="form-control bg-light border-0 small" id="NewPassword" name="NewPassword" placeholder="Password">
                                        <?=form_error('NewPassword', '<small class="text-danger pl-3">', '</small>');?>
                                    </div>
                                    <div class="form-group">
                                        <label for="kode">Masukan kembali Password anda</label>
                                        <input type="password" class="form-control bg-light border-0 small" id="NewPasswordVerification" name="NewPasswordVerification" placeholder="Repeat Password">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-grad btn-user btn-block" id="btn-save">
                                    Ubah Password
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- End of Main Content -->
<script>
    var btnSave = $('#btn-save');
    $(document).ready(function() {
        $('#UbahPassword').submit(function(e) {
            e.preventDefault();
            btnSave.text('Mohon Tunggu ...');
            btnSave.attr('disabled', true);
            url = "<?=base_url('User/EditPassword');?>";
            $.ajax({
                url: url,
                type: "post",
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                success: function(response) {
                    console.log(response);
                    if (response.status == 'success') {
                        btnSave.attr('disabled', false);
                        success();
                    } else {
                        btnSave.text('Simpan');
                        btnSave.attr('disabled', false);
                        error();
                    }
                },
                error: function(response) {
                    console.log('error database');
                    console.log(response['responseText']);

                }
            })
        });
    });

    function success() {
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Your work has been saved',
            showConfirmButton: false,
            timer: 4000
        })
        window.location.href= "<?=site_url('User/index')?>";
    }

    function error() {
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Please Cek your input data!',
            showConfirmButton: false,
            timer: 1500
        })
    }

</script>