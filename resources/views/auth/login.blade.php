<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CV Maker | Login</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="icon" href="{{ asset('assets/images/logo.png') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        body {
            height: 100vh;
            background: rgb(249, 249, 249);
            background: radial-gradient(circle, rgba(249, 249, 249, 1) 0%, rgba(240, 232, 127, 1) 49%, rgba(246, 243, 132, 1) 100%);
        }

        .form-signin {
            max-width: 330px;
            padding: 1rem;
        }

        .form-signin .form-floating:focus-within {
            z-index: 2;
        }

        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }

        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }
    </style>
</head>

<body class="d-flex align-items-center">
<div class="w-100">
    <main class="form-signin w-100 m-auto bg-white shadow rounded">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="d-flex gap-2 justify-content-center">
                <img class="mb-4" src="{{ asset('assets/images/logo.png') }}" alt="Logo" height="70">

                <div>
                    <h1 class="h3 fw-normal my-1"><b>CV</b> Builder</h1>
                    <p class="m-0">Login to your account</p>
                </div>
            </div>

            <div class="form-floating position-relative">
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="floatingEmail" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="name@example.com">
                <label for="floatingEmail"><i class="bi bi-envelope"></i> Email address</label>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-floating position-relative">
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" name="password" required autocomplete="current-password" placeholder="Password">
                <label for="floatingPassword"><i class="bi bi-key"></i> Password</label>
                <i class="bi bi-eye-slash-fill password-toggle" id="togglePassword"></i>
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <button class="btn btn-primary w-100 py-2" type="submit">Login
                <i class="bi bi-box-arrow-in-right"></i>
            </button>

            <div class="d-flex justify-content-between my-3">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-decoration-none">Forgot Password?</a>
                @endif
                <a href="{{ route('register') }}" class="text-decoration-none">Register</a>
            </div>
        </form>
    </main>
</div>

<script>
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('floatingPassword');

    togglePassword.addEventListener('click', function () {
        // Toggle the type attribute
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);

        // Toggle the icon
        this.classList.toggle('bi-eye');
        this.classList.toggle('bi-eye-slash-fill');
    });
</script>
</body>

</html>
