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

    <link href="{{ asset('./admin/assets/css/note.css') }}" rel="stylesheet" />
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
            <div class="section">

                <div class=" section box">
                    <div class="row box">
                        <div class="col-8">
                            <h3>TITRE DU PROJET :</h3>
                            <p>{{ $projet->description }}</p>
                        </div>
                        <div class="col-4 sub-box">
                            <a class="d-block  border-radius-xl">
                                <img src="{{ asset('images/about1-1.png') }}" alt="img-flou-ombre"
                                    class="img-fluid  border-radius-lg img-thumbnail">
                            </a>
                        </div>
                    </div>



                    @if ($note)

                        <div class="note-content">
                            <form method="post" action={{ URL::to('/jury/note-critere-modifier') }}>
                                {{ csrf_field() }}
                                <input type="hidden" placeholder="" name="jury_id" value="{{ $jury }}">
                                <input type="hidden" value="{{ $increment = 1 }}">
                                <input type="hidden" value="{{ $critere = 'critere' }}">
                                <input type="hidden" placeholder="" name="projet_id" value=" {{ $id_projet }}">

                                @php
                                    $i = 1;
                                @endphp

                                @foreach ($note_modifier as $item)
                                    <div class="row">

                                        <div class="col-7 note_critere">
                                            <h4>{{ $i }}: {{ $item->critere }}</h4>
                                        </div>
                                        <div class="col-2 note_critere">
                                            <input type="hidden" name="critere[]" value="{{ $item->critere }}">
                                            <input type="number" name="coefficient[]" value="{{ $item->coefficient }}"
                                                readonly>
                                        </div>

                                        <div class="col-3 note_critere">
                                            <select class="form-select" name="note[]" required>
                                                <option selected> {{ $item->note }} </option>
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>

                                            </select>
                                        </div>

                                    </div>
                                    <input type="hidden" value="{{ $increment = $increment + 1 }}">
                                    @php
                                        $i++;
                                    @endphp
                                @endforeach

                                <div class="envoie">
                                    <button class="left-button btn btn-danger pull-right"
                                        type="reset">Annuler</button>
                                    <button class="right-button btn btn-success pull-right"
                                        type="submit">Modifier</button>
                                </div>

                        </div>
                        </form>
                </div>
            @else
                <div class="note-content">
                    <form method="post" action=" {{ URL::to('/jury/note-critere') }} ">
                        {{ csrf_field() }}
                        <input type="hidden" placeholder="" name="jury_id" value="{{ $jury }}">
                        <input type="hidden" placeholder="" name="projet_id" value=" {{ $id_projet }}">
                        @php
                            $i = 1;
                        @endphp


                        @foreach ($critere as $critere)
                            <div class="row">
                                <div class="col-7 note_critere">
                                    <h4>{{ $i }}: {{ $critere->critere }}</h4>
                                </div>
                                {{-- <div class="col-2 note_critere">
                                    <input type="hidden" name="critere[]" value="{{ $critere->critere }}">
                                    <input type="text" name="coefficient[]" value="{{ $critere->coefficient }}">
                                </div> --}}
                                <div class="col-2 note_critere">
                                    <input type="hidden" name="critere[]" value="{{ $critere->critere }}">
                                    <input type="number" name="coefficient[]" value="{{ $critere->coefficient }}"
                                        readonly>
                                </div>

                                <div class="col-3 note_critere">
                                    <select class="form-select" name="note[]" required>
                                        <option selected></option>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="3">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </div>
                            @php
                                $i++;
                            @endphp
                        @endforeach


                        <div class="envoie">
                            <button class="left-button btn btn-danger pull-right" type="reset">Annuler</button>
                            <button class="right-button btn btn-success pull-right" type="submit">envoyer</button>
                        </div>

                </div>
                </form>

            </div>

            @endif



            {{-- <div class="d-flex justify-content-center">
                <a href="{{ url('/jury/voté') }}"><button type="button" class="btn btn-primary">Noté le projet
                        suivant</button></a>
            </div> --}}



        </div>


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
