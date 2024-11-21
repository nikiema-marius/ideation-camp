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
    <link href="{{ asset('./admin/assets/css/jury.css') }}" rel="stylesheet" />
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

        <div class="container">
            @if (session('msg_success'))
                <div class="alert alert-success" id="message_validation">{{ session('msg_success') }}</div>
            @endif
            @if (session('msg_error'))
                <div class="alert alert-danger" id="message_validation">{{ session('msg_error') }}</div>
            @endif

            <section class=" mb-8 ">


                <div class="button-container">
                    <h1 class="mb-2 mt-5">Liste des projets</h1>
                    <div class="button-wrapper d-flex">
                        <h1 class="mb-2 mt-5 flex-fill">
                            <div>


                            </div>
                            <button>
                                <a href="{{ URL::to('/jury/critere') }}">Ajouter critère</a>
                            </button>
                        </h1>
                        <h1 class="mb-2 mt-5 flex-fill">
                            <button>
                                <a href="{{ URL::to('/jury/critere/classement') }}">Obtenir le classement</a>
                            </button>
                        </h1>
                    </div>
                </div>


                {{--  --}}




                {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#note">Ouvrir le modal</button>




                <div class="modal fade" id="note" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Noté le projet</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body card-body">
                              
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                <button type="button" class="btn btn-primary" id="send_new_pariticpant">Ajouter</button>
                            </div>
                        </div>
                    </div>
                </div> --}}





                {{--  --}}



                <div class="row">
                    @if (Session::has('msg_error'))
                        <div class="alert alert-success" id="message_validation">{{ Session::get('msg_error') }}</div>
                    @endif

                    @foreach ($projets as $item)
                        <div class="card" style="width: 20rem; margin:3% ">
                            <p>{{ $item->description }}</p>
                            <img src="{{ asset('images/about1-1.png') }} " class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Responsable: <i>Ilbouda Ali</i> </h5>
                                {{-- <h4 class="card-title">Note global du projet</h4>
                          <p class="card-text">
                            <p>Note: / 25 </p>
                           
                          </p> --}}
                                <div class="row">
                                    <div class="col-6">

                                        <a href="{{ url('/jury/index/detail/' . $item->id) }}"
                                            class="btn btn-success">Detail</a>
                                    </div>


                                    <div class="col-6">
                                        {{-- <a href="#" data-bs-toggle="modal" data-bs-target="#liste_projet_detaille{{$item->id}}" class="btn btn-success">Noté</a> --}}
                                        <a href="{{ url('/jury/note/' . $item->id) }}" class="btn btn-success">Noté</a>

                                    </div>

                                </div>

                            </div>
                        </div>
                    @endforeach


                </div>
                {{-- <div class="" id="parti" value="{{$id}}"></div> --}}

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
