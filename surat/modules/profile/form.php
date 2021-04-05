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
                <h3 class="content-header-title"><i class="icon-pencil22"></i> Input Profile </h3>
            </div>

            <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
                <div class="breadcrumb-wrapper col-xs-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="beranda"><i style="margin-right:7px" class="icon-home3"></i> Beranda</a></li>
                        <li class="breadcrumb-item"><a href="instansi">Profile</a></li>
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
                                    <form class="form" action="modules/profile/proses.php?act=insert" method="POST" autocomplete="off" enctype="multipart/form-data">
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label>NPWP<span class="wajib-isi">*</span></label>
                                                <input type="text" class="form-control" name="npwp" required>
                                            </div>

                                            <div class="form-group">
                                                <label>Kode KPP<span class="wajib-isi">*</span></label>
                                                <input type="text" class="form-control" name="kode_kpp" required>
                                            </div>

                                            <div class="form-group">
                                                <label>Kode Cabang<span class="wajib-isi">*</span></label>
                                                <input type="text" class="form-control" name="kode_cabang" required>
                                            </div>

                                          <div class="form-group">
                                                <label>Nama<span class="wajib-isi">*</span></label>
                                                <input type="text" class="form-control" name="nama" required>
                                            </div>

                                             <div class="form-group">
                                                <label>Alamat<span class="wajib-isi">*</span></label>
                                                <textarea class="form-control" name="alamat" required></textarea>
                                            </div>

                                             <div class="form-group">
                                                <label>Kelurahan<span class="wajib-isi">*</span></label>
                                                <input type="text" class="form-control" name="kelurahan" required>
                                            </div>

                                             <div class="form-group">
                                                <label>Kota<span class="wajib-isi">*</span></label>
                                                <input type="text" class="form-control" name="kota" required>
                                            </div>

                                             <div class="form-group">
                                                <label>Nomor Telepon<span class="wajib-isi">*</span></label>
                                                <input type="text" class="form-control" name="nomor_telepon" required>
                                            </div>

                                             <div class="form-group">
                                                <label>KLU SIDJP<span class="wajib-isi">*</span></label>
                                                <input type="text" class="form-control" name="klu_sidjp" required>
                                            </div>

                                             <div class="form-group">
                                                <label>KLU FAKTUAL<span class="wajib-isi">*</span></label>
                                                <input type="text" class="form-control" name="klu_faktual" required>
                                            </div>

                                             <div class="form-group">
                                                <label>Nomor Akta<span class="wajib-isi">*</span></label>
                                                <input type="text" class="form-control" name="nomor_akta" required>
                                            </div>

                                            <div class="form-group">
                                                <label>Tanggal Akta<span class="wajib-isi">*</span></label>
                                                <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tgl_akta" required>
                                            </div>
                                            <br>
			<!-- Create the editor container -->
                                        <label>Kendala<span class="wajib-isi">*</span></label>
			<div id="editorKendala">

			</div>

			<textarea name="kendala" id="hidden1" style="display: none;"></textarea>
                                            <br>
                                                    <!-- Create the editor container -->
                                        <label>Saran Masukan<span class="wajib-isi">*</span></label>
                                        <div id="editorSaran">

                                        </div>

                                        <textarea name="saran_masukan" id="hidden2" style="display: none;"></textarea>
                                        <br>
                                                    <!-- Create the editor container -->
                                        <label>Lain lain<span class="wajib-isi">*</span></label>
                                        <div id="editorLain">

                                        </div>

                                        <textarea name="lain_lain" id="hidden3" style="display: none;"></textarea>

                                        <div class="form-group">
                                                <label class="mt-1 mr-1">Arsip Profile</label>
                                                <label class="file center-block">
                                                    <input type="file" id="file" name="arsip" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Pastikan file yang diupload bertipe *.PDF dan ukuran file maksimal 5 Mb" autocomplete="off">
                                                    <span class="file-custom"></span>
                                                </label>
                                            </div>


                                        </div>

                                        <div class="form-actions">
                                            <input type="submit" class="btn btn-info btn-simpan mr-1" id="tst" name="simpan" value="Simpan">
                                            <a href="buku-tamu" class="btn btn-warning btn-reset"> Batal </a>
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
            $id = $_GET['id'];
            // fungsi query untuk menampilkan data dari tabel surat_masuk
            $result = $mysqli->query("SELECT * FROM profile
                                      WHERE id='$id'") 
                                      or die('Ada kesalahan pada query tampil data detail : '.$mysqli->error);
            $data = $result->fetch_assoc();
        }
    ?>
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-xs-12 mb-1">
                <h3 class="content-header-title"><i class="icon-pencil22"></i> Detail Profile </h3>
            </div>

            <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
                <div class="breadcrumb-wrapper col-xs-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="beranda"><i style="margin-right:7px" class="icon-home3"></i> Beranda </a></li>
                        <li class="breadcrumb-item"><a href="surat-masuk">Profile</a></li>
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
                                    <a href="profile" class="btn btn-warning"><i class="icon-angle-left"></i> Kembali</a>
                                    <a href="profile-update-<?php echo $id; ?>" class="btn btn-info"><i class="icon-pencil2"></i> Ubah</a>
                                    <a href="profile-delete-<?php echo $id; ?>" onclick="return confirm('Anda yakin ingin menghapus profile dengan nama <?php echo $data['nama']; ?> ?');" class="btn btn-danger"><i class="icon-bin"></i> Hapus</a>
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
                                            <a class="nav-link active" id="base-tab1" data-toggle="tab" aria-controls="tab1" href="#tab1" aria-expanded="true">Data Profile</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="base-tab2" data-toggle="tab" aria-controls="tab2" href="#tab2" aria-expanded="false">Arsip Profile</a>
                                        </li>
                                    </ul>
                                    <br>
                                    <div class="tab-content px-1 pt-1">
                                        <div role="tabpanel" class="tab-pane active" id="tab1" aria-expanded="true" aria-labelledby="base-tab1">
                                            <div class="table-responsive">
                                                <table class="table table-hover mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-truncate">NPWP</td>
                                                            <td class="text-truncate">:</td>
                                                            <td class="text-truncate"><?php echo $data['npwp']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="border-top:0" width="200" class="text-truncate">Kode KPP</td>
                                                            <td style="border-top:0" width="25" class="text-truncate">:</td>
                                                            <td style="border-top:0" class="text-truncate"><?php echo $data['kode_kpp']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-truncate">Kode Cabang</td>
                                                            <td class="text-truncate">:</td>
                                                            <td class="text-truncate"><?php echo $data['kode_cabang']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-truncate">Nama</td>
                                                            <td class="text-truncate">:</td>
                                                            <td class="text-truncate"><?php echo $data['nama']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-truncate">Alamat</td>
                                                            <td class="text-truncate">:</td>
                                                            <td class="text-truncate"><?php echo $data['alamat']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-truncate">Kelurahan</td>
                                                            <td class="text-truncate">:</td>
                                                            <td class="text-truncate"><?php echo $data['kelurahan']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-truncate">Kota</td>
                                                            <td class="text-truncate">:</td>
                                                            <td class="text-truncate"><?php echo $data['kota']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="border-bottom:0" class="text-truncate">Nomor Telepon</td>
                                                            <td style="border-bottom:0" class="text-truncate">:</td>
                                                            <td style="border-bottom:0" class="text-truncate"><?php echo $data['nomor_telepon']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="border-bottom:0" class="text-truncate">KLU SIDJP</td>
                                                            <td style="border-bottom:0" class="text-truncate">:</td>
                                                            <td style="border-bottom:0" class="text-truncate"><?php echo $data['klu_sidjp']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="border-bottom:0" class="text-truncate">KLU FAKTUAL</td>
                                                            <td style="border-bottom:0" class="text-truncate">:</td>
                                                            <td style="border-bottom:0" class="text-truncate"><?php echo $data['klu_faktual']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="border-bottom:0" class="text-truncate">Nomor Akta</td>
                                                            <td style="border-bottom:0" class="text-truncate">:</td>
                                                            <td style="border-bottom:0" class="text-truncate"><?php echo $data['nomor_akta']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="border-bottom:0" class="text-truncate">Tanggal Akta</td>
                                                            <td style="border-bottom:0" class="text-truncate">:</td>
                                                            <td style="border-bottom:0" class="text-truncate"><?php echo $data['tgl_akta']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="border-bottom:0" class="text-truncate">Kendala</td>
                                                            <td style="border-bottom:0" class="text-truncate">:</td>
                                                            <td style="border-bottom:0" class="text-truncate"><?php echo $data['kendala']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="border-bottom:0" class="text-truncate">Saran & Masukan</td>
                                                            <td style="border-bottom:0" class="text-truncate">:</td>
                                                            <td style="border-bottom:0" class="text-truncate"><?php echo $data['saran_masukan']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="border-bottom:0" class="text-truncate">Lain Lain</td>
                                                            <td style="border-bottom:0" class="text-truncate">:</td>
                                                            <td style="border-bottom:0" class="text-truncate"><?php echo $data['lain_lain']; ?></td>
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
                                                <i style="margin-right:7px" class="icon-info-circle"></i> Arsip Profile belum diupload.
                                            </div>
                                        <?php
                                        } 
                                        // jika arsip ada 
                                        else { ?>
                                            <embed src="dokumen/profile/<?php echo $data['arsip']; ?>" type="application/pdf" width="100%" height="550px"></embed>
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
    		$id = $_GET['id'];
    	    // fungsi query untuk menampilkan data dari tabel instansi
    	    $result = $mysqli->query("SELECT * FROM profile WHERE id='$id'") 
    	    						  or die('Ada kesalahan pada query tampil data ubah : '.$mysqli->error);
    	    $data = $result->fetch_assoc();
      	}
    ?>
    	<div class="content-header row">
            <div class="content-header-left col-md-6 col-xs-12 mb-1">
                <h3 class="content-header-title"><i class="icon-pencil22"></i> Ubah Profile </h3>
            </div>

            <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
                <div class="breadcrumb-wrapper col-xs-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="beranda"><i style="margin-right:7px" class="icon-home3"></i> Beranda </a></li>
                        <li class="breadcrumb-item"><a href="instansi">Profile</a></li>
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
                                    <form class="form" action="modules/profile/proses.php?act=update" method="POST" enctype="multipart/form-data">
                                        <div class="form-body">
    										
    										<input type="hidden" name="id" value="<?php echo $data['id']; ?>">

                <div class="form-group">
                                                <label>NPWP<span class="wajib-isi">*</span></label>
                                                <input type="text" class="form-control" name="npwp" value="<?php echo $data['npwp']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label>Kode KPP<span class="wajib-isi">*</span></label>
                                                <input type="text" class="form-control" value="<?php echo $data['kode_kpp']; ?>" name="kode_kpp" required>
                                            </div>

                                            <div class="form-group">
                                                <label>Kode Cabang<span class="wajib-isi">*</span></label>
                                                <input type="text" class="form-control" name="kode_cabang" value="<?php echo $data['kode_cabang']; ?>" required>
                                            </div>

                                          <div class="form-group">
                                                <label>Nama<span class="wajib-isi">*</span></label>
                                                <input type="text" class="form-control" value="<?php echo $data['nama']; ?>" name="nama" required>
                                            </div>

                                             <div class="form-group">
                                                <label>Alamat<span class="wajib-isi">*</span></label>
                                                <textarea class="form-control" name="alamat" required><?php echo $data['alamat']; ?></textarea>
                                            </div>

                                             <div class="form-group">
                                                <label>Kelurahan<span class="wajib-isi">*</span></label>
                                                <input type="text" class="form-control" name="kelurahan" value="<?php echo $data['kelurahan']; ?>" required>
                                            </div>

                                             <div class="form-group">
                                                <label>Kota<span class="wajib-isi">*</span></label>
                                                <input type="text" class="form-control" name="kota" value="<?php echo $data['kota']; ?>" required>
                                            </div>

                                             <div class="form-group">
                                                <label>Nomor Telepon<span class="wajib-isi">*</span></label>
                                                <input type="text" class="form-control" name="nomor_telepon" value="<?php echo $data['nomor_telepon']; ?>" required>
                                            </div>

                                             <div class="form-group">
                                                <label>KLU SIDJP<span class="wajib-isi">*</span></label>
                                                <input type="text" class="form-control" name="klu_sidjp" value="<?php echo $data['klu_sidjp']; ?>" required>
                                            </div>

                                             <div class="form-group">
                                                <label>KLU FAKTUAL<span class="wajib-isi">*</span></label>
                                                <input type="text" class="form-control" name="klu_faktual" value="<?php echo $data['klu_faktual']; ?>" required>
                                            </div>

                                             <div class="form-group">
                                                <label>Nomor Akta<span class="wajib-isi">*</span></label>
                                                <input type="text" class="form-control" name="nomor_akta" value="<?php echo $data['nomor_akta']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label>Tanggal Akta<span class="wajib-isi">*</span></label>
                                                <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tgl_akta" value="<?php echo $data['tgl_akta']; ?>" required>
                                            </div>
                                            <br>
            <!-- Create the editor container -->
                                        <label>Kendala<span class="wajib-isi">*</span></label>
                                    <div id="editorKendala">
                                    <?php echo $data['kendala']; ?>
                                </div>

                                     <textarea name="kendala" id="hidden4" style="display: none;"></textarea>
                                            <br>
                                                    <!-- Create the editor container -->
                                        <label>Saran Masukan<span class="wajib-isi">*</span></label>
                                        <div id="editorSaran">
                                        <?php echo $data['saran_masukan']; ?>
                                        </div>

                                        <textarea name="saran_masukan" id="hidden5" style="display: none;"></textarea>
                                        <br>
                                                    <!-- Create the editor container -->
                                        <label>Lain lain<span class="wajib-isi">*</span></label>
                                        <div id="editorLain">
                                        <?php echo $data['lain_lain']; ?>
                                        </div>

                                        <textarea name="lain_lain" id="hidden6" style="display: none;"></textarea>
                                        <br>
                                        <div class="form-group">
                                                <label class="mt-1 mr-1">Arsip Profile</label>
                                                <label class="file center-block">
                                                    <input type="file" id="file" name="arsip" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Pastikan file yang diupload bertipe *.PDF dan ukuran file maksimal 5 Mb" autocomplete="off">
                                                    <span class="file-custom"></span>
                                                </label>
                                                 <label><i style="margin-right:7px" class="icon-file-pdf"></i><?php echo $data['arsip']; ?></label>
                                            </div>
                                        </div>

                                        <div class="form-actions">
                                            <input type="submit" class="btn btn-info btn-simpan mr-1" id="stc" name="simpan" value="Simpan">
                                            <a href="buku-tamu" class="btn btn-warning btn-reset"> Batal </a>
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

<!-- Initialize Quill editor -->
<script>
var toolbarOptions = [
  ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
  [{ 'list': 'ordered'}, { 'list': 'bullet' }],   // list
  [{ 'header': 1 }, { 'header': 2 }], 
   [{ 'color': [] }],          // dropdown with defaults from theme
  [{ 'align': [] }],

  ['clean']                                         // remove formatting button
];    

  var quillOne = new Quill('#editorKendala', {
modules: {
    toolbar: toolbarOptions
  },
    theme: 'snow',
  });

    var quillTwo = new Quill('#editorSaran', {
modules: {
    toolbar: toolbarOptions
  },
    theme: 'snow',
  });

var quillThree = new Quill('#editorLain', {
modules: {
    toolbar: toolbarOptions
  },
    theme: 'snow',
  });


  $("#tst").on('click', function() {
  	var myEditork = document.querySelector('#editorKendala');
	var kendala = $('#hidden1').val(myEditork.children[0].innerHTML);

             var myEditors = document.querySelector('#editorSaran');
             var saran = $('#hidden2').val(myEditors.children[0].innerHTML);

            var myEditorl = document.querySelector('#editorLain');
            var lain = $('#hidden3').val(myEditorl.children[0].innerHTML);
});

    $("#stc").on('click', function() {
  	var myEditork = document.querySelector('#editorKendala');
            var kendala = $('#hidden4').val(myEditork.children[0].innerHTML);

             var myEditors = document.querySelector('#editorSaran');
             var saran = $('#hidden5').val(myEditors.children[0].innerHTML);

            var myEditorl = document.querySelector('#editorLain');
            var lain = $('#hidden6').val(myEditorl.children[0].innerHTML);
});

</script>
