
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from emr.dreamguystech.com/html/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Oct 2021 23:00:33 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

    <title>Birth Certificate App - Réinitialiser le mot de passe</title>

    <meta name="description" content="Prototype">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('logo/logo5.jpeg') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<style>
    .login-new-btn {
        background-color: #4DD434;
        border-color: #4DD434;
    }
</style>

<body>

    <div class="main-wrapper login-body" style="background: none;">
        <div class="login-wrapper">
            <div class="container">
                <img class="img-fluid logo-dark mb-2" src="{{ asset('logo/logo5.jpeg') }}" alt="Logo">
                <div class="loginbox">
                    <div class="login-right">
                        <div class="login-right-wrap">
                            <h1>Réinitialiser le mot de passe</h1>
                            <p class="account-subtitle">
                                @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                                @endif
                            </p>
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="form-group">
                                    <label class="form-control-label">Addresse Couriel</label>
                                    <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <button class="btn btn-lg btn-block btn-primary" type="submit">Envoyer un lien</button>
                                <!-- <button class="btn btn-lg btn-block btn-primary" type="button">Envoyer un lien</button> -->

                                <div class="text-center mt-3"><a class="dont-have" href="{{ route('login') }}">S'authentifier</a></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>

    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>

<!-- Mirrored from emr.dreamguystech.com/html/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Oct 2021 23:00:33 GMT -->

</html>