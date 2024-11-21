<?php

namespace App\Http\Controllers\backend;

use Illuminate\Support\Facades\Session;

use App\Http\Controllers\Controller;
use App\Models\Electeur;
use App\Models\Evenement;
use App\Models\Groupe;
use App\Models\Participant;
use App\Models\Projet;
use App\Models\Vote;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function login()
    {
        return view("backend.home.login");
    }

    public function home()
    {
        $count = [Participant::get()->count(), Evenement::get()->count(), Projet::get()->count()];
        return view("backend.home")->with("count", $count);
    }

    public function evenement()
    {
        return view("backend.evenement.index");
    }

    public function participant()
    {
        return view("backend.participant.participant");
    }

    public function participantDetaille($id)
    {


        $participant = Participant::find($id);
        $evenement = Evenement::where("etat", 1)->get();


        if (!$participant) {
            return back()->with("status_error", "Participant non trouvé !");
        }

        return view("backend.participant.participantDetaille")
            ->with("evenement", $evenement)
            ->with("participant", $participant);
    }

    public function getEvenement($id)
    {
        $evenement = Evenement::find($id);

        $this->autoActiveEvenement($evenement);

        if (!$evenement) {
            return back()->with("status_error", "Evènement non trouvé !");
        }

        return view("backend.evenement.evenement")->with("evenement", $evenement);
    }

    public function evenementActive($id)
    {
        $evenement = Evenement::find($id);

        if (!$evenement) {
            return back()->with("status_error", "Evènement non trouvé !");
        }

        $evenements = Evenement::where("etat", 1)->get();

        foreach ($evenements as $event) {
            if ($evenement->id = $evenement->id) {
                $event->etat = 2;
                $event->update();
            }
        }


        if ($evenement->etat == 0)
            $evenement->etat = 1;
        else
            if ($evenement->etat == 1)
            $evenement->etat = 2;

        $evenement->update();


        return redirect("/admin/evenement/" . $id);
    }


    public function activeAutoCloture()
    {
        if (Session::has("auto_close"))
            Session::forget("auto_close");
        else
            Session::put("auto_close", 1);

        Session::save();

        return back();
    }

    // Groupe

    public function groupe()
    {
        $projets = Projet::where("status", 0)->get();

        return view("backend.groupe.index")->with("projets", $projets);
    }

    public function groupeDetaille($id)
    {
        $groupe = Groupe::find($id);
        $participants = Participant::where("id_groupe",null)->get();

        if(!$groupe){
            return back();
        }

        return view("backend.groupe.groupe")->with("groupe", $groupe)->with("participants", $participants);
    }

    public function postGroupe()
    {
        $projets = Projet::where("status", 0)->get();

        return view("backend.groupe.index")->with("projets", $projets);
    }


    // Projet

    public function projet(Request $request)
    {
        return view("backend.projet.index");
    }


    public function vote()
    {
        $projets = Projet::get();
        $nbr_vote = 0;
        foreach ($projets as $item) {

            $count_vote = 0;
            foreach ($item->vote as $vote) {
                $count_vote += $vote->valeur;
                $nbr_vote += $vote->valeur;
            }

            $item->vote = $count_vote;
        }

        return view("backend.vote.index")->with("data", [$projets, $nbr_vote]);
    }

    public function ajoutGroupeParticipant($id, $id2)
    {
        $participant = Participant::find($id);
        $groupe = Groupe::find($id2);

        if(!$participant || !$groupe){
        return back()->with("status_error", "Eurreur recommencer !");

        }

        $participant->id_groupe = $groupe->id;
        $participant->update();

        // dd($groupe->participant);

        // dd($projets, $nbr_vote);
        return back()->with("status_succes", "Participant ajouter au groupe");
    }

    public function voteInscription()
    {
        return view("backend.vote.inscription");
    }

    public function voteProjet(Request $request)
    {
        $electeur = Electeur::where("contact", $request->contact)->orWhere("email", $request->email)->first();

        if (!$electeur) {
            $electeur = new Electeur();

            $electeur->nom = $request->nom;
            $electeur->prenom = $request->prenom;
            $electeur->contact = $request->contact;
            $electeur->email = $request->email;
            $electeur->save();
        } else {
            if (count($electeur->vote))
                return redirect("/vote-fin");
        }

        $projets = Projet::get();

        return view("backend.vote.vote")->with("id", $electeur->id)->with("projets", $projets);
    }

    public function voteParticipantProjet($id)
    {
        $electeur = Participant::find($id);

        if (!$electeur)
            return redirect("/vote/inscription");

        if (count(Vote::where([["campeur", true], ["id_user", $electeur->id]])->get()))
            return redirect("/vote-fin");

        $projets = Projet::get();

        return view("backend.vote.vote")->with("id", "participant/" . $electeur->id)->with("projets", $projets);
    }

    public function voteFinProjet()
    {
        return view("frontend.homePage.vote");
    }

    // function postPull(Request $request)
    // {
    //     if (!Session::has("electeur"))
    //         return [
    //             "success" => false,
    //             "message" => "Veuillez vous inscrire pour voté merci !",
    //             "data" => []
    //         ];

    //     return Session::get("electeur");

    //     $data = $request->vote;

    //     $i = 1;

    //     foreach ($data as $item) {

    //         $vote = new Vote();
    //         $vote->id_projet = $item;
    //         $vote->id_user = 1;
    //         $vote->campeur = false;

    //         if ($i == 1)
    //             $vote->valeur = 50;
    //         else
    //             if ($i == 2)
    //             $vote->valeur = 35;
    //         else
    //             $vote->valeur = 15;

    //         $i++;

    //         $vote->save();
    //     }

    //     return [
    //         "success" => true,
    //         "message" => "Merci d'avoir voté",
    //         "data" => []
    //     ];
    // }












    /*********************************************************section jury */


    

    

}
