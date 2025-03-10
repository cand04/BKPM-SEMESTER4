<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Form</title>
</head>
<body>

    <h1>Upload File</h1>

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

    <form action="{{ route('upload.proses') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="file">Pilih File:</label>
        <input type="file" name="file" id="file" required><br><br>

        <label for="keterangan">Keterangan:</label>
        <input type="text" name="keterangan" id="keterangan" required><br><br>

        <button type="submit">Upload</button>
    </form>

    <h1>Resize and Upload Image</h1>

    <form action="{{ route('upload.resize') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="file">Pilih File Gambar:</label>
        <input type="file" name="file" id="file" required><br><br>

        <label for="keterangan">Keterangan:</label>
        <input type="text" name="keterangan" id="keterangan" required><br><br>

        <button type="submit">Resize dan Upload</button>
    </form>

</body>
</html>
