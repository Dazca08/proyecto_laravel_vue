<!DOCTYPE html>
<html lang="es" dir="">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>Armada Nacional De Colombia</title>
        
        <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('assets/styles/css/themes/lite-blue.css') }}">
    </head>
    <body>
        <div class="auth-layout-wrap" style="background-image: url({{ asset('/images/armada_nacional_ceremonia_buque_gloria.jpg') }})">
            <div class="auth-content">
                <div class="card o-hidden">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="p-4">
                                <h1 class="mb-3 text-16">Sistema De Gestión De Calidad</h1>
                                <form method="POST" action="{{ route('login') }}" autocomplete="off">
                                    @csrf

                                    <div class="form-group">
                                        <label for="email">{{ __('Usuario') }}</label>
                                        <input id="email" type="text" class="form-control form-control-rounded" name="email" value="{{ old('email') }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="password">{{ __('Contraseña') }}</label>
                                        <input name="password" id="password" type="password" class="form-control form-control-rounded" required>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-rounded btn-primary btn-block mt-2">{{ __('Acceder') }}</button>
                                    </div>
                                </form>

                                <div class="mt-3 text-center">
                                    <a href="{{ route('password.request') }}" class="text-muted"><u>{{ __('¿Olvidó su contraseña?') }}</u></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 text-center " style="background-color: #ffffff; padding-left: 0; padding-right: 30px;">
                            <div class="pr-3 auth-right">
                                <img src="{{ asset('/images/logo.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('assets/js/vendor/jquery-3.3.1.min.js') }}"></script>
        <script src="{{ asset('assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/js/es5/script.min.js') }}"></script>
    </body>
</html>