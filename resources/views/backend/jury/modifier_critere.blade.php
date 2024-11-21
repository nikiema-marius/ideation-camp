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
    <link href="{{ asset('./admin/assets/css/critere.css') }}" rel="stylesheet" />
    <link href="{{ asset('./admin/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{ asset('./admin/assets/css/nucleo-svg.css" rel="stylesheet') }}" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('./admin/assets/css/soft-ui-dashboard.css?v=1.0.3') }}" rel="stylesheet" />
    <link href="{{ asset('/resources/css/app.css') }}" rel="stylesheet" />

</head>

<body class="g-sidenav-show  bg-gray-50">

    <section class="mb-8">

        <div class="page-header align-items-start  pt-5 pb-11 m-3 border-radius-lg"
            style="background-image: url('{{ asset('./images/ideation_camp.png') }}">
            <span class="mask bg-gradient-dark opacity-8"></span>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 text-center mx-auto">
                        <h1 class="text-white mb-2 mt-5">Bienvenue !</h1>
                        <p class="text-lead text-white">Section de notes du jury</p>
                    </div>
                </div>
            </div>
        </div>

        <div>
            @if (session('msg_success'))
                <div class="alert alert-success" id="message_validation">{{ session('msg_success') }}</div>
            @endif
            @if (session('msg_error'))
                <div class="alert alert-danger" id="message_validation">{{ session('msg_error') }}</div>
            @endif
        </div>

        <div class="container">


            <div class="container1">



                <form role="form" method="post" action="{{ URL::to('/jury/critere/mofidifiercritere') }}">
                    {{ csrf_field() }}
                    <input type="hidden" value="{{ $critere[0]->id }}" name="id_critere">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="critere" placeholder="Critere"
                            aria-label="titre" aria-describedby="email-addon" value="{{ $critere[0]->critere }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <input type="number" class="form-control" name="coefficient"
                            value="{{ $critere[0]->coefficient }}" placeholder="Coefficient du critere"
                            aria-label="titre" step="0.01" aria-describedby="email-addon" required>
                    </div>



                    <button type="submit" class="btn btn-primary" id="send_new_groupe">Modifier</button>
                    <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                </form>




            </div>

        </div>
    </section>
    <script src="{{ asset('./admin/assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('./admin/assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('./admin/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('./admin/assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('./admin/assets/js/plugins/jquery.min.js') }}"></script>

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
    <script src="{{ asset('./js/main.js') }}"></script>
</body>

</html>
