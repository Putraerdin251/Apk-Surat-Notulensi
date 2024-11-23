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
    <?php include '../notulensi/styles/template.css'; ?>
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


      <div class="p-10 ml-20 mr-20 bg-white text-black card" style="width: 794px; height: 1123px">
        <?php
        include "Conf/config.php";
        $id = intval($_GET['id']);
        $query = mysqli_query($koneksi, "SELECT * FROM notulensi WHERE id = $id");
        if ($query) { // Pastikan query berhasil dieksekusi
          $data = mysqli_fetch_array($query);
          if ($data) {
        ?>
            <div>
              <img src="images/kop-surat.jpg" alt="Kop Surat" width="600" height="auto">
            </div>
            <hr class="border-t-2 border-zinc-800 mb-4">
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
                  <?php
                  // Decode JSON untuk mendapatkan array dokumentasi kegiatan
                  $dokumentasi_kegiatan = json_decode($data['dokumentasi_kegiatan'], true);

                  // Loop untuk menampilkan setiap foto kegiatan dan keterangan
                  if (!empty($dokumentasi_kegiatan)) {
                    foreach ($dokumentasi_kegiatan as $item) {
                  ?>
                      <tr>
                        <td class="border border-zinc-800 p-2">
                          <img src="<?= $item['foto'] ?>" alt="Foto Kegiatan" width="150">
                        </td>
                        <td class="border border-zinc-800 p-2">
                          <?= $item['keterangan'] ?>
                        </td>
                      </tr>
                  <?php
                    }
                  } else {
                    echo "<tr><td colspan='2'>Tidak ada dokumentasi kegiatan.</td></tr>";
                  }
                  ?>
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
        <span>Cetak</span>
      </button>
    </div>
</body>

</html>