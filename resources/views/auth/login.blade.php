<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Studio BUMA</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>

        body {
            font-family: 'Poppins', sans-serif;
            background: #F7EED6;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .auth-container {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 450px;
        }

        .auth-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .auth-header h2 {
            color: #59654E;
            font-size: 28px;
            margin-bottom: 10px;
        }

        .auth-header p {
            color: #666;
            font-size: 14px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: 500;
        }

        input {
            width: 100%;
            padding: 12px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            transition: border-color 0.3s;
        }

        input:focus {
            outline: none;
            border-color: #59654E;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #59654E;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
            font-weight: 600;
            transition: background-color 0.3s;
            margin-top: 10px;
        }

        button:hover {
            background-color: #48513F;
        }

        .error-message {
            color: #9E4A1E;
            font-size: 14px;
            padding: 10px;
            background-color: #FED7B8;
            border-radius: 5px;
            margin-bottom: 15px;
            text-align: center;
        }

        .success-message {
            color: #59654E;
            font-size: 14px;
            padding: 10px;
            background-color: #E8EEE0;
            border-radius: 5px;
            margin-bottom: 15px;
            text-align: center;
        }

        .auth-footer {
            text-align: center;
            margin-top: 20px;
            color: #666;
            font-size: 14px;
        }

        .auth-footer a {
            color: #59654E;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s;
        }

        .auth-footer a:hover {
            color: #9E4A1E;
        }

        .back-link {
            display: inline-block;
            margin-bottom: 20px;
            color: #59654E;
            text-decoration: none;
            font-size: 14px;
            transition: color 0.3s;
        }

        .back-link:hover {
            color: #9E4A1E;
        }

        .error-field {
            border-color: #9E4A1E !important;
        }

        .error-text {
            color: #9E4A1E;
            font-size: 12px;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="auth-container">
        <a href="/" class="back-link">← Kembali ke Beranda</a>
        
        <div class="auth-header">
            <h2>🔐 Login</h2>
            <p>Masuk ke Dashboard Admin Studio BUMA</p>
        </div>

        @if($errors->any())
            <div class="error-message">
                {{ $errors->first() }}
            </div>
        @endif

        @if(session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="email">Email</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    placeholder="admin@buma.com"
                    value="{{ old('email') }}"
                    class="@error('email') error-field @enderror"
                    required>
                @error('email')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    placeholder="Masukkan password"
                    class="@error('password') error-field @enderror"
                    required>
                @error('password')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit">Login Sekarang</button>
        </form>

        <div class="auth-footer">
            Belum punya akun? <a href="{{ route('signup') }}">Daftar di sini</a>
        </div>
    </div>
</body>
</html>
