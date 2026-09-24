<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Fauzi Agus Budiman</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style>
        body {
            background-color: #090d16;
            color: #f8fafc;
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-image: 
                radial-gradient(circle at 20% 20%, rgba(56, 189, 248, 0.1) 0%, transparent 40%),
                radial-gradient(circle at 80% 80%, rgba(99, 102, 241, 0.1) 0%, transparent 40%);
        }
        .login-card {
            background: rgba(18, 26, 43, 0.85);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 18px;
            padding: 2.5rem;
            width: 100%;
            max-width: 440px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.5);
        }
        .form-control-custom {
            background: #111827;
            border: 1px solid rgba(255, 255, 255, 0.12);
            color: #ffffff;
            border-radius: 8px;
            padding: 0.8rem 1rem;
        }
        .form-control-custom:focus {
            background: #111827;
            border-color: #38bdf8;
            color: #ffffff;
            box-shadow: 0 0 0 3px rgba(56, 189, 248, 0.2);
        }
        .btn-submit {
            background: linear-gradient(135deg, #0284c7 0%, #2563eb 100%);
            border: none;
            color: white;
            font-weight: 600;
            padding: 0.85rem;
            border-radius: 8px;
            transition: all 0.2s;
        }
        .btn-submit:hover {
            background: linear-gradient(135deg, #0369a1 0%, #1d4ed8 100%);
            box-shadow: 0 4px 15px rgba(2, 132, 199, 0.5);
            transform: translateY(-1px);
        }
    </style>
</head>
<body>

    <div class="container py-4">
        <div class="login-card mx-auto">
            <div class="text-center mb-4">
                <div class="rounded-3 bg-info bg-opacity-25 text-info d-inline-flex p-3 mb-3">
                    <i class="bi bi-shield-lock fs-2"></i>
                </div>
                <h1 class="h4 fw-bold text-white mb-1">Admin Portal</h1>
                <p class="text-muted small">Kelola Seluruh Konten Portfolio Fauzi Agus Budiman</p>
            </div>

            @if(session('success'))
                <div class="alert alert-success small mb-3">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger small mb-3">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('admin.login.submit') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label text-secondary small fw-semibold">Email Administrator</label>
                    <div class="input-group">
                        <span class="input-group-text bg-dark border-secondary border-opacity-25 text-secondary">
                            <i class="bi bi-envelope"></i>
                        </span>
                        <input type="email" id="email" name="email" class="form-control form-control-custom" placeholder="admin@fauzi.dev" value="{{ old('email', 'admin@fauzi.dev') }}" required autofocus>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label text-secondary small fw-semibold">Password</label>
                    <div class="input-group">
                        <span class="input-group-text bg-dark border-secondary border-opacity-25 text-secondary">
                            <i class="bi bi-key"></i>
                        </span>
                        <input type="password" id="password" name="password" class="form-control form-control-custom" placeholder="••••••••" value="password" required>
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" checked>
                        <label class="form-check-label text-secondary small" for="remember">
                            Ingat Saya
                        </label>
                    </div>
                </div>

                <button type="submit" class="btn btn-submit w-100 mb-3">
                    <i class="bi bi-box-arrow-in-right me-1"></i> Masuk ke Dashboard
                </button>

                <div class="text-center">
                    <a href="{{ route('portfolio.home') }}" class="text-secondary small text-decoration-none hover-info">
                        <i class="bi bi-arrow-left"></i> Kembali ke Website Portfolio
                    </a>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
