@extends('component.adminHome')

@section('title')
    Participant détaille
@endsection

@section('act_partic')
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
                        <img src="{{ asset('/images/user.png') }}" alt="profile_image"
                            class="w-100 border-radius-lg shadow-sm">
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            {{ $participant->nom . ' ' . $participant->prenom }}
                        </h5>
                        <p class="mb-0 font-weight-bold text-sm">
                            {{ $participant->email }}
                        </p>
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
                        <h6 class="mb-0">Membre groupe</h6>
                    </div>
                    <div class="card-body p-3">
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-4" style="margin-top: 20px">
                <div class="card h-100">
                    <div class="card-header pb-0 p-3">
                        <h6 class="mb-0">Information</h6>

                    </div>

                    <div class="card-body p-3">
                        <ul class="list-group">
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong
                                    class="text-dark">Université:</strong> &nbsp; {{ $participant->universite }}</li>
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong
                                    class="text-dark">Niveau:</strong> &nbsp; {{ $participant->niveau_etude }}</li>
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong
                                    class="text-dark">Université:</strong> &nbsp; {{ $participant->universite }}</li>
                        </ul>
                    </div>
                </div>
            </div>
            @if ($participant->projet)
                <div class="col-12 col-xl-4" style="margin-top: 20px">
                    <div class="card h-100">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-md-8 d-flex align-items-center">
                                    <h6 class="mb-0">Idée de projet</h6>
                                </div>
                                {{-- <div class="col-md-4 text-end">
                              <a href="javascript:;">
                                <i class="fas fa-plus text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title=""></i>
                                </a>
                            </div> --}}
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <p class="text-sm">
                                {{ $participant->projet->description }}
                            </p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>



    <div class="container-fluid py-4">

        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="alert alert-success" id="message_validation_success" style="display: none">Participant ajouter
                            success</div>

                        <div class="row card-header ">
                            <div class="col-lg-6 col-md-6">
                                <h4 class="">évènnements participés</h4>
                            </div>
                            <div class="col-lg-6 col-md-6 text-end">
                                <a class="btn bg-gradient-dark mb-0" data-bs-toggle="modal" data-bs-target="#add_event"><i
                                        class="fas fa-plus"></i> Ajouter</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center justify-content-center mb-0" id="event_table">
                                <thead>
                                    <tr>

                                        <th
                                            class="text-uppercase text-secondary text-sm font-weight-bolder text-center opacity-7 ps-2">
                                            Evenement</th>
                                        <th
                                            class="text-uppercase text-secondary text-sm font-weight-bolder text-center opacity-7 ps-2">
                                            date</th>
                                        <th
                                            class="text-uppercase text-secondary text-sm font-weight-bolder text-center opacity-7 ps-2">
                                            Communicateur</th>
                                        <th
                                            class="text-uppercase text-secondary text-sm font-weight-bolder text-center opacity-7 ps-2">
                                            Status</th>
                                        {{-- <th></th> --}}
                                    </tr>
                                </thead>
                                <tbody id="table_body">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <div class="modal fade" id="add_event" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter
                        {{ $participant->nom . ' ' . $participant->prenom }} a un évènement</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body card-body">
                    <div class="alert alert-danger" id="message_validation_error" style="display: none">Participant ajouter
                        success</div>
                    <form role="form text-left">
                        <div class="mb-3">
                            <label>Evènements actifs</label>

                            <select name="select_even" id="select_even" class="form-select" required>
                                @foreach ($evenement as $item)
                                
                                <option value="{{$item->id}}">{{$item->titre}}</option>
                                @endforeach
                                <option value="" disabled="disabled" {{count($evenement) == 0 ? "selected" : ""}} hidden="">Aucun évènement actif
                                </option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="button" class="btn btn-primary" id="send_new_participant_event">Ajouter</button>
                </div>
            </div>
        </div>
    </div>

    <div class="" id="participant_id" style="display: none" value="{{$participant->id}}"></div>
@endsection

@section('script_contenu')
<script>setTimeout(get_participant_event, 0);</script>
@endsection
