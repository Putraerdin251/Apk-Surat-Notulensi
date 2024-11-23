<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Aplikasi Notulensi BPS</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <script src="https://cdn.tailwindcss.com?plugins=forms,typography"></script>
  <script src="https://unpkg.com/unlazy@0.11.3/dist/unlazy.with-hashing.iife.js" defer init></script>
  <style>
    <?php include '../notulensi/styles/style_dashboard.css';?>
    
    .tanggal-rapat {
        position: block;
        right: 1rem; /* Atur jarak dari kanan sesuai kebutuhan Anda */
        top: 50%; /* Menengahkan vertikalnya */
        margin-right: 10px;
        transform: translateY(-50%);
    }

    .scrollbox {
        max-height: 400px; /* Atur tinggi maksimum sesuai kebutuhan Anda */
        overflow-y: auto; /* Tambahkan scrollbar vertikal jika konten terlalu panjang */
    }
  </style>
</head>

<body>
  <!-- Ini Adalah sidebar -->
  <div class="flex h-screen">
    
    <div class="sidebar">
      <ul>
        <div class="mt-3 m-1">
          <img src="images/logo.png" alt="Logo" width="150">
        </div>
        <div class="mt-10">
          <li><a href="dashboard.php"><i class='bx bx-calendar icon'></i></a></li>
          <li><a href="dashboard_1.php"><i class='bx bx-plus-circle icon'></i></a></li>
          <div class="mb-5">
            <li><a href="logout.php"><i class='bx bx-log-out icon'></i></a></li>
          </div>
        </div>
      </ul>
    </div>

    <div class="flex-1 bg-gradient-to-br from-zinc-100 to-zinc-200 p-6">
      <div class="flex justify-between items-center bg-zinc-700 text-white p-4 rounded-lg mb-6">
        <div class="text-xl font-bold">My Profil</div>
        <img src="images/logo.png" alt="Profile Picture" class="rounded-full w-14">
      </div>

      <div class="bg-white p-6 rounded-lg shadow-md flex items-center mb-6">
        <div class="flex-1">
          <h1 class="text-2xl font-bold">Selamat Datang DI Digital Notes</h1>
          <h2 class="text-lg text-yellow-500">BPS Kabupaten Subang</h2>
          <p class="text-black">Disini Kamu Bisa Membuat Notulensi Secara Mudah Dan Efisien</p>
        </div>
        <div class="search-container">
          <i class="bx bx-search icon"></i><input type="text" id="searchInput" onkeyup="searchNotulensi()" placeholder="Cari judul rapat...">
        </div>
      </div>

      <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold">Notulensi</h2>
        <i class='bx bx-filter icon'></i>
      </div>

      <div class="grid grid-cols-4 gap-4">
    <?php
    include 'Conf/config.php';
    $sql = "SELECT * FROM notulensi ORDER BY id DESC";
    $result = $koneksi->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            ?>
            <div class="col-span-4 md:col-span-2 lg:col-span-1 scrollbox">
                <div class="border border-zinc-300 rounded-md dark:border-zinc-600 dark:bg-zinc-800 p-4 mb-4">
                <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Anda yakin ingin menghapus notulensi ini?')" class="text-red-500 hover:text-red-900">
                <i class='bx bx-trash'></i> Hapus
                    <h2 class="text-lg font-medium mb-2">
                        <a href="template.php?id=<?= $row['id'] ?>" class="text-blue-600 hover:underline"><?= $row['judul_rapat'] ?></a>
                    </h2>
                    <p class="text-sm text-zinc-600 dark:text-zinc-400">Tanggal Buat : <?= date('d/m/Y', strtotime($row['tanggal_rapat'])) ?></p>
                    
                </div>
            </div>
            <?php
        }
    } else {
        echo '<div class="col-span-4">';
        echo '<p class="text-zinc-900 dark:text-zinc-100 p-4">Tidak ada data rapat.</p>';
        echo '</div>';
    }
    ?>
</div>


  <script>
  function searchNotulensi() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("notulensiList");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
    var found = false; // Variable to track if any results are found

    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[0]; // Ambil sel pertama (judul rapat)
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
          found = true; // Set to true if a match is found
        } else {
          tr[i].style.display = "none";
        }
      }
    }

    // Tampilkan pesan jika tidak ada hasil yang cocok
    if (!found) {
      var noResultsRow = document.createElement("tr");
      var noResultsCell = document.createElement("td");
      noResultsCell.setAttribute("colspan", "2");
      noResultsCell.textContent = "Tidak ada hasil yang cocok dengan pencarian.";
      noResultsRow.appendChild(noResultsCell);
      table.appendChild(noResultsRow);
    }
  }
  </script>

</body>
<?php include '../notulensi/Includes/Footer.php';?>
</html>
