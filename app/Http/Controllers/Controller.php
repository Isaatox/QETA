<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Topic;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function show()
    {
        $nbquestion = Topic::where('type', 1)
            ->count();

        $nbsondage = Topic::where('type', 0)
            ->count();

        $nbutilisateur = User::count();

        $lastsondage = Topic::latest('id')
            ->where('type', '=', 0)
            ->first();

        $lastquestion = Topic::latest('id')
            ->where('type', '=', 1)
            ->first();

        return view('dashboard', [
            'nbquestion' => $nbquestion,
            'nbsondage' => $nbsondage,
            'nbutilisateur' => $nbutilisateur,
            'lastsondage' => $lastsondage,
            'lastquestion' => $lastquestion,
        ]);
    }

    public function cgu()
    {
        return view('cgu', []);
    }
}
