<!-- Begin Page Content -->
<div class="container-fluid">
    <?php if (validation_errors()) : ?>
        <div class="alert alert-danger" role="alert">
            <?= validation_errors(); ?>
        </div>
    <?php endif; ?>
    <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>') ?>

    <?= $this->session->flashdata('message'); ?>
    <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>
    <br>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button href="" class="btn btn-primary mb-3" onclick="add()">Add New Submenu</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered" id="dataSubMenu" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Menu</th>
                            <th scope="col">Url</th>
                            <!-- <th scope="col">Icon</th> -->
                            <th scope="col">Status</th>
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
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="newSubMenuModal" tabindex="-1" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body form">
                <form action="#" id="formData" method="post">
                    <input type="hidden" id="id" name="id" value="">
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Submenu title">
                    </div>
                    <div class="form-group">
                        <select name="menu_id" id="menu_id" class="form-control">
                            <option value="">Select Menu</option>
                            <?php foreach ($menu as $m) : ?>
                                <option value="<?= $m['id'] ?>"><?= $m['menu'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="url" name="url" placeholder="Submenu url">
                    </div>
                    <!-- <div class="form-group">
                        <input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu icon">
                    </div> -->
                    <div class="form-group">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="is_dropdown" id="is_dropdown" >
                            <label class="form-check-label" for="flexSwitchCheckDefault">Jadikan Submenu Dropdown ? </label>
                        </div>
                        <div class="form-check form-switch">
                            <input type="checkbox" class="form-check-input" value="1" name="is_active" id="is_active" checked>
                            <label for="is_active" class="form-check-label">
                               Menu ini Aktif ?
                            </label>
                        </div>
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
    var modal = $('#newSubMenuModal');
    var tableData = $('#dataSubMenu');
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
                "url": "<?= site_url('Menu/ambilSubMenu') ?>",
                "type": "POST"
            },

            "columnDefs": [{
                "targets": [0],
                "orderable": false,
                "width": 6
            }],

        });

        if($('#is_dropdown').is(':checked')){
            $('#url').disabled();
        }   
        
        $("#is_dropdown").click(function(){
        if($(this).is(':checked')){
            // alert("Checkbox checked!");
            $('#url').attr('disabled', 'disabled');
        }else{
            $('#url').removeAttr('disabled');
        }
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
        modalTitle.text('Add Submenu');
    }

    function save() {
        btnSave.text('Mohon Tunggu ...');
        btnSave.attr('disabled', true);
        if (saveData == 'tambah') {
            url = "<?= base_url('Menu/addSubMenu'); ?>";
        } else {
            url = "<?= base_url('Menu/updateSubMenu'); ?>";
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

                    Swal.fire({
                        icon: 'success',
                        title: 'Data Berhasil Ditambahkan',
                        text: response.success,
                        showConfirmButton: false,
                        timer: 1500
                    }).then((result) => {
                        location.reload();
                    });
                }
            },
            error: function() {
                console.log('error database');
            }
        })
    }

    function hapusData(id, name) {
        console.log(id, name)
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
                    url: "<?= site_url('Menu/deleteSubMenu') ?>",
                    data: {
                        id: id,
                    },
                    dataTyoe: "json",
                    success: function(response) {
                        if (response) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Data Berhasil Dihapus',
                                text: response.success,
                                showConfirmButton: false,
                                timer: 1500
                            }).then((result) => {
                                location.reload();
                            });
                        }
                    },
                    error: function() {
                        console.log('Response error');
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
            url: "<?= base_url('Menu/submenubyid/') ?>" + id,
            dataType: "JSON",
            success: function(response) {
                modalTitle.text('Edit Data');
                btnSave.text('Edit Data');
                btnSave.attr('disabled', false);
                $('[name="id"]').val(response.id);
                $('[name="title"]').val(response.title);
                $('[name="menu_id"]').val(response.menu_id);
                $('[name="url"]').val(response.url);
                $('[name="is_active"]').val(response.is_active);
                modal.modal('show');

            },
            error: function(response) {
                console.log(response);
            }
        })
    }
</script>