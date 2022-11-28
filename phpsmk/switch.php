<?php
    // $hari=7;

    // switch ($hari) {
    //     case 1:
    //         echo 'minggu';
    //         break;
    //     case 2:
    //         echo 'senin';
    //         break;
    //     case 3:
    //         echo 'selasa';
    //         break;
    //     case 4:
    //         echo 'rabu';
    //         break;
    //     case 5:
    //         echo 'kamis';
    //         break;
    //     case 6:
    //         echo 'jumat';
    //         break;

    //     default:
    //         echo 'hari tidak ditemukan';
    //         break;
    // }

    $pilihan='simpan';

    switch ($pilihan) {
        case 'tambah':
            echo 'anda memilih tambah';
            break;
        case 'ubah':
            echo 'anda memilih ubah';
            break;
        case 'hapus':
            echo 'anda memilih hapus';
            break;
        default:
            echo 'pilihan anda tidak ditemukan';
            break;
    }
?>