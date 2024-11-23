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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>

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

        <div class="flex justify-between items-center mb-1"></div>
                
        <!-- <div class="main-content"> -->
        <?php include '../notulensi/includes/form_pengisian.php '; ?> <!-- Ini Adalah formulir pengsian  -->

    </div>

        <!-- Load jQuery, Popper.js, Bootstrap JS -->
        
        <script>
            function showFileName(input) {
                var fileName = input.files[0].name;
                $(input).next('.custom-file-label').html(fileName);
            }

            function addMore() {
                var dokumentasiHtml = `<div class="form-group">
                                        <label for="dokumentasiKegiatan">Dokumentasi Kegiatan</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="dokumentasiKegiatan" name="dokumentasi_kegiatan[]" onchange="showFileName(this)" multiple>
                                            <label class="custom-file-label" for="dokumentasiKegiatan">Choose file</label>
                                        </div>
                                    </div>`;

                var keteranganHtml = `<div class="form-group">
                                        <label for="keterangan">Keterangan</label>
                                        <input type="text" class="form-control keterangan" name="keterangan[]" placeholder="Keterangan Kegiatan">
                                    </div>`;

                $('#dokumentasiFilesLeft').append(dokumentasiHtml);
                $('#keteranganFilesLeft').append(keteranganHtml);
            }

            $(document).ready(function() {
                $('#hasilNotulensi').summernote({
                    height: 600, // tinggi editor
                    placeholder: 'Masukkan Hasil Notulensi di sini...',
                    toolbar: [
                        ['style', ['bold', 'italic', 'underline', 'clear']],
                        ['font', ['strikethrough', 'superscript', 'subscript']],
                        ['fontsize', ['fontsize']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['height', ['height']]
                    ]
                });
            });
        </script>
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