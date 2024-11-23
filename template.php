
<style>
    <?php include '../notulensi/styles/style_dashboard.css'; ?>
    <?php include '../notulensi/styles/template.css'; ?>

    /* @media print {
      .foto-dokumentasi,
      .custom-table {
        page-break-inside: avoid; /* Hindari pemisahan halaman di dalam tabel dan div lainnya 
      }
    } */
  </style>

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
  <div class="flex h-screen ">

    <!-- Sidebar  -->
    <?php include '../notulensi/includes/sidebar.php '; ?> <!-- Ini Adalah sidebar -->

    <!-- Bagian profil  -->
    <?php include '../notulensi/includes/bagian_profile.php '; ?> <!-- Ini Adalah profil -->

    <!--  tagline -->
    <?php include '../notulensi/includes/tagline.php '; ?> <!-- Ini Adalah tagline -->

    <!--  Template  -->
    <div class="p-5 ml-20 mr-20 bg-white border border-white text-black card" style="width: 794px; height: 1123px overflow: hidden; position: relative;">

      <?php
      include "Conf/config.php";
      $id = intval($_GET['id']);
      $query = mysqli_query($koneksi, "SELECT * FROM notulensi WHERE id = $id");
      if ($query) { // Pastikan query berhasil dieksekusi
        $data = mysqli_fetch_array($query);
        if ($data) {
      ?>
      
          <div>
            <!-- ini adalah template kop Suratnya -->
            <img src="images/kop-surat.jpg" alt="Kop Surat" style="width: 80%; height: 100%;">
            <!-- ini adalah template kop Suratnya -->
          </div>

          <hr class="card border-t-2 border-zinc-800 mb-3">

          <!--  Template isi Surat -->
          <?php include '../notulensi/includes/template_isi_surat.php'; ?> <!-- Ini Adalah Template isi Surat -->
          

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