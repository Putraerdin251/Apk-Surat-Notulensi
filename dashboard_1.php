<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Aplikasi Notulensi BPS</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        <?php include '../notulensi/styles/style_dashboard.css'; ?>
        /* Custom Styles */
        body,
        html {
            height: 100%;
        }

        .d-flex {
            display: flex;
        }

        .h-screen {
            height: 100vh;
        }

        .main-content {
            flex: 1;
            padding: 20px; /* Tambahkan padding agar konten tidak bertabrakan */
            overflow-y: auto; /* Enable scrolling if content overflows */
        }

        .scrollbox {
            max-height: calc(100vh - 60px); /* Sesuaikan dengan tinggi maksimum layar, dikurangi dengan tinggi header */
            overflow-y: auto; /* Enable scrolling if content overflows */
        }

        /* Responsif pada layar kecil */
        @media (max-width: 768px) {
            .d-flex {
                flex-direction: column;
            }
            .sidebar {
                order: -1; /* Move sidebar to the top in smaller screens */
            }
        }

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
    </style>
</head>

<body>
    <div class="d-flex h-screen">

        <!-- Sidebar -->
        <?php include '../notulensi/includes/sidebar.php'; ?>

        <!-- Konten Utama -->
        <div class="main-content">
            <!-- Bagian Profil -->
            <?php include '../notulensi/includes/bagian_profile.php'; ?>
            <!-- Tagline -->
            <?php include '../notulensi/includes/tagline.php'; ?>

            <!-- Scrollbox -->
            <div class="scrollbox">
                <!-- Form Pengisian -->
                <?php include '../notulensi/includes/form_pengisian.php'; ?>
            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography"></script>
    <script src="https://unpkg.com/unlazy@0.11.3/dist/unlazy.with-hashing.iife.js" defer init></script>
    <script src="tinymce/tinymce/js/tinymce/tinymce.min.js"></script>

    <script>
        // JavaScript functions
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

        tinymce.init({
            selector: 'textarea#hasilNotulensi',
            height: 600,
            plugins: [
                'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                'searchreplace wordcount visualblocks visualchars code fullscreen',
                'insertdatetime media nonbreaking save table directionality',
                'emoticons template paste textpattern'
            ],
            toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | link image | code | fullscreen',
            content_style: 'body { font-family: Arial, sans-serif; font-size: 14px }'
        });

        function searchNotulensi() {
            var input, filter, ul, li, a, i, txtValue;
            input = document.getElementById('searchInput');
            filter = input.value.toUpperCase();
            ul = document.getElementById("notulensiList");
            li = ul.getElementsByTagName('li');

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

        function resetForm() {
            window.location.href = 'dashboard.php';
        }
    </script>
</body>

</html>
