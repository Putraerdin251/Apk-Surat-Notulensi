$(document).ready(function() {
    $('#hasilNotulensi').summernote({
        height: 200,  // tinggi editor
        placeholder: 'Masukkan Hasil Notulensi',  // teks placeholder
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']]
        ]
    });
});
