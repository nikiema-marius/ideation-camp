<?php

use App\Http\Controllers\api\v1\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/', [ApiController::class, "home"]);

//*************************************************************************************** */

Route::middleware("VerifStatusDB")->group(function () {

    Route::get('/evenement', [ApiController::class, "getEvenement"]);

    Route::post('/evenement', [ApiController::class, "postEvenement"]);

    Route::get('/evenement/{id}', [ApiController::class, "getEvenementDetaille"]);

    Route::get('/active/evenement', [ApiController::class, "getEvenementActive"]);

    Route::post('/evenement/edit/{id}', [ApiController::class, "putEvenement"]);

    Route::get('/scan/evenements', [ApiController::class, "getScanEvenement"]);

    Route::get('/scan/evenement/participant/{id}', [ApiController::class, "getScanEvenementParticipant"]);


    //*************************************************************************************** */

    // participant

    Route::post('/participant', [ApiController::class, "postParticipant"]);

    Route::get('/participant', [ApiController::class, "getParticipant"]);

    Route::get('/participant/{id}', [ApiController::class, "getParticipantDetaille"]);

    Route::post('/participant/edit/{id}', [ApiController::class, "putParticipant"]);

    Route::get('/participation/{id_participant}/{id_evenement}', [ApiController::class, "postParticipantToEvenement"]);

    Route::get('/liste/participation/{id_participant}', [ApiController::class, "getParticipantToEvenement"]);

    Route::get('/liste/evenement/participation/{id_evenement}', [ApiController::class, "getEvenementParticipant"]);

    //*************************************************************************************** */

    // projet

    Route::get('/projet', [ApiController::class, "getProjet"]);


    //*************************************************************************************** */


    // groupe 

    Route::get('/groupe', [ApiController::class, 'getGroupe']);

    Route::post('/groupe', [ApiController::class, 'postGroupe']);

    Route::get('/groupe/{id}/{val}', [ApiController::class, 'groupeParticipant']);

    Route::get('/groupe/{id}', [ApiController::class, 'groupeAllParticipant']);


    //*************************************************************************************** */


    // vote 

    Route::post('/send/pull/{id}', [ApiController::class, 'postPull']);

    Route::post('/send/pull/participant/{id}', [ApiController::class, 'postPullParticipant']);
});
