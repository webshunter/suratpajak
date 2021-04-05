<?php 
// fungsi untuk pengecekan status login user 
// jika user belum login, alihkan ke halaman login
if (empty($_SESSION['sias_user_account_name']) && empty($_SESSION['sias_user_account_password'])){
    echo "<meta http-equiv='refresh' content='0; url=../../login-error'>";
}
// jika user sudah login
else {  
    // fungsi untuk pengecekan tampilan form
    // jika form add data yang dipilih
    if ($_GET['form']=='add') { ?>
    	<div class="content-header row">
            <div class="content-header-left col-md-6 col-xs-12 mb-1">
                <h3 class="content-header-title"><i class="icon-pencil22"></i> Input Instansi </h3>
            </div>

            <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
                <div class="breadcrumb-wrapper col-xs-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="beranda"><i style="margin-right:7px" class="icon-home3"></i> Beranda</a></li>
                        <li class="breadcrumb-item"><a href="instansi">Instansi</a></li>
                        <li class="breadcrumb-item active">Tambah</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="content-body"><!-- Basic form layout section start -->
            <section id="basic-form-layouts">
                <div class="row match-height">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body collapse in">
                                <div class="card-block">
                                    <form class="form" action="modules/instansi/proses.php?act=insert" method="POST">
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label>Nama Instansi <span class="wajib-isi">*</span></label>
                                                <input type="text" class="form-control" name="nama_instansi" autocomplete="off" required>
                                            </div>

                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <textarea rows="2" class="form-control" name="alamat" autocomplete="off"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-actions">
                                            <input type="submit" class="btn btn-info btn-simpan mr-1" name="simpan" value="Simpan">
                                            <a href="instansi" class="btn btn-warning btn-reset"> Batal </a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    <?php
    }
    // jika form edit data yang dipilih
    elseif ($_GET['form']=='edit') { 
    	if (isset($_GET['id'])) {
    		$id_instansi = $_GET['id'];
    	    // fungsi query untuk menampilkan data dari tabel instansi
    	    $result = $mysqli->query("SELECT id_instansi, nama_instansi, alamat FROM instansi WHERE id_instansi='$id_instansi'") 
    	    						  or die('Ada kesalahan pada query tampil data ubah : '.$mysqli->error);
    	    $data = $result->fetch_assoc();
      	}
    ?>
    	<div class="content-header row">
            <div class="content-header-left col-md-6 col-xs-12 mb-1">
                <h3 class="content-header-title"><i class="icon-pencil22"></i> Ubah Instansi </h3>
            </div>

            <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
                <div class="breadcrumb-wrapper col-xs-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="beranda"><i style="margin-right:7px" class="icon-home3"></i> Beranda </a></li>
                        <li class="breadcrumb-item"><a href="instansi">Instansi</a></li>
                        <li class="breadcrumb-item active">Ubah</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="content-body"><!-- Basic form layout section start -->
            <section id="basic-form-layouts">
                <div class="row match-height">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body collapse in">
                                <div class="card-block">
                                    <form class="form" action="modules/instansi/proses.php?act=update" method="POST">
                                        <div class="form-body">
    										
    										<input type="hidden" name="id" value="<?php echo $data['id_instansi']; ?>">

                                            <div class="form-group">
                                                <label>Nama Instansi <span class="wajib-isi">*</span></label>
                                                <input type="text" class="form-control" name="nama_instansi" autocomplete="off" value="<?php echo $data['nama_instansi']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <textarea rows="2" class="form-control" name="alamat" autocomplete="off"><?php echo $data['alamat']; ?></textarea>
                                            </div>
                                        </div>

                                        <div class="form-actions">
                                            <input type="submit" class="btn btn-info btn-simpan mr-1" name="simpan" value="Simpan">
                                            <a href="instansi" class="btn btn-warning btn-reset"> Batal </a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    <?php
    }
}
?>