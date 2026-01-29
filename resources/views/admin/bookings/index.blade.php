<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Pesanan - Studio BUMA</title>
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

        .nav-links {
            display: flex;
            gap: 20px;
            list-style: none;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            transition: opacity 0.3s;
            padding: 8px 15px;
            border-radius: 5px;
        }

        .nav-links a:hover {
            background-color: rgba(255, 255, 255, 0.1);
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

        .filters {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .filters select {
            padding: 10px 15px;
            border: 2px solid #59654E;
            border-radius: 8px;
            font-family: 'Poppins', sans-serif;
            background: white;
            cursor: pointer;
            transition: border-color 0.3s;
        }

        .filters select:focus {
            outline: none;
            border-color: #59654E;
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

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            text-align: center;
        }

        .stat-icon {
            font-size: 28px;
            margin-bottom: 10px;
        }

        .stat-label {
            color: #666;
            font-size: 12px;
            text-transform: uppercase;
            margin-bottom: 5px;
        }

        .stat-number {
            color: #59654E;
            font-size: 28px;
            font-weight: 700;
        }

        .table-wrapper {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background: #59654E;
            color: white;
        }

        th {
            padding: 15px;
            text-align: left;
            font-weight: 600;
        }

        td {
            padding: 15px;
            border: 2px solid #d1e2c0;
            border-bottom: 1px solid #afce8f;
        }

        tbody tr:hover {
            background: #d4eeb6;
        }

        .status-badge {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
        }

        .status-pending {
            background: #FFC107;
            color: #333;
        }

        .status-confirmed {
            background: #28a745;
            color: white;
        }

        .status-completed {
            background: #17a2b8;
            color: white;
        }

        .status-cancelled {
            background: #dc3545;
            color: white;
        }

        .action-buttons {
            display: flex;
            gap: 8px;
        }

        .btn {
            padding: 8px 15px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            text-decoration: none;
            font-size: 12px;
            transition: all 0.3s;
        }

        .btn-status {
            background: #FFC107;
            color: #333;
        }

        .btn-status:hover {
            background: #ffb300;
        }

        .btn-delete {
            background: #dc3545;
            color: white;
        }

        .btn-delete:hover {
            background: #a02622;
        }

        .btn-view {
            background: #17a2b8;
            color: white;
        }

        .btn-view:hover {
            background: #117a8b;
        }

        .empty-state {
            text-align: center;
            padding: 40px;
            color: #999;
        }

        .pagination {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 20px;
            padding: 20px;
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

        .customer-info {
            font-size: 13px;
            color: #666;
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            z-index: 999;
            align-items: center;
            justify-content: center;
        }

        .modal.active {
            display: flex;
        }

        .modal-content {
            background: white;
            padding: 30px;
            border-radius: 10px;
            width: 90%;
            max-width: 400px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        }

        .modal-header {
            margin-bottom: 20px;
        }

        .modal-header h2 {
            color: #59654E;
            font-size: 20px;
        }

        .modal-body {
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #333;
            font-weight: 600;
        }

        .form-group select {
            width: 100%;
            padding: 10px;
            border: 2px solid #e0e0e0;
            border-radius: 6px;
            font-family: 'Poppins', sans-serif;
        }

        .form-group select:focus {
            outline: none;
            border-color: #59654E;
        }

        .modal-footer {
            display: flex;
            gap: 10px;
        }

        .modal-footer button {
            flex: 1;
            padding: 10px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            transition: all 0.3s;
        }

        .btn-confirm {
            background: #59654E;
            color: white;
        }

        .btn-confirm:hover {
            background: #48513F;
        }

        .btn-cancel-modal {
            background: #e0e0e0;
            color: #333;
        }

        .btn-cancel-modal:hover {
            background: #d0d0d0;
        }

        @media (max-width: 768px) {
            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .action-buttons {
                flex-direction: column;
            }

            .filters {
                flex-direction: column;
            }

            .filters select {
                width: 100%;
            }

            table {
                font-size: 12px;
            }

            th, td {
                padding: 10px;
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
                <a href="/bookings">Pesanan</a>
                <a href="/packages">Paket</a>
                <a href="/">Home</a>
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" style="background: #9E4A1E; color: white; border: none; padding: 8px 15px; border-radius: 5px; cursor: pointer; font-family: 'Poppins'; font-weight: 600;">Logout</button>
                </form>
            </div>
        </nav>
    </header>

    <div class="container">
        <div class="page-header">
            <h1>📋 Kelola Pesanan Booking</h1>
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

        <!-- Filter -->
        <div class="filters">
            <select id="statusFilter" onchange="location.href='/bookings?status=' + this.value">
                <option value="">-- Semua Status --</option>
                <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Menunggu</option>
                <option value="confirmed" {{ request('status') === 'confirmed' ? 'selected' : '' }}>Dikonfirmasi</option>
                <option value="completed" {{ request('status') === 'completed' ? 'selected' : '' }}>Selesai</option>
                <option value="cancelled" {{ request('status') === 'cancelled' ? 'selected' : '' }}>Dibatalkan</option>
            </select>
        </div>

        <!-- Statistics -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon">📋</div>
                <div class="stat-label">Total Pesanan</div>
                <div class="stat-number">{{ $totalBooking }}</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">⏳</div>
                <div class="stat-label">Menunggu Konfirmasi</div>
                <div class="stat-number">{{ $pendingBooking }}</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">✅</div>
                <div class="stat-label">Dikonfirmasi</div>
                <div class="stat-number">{{ $confirmedBooking }}</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">✓</div>
                <div class="stat-label">Selesai</div>
                <div class="stat-number">{{ $completedBooking }}</div>
            </div>
        </div>

        <!-- Table -->
        <div class="table-wrapper">
            @if($bookings->count() > 0)
                <table>
                    <thead>
                        <tr>
                            <th>ID Pesanan</th>
                            <th>Nama Pemesan</th>
                            <th>Paket</th>
                            <th>Tanggal Pelayanan</th>
                            <th>Jumlah Peserta</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bookings as $booking)
                            <tr>
                                <td>
                                    <strong>#{{ str_pad($booking->id, 5, '0', STR_PAD_LEFT) }}</strong>
                                    <div class="customer-info">{{ $booking->nowa }}</div>
                                </td>
                                <td>
                                    <strong>{{ $booking->nama }}</strong>
                                    <div class="customer-info">{{ $booking->booking_type }}</div>
                                </td>
                                <td>{{ $booking->paket }}</td>
                                <td>
                                    {{ \Carbon\Carbon::parse($booking->tanggal_pelayanan)->format('d/m/Y') }}
                                    <div class="customer-info">{{ $booking->jam_pelayanan }}</div>
                                </td>
                                <td>{{ $booking->jumlah_orang }} orang</td>
                                <td>
                                    <span class="status-badge status-{{ $booking->status }}">
                                        @switch($booking->status)
                                            @case('pending')
                                                Menunggu
                                            @break
                                            @case('confirmed')
                                                Dikonfirmasi
                                            @break
                                            @case('completed')
                                                Selesai
                                            @break
                                            @case('cancelled')
                                                Dibatalkan
                                            @break
                                        @endswitch
                                    </span>
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="btn btn-status" onclick="openStatusModal({{ $booking->id }}, '{{ $booking->status }}')">
                                            Ubah Status
                                        </button>
                                        <form action="{{ route('booking.destroy', $booking->id) }}" method="POST" style="flex: 1;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-delete" onclick="return confirm('Yakin ingin menghapus pesanan ini?')" style="width: 100%; box-sizing: border-box;">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="pagination">
                    {{ $bookings->links() }}
                </div>
            @else
                <div class="empty-state">
                    <p>Tidak ada pesanan dengan status yang dipilih.</p>
                </div>
            @endif
        </div>
    </div>

    <!-- Modal Ubah Status -->
    <div class="modal" id="statusModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Ubah Status Pesanan</h2>
            </div>
            <form id="statusForm" method="POST">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="statusSelect">Pilih Status Baru:</label>
                        <select id="statusSelect" name="status" required>
                            <option value="">-- Pilih Status --</option>
                            <option value="pending">Menunggu Konfirmasi</option>
                            <option value="confirmed">Dikonfirmasi</option>
                            <option value="completed">Selesai</option>
                            <option value="cancelled">Dibatalkan</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn-confirm">Ubah</button>
                    <button type="button" class="btn-cancel-modal" onclick="closeStatusModal()">Batal</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openStatusModal(bookingId, currentStatus) {
            document.getElementById('statusForm').action = `/admin/booking/${bookingId}/status`;
            document.getElementById('statusSelect').value = currentStatus;
            document.getElementById('statusModal').classList.add('active');
        }

        function closeStatusModal() {
            document.getElementById('statusModal').classList.remove('active');
        }

        // Close modal when clicking outside
        document.getElementById('statusModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeStatusModal();
            }
        });
    </script>
</body>
</html>

