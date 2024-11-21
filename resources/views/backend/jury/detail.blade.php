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
            <h3>Detail des notes du projet</h3>
            <div class="row">
                
                @for ($i = 1; $i <= 5; $i++)
                <div class="box">
                    @if($i == 1)
                        <p class="text-primary fw-bold">President du Jury</p>
                    @else
                        <p class="text-primary fw-bold">Jury{{ $i }}</p>
                    @endif
                </div>
                
                    <div class="col-lg-10 mx-auto">
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table table-striped align-items-center justify-content-center mb-0" id="event_table">
                                    <thead>
                                        <tr>
                                            
                                            <th class="text-uppercase text-secondary text-sm font-weight-bolder text-center opacity-7 ps-7">
                                                Critere
                                            </th>
                                            <th class="text-uppercase text-secondary text-sm font-weight-bolder text-center opacity-7 ps-7">
                                                coefficient
                                            </th>
                                            <th class="text-uppercase text-secondary text-sm font-weight-bolder text-center opacity-7 ps-3" style="width: 20%">
                                                Note
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody id="table_body">
                                        
                                        @foreach ($note_critere as $item)
                                            @if ($item->ci2023_jurie_id == $i)
                                                <tr>
                                                    <th scope="row" class="text-uppercase text-secondary text-sm font-weight-bolder text-center ps-2">
                                                        {{ $item->critere }}
                                                    </th>
                                                   
                                                    <td class="text-uppercase text-secondary text-sm font-weight-bolder text-center ps-7">
                                                        {{ $item->coefficient }}
                                                    </td>
                                                    <td class="text-uppercase text-secondary text-sm font-weight-bolder text-center ps-3">
                                                        {{ $item->note }}
                                                    </td>
                                                </tr>
                                            @endif
                                            
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
        

        {{-- <div class="container">
            <h3> detail des notes du projet</h3>
            <div class="row">






                @for ($i = 1; $i <= 5; $i++)
                     @if($i == 1)
                        <p>President du Jury</p>
                        @else
                        <p>Jury{{ $i }}</p>
                    @endif
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center justify-content-center mb-0" id="event_table">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder text-center opacity-7 ps-2">
                                            Numero critere</th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder text-center opacity-7 ps-7">
                                            critere</th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder text-center opacity-7 ps-3">
                                            Note</th>
                                    </tr>
                                </thead>
                                <tbody id="table_body">
                                    @foreach ($note_critere as $item)
                                        @if ($item->ci2023_jurie_id == $i)
                                            <tr>
                                                <th scope="row"
                                                    class="text-uppercase text-secondary text-sm font-weight-bolder text-center ps-2">
                                                    {{ $item->critere }}</th>
                                                <td class="text-uppercase text-secondary text-sm font-weight-bolder text-center ps-7">
                                                    {{ $item->description_critere }}</td>
                                                <td class="text-uppercase text-secondary text-sm font-weight-bolder text-center ps-3">
                                                    {{ $item->note }}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endfor

               
                            
                   
            </div>
        </div> --}}

        

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
