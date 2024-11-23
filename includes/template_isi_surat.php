<div class="mb-1 line-spacing-1-5 paragraph-spacing-1-5">
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
                    <span class="m-4">
                        <?php
                        // Mendapatkan nama hari dalam bahasa Indonesia
                        $nama_hari = date('N', strtotime($data['tanggal_rapat']));
                        switch ($nama_hari) {
                            case 1: $nama_hari = 'Senin'; break;
                            case 2: $nama_hari = 'Selasa'; break;
                            case 3: $nama_hari = 'Rabu'; break;
                            case 4: $nama_hari = 'Kamis'; break;
                            case 5: $nama_hari = 'Jumat'; break;
                            case 6: $nama_hari = 'Sabtu'; break;
                            case 7: $nama_hari = 'Minggu'; break;
                            default: $nama_hari = 'Hari'; break; // Default jika tidak cocok
                        }
                        $nama_bulan = date('N', strtotime($data['tanggal_rapat']));
                        switch ($nama_bulan) {
                            case 1: $nama_bulan = 'Januari'; break;
                            case 2: $nama_bulan = 'Februari'; break;
                            case 3: $nama_bulan = 'Maret'; break;
                            case 4: $nama_bulan = 'April'; break;
                            case 5: $nama_bulan = 'Mei'; break;
                            case 6: $nama_bulan = 'Juni'; break;
                            case 7: $nama_bulan = 'Juli'; break;
                            case 8: $nama_bulan = 'Agustus'; break;
                            case 9: $nama_bulan = 'September'; break;
                            case 10: $nama_bulan = 'Oktorber'; break;
                            case 11: $nama_bulan = 'november'; break;
                            case 12: $nama_bulan = 'Desember'; break;
                            default: $nama_bulan = 'Bulan'; break; // Default jika tidak cocok
                        }

                        // Tampilkan hari dan tanggal dalam format bahasa Indonesia
                        echo $nama_hari . ', ' . date('d', strtotime($data['tanggal_rapat'])) .' '. $nama_bulan . ' ' .date('Y', strtotime($data['tanggal_rapat']));
                        ?>
                    </span>                    </td>
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
            <br>
            <div class="mb-4">
              <strong>Hasil Notulensi:</strong>
              <div class="notulensi">
                <span><br><?= $data['hasil_notulensi'] ?></span>
              </div>
            </div>
            <div class="flex justify-between items-center mb-1">
              <div class="w-1/2 text-center signature">
                <div>Mengetahui</div>
                <div><?= $data['jabatan'] ?></div>
                <div class="mt-5 flex justify-center">
                  <img src="<?= $data['ttd_pemimpin_rapat'] ?>" alt="Tanda Tangan Pemimpin Rapat">
                </div>
                <strong><?= $data['pemimpin_rapat'] ?></strong>
              </div>
              <div class="w-1/2 text-center signature">
                <div>Notulen</div>
                <div class="mt-5 flex justify-center">
                  <img src="<?= $data['ttd_notulen'] ?>" alt="Tanda Tangan Notulen">
                </div>
                <strong><?= $data['notulen'] ?></strong>
              </div>
            </div>
            <!-- Foto Dokumentasi dipindahkan ke halaman berikutnya saat print -->
            <div class="page-break m-0 mt-3 foto-dokumentasi">
              <strong>Foto Dokumentasi:<?= $data['judul_rapat'] ?></strong>
              <br>
              <table class="custom-table border border-zinc-800 mt-2">
                <thead>
                  <tr>
                    <th class="border border-zinc-800 p-2">Foto Kegiatan</th>
                    <th class="border border-zinc-800 p-2">Keterangan</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  // Dekode JSON dan loop untuk menampilkan setiap foto kegiatan dan keterangan
                  $dokumentasi_kegiatan = json_decode($data['dokumentasi_kegiatan'], true);
                  $keterangan = json_decode($data['keterangan'], true);
              
                  if (!empty($dokumentasi_kegiatan)) {
                      foreach ($dokumentasi_kegiatan as $index => $foto) {
                          ?>
                          <tr>
                              <td class="border border-zinc-800 p-2">
                                  <img src="<?= $foto ?>" alt="Foto Kegiatan" width="150">
                              </td>
                              <td class="border border-zinc-800 p-2">
                                  <?= isset($keterangan[$index]) ? $keterangan[$index] : '' ?> 
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