<?php

use App\Models\User;
use App\Models\Topic;
use App\Models\Reaction;
use App\Models\Response;
use App\Models\Reporting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminReportController;
use App\Http\Controllers\AdminCommentController;
use App\Http\Controllers\AdminSondageController;
use App\Http\Controllers\AdminQuestionController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\AuthAdmin\AuthenticatedSessionController;


Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'show'])
                ->middleware('admin')
                ->name('admin.dashboard');

        Route::get('/connexion', [AdminController::class, 'redirectionlogin']);

        Route::post('/login', [AuthenticatedSessionController::class, 'store'])
                ->name('admin.login');

        Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])
                ->middleware('admin')
                ->name('admin.logout');

        Route::get('/utilisateur', [AdminUserController::class, 'show'])
                ->middleware('admin')
                ->name('admin.utilisateur');

        Route::get('/user/delete/{id}', [AdminUserController::class, 'delete'])
                ->name('admin.user.delete')
                ->middleware('admin');

        Route::get('/user/edit/view/{id}', [AdminUserController::class, 'showone'])
                ->name('admin.user.edit.view')
                ->middleware('admin');

        Route::post('/user/edit/', [AdminUserController::class, 'edit'])
                ->name('admin.user.edit')
                ->middleware('admin');

        Route::get('/user/add/view', [AdminUserController::class, 'redirection'])
                ->name('admin.user.add.view');

        Route::post('/user/add', [AdminUserController::class, 'create'])
                ->name('admin.user.add');

                Route::get('/question', [AdminQuestionController::class, 'show'])
                ->name('admin.question')
                ->middleware('admin');

                Route::get('/topic/delete/{id}', [AdminQuestionController::class, 'delete'])
                ->name('admin.topic.delete')
                ->middleware('admin');

                Route::get('/question/edit/view/{id}', [AdminQuestionController::class, 'showone'])
                ->name('admin.question.edit.view')
                ->middleware('admin');

        Route::post('/question/edit/{id}', [AdminQuestionController::class, 'edit'])
                ->name('admin.question.edit')
                ->middleware('admin');

                Route::get('/question/add/view', [AdminQuestionController::class, 'redirection'])
                ->name('admin.question.add.view')
                ->middleware('admin');

        Route::post('/question/add', [AdminQuestionController::class, 'create'])
                ->name('admin.question.add')
                ->middleware('admin');

        Route::get('/question/commentaire/{id}', [AdminCommentController::class, 'show'])
                ->name('admin.question.commentaire')
                ->middleware('admin');

        Route::get('/question/commentaire/delete/{id}', [AdminCommentController::class, 'deletequestion'])
                ->name('admin.question.commentaire.delete')
                ->middleware('admin');

        Route::get('/question/commentaire/edit/view/{id}', [AdminCommentController::class, 'showonequestion'])
                ->name('admin.question.commentaire.edit.view')
                ->middleware('admin');

        Route::post('/question/commentaire/edit/', [AdminCommentController::class, 'editquestion'])
                ->name('admin.question.commentaire.edit')
                ->middleware('admin');

                Route::get('/question/commentaire/add/view/{id}', [AdminCommentController::class, 'showtwo'])
                ->name('admin.question.commentaire.add.view')
                ->middleware('admin');

        Route::post('/question/commentaire/add/{id}', [AdminCommentController::class, 'createquestion'])
                ->name('admin.question.commentaire.add')
                ->middleware('admin');

                Route::get('/sondage', [AdminSondageController::class, 'show'])
                ->name('admin.sondage')
                ->middleware('admin');

                Route::get('/sondage/edit/view/{id}', [AdminSondageController::class, 'showone'])
                ->name('admin.sondage.edit.view')
                ->middleware('admin');

        Route::post('/sondage/edit', [AdminSondageController::class, 'edit'])
                ->name('admin.sondage.edit')
                ->middleware('admin');

                Route::get('/sondage/add/view', [AdminSondageController::class, 'redirection'])
                ->name('admin.sondage.add.view')
                ->middleware('admin');
                
        Route::post('/sondage/add', [AdminSondageController::class, 'create'])
                ->name('admin.sondage.add')
                ->middleware('admin');

                Route::get('/sondage/commentaire/{id}', [AdminCommentController::class, 'showthree'])
                ->name('admin.sondage.commentaire')
                ->middleware('admin');

                Route::get('/sondage/commentaire/delete/{id}', [AdminCommentController::class, 'deletequestion'])
                ->name('admin.sondage.commentaire.delete')
                ->middleware('admin');

                Route::get('sondage/commentaire/edit/view/{id}', [AdminCommentController::class, 'showfour'])
                ->name('admin.sondage.commentaire.edit.view')
                ->middleware('admin');

        Route::post('sondage/commentaire/edit/', [AdminCommentController::class, 'editsondage'])
                ->name('admin.sondage.commentaire.edit')
                ->middleware('admin');

                Route::get('/sondage/commentaire/add/view/{id}', [AdminCommentController::class, 'showfive'])
                ->name('admin.sondage.commentaire.add.view')
                ->middleware('admin');

        Route::post('/sondage/commentaire/add', [AdminCommentController::class, 'createsondage'])
                ->name('admin.sondage.commentaire.add')
                ->middleware('admin');

                Route::get('/report', [AdminReportController::class, 'show'])
                ->middleware('admin')
                ->name('admin.report');
                
        Route::get('/report/delete/{id}', [AdminReportController::class, 'delete'])
                ->name('admin.report.delete')
                ->middleware('admin');

                Route::get('/report/edit/view/{id}', [AdminReportController::class, 'showone'])
                ->name('admin.report.edit.view')
                ->middleware('admin');

        Route::post('/report/edit/{id}', [AdminReportController::class, 'edit'])
                ->name('admin.report.edit')
                ->middleware('admin');



});
