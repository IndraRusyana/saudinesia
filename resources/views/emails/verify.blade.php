<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Verifikasi Email</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: #f8f9fa; padding: 40px;">
    <div class="container">
        <div class="card shadow-sm" style="max-width: 600px; margin: auto;">
            <div class="card-body text-center">
                <h2 class="card-title mb-4">Verifikasi Email Anda</h2>
                <p class="card-text">Terima kasih telah mendaftar di <strong>Saudinesia</strong>.<br>
                Silakan klik tombol di bawah ini untuk memverifikasi email Anda.</p>

                <a href="{{ $url }}" class="btn btn-primary mt-3 mb-3" style="padding: 10px 30px;">
                    Verifikasi Sekarang
                </a>

                <p class="text-muted small">
                    Jika Anda tidak merasa membuat akun ini, Anda bisa mengabaikan email ini.
                </p>

                <p class="text-muted small mb-0">
                    &mdash; Tim Saudinesia
                </p>
            </div>
        </div>
    </div>
</body>
</html>
