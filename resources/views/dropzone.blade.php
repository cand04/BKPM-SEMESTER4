<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Gambar dengan Dropzone di Laravel</title>

    <!-- CSS Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS Dropzone -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!-- JS Dropzone -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Upload Gambar dengan Dropzone di Laravel</h1>
                <br>

                <!-- Form Upload Gambar -->
                <form action="{{ route('dropzone.store') }}" method="post" name="file" enctype="multipart/form-data" class="dropzone" id="image-upload">
                    @csrf
                    <div>
                        <h3 class="text-center">Unggah Beberapa Gambar</h3>
                    </div>
                </form>

                <!-- Tombol Upload -->
                <button type="button" id="button" class="btn btn-primary">Unggah</button>
            </div>
        </div>
    </div>

    <!-- Konfigurasi Javascript untuk Dropzone -->
    <script type="text/javascript">
        Dropzone.options.imageUpload = {
            maxFilesize: 10,  // Maksimal ukuran file 10MB
            acceptedFiles: ".jpeg, .jpg, .png, .gif",  // Hanya menerima file gambar tertentu
            addRemoveLinks: true,  // Menampilkan link untuk menghapus file
            createImageThumbnails: true,  // Membuat thumbnail gambar
            autoProcessQueue: false,  // Jangan proses otomatis
            init: function () {
                var myDropzone = this;

                // Aksi ketika tombol upload diklik
                $("#button").click(function (e) {
                    e.preventDefault();
                    myDropzone.processQueue();  // Proses antrean file
                });

                // Menambahkan data form saat mengirim file
                this.on('sending', function(file, xhr, formData) {
                    var data = $('#image-upload').serializeArray();  // Ambil data form
                    $.each(data, function(key, el) {
                        formData.append(el.name, el.value);  // Tambahkan data form ke formData Dropzone
                    });
                });
            }
        };
    </script>
</body>
</html>
