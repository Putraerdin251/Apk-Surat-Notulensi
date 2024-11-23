<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Aplikasi Notulensi BPS</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet"> -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">
  <link href="styles/style_dashboard.css" rel="stylesheet">
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
</style>

    </styl>
</head>

<body>
  <!-- Ini Adalah sidebar -->
  <div class="flex h-screen">
    <div class="sidebar">
      <ul>
        <!-- <header>
                <div class="image-text">
                </div>
            </header> -->
        <div class="mt-3 m-1">
          <img src="images/logo.png" alt="Logo" width="150">
        </div>
        <div class="mt-10">
          <li><a href="dashboard.php"><i class='bx bx-calendar icon'></i></a></li>
          <li><a href="dashboard_1.php"><i class='bx bx-plus-circle icon'></i> </a></li>
          <div class="mb-5">
            <li><a href="logout.php"><i class='bx bx-log-out icon'></i> </a></li>
          </div>
        </div>
      </ul>
    </div>


    <div class="flex-1 bg-gradient-to-br from-zinc-100 to-zinc-200 p-6 ">
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
        <ul class="space-y-0 col-span-4" id="notulensiList">
          <?php
          include 'Conf/config.php';
          $sql = "SELECT * FROM notulensi ORDER BY id DESC";
          $result = $koneksi->query($sql);

          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              echo '<li class="flex justify-between p-4 border border-zinc-300 rounded-md dark:border-zinc-600 dark:bg-zinc-800">';
              echo '<div class="flex items-center space-x-4" >';
              echo '<img src="https://openui.fly.dev/openui/24x24.svg?text=📄" alt="document icon" class="w-6 h-6" />';
              echo '<a href="template.php?id=' . $row['id'] . '">';
              echo '<span class="text-zinc-900 dark:text-zinc-100">' . $row['judul_rapat'] . '</span>';
              echo '<span class="text-zinc-600 dark:text-zinc-400 tanggal-rapat">' . date('d/m/Y', strtotime($row['tanggal_rapat'])). '</span>';
              echo '</a>';
              echo '</div>';
              echo '</li>';
            }
          } else {
            echo '<li class="p-4">Tidak ada notulensi yang tersedia.</li>';
          }
          $koneksi->close();
          ?>
        </ul>
      </div>
    </div>

  </div>
  <script>
    function searchNotulensi() {
      // Deklarasi variabel
      var input, filter, ul, li, a, i, txtValue;
      input = document.getElementById('searchInput');
      filter = input.value.toUpperCase();
      ul = document.getElementById("notulensiList");
      li = ul.getElementsByTagName('li');

      // Loop melalui semua item daftar, sembunyikan yang tidak cocok
      for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          li[i].style.display = "";
        } else {
          li[i].style.display = "none";
        }
      }
    }
  </script>
</body>

</html>