<input type="hidden" id="idMenuA" name="idMenuA" value="">
<input type="hidden" id="idSubMenuA" name="idSubMenuA" value="">

<!-- Begin Page Content -->
<div class="container-fluid">
    <?php if (validation_errors()): ?>
        <div class="alert alert-danger" role="alert">
            <?=validation_errors();?>
        </div>
    <?php endif;?>
    <?=form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>')?>

    <?=$this->session->flashdata('message');?>
    <div class="card mb-2 py-1 border-bottom-warning">
        <div class="card-body">
            <h1 class="h3 mb-2 text-gray-900"><b><?=$title;?></b></h1>
        </div>
    </div>
    <br>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <?php
$dataUser = $this->db->get_where('t_user', ['email' => $this->session->userdata('email')])->row_array();
$dataRole = $this->db->get_where('user_role', ['id' => $dataUser['role_id']])->row_array();
if ($dataRole['crud_access'] == 1) {
    echo '<button class="bn5 mb-3" onclick="add()">Tambah Dokumen</button>';
} else {
    echo '';
}
?>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered w-80" id="dataDocument" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">NO DOKUMEN</th>
                            <th scope="col">PERIHAL</th>
                            <th scope="col">TGL DOKUMEN</th>
                            <th scope="col">DIV PENERBIT</th>
                            <?php
$dataUser = $this->db->get_where('t_user', ['email' => $this->session->userdata('email')])->row_array();
$dataRole = $this->db->get_where('user_role', ['id' => $dataUser['role_id']])->row_array();
if ($dataRole['crud_access'] == 1) {
    echo '<th scope="col">*</th>';
} else {
    echo '';
}
?>
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
<div class="modal fade" id="UploadFile" tabindex="-1" aria-labelledby="UploadFileLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#" id="formData" enctype="multipart/form-data">
                <div class="modal-body form">
                    <input type="hidden" id="id" name="id" value="">
                    <input type="hidden" id="idMenu" name="idMenu" value="">
                    <input type="hidden" id="idSubMenu" name="idSubMenu" value="">
                    <div class="form-group">
                        <label for="kode">Nomor Dokumen</label>
                        <input type="text" class="form-control bg-light border-0 small col-md-6" id="nomor" name="nomor" placeholder="NO/JNS/BLN/THN" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="kode">Perihal</label>
                        <input type="text" class="form-control bg-light border-0 small" id="perihal" name="perihal" placeholder="Masukan Perihal Dokumen">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kode">Tanggal Dokumen</label>
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small" id="tglDok" name="tglDok" placeholder="Masukan Tanggal" autocomplete="off">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fa fa-calendar"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kode">Divisi Penerbit</label>
                                <input type="text" class="form-control bg-light border-0 small" id="divisi" name="divisi" placeholder="Masukan Divisi">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="myfile">Upload File :</label>
                                <input type="file" id="myDoc" name="myDoc">
                                <!-- <input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu icon"> -->
                                <label for="myfile" style="color: red;">*Upload Wajib file PDF, size max 20 mb.</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <br>
                                <div class="form-check">
                                    <input class="form-check-input-status" type="checkbox" id="status" name="status">
                                    <label class="form-check-label-status" for="status">
                                        Jadikan Dokumen Privat ?
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="Submit" class="btn btn-primary" id="btn-save" type="submit">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    var saveData;
    var modal = $('#UploadFile');
    var modalUpload = $('#UploadFileContoh');
    var tableData = $('#dataDocument');
    var formData = $('#formData');
    var modalTitle = $('#modalTitle');
    var btnSave = $('#btn-save');

    $(document).ready(function() {
        tableData.DataTable({
            "responsive": true,
            "destroy": true,
            "processing": true,
            "serverSide": true,
            "order": [],
            "scrollX": true,
            "scrollCollapse": true,
            "ajax": {
                "url": "<?=site_url('Portal/getDoc')?>",
                "type": "POST"
            },

            "columnDefs": [{
                    "targets": "_all",
                    "className": ["text-nowrap", "truncate"],
                    "orderable": true,
                    "width": "",
                    "fixedColumns": true,
                    "responsive": true
                }
            ],

        });

        $('#formData').submit(function(e) {
            e.preventDefault();
            btnSave.text('Mohon Tunggu ...');
            btnSave.attr('disabled', true);
            if (saveData == 'tambah') {
                url = "<?=base_url('Portal/add');?>";
            } else {
                url = "<?=base_url('Portal/update');?>";
            }
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
                        modal.modal('hide');
                        formData[0].reset();
                        btnSave.text('Tambah');
                        btnSave.attr('disabled', false);
                        success();
                        reloadTable();
                    } else {
                        btnSave.text('Tambah');
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

        $('#tglDok').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true
        });
    });

    function reloadTable() {
        tableData.DataTable().ajax.reload();
    }

    function upload() {
        modalUpload.modal('show');
    }

    function add() {
        saveData = "tambah";
        btnSave.text('Tambah');
        formData[0].reset();
        modal.modal('show');
        modalTitle.text('Tambah Dokumen');
    }

    function byid(id, type) {
        if (type == 'edit') {
            saveData = 'edit';
            formData[0].reset();
        }

        $.ajax({
            type: "GET",
            url: "<?=base_url('Portal/byid/')?>" + id,
            dataType: "JSON",
            success: function(response) {
                modalTitle.text('Edit Data');
                btnSave.text('Edit Data');
                btnSave.attr('disabled', false);
                $('[name="id"]').val(response.id);
                $('[name="nomor"]').val(response.nomor);
                $('[name="perihal"]').val(response.perihal);
                $('[name="tglDok"]').val(response.tgl_dokumen);
                $('[name="divisi"]').val(response.divisi);
                $('[name="status"]').val(response.status);
                // $('[name="myDoc"]').val(response.detail_doc);
                modal.modal('show');
            },
            error: function(response) {
                console.log(response['responseText']);
            }
        })
    }

    function deleteData(id, name) {
        Swal.fire({
            title: `Data ${name} akan di hapus?`,
            text: `Apakah anda yakin akan menghapus data ${name} ?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "post",
                    url: "<?=site_url('Portal/delete')?>",
                    data: {
                        id: id,
                    },
                    dataTyoe: "json",
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: `Data ${name} Berhasil Dihapus`,
                            text: response.success
                        });
                        success();
                        reloadTable()
                    }
                })
            }
        })
    }

    function downloadFile(data) {
        console.log(data);
        $.ajax({
            type: "post",
            url: "<?=site_url('Portal/downloadFile')?>",
            data: {
                data: data,
            },
            dataTyoe: "json",
            success: function(response) {

            }
        });
    }

    function success() {
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Your work has been saved',
            showConfirmButton: false,
            timer: 1000
        })
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

    function alertData(){
        Swal.fire({
            position: 'center',
            icon: 'warning',
            title: 'Dokumen Rahasia !',
            text: 'Silakan hubungi admin untuk lihat dokumen.',
            showConfirmButton: true
        })
    }
</script>