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
                if(document.frmSuratKeluar.generate_nomor.value=='Ya')
                {
                    document.frmSuratKeluar.nomor_agenda.readOnly=true;
                }
                if(document.frmSuratKeluar.generate_nomor.value=='Tidak')
                {
                    document.frmSuratKeluar.nomor_agenda.readOnly=false;
                }
            }
        </script>

    	<div class="content-header row">
            <div class="content-header-left col-md-6 col-xs-12 mb-1">
                <h3 class="content-header-title"><i class="icon-pencil22"></i> Input Surat Keluar </h3>
            </div>

            <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
                <div class="breadcrumb-wrapper col-xs-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="beranda"><i style="margin-right:7px" class="icon-home3"></i> Beranda</a></li>
                        <li class="breadcrumb-item"><a href="surat-keluar">Surat Keluar</a></li>
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
                                    <form class="form" name="frmSuratKeluar" action="modules/surat-keluar/proses.php?act=insert" method="POST" enctype="multipart/form-data">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div style="margin-bottom: 0.5rem;" class="form-group">
                                                        <label>Generate Nomor <span class="wajib-isi">*</span></label>
                                                        <select class="form-control" id="generate_nomor" name="generate_nomor" onchange="enabledisabletext()" onload="enabledisabletext()" autocomplete="off" required>
                                                            <option value="Ya">Ya</option>
                                                            <option value="Tidak">Tidak</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-5">
                                                    <div style="margin-bottom: 0.5rem;" class="form-group">
                                                        <label>Nomor Agenda <span class="wajib-isi">*</span></label>
                                                        <?php  
                                                        $tahun = date("Y"); 
                                                        // fungsi untuk membuat nomor_agenda
                                                        $result_nomor_agenda = $mysqli->query("SELECT max(nomor_agenda) as kode FROM surat_keluar
                                                                                               WHERE LEFT(tanggal_register,4)='$tahun'")
                                                                                               or die('Ada kesalahan pada query tampil data nomor_agenda: '.$mysqli->error);
                                                        $data_nomor_agenda = $result_nomor_agenda->fetch_assoc();
                                                        $nomor_agenda = $data_nomor_agenda['kode'] + 1;
                                                        ?>
                                                        <input type="text" class="form-control" id="nomor_agenda" name="nomor_agenda" value="<?php echo $nomor_agenda; ?>" readonly required>
                                                    </div>
                                                </div>

                                                <div class="col-md-5">
                                                    <div style="margin-bottom: 0.5rem;" class="form-group">
                                                        <label>Tanggal Register <span class="wajib-isi">*</span></label>
                                                        <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tanggal_register" autocomplete="off" value="<?php echo date("d-m-Y"); ?>" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <hr>

                                            <div class="form-group">
                                                <label>Tujuan Surat <span class="wajib-isi">*</span></label>
                                                <select class="form-control" id="select-tujuan-surat" name="tujuan_surat" autocomplete="off" required>
                                                    <option value=""></option>
                                                    <?php
                                                    // sql statement untuk menampilkan data dari tabel instansi
                                                    $query_instansi = $mysqli->query("SELECT id_instansi, nama_instansi FROM instansi ORDER BY nama_instansi ASC")
                                                                                     or die('Ada kesalahan pada query tampil data instansi: '.$mysqli->error);
                                                    // tampilkan data
                                                    while ($data_instansi = $query_instansi->fetch_assoc()) {
                                                      echo"<option value=\"$data_instansi[id_instansi]\"> $data_instansi[nama_instansi] </option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Nomor Surat <span class="wajib-isi">*</span></label>
                                                <input type="text" class="form-control" name="nomor_surat" autocomplete="off" required>
                                            </div>

                                            <div class="form-group">
                                                <label>Tanggal Surat <span class="wajib-isi">*</span></label>
                                                <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tanggal_surat" autocomplete="off" required>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Perihal <span class="wajib-isi">*</span></label>
                                                <input type="text" class="form-control" name="perihal" autocomplete="off" required>
                                            </div>

                                            <div class="form-group">
                                                <label>Keterangan <span class="wajib-isi">*</span></label>
                                                <textarea rows="2" class="form-control" name="keterangan" autocomplete="off" required></textarea>
                                            </div>

                                            <hr>

                                            <div class="form-group">
                                                <label class="mt-1 mr-1">Arsip Surat</label>
                                                <label class="file center-block">
                                                    <input type="file" id="file" name="arsip" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Pastikan file yang diupload bertipe *.PDF dan ukuran file maksimal 5 Mb" autocomplete="off">
                                                    <span class="file-custom"></span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-actions">
                                            <input type="submit" class="btn btn-info btn-simpan mr-1" name="simpan" value="Simpan">
                                            <a href="surat-keluar" class="btn btn-warning btn-reset"> Batal </a>
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
            $id_surat_keluar = $_GET['id'];
            // fungsi query untuk menampilkan data dari tabel surat_keluar
            $result = $mysqli->query("SELECT a.id_surat_keluar,a.nomor_agenda,a.tanggal_register,a.tujuan_surat,a.nomor_surat,a.tanggal_surat,a.perihal,a.keterangan,a.arsip,a.created_user,a.created_date,b.id_instansi,b.nama_instansi,c.userID,c.user_account_name
                                      FROM surat_keluar as a INNER JOIN instansi as b INNER JOIN sys_users as c 
                                      ON a.tujuan_surat=b.id_instansi AND a.created_user=c.userID 
                                      WHERE a.id_surat_keluar='$id_surat_keluar'") 
                                      or die('Ada kesalahan pada query tampil data detail : '.$mysqli->error);
            $data = $result->fetch_assoc();
        }
    ?>
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-xs-12 mb-1">
                <h3 class="content-header-title"><i class="icon-pencil22"></i> Detail Surat Keluar </h3>
            </div>

            <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
                <div class="breadcrumb-wrapper col-xs-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="beranda"><i style="margin-right:7px" class="icon-home3"></i> Beranda </a></li>
                        <li class="breadcrumb-item"><a href="surat-keluar">Surat Keluar</a></li>
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
                                    <a href="surat-keluar" class="btn btn-warning"><i class="icon-angle-left"></i> Kembali</a>
                                    <a href="surat-keluar-update-<?php echo $id_surat_keluar; ?>" class="btn btn-info"><i class="icon-pencil2"></i> Ubah</a>
                                    <a href="surat-keluar-delete-<?php echo $id_surat_keluar; ?>" onclick="return confirm('Anda yakin ingin menghapus surat keluar nomor <?php echo $data['nomor_surat']; ?> ?');" class="btn btn-danger"><i class="icon-bin"></i> Hapus</a>
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
                                            <a class="nav-link active" id="base-tab1" data-toggle="tab" aria-controls="tab1" href="#tab1" aria-expanded="true">Data Surat</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="base-tab2" data-toggle="tab" aria-controls="tab2" href="#tab2" aria-expanded="false">Arsip Surat</a>
                                        </li>
                                    </ul>
                                    <br>
                                    <div class="tab-content px-1 pt-1">
                                        <div role="tabpanel" class="tab-pane active" id="tab1" aria-expanded="true" aria-labelledby="base-tab1">
                                            <div class="table-responsive">
                                                <table class="table table-hover mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-truncate">Nomor Agenda</td>
                                                            <td class="text-truncate">:</td>
                                                            <td class="text-truncate"><?php echo $data['nomor_agenda']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="border-top:0" width="200" class="text-truncate">Tanggal Register</td>
                                                            <td style="border-top:0" width="25" class="text-truncate">:</td>
                                                            <td style="border-top:0" class="text-truncate"><?php echo date('d-m-Y', strtotime($data['tanggal_register'])); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-truncate">Tujuan Surat</td>
                                                            <td class="text-truncate">:</td>
                                                            <td class="text-truncate"><?php echo $data['nama_instansi']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-truncate">Nomor Surat</td>
                                                            <td class="text-truncate">:</td>
                                                            <td class="text-truncate"><?php echo $data['nomor_surat']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-truncate">Tanggal Surat</td>
                                                            <td class="text-truncate">:</td>
                                                            <td class="text-truncate"><?php echo date('d-m-Y', strtotime($data['tanggal_surat'])); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-truncate">Perihal</td>
                                                            <td class="text-truncate">:</td>
                                                            <td class="text-truncate"><?php echo $data['perihal']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="border-bottom:0" class="text-truncate">Keterangan</td>
                                                            <td style="border-bottom:0" class="text-truncate">:</td>
                                                            <td style="border-bottom:0" class="text-truncate"><?php echo $data['keterangan']; ?></td>
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
                                                            <td style="border-top:0" class="text-truncate"><?php echo $data['user_account_name']; ?></td>
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
                                        if (empty($data['arsip'])) { ?>
                                            <div class="alert alert-warning alert-dismissible fade in mb-2" role="alert">
                                                <i style="margin-right:7px" class="icon-info-circle"></i> Arsip Surat belum diupload.
                                            </div>
                                        <?php
                                        } 
                                        // jika arsip ada 
                                        else { ?>
                                            <embed src="dokumen/surat-keluar/<?php echo $data['arsip']; ?>" type="application/pdf" width="100%" height="550px"></embed>
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
    		$id_surat_keluar = $_GET['id'];
            // fungsi query untuk menampilkan data dari tabel surat_keluar
            $result = $mysqli->query("SELECT a.id_surat_keluar,a.nomor_agenda,a.tanggal_register,a.tujuan_surat,a.nomor_surat,a.tanggal_surat,a.perihal,a.keterangan,a.arsip,b.id_instansi,b.nama_instansi
                                      FROM surat_keluar as a INNER JOIN instansi as b ON a.tujuan_surat=b.id_instansi
                                      WHERE a.id_surat_keluar='$id_surat_keluar'") 
                                      or die('Ada kesalahan pada query tampil data detail : '.$mysqli->error);
            $data = $result->fetch_assoc();
      	}
    ?>
    	<div class="content-header row">
            <div class="content-header-left col-md-6 col-xs-12 mb-1">
                <h3 class="content-header-title"><i class="icon-pencil22"></i> Ubah Surat Keluar </h3>
            </div>

            <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
                <div class="breadcrumb-wrapper col-xs-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="beranda"><i style="margin-right:7px" class="icon-home3"></i> Beranda </a></li>
                        <li class="breadcrumb-item"><a href="surat-keluar">Surat Keluar</a></li>
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
                                    <form class="form" action="modules/surat-keluar/proses.php?act=update" method="POST" enctype="multipart/form-data">
                                        <div class="form-body">
    										
    										<input type="hidden" name="id" value="<?php echo $data['id_surat_keluar']; ?>">
                                            
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div style="margin-bottom: 0.5rem;" class="form-group">
                                                        <label>Nomor Agenda <span class="wajib-isi">*</span></label>
                                                        <input type="text" class="form-control" name="nomor_agenda" value="<?php echo $data['nomor_agenda']; ?>" readonly required>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div style="margin-bottom: 0.5rem;" class="form-group">
                                                        <label>Tanggal Register <span class="wajib-isi">*</span></label>
                                                        <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tanggal_register" autocomplete="off" value="<?php echo date('d-m-Y', strtotime($data['tanggal_register'])); ?>" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <hr>

                                            <div class="form-group">
                                                <label>Tujuan Surat <span class="wajib-isi">*</span></label>
                                                <select class="form-control" id="select-tujuan-surat" name="tujuan_surat" autocomplete="off" required>
                                                    <option value="<?php echo $data['id_instansi']; ?>"><?php echo $data['nama_instansi']; ?></option>
                                                    <?php
                                                    // sql statement untuk menampilkan data dari tabel instansi
                                                    $query_instansi = $mysqli->query("SELECT id_instansi, nama_instansi FROM instansi ORDER BY nama_instansi ASC")
                                                                                     or die('Ada kesalahan pada query tampil data instansi: '.$mysqli->error);
                                                    // tampilkan data
                                                    while ($data_instansi = $query_instansi->fetch_assoc()) {
                                                      echo"<option value=\"$data_instansi[id_instansi]\"> $data_instansi[nama_instansi] </option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Nomor Surat <span class="wajib-isi">*</span></label>
                                                <input type="text" class="form-control" name="nomor_surat" autocomplete="off" value="<?php echo $data['nomor_surat']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label>Tanggal Surat <span class="wajib-isi">*</span></label>
                                                <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tanggal_surat" autocomplete="off" value="<?php echo date('d-m-Y', strtotime($data['tanggal_surat'])); ?>" required>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Perihal <span class="wajib-isi">*</span></label>
                                                <input type="text" class="form-control" name="perihal" autocomplete="off" value="<?php echo $data['perihal']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label>Keterangan <span class="wajib-isi">*</span></label>
                                                <textarea rows="2" class="form-control" name="keterangan" autocomplete="off" required><?php echo $data['keterangan']; ?></textarea>
                                            </div>

                                            <hr>

                                            <div class="form-group">
                                                <label class="mt-1 mr-1">Arsip Surat</label>
                                                <label class="file center-block">
                                                    <input type="file" id="file" name="arsip" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Pastikan file yang diupload bertipe *.PDF dan ukuran file maksimal 5 Mb" autocomplete="off">
                                                    <span class="file-custom"></span>
                                                </label>
                                                <label><i style="margin-right:7px" class="icon-file-pdf"></i><?php echo $data['arsip']; ?></label>
                                            </div>
                                        </div>

                                        <div class="form-actions">
                                            <input type="submit" class="btn btn-info btn-simpan mr-1" name="simpan" value="Simpan">
                                            <a href="surat-keluar-detail-<?php echo $id_surat_keluar; ?>" class="btn btn-warning btn-reset"> Batal </a>
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
    $("#select-tujuan-surat").chosen();
} );
</script>