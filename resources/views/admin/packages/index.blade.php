<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Paket - Studio BUMA</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #FDF6E3;
        }

        header {
            background: #59654E;
            color: white;
            padding: 20px 0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        nav {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 24px;
            font-weight: 700;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
            transition: opacity 0.3s;
        }

        .nav-links a:hover {
            opacity: 0.8;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .page-header h1 {
            color: #59654E;
            font-size: 28px;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s;
        }

        .btn-primary {
            background: #59654E;
            color: white;
        }

        .btn-primary:hover {
            background: #48513F;
        }

        .btn-edit {
            background: #FFC107;
            color: #333;
            padding: 6px 12px;
            font-size: 12px;
        }

        .btn-edit:hover {
            background: #ffb300;
        }

        .btn-delete {
            background: #dc3545;
            color: white;
            padding: 6px 12px;
            font-size: 12px;
        }

        .btn-delete:hover {
            background: #a02622;
        }

        .btn-view {
            background: #17a2b8;
            color: white;
            padding: 6px 12px;
            font-size: 12px;
        }

        .btn-view:hover {
            background: #117a8b;
        }

        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 8px;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        th {
            background: #59654E;
            color: white;
            padding: 15px;
            text-align: left;
            font-weight: 600;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #eee;
        }

        tr:hover {
            background: #f9f9f9;
        }

        .status-active {
            background: #d4edda;
            color: #155724;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 600;
        }

        .status-inactive {
            background: #f8d7da;
            color: #721c24;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 600;
        }

        .price {
            color: #28a745;
            font-weight: 600;
        }

        .actions {
            display: flex;
            gap: 5px;
        }

        .empty-state {
            text-align: center;
            padding: 40px;
            color: #999;
        }

        .pagination {
            margin-top: 20px;
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .pagination a, .pagination span {
            padding: 8px 12px;
            border-radius: 4px;
            border: 1px solid #ddd;
            text-decoration: none;
            color: #59654E;
        }

        .pagination a:hover {
            background: #59654E;
            color: white;
        }

        .pagination .active {
            background: #59654E;
            color: white;
            border-color: #59654E;
        }

        @media (max-width: 768px) {
            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            table {
                font-size: 12px;
            }

            th, td {
                padding: 10px;
            }

            .actions {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <div class="logo">Studio BUMA Admin</div>
            <div class="nav-links">
                <a href="/admin">Dashboard</a>
                <a href="/packages">Paket</a>
                <a href="/">Home</a>
            </div>
        </nav>
    </header>

    <div class="container">
        <div class="page-header">
            <h1>📦 Kelola Paket Booking</h1>
            <a href="{{ route('packages.create') }}" class="btn btn-primary">+ Tambah Paket</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                ✓ {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-error">
                ✗ {{ session('error') }}
            </div>
        @endif

        @if($packages->count() > 0)
            <table>
                <thead>
                    <tr>
                        <th>Nama Paket</th>
                        <th>Tipe</th>
                        <th>Harga</th>
                        <th>Durasi (Menit)</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($packages as $package)
                        <tr>
                            <td><strong>{{ $package->name }}</strong></td>
                            <td>{{ ucfirst($package->type) }}</td>
                            <td class="price">Rp {{ number_format($package->price, 0, ',', '.') }}</td>
                            <td>{{ $package->duration }} menit</td>
                            <td>
                                <span class="status-{{ $package->status }}">
                                    {{ $package->status === 'active' ? '✓ Aktif' : '✗ Nonaktif' }}
                                </span>
                            </td>
                            <td>
                                <div class="actions">
                                    <a href="{{ route('packages.show', $package->id) }}" class="btn btn-view">Lihat</a>
                                    <a href="{{ route('packages.edit', $package->id) }}" class="btn btn-edit">Edit</a>
                                    <form action="{{ route('packages.destroy', $package->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-delete" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="pagination">
                {{ $packages->links() }}
            </div>
        @else
            <div class="empty-state">
                <p>Belum ada paket. <a href="{{ route('packages.create') }}">Buat paket baru</a></p>
            </div>
        @endif
    </div>
</body>
</html>

