<!-- Begin Page Content -->
<div class="row col-md-12">
    <div class="col-md-6">
        <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?=$title;?></h1>

        <?=$this->session->flashdata('message');?>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h5>Role : <?=$role['role'];?></h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered" id="dataRoleAccess" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Menu</th>
                                <th scope="col">Access</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;?>
                            <?php foreach ($menu as $m): ?>
                                <tr>
                                    <th scope="row"><?=$i;?></th>
                                    <td><?=$m['menu']?></td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" <?=check_access($role['id'], $m['id']);?> data-role="<?=$role['id'];?>" data-menu="<?=$m['id'];?>">
                                        </div>
                                    </td>
                                </tr>
                                <?php $i++;?>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Another Access</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h5>User Name : <?=$role['role'];?>
            </div>
            <div class="card-body">
                <form action="" id="anotherAccessForm" enctype="multipart/form-data">
                <div class="modal-body form">
                    <div class="form-group">
                        <!-- <label for="kode">Enable Edit</label> -->
                        <input type="hidden" id="idRole" class="form-control" name="idRole" value="<?=$role['id']?>"/>
                        <div class="form-group">
                            <label for="crudAccess">Akses Tambah Document, Edit dan Hapus</label>
                            <select class="form-control" id="crudAccess" name="crudAccess">
                                <option value="">Pilih</option>
                                <option value="1">Ya</option>
                                <option value="0">Tidak</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="Submit" class="btn btn-primary" id="btn-save" type="submit">Simpan</button>
                </div>
            </form>
            </div>
        </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<script>
    $(document).ready(function () {
        var btnSave = $('#btn-save');

        $('#anotherAccessForm').submit(function(e) {
            e.preventDefault();
            btnSave.text('Mohon Tunggu ...');
            btnSave.attr('disabled', true);

            $.ajax({
                type: "POST",
                url: "<?=site_url('Admin/ChageAksesDoc');?>",
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                success: function(response) {
                    if (response.status == 'success') {
                        btnSave.text('Simpan');
                        btnSave.attr('disabled', false);
                        success();
                    } else {
                        btnSave.text('Simpan');
                        btnSave.attr('disabled', false);
                        error(response);
                    }
                }
            })
        });

    });

    function getData() {
        var idRole = $("#idRole").val();
        $.ajax({
            url: "<?=base_url('Admin/GetAccess/')?>" + idRole,
            method: "GET",
            dataType: "JSON",
            success: function(response){
                $('[name="crudAccess"]').val(response.crud_access);
            },
            error: function(error) {
                // Terjadi kesalahan saat mengambil data
                console.error('Error :', error);
            }
        })
    }

    getData();

    function success() {
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Your work has been saved',
            showConfirmButton: false,
            timer: 1000
        })
    }
</script>