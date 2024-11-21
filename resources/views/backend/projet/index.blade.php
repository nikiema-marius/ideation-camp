@extends('component.adminHome')

@section('title')
    Projet
@endsection

@section('act_projet')
    active
@endsection

@section('contenu')
    <div class="container-fluid py-4">

        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="alert alert-success" id="message_validation_success" style="display: none">Evenement ajouté
                            avec success</div>

                        <div class="row card-header ">
                            <div class="col-6">
                                <h4>Liste des Projets</h4>
                            </div>
                            <div class="col-6 text-end">
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center justify-content-center mb-0" id="event_table">
                                <thead>
                                    <tr>

                                        <th
                                            class="text-uppercase text-secondary text-sm font-weight-bolder  opacity-7 ps-2 w-20">
                                            Titre</th>

                                        <th
                                            class="text-uppercase text-secondary text-center text-sm font-weight-bolder  opacity-7 ps-2">
                                            status</th>

                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7 ps-2">
                                            vote</th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7 ps-2">
                                            Participant</th>
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

    <div class="modal fade" id="edt_project" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modifier projet</h5>
                </div>
                <div class="modal-body card-body">
                    <div class="alert alert-danger" id="message_validation_error" style="display: none"></div>
                    <form role="form text-left">
                        <div class="mb-3">
                            <label>Status</label>

                            <select name="select_even" id="select_even" class="form-select" required>

                                <option value="1">Actif</option>
                                <option value="1">non actif</option>
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

@endsection


@section('script_contenu')
    <script>
        setTimeout(get_project, 0);
    </script>
@endsection
