<!-- Begin Page Content -->
<div class="col-md-6">
    <div class="container-fluid">
        <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>') ?>
        <?= $this->session->flashdata('message'); ?>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>
                <!-- <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newRoleModal">Add New Role</a> -->
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered" id="dataRole" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Role</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->


</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="newRoleModal" tabindex="-1" aria-labelledby="newRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newRoleModalLabel">Add New Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/role'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="role" name="role" placeholder="Role Name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="Submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    var saveData;
    var modal = $('#newMenuModal');
    var tableData = $('#dataRole');
    var formData = $('#formData');
    var modalTitle = $('#modalTitle');
    var btnSave = $('#btn-save');

    $(document).ready(function() {
        table = $('#dataRole').DataTable({
            responsive: true,
            "destroy": true,
            "processing": true,
            "serverSide": true,
            "order": [],

            "ajax": {
                "url": "<?= site_url('Admin/ambilDataRole') ?>",
                "type": "POST"
            },

            "columnDefs": [{
                "targets": [0],
                "orderable": false,
                "width": 3
            }],

        });
    });

    function success() {
        Swal.fire({
            icon: 'success',
            title: 'Your work has been saved',
            showConfirmButton: false,
            timer: 1500
        })
    }

    function reloadTable() {
        tableData.DataTable().ajax.reload();
    }

    function hapusData(id, name) {
        Swal.fire({
            title: 'Anda Yakin ?',
            text: `Apakah anda yakin akan menghapus data ${name} ?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "post",
                    url: "<?= site_url('Admin/delete') ?>",
                    data: {
                        id: id,
                        name: name
                    },
                    dataTyoe: "json",
                    success: function(response) {
                        // console.log(response);
                        if (response) {
                            success();
                            reloadTable();
                        }
                    }
                })
            }
        })
    }

    function editAccess(roleId) {
        window.location.href = "<?php echo site_url('admin/roleaccess/'); ?>" + roleId;

        // $.ajax({
        //     type: 'post',
        //     headers: {
        //         "__SISTEM_BY": "ANDIWIJAYA->RSC"
        //     },
        //     url: "<?= site_url('admin/roleaccess/') ?>",
        //     data: {
        //         id: roleId
        //     },
        //     dataType: "json",
        //     success: function(response) {
        //         if (response.sukses){

        //         }
        //     }
        // })
    }
</script>