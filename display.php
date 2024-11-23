<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>
    <table class="">
        <div class="">
            <div class="tampilan">
                <table cellpadding="2">
                    <tr bgcolor="blue">
                        <td width="90" color="red"></td>
                    </tr>
                    <tr>
                        <td>
                            <?php
                            include "save_notulensi.php"; ?>
                            <?php $query = mysqli_query($koneksi, "SELECT * FROM notulensi ORDER BY id DESC LIMIT 5");
                            while ($data = mysqli_fetch_array($query)) {
                            ?>
                                <table>
                                    <tr class="">
                                        <td><?= $data['judul_rapat'] ?></td>
                                        <!-- <td><?= $data['tanggal_rapat'] ?></td>
                            <td><?= $data['waktu_mulai'] ?></td>
                            <td><?= $data['waktu_selesai'] ?></td>
                            <td><?= $data['tempat_rapat'] ?></td>
                            <td><?= $data['peserta_rapat'] ?></td>
                            <td><?= $data['pemimpin_rapat'] ?></td>
                            <td><?= $data['notulen'] ?></td>
                            <td><?= $data['hasil_notulensi'] ?></td>
                            <td><?= $data['dokumentasi_kegiatan'] ?></td>
                            <td><?= $data['ttd_pemimpin_rapat'] ?></td>
                            <td><?= $data['ttd_notulen'] ?></td> -->
                                    </tr>

                                </table>

                            <?php
                            }
                            ?>
                    </tr>
                    </td>
                </table>
            </div>
        </div>
    </table>
</body>

</html>