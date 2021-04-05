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
         
        </script>

    	<div class="content-header row">
            <div class="content-header-left col-md-6 col-xs-12 mb-1">
                <h3 class="content-header-title"><i class="icon-pencil22"></i> Input Berkas Masuk </h3>
            </div>

            <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
                <div class="breadcrumb-wrapper col-xs-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="beranda"><i style="margin-right:7px" class="icon-home3"></i> Beranda</a></li>
                        <li class="breadcrumb-item"><a href="surat-masuk">Berkas Masuk</a></li>
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
                                    <form class="form" name="frmberkasmasuk" action="modules/berkasmasuk/proses.php?act=insert" method="POST" enctype="multipart/form-data">
                                        <div class="form-body">

                                        <?php  
                                            // fungsi untuk membuat kode transaksi unik per berkas masuk
                                                $query_id = mysqli_query($mysqli, "SELECT RIGHT(kode_transaksi,7) as kode FROM is_berkasmasuk
                                                ORDER BY kode_transaksi DESC LIMIT 1")
                                                or die('Ada kesalahan pada query tampil kode_transaksi : '.mysqli_error($mysqli));

                                                $count = mysqli_num_rows($query_id);

                                                    if ($count <> 0) {
                                            // mengambil data kode transaksi
                                                $data_id = mysqli_fetch_assoc($query_id);
                                                $kode    = $data_id['kode']+1;
                                                } else {
                                                $kode = 1;
                                                }

                                            // buat kode_transaksi
                                                $tahun          = date("Y");
                                                $buat_id        = str_pad($kode, 7, "0", STR_PAD_LEFT);
                                                $kode_transaksi = "BM-$tahun-$buat_id";
                                        ?>
                                                                                    
                                               <div class="form-group" >
                                                <label>Kotak Berkas <span class="wajib-isi">*</span></label>
                                                        <select class="form-control" id="select-kotakberkas" name="kode_kotakberkas" autocomplete="off" required>
                                                        <option value=""></option>
                                                        <?php
                                                            $query_kotakberkas = mysqli_query($mysqli, "SELECT kode_kotakberkas, kode_lemari, kode_rak FROM is_kotakberkas ORDER BY kode_kotakberkas DESC")
                                                                                                    or die('Ada kesalahan pada query tampil obat: '.mysqli_error($mysqli));
                                                            while ($data_kotakberkas = mysqli_fetch_assoc($query_kotakberkas)) {
                                                                echo"<option value=\"$data_kotakberkas[kode_kotakberkas]\"> $data_kotakberkas[kode_kotakberkas] | Lemari  $data_kotakberkas[kode_lemari] | Rak  $data_kotakberkas[kode_rak] </option>";
                                                            }
                                                        ?>
                                                    </select>
                                                 </div>

                                            <div class="form-group">
                                                <label>Nomor Urut Map <span class="wajib-isi">*</span></label>
                                                <input type="text" class="form-control" name="kode_map" autocomplete="off" required>
                                            </div>

                                            <div class="row">
                                            <div class="col-md-4">
                                                    <div style="margin-bottom: 0.5rem;" class="form-group">
                                                        <label>NPWP 9 <span class="wajib-isi">*</span></label>
                                                        <input type="text" class="form-control" name="npwp" autocomplete="off" required>
                                                    </div>
                                                </div>

                                                <div class="col-md-2">
                                                    <div style="margin-bottom: 0.5rem;" class="form-group">
                                                        <label>Kode KPP <span class="wajib-isi">*</span></label>
                                                        <input type="text" class="form-control" name="kode_kpp" autocomplete="off" required>
                                                    </div>
                                                </div>

                                                <div class="col-md-2">
                                                    <div style="margin-bottom: 0.5rem;" class="form-group">
                                                        <label>Kode Cabang <span class="wajib-isi">*</span></label>
                                                        <input type="text" class="form-control" name="kode_cabang" autocomplete="off" required>
                                                    </div>
                                                </div>                                             
                                            </div>
                                            <hr>

                                            <div class="form-group">
                                                <label>Jenis Dokumen <span class="wajib-isi">*</span></label>
                                                <select class="form-control" id="select-asal-surat" name="jenis_dokumen" autocomplete="off" required>
                                                    <option value=""></option>
                                                    <option value="STP - SKPKB">STP / SKPKB</option>
                                                    <option value="Surat Keputusan Upaya Hukum">SK Upaya Hukum / SK Angsuran</option>
                                                    <option value="SSP-bukti Pbk-SKPKPP">SSP-Bukti Pbk-SKPKPP</option>
                                                    <option value="Tindakan Penagihan">Tindakan Penagihan</option>
                                                    <option value="Induk Berkas">Induk Berkas</option>
                                                    <option value="Lain lain">Lain-lain</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Nomor Dokumen <span class="wajib-isi">*</span></label>
                                                <input type="text" class="form-control" name="nomor_dokumen" autocomplete="off" required>
                                            </div>


                                            <div class="form-group">
                                                <label>Tanggal Dokumen <span class="wajib-isi">*</span></label>
                                                <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tanggal_dokumen" autocomplete="off" required>
                                            </div>                                                          

                                            <!-- quill editor untuk isi keterangan -->
                                            <label>Keterangan<span class="wajib-isi">*</span></label>
                                    			<div id="editor">
                                    			</div>
                                    			<textarea name="pesan" id="hiddenArea" style="display: none;"></textarea>
                                          
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
                                            <a href="berkasmasuk" class="btn btn-warning btn-reset"> Batal </a>
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
            $id_berkasmasuk = $_GET['id'];
            // fungsi query untuk menampilkan data dari tabel berkas_masuk
            $result = $mysqli->query("  SELECT *
                                        FROM is_berkasmasuk 
                                        INNER JOIN sys_users
                                        ON is_berkasmasuk.created_user=sys_users.userID
                                        WHERE kode_transaksi='$id_berkasmasuk'") 
                                      or die('Ada kesalahan pada query tampil data detail : '.$mysqli->error);
            $data = $result->fetch_assoc();
        }
    ?>
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-xs-12 mb-1">
                <h3 class="content-header-title"><i class="icon-pencil22"></i> Detail Berkas Masuk </h3>
            </div>

            <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
                <div class="breadcrumb-wrapper col-xs-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="beranda"><i style="margin-right:7px" class="icon-home3"></i> Beranda </a></li>
                        <li class="breadcrumb-item"><a href="surat-masuk">Berkas  Masuk</a></li>
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
                                    <a href="berkasmasuk" class="btn btn-warning"><i class="icon-angle-left"></i> Kembali</a>
                                    <a href="berkasmasuk-update-<?php echo $id_berkasmasuk; ?>" class="btn btn-info"><i class="icon-pencil2"></i> Ubah</a>
                                    <a style="color: white;" id="hapusberkasmasuk" dataid="<?php echo $data['kode_transaksi']; ?>" class="btn btn-danger"><i class="icon-bin"></i> Hapus</a>
                                    <script>
                                        $("#hapusberkasmasuk").click(function(event) {
                                            var txt;
                                            var r = confirm("anda yakin akan menghapus berkas masuk dengan kode_transaksi <?php echo $data['kode_transaksi']; ?> !");
                                            if (r == true) {
                                                location.href = "modules/berkasmasuk/proses.php?act=delete&idnya=<?= $data['kode_transaksi']  ?>";
                                            } else {
                                            }
                                        });
                                    </script>
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
                                                            <td class="text-truncate">Kode Transaksi</td>
                                                            <td class="text-truncate">:</td>
                                                            <td class="text-truncate"><?php echo $data['kode_transaksi']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-truncate">Nomor Kotak Berkas</td>
                                                            <td class="text-truncate">:</td>
                                                            <td class="text-truncate"><?php echo $data['kode_kotakberkas']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-truncate">Nomor Map</td>
                                                            <td class="text-truncate">:</td>
                                                            <td class="text-truncate"><?php echo $data['kode_map']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-truncate">NPWP 9 digit</td>
                                                            <td class="text-truncate">:</td>
                                                            <td class="text-truncate"><?php echo $data['npwp']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-truncate">Kode KPP</td>
                                                            <td class="text-truncate">:</td>
                                                            <td class="text-truncate"><?php echo $data['kode_kpp']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-truncate">Kode Cabang</td>
                                                            <td class="text-truncate">:</td>
                                                            <td class="text-truncate"><?php echo $data['kode_cabang']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-truncate">Jenis Dokumen</td>
                                                            <td class="text-truncate">:</td>
                                                            <td class="text-truncate"><?php echo $data['jenis_dokumen']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-truncate">Nomor Dokumen</td>
                                                            <td class="text-truncate">:</td>
                                                            <td class="text-truncate"><?php echo $data['nomor_dokumen']; ?></td>
                                                        </tr>                                                        
                                                        <tr>
                                                            <td style="border-top:0" width="200" class="text-truncate">Tanggal Dokumen</td>
                                                            <td style="border-top:0" width="25" class="text-truncate">:</td>
                                                            <td style="border-top:0" class="text-truncate"><?php echo date('d-m-Y', strtotime($data['tanggal_dokumen'])); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-truncate">Keterangan Isi Berkas</td>
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
                                                            <td style="border-top:0" class="text-truncate"><?php echo $data['fullname']; ?></td>
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

                                            $kodeaksesfile = $data['kode_kotakberkas'];

                                            $datafile = $mysqli->query("  SELECT * FROM is_kotakberkas WHERE kode_kotakberkas = '$kodeaksesfile' ");
                                            $filesaya = $datafile->fetch_assoc();



                                         ?>

                                        <?php $render_berkas_to_pdf = json_decode($filesaya['arsip_kotakberkas']); ?>

                                        <?php 
                                        // jika arsip tidak ada 
                                        if (empty($filesaya['arsip_kotakberkas'])) { ?>
                                            <div class="alert alert-warning alert-dismissible fade in mb-2" role="alert">
                                                <i style="margin-right:7px" class="icon-info-circle"></i> Arsip Berkas belum diupload. <?= $filesaya['arsip_kotakberkas']; ?>
                                            </div>
                                        <?php
                                        } 
                                        // jika arsip ada 
                                        else { ?>
                                            <?php foreach ($render_berkas_to_pdf as $key => $value): ?>
                                                <h3>Nama Berkas : <?= $value; ?></h3>
                                                <br>
                                                <a datanama="<?= $value; ?>" datano="<?= $key; ?>" datakodeberkas="<?= $data['kode_kotakberkas']; ?>" class="btn btn-danger hapusfileview">delete file</a>
                                                    <hr><br>
                                                    <embed src="dokumen/kotakberkas/<?php echo $value; ?>" type="application/pdf" width="100%" height="550px"></embed>
                                                <hr><hr>    
                                            <?php endforeach ?>
                                        <?php
                                        }
                                        ?>
                                        </div>
                                        <script>
                                            //delete with ajax
                                            $(".hapusfileview").click(function() {
                                                var dataNama = $(this).attr('dataNama');
                                                var kodeberkas = $(this).attr('datakodeberkas');
                                                var dataurutan = $(this).attr('datano');
                                                $.ajax({
                                                    url:"modules/berkasmasuk/proses.php?act=deletefile",
                                                    method: "POST",
                                                    dataType: "text",
                                                    data: {
                                                        datanama : dataNama,
                                                        kode: kodeberkas,
                                                        nomor: dataurutan,
                                                    },success:function(response){
                                                        location.reload();
                                                    }
                                                });
                                            });

                                        </script>
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
    		$id_berkasmasuk = $_GET['id'];
            // fungsi query untuk menampilkan data dari tabel surat_masuk
            $result = $mysqli->query("  SELECT *
                                        FROM is_berkasmasuk 
                                        INNER JOIN sys_users
                                        ON is_berkasmasuk.created_user=sys_users.userID
                                        WHERE kode_transaksi='$id_berkasmasuk'") 
                                      or die('Ada kesalahan pada query tampil data ubah : '.$mysqli->error);
            $data = $result->fetch_assoc();
      	}
    ?>
    	<div class="content-header row">
            <div class="content-header-left col-md-6 col-xs-12 mb-1">
                <h3 class="content-header-title"><i class="icon-pencil22"></i> Ubah Berkas Masuk </h3>
            </div>

            <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
                <div class="breadcrumb-wrapper col-xs-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="beranda"><i style="margin-right:7px" class="icon-home3"></i> Beranda </a></li>
                        <li class="breadcrumb-item"><a href="surat-masuk">Surat Masuk</a></li>
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
                                    <form class="form" action="modules/berkasmasuk/proses.php?act=update" method="POST" enctype="multipart/form-data">
                                        <div class="form-body">
    										<div class="form-group" >
                                            <input type="hidden" value="<?= $id_berkasmasuk; ?>" name="kode_transaksi">
                                            <label>Kotak Berkas <span class="wajib-isi">*</span></label>
                                                    <select class="form-control" id="select-kotakberkas" name="kode_kotakberkas" autocomplete="off" required>
                                                        <option value=""></option>
                                                        <?php
                                                            $query_kotakberkas = mysqli_query($mysqli, "SELECT kode_kotakberkas, kode_lemari, kode_rak FROM is_kotakberkas ORDER BY kode_kotakberkas DESC")
                                                                                                    or die('Ada kesalahan pada query tampil obat: '.mysqli_error($mysqli));
                                                            while ($data_kotakberkas = mysqli_fetch_assoc($query_kotakberkas)) {
                                                                if ($data_kotakberkas[kode_kotakberkas] == $data['kode_kotakberkas']) {
                                                                    echo"<option selected='selected' value=\"$data_kotakberkas[kode_kotakberkas]\"> $data_kotakberkas[kode_kotakberkas] | Lemari  $data_kotakberkas[kode_lemari] | Rak  $data_kotakberkas[kode_rak] </option>";
                                                                }else{
                                                                    echo"<option value=\"$data_kotakberkas[kode_kotakberkas]\"> $data_kotakberkas[kode_kotakberkas] | Lemari  $data_kotakberkas[kode_lemari] | Rak  $data_kotakberkas[kode_rak] </option>";
                                                                }
                                                            }
                                                        ?>
                                                </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Nomor Urut Map <span class="wajib-isi">*</span></label>
                                                    <input type="text" value="<?php echo $data['kode_map']; ?>" class="form-control" name="kode_map" autocomplete="off" required>
                                                </div>

                                            <div class="row">
                                            <div class="col-md-4">
                                                    <div style="margin-bottom: 0.5rem;" class="form-group">
                                                        <label>NPWP 9 <span class="wajib-isi">*</span></label>
                                                        <input type="text" value="<?php echo $data['npwp']; ?>" class="form-control" name="npwp" autocomplete="off" required>
                                                    </div>
                                                </div>

                                                <div class="col-md-2">
                                                    <div style="margin-bottom: 0.5rem;" class="form-group">
                                                        <label>Kode KPP <span class="wajib-isi">*</span></label>
                                                        <input type="text" value="<?php echo $data['kode_kpp']; ?>" class="form-control" name="kode_kpp" autocomplete="off" required>
                                                    </div>
                                                </div>

                                                <div class="col-md-2">
                                                    <div style="margin-bottom: 0.5rem;" class="form-group">
                                                        <label>Kode Cabang <span class="wajib-isi">*</span></label>
                                                        <input type="text" class="form-control" value="<?php echo $data['kode_cabang']; ?>" name="kode_cabang" autocomplete="off" required>
                                                    </div>
                                                </div>                                             
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <label>Jenis Dokumen <span class="wajib-isi">*</span></label>
                                                <select class="form-control" id="select-asal-surat" name="jenis_dokumen" autocomplete="off" required>
                                                    <?php 
                                                        $jenisDocument = array("","STP / SKPKB", "SK Upaya Hukum / SK Angsuran", "SSP-Bukti Pbk-SKPKPP", "Tindakan Penagihan","Induk Berkas","Lain-lain");
                                                        $valueDocument = array("","STP - SKPKB", "Surat Keputusan Upaya Hukum", "SSP-bukti Pbk-SKPKPP", "Tindakan Penagihan","Induk Berkas","Lain lain");

                                                     ?>
                                                    <?php foreach ($jenisDocument as $key => $value): ?>
                                                        <?php if ($valueDocument[$key] == $data['jenis_dokumen'] ) : ?>
                                                            <option selected="selected" value="<?= $valueDocument[$key]; ?>"><?= $value; ?></option>
                                                                <?php else: ?>
                                                            <option value="<?= $valueDocument[$key]; ?>"><?= $value; ?></option>
                                                        <?php endif ?>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Nomor Dokumen <span class="wajib-isi">*</span></label>
                                                <input type="text" value="<?= $data['nomor_dokumen']; ?>" class="form-control" name="nomor_dokumen" autocomplete="off" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Tanggal Dokumen <span class="wajib-isi">*</span></label>
                                                <input type="text" value="<?php echo date('d-m-Y', strtotime($data['tanggal_dokumen'])); ?>" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tanggal_dokumen" autocomplete="off" required>
                                            </div>                                                          

                                            <!-- quill editor untuk isi keterangan -->

                                            <div class="form-group">
                                                <label>Keterangan <span class="wajib-isi">*</span></label>
                                                <textarea rows="2" class="form-control" name="keterangan" autocomplete="off" required=""><?= $data["keterangan"]; ?></textarea>
                                            </div>

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
                                            <a href="surat-masuk-detail-<?php echo $id_surat_masuk; ?>" class="btn btn-warning btn-reset"> Batal </a>
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
