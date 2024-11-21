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

        <div class="container">
            <section class=" mb-8 ">


                <h1 class="mb-2 mt-5">Listes des criteres et leurs coefficients </h1>
                {{-- <h1 class="mb-2 mt-5"><button> Ajouter critere</button> </h1> --}}

                {{--  --}}
                <div>
                    @if (session('msg_success'))
                        <div class="alert alert-success" id="message_validation">{{ session('msg_success') }}</div>
                    @endif
                    @if (session('msg_error'))
                        <div class="alert alert-danger" id="message_validation">{{ session('msg_error') }}</div>
                    @endif
                </div>

                <!-- Bouton pour ouvrir le modal -->
                <a class="btn bg-gradient-dark mb-0" data-bs-toggle="modal" data-bs-target="#add_group"><i
                        class="fa fa-plus"></i> Ajouter critere</a>

                <!-- Modal -->
                <div class="modal fade" id="add_group" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ajouter un groupe</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body card-body">
                                <div class="alert alert-danger" id="message_validation_error" style="display: none">
                                    Veiller remplire tout
                                    les champs !</div>

                                <form role="form text-left" method="post"
                                    action={{ URL::to('/jury/critere/ajoutcritere') }}>
                                    {{ csrf_field() }}
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="critere" placeholder="Critere"
                                            aria-label="titre" aria-describedby="email-addon" required>
                                    </div>

                                    <div class="mb-3">
                                        <input type="number" class="form-control" name="coefficient"
                                            placeholder="Coefficient du critere" aria-label="titre" step="0.01"
                                            aria-describedby="email-addon" required>
                                    </div>


                                    <button type="submit" class="btn btn-primary" id="send_new_groupe">Ajouter</button>
                                    <button type="reset" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Fermer</button>
                                </form>
                            </div>
                            <div class="row col-12 new_modal-footer">

                                <div class="col-6 modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Fermer</button>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                {{--  --}}


                {{--  --}}


                <div class="container-fluid container1">
                    <div class="table-responsive">
                        <table class="table align-items-center justify-content-center mb-0" id="event_table">
                            <thead>
                                <tr>
                                    <th
                                        class="text-uppercase text-secondary text-sm font-weight-bolder text-center opacity-7 ps-2">
                                        Numero</th>
                                    <th
                                        class="text-uppercase text-secondary text-sm font-weight-bolder text-center opacity-7 ps-7">
                                        critere</th>
                                    <th
                                        class="text-uppercase text-secondary text-sm font-weight-bolder text-center opacity-7 ps-3">
                                        Coefficient</th>
                                    <th
                                        class="text-uppercase text-secondary text-sm font-weight-bolder text-center opacity-7 ps-3">
                                        parametres</th>
                                </tr>
                            </thead>
                            <tbody id="table_body">
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($criteres as $item)
                                    <tr>
                                        <th scope="row"
                                            class="text-uppercase text-secondary text-sm font-weight-bolder text-center ps-2">
                                            {{ $i }}</th>
                                        <td
                                            class="text-uppercase text-secondary text-sm font-weight-bolder text-center ps-7">
                                            {{ $item->critere }}</td>
                                        <td
                                            class="text-uppercase text-secondary text-sm font-weight-bolder text-center ps-3">
                                            {{ $item->coefficient }}</td>
                                        <td
                                            class="text-uppercase text-secondary text-sm font-weight-bolder text-center ps-3">
                                            <div class="btn-group" role="group">
                                                <a href="{{ url('/jury/critere/modifier_critere/' . $item->id) }}"><button
                                                        type="button"
                                                        class="btn btn-primary mx-2">Modifier</button></a>
                                                <button type="button" class="btn btn-danger mx-2"
                                                    onclick="confirmDelete({{ $item->id }})">Supprimer</button>
                                            </div>
                                        </td>
                                    </tr>
                                    @php
                                        $i++;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>



                {{-- <div class="container1">
                    <table class="table align-items-center justify-content-center mb-0" id="event_table">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-sm font-weight-bolder text-center opacity-7 ps-2">
                                    Numero</th>
                                <th class="text-uppercase text-secondary text-sm font-weight-bolder text-center opacity-7 ps-7">
                                    critere</th>
                                <th class="text-uppercase text-secondary text-sm font-weight-bolder text-center opacity-7 ps-3">
                                    Coefficient</th>
                                <th class="text-uppercase text-secondary text-sm font-weight-bolder text-center opacity-7 ps-3">
                                    parametres</th>
                                    
                            </tr>
                        </thead>
                        
                        <tbody id="table_body">
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($criteres as $item)
                                <tr>
                                    <th scope="row" class="text-uppercase text-secondary text-sm font-weight-bolder text-center ps-2">
                                        {{ $i }}</th>
                                    <td class="text-uppercase text-secondary text-sm font-weight-bolder text-center ps-7">
                                        {{ $item->critere }}</td>
                                    <td class="text-uppercase text-secondary text-sm font-weight-bolder text-center ps-3">
                                        {{ $item->coefficient }}</td>
                                    <td class="text-uppercase text-secondary text-sm font-weight-bolder text-center ps-3">
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn btn-primary mx-2"><a href="{{url('/jury/critere/modifier_critere/'.$item->id)}}">Modifier</a></button>
                                            <button type="button" class="btn btn-danger mx-2" onclick="confirmDelete({{ $item->id }})">Supprimer</button>
                                        </div>
                                    </td>
                                </tr>
                                @php
                                    $i++;
                                @endphp
                            @endforeach
                        </tbody>
                        
                    </table>
                </div> --}}

                {{--  --}}


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


            <script>
                function confirmDelete(id) {
                    if (confirm("Êtes-vous sûr(e) de vouloir supprimer ?")) {
                        window.location.href = "critere/supprimercritere/" + id;
                    }
                }
            </script>


            <script src="{{ asset('./admin/assets/js/soft-ui-dashboard.min.js?v=1.0.3') }}"></script>
            <script src="{{ asset('./js/main.js') }}"></script>
</body>

</html>
