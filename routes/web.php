<?php

use App\Http\Controllers\backend\adminController;
use App\Http\Controllers\JuryContoller;
use App\Http\Controllers\frontend\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'home']);

Route::middleware("VerifStatusDB")->group(function () {

    Route::get('/admin-ideation', [adminController::class, 'login']);

    Route::get('/admin/dashboard', [adminController::class, 'home']);

    Route::get('/admin/evenement', [adminController::class, 'evenement']);

    Route::get('/admin/evenement/{id}', [adminController::class, 'getEvenement']);

    Route::get('admin/evenement/active/{id}', [adminController::class, 'evenementActive']);

    Route::get('/admin/participant', [adminController::class, 'participant']);

    Route::get('/admin/participant/{id}', [adminController::class, 'participantDetaille']);

    Route::get('/admin/active/auto-cloture', [adminController::class, 'activeAutoCloture']);

    Route::get('/admin/groupe', [adminController::class, 'groupe']);
    
    Route::get('/admin/groupe/{id}', [adminController::class, 'groupeDetaille']);

    Route::get('/admin/projet', [adminController::class, 'projet']);

    Route::get('/admin/vote', [adminController::class, 'vote']);
    
    Route::get('/admin/ajout/participant/groupe/{id_participant}/{id_groupe}', [adminController::class, 'ajoutGroupeParticipant']);

});

Route::get('/vote/inscription', [adminController::class, 'voteInscription']);

Route::post('/vote/projet', [adminController::class, 'voteProjet']);

Route::get('/vote/participant/projet/{id}', [adminController::class, 'voteParticipantProjet']);

Route::get('/vote-fin', [adminController::class, 'voteFinProjet']);






/*************************************secttion jury********************************************************************** */

Route::get('/jury/connexion', [JuryContoller::class, 'ConnexionJury']);

Route::get('/jury/home/{id}', [JuryContoller::class, 'home']);


Route::post('/jury/index', [JuryContoller::class, 'jury_index']);

//Route::get('/jury/index', [JuryContoller::class, 'jury_index']);

Route::get('/jury/note/{id}', [JuryContoller::class, 'jury_note']);


Route::post('/jury/note-critere', [JuryContoller::class, 'note_critere']);

Route::post('/jury/note-critere-modifier', [JuryContoller::class, 'modifier_note']);

Route::get('/jury/index/detail/{id}', [JuryContoller::class, 'jury_note']);





Route::get('/jury/critere', [JuryContoller::class, 'critere']);

Route::post('/jury/critere/ajoutcritere', [JuryContoller::class, 'ajoutcritere']);

Route::get('/jury/critere/supprimercritere/{id} ', [JuryContoller::class, 'supprimercritere']); 

Route::get('/jury/critere/modifier_critere/{id} ', [JuryContoller::class, 'modifier_critere']);

Route::post('/jury/critere/mofidifiercritere ', [JuryContoller::class, 'modifiercritere']); 

Route::get('/jury/critere/classement ', [JuryContoller::class, 'classement']);
//Route::get('/jury/voté ', [JuryContoller::class, 'voté']);








//Route::get('/jury/test', [JuryContoller::class, 'test']);







