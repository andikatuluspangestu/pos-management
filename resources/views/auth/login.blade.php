<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/4219/4219909.png" type="image/x-icon">
    <title>
        Login | POS - Point of Sale Management
    </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <style>
        #login {
            padding-top: 50px;
        }

        #login .img-circle {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        #login .form-wrap {
            width: 40%;
            margin: 0 auto;
        }

        #login h1 {
            color: #4e73df;
            font-size: 18px;
            text-align: center;
            font-weight: bold;
            padding-bottom: 20px;
        }

        #login .form-group {
            margin-bottom: 25px;
        }

        #login .form-control {
            color: #212121;
        }

        #login .checkbox {
            margin-bottom: 20px;
            position: relative;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            -o-user-select: none;
            user-select: none;
        }

        #login .checkbox.show:before {
            content: "\e013";
            color: #4e73df;
            font-size: 17px;
            margin: 1px 0 0 3px;
            position: absolute;
            pointer-events: none;
            font-family: "Glyphicons Halflings";
        }

        #login .checkbox .character-checkbox {
            width: 25px;
            height: 25px;
            cursor: pointer;
            border-radius: 3px;
            border: 1px solid #ccc;
            vertical-align: middle;
            display: inline-block;
        }

        #login .checkbox .label {
            color: #4e73df;
            font-size: 13px;
            font-weight: normal;
        }

        #login .btn-custom {
            font-size: 14px;
            margin-bottom: 20px;
        }

        #login .forget {
            font-size: 13px;
            text-align: center;
            display: block;
        }

        .form-control {
            color: #212121;
        }

        .btn-custom {
            color: #fff;
            background-color: #4e73df;
        }

        .btn-custom:hover,
        .btn-custom:focus {
            color: #fff;
        }

        #footer {
            color: #4e73df;
            font-size: 12px;
            text-align: center;
        }

        #footer p {
            margin-bottom: 0;
        }

        #footer a {
            color: inherit;
        }
    </style>
</head>

<body class="bg-primary">
    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-wrap bg-light p-4 rounded">
                        <img src="https://www.pngitem.com/pimgs/m/146-1468479_my-profile-icon-blank-profile-picture-circle-hd.png"
                            alt="user" width="100px" class="img-circle mb-3" />
                        <h1>
                            Masuk ke Akun Anda
                        </h1>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email" class="text-md-right">{{ __('Alamat Email') }}</label>
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus
                                    placeholder="Email" />

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-md-right">{{ __('Password') }}</label>
                                <div class="input-group">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password" placeholder="Password" />
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i id="showPasswordToggle" class="fa fa-eye"
                                                onclick="togglePasswordVisibility()"></i>
                                        </span>
                                    </div>
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Ingat akun saya') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <input type="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Log in" />
                        </form>
                        <small class="text-center">
                          Belum punya akun? <a href="#" data-toggle="modal" data-target="#exampleModal">Register</a>
                        </small>
                        <hr/>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                      Pemberitahuan!
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Jika ingin melakukan registrasi Akun Sales atau Customer silahkan menghubungi admin di Nomor WhatsApp berikut ini.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Mengerti</button>
                </div>
            </div>
        </div>
    </div>


    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p>&copy; 2023 POS - Point of Sale Management</p>
                </div>
            </div>
        </div>
    </footer>

    {{-- CDN Javascrip Bootstrap 4 & Jquery --}}
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>

    <script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById('password');
            var showPasswordToggle = document.getElementById('showPasswordToggle');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                showPasswordToggle.classList.remove('fa-eye');
                showPasswordToggle.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                showPasswordToggle.classList.remove('fa-eye-slash');
                showPasswordToggle.classList.add('fa-eye');
            }
        }
    </script>

    <script></script>

</body>

</html>
