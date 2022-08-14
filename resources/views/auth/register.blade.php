<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashtreme Admin - Free Dashboard for Bootstrap 4 by Codervent</title>
    <!-- loader-->
    <link href="{{ asset('assets/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('assets/js/pace.min.js') }}"></script>
    <!--favicon-->
    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">
    <!-- Bootstrap core CSS-->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <!-- animate CSS-->
    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons CSS-->
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
    <!-- Custom Style-->
    <link href="{{ asset('assets/css/app-style.css') }}" rel="stylesheet" />

</head>

<body class="bg-theme bg-theme1">
    <div id="wrapper">
        <div class="card card-authentication1 mx-auto my-4">
            <div class="card-body">
                <div class="card-content p-2">
                    <div class="text-center">
                        <img src="assets/images/logo-icon.png" alt="logo icon">
                    </div>
                    <div class="card-title text-uppercase text-center py-3">Sign Up</div>
                    <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="sr-only">Name</label>
                            <div class="position-relative has-icon-right">
                                <input type="text" id="name" name="name" class="form-control input-shadow"
                                    placeholder="Enter Your Name" required>
                                <div class="form-control-position">
                                    <i class="icon-user"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="sr-only">Email ID</label>
                            <div class="position-relative has-icon-right">
                                <input type="text" id="email" name="email" class="form-control input-shadow" placeholder="Enter Your Email ID" required>
                                <div class="form-control-position">
                                    <i class="icon-envelope-open"></i>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <div class="position-relative has-icon-right">
                                <input type="password" name="password" id="password" class="form-control input-shadow" placeholder="Choose Password" required>
                                <div class="form-control-position">
                                    <i class="icon-lock"></i>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation" class="sr-only">Confiram Password</label>
                            <div class="position-relative has-icon-right">
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-shadow"  placeholder="Confiram Password" required>
                                <div class="form-control-position">
                                    <i class="icon-lock"></i>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="image" class="sr-only">User Image</label>
                            <div class="position-relative has-icon-right">
                                <input type="file" name="image" id="image" class="form-control" required>
                                <div class="form-control-position">
                                    <i class="zmdi zmdi-account-box-mail"></i>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <p class="text-warning mb-0">Already have an account? <a href="{{ route('login') }}"> Sign In here</a>
                            </p>

                            <button type="submit" class="btn btn-light btn-block waves-effect waves-light">Sign Up</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</html>
