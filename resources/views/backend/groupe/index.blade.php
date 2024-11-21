@extends('component.adminHome')

@section('title')
    Groupe
@endsection

@section('act_group')
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
                                <h4>Liste des groupes</h4>
                            </div>
                            <div class="col-6 text-end">
                                <a class="btn bg-gradient-dark mb-0" data-bs-toggle="modal" data-bs-target="#add_group"><i
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
                                            Nom</th>
                                            <th
                                            class="text-uppercase text-secondary text-sm font-weight-bolder text-center opacity-7 ps-2">
                                            Description</th>
                                        <th
                                            class="text-uppercase text-secondary text-sm font-weight-bolder text-center opacity-7 ps-2">
                                            date</th>
                                        <th
                                            class="text-uppercase text-secondary text-sm font-weight-bolder text-center opacity-7 ps-2">
                                            Idee de projet</th>
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


        <div class="modal fade" id="add_group" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ajouter un groupe</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body card-body">
                        <div class="alert alert-danger" id="message_validation_error" style="display: none">Veiller remplire tout
                            les champs !</div>
                        <form role="form text-left">
                            <div class="mb-3">
                                <input type="text" class="form-control" id="nom" placeholder="nom"
                                    aria-label="titre" aria-describedby="email-addon">
                            </div>

                            <div class="mb-3">
                                <label>Ideé de projet</label>
                                <select name="select_even" id="projet" class="form-select">
                                    @foreach ($projets as $item)
                                    <option value="{{$item->id}}">{{$item->description}}</option>
                                    @endforeach
                                    <option value="" disabled="disabled" selected hidden="">choisissez un projet
                                    </option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <textarea type="text" class="form-control" id="description"
                                    aria-label="description">Description</textarea>
                            </div>
                        </form>
                    </div>
                    <div class="row col-12 new_modal-footer">
                        <div class="col-6">
                            <div class="row" id="loading_add_group" style="display: none">
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
                            <button type="button" class="btn btn-primary" id="send_new_groupe">Ajouter</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection


@section('script_contenu')
    <script>
        setTimeout(get_groupe, 0);
    </script>
@endsection
