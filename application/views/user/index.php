<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?=$title;?></h1>
    <div class="row">
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="row no-gutters">
                    <div class="col-md-4 p-4">
                        <img class="center" src="<?=base_url('assets/img/profile/') . $t_user['image'];?>" height="100px" width="100px">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?=$t_user['name'];?></h5>
                            <p class="card-text"><?=$t_user['email'];?></p>
                            <p class="card-text"><small class="text-muted">Member since <?=date('d F Y', strtotime($t_user['date_created']))?></small></p>
                        </div>
                    </div>
                </div>
                <div class="row no-gutters">
                    <a href="#" class="btn btn-facebook btn-block" onclick="add(<?=$t_user['id'];?>)">
                        <i class="fas fa-edit fa-fw"></i> Ubah Password
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card p-4">
                <h4>Detail User Profile</h4>
                <hr>
                <div class="row">
                    <p class="card-text">Nama Lengkap : <?=$t_user['name']?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script>
    function add(id) {
        window.location = "<?=site_url('User/EditPasswordView/')?>" + id;
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

</script>