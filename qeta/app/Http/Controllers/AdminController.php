<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Topic;
use App\Models\Reaction;
use App\Models\Reporting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function show()
    {
        $nbquestion = Topic::where('type', 1)
        ->count();
        $nbsondage = Topic::where('type', 0)
        ->count();
        $nbutilisateur = User::count();
        $nbreport = Reporting::count();
        $nbcomquest = DB::table('topic')
        ->join('response', 'topic_id', '=', 'topic.id')
        ->where('type', '=', 1)
        ->count();
        $nbcomsond = DB::table('topic')
        ->join('response', 'topic_id', '=', 'topic.id')
        ->where('type', '=', 0)
        ->count();
        $nbreaction = Reaction::count();
        

        return view('admin.dashboard',[
            'nbquestion' => $nbquestion,
            'nbsondage' => $nbsondage,
            'nbutilisateur' => $nbutilisateur,
            'nbreport' => $nbreport,
            'nbcomquest' => $nbcomquest,
            'nbcomsond' => $nbcomsond,
            'nbreaction' => $nbreaction,
        ]);
    }

    public function redirectionlogin()
    {
        return view('admin.login');
    }
}
