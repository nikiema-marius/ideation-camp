@extends('component.adminHome')

@section('title')
    Détaille Evènement
@endsection

@section('act_even')
    active
@endsection

@section('contenu')
    <div class="container-fluid py-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="row card-header ">
                        <div class="row col-12">
                            <div class="col-6">

                                <div class="alert alert-success" id="message_validation_success" style="display: none">
                                    Participant
                                    ajouté avec success</div>
                            </div>
                            <div class="col-6 text-end">
                                @if ($evenement->etat == 0)
                                    <a href="{{ URL::to('admin/evenement/active/' . $evenement->id) }}"
                                        class="btn bg-gradient-success mb-0">Activer</a>
                                @else
                                    @if ($evenement->etat == 1)
                                        <a href="{{ URL::to('admin/evenement/active/' . $evenement->id) }}"
                                            class="btn bg-gradient-danger mb-0">Cloturer</a>
                                    @endif
                                @endif
                            </div>

                        </div>
                        <div class="row card-header ">
                            <div class="col-6">
                                <h3>{{ $evenement->titre }}</h3>
                            </div>
                            <div class="col-6 text-end">
                                <h4 id="nbr_participant">Nombre : 0</h4>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0" id="participant_table">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Participant
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Date</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Campeur</th>

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
    <div class="" id="id_evenement" style="display: none" value="{{ $evenement->id }}"></div>
@endsection

@section('script_contenu')
    <script>
        setTimeout(get_event_participant, 0);
    </script>
@endsection
