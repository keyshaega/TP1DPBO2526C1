<?php

session_start();

$aksi = isset($_REQUEST['aksi']) ? $_REQUEST['aksi'] : '';


// ====================
// TAMBAH DATA
// ====================

if ($aksi == 'tambah') {

    $idTiket = $_POST['idTiket'];
    $namaFilm = $_POST['namaFilm'];
    $studio = $_POST['studio'];
    $jamTayang = $_POST['jamTayang'];
    $nomorKursi = $_POST['nomorKursi'];
    $harga = $_POST['harga'];

    // cek ID sudah digunakan
    foreach ($_SESSION['daftarTiket'] as $tiket) {

        if ($tiket['idTiket'] == $idTiket) {

            echo "<script>
                    alert('Error: ID Tiket sudah digunakan.');
                    window.location='index.php';
                  </script>";

            exit;
        }
    }

    $dataBaru = [
        'idTiket' => $idTiket,
        'namaFilm' => $namaFilm,
        'studio' => $studio,
        'jamTayang' => $jamTayang,
        'nomorKursi' => $nomorKursi,
        'harga' => $harga
    ];

    $_SESSION['daftarTiket'][] = $dataBaru;

    header("Location: index.php");

    exit;
}


// UPDATE DATA

if ($aksi == 'update') {

    $idLama = $_POST['idLama'];

    foreach ($_SESSION['daftarTiket'] as $key => $tiket) {

        if ($tiket['idTiket'] == $idLama) {

            $_SESSION['daftarTiket'][$key]['namaFilm'] =
                $_POST['namaFilm'];

            $_SESSION['daftarTiket'][$key]['studio'] =
                $_POST['studio'];

            $_SESSION['daftarTiket'][$key]['jamTayang'] =
                $_POST['jamTayang'];

            $_SESSION['daftarTiket'][$key]['nomorKursi'] =
                $_POST['nomorKursi'];

            $_SESSION['daftarTiket'][$key]['harga'] =
                $_POST['harga'];

            break;
        }
    }

    header("Location: index.php");

    exit;
}

// HAPUS DATA

if ($aksi == 'hapus') {

    $id = $_GET['id'];

    foreach ($_SESSION['daftarTiket'] as $key => $tiket) {

        if ($tiket['idTiket'] == $id) {

            unset($_SESSION['daftarTiket'][$key]);

            break;
        }
    }

    $_SESSION['daftarTiket'] =
        array_values($_SESSION['daftarTiket']);

    header("Location: index.php");

    exit;
}

?>