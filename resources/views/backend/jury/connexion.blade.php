<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('./admin/assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('images/cropped-incubuo_ICON-32x32.png') }}">
    <title>
        Inscription
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('./admin/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('./admin/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{ asset('./admin/assets/css/nucleo-svg.css" rel="stylesheet') }}" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('./admin/assets/css/soft-ui-dashboard.css?v=1.0.3') }}" rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-50">
    <section class="min-vh-100">
        <div class="page-header align-items-start min-vh-100"
            style="background-image: url('{{ asset('./images/ideation_camp.png') }}">
            <span class="mask bg-gradient-dark opacity-8"></span>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 text-center mx-auto">
                        <h1 class="text-white mb-2 mt-5">Bienvenue !</h1>
                        <p class="text-lead text-white">Connectez vous pour pouvoir noter les projets</p>
                    </div>
                </div>

                <div class="row ">
                    <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                        <div class="card z-index-0">
    
                            <div class="card-body">
                                @if (Session::has("msg_error"))
                                    <div class="alert alert-danger" id="message_validation">{{Session::get("msg_error")}}</div>
                                @endif
                                <div class="card-header text-center pt-4">
                                    <h5>Se connecter</h5>
                                </div>
                                <form role="form text-left" action="{{ URL::to('/jury/index') }}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="user" placeholder="Utilisateur"
                                            aria-label="Name" aria-describedby="email-addon" required>
                                    </div>
                                    <div class="mb-3">
                                        <input type="password" class="form-control" name="password" placeholder="mot de passe"
                                            aria-label="Name" aria-describedby="email-addon" required>
                                    </div>

                                    <div class="mb-3">
                                        <select class="form-select" aria-label="Default select example" name="role" required>
                                            <option selected>Selectionner le role</option>
                                            <option value="president">President du jury</option>
                                            <option value="jury">jury 1</option>
                                            <option value="jury">jury 2</option>
                                            <option value="jury">jury 3</option>
                                            <option value="jury">jury 4</option>
                                        </select>
                                    </div>
                                   
    
                                    <div class="text-center">
                                        <button type="sublit"
                                            class="btn bg-gradient-dark w-100 my-4 mb-2">Connecter</button>
                                    </div> 
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="{{ asset('./admin/assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('./admin/assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('./admin/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('./admin/assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <script src="{{ asset('./admin/assets/js/soft-ui-dashboard.min.js?v=1.0.3') }}"></script>
</body>

</html>
