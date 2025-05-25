<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Email</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center" style="min-height: 100vh;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-4">
                        <h2 class="mb-3 text-center text-primary">Verifikasi Email Anda</h2>
                        <p class="text-center text-muted">
                            Untuk menggunakan layanan kami lebih jauh mohon verifikasi email anda. Jika belum menerima, Anda dapat mengirim ulang.
                        </p>

                        @if (session('message'))
                            <div class="alert alert-success text-center">
                                {{ session('message') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('verification.send') }}" class="text-center">
                            @csrf
                            <button type="submit" class="btn btn-primary">
                                Kirim Ulang Link Verifikasi
                            </button>
                        </form>

                        <div class="text-center mt-3">
                            <a href="{{ route('user.logout') }}" 
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                               class="text-decoration-none text-danger">Keluar</a>

                            <form id="logout-form" action="{{ route('user.logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
