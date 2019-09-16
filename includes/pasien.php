<?php

/***
* SIMRS Khanza Lite from version 0.1 Beta
* About : Porting of SIMRS Khanza by Windiarto a.k.a Mas Elkhanza as web and mobile app.
* Last modified: 02 Pebruari 2018
* Author : drg. Faisol Basoro
* Email : dentix.id@gmail.com
* Licence under GPL
***/

ob_start();
session_start();

include ('../config.php');

$page = isset($_GET['p'])? $_GET['p'] : '';

if($page=='add'){

} else {
    $table = <<<EOT
     (
       SELECT
         SUBSTR(a.nm_pasien,1,20) AS nm_pasien,
         a.no_rkm_medis,
         a.no_ktp,
         a.jk,
         a.tmp_lahir,
         a.tgl_lahir,
         a.nm_ibu,
         a.alamat,
         a.gol_darah,
         a.pekerjaan,
         a.stts_nikah,
         a.agama,
         a.tgl_daftar,
         a.no_tlp,
         a.umur,
         a.pnd,
         a.keluarga,
         a.namakeluarga,
         a.kd_pj,
         a.no_peserta,
         a.kd_kel,
         a.kd_kec,
         a.kd_kab,
         a.pekerjaanpj,
         a.alamatpj,
         a.kelurahanpj,
         a.kecamatanpj,
         a.kabupatenpj,
         a.perusahaan_pasien,
         a.suku_bangsa,
         a.bahasa_pasien,
         a.cacat_fisik,
         a.email,
         a.nip,
         a.kd_prop,
         a.propinsipj
       FROM
         pasien AS a
     ) temp
    EOT;

    $primaryKey = 'no_rkm_medis';
    $columns = array(
        array( 'db' => 'nm_pasien','dt' => 0),
        array( 'db' => 'no_rkm_medis','dt' => 1),
        array( 'db' => 'no_ktp','dt' => 2 ),
        array( 'db' => 'jk','dt' => 3 ),
        array( 'db' => 'tmp_lahir','dt' => 4 ),
        array( 'db' => 'tgl_lahir','dt' => 5 ),
        array( 'db' => 'namakeluarga','dt' => 6 ),
        array( 'db' => 'alamat','dt' => 7 ),
        array( 'db' => 'gol_darah','dt' => 8 ),
        array( 'db' => 'pekerjaan','dt' => 9 ),
        array( 'db' => 'stts_nikah','dt' => 10 ),
        array( 'db' => 'agama','dt' => 11 ),
        array( 'db' => 'tgl_daftar','dt' => 12 ),
        array( 'db' => 'no_tlp','dt' => 13 ),
        array( 'db' => 'umur','dt' => 14 ),
        array( 'db' => 'pnd','dt' => 15 ),
        array( 'db' => 'keluarga','dt' => 16 ),
        array( 'db' => 'namakeluarga','dt' => 17 ),
        array( 'db' => 'kd_pj','dt' => 18 ),
        array( 'db' => 'no_peserta','dt' => 19 ),
        array( 'db' => 'pekerjaanpj','dt' => 20 ),
        array( 'db' => 'alamatpj','dt' => 21 ),
        array( 'db' => 'suku_bangsa','dt' => 22 ),
        array( 'db' => 'bahasa_pasien','dt' => 23 ),
        array( 'db' => 'perusahaan_pasien','dt' => 24 ),
        array( 'db' => 'nip','dt' => 25 ),
        array( 'db' => 'email','dt' => 26 ),
        array( 'db' => 'cacat_fisik','dt' => 27 )
    );

    $sql_details = array(
        'user' => DB_USER,
        'pass' => DB_PASS,
        'db'   => DB_NAME,
        'host' => DB_HOST
    );
    require('ssp.class.php');
    echo json_encode(
        SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
    );
}
?>
