@extends('component.adminHome')

@section('title')
    Participants
@endsection

@section('act_partic')
    active
@endsection

@section('contenu')
    <div class="container-fluid py-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="row card-header ">
                        <div class="alert alert-success" id="message_validation_success" style="display: none">Participant ajouté avec success</div>

                        <div class="col-6">
                            <h4>Liste des participants</h4>
                        </div>
                        <div class="col-6 text-end">
                            <a class="btn bg-gradient-dark mb-0" data-bs-toggle="modal" data-bs-target="#import_data">
                                <i class="fa fa-file-import pl-2"></i> Importer</a>
                            <a class="btn bg-gradient-dark mb-0" data-bs-toggle="modal" data-bs-target="#add_parti"><i
                                    class="fa fa-plus"></i> Nouveau</a>
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
                                        universite</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        niveau</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Projet</th>
                                    <th class="text-secondary opacity-7"></th>
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

    <div class="modal fade" id="add_parti" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter un participant</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body card-body">
                    <div class="alert alert-danger" id="message_validation" style="display: none">Veuillez remplire tout les
                        champs !</div>
                    <form role="form text-left">

                        <div class="row mb-3">
                            <div class="row col-lg-12 col-md-12">
                                <label>Informations personnelles</label>
                                <div class="col-lg-6 col-md-6">
                                    <input type="text" class="form-control" id="nom" placeholder="Nom"
                                        aria-label="nom">
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <input type="text" class="form-control" id="prenom" placeholder="prénom"
                                        aria-label="prenom">
                                </div>

                            </div>
                        </div>
                        <div class="row mb-3">

                            <div class="row col-lg-12 col-md-12">
                                <div class="col-lg-6 col-md-6">
                                    <input type="text" class="form-control" id="email" placeholder="adresse mail"
                                        aria-label="email">
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <input type="text" class="form-control" id="sex" placeholder="Sex"
                                        aria-label="sex">
                                </div>

                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="row col-lg-12 col-md-12">
                                <label>Education</label>
                                <div class="col-lg-6 col-md-6">
                                    <input type="text" class="form-control" id="universite" placeholder="Université"
                                        aria-label="universite">
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <input type="text" class="form-control" id="niveau" placeholder="Niveau"
                                        aria-label="niveau">
                                </div>

                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="row col-lg-12 col-md-12">
                                <div class="col-lg-6 col-md-6">
                                    <input type="number" class="form-control" id="annee_passe_univ" placeholder="nombre Année passé a l'université"
                                        aria-label="universite">
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <input type="text" class="form-control" id="annee_depart_univ" placeholder="nombre Année restant pour l'université"
                                        aria-label="niveau">
                                </div>

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label>Experience</label>
                            <div class="row col-lg-12 col-md-12">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="experience_entrep" >
                                        <label class="form-check-label" for="experience_entrep">experience en entreprenariat</label>
                                      </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="projet_incub" >
                                        <label class="form-check-label" for="projet_incub">A un projet incubateur</label>
                                      </div>
                                </div>
                            </div>

                        </div>

                        <div class="row mb-3">

                            <div class="row col-lg-12 col-md-12">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="projet_numerique" >
                                        <label class="form-check-label" for="projet_numerique">A un projet numerique</label>
                                      </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="projet_inter_diciplinaire" >
                                        <label class="form-check-label" for="projet_inter_diciplinaire">Menbre d'un projet interdiciplinaire</label>
                                      </div>
                                </div>
                            </div>

                        </div>

                        <div class="mb-3">
                            <textarea type="text" class="form-control" id="motivation" placeholder="motivation"
                                aria-label="motivation"></textarea>
                        </div>

                        <div class="mb-3">
                            <label>Idée de projet</label>
                            <textarea type="text" class="form-control" id="projet" placeholder="Idée de projet"
                                aria-label="Idée de projet"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="button" class="btn btn-primary" id="send_new_pariticpant">Ajouter</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="edit_participant" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modifier un participant</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body card-body">
                    <div class="alert alert-danger" id="edit_message_validation" style="display: none">Veuillez remplire tout les
                        champs !</div>
                    <form role="form text-left">

                        <div class="row mb-3">
                            <div class="row col-lg-12 col-md-12">
                                <label>Informations personnelles</label>
                                <div class="col-lg-6 col-md-6">
                                    <input type="text" class="form-control" id="nom2" placeholder="Nom"
                                        aria-label="nom">
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <input type="text" class="form-control" id="prenom2" placeholder="prénom"
                                        aria-label="prenom">
                                </div>

                            </div>
                        </div>
                        <div class="row mb-3">

                            <div class="row col-lg-12 col-md-12">
                                <div class="col-lg-6 col-md-6">
                                    <input type="text" class="form-control" id="email2" placeholder="adresse mail"
                                        aria-label="email">
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <input type="text" class="form-control" id="sex2" placeholder="Sex"
                                        aria-label="sex">
                                </div>

                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="row col-lg-12 col-md-12">
                                <label>Education</label>
                                <div class="col-lg-6 col-md-6">
                                    <input type="text" class="form-control" id="universite2" placeholder="Université"
                                        aria-label="universite">
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <input type="text" class="form-control" id="niveau2" placeholder="Niveau"
                                        aria-label="niveau">
                                </div>

                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="row col-lg-12 col-md-12">
                                <div class="col-lg-6 col-md-6">
                                    <input type="number" class="form-control" id="annee_passe_univ2" placeholder="nombre Année passé a l'université"
                                        aria-label="universite">
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <input type="text" class="form-control" id="annee_depart_univ2" placeholder="nombre Année restant pour l'université"
                                        aria-label="niveau">
                                </div>

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label>Experience</label>
                            <div class="row col-lg-12 col-md-12">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="experience_entrep2" >
                                        <label class="form-check-label" for="experience_entrep2">experience en entreprenariat</label>
                                      </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="projet_incub2" >
                                        <label class="form-check-label" for="projet_incub2">A un projet incubateur</label>
                                      </div>
                                </div>
                            </div>

                        </div>

                        <div class="row mb-3">

                            <div class="row col-lg-12 col-md-12">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="projet_numerique2" >
                                        <label class="form-check-label" for="projet_numerique2">A un projet numerique</label>
                                      </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="projet_inter_diciplinaire2" >
                                        <label class="form-check-label" for="projet_inter_diciplinaire2">Menbre d'un projet interdiciplinaire</label>
                                      </div>
                                </div>
                            </div>

                        </div>

                        <div class="mb-3">
                            <textarea type="text" class="form-control" id="motivation2" placeholder="motivation"
                                aria-label="motivation"></textarea>
                        </div>
                    </form>
                </div>
                
                <div class="row col-12 new_modal-footer">
                    <div class="col-6">
                        <div class="row loading_edit_parti" style="display: none">
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
                        <button type="button" class="btn btn-primary" id="send_edit_participant">Modifier</button>
                   
                    </div>
                    
                   </div>

                
            </div>

            
        </div>
    </div>

    <div class="modal fade" id="import_data" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Importer liste de participants</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body card-body">

                    <form action="" method="POST">
                        {{ csrf_field() }}
                        <div class="row mb-3">
                            <div class="row col-lg-12 col-md-12">
                                <label>Fichier excel</label>
                                <div class="">
                                    <input type="file" class="form-control" id="fichier" placeholder="fichier"
                                        aria-label="fichier" required accept="xlsx">
                                </div>

                            </div>
                        </div>

                        <button type="type" class="btn bg-gradient-dark" id="">importer</button>

                    </form>

                </div>
               
            </div>
        </div>
    </div>

@endsection

@section('script_contenu')
<script>setTimeout(get_participant, 0);</script>
@endsection