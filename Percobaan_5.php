<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Aplikasi Notulensi BPS</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet"> -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <script src="https://cdn.tailwindcss.com?plugins=forms,typography"></script>
  <script src="https://unpkg.com/unlazy@0.11.3/dist/unlazy.with-hashing.iife.js" defer init></script>

  <style>
    <?php include '../notulensi/styles/style_dashboard.css'; ?>
    @page {
    size: A4;
    margin: 2cm;
  }
  
  @media print {
    .page {
      margin: 0px;
      border: initial;
      border-radius: initial;
      width: initial;
      min-height: initial;
      box-shadow: initial;
      background: initial;
    }
  }
  
body,
p,
td,
span,
strong {
    font-family: 'Times New Roman';
    padding: 0;
    box-sizing: border-box;
    line-height: 1.5;
    font-size: .12p;
}

@media print {
    .foto-dokumentasi {
        page-break-before: always;
    }

    .container {
        page-break-inside: avoid;
        margin-bottom: 3rem;
    }

    .footer {
        page-break-after: always;
    }
}

.line-spacing-1 {
    line-height: 1em;
}

.paragraph-spacing-1 p {
    margin-bottom: 1em;
}

/* Add custom styles for the table */
.custom-table {
    table-layout: fixed;
    width: 100%;
}

.custom-table th,
.custom-table td {
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.custom-table img {
    max-width: 100%;
    height: auto;
    display: block;
    margin: 0 auto;
}

/* Custom styles for signature images */
.signature img {
    max-width: 140px;
    height: auto;
    display: block;
    margin: 0 auto;
}

.signature strong {
    display: block;
    margin-top: 10px;
}

.menu {
    position: fixed;
    bottom: 20px;
    right: 20px;
    z-index: 999;
}

.menu button {
    background-color: gray;
    color: white;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    outline: none;
    display: flex;
    align-items: center;
}
 
.menu button:hover {
    background-color: #48bb78;
}

.menu button svg {
    margin-right: 5px;
}

.menu button p {
    margin: 0;
    font-size: 14px;
}

    /* Responsiveness adjustments */
    @media (max-width: 1024px) {
      .ml-20,
      .mr-20 {
        margin-left: 10px;
        margin-right: 10px;
      }
      .card {
        width: calc(100% - 240px); /* Adjusted width to accommodate sidebar */
        max-width: 794px;
        height: auto; /* Automatically adjust height based on content */
      }
    }

    @media (max-width: 768px) {
      .flex {
        flex-direction: column;
      }
      .sidebar {
        order: -1; /* Move sidebar to the top in smaller screens */
      }
    }
  </style>
</head>

<body>
  <div class="flex h-screen">

    <!-- Sidebar  -->
    <?php include '../notulensi/includes/sidebar.php '; ?> <!-- Ini Adalah sidebar -->

    <!-- Bagian profil  -->
    <?php include '../notulensi/includes/bagian_profile.php '; ?> <!-- Ini Adalah profil -->

    <!--  tagline -->
    <?php include '../notulensi/includes/tagline.php '; ?> <!-- Ini Adalah tagline -->

    <!--  Template  -->
    <div class=" p-10 ml-20 mr-20 bg-white text-black card" style="width: 794px; height: 1123px">

      <?php
      include "Conf/config.php";
      $id = intval($_GET['id']);
      $query = mysqli_query($koneksi, "SELECT * FROM notulensi WHERE id = $id");
      if ($query) { // Pastikan query berhasil dieksekusi
        $data = mysqli_fetch_array($query);
        if ($data) {
      ?>
          <div>
            <img src="images/kop-surat.jpg" alt="Kop Surat" style="width: 100%; height: auto;">
            <!-- ini adalah template kop Suratnya -->
          </div>

          <hr class="card border-t-2 border-zinc-800 mb-3">

          <!--  Template isi Surat -->
          <div class="mb-4 line-spacing-1-5 paragraph-spacing-1-5">
              <p><?= $data['judul_rapat'] ?> Badan Pusat Statistik Kabupaten Subang</p>
              <div class="justify-center mx-10">
                <table>
                  <tr>
                    <td>
                      <p>Hari/Tanggal</p>
                    </td>
                    <td>
                      <span class="m-4">:</span>
                    </td>
                    <td>
                      <span class=" m-4"><?= strftime('%A, %d %B %Y', strtotime($data['tanggal_rapat'])) ?></span>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <p>Waktu</p>
                    </td>
                    <td>
                      <span class="m-4">:</span>
                    </td>
                    <td>
                      <span class="m-4"><?= substr($data['waktu_mulai'], 0, 5) ?> - <?= substr($data['waktu_selesai'], 0, 5) ?> WIB </span>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <p>Tempat</p>
                    </td>
                    <td>
                      <span class="m-4">:</span>
                    </td>
                    <td>
                      <span class=" m-4"><?= $data['tempat_rapat'] ?></span>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <p>Peserta</p>
                    </td>
                    <td>
                      <span class="m-4">:</span>
                    </td>
                    <td>
                      <span class=" m-4"><?= $data['peserta_rapat'] ?></span>
                    </td>
                  </tr>
                </table>
              </div>
            </div>
            <div class="mb-4">
              <strong>Hasil Notulensi:</strong>
              <span><br><?= $data['hasil_notulensi'] ?></span>
            </div>
            <div class="flex justify-between items-center mb-1">
              <div class="w-1/2 text-center signature">
                <div>Mengetahui</div>
                <div>Pemimpin Rapat</div>
                <div class="mt-5 flex justify-center">
                  <img src="<?= $data['ttd_pemimpin_rapat'] ?>" alt="Tanda Tangan Pemimpin Rapat">
                </div>
                <strong><?= $data['pemimpin_rapat'] ?></strong>
              </div>
              <div class="w-1/2 text-center signature">
                <div>Notulen</div>
                <div class="mt-8 flex justify-center">
                  <img src="<?= $data['ttd_notulen'] ?>" alt="Tanda Tangan Notulen">
                </div>
                <strong><?= $data['notulen'] ?></strong>
              </div>
            </div>
            <!-- Foto Dokumentasi dipindahkan ke halaman berikutnya saat print -->
            <div class="foto-dokumentasi">
              <strong>Foto Dokumentasi:</strong>
              <table class="custom-table border border-zinc-800 mt-2">
                <thead>
                  <tr>
                    <th class="border border-zinc-800 p-2">Foto Kegiatan</th>
                    <th class="border border-zinc-800 p-2">Keterangan</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach (json_decode($data['dokumentasi_kegiatan'], true) as $index => $foto): ?>
                    <tr id="foto-kegiatan-<?= $index + 1 ?>">
                      <td class="border border-zinc-800 p-2">
                        <img src="<?= $foto['foto'] ?>" alt="Foto Kegiatan <?= $index + 1 ?>" style="max-width: 200px; height: auto;">
                      </td>
                      <td class="border border-zinc-800 p-2">
                        <?= $foto['keterangan'] ?>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
      <?php
        } else {
          echo "<p>Data tidak ditemukan</p>";
        }
      } else {
        echo "<p>Query error: " . mysqli_error($koneksi) . "</p>";
      }
      mysqli_close($koneksi);
      ?>

    </div>
  </div>

  <!-- Menu untuk cetak halaman -->
  <div class="menu">
    <button onclick="window.print()">
      <i class="bx bx-printer icon"></i>
      <span> Cetak </span>
    </button>
  </div>
</body>

</html>