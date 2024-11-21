<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Hash;
use App\Models\Projet;
use App\Models\Ci2023_jury;
use App\Models\Ci2023_critere_note;
use App\Models\Ci2023_critere;


class JuryContoller extends Controller
{
    /*********************************************************section jury */


    public function ConnexionJury()
    {
        /*$president_jury = new Ci2023_jury();
        $jury1 = new Ci2023_jury();
        $jury2 = new Ci2023_jury();
        $jury3 = new Ci2023_jury();
        $jury4 = new Ci2023_jury();

        /**president du jury /
        $president_jury->role = 'president';
        $president_jury->user = 'ID_CAMP_president';
        $president_jury->password = bcrypt('123');
       // dd($president_jury);
        $president_jury->save();

       /** jury1 /
        $jury1->role = 'jury';
        $jury1->user = 'ID_CAMP_jury1';
        $jury1->password = bcrypt('jury1');
        $jury1->save();

        /** jury2 /
        $jury2->role = 'jury';
        $jury2->user = 'ID_CAMP_jury2';
        $jury2->password = bcrypt('jury2');
        $jury2->save();

        /** jury3 /
        $jury3->role = 'jury';
        $jury3->user = 'ID_CAMP_jury3';
        $jury3->password = bcrypt('jury3');
        $jury3->save();


        /** jury4 /
        $jury4->role = 'jury';
        $jury4->user = 'ID_CAMP_jury4';
        $jury4->password = bcrypt('jury4');
        $jury4->save();*/

        return view("backend.jury.connexion");
    }



    public function jury_index(Request $resquest)
    {
        // il faut mettre ici la verification des donnés de la connexion des jury


        $this->validate($resquest, ['user' => 'required', 'password' => 'required|min:3', 'role' => 'required']);

        //$jury = new Ci2023_jury();
        $jury = Ci2023_jury::where('user', $resquest->input('user'))->first();

        //$notes = Ci2023_critere_note::where('id_projet',$projets->id)->get();

        if ($jury) {
            # code...
            if (Hash::check($resquest->input('password'), $jury->password)) {
                // code...

                Session::put('jury', $jury);

                return redirect("/jury/home/" . $jury->id);

                //return view("backend.jury.index")->with("projets", $projets)->with("jury", $jury)->with('msg_success', 'connexion reuissie');
            } else {
                //code...
                return back()->with('msg_error', 'mauvais mot de passe ou role');
            }
        } else {
            // code...
            return back()->with('msg_error', 'Vous n' . "'" . 'avez de compte');
        }

        return view("/");
    }


    public function home($id)
    {
        $jury = Ci2023_jury::where('id', $id)->first();
        $projets = Projet::get();

       // Session::put('msg_success', 'connexion reussi');

       // dd(Session->get('msg_success'));

        return view("backend.jury.index")->with("projets", $projets)->with("jury", $jury)->with('msg_success','connexion reuissi');
    }


    public function jury_note($id)
    {


        $jury =  Session::get('jury')->id;

        $id_projet = $id;
        $projet = Projet::where('id', $id_projet)->first();

        $critere = Ci2023_critere::get();
        // dd($critere);
        $note = Ci2023_critere_note::where([['ci2023_jurie_id', $jury], ['id_projet', $id_projet]])->count();

        if ($note) {
            $note_modifier = Ci2023_critere_note::where([['ci2023_jurie_id', $jury], ['id_projet', $id_projet]])->get();
            //dd($note_modifier->count());

            return view('backend.jury.note')->with('jury', $jury)->with('projet', $projet)->with('id_projet', $id_projet)->with('note', $note)->with('note_modifier', $note_modifier)->with('critere', $critere)->with('msg_error', 'mauvais mot de passe ou role')->with('msg_success', 'modification reuissie');
        }

        return view('backend.jury.note')->with('projet', $projet)->with('jury', $jury)->with('id_projet', $id_projet)->with('note', $note)->with('critere', $critere)->with('msg_error', 'vote reuissi');
    }


    public function note_critere(Request $resquest)
    {
        $id_projet = $resquest->input('projet_id');
        $jury_id = Session::get('jury')->id;
        $projets = Projet::get();


        // Vérifier si le jury a déjà noté ce projet
        $note_critere_existant = Ci2023_critere_note::where('id_projet', $id_projet)
            ->where('ci2023_jurie_id', $jury_id)
            ->first();

        if ($note_critere_existant) {
            // Le jury a déjà noté ce projet, donc ne pas enregistrer de nouvelles notes
            return redirect()->back()->with('msg_error', 'Vous avez déjà noté ce projet.');
        }

        $notes = $resquest->input('note');
        $criteres = $resquest->input('critere');
        $coefficient = $resquest->input('coefficient');

        for ($i = 0; $i < count($criteres); $i++) {
            $note_critere = new Ci2023_critere_note();
            $note_critere->id_projet = $id_projet;
            $note_critere->ci2023_jurie_id = $jury_id;
            $note_critere->coefficient = $coefficient[$i];
            $note_critere->critere = $criteres[$i];
            $note_critere->note = $notes[$i];
            $note_critere->save();
        }
        //Session::put('msg_success', 'critere modifier avec success');
        // Redirigez l'utilisateur vers la page précédente
        return redirect('/jury/home/'. $jury_id)->with("projets", $projets)->with('msg_success', 'Projets notés avec succès');

        //return view('backend.jury.index')->with("projets", $projets)->with('msg_success', 'Projets noté avec sucess');
    }


    public function modifier_note(Request $resquest)
    {
        //dd($jury_id);

        $projets = Projet::get();

        $id_projet = $resquest->input('projet_id');
        $jury_id = Session::get('jury')->id;


        $note_critere = Ci2023_critere_note::where('id_projet', $id_projet)
            ->where('ci2023_jurie_id', $jury_id)
            ->get();

        $notes = $resquest->input('note');
        $criteres = $resquest->input('critere');
        $coefficient = $resquest->input('coefficient');

        foreach ($note_critere as $note) {
            for ($i = 0; $i < count($criteres); $i++) {
                if ($note->critere == $criteres[$i]) {
                    $note->note = $notes[$i];
                    $note->coefficient = $coefficient[$i];
                    $note->update();
                }
            }
        }

        //Session::put('msg_success', 'note modifier avec sucess');
        //dd(Session::get('msg_success') );
        return redirect('/jury/home/'. $jury_id)->with("projets", $projets)->with('msg_success', 'note modifier avec sucess');

       // return view('backend.jury.index')->with("projets", $projets)->with('msg_success', 'note modifier avec sucess');
    }


    public function voté()
    {
        $projets = Projet::get();
        $jury = Session::get('jury')->id;

        return view("backend.jury.index")->with("projets", $projets)->with("jury", $jury);
    }







    public function note_detail($id)
    {

        $note_critere = Ci2023_critere_note::where('id_projet', $id)->get();
        //  dd($note_critere);
        return view('backend.jury.detail')->with('note_critere', $note_critere);
    }


    public function critere()
    {

        $criteres = Ci2023_critere::get();

        return view('backend.jury.critere')->with('criteres', $criteres);
    }


    public function ajoutcritere(Request $resquest)
    {

        $critere = new Ci2023_critere();
        // dd(Ci2023_critere_note());


        $this->validate($resquest, [
            'critere' => 'required|unique:ci2023_criteres',
        ]);


        $critere->critere = $resquest->input('critere');
        $critere->coefficient = $resquest->input('coefficient');

        // dd($critere);
        $critere->save();

        return redirect('/jury/critere')->with('msg_success', 'critere ajouter avec success'); // avoir

    }


    public function supprimercritere($id)
    {
        //dd($id);

        $critere  = Ci2023_critere::find($id);

        //dd($critere);
        $critere->delete();

        return redirect('/jury/critere')->with('msg_error', 'critere supprimer avec success');
    }


    public function modifier_critere($id)
    {

        $critere  = Ci2023_critere::where('id', $id)->get();

        //dd($critere);

        return view('backend.jury.modifier_critere')->with('critere', $critere)->with('msg_success', 'critere ajouter avec success');
    }


    public function modifiercritere(Request $resquest)
    {

        $this->validate($resquest, [
            'critere' => 'required|unique:ci2023_criteres',
        ]);

        $critere = Ci2023_critere::find($resquest->input('id_critere'));

        $critere->critere = $resquest->input('critere');
        $critere->coefficient = $resquest->input('coefficient');

        // dd($critere);
        $critere->update();

        return redirect('/jury/critere')->with('msg_success', 'critere modifier avec success');
    }




    public function classement()
    {
        $projets = Projet::get();
        $critere = Ci2023_critere::get();
        $notes = Ci2023_critere_note::get();

        $projets_ids = [];

        foreach ($projets as $item) {
            $projets_ids[] = $item->id;
        }

        $moyennes_notes_projets = array();
        foreach ($projets_ids as $projet_id) {
            $notes_projet = array();
            $notes_coefficient = array();

            foreach ($notes as $note) {
                if ($note->id_projet == $projet_id) {
                    $notes_projet[] = $note->note * $note->coefficient;
                    $notes_coefficient[] = $note->coefficient;
                }
            }

            if (count($notes_coefficient) > 0 && array_sum($notes_coefficient) > 0) {
                $moyenne_notes_projet = array_sum($notes_projet) / array_sum($notes_coefficient);
            } else {
                $moyenne_notes_projet = 0;
            }

            $moyennes_notes_projets[$projet_id] = $moyenne_notes_projet;
        }

        arsort($moyennes_notes_projets);
        $projet_suivant = null;
        $moyenne_suivante = null;
        $first_iteration = true;

        foreach ($moyennes_notes_projets as $projet_id => $moyenne_notes_projet) {
            if ($first_iteration) {
                $first_iteration = false;
            } else {
                $projet_suivant = $projets->find($projet_id)->description;
                //dd($projet_suivant);
                $moyenne_suivante = $moyenne_notes_projet;
                break;
            }
        }

        //dd($moyennes_notes_projets);
        return view('backend.jury.classement')->with('moyennes_notes_projets', $moyennes_notes_projets)->with('projets', $projets)->with('projet_suivant', $projet_suivant)->with('moyenne_suivante', $moyenne_suivante);
    }
}
