<?php
// Include file konfigurasi koneksi
include 'Conf/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $judul_rapat = $_POST['judul_rapat'];
    $tanggal_rapat = $_POST['tanggal_rapat'];
    $waktu_mulai = $_POST['waktu_mulai'];
    $waktu_selesai = $_POST['waktu_selesai'];
    $tempat_rapat = $_POST['tempat_rapat'];
    $peserta_rapat = $_POST['peserta_rapat'];
    $jabatan = $_POST['jabatan'];
    $pemimpin_rapat = $_POST['pemimpin_rapat'];
    $notulen = $_POST['notulen'];
    $hasil_notulensi = $_POST['hasil_notulensi'];

    // Proses upload file tanda tangan pemimpin rapat
    $ttd_pemimpin_rapat = '';
    if (isset($_FILES['ttd_pimpinan_rapat']) && $_FILES['ttd_pimpinan_rapat']['error'] == 0) {
        $ttd_pemimpin_rapat = 'images/' . basename($_FILES['ttd_pimpinan_rapat']['name']);
        move_uploaded_file($_FILES['ttd_pimpinan_rapat']['tmp_name'], $ttd_pemimpin_rapat);
    }

    // Proses upload file tanda tangan notulen
    $ttd_notulen = '';
    if (isset($_FILES['ttd_notulen']) && $_FILES['ttd_notulen']['error'] == 0) {
        $ttd_notulen = 'images/' . basename($_FILES['ttd_notulen']['name']);
        move_uploaded_file($_FILES['ttd_notulen']['tmp_name'], $ttd_notulen);
    }

    // Proses upload file dokumentasi kegiatan
    $dokumentasi_kegiatan = [];
    $keterangan = [];
    if (isset($_FILES['dokumentasi_kegiatan'])) {
        foreach ($_FILES['dokumentasi_kegiatan']['name'] as $key => $value) {
            if ($_FILES['dokumentasi_kegiatan']['error'][$key] == 0) {
                $dokumentasi_kegiatan_path = 'images/' . basename($_FILES['dokumentasi_kegiatan']['name'][$key]);
                move_uploaded_file($_FILES['dokumentasi_kegiatan']['tmp_name'][$key], $dokumentasi_kegiatan_path);
                $dokumentasi_kegiatan[] = $dokumentasi_kegiatan_path;
                $keterangan[] = $_POST['keterangan'][$key] ?? '';
            }
        }
    }

    // Encode array $dokumentasi_kegiatan dan $keterangan menjadi JSON
    $dokumentasi_kegiatan_json = json_encode($dokumentasi_kegiatan);
    $keterangan_json = json_encode($keterangan);

    // Query untuk menyimpan data
    $sql = "INSERT INTO notulensi (judul_rapat, tanggal_rapat, waktu_mulai, waktu_selesai, tempat_rapat, peserta_rapat, jabatan, pemimpin_rapat, ttd_pemimpin_rapat, notulen, ttd_notulen, hasil_notulensi, dokumentasi_kegiatan, keterangan)
            VALUES ('$judul_rapat', '$tanggal_rapat', '$waktu_mulai', '$waktu_selesai', '$tempat_rapat', '$peserta_rapat', '$jabatan', '$pemimpin_rapat', '$ttd_pemimpin_rapat', '$notulen', '$ttd_notulen', '$hasil_notulensi', '$dokumentasi_kegiatan_json', '$keterangan_json')";

    if ($koneksi->query($sql) === TRUE) {
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
}
?>
