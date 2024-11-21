@extends('component.adminHome')

@section('title')
    Evenement
@endsection

@section('act_even')
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
                                <h4>Liste des évènnements</h4>
                            </div>
                            <div class="col-6 text-end">
                                <a class="btn bg-gradient-dark mb-0" data-bs-toggle="modal" data-bs-target="#add_event"><i
                                        class="fa fa-plus"></i> Ajouter</a>
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
                                            heure</th>
                                        <th
                                            class="text-uppercase text-secondary text-sm font-weight-bolder text-center opacity-7 ps-2">
                                            durée</th>
                                        <th
                                            class="text-uppercase text-secondary text-sm font-weight-bolder text-center opacity-7 ps-2">
                                            Communicateur</th>
                                        <th
                                            class="text-uppercase text-secondary text-sm font-weight-bolder text-center opacity-7 ps-2">
                                            Status</th>
                                        <th></th>
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


        <div class="modal fade" id="add_event" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ajouter un évènement</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body card-body">
                        <div class="alert alert-danger" id="message_validation" style="display: none">Veiller remplire tout
                            les champs !</div>
                        <form role="form text-left">
                            <div class="mb-3">
                                <input type="text" class="form-control" id="titre" placeholder="titre"
                                    aria-label="titre" aria-describedby="email-addon">
                            </div>

                            <div class="row mb-3">
                                <div class="col-lg-12">
                                    <input type="date" class="form-control" id="date" placeholder="date"
                                        aria-label="date" aria-describedby="email-addon">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="row col-lg-6 col-md-6">
                                    <label>heure début de l'évènement</label>
                                    <div class="col-lg-6 col-md-6">
                                        <input type="text" class="form-control" id="heure_debut" placeholder="heure"
                                            aria-label="heure" aria-describedby="email-addon">
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <input type="text" class="form-control" id="minute_debut" placeholder="minute"
                                            aria-label="minute" aria-describedby="email-addon">
                                    </div>
                                </div>

                                <div class="row col-lg-6 col-md-6">
                                    <label>Durée de l'évènement</label>
                                    <div class="col-lg-6 col-md-6">
                                        <input type="text" class="form-control" id="heure_fin" placeholder="heure"
                                            aria-label="heure" aria-describedby="email-addon">
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <input type="text" class="form-control" id="minute_fin" placeholder="minute"
                                            aria-label="minute" aria-describedby="email-addon">
                                    </div>
                                </div>

                            </div>

                            <div class="mb-3">
                                <input type="text" class="form-control" id="communicateur" placeholder="Communicateur"
                                    aria-label="Communicateur">
                            </div>
                        </form>
                    </div>
                    <div class="row col-12 new_modal-footer">
                        <div class="col-6">
                            <div class="row" id="loading_add_event" style="display: none">
                                <div class="col-6 cube">
                                    <div class="face front"></div>
                                    <div class="face back"></div>
                                    <div class="face top"></div>
                                    <div class="face bottom"></div>
                                    <div class="face left"></div>
                                    <div class="face right"></div>
                                </div>
                                <div class="col-6">Chargement...</div>

                            </div>
                        </div>
                        <div class="col-6 modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                            <button type="button" class="btn btn-primary" id="send_new_event">Ajouter</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="edit_event" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modifier un évènement</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body card-body">
                        <div class="alert alert-danger" id="message_validation2" style="display: none">Veiller remplire
                            tout les champs !</div>
                        <form role="form text-left">
                            <div class="mb-3">
                                <input type="text" class="form-control" id="titre2" placeholder="titre"
                                    aria-label="titre" aria-describedby="email-addon">
                            </div>

                            <div class="row mb-3">
                                <div class="col-lg-12">
                                    <input type="date" class="form-control" id="date2" placeholder="date"
                                        aria-label="date" aria-describedby="email-addon">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="row col-lg-6 col-md-6">
                                    <label>heure début de l'évènement</label>
                                    <div class="col-lg-6 col-md-6">
                                        <input type="text" class="form-control" id="heure_debut2" placeholder="heure"
                                            aria-label="heure" aria-describedby="email-addon">
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <input type="text" class="form-control" id="minute_debut2"
                                            placeholder="minute" aria-label="minute" aria-describedby="email-addon">
                                    </div>
                                </div>

                                <div class="row col-lg-6 col-md-6">
                                    <label>Durée de l'évènement</label>
                                    <div class="col-lg-6 col-md-6">
                                        <input type="text" class="form-control" id="heure_fin2" placeholder="heure"
                                            aria-label="heure" aria-describedby="email-addon">
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <input type="text" class="form-control" id="minute_fin2" placeholder="minute"
                                            aria-label="minute" aria-describedby="email-addon">
                                    </div>
                                </div>

                            </div>

                            <div class="mb-3">
                                <input type="text" class="form-control" id="communicateur2"
                                    placeholder="Communicateur" aria-label="Communicateur">
                            </div>
                        </form>
                    </div>
                    <div class="row col-12 new_modal-footer">
                        <div class="col-6">
                            <div class="row" id="loading_edit_event" style="display: none">
                                <div class="col-6 cube">
                                    <div class="face front"></div>
                                    <div class="face back"></div>
                                    <div class="face top"></div>
                                    <div class="face bottom"></div>
                                    <div class="face left"></div>
                                    <div class="face right"></div>
                                </div>
                                <div class="col-6">Chargement...</div>

                            </div>
                        </div>
                        <div class="col-6 modal-footer">
                            
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        <button type="button" class="btn btn-primary" id="send_edit_event">Modifier</button>
                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script_contenu')
    <script>
        setTimeout(get_event, 0);
    </script>
@endsection
