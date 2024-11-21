@extends('component.adminHome')

@section('title')
    Détaille groupe
@endsection

@section('act_group')
    active
@endsection

@section('contenu')
    <div class="container-fluid">
        <div class="page-header border-radius-xl mt-4" style="height: 50px">
        </div>
        <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
            <div class="row gx-4">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        {{-- <img src="{{ asset('/images/user.png') }}" alt="pro&   a"(-è'"zaq") --}}
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            {{ $groupe->nom }}
                        </h5>
                        <p class="mb-0 font-weight-bold text-sm">
                            {{ $groupe->description }} </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12 col-xl-4" style="margin-top: 20px">
                <div class="card h-100">
                    <div class="card-header pb-0 p-3">
                        <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                                <h6 class="mb-0">Membre du groupe</h6>
                            </div>
                            <div class="col-md-4 text-end">
                                <a data-bs-toggle="modal" data-bs-target="#add_parti">
                                    <i class="fa fa-plus text-secondary text-sm" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="" data-bs-original-title="Edit Profile"
                                        aria-label="Edit Profile"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        
                        <ul class="list-group">

                            @foreach ($groupe->participant as $item)
                            <a class="" href="{{ URL::to('/admin/ajout/participant/groupe/' . $item->id . '/' . $groupe->id) }}">
                            <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                               
                                    <div class="avatar me-3">
                                        <img src="/images/user.png" alt="kal" class="border-radius-lg shadow">
                                    </div>
                                    <div class=" d-flex align-items-start flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">{{ $item->nom . ' ' . $item->prenom }}</h6>
                                        <p class="mb-0 text-xs">{{ $item->email }}</p>
                                    </div>
                                </li>
                            </a>
                            @endforeach
                            
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-4" style="margin-top: 20px">
                <div class="card h-100">
                    <div class="card-header pb-0 p-3">
                        <h6 class="mb-0">Information</h6>

                    </div>

                    <div class="card-body p-3">
                        {{-- <ul class="list-group">
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong
                                    class="text-dark">Université:</strong> &nbsp;</li>
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong
                                    class="text-dark">Niveau:</strong> &nbsp; </li>
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong
                                    class="text-dark">Université:</strong> &nbsp; </li>
                        </ul> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="add_parti" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter un menbre</h5>
                </div>
                <div class="modal-body card-body">
                    <div class="mb-3">
                        <label>Recherche</label>

                        <input type="text" id="recherche" class="form-control" />
                    </div>
                    <div class="row" id="liste_participants">

                        @foreach ($participants as $item)
                            <a class="col-6 list-group-item border-0 d-flex align-items-center px-0 mb-2"
                                href="{{ URL::to('/admin/ajout/participant/groupe/' . $item->id . '/' . $groupe->id) }}">
                                <div class="avatar me-3">
                                    <img src="/images/user.png" alt="kal" class="border-radius-lg shadow">
                                </div>
                                <div class=" d-flex align-items-start flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">{{ $item->nom . ' ' . $item->prenom }}</h6>
                                    <p class="mb-0 text-xs">{{ $item->email }}</p>
                                </div>
                            </a>
                        @endforeach


                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>

    <div class="" id="id_groupe" value="{{$groupe->id}}"></div>

@endsection


@section('script_contenu')
    <script>
        // setTimeout(get_groupe, 0);

        
    </script>
@endsection
