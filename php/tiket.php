<?php

session_start();

$id = isset($_GET['id']) ? $_GET['id'] : '';

$tiketDipilih = null;

foreach ($_SESSION['daftarTiket'] as $tiket) {

    if ($tiket['idTiket'] == $id) {
        $tiketDipilih = $tiket;
        break;
    }
}

if ($tiketDipilih == null) {
    header("Location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <title>Edit Tiket</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>

        body {
            font-family: 'Inter', sans-serif;
            background: #f6f7fb;
        }

        .container-box {
            max-width: 800px;
            margin: 60px auto;
        }

        .card {
            border: none;
            border-radius: 18px;
            padding: 30px;
            box-shadow: 0 5px 20px rgba(0,0,0,.05);
        }

        .btn-purple {
            background: #7c3aed;
            color: white;
            border: none;
        }

        .btn-purple:hover {
            background: #6d28d9;
            color: white;
        }

    </style>

</head>

<body>

<div class="container-box">

    <div class="card">

        <h3 class="fw-bold">
            Edit Data Tiket
        </h3>

        <p class="text-secondary mb-4">
            Ubah informasi tiket yang dipilih.
        </p>

        <form action="proses.php" method="POST">

            <input type="hidden" name="aksi" value="update">

            <input
                type="hidden"
                name="idLama"
                value="<?= $tiketDipilih['idTiket'] ?>"
            >

            <div class="mb-3">

                <label class="form-label">
                    ID Tiket
                </label>

                <input
                    type="text"
                    class="form-control"
                    value="<?= $tiketDipilih['idTiket'] ?>"
                    disabled
                >

            </div>


            <div class="mb-3">

                <label class="form-label">
                    Nama Film
                </label>

                <input
                    type="text"
                    name="namaFilm"
                    class="form-control"
                    value="<?= htmlspecialchars($tiketDipilih['namaFilm']) ?>"
                    required
                >

            </div>


            <div class="mb-3">

                <label class="form-label">
                    Studio
                </label>

                <input
                    type="text"
                    name="studio"
                    class="form-control"
                    value="<?= htmlspecialchars($tiketDipilih['studio']) ?>"
                    required
                >

            </div>


            <div class="mb-3">

                <label class="form-label">
                    Jam Tayang
                </label>

                <input
                    type="time"
                    name="jamTayang"
                    class="form-control"
                    value="<?= $tiketDipilih['jamTayang'] ?>"
                    required
                >

            </div>


            <div class="mb-3">

                <label class="form-label">
                    Nomor Kursi
                </label>

                <input
                    type="text"
                    name="nomorKursi"
                    class="form-control"
                    value="<?= $tiketDipilih['nomorKursi'] ?>"
                    required
                >

            </div>


            <div class="mb-4">

                <label class="form-label">
                    Harga
                </label>

                <input
                    type="number"
                    name="harga"
                    class="form-control"
                    value="<?= $tiketDipilih['harga'] ?>"
                    min="0"
                    required
                >

            </div>


            <button class="btn btn-purple">
                Simpan Perubahan
            </button>

            <a href="index.php" class="btn btn-light">
                Batal
            </a>

        </form>

    </div>

</div>

</body>
</html>