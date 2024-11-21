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
    
    <section class="mb-8">
        
        <div class="page-header align-items-start  pt-5 pb-11 m-3 border-radius-lg"
            style="background-image: url('{{ asset('./images/ideation_camp.png') }}">
            <span class="mask bg-gradient-dark opacity-8"></span>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 text-center mx-auto">
                        <h1 class="text-white mb-2 mt-5">Bienvenue !</h1>
                        <p class="text-lead text-white">Faites vos choix de projet</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <section class=" mb-8">
                <h1 class="mb-2 mt-5">Lise des projets</h1>

                <div class="row">

                    @foreach ($projets as $item)
                    
                    <div class="col-xl-6 col-sm-6 mb-xl-0 mb-2  cursor-pointer" style="margin-top: 10px"
                    data-bs-toggle="modal" data-bs-target="#liste_projet_detaille{{$item->id}}">
                    <div class="card border border-secondary" id="projet_{{$item->id}}" value="{{$item->id}}">
                        <div class="card-body">
                            <div class="row">
                                {{-- <div class="co-xl-10 col-10"> --}}
                                <div class="numbers">
                                    <h5 class="font-weight-bolder mb-0 projet_titre">{{$item->description}}</h5>
                                </div>
                                {{-- </div> --}}

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="liste_projet_detaille{{$item->id}}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Détaille de projet</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="row modal-body">
                                <div class="col-xl-4 col-md-4 mb-xl-0 mb-3">
                                    <a class="d-block  border-radius-xl">
                                        <img src="{{ asset('admin/assets/img/projet.png') }}"
                                            alt="img-flou-ombre" class="img-fluid  border-radius-lg img-thumbnail"
                                            >
                                    </a>
                                </div>
                                <div class="col-xl-8 col-md-8 mb-xl-0 mb-3  ">
                                    <div class="col-12  ">

                                        <h5 class="titre_projet_{{$item->id}}" _msthash="3640624" _msttexthash="154440">{{$item->description}} </h5>
                                    </div>

                                    <div class="row">

                                        <div class="">
                                            <label>Choisissez un emplacement</label>

                                            <div class="form-check">
                                                <input class="form-check-input choix_projet_1" value="{{$item->id}}"
                                                    type="checkbox" id="projet_choix_1_{{$item->id}}">
                                                <label class="form-check-label" for="projet_choix_1_{{$item->id}}">1
                                                    <sup>er</sup>
                                                    choix<strong> (50 point) <span class="text-success choix_projet_1_valide" id="choix_projet_1_valide">Fait</span></strong>  </label>
                                            </div>
                                        </div>

                                        <div class="">
                                            <div class="form-check">
                                                <input class="form-check-input choix_projet_2" value="{{$item->id}}"
                                                    type="checkbox" id="projet_choix_2_{{$item->id}}">
                                                <label class="form-check-label" for="projet_choix_2_{{$item->id}}">2
                                                    <sup>em</sup>
                                                    choix<strong> (35 point) <span class="text-success choix_projet_2_valide" id="choix_projet_2_valide">Fait</span></strong></label>
                                            </div>
                                        </div>

                                        <div class="">
                                            <div class="form-check">
                                                <input class="form-check-input choix_projet_3" value="{{$item->id}}"
                                                    type="checkbox" id="projet_choix_3_{{$item->id}}">
                                                <label class="form-check-label" for="projet_choix_3_{{$item->id}}">3
                                                    <sup>em</sup>
                                                    choix<strong> (15 point) <span class="text-success choix_projet_3_valide" id="choix_projet_3_valide">Fait</span></strong></label>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Fermer</button>
                                <button type="button" class="btn btn-success send_pull"
                                    style="display: none">Envoyé</button>

                            </div>
                        </div>
                    </div>
                </div>
                        
                    @endforeach

                    
                </div>
                <div class="" id="parti" value="{{$id}}"></div>
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
