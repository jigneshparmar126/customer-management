<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Admin | {{ env('APP_NAME') }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('admin_theme/assets/images/favicon_1.ico') }}">

        <!-- App css -->
        <link href="{{ asset('admin_theme/assets/css/bootstrap-material.min.css') }}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
        <link href="{{ asset('admin_theme/assets/css/app-material.min.css') }}" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

        <link href="{{ asset('admin_theme/assets/css/bootstrap-material-dark.min.css') }}" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" />
        <link href="{{ asset('admin_theme/assets/css/app-material-dark.min.css') }}" rel="stylesheet" type="text/css" id="app-dark-stylesheet" />

        <link src="{{ asset('admin_theme/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css"></link>
    </head>
    <body class=" authentication-bg authentication-bg-pattern">
        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-pattern">
                            <div class="card-body p-4">
                                <div class="text-center w-75 m-auto">
                                    <div align="center">
                                        <h2>{!! ucwords(str_replace('-',' ',env('APP_NAME'))) !!} </h2>
                                        <h3 style="color:burlywood;">Admin</h3>
                                    </div>
                                </div>
                                <form action="{{ route('admin.login') }}" method="post">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label for="emailaddress">Email address</label>
                                        <input type="text" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                                        @if($errors->has('email'))
                                          <strong style="color:red;">{{$errors->first('email')}}</strong>
                                        @endif
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="password">Password</label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                                            <div class="input-group-append" data-password="false">
                                                <div class="input-group-text">
                                                    <span class="password-eye"></span>
                                                </div>
                                            </div>
                                        </div>
                                        @if($errors->has('password'))
                                            <strong style="color:red;">{{$errors->first('password')}}</strong>
                                        @endif
                                    </div>
                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-primary btn-block" type="submit"> Log In </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Vendor js -->
        <script src="{{ asset('admin_theme/assets/js/vendor.min.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('admin_theme/assets/js/app.min.js') }}"></script>
    </body>
</html>