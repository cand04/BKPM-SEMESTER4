<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Form</title>
</head>
<body>

    <h1>Upload File Dengan Laravel</h1>

    @if(session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div style="color: red;">
            {{ session('error') }}
        </div>
    @endif

    <!-- Form untuk resize dan upload image -->
    <form action="{{ route('upload.resize') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="file">Pilih File Gambar:</label>
        <input type="file" name="file" id="file" required><br><br>

        <label for="keterangan">Keterangan:</label>
        <input type="text" name="keterangan" id="keterangan" required><br><br>

        <button type="submit">Upload</button>
    </form>

</body>
</html>
