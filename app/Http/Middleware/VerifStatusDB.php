<?php

namespace App\Http\Middleware;

use App\Models\Evenement;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class VerifStatusDB
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    public function handle(Request $request, Closure $next)
    {

        $evenements = Evenement::where([["etat",0]])->orWhere([["etat",1]])->get();
        
        foreach($evenements as $evenement){

            $heure_even_debut = explode(":", $evenement->heure_debut);
            $heure_even_fin = explode(":", $evenement->heure_fin);

            $heure_even_debut = [intval($heure_even_debut[0]), intval($heure_even_debut[1])];
            $heure_even_fin = [intval($heure_even_fin[0]), intval($heure_even_fin[1])];

            $heure_even_debut = strtotime($evenement->date . " " . $heure_even_debut[0] . ":" . $heure_even_debut[1]);
            $heure_even_fin = strtotime(date("Y-m-d H:i", $heure_even_debut) . ' +' . $heure_even_fin[0] . ' hours +' . $heure_even_fin[1] . ' minutes');

            $date = strtotime(date("Y-m-d H:i"));

            if ($evenement->etat == 0 && (($heure_even_debut + 60) <= $date && $heure_even_fin > ($date - 60))) {
                $evenement->etat = 1;

            } else {
                if ($evenement->etat == 1 && ($heure_even_fin) <= ($date)) {
                    $evenement->etat = 2;
                }
            }
        }
        
        return $next($request);
    }
}
