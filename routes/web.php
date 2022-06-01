<?php

use App\Models\User;
use App\Models\Topic;
use App\Models\Reaction;
use App\Models\Response;
use App\Models\Reporting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ReponseController;
use App\Http\Controllers\SondageController;
use App\Http\Controllers\QuestionController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\AuthAdmin\AuthenticatedSessionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contain the "web" middleware group. Now create something great!.
|
*/


Route::get('/', [Controller::class, 'show'])
        ->middleware('auth');

Route::get('/cgu', [Controller::class, 'cgu']);

Route::get('profil', [ProfilController::class, 'show'])
        ->middleware('auth');

Route::get('/profile/view', [ProfilController::class, 'redirection'])
        ->name('profile.view')
        ->middleware('auth');

Route::post('/profile/edit', [ProfilController::class, 'edit'])
        ->name('profile.edit')
        ->middleware('auth');

Route::get('/question/view',  [QuestionController::class, 'redirection'])
        ->name('question.view')
        ->middleware('auth');

Route::post('/question/add', [QuestionController::class, 'create'])
        ->name('question.add')
        ->middleware('auth');

Route::get('/question', [QuestionController::class, 'show'])
        ->name('question')
        ->middleware('auth');

Route::get('/question/read/{id}', [QuestionController::class, 'showone'])
        ->middleware('auth')
        ->name('question.read');

Route::get('/sondage/view', [SondageController::class, 'redirection'])
        ->name('sondage.view')
        ->middleware('auth');

Route::post('/sondage/add', [SondageController::class, 'create'])
        ->name('sondage.add')
        ->middleware('auth');

Route::get('/sondage', [SondageController::class, 'show'])
        ->name('sondage')
        ->middleware('auth');

Route::get('/sondage/read/{id}', [SondageController::class, 'showone'])
        ->name('sondage.read')
        ->middleware('auth');

Route::post('/response/add', [ReponseController::class, 'create'])
        ->name('response.add')
        ->middleware('auth');

Route::post('/report/add', [ReportController::class, 'createreportresponse'])
        ->name('report.add')
        ->middleware('auth');

Route::post('/report/add/topic', [ReportController::class, 'createreport'])
        ->name('report.add.topic')
        ->middleware('auth');

require __DIR__ . '/admin.php';

require __DIR__ . '/auth.php';
