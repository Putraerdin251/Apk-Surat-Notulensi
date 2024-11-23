function addMore() {
                // Dokumentasi Kegiatan
                var dokumentasiHtml = '<div class="custom-file mt-2">';
                dokumentasiHtml += '<input type="file" class="custom-file-input" name="dokumentasi_kegiatan[]" onchange="showFileName(this)" multiple>';
                dokumentasiHtml += '<label class="custom-file-label">Choose file</label>';
                dokumentasiHtml += '</div>';
                document.getElementById('dokumentasiFilesLeft').innerHTML += dokumentasiHtml;

                // Keterangan
                var keteranganHtml = '<div class="form-group mt-2">';
                keteranganHtml += '<input type="text" class="form-control keterangan" name="keterangan[]" placeholder="Keterangan Kegiatan">';
                keteranganHtml += '</div>';
                document.getElementById('keteranganFilesLeft').innerHTML += keteranganHtml;
                
            }