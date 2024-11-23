<?php 
include 'Conf/config.php';

// Pastikan id yang akan dihapus tersedia
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Persiapkan statement SQL DELETE
    $sql = "DELETE FROM notulensi WHERE id = ?";

    // Persiapkan statement menggunakan prepared statement
    if ($stmt = $koneksi->prepare($sql)) {
        // Bind parameter ke statement
        $stmt->bind_param("i", $id);

        // Eksekusi statement
        if ($stmt->execute()) {
            // Jika penghapusan berhasil
            echo "Data dengan ID $id berhasil dihapus.";
        } else {
            // Jika terjadi kesalahan saat eksekusi statement
            echo "Gagal menghapus data. Error: " . $stmt->error;
        }

        // Tutup statement
        $stmt->close();
    } else {
        // Jika gagal menyiapkan statement
        echo "Gagal menyiapkan statement SQL. Error: " . $koneksi->error;
    }
} else {
    // Jika parameter id tidak tersedia
    echo "ID tidak valid atau tidak tersedia.";
}

// Tutup koneksi ke database
$koneksi->close();
header("Location: dashboard.php"); 
?>