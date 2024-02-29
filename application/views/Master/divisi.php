<input type="hidden" id="idMenu" name="idMenu" value="">
<input type="hidden" id="idSubMenu" name="idSubMenu" value="">
<!-- Begin Page Content -->
<div class="col-md-6">
    <div class="container-fluid">
        <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>') ?>
        <?= $this->session->flashdata('message'); ?>
        <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>
        <br>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <button type="button" class="btn btn-primary mb-3" onclick="add()">Tambah Divisi</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered" id="dataMenu" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Divisi</th>
                                <th scope="col">Singkatan</th>
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
<div class="modal fade" id="JenisDoc" tabindex="-1" aria-labelledby="JenisDocLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body form">
                <form action="#" id="formData">
                    <input type="hidden" id="id" name="id" value="">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Jenis Dokumen">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu Name">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="Submit" class="btn btn-primary" id="btn-save" onclick="save()">Add</button>
            </div>
        </div>
    </div>
</div>

<script>
    var saveData;
    var modal = $('#JenisDoc');
    var tableData = $('#dataMenu');
    var formData = $('#formData');
    var modalTitle = $('#modalTitle');
    var btnSave = $('#btn-save');

    $(document).ready(function() {
        tableData.DataTable({
            responsive: true,
            "destroy": true,
            "processing": true,
            "serverSide": true,
            "order": [],

            "ajax": {
                "url": "<?= site_url('Master/ambilData') ?>",
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

    function add() {
        saveData = "tambah";
        formData[0].reset();
        modal.modal('show');
        modalTitle.text('Tambah Jenis Dokumen');
    }

    function save() {
        btnSave.text('Mohon Tunggu ...');
        btnSave.attr('disabled', true);
        if (saveData == 'tambah') {
            url = "<?= base_url('Master/add'); ?>";
        } else {
            url = "<?= base_url('Master/update'); ?>";
        }
        $.ajax({
            type: "POST",
            url: url,
            data: formData.serialize(),
            dataType: "JSON",
            success: function(response) {
                if (response.status == 'success') {
                    modal.modal('hide');
                    formData[0].reset();
                    btnSave.text('Add');
                    btnSave.attr('disabled', false);
                    success();
                    reloadTable();
                }
            },
            error: function() {
                console.log('error database');
            }
        })
    }

    function hapusData(id, name) {
        Swal.fire({
            title: 'Are you sure?',
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
                    url: "<?= site_url('Master/delete') ?>",
                    data: {
                        id: id,
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

    function byid(id, type) {
        if (type == 'edit') {
            saveData = 'edit';
            formData[0].reset();
        }

        $.ajax({
            type: "GET",
            url: "<?= base_url('Master/byid/') ?>" + id,
            dataType: "JSON",
            success: function(response) {
                modalTitle.text('Edit Data');
                btnSave.text('Edit Data');
                btnSave.attr('disabled', false);
                $('[name="id"]').val(response.id);
                $('[name="menu"]').val(response.menu);
                modal.modal('show');

            },
            error: function(response) {
                console.log(response);
            }
        })
    }
</script>