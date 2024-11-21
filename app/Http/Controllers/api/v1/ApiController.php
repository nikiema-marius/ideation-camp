<?php

namespace App\Http\Controllers\api\v1;

use Illuminate\Support\Facades\Session;

use App\Http\Controllers\backend\adminController;
use App\Http\Controllers\Controller;
use App\Models\Electeur;
use App\Models\Evenement;
use App\Models\EvenementParticipant;
use App\Models\Groupe;
use App\Models\Participant;
use App\Models\Projet;
use App\Models\Vote;
use Faker\Provider\ar_EG\Text;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use PHPUnit\TextUI\XmlConfiguration\Group;

class ApiController extends Controller
{
    function home()
    {
        return [
            "success" => true,
            "message" => "Bienvenu sur l'API Ideation Camp 2023",
            "data" => [
                "version" => "1.0.0",
                "langage" => app()->getLocale(),
                "support" => "lompolrnt@gmail.com"
            ]
        ];
    }

    function getEvenement()
    {

        $text = "";
        $evenements = [];

        $evenement = Evenement::where("etat", 1)->first();

        if ($evenement) {

            $this->autoActiveEvenement($evenement);


            $evenements[] = $evenement;

            switch ($evenement->etat) {
                case 0:
                    $color = "bg-gradient-dark";
                    $status = "En attente";
                    break;
                case 1:
                    $color = "bg-gradient-success";
                    $status = "En Cours";
                    break;
                case 2:
                    $color = "bg-gradient-danger";
                    $status = "Cloturé";
                    break;

                default:
                    $color = "";
                    $status = "";
            }

            $text = $text . '
            <tr>
                <td>
                <a class="" href="/admin/evenement/' . $evenement->id . '" >
                    <div class="d-flex px-2 ps-2">
                        
                        <div class="my-auto">
                         <h6 class="mb-0 ">' . $evenement->titre . '</h6>
                        </div>
                    </div>
                    </a>
                </td>
                <td>
                    <div class="d-flex align-items-center justify-content-center">
                        <span class="me-2  font-weight-bold">' . $evenement->date . '</span>

                    </div>
                </td>
                <td>
                    <div class="d-flex align-items-center justify-content-center">
                        <span class="me-2  font-weight-bold">' . $evenement->heure_debut . '</span>

                    </div>
                </td>
                <td class="align-middle text-center">
                    <div class="d-flex align-items-center justify-content-center">
                        <span class="me-2  font-weight-bold">' . $evenement->heure_fin . '</span>

                    </div>
                </td>

                <td class="align-middle text-center">
                    <div class="d-flex align-items-center justify-content-center">
                        <span class="me-2  font-weight-bold">' . $evenement->communicateur . '</span>

                    </div>
                </td>
               <td class="align-middle text-center">
                <span class="badge badge-sm ' . $color . '">' . $status . '</span>
            </td>

                <td class="align-middle">
                    <button class=" event btn btn-link text-secondary mb-0" aria-haspopup="true"
                        aria-expanded="false" data-bs-toggle="modal" data-bs-target="#edit_event" style="cursor: pointer" id="' . $evenement->id . '">
                        <i class="fa fa-edit text-xs"></i>
                    </button>
                </td>
            </tr>
            ';

            $evevement = Evenement::where("id", "<>", $evenement->id)->orderBy("id", "desc")->get();
        } else
            $evevement = Evenement::orderBy("id", "desc")->get();




        foreach ($evevement as $event) {

            $evenements[] = $event;

            $this->autoActiveEvenement($event);

            switch ($event->etat) {
                case 0:
                    $color = "bg-gradient-dark";
                    $status = "En attente";
                    break;
                case 1:
                    $color = "bg-gradient-success";
                    $status = "En Cours";
                    break;
                case 2:
                    $color = "bg-gradient-danger";
                    $status = "Cloturé";
                    break;

                default:
                    $color = "";
                    $status = "";
            }

            $text = $text . '
            <tr>
                <td>
                <a class="" href="/admin/evenement/' . $event->id . '" >
                    <div class="d-flex px-2 ps-2">
                        
                        <div class="my-auto">
                         <h6 class="mb-0 ">' . $event->titre . '</h6>
                        </div>
                    </div>
                    </a>
                </td>
                <td>
                    <div class="d-flex align-items-center justify-content-center">
                        <span class="me-2  font-weight-bold">' . $event->date . '</span>

                    </div>
                </td>
                <td>
                    <div class="d-flex align-items-center justify-content-center">
                        <span class="me-2  font-weight-bold">' . $event->heure_debut . '</span>

                    </div>
                </td>
                <td class="align-middle text-center">
                    <div class="d-flex align-items-center justify-content-center">
                        <span class="me-2  font-weight-bold">' . $event->heure_fin . '</span>

                    </div>
                </td>

                <td class="align-middle text-center">
                    <div class="d-flex align-items-center justify-content-center">
                        <span class="me-2  font-weight-bold">' . $event->communicateur . '</span>

                    </div>
                </td>
               <td class="align-middle text-center">
                <span class="badge badge-sm ' . $color . '">' . $status . '</span>
            </td>

                <td class="align-middle">
                    <button class=" event btn btn-link text-secondary mb-0" aria-haspopup="true"
                        aria-expanded="false" data-bs-toggle="modal" data-bs-target="#edit_event" style="cursor: pointer;" id="' . $event->id . '">
                        <i class="fa fa-edit text-xs" style="font-size: 20px"></i>
                    </button>
                </td>
            </tr>
            ';
        }

        return [
            "success" => true,
            "message" => "Liste des evenements disponible",
            "data" => $evenements,
            "body" => $text

        ];
    }

    // API MOBILE

    function getScanEvenement()
    {
        $evenements = [];

        $evenement = Evenement::select("id", "titre", "communicateur", "heure_debut", "heure_fin", "etat", "date")->where("etat", 1)->first();

        if ($evenement) {

            $evenements[] = $evenement;

            $evevement = Evenement::select("id", "titre", "communicateur", "heure_debut", "heure_fin", "etat", "date")->where([["id", "<>", $evenement->id], ["etat", "2"]])->orderBy("id", "desc")->get();
        } else
            $evevement = Evenement::select("id", "titre", "communicateur", "heure_debut", "heure_fin", "etat", "date")->where([["etat", "2"]])->get();


        foreach ($evevement as $event) {
            $evenements[] = $event;
        }

        return $evenements;
    }

    function getScanEvenementParticipant($id)
    {

        $evevement = Evenement::find($id);

        if (!$evevement) {
            return [];
        }

        $participant_evenements_id = EvenementParticipant::where([["id_evenement", $evevement->id]])->get("id_participant");

        $participants = Participant::select("id", "nom", "prenom", "email", "id_groupe")->whereIn("id", $participant_evenements_id)->get();

        return  $participants;
    }

    // ****************************************************************************


    // Evenement 

    function postEvenement(Request $request)
    {

        if ($request->titre == "" || $request->heure_debut == "" || $request->minute_debut == "" || $request->heure_fin == "" || $request->minute_fin == "" || $request->communicateur == "" || $request->date == "") {
            return [
                "success" => false,
                "message" => "Erreur ::Impossible d'ajouter un évènements recommencez SVP !",
                "data" => []
            ];
        }

        $evevement = new Evenement();

        $evevement->titre = $request->titre;
        $evevement->heure_debut = $request->heure_debut . 'h:' . $request->minute_debut . 'mn';
        $evevement->heure_fin = $request->heure_fin . 'h:' . $request->minute_fin . 'mn';
        $evevement->communicateur = $request->communicateur;
        $evevement->date = $request->date;
        $evevement->etat = 0;

        $evevement->save();

        $append_new_child = '
        <tr>
            <td>
                <div class="d-flex px-2 ps-2">
                    
                    <div class="my-auto">
                        <h6 class="mb-0 text-sm">' . $evevement->titre . '</h6>
                    </div>
                </div>
            </td>
            <td>
                <div class="d-flex align-items-center justify-content-center">
                    <span class="me-2 text-xs font-weight-bold">' . $evevement->date . '</span>

                </div>
            </td>
            <td>
                <div class="d-flex align-items-center justify-content-center">
                    <span class="me-2 text-xs font-weight-bold">' . $evevement->heure_debut . ':' . $evevement->minute_debut . '</span>

                </div>
            </td>
            <td class="align-middle text-center">
                <div class="d-flex align-items-center justify-content-center">
                    <span class="me-2 text-xs font-weight-bold">' . $evevement->heure_fin . ':' . $evevement->minute_fin . '</span>

                </div>
            </td>

            <td class="align-middle text-center">
                <div class="d-flex align-items-center justify-content-center">
                    <span class="me-2 text-xs font-weight-bold">' . $evevement->communicateur . '</span>

                </div>
            </td>
            <td class="align-middle text-center">
                <div class="d-flex align-items-center justify-content-center">
                    <span class="me-2 text-xs font-weight-bold">100%</span>
                    <div>
                        <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar"
                                aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"
                                style="width: 100%;"></div>
                        </div>
                    </div>
                </div>
            </td>

            <td class="align-middle">
                <button class="btn btn-link text-secondary mb-0" aria-haspopup="true"
                    aria-expanded="false">
                    <i class="fa fa-ellipsis-v text-xs"></i>
                </button>
            </td>
        </tr>
        ';
        return [
            "success" => true,
            "message" => "Liste des evenements disponible",
            "data" => $evevement,
            "child" => $append_new_child
        ];
    }

    function getEvenementDetaille($id)
    {

        $evevement = Evenement::find($id);

        if (!$evevement) {
            return [
                "success" => false,
                "message" => "Erreur :: Impossible de modifier l'évènement demandé !",
                "data" => []
            ];
        }

        return [
            "success" => true,
            "message" => "Detaille évènement",
            "data" => $evevement
        ];
    }

    function getEvenementActive()
    {

        $evevement = Evenement::where("etat", 1)->first();

        return [
            "success" => true,
            "message" => "Evènement  en cours",
            "data" => $evevement
        ];
    }

    function putEvenement($id, Request $request)
    {


        if ($request->titre == "" || $request->heure_debut == "" || $request->minute_debut == "" || $request->heure_fin == "" || $request->minute_fin == "" || $request->communicateur == "" || $request->date == "") {
            return [
                "success" => false,
                "message" => "Erreur ::Impossible d'ajouter un évènements recommencez SVP !",
                "data" => []
            ];
        }

        $evevement = Evenement::find($id);

        if (!$evevement) {
            return [
                "success" => false,
                "message" => "Erreur :: Impossible de modifier l'évènement demandé !",
                "data" => []
            ];
        }

        $evevement->titre = $request->titre;
        $evevement->heure_debut = $request->heure_debut . 'h:' . $request->minute_debut . 'mn';
        $evevement->heure_fin = $request->heure_fin . 'h:' . $request->minute_fin . 'mn';
        $evevement->communicateur = $request->communicateur;
        $evevement->date = $request->date;

        $evevement->update();

        $append_new_child = '
        <tr>
            <td>
                <div class="d-flex px-2 ps-2">
                    
                    <div class="my-auto">
                        <h6 class="mb-0 text-sm">' . $evevement->titre . '</h6>
                    </div>
                </div>
            </td>
            <td>
                <div class="d-flex align-items-center justify-content-center">
                    <span class="me-2 text-xs font-weight-bold">' . $evevement->date . '</span>

                </div>
            </td>
            <td>
                <div class="d-flex align-items-center justify-content-center">
                    <span class="me-2 text-xs font-weight-bold">' . $evevement->heure_debut . ':' . $evevement->minute_debut . '</span>

                </div>
            </td>
            <td class="align-middle text-center">
                <div class="d-flex align-items-center justify-content-center">
                    <span class="me-2 text-xs font-weight-bold">' . $evevement->heure_fin . ':' . $evevement->minute_fin . '</span>

                </div>
            </td>

            <td class="align-middle text-center">
                <div class="d-flex align-items-center justify-content-center">
                    <span class="me-2 text-xs font-weight-bold">' . $evevement->communicateur . '</span>

                </div>
            </td>
            <td class="align-middle text-center">
                <div class="d-flex align-items-center justify-content-center">
                    <span class="me-2 text-xs font-weight-bold">100%</span>
                    <div>
                        <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar"
                                aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"
                                style="width: 100%;"></div>
                        </div>
                    </div>
                </div>
            </td>

            <td class="align-middle">
                <button class="btn btn-link text-secondary mb-0" aria-haspopup="true"
                    aria-expanded="false">
                    <i class="fa fa-ellipsis-v text-xs"></i>
                </button>
            </td>
        </tr>
        ';
        return [
            "success" => true,
            "message" => "Liste des evenements disponible",
            "data" => $evevement,
            "child" => $append_new_child
        ];
    }

    // ****************************************************************************


    //Participant

    function postParticipant(Request $request)
    {


        if (!$request->nom || !$request->prenom || !$request->email || !$request->sex || !$request->universite || !$request->niveau_etude || !$request->annee_passe_univ || !$request->annee_depart_univ || !$request->motivation) {
            return [
                "success" => false,
                "message" => "Erreur ::Veuillez renseigner tout les champs SVP !",
                "data" => []
            ];
        }

        $participant = new Participant();

        $participant->nom = $request->nom;
        $participant->prenom = $request->prenom;
        $participant->email = $request->email;
        $participant->sex = $request->sex;
        $participant->universite = $request->universite;
        $participant->niveau_etude = $request->niveau_etude;
        $participant->annee_passe_univ = $request->annee_passe_univ;
        $participant->annee_depart_univ = $request->annee_depart_univ;
        $participant->motivation = $request->motivation;
        $participant->experience_entrep = $request->experience_entrep == "true" ? 1 : 0;
        $participant->projet_incub = $request->projet_incub == "true" ? 1 : 0;
        $participant->projet_numerique = $request->projet_numerique == "true" ? 1 : 0;
        $participant->projet_inter_diciplinaire = $request->projet_inter_diciplinaire == "true" ? 1 : 0;
        $participant->photo = $request->photo != null ? $request->photo : "";

        $participant->save();

        if ($request->projet) {

            $projet = new Projet();

            $projet->description = $request->projet;
            $projet->id_participant = $participant->id;
            $projet->status = false;
            $projet->save();
        }

        return [
            "success" => true,
            "message" => "Liste des evenements disponible",
            "data" => $participant,
        ];
    }

    function getParticipant()
    {

        $participants = Participant::get();
        $text = "";

        foreach ($participants as $participant) {
            $projet = "NON";
            $color = "bg-gradient-danger";
            if ($participant->projet) {
                $projet = "OUI";
                $color = "bg-gradient-success";
            }
            $text = $text . '
            <tr>
            <td>
                <a class="d-flex px-2 py-1" href="/admin/participant/' . $participant->id . '" >
                    <div>
                        <img src="/images/user.png" class="avatar avatar-sm me-3"
                            alt="user1">
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0">' . $participant->nom . ' ' . $participant->prenom . '</h6>
                        <p class="text-xs text-secondary mb-0">' . $participant->email . '</p>
                    </div>
                </a>
            </td>
            <td>
                <p class="font-weight-bold mb-0">' . $participant->universite . '</p>
            </td>
            <td class="align-middle text-center text-sm">

                <p class="font-weight-bold mb-0">' . $participant->niveau_etude . '</p>

            </td>
            <td class="align-middle text-center">
                <span class="badge badge-sm ' . $color . '">' . $projet . '</span>
            </td>
            <td class="align-middle">
                <a  class=" edit_participant text-secondary font-weight-bold text-xs"
                    data-toggle="tooltip" data-original-title="Edit user" data-bs-toggle="modal" data-bs-target="#edit_participant" style="cursor: pointer" id="' . $participant->id . '">
                        <i class="fa fa-edit text-lg" ></i>
                </a>
            </td>
        </tr>
            ';
        }

        return [
            "success" => true,
            "message" => "Liste des evenements disponible",
            "data" => $participants,
            "body" => $text

        ];
    }

    function getParticipantDetaille($id)
    {

        $participant = Participant::find($id);

        if (!$participant) {
            return [
                "success" => false,
                "message" => "Erreur :: Impossible de modifier l'évènement demandé !",
                "data" => []
            ];
        }

        return [
            "success" => true,
            "message" => "Detaille évènement",
            "data" => $participant
        ];
    }

    function putParticipant($id, Request $request)
    {


        if (!$request->nom || !$request->prenom || !$request->email || !$request->sex || !$request->universite || !$request->niveau_etude || !$request->annee_passe_univ || !$request->annee_depart_univ || !$request->motivation) {
            return [
                "success" => false,
                "message" => "Erreur ::Veuillez renseigner tout les champs SVP !",
                "data" => []
            ];
        }

        $participant = Participant::find($id);

        $participant->nom = $request->nom;
        $participant->prenom = $request->prenom;
        $participant->email = $request->email;
        $participant->sex = $request->sex;
        $participant->universite = $request->universite;
        $participant->niveau_etude = $request->niveau_etude;
        $participant->annee_passe_univ = $request->annee_passe_univ;
        $participant->annee_depart_univ = $request->annee_depart_univ;
        $participant->motivation = $request->motivation;
        $participant->experience_entrep = $request->experience_entrep == "true" ? 1 : 0;
        $participant->projet_incub = $request->projet_incub == "true" ? 1 : 0;
        $participant->projet_numerique = $request->projet_numerique == "true" ? 1 : 0;
        $participant->projet_inter_diciplinaire = $request->projet_inter_diciplinaire == "true" ? 1 : 0;
        $participant->photo = $request->photo != null ? $request->photo : "";

        $participant->update();

        return [
            "success" => true,
            "message" => "Données participant modifié avec succes",
            "data" => $participant,
        ];
    }

    function postParticipantToEvenement($id_participant, $id_evenement)
    {

        $evenement = Evenement::find($id_evenement);

        $participant = Participant::find($id_participant);
        if (!$evenement || !$participant) {
            return [
                "success" => false,
                "message" => "Participant ou evenement invalide",
                "data" => [],
            ];
        }

        $this->autoActiveEvenement($evenement);


        if ($evenement->etat != 1) {
            $message = "Evenement non activé !";

            if ($evenement->etat == 2)
                $message = "Evenement cloturé !";

            return [
                "success" => false,
                "message" => $message,
                "data" => [],
            ];
        }

        $participant_evenement = EvenementParticipant::where([["id_participant", $id_participant], ["id_evenement", $id_evenement]])->first();

        if ($participant_evenement) {
            return [
                "success" => false,
                "message" => "Participant(e) a déja participé",
                "data" => [],
            ];
        }



        $participant_evenement = new EvenementParticipant();

        $participant_evenement->id_participant = $id_participant;
        $participant_evenement->id_evenement = $id_evenement;

        $participant_evenement->save();

        return [
            "success" => true,
            "message" => "Participant(e) ajouter a " . $evenement->titre,
            "data" => []

        ];
    }

    function getParticipantToEvenement($id_participant)
    {

        $participant = Participant::find($id_participant);
        if (!$participant) {
            return [
                "success" => false,
                "message" => "Participant invalide",
                "data" => [],
            ];
        }

        $participant_evenements = EvenementParticipant::where([["id_participant", $id_participant]])->get();

        $text = "";

        foreach ($participant_evenements as $event) {

            switch ($event->evenement->etat) {
                case 0:
                    $color = "bg-gradient-dark";
                    $status = "En attente";
                    break;
                case 1:
                    $color = "bg-gradient-success";
                    $status = "En Cours";
                    break;
                case 2:
                    $color = "bg-gradient-danger";
                    $status = "Cloturé";
                    break;

                default:
                    $color = "";
                    $status = "";
            }
            $text = $text . '
            <tr>
                <td>
                    <div class="d-flex px-2 ps-2">
                        
                        <div class="my-auto">
                        <a class="" > <h6 class="mb-0 ">' . $event->evenement->titre . '</h6></a>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="d-flex align-items-center justify-content-center">
                        <span class="me-2  font-weight-bold">' . $event->created_at . '</span>

                    </div>
                </td>

                <td class="align-middle text-center">
                    <div class="d-flex align-items-center justify-content-center">
                        <span class="me-2  font-weight-bold">' . $event->evenement->communicateur . '</span>

                    </div>
                </td>

                <td class="align-middle text-center">
                <span class="badge badge-sm ' . $color . '">' . $status . '</span>
            </td>

            </tr>
            ';
        }

        return [
            "success" => true,
            "message" => "Liste des évènement Participés",
            "data" => $participant_evenements,
            "body" => $text
        ];
    }

    function getEvenementParticipant($id_evenement)
    {

        $evenement = Evenement::find($id_evenement);

        if (!$evenement) {
            return [
                "success" => false,
                "message" => "Evènement invalide",
                "data" => [],
            ];
        }

        $participant_evenements = EvenementParticipant::where([["id_evenement", $id_evenement]])->orderBy("created_at", "desc")->get();

        $text = "";
        $nbr = 0;
        $participant = [];

        foreach ($participant_evenements as $event) {

            $participant[] = $event->participant;
            $nbr++;

            $projet = "NON";
            $color = "bg-gradient-danger";
            if ($event->participant->projet) {
                $projet = "OUI";
                $color = "bg-gradient-success";
            }

            $text = $text . '
            <tr>
            <td>
                <a class="d-flex px-2 py-1" href="/admin/participant/' . $event->participant->id . '" >
                    <div>
                        <img src="/images/user.png" class="avatar avatar-sm me-3"
                            alt="user1">
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0">' . $event->participant->nom . ' ' . $event->participant->prenom . '</h6>
                        <p class="text-xs text-secondary mb-0">' . $event->participant->email . '</p>
                    </div>
                </a>
            </td>
            <td>
                <p class="font-weight-bold mb-0">' . $event->created_at . '</p>
            </td>
            <td class="align-middle text-center">
            <span class="badge badge-sm ' . $color . '">' . $projet . '</span>
            </td>
        </tr>
            ';
        }

        return [
            "success" => true,
            "message" => "Liste des Participants",
            "data" => $participant,
            "body" => $text,
            "nombre" => $nbr
        ];
    }


    // ****************************************************************************


    public function autoActiveEvenement(Evenement $evenement)
    {
        // if (Session::has("auto_close")) {

        $heure_even_debut = explode(":", $evenement->heure_debut);
        $heure_even_fin = explode(":", $evenement->heure_fin);

        $heure_even_debut = [intval($heure_even_debut[0]), intval($heure_even_debut[1])];
        $heure_even_fin = [intval($heure_even_fin[0]), intval($heure_even_fin[1])];

        $heure_even_debut = strtotime($evenement->date . " " . $heure_even_debut[0] . ":" . $heure_even_debut[1]);
        $heure_even_fin = strtotime(date("Y-m-d H:i", $heure_even_debut) . ' +' . $heure_even_fin[0] . ' hours +' . $heure_even_fin[1] . ' minutes');

        $date = strtotime(date("Y-m-d H:i"));

        if ($evenement->etat == 0 && (($heure_even_debut + 60) <= $date && $heure_even_fin > ($date - 60))) {
            $evenements = Evenement::where("etat", 1)->get();

            $evenement->etat = 1;
            $evenement->update();
        } else {
            if (($evenement->etat != 2) && ($heure_even_fin) < ($date)) {
                $evenement->etat = 2;
                $evenement->update();
            }
        }
        // }
    }


    // Idee de projet

    public function getProjet()
    {
        $projet = Projet::get();

        $text = [];
        $nbr_vote = 0;

        foreach ($projet as $item) {

            $count_vote = 0;
            foreach ($item->vote as $vote) {
                $count_vote += $vote->valeur;
                $nbr_vote += $vote->valeur;
            }

            $item->vote = $count_vote;
        }
        // $projet->orderBy("vote");

        foreach ($projet as $item) {

            $status = "Non sélectioné";
            $color = "bg-gradient-dark";

            if ($item->status == 1) {
                $color = "bg-gradient-success";
                $status = "sélectioné";
            }
            // dd($item->participant);

            $text[] = '
            <tr>
            
            <td class="w-20">
                <p class="font-weight-bold mb-0" >' . $item->description . '</p>
            </td>
            <td class="align-middle text-center">
            <span class="badge badge-sm ' . $color . '">' . $status . '</span>

            </td>
            <td class="align-middle ">
                <span class="me-2 text-xs font-weight-bold">' . (round($item->vote / $nbr_vote, 2) * 100) . '%</span>

                    <div class="progress">
                        <div class="progress-bar bg-gradient-info" role="progressbar"
                            aria-valuenow="' . (round($item->vote / $nbr_vote, 2) * 100) . '" aria-valuemin="0" aria-valuemax="100"
                            style="width: ' . (round($item->vote / $nbr_vote, 2) * 100) . '%;"></div>
                    </div>
            </td>

            <td>
                <a class="d-flex px-2 py-1" href="/admin/participant/' . $item->participant->id . '" >
                    <div>
                        <img src="/images/user.png" class="avatar avatar-sm me-3"
                            alt="user1">
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0">' . $item->participant->nom . ' ' . $item->participant->prenom . '</h6>
                        <p class="text-xs text-secondary mb-0">' . $item->participant->email . '</p>
                    </div>
                </a>
            </td>
        </tr>
            ';
        }

        return [
            "success" => true,
            "message" => "liste des idées de projet",
            "data" => $projet,
            "body" => $text
        ];
    }

    // ****************************************************************************

    // Groupe 

    function postGroupe(Request $request)
    {

        if ($request->nom == "" || $request->description == "") {
            return [
                "success" => false,
                "message" => "Erreur ::Remplissez tout les champs SVP !",
                "data" => []
            ];
        }



        $groupe = new Groupe();

        $groupe->nom = $request->nom;
        $groupe->description = $request->description;
        $groupe->id_projet = $request->id_projet == "" ? 0 : $request->id_projet;
        $groupe->save();

        return [
            "success" => true,
            "message" => "Groupe créé avex succes !",
            "data" => $groupe,
        ];
    }

    public function getGroupe()
    {
        $groupes = Groupe::orderBy('id')->get();

        $text = "";

        foreach ($groupes as $item) {
            // dd($item->participant);
            $projet = "Non attribué";

            if ($item->projet)
                $projet = $item->projet->description;

            $text = $text . '
            <tr>
            <td>
            <a href="' . URL::to("/admin/groupe/" . $item->id) . '">
                <p class="font-weight-bold text-center mb-0">' . $item->nom . '</p>
            </td>
            <td>
                <p class="font-weight-bold text-center mb-0">' . $item->description . '</p>
            </td>
            <td>
                <p class="font-weight-bold text-center mb-0">' . date("Y-m-d", strtotime($item->created_at)) . '</p>
            </td>

            <td>
            <p class="font-weight-bold text-center mb-0">' . $projet . '</p>

            </td>
        </tr>
            ';
        }

        return [
            "success" => true,
            "message" => "liste des idées de projet",
            "data" => $groupes,
            "body" => $text
        ];
    }

    public function groupeParticipant($id, $val)
    {
        $groupe = Groupe::find($id);

        if (!$groupe)
            return [];


        $participants = Participant::where([["id_groupe", "=", null], ["nom", "like", "%" . $val . "%"]])->orWhere([["id_groupe", "=", null], ["prenom", "like", "%" . $val . "%"]])->get();

        $body = [];
        foreach ($participants as $participant) {
            $body[] = '
            <a class="col-6 list-group-item border-0 d-flex align-items-center px-0 mb-2"
                                href="' . URL::to('/admin/ajout/participant/groupe/' . $participant->id . '/' . $groupe->id) . '">
                                <div class="avatar me-3">
                                    <img src="/images/user.png" alt="kal" class="border-radius-lg shadow">
                                </div>
                                <div class=" d-flex align-items-start flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">' . $participant->nom . ' ' . $participant->prenom . '</h6>
                                    <p class="mb-0 text-xs">' . $participant->email . '</p>
                                </div>
                            </a>
            ';
        }
        return $body;

        // dd($participants);
    }


    public function groupeAllParticipant($id)
    {
        $groupe = Groupe::find($id);

        if (!$groupe)
            return [];


        $participants = Participant::where([["id_groupe", "=", null]])->get();

        $body = [];
        foreach ($participants as $participant) {
            $body[] = '
            <a class="col-6 list-group-item border-0 d-flex align-items-center px-0 mb-2"
                                href="' . URL::to('/admin/ajout/participant/groupe/' . $participant->id . '/' . $groupe->id) . '">
                                <div class="avatar me-3">
                                    <img src="/images/user.png" alt="kal" class="border-radius-lg shadow">
                                </div>
                                <div class=" d-flex align-items-start flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">' . $participant->nom . ' ' . $participant->prenom . '</h6>
                                    <p class="mb-0 text-xs">' . $participant->email . '</p>
                                </div>
                            </a>
            ';
        }
        return $body;

        // dd($participants);
    }


    // Vote

    function postPullParticipant($id, Request $request)
    {

        $participant = Participant::find($id);

        if (!$participant) {
            return [
                "success" => false,
                "message" => "Veuillez vous inscrire pour voté merci !",
                "data" => []
            ];
        }


        $data = $request->vote;

        $i = 1;

        foreach ($data as $item) {

            $vote = new Vote();
            $vote->id_projet = $item;
            $vote->id_user = $id;
            $vote->campeur = true;

            if ($i == 1)
                $vote->valeur = 50;
            else
                if ($i == 2)
                $vote->valeur = 35;
            else
                $vote->valeur = 15;

            $i++;

            $vote->save();
        }

        return [
            "success" => true,
            "message" => "Merci d'avoir voté",
            "data" => []
        ];
    }

    function postPull($id, Request $request)
    {

        $participant = Electeur::find($id);

        if (!$participant) {
            return [
                "success" => false,
                "message" => "Veuillez vous inscrire pour voté merci !",
                "data" => []
            ];
        }

        if (count(Vote::where([["campeur", false], ["id_user", $participant->id]])->get()))
            return [
                "success" => false,
                "message" => "vous avez déja voté !",
                "data" => []
            ];


        $data = $request->vote;

        $i = 1;

        foreach ($data as $item) {

            $vote = new Vote();
            $vote->id_projet = $item;
            $vote->id_user = $id;
            $vote->campeur = false;

            if ($i == 1)
                $vote->valeur = 50;
            else
                if ($i == 2)
                $vote->valeur = 35;
            else
                $vote->valeur = 15;

            $i++;

            $vote->save();
        }

        return [
            "success" => true,
            "message" => "Merci d'avoir voté",
            "data" => []
        ];
    }
}
