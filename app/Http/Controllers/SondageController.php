<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SondageController extends Controller
{
    public function create(Request $request)
    {

        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            // 'image' => ['string'],
            'description' => ['required', 'string'],
            'tag' => ['required', 'string', 'max:255'],
            'Radios' => ['required'],
        ]);

        $topic = Topic::create([
            'user_id' => auth()->user()->id,
            'type' => 0,
            'tag' => $request->tag,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $request->image,
            'setting' => $request->Radios,
        ]);
        $topic->save();
        return redirect('/sondage');
    }

    public function redirection()
    {
        return view('pages.sondage.creersondage');
    }

    public function show()
    {
        $recherche = request()->search;
        if ($recherche != null) {
            $sondages = Topic::select('*')
                ->where('type', 0)
                ->where(function ($query) use ($recherche) {
                    $query->where('title', 'LIKE', '%' . $recherche . '%')
                        ->orWhere('description', 'LIKE', '%' . $recherche . '%')
                        ->orWhere('tag', 'LIKE', '%' . $recherche . '%');
                })
                ->get();

            return view('pages.sondage.sondage', [
                'sondages' => $sondages,
            ]);
            
        } else {
            $sondages = Topic::where('type', 0)
                ->orderByDesc('created_at')
                ->get();
            return view('pages.sondage.sondage', [
                'sondages' => $sondages,
            ]);
        }
    }

    public function showone()
    {
        $id = request("id");
        $sondages = Topic::where('id', $id)->where('type', 0)->first();
        
        $reponses = Response::where('topic_id', $id)
            ->orderByDesc('created_at')
            ->get();

        return view('pages.sondage.readsondage', [
            'sondages' => $sondages,
            'reponses' => $reponses,
        ]);
    }
}
