<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .login-card {
            max-width: 400px;
            margin: 50px auto;
            background: #fff;
            padding: 40px;
            border-radius: 25px;
            box-shadow: 0 0 40px rgba(0, 0, 0, 0.05);
        }

        .form-control {
            border-radius: 50px;
            padding: 12px 20px;
        }

        .btn-login {
            border-radius: 50px;
            padding: 12px;
            background-color: #5a4fff;
            color: white;
            font-weight: 500;
        }

        .btn-login:hover {
            background-color: #4a3ded;
        }

        .btn-social {
            border-radius: 50px;
            padding: 10px;
            background-color: #f8f9fa;
            border: 1px solid #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .btn-social img {
            height: 20px;
        }

        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 20px 0;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #ddd;
        }

        .divider::before {
            margin-right: .75em;
        }

        .divider::after {
            margin-left: .75em;
        }

        .text-muted small {
            font-size: 0.85rem;
        }
    </style>
</head>

<body>

    <div class="login-card">

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label fw-semibold">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email address">
            </div>

            <div class="mb-4">
                <label for="password" class="form-label fw-semibold">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>

            <div class="d-grid mb-3">
                <button type="submit" class="btn btn-login">Log in</button>
            </div>

            <div class="text-center text-muted mb-3">
                <small>Forgot your password?</small>
            </div>

            <div class="divider">or</div>

            <div class="d-grid gap-2">
                <button type="button" class="btn btn-social">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg"
                        alt="Google"> Log in with Google
                </button>
                <button type="button" class="btn btn-social">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/f/fa/Apple_logo_black.svg" alt="Apple">
                    Log in with Apple
                </button>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger mt-4">
                    {{ $errors->first() }}
                </div>
            @endif
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
