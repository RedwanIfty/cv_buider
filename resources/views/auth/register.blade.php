<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CV Maker | Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="icon" href="logo.png">
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
            margin: auto;
        }

        .form-signin .form-floating:focus-within {
            z-index: 2;
        }

        .form-signin input[type="text"],
        .form-signin input[type="email"],
        .form-signin input[type="password"] {
            border-radius: 0;
        }

        .form-signin input[type="text"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signin input[type="email"] {
            margin-bottom: -1px;
        }

        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }

        .form-signin img {
            height: 70px;
        }
    </style>
</head>

<body class="d-flex align-items-center bg-light">
<main class="form-signin bg-white shadow rounded">
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="d-flex gap-2 justify-content-center mb-4">
            <img src="{{asset('assets/images/logo.png')}}" alt="Logo">
            <div>
                <h1 class="h3 fw-normal my-1"><b>CV</b> Maker</h1>
                <p class="m-0">Create your new account</p>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="form-floating mb-3">
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="floatingName" name="name" placeholder="Full Name" value="{{ old('name') }}" required>
            <label for="floatingName"><i class="bi bi-person"></i> Full Name</label>
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="floatingEmail" name="email" placeholder="name@example.com" value="{{ old('email') }}" required>
            <label for="floatingEmail"><i class="bi bi-envelope"></i> Email address</label>
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" name="password" placeholder="Password" required>
            <label for="floatingPassword"><i class="bi bi-key"></i> Password</label>
            @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="floatingPasswordConfirmation" name="password_confirmation" placeholder="Confirm Password" required>
            <label for="floatingPasswordConfirmation"><i class="bi bi-key"></i> Confirm Password</label>
            @error('password_confirmation')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button class="btn btn-primary w-100 py-2" type="submit"><i class="bi bi-person-plus-fill"></i> Register</button>
        <div class="d-flex justify-content-between my-3">
            <a href="#" class="text-decoration-none">Forgot Password?</a>
            <a href="{{ route('login') }}" class="text-decoration-none">Login</a>
        </div>
    </form>
</main>
</body>

</html>
