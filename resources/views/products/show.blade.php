<!-- Detail produk -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk</title>
</head>
<body>
    <h2>Detail Produk</h2>
    <div>
        <p><strong>Nama:</strong> {{ $product->name }}</p>
        <p><strong>Deskripsi:</strong> {{ $product->description }}</p>
        <p><strong>Harga:</strong> {{ $product->price }}</p>
    </div>
    <a href="{{ route('products.index') }}">Kembali ke Daftar Produk</a>
</body>
</html>
