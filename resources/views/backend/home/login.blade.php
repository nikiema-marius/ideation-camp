<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('./admin/assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('images/cropped-incubuo_ICON-32x32.png') }}">
    <title>
        Login
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
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
          <div class="col-12">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg blur blur-rounded top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
              <div class="container-fluid">
                <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="{{URL::to('/')}}">
                  <h3>Ideation Camp 2023</h3> 
                </a>
                <div class="d-md-block d-none" id="navigation">
                  <ul class="navbar-nav align-items-center">
                    <li class="nav-item">
                      <a class="nav-link d-flex align-items-center me-2 active" aria-current="page" >
                       
                    <img width="155" height="44" src="/images/incubuo_logo.png" class="custom-logo" alt="INCUB@UO"
                    decoding="async" srcset="/images/incubuo_logo.png 155w, /images/incubuo_logo.png 150w"
                    sizes="(max-width: 155px) 100vw, 155px">
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </nav>
            <!-- End Navbar -->
          </div>
        </div>
      </div>
    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-100 align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                            <div class="card card-plain mt-4">
                                <div class="card-header pb-0 text-left bg-transparent">
                                    <h1 class="font-weight-bolder text-gradient-success">Bienvenue</h1>
                                    <p class="mb-0">Entrez votre nom d'utilisateur et mots de passe</p>
                                </div>
                                <div class="card-body">
                                    <form role="form" method="GET" action="{{URL::to('/admin/dashboard')}}" >
                                        <label>Identifiant</label>
                                        <div class="mb-3">
                                            <input type="text" class="form-control" placeholder="" aria-label="user"
                                                aria-describedby="email-addon">
                                        </div>
                                        <label>Mots de passe</label>
                                        <div class="mb-3">
                                            <input type="password" class="form-control" placeholder=""
                                                aria-label="Password" aria-describedby="password-addon">
                                        </div>
                                        <div class="text-center">
                                            <button type="submit"
                                                class="btn bg-gradient-success w-100 mt-4 mb-0">Connexion</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 align-items-center">
                            <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                                <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6"
                                    style="background-image:url('{{ asset('./images/ideation_camp.png') }}')"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
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
