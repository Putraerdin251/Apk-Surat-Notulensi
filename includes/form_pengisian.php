<div class="card ml-5 mr-5 mb-8">
            <div class="card-body">
                <form action="save_notulensi.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="judulRapat">Judul Rapat</label>
                                <input type="text" class="form-control" id="judulRapat" name="judul_rapat"
                                    placeholder="Masukkan Judul Rapat">
                            </div>
                            <div class="form-group">
                                <label for="tanggalRapat">Hari/Tanggal</label>
                                <input type="date" class="form-control" id="tanggalRapat" name="tanggal_rapat">
                            </div>
                            <!-- <div class="form-group">
                                <label for="waktuMulai">Waktu Mulai</label>
                                <input type="time" class="form-control" id="waktuMulai" name="waktu_mulai">
                            </div>
                            <div class="form-group">
                                <label for="waktuSelesai">Waktu Selesai</label>
                                <input type="time" class="form-control" id="waktuSelesai" name="waktu_selesai">
                            </div> -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="waktuMulai">Waktu Mulai</label>
                                        <div class="input-group">
                                            <input type="time" class="form-control" id="waktuMulai" name="waktu_mulai">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="waktuSelesai">Waktu Selesai</label>
                                        <div class="input-group">
                                            <input type="time" class="form-control" id="waktuSelesai" name="waktu_selesai">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tempatRapat">Tempat</label>
                                <input type="text" class="form-control" id="tempatRapat" name="tempat_rapat"
                                    placeholder="Masukkan Tempat Rapat">
                            </div>

                            <div class="form-group">
                                <label for="pesertaRapat">Peserta</label>
                                <input type="text" class="form-control" id="pesertaRapat" name="peserta_rapat"
                                    placeholder="Masukkan Peserta Rapat">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jabatan">Jabatan</label>
                                <input type="text" class="form-control" id="jabatan" name="jabatan"
                                    placeholder="Masukkan Jabatan">
                            </div>
                            <div class="form-group">
                                <label for="pemimpinRapat">Pemimpin Rapat</label>
                                <input type="text" class="form-control" id="pemimpinRapat" name="pemimpin_rapat"
                                    placeholder="Masukkan Nama Pemimpin Rapat">
                            </div>
                            <div class="form-group">
                                <label for="ttdpimpinanrapat">Tanda Tangan Pemimpin Rapat</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="ttdpimpinanrapat"
                                        name="ttd_pimpinan_rapat" onchange="showFileName(this)">
                                    <label class="custom-file-label" for="ttdpimpinanrapat">Choose file</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="notulen">Notulen</label>
                                <input type="text" class="form-control" id="notulen" name="notulen"
                                    placeholder="Masukkan Nama Notulensi">
                            </div>
                            <div class="form-group">
                                <label for="ttdnotulen">Tanda Tangan Notulen</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="ttdnotulen"
                                        name="ttd_notulen" onchange="showFileName(this)">
                                    <label class="custom-file-label" for="ttdnotulen">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="hasilNotulensi">Hasil Notulensi</label>
                        <textarea class="form-control" id="hasilNotulensi" name="hasil_notulensi"
                            placeholder="Masukkan Hasil Notulensi"></textarea>
                    </div>

                    <!-- Dokumentasi Kegiatan dan Keterangan -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="dokumentasiKegiatan">Dokumentasi Kegiatan</label>
                                <div id="dokumentasiFilesLeft">
                                    <div class="custom-file mt-2">
                                        <input type="file" class="custom-file-input" id="dokumentasiKegiatan"
                                            name="dokumentasi_kegiatan[]" onchange="showFileName(this)" multiple>
                                        <label class="custom-file-label" for="dokumentasiKegiatan">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <div id="keteranganFilesLeft">
                                    <div class="form-group mt-2">
                                        <input type="text" class="form-control keterangan" name="keterangan[]"
                                            placeholder="Keterangan Kegiatan">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Button Add More and Save/Cancel -->
                    <button type="button" class="btn btn-primary mr-2" onclick="addMore()">Add More</button>
                    <div class="row justify-content-end">
                        <div class="col-md-6 text-right">
                            <button type="submit" class="btn btn-primary mr-2" name="proses">Save</button>
                            <button type="button" class="btn btn-secondary" onclick="resetForm()">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
