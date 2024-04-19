<!-- Dashboard untuk pengguna yang telah login -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h2>Selamat datang di Dashboard</h2>
    <p>Anda telah berhasil login!</p>
    <p>Daftar Produk:</p>
    <ul>
        @foreach($products as $product)
            <li>
                <strong>Nama:</strong> {{ $product->name }}<br>
                <strong>Deskripsi:</strong> {{ $product->description }}<br>
                <strong>Harga:</strong> {{ $product->price }}<br>
                <a href="{{ route('products.show', $product->id) }}">Detail</a>
                <a href="{{ route('products.edit', $product->id) }}">Edit</a>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Hapus</button>
                </form>
            </li>
        @endforeach
    </ul>
    <a href="{{ route('products.create') }}">Tambah Produk Baru</a>
    <br>
    <br>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>
