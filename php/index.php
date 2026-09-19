<?php
session_start();

if (!isset($_SESSION['daftarTiket'])) {
    $_SESSION['daftarTiket'] = [
        [
            'idTiket' => 'T001',
            'namaFilm' => 'Interstellar',
            'studio' => 'Studio 1',
            'jamTayang' => '13:00',
            'nomorKursi' => 'A05',
            'harga' => 50000
        ],
        [
            'idTiket' => 'T002',
            'namaFilm' => 'Inside Out 2',
            'studio' => 'Studio 2',
            'jamTayang' => '15:30',
            'nomorKursi' => 'B10',
            'harga' => 45000
        ]
    ];
}

$daftarTiket = $_SESSION['daftarTiket'];

$cari = isset($_GET['cari']) ? $_GET['cari'] : '';

$dataTampil = [];

foreach ($daftarTiket as $tiket) {
    if ($cari == '' || stripos($tiket['idTiket'], $cari) !== false ||
        stripos($tiket['namaFilm'], $cari) !== false) {

        $dataTampil[] = $tiket;
    }
}

$totalTiket = count($daftarTiket);

$totalPendapatan = 0;

foreach ($daftarTiket as $tiket) {
    $totalPendapatan += $tiket['harga'];
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sistem Bioskop</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: #f6f7fb;
        }

        .sidebar {
            width: 240px;
            min-height: 100vh;
            background: #111827;
            position: fixed;
            left: 0;
            top: 0;
            padding: 25px 18px;
        }

        .brand {
            color: white;
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 40px;
            padding-left: 10px;
        }

        .brand span {
            color: #8b5cf6;
        }

        .menu-title {
            color: #6b7280;
            font-size: 12px;
            margin: 20px 10px 10px;
        }

        .menu-link {
            display: block;
            color: #9ca3af;
            text-decoration: none;
            padding: 12px 14px;
            border-radius: 10px;
            margin-bottom: 5px;
        }

        .menu-link:hover,
        .menu-link.active {
            background: #7c3aed;
            color: white;
        }

        .main {
            margin-left: 240px;
            padding: 30px;
        }

        .top-title h3 {
            font-weight: 700;
            margin-bottom: 5px;
        }

        .top-title p {
            color: #6b7280;
        }

        .stat-card {
            border: none;
            border-radius: 16px;
            padding: 20px;
            background: white;
            box-shadow: 0 3px 15px rgba(0,0,0,.04);
        }

        .stat-icon {
            width: 45px;
            height: 45px;
            border-radius: 12px;
            background: #ede9fe;
            color: #7c3aed;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        .stat-number {
            font-size: 24px;
            font-weight: 700;
        }

        .table-card {
            background: white;
            border-radius: 16px;
            padding: 24px;
            box-shadow: 0 3px 15px rgba(0,0,0,.04);
        }

        .table thead th {
            color: #6b7280;
            font-size: 13px;
            font-weight: 600;
            border-bottom: 1px solid #eee;
        }

        .table tbody td {
            vertical-align: middle;
            padding-top: 15px;
            padding-bottom: 15px;
        }

        .film-name {
            font-weight: 600;
        }

        .film-id {
            font-size: 12px;
            color: #9ca3af;
        }

        .badge-studio {
            background: #ede9fe;
            color: #6d28d9;
            padding: 7px 10px;
            border-radius: 8px;
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

        .empty-data {
            padding: 50px;
            text-align: center;
            color: #9ca3af;
        }
    </style>
</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">

    <div class="brand">
        DPBO<span>Bioskop</span>
    </div>

    <div class="menu-title">MENU UTAMA</div>

    <a href="index.php" class="menu-link active">
        🏠 Dashboard
    </a>

    <a href="#dataTiket" class="menu-link">
        🎟️ Data Tiket
    </a>

    <a href="#tambahTiket" class="menu-link">
        ➕ Tambah Tiket
    </a>

    <div class="menu-title">LAINNYA</div>

    <a href="#" class="menu-link">
        ⚙️ Pengaturan
    </a>

</div>


<!-- MAIN -->
<div class="main">

    <div class="top-title mb-4">
        <h3>Dashboard Bioskop</h3>
        <p>Kelola data tiket bioskop dengan mudah.</p>
    </div>


    <!-- STATISTIC -->
    <div class="row g-4 mb-4">

        <div class="col-md-4">
            <div class="stat-card">

                <div class="d-flex justify-content-between">

                    <div>
                        <div class="text-secondary small mb-2">
                            Total Tiket
                        </div>

                        <div class="stat-number">
                            <?= $totalTiket ?>
                        </div>
                    </div>

                    <div class="stat-icon">
                        🎟️
                    </div>

                </div>

            </div>
        </div>


        <div class="col-md-4">
            <div class="stat-card">

                <div class="d-flex justify-content-between">

                    <div>
                        <div class="text-secondary small mb-2">
                            Total Film
                        </div>

                        <div class="stat-number">
                            <?= $totalTiket ?>
                        </div>
                    </div>

                    <div class="stat-icon">
                        🎬
                    </div>

                </div>

            </div>
        </div>


        <div class="col-md-4">
            <div class="stat-card">

                <div class="d-flex justify-content-between">

                    <div>
                        <div class="text-secondary small mb-2">
                            Total Studio
                        </div>

                        <div class="stat-number">
                            10
                        </div>
                    </div>

                    <div class="stat-icon">
                        🎥
                    </div>

                </div>

            </div>
        </div>

    </div>


    <!-- DATA TIKET -->
    <div class="table-card mb-4" id="dataTiket">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>
                <h5 class="fw-bold mb-1">
                    Data Tiket
                </h5>

                <small class="text-secondary">
                    Daftar tiket yang tersedia
                </small>
            </div>

            <a href="#tambahTiket" class="btn btn-purple">
                + Tambah Tiket
            </a>

        </div>


        <!-- SEARCH -->
        <form method="GET" class="mb-3">

            <div class="input-group">

                <input
                    type="text"
                    name="cari"
                    class="form-control"
                    placeholder="Cari ID tiket atau nama film..."
                    value="<?= htmlspecialchars($cari) ?>"
                >

                <button class="btn btn-dark">
                    Cari
                </button>

            </div>

        </form>


        <div class="table-responsive">

            <table class="table">

                <thead>

                    <tr>
                        <th>ID</th>
                        <th>Film</th>
                        <th>Studio</th>
                        <th>Jam</th>
                        <th>Kursi</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>

                </thead>

                <tbody>

                <?php if (count($dataTampil) > 0): ?>

                    <?php foreach ($dataTampil as $tiket): ?>

                        <tr>

                            <td>
                                <span class="badge bg-light text-dark">
                                    <?= $tiket['idTiket'] ?>
                                </span>
                            </td>

                            <td>

                                <div class="film-name">
                                    <?= htmlspecialchars($tiket['namaFilm']) ?>
                                </div>

                            </td>

                            <td>
                                <span class="badge-studio">
                                    <?= htmlspecialchars($tiket['studio']) ?>
                                </span>
                            </td>

                            <td>
                                <?= $tiket['jamTayang'] ?>
                            </td>

                            <td>
                                <?= $tiket['nomorKursi'] ?>
                            </td>

                            <td class="fw-semibold">
                                Rp <?= number_format($tiket['harga'], 0, ',', '.') ?>
                            </td>

                            <td>

                                <a
                                    href="tiket.php?aksi=edit&id=<?= $tiket['idTiket'] ?>"
                                    class="btn btn-sm btn-outline-primary"
                                >
                                    Edit
                                </a>

                                <a
                                    href="proses.php?aksi=hapus&id=<?= $tiket['idTiket'] ?>"
                                    class="btn btn-sm btn-outline-danger"
                                    onclick="return confirm('Yakin ingin menghapus tiket ini?')"
                                >
                                    Hapus
                                </a>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                <?php else: ?>

                    <tr>
                        <td colspan="7">

                            <div class="empty-data">
                                Data tiket tidak ditemukan.
                            </div>

                        </td>
                    </tr>

                <?php endif; ?>

                </tbody>

            </table>

        </div>

    </div>


    <!-- FORM TAMBAH -->
    <div class="table-card" id="tambahTiket">

        <h5 class="fw-bold mb-1">
            Tambah Tiket
        </h5>

        <p class="text-secondary mb-4">
            Masukkan data tiket baru.
        </p>

        <form action="proses.php" method="POST">

            <input type="hidden" name="aksi" value="tambah">

            <div class="row g-3">

                <div class="col-md-6">

                    <label class="form-label">
                        ID Tiket
                    </label>

                    <input
                        type="text"
                        name="idTiket"
                        class="form-control"
                        placeholder="Contoh: T003"
                        required
                    >

                </div>


                <div class="col-md-6">

                    <label class="form-label">
                        Nama Film
                    </label>

                    <input
                        type="text"
                        name="namaFilm"
                        class="form-control"
                        placeholder="Nama film"
                        required
                    >

                </div>


                <div class="col-md-6">

                    <label class="form-label">
                        Studio
                    </label>

                    <input
                        type="text"
                        name="studio"
                        class="form-control"
                        placeholder="Contoh: Studio 1"
                        required
                    >

                </div>


                <div class="col-md-6">

                    <label class="form-label">
                        Jam Tayang
                    </label>

                    <input
                        type="time"
                        name="jamTayang"
                        class="form-control"
                        required
                    >

                </div>


                <div class="col-md-6">

                    <label class="form-label">
                        Nomor Kursi
                    </label>

                    <input
                        type="text"
                        name="nomorKursi"
                        class="form-control"
                        placeholder="Contoh: A05"
                        required
                    >

                </div>


                <div class="col-md-6">

                    <label class="form-label">
                        Harga
                    </label>

                    <input
                        type="number"
                        name="harga"
                        class="form-control"
                        placeholder="50000"
                        min="0"
                        required
                    >

                </div>

            </div>


            <div class="mt-4">

                <button type="submit" class="btn btn-purple px-4">
                    Simpan Tiket
                </button>

            </div>

        </form>

    </div>

</div>

</body>
</html>