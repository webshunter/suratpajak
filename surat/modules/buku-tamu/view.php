<?php 
// fungsi untuk pengecekan status login user 
// jika user belum login, alihkan ke halaman login
if (empty($_SESSION['sias_user_account_name']) && empty($_SESSION['sias_user_account_password'])){
    echo "<meta http-equiv='refresh' content='0; url=../../login-error'>";
}
// jika user sudah login
else { ?>
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h3 class="content-header-title"><i class="icon-file-text2"></i> Buku Tamu </h3>
        </div>

        <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="beranda"><i style="margin-right:7px" class="icon-home3"></i> Beranda</a></li>
                    <li class="breadcrumb-item active">Buku Tamu</li>
                </ol>
            </div>
        </div>
    </div>

    <?php
    // fungsi untuk menampilkan pesan
    // jika alert = "" (kosong)
    // tampilkan pesan "" (kosong)
    if (empty($_GET['alert'])) {
    }
    // jika alert = 1
    // tampilkan pesan "Data surat masuk berhasil disimpan"
    elseif ($_GET['alert'] == 1) { ?>
        <div class="alert alert-success alert-dismissible fade in mb-2" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong><i style="margin-right:7px" class="icon-checkmark2"></i>Sukses!</strong> Data buku tamu berhasil disimpan.
        </div>
    <?php
    } 
    // jika alert = 2
    // tampilkan pesan Sukses "data surat masuk berhasil diubah"
    elseif ($_GET['alert'] == 2) { ?>
        <div class="alert alert-success alert-dismissible fade in mb-2" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong><i style="margin-right:7px" class="icon-checkmark2"></i>Sukses!</strong> Data buku tamu berhasil diubah.
        </div>
    <?php
    }
    // jika alert = 3
    // tampilkan pesan Sukses "data surat masuk berhasil dihapus"
    elseif ($_GET['alert'] == 3) { ?>
        <div class="alert alert-success alert-dismissible fade in mb-2" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong><i style="margin-right:7px" class="icon-checkmark2"></i>Sukses!</strong> Data buku tamu berhasil dihapus.
        </div>
    <?php
    } 
    // jika alert = 4
    // tampilkan pesan Upload Gagal "Pastikan file yang diupload sudah benar"
    elseif ($_GET['alert'] == 4) { ?>
        <div class="alert alert-danger alert-dismissible fade in mb-2" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong><i style="margin-right:7px" class="icon-cancel-circle"></i>Gagal!</strong> Nama sudah ada.
        </div>
    <?php
    } 
    // jika alert = 5
    // tampilkan pesan Upload Gagal "Pastikan ukuran gambar tidak lebih dari 5 Mb"
    elseif ($_GET['alert'] == 5) { ?>
        <div class="alert alert-danger alert-dismissible fade in mb-2" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong><i style="margin-right:7px" class="icon-cancel-circle"></i>Gagal!</strong> Pastikan ukuran file tidak lebih dari 5 Mb.
        </div>
    <?php
    } 
    // jika alert = 6
    // tampilkan pesan Upload Gagal "Pastikan file yang diupload bertipe *.PDF"
    elseif ($_GET['alert'] == 6) { ?>
        <div class="alert alert-danger alert-dismissible fade in mb-2" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong><i style="margin-right:7px" class="icon-cancel-circle"></i>Gagal!</strong> Pastikan file yang diupload bertipe *.PDF.
        </div>
    <?php
    } 
    ?>

    <div class="content-body"><!-- Basic Tables start -->
        <div class="row">
            <div class="col-xs-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            <a href="buku-tamu-add" class="btn btn-info"><i class="icon-plus"></i> Tambah </a>
                            <a data-toggle="modal" href="#pdf" class="btn btn-info"><i style="margin-right:5px" class="icon-print"></i> Cetak</a>
                            <a data-toggle="modal" href="#excel" class="btn btn-info"><i style="margin-right:5px" class="icon-file-excel"></i> Export</a>
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
                        <div class="card-block card-dashboard">
                            <table id="tabel-buku-tamu" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No. </th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Pesan</th>
                                        <th>Tanggal</th>
                                        <th></th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Basic Tables end -->
    </div>

    <!-- Modal PDF -->
    <div class="modal fade text-xs-left" id="pdf" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel1"><i style="margin-right:7px" class="icon-file-text2"></i> Laporan Surat Masuk </h4>
                </div>
                <form action="laporan-buku-tamu-pdf" method="POST" target="_blank">
                    <div class="modal-body">
                        <div class="form-body">
                            <p>Tanggal</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tgl_awal" placeholder="Tanggal Awal" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tgl_akhir" placeholder="Tanggal Akhir" autocomplete="off" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-info btn-simpan mr-1" name="cetak" value="Cetak">
                        <button type="button" class="btn btn-warning btn-reset" data-dismiss="modal">Tutup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Excel -->
    <div class="modal fade text-xs-left" id="excel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel1"><i style="margin-right:7px" class="icon-file-text2"></i> Laporan Surat Masuk </h4>
                </div>
                <form action="laporan-buku-tamu-excel" method="POST" target="_blank">
                    <div class="modal-body">
                        <div class="form-body">
                            <p>Tanggal</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tgl_awal" placeholder="Tanggal Awal" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tgl_akhir" placeholder="Tanggal Akhir" autocomplete="off" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-info btn-simpan mr-1" name="export" value="Export">
                        <button type="button" class="btn btn-warning btn-reset" data-dismiss="modal">Tutup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!-- datatables serverside processing -->
    <script type="text/javascript">
    $(document).ready(function() {
        // initiate dataTables plugin
        $.fn.dataTableExt.oApi.fnPagingInfo = function (oSettings)
        {
            return {
                "iStart": oSettings._iDisplayStart,
                "iEnd": oSettings.fnDisplayEnd(),
                "iLength": oSettings._iDisplayLength,
                "iTotal": oSettings.fnRecordsTotal(),
                "iFilteredTotal": oSettings.fnRecordsDisplay(),
                "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
            };
        };

        var table = $('#tabel-buku-tamu').DataTable( {
            "bAutoWidth": false,
            "processing": true,
            "serverSide": true,
            "ajax": 'modules/buku-tamu/data.php',
            "columnDefs": [ 
                { "targets": 0, "data": null, "orderable": false, "searchable": false, "width": '30px', "className": 'center' },
                { "targets": 1, "width": '100px', "className": 'center' },
                { "targets": 2, "width": '100px', "className": 'center' },
                { "targets": 3, "width": '160px', "className": 'center' },
                { "targets": 4, "width": '100px' },
             {
                  "targets": 5, "data": null, "orderable": false, "searchable": false, "width": '80px', "className": 'center',
                  "render": function(data, type, row) {
                      var btn = "<a style=\"margin-right:5px\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Ubah\" class=\"btn btn-info btn-sm\" href=\"buku-tamu-update-"+data[ 0 ]+"\"><i class=\"icon-pencil2\"></i></a><span><a data-toggle=\"tooltip\" data-placement=\"top\" title=\"Hapus\" class=\"btn btn-danger btn-sm\" href=\"buku-tamu-delete-"+data[ 0 ]+"\"><i class=\"icon-bin\"></i></a></span>";
                      return btn;
                  } 
                } 
            ],
            "order": [[ 3, "desc" ],[ 1, "desc" ]],
            "iDisplayLength": 25,
            "rowCallback": function (row, data, iDisplayIndex) {
                var info = this.fnPagingInfo();
                var page = info.iPage;
                var length = info.iLength;
                var index = page * length + (iDisplayIndex + 1);
                $('td:eq(0)', row).html(index);
            }
        } );
    } );
    </script>
<?php  
}
?>