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
        <script type="text/javascript">
            function enabledisabletext() {
                if(document.frmSuratMasuk.generate_nomor.value=='Ya')
                {
                    document.frmSuratMasuk.nomor_agenda.readOnly=true;
                }
                if(document.frmSuratMasuk.generate_nomor.value=='Tidak')
                {
                    document.frmSuratMasuk.nomor_agenda.readOnly=false;
                }
            }
        </script>

    	<div class="content-header row">
            <div class="content-header-left col-md-6 col-xs-12 mb-1">
                <h3 class="content-header-title"><i class="icon-pencil22"></i> Input Kotak Berkas </h3>
            </div>

            <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
                <div class="breadcrumb-wrapper col-xs-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="beranda"><i style="margin-right:7px" class="icon-home3"></i> Beranda</a></li>
                        <li class="breadcrumb-item"><a href="surat-masuk">Kotak Berkas</a></li>
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
                                    <form class="form" name="frmkotakberkas" action="modules/kotakberkas/proses.php?act=insert" method="POST" enctype="multipart/form-data">
                                        <div class="form-body">
                                            <div class="row">

                                                <div class="col-md-5">
                                                    <div style="margin-bottom: 0.5rem;" class="form-group">
                                                        <label>Kode Kotak Berkas (otomatis dibuat oleh aplikasi) <span class="wajib-isi">*</span></label>
														
														<?php  
														// fungsi untuk membuat kode kotak berkas
														$query_id = mysqli_query($mysqli, "SELECT RIGHT(kode_kotakberkas,6) as kode 
														FROM is_kotakberkas
														ORDER BY kode_kotakberkas DESC LIMIT 1")
														or die('Ada kesalahan pada query tampil kode_kotakberkas : '.mysqli_error($mysqli));

														$count = mysqli_num_rows($query_id);

														if ($count <> 0) {
														// mengambil data kode_kotakberkas
														$data_id = mysqli_fetch_assoc($query_id);
														$kode    = $data_id['kode']+1;
														} else {
															$kode = 1;
														}

														// buat kode_kotakberkas
														$buat_id   = str_pad($kode, 6, "0", STR_PAD_LEFT);
														$kode_kotakberkas = "B$buat_id";
														?>
														
                                                        <input type="text" class="form-control" id="kode_kotakberkas" name="kode_kotakberkas" value="<?php echo $kode_kotakberkas; ?>" readonly required>
                                                    </div>
                                                </div>

                                            </div>

                                            <hr>
                                            <div class="form-group">
                                                <label>Kode Lemari<span class="wajib-isi">*</span></label>
                                                <input type="text" class="form-control" name="kode_lemari" autocomplete="off" required>
                                            </div>
											
											<div class="form-group">
                                                <label>Kode Rak <span class="wajib-isi">*</span></label>
                                                <input type="text" class="form-control" name="kode_rak" autocomplete="off" required>
                                            </div>
                                 
                                            <div class="form-group">
                                                <label>Keterangan <span class="wajib-isi">*</span></label>
                                                <textarea rows="2" class="form-control" name="keterangan" autocomplete="off" required></textarea>
                                            </div>
                                            <hr>

                                            <div class="form-group">
                                                <label class="mt-1 mr-1">File Arsip Kotak Berkas (hasil scan)</label>
                                                <label class="file center-block">
                                                    <input type="file" id="file" name="arsip_kotakberkas" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="File yang diupload harus bertipe *.PDF atau *RAR dan ukuran file maksimal 150 Mb" autocomplete="off">
                                                    <span class="file-custom"></span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-actions">
                                            <input type="submit" class="btn btn-info btn-simpan mr-1" name="simpan" value="Simpan">
                                            <a href="kotakberkas" class="btn btn-warning btn-reset"> Batal </a>
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
    elseif ($_GET['form']=='detail') { 
        if (isset($_GET['id'])) {
            $id_kotakberkas = $_GET['id'];
            // fungsi query untuk menampilkan data dari tabel kotak berkas
            $result = $mysqli->query("SELECT a.kode_kotakberkas,a.kode_lemari,a.kode_rak,a.keterangan,a.arsip_kotakberkas,a.created_user,a.created_date,a.updated_user,a.updated_date,b.fullname,b.user_account_name,b.userID
			FROM is_kotakberkas as a INNER JOIN sys_users as b 
			ON a.created_user=b.userID
			WHERE kode_kotakberkas='$_GET[id]'") 
                                      or die('Ada kesalahan pada query tampil data detail : '.$mysqli->error);
            $data = $result->fetch_assoc();
        }
    ?>
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-xs-12 mb-1">
                <h3 class="content-header-title"><i class="icon-pencil22"></i> Detail Kotak Berkas </h3>
            </div>

            <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
                <div class="breadcrumb-wrapper col-xs-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="beranda"><i style="margin-right:7px" class="icon-home3"></i> Beranda </a></li>
                        <li class="breadcrumb-item"><a href="surat-masuk">Kotak Berkas</a></li>
                        <li class="breadcrumb-item active">Detail</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="content-body"><!-- Basic form layout section start -->
            <section id="basic-form-layouts">
                <div class="row match-height">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">
                                    <a href="kotakberkas" class="btn btn-warning"><i class="icon-angle-left"></i> Kembali</a>
                                    <a href="kotakberkas-update-<?php echo $id_kotakberkas; ?>" class="btn btn-info"><i class="icon-pencil2"></i> Ubah</a>
                                    <a href="kotakberkas-delete-<?php echo $id_kotakberkas; ?>" onclick="return confirm('Anda yakin ingin menghapus kotak berkas nomor <?php echo $data['kode_kotakberkas']; ?> ?');" class="btn btn-danger"><i class="icon-bin"></i> Hapus</a>
                                </h4>
                                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                                        <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body collapse in">
                                <div class="card-block">
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="base-tab1" data-toggle="tab" aria-controls="tab1" href="#tab1" aria-expanded="true">Data Kotak Berkas</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="base-tab2" data-toggle="tab" aria-controls="tab2" href="#tab2" aria-expanded="false">Arsip File</a>
                                        </li>
                                    </ul>
                                    <br>
                                    <div class="tab-content px-1 pt-1">
                                        <div role="tabpanel" class="tab-pane active" id="tab1" aria-expanded="true" aria-labelledby="base-tab1">
                                            <div class="table-responsive">
                                                <table class="table table-hover mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-truncate">Kode Kotak Berkas</td>
                                                            <td class="text-truncate">:</td>
                                                            <td class="text-truncate"><?php echo $data['kode_kotakberkas']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-truncate">Kode Lemari</td>
                                                            <td class="text-truncate">:</td>
                                                            <td class="text-truncate"><?php echo $data['kode_lemari']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-truncate">Kode Rak</td>
                                                            <td class="text-truncate">:</td>
                                                            <td class="text-truncate"><?php echo $data['kode_rak']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-truncate">Keterangan Isi Kotak</td>
                                                            <td class="text-truncate">:</td>
                                                            <td class="text-truncate"><?php echo $data['keterangan']; ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <hr>
                                            <div class="table-responsive">
                                                <table class="table table-hover mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <td style="border-top:0" width="200" class="text-truncate">Diinput oleh</td>
                                                            <td style="border-top:0" width="25" class="text-truncate">:</td>
                                                            <td style="border-top:0" class="text-truncate"><?php echo $data['user_account_name']; ?>  -  <?php echo $data['fullname']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-truncate">Datetime</td>
                                                            <td class="text-truncate">:</td>
                                                            <td class="text-truncate"><?php echo date('d-m-Y H:i:s', strtotime($data['created_date'])); ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab2" aria-labelledby="base-tab2">
                                        <?php 
                                        // jika arsip tidak ada 
                                        if (empty($data['arsip_kotakberkas'])) { ?>
                                            <div class="alert alert-warning alert-dismissible fade in mb-2" role="alert">
                                                <i style="margin-right:7px" class="icon-info-circle"></i> File Arsip Kotak Berkas belum diupload.
                                            </div>
                                        <?php
                                        } 
                                        // jika arsip ada 
                                        else { ?>
                                            <embed src="dokumen/kotakberkas/<?php echo $data['arsip_kotakberkas']; ?>" type="application/pdf" width="100%" height="550px"></embed>
                                        <?php
                                        }
                                        ?>
                                        </div>
                                    </div>
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
    		$kode_kotakberkas = $_GET['id'];
            // fungsi query untuk menampilkan data dari tabel is_kotakberkas
            $result = $mysqli->query("SELECT a.kode_kotakberkas,a.kode_lemari,a.kode_rak,a.keterangan,a.arsip_kotakberkas,a.created_user,a.created_date,a.updated_user,a.updated_date,b.fullname,b.user_account_name,b.userID
			FROM is_kotakberkas as a INNER JOIN sys_users as b 
			ON a.created_user=b.userID
			WHERE kode_kotakberkas='$_GET[id]'") 
                                      or die('Ada kesalahan pada query tampil data detail : '.$mysqli->error);
            $data = $result->fetch_assoc();
      	}
    ?>
    	<div class="content-header row">
            <div class="content-header-left col-md-6 col-xs-12 mb-1">
                <h3 class="content-header-title"><i class="icon-pencil22"></i> Ubah Kotak Berkas </h3>
            </div>

            <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
                <div class="breadcrumb-wrapper col-xs-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="beranda"><i style="margin-right:7px" class="icon-home3"></i> Beranda </a></li>
                        <li class="breadcrumb-item"><a href="surat-masuk">Kotak Berkas</a></li>
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
                                    <form class="form" action="modules/kotakberkas/proses.php?act=update" method="POST" enctype="multipart/form-data">
                                        <div class="form-body">
                                           
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div style="margin-bottom: 0.5rem;" class="form-group">
                                                        <label>Kode Kotak Berkas <span class="wajib-isi">*</span></label>
                                                        <input type="text" class="form-control" name="kode_kotakberkas" value="<?php echo $data['kode_kotakberkas']; ?>" readonly required>
                                                    </div>
                                                </div>

                                            </div>

                                            <hr>

                                            
                                            <div class="form-group">
                                                <label>Kode Lemari <span class="wajib-isi">*</span></label>
                                                <input type="text" class="form-control" name="kode_lemari" autocomplete="off" value="<?php echo $data['kode_lemari']; ?>" required>
                                            </div>
											
											<div class="form-group">
                                                <label>Kode Rak <span class="wajib-isi">*</span></label>
                                                <input type="text" class="form-control" name="kode_rak" autocomplete="off" value="<?php echo $data['kode_rak']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label>Keterangan <span class="wajib-isi">*</span></label>
                                                <textarea rows="2" class="form-control" name="keterangan" autocomplete="off" required><?php echo $data['keterangan']; ?></textarea>
                                            </div>

                                            <hr>

                                            <div class="form-group">
                                                <label class="mt-1 mr-1">File Arsip Kotak</label>
                                                <label class="file center-block">
                                                    <input type="file" id="file" name="arsip_kotakberkas" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Pastikan file yang diupload bertipe *.PDF atau RAR dan ukuran file maksimal 150 Mb" autocomplete="off">
                                                    <span class="file-custom"></span>
                                                </label>
                                                <label><i style="margin-right:7px" class="icon-file-pdf"></i><?php echo $data['arsip_kotakberkas']; ?></label>
                                            </div>
                                        </div>

                                        <div class="form-actions">
                                            <input type="submit" class="btn btn-info btn-simpan mr-1" name="simpan" value="Simpan">
                                            <a href="kotakberkas-detail-<?php echo $kode_kotakberkas; ?>" class="btn btn-warning btn-reset"> Batal </a>
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

<script type="text/javascript">
$(document).ready(function() {
    // chosen select
    $("#select-asal-surat").chosen();
} );
</script>