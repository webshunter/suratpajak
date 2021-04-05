    <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
<?php 
// fungsi untuk pengecekan status login user 
// jika user belum login, alihkan ke halaman login dan tampilkan pesan = 1
if (empty($_SESSION['sias_user_account_name']) && empty($_SESSION['sias_user_account_password'])){
    echo "<meta http-equiv='refresh' content='0; url=login-error'>";
}
// jika user sudah login
else {
    // fungsi pengecekan hak akses user untuk menampilkan menu sesuai dengan hak akses
    // jika hak akses = Administrator, tampilkan menu
    if ($_SESSION['sias_user_permissions']=='Administrator') { ?>
        <li class=" navigation-header">
            <span>Menu Utama</span><i data-toggle="tooltip" data-placement="right" data-original-title="Menu Utama" class="icon-ellipsis icon-ellipsis"></i>
        </li>
        <?php
        // fungsi untuk pengecekan menu aktif
        // jika menu beranda dipilih, menu beranda aktif
        if ($_GET["module"] == "beranda") { ?>
            <li class="active nav-item">
                <a href="beranda"><i class="icon-dashboard"></i><span class="menu-title">Beranda</span></a>
            </li>
        <?php
        } 
        // jika tidak, menu beranda tidak aktif
        else { ?>
            <li class=" nav-item">
                <a href="beranda"><i class="icon-dashboard"></i><span class="menu-title">Beranda</span></a>
            </li>
        <?php
        }

           // jika menu mpninfo dipilih, menu mpninfo aktif
        if ($_GET["module"] == "mpninfo" || $_GET["module"] == "mpninfo") { ?>
            <li class="active nav-item">
                <a href="mpninfo"><i class="icon-file-text2"></i><span class="menu-title">MPN Info</span></a>
            </li>
        <?php
        } 
        // jika tidak, menu mpninfo tidak aktif
        else {  ?>
            <li class=" nav-item">
                <a href="mpninfo"><i class="icon-file-text2"></i><span class="menu-title">MPN Info</span></a>
            </li>
        <?php
        }

        // jika menu surat masuk dipilih, menu surat masuk aktif
        if ($_GET["module"] == "surat_masuk" || $_GET["module"] == "form_surat_masuk") { ?>
            <li class="active nav-item">
                <a href="surat-masuk"><i class="icon-file-text2"></i><span class="menu-title">Surat Masuk</span></a>
            </li>
        <?php
        } 
        // jika tidak, menu surat masuk tidak aktif
        else {  ?>
            <li class=" nav-item">
                <a href="surat-masuk"><i class="icon-file-text2"></i><span class="menu-title">Surat Masuk</span></a>
            </li>
        <?php
        }

       

        // jika menu surat keluar dipilih, menu surat keluar aktif
        if ($_GET["module"] == "surat_keluar" || $_GET["module"] == "form_surat_keluar") { ?>
            <li class="active nav-item">
                <a href="surat-keluar"><i class="icon-file-text2"></i><span class="menu-title">Surat Keluar</span></a>
            </li>
        <?php
        } 
        // jika tidak, menu surat keluar tidak aktif
        else {  ?>
            <li class=" nav-item">
                <a href="surat-keluar"><i class="icon-file-text2"></i><span class="menu-title">Surat Keluar</span></a>
            </li>
        <?php
        }

        // jika menu buku tamu dipilih, menu buku tamu aktif
        if ($_GET["module"] == "buku_tamu" || $_GET["module"] == "form_buku_tamu") { ?>
            <li class="active nav-item">
                <a href="buku-tamu"><i class="icon-file-text2"></i><span class="menu-title">Buku Tamu</span></a>
            </li>
        <?php
        } 
        // jika tidak, menu buku tamu tidak aktif
        else { ?>
            <li class=" nav-item">
                <a href="buku-tamu"><i class="icon-file-text2"></i><span class="menu-title">Buku Tamu</span></a>
            </li>
        <?php
        }

		// jika menu kotak berkas dipilih, menu kotak berkas aktif
        if ($_GET["module"] == "kotakberkas" || $_GET["module"] == "form_kotakberkas") { ?>
            <li class="active nav-item">
                <a href="kotakberkas"><i class="icon-file-text2"></i><span class="menu-title">Kotak Berkas</span></a>
            </li>
        <?php
        } 
        // jika tidak, menu kotak berkas tidak aktif
        else {  ?>
            <li class=" nav-item">
                <a href="kotakberkas"><i class="icon-file-text2"></i><span class="menu-title">Kotak Berkas</span></a>
            </li>
        <?php
        }
		
		// jika menu berkas masuk dipilih, menu berkas masuk aktif
        if ($_GET["module"] == "berkasmasuk" || $_GET["module"] == "form_berkasmasuk") { ?>
            <li class="active nav-item">
                <a href="berkasmasuk"><i class="icon-file-text2"></i><span class="menu-title">Berkas Masuk</span></a>
            </li>
        <?php
        } 
        // jika tidak, menu berkas masuk tidak aktif
        else {  ?>
            <li class=" nav-item">
                <a href="berkasmasuk"><i class="icon-file-text2"></i><span class="menu-title">Berkas Masuk</span></a>
            </li>
        <?php
        }
				

        // jika menu rekapitulasi dipilih, menu rekapitulasi aktif
        if ($_GET["module"] == "rekapitulasi") { ?>
            <li class="active nav-item">
                <a href="rekapitulasi"><i class="icon-files-empty"></i><span class="menu-title">Rekapitulasi</span></a>
            </li>
        <?php
        } 
		
        // jika tidak, menu rekapitulasi tidak aktif
        else { ?>
            <li class=" nav-item">
                <a href="rekapitulasi"><i class="icon-files-empty"></i><span class="menu-title">Rekapitulasi</span></a>
            </li>
        <?php
        }
        ?>
		

        <li class=" navigation-header">
            <span>Referensi</span><i data-toggle="tooltip" data-placement="right" data-original-title="Referensi" class="icon-ellipsis icon-ellipsis"></i>
        </li>

        <?php
        // jika menu instansi dipilih, menu instansi aktif
        if ($_GET["module"] == "instansi" || $_GET["module"] == "form_instansi") { ?>
            <li class="active nav-item">
                <a href="instansi"><i class="icon-home3"></i><span class="menu-title">Instansi</span></a>
            </li>
        <?php
        } 
        // jika tidak, menu instansi tidak aktif
        else { ?>
            <li class=" nav-item">
                <a href="instansi"><i class="icon-home3"></i><span class="menu-title">Instansi</span></a>
            </li>
        <?php
        }
                // jika menu profile dipilih, menu profile aktif
        if ($_GET["module"] == "profile" || $_GET["module"] == "form_profile") { ?>
            <li class="active nav-item">
                <a href="profile"><i class="icon-user"></i><span class="menu-title">Profile</span></a>
            </li>
        <?php
        } 
        // jika tidak, menu profile tidak aktif
        else { ?>
            <li class=" nav-item">
                <a href="profile"><i class="icon-user"></i><span class="menu-title">Profile</span></a>
            </li>
        <?php
        }
        ?>


        <li class=" navigation-header">
            <span>Utility</span><i data-toggle="tooltip" data-placement="right" data-original-title="Utility" class="icon-ellipsis icon-ellipsis"></i>
        </li>

        <?php
        // jika menu konfigurasi aplikasi dipilih, menu konfigurasi aplikasi aktif
        if ($_GET["module"] == "config") { ?>
            <li class="active nav-item">
                <a href="konfigurasi-aplikasi"><i class="icon-cog"></i><span class="menu-title">Konfigurasi Aplikasi</span></a>
            </li>
        <?php
        } 
        // jika tidak, menu konfigurasi aplikasi tidak aktif
        else { ?>
            <li class=" nav-item">
                <a href="konfigurasi-aplikasi"><i class="icon-cog"></i><span class="menu-title">Konfigurasi Aplikasi</span></a>
            </li>
        <?php
        }

        // jika menu user dipilih, menu user aktif
        if ($_GET["module"] == "user" || $_GET["module"] == "form_user") { ?>
            <li class="active nav-item">
                <a href="user"><i class="icon-user"></i><span class="menu-title">Manajemen User</span></a>
            </li>
        <?php
        } 
        // jika tidak, menu user tidak aktif
        else { ?>
            <li class=" nav-item">
                <a href="user"><i class="icon-user"></i><span class="menu-title">Manajemen User</span></a>
            </li>
        <?php
        }

        // jika menu Backup Database dipilih, menu Backup Database aktif
        if ($_GET["module"] == "backup") { ?>
            <li class="active nav-item">
                <a href="backup-database"><i class="icon-database"></i><span class="menu-title">Backup Database</span></a>
            </li>
        <?php
        } 
        // jika tidak, menu Backup Database tidak aktif
        else { ?>
            <li class=" nav-item">
                <a href="backup-database"><i class="icon-database"></i><span class="menu-title">Backup Database</span></a>
            </li>
        <?php
        }

        // jika menu audit trail dipilih, menu audit trail aktif
        if ($_GET["module"] == "audit_trail") { ?>
            <li class="active nav-item">
                <a href="audit-trail"><i class="icon-history"></i><span class="menu-title">Audit Trail</span></a>
            </li>
        <?php
        } 
        // jika tidak, menu audit trail tidak aktif
        else { ?>
            <li class=" nav-item">
                <a href="audit-trail"><i class="icon-history"></i><span class="menu-title">Audit Trail</span></a>
            </li>
        <?php
        }
    }
    // jika hak akses = Operator, tampilkan menu ------------------------------------------------------------------------------------------------------
    elseif ($_SESSION['sias_user_permissions']=='Operator') { ?>
        <li class=" navigation-header">
            <span>Menu Utama</span><i data-toggle="tooltip" data-placement="right" data-original-title="Menu Utama" class="icon-ellipsis icon-ellipsis"></i>
        </li>
        <?php
        // fungsi untuk pengecekan menu aktif
        // jika menu beranda dipilih, menu beranda aktif
        if ($_GET["module"] == "beranda") { ?>
            <li class="active nav-item">
                <a href="beranda"><i class="icon-home3"></i><span class="menu-title">Beranda</span></a>
            </li>
        <?php
        } 
        // jika tidak, menu beranda tidak aktif
        else { ?>
            <li class=" nav-item">
                <a href="beranda"><i class="icon-home3"></i><span class="menu-title">Beranda</span></a>
            </li>
        <?php
        }
        
        // jika menu surat masuk dipilih, menu surat masuk aktif
        if ($_GET["module"] == "surat_masuk" || $_GET["module"] == "form_surat_masuk") { ?>
            <li class="active nav-item">
                <a href="surat-masuk"><i class="icon-file-text2"></i><span class="menu-title">Surat Masuk</span></a>
            </li>
        <?php
        } 
        // jika tidak, menu surat masuk tidak aktif
        else {  ?>
            <li class=" nav-item">
                <a href="surat-masuk"><i class="icon-file-text2"></i><span class="menu-title">Surat Masuk</span></a>
            </li>
        <?php
        }

        // jika menu surat keluar dipilih, menu surat keluar aktif
        if ($_GET["module"] == "surat_keluar" || $_GET["module"] == "form_surat_keluar") { ?>
            <li class="active nav-item">
                <a href="surat-keluar"><i class="icon-file-text2"></i><span class="menu-title">Surat Keluar</span></a>
            </li>
        <?php
        } 
        // jika tidak, menu surat keluar tidak aktif
        else {  ?>
            <li class=" nav-item">
                <a href="surat-keluar"><i class="icon-file-text2"></i><span class="menu-title">Surat Keluar</span></a>
            </li>
        <?php
        }

        // jika menu rekapitulasi dipilih, menu rekapitulasi aktif
        if ($_GET["module"] == "rekapitulasi") { ?>
            <li class="active nav-item">
                <a href="rekapitulasi"><i class="icon-files-empty"></i><span class="menu-title">Rekapitulasi</span></a>
            </li>
        <?php
        } 
        // jika tidak, menu rekapitulasi tidak aktif
        else { ?>
            <li class=" nav-item">
                <a href="rekapitulasi"><i class="icon-files-empty"></i><span class="menu-title">Rekapitulasi</span></a>
            </li>
        <?php
        }
    }  
}
?>
    </ul>