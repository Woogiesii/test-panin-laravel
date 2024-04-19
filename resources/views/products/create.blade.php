<!-- Form untuk menambahkan produk baru -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk Baru</title>
</head>
<body>
    <h2>Tambah Produk Baru</h2>
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Nama:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="description">Deskripsi:</label>
            <textarea id="description" name="description" required></textarea>
        </div>
        <div>
            <label for="price">Harga:</label>
            <input type="number" id="price" name="price" required>
        </div>
        <button type="submit">Simpan</button>
    </form>
    <br>
    <a href="{{ route('dashboard') }}">Kembali ke Dashboard</a>
</body>
</html>
