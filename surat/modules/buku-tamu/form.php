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
                <h3 class="content-header-title"><i class="icon-pencil22"></i> Input Buku Tamu </h3>
            </div>

            <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
                <div class="breadcrumb-wrapper col-xs-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="beranda"><i style="margin-right:7px" class="icon-home3"></i> Beranda</a></li>
                        <li class="breadcrumb-item"><a href="instansi">Buku Tamu</a></li>
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
                                    <form class="form" method="POST" action="modules/buku-tamu/proses.php?act=insert" autocomplete="off">
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label>Nama<span class="wajib-isi">*</span></label>
                                                <input type="text" class="form-control" name="nama" id="nama" required>
                                            </div>

                                            <div class="form-group">
                                                <label>Email<span class="wajib-isi">*</span></label>
                                                <input type="text" class="form-control" name="email" id="email" required>
                                            </div>
			<!-- Create the editor container -->
                                        <label>Pesan<span class="wajib-isi">*</span></label>
			<div id="editor">

			</div>

			<textarea name="pesan" id="hiddenArea" style="display: none;"></textarea>

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
    elseif ($_GET['form']=='edit') { 
    	if (isset($_GET['id'])) {
    		$id = $_GET['id'];
    	    // fungsi query untuk menampilkan data dari tabel instansi
    	    $result = $mysqli->query("SELECT id, nama, email, pesan, tanggal FROM buku_tamu WHERE id='$id'") 
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
                                    <form class="form" action="modules/buku-tamu/proses.php?act=update" method="POST">
                                        <div class="form-body">
    										
    										<input type="hidden" name="id" value="<?php echo $data['id']; ?>">

                                            <div class="form-group">
                                                <label>Nama<span class="wajib-isi">*</span></label>
                                                <input type="text" class="form-control" name="nama" autocomplete="off" value="<?php echo $data['nama']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label>Email</label>
                                                <textarea rows="2" class="form-control" name="email" autocomplete="off"><?php echo $data['email']; ?></textarea>
                                            </div>

                                         <label>Pesan<span class="wajib-isi">*</span></label>
			<div id="editor">
			<?php echo $data['pesan']; ?>
			</div>

			<textarea name="pesan" id="hiddenAreas" style="display: none;"></textarea>
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

  var quill = new Quill('#editor', {
modules: {
    toolbar: toolbarOptions
  },
    theme: 'snow',
  });

  $("#tst").on('click', function() {
  	var myEditor = document.querySelector('#editor');
	var pesan = $('#hiddenArea').val(myEditor.children[0].innerHTML);
});

    $("#stc").on('click', function() {
  	var myEditor = document.querySelector('#editor');
	var pesan = $('#hiddenAreas').val(myEditor.children[0].innerHTML);
});

</script>
