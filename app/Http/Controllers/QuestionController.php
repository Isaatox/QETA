<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\Response;
use Illuminate\Http\Request;


class QuestionController extends Controller
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
            'type' => 1,
            'tag' => $request->tag,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $request->image,
            'setting' => $request->Radios,
        ]);
        $topic->save();
        return redirect('/question');
    }
    public function redirection()
    {
        return view('pages.question.creerquestion');
    }

    public function show()
    {
        $recherche = request()->search;

        if ($recherche != null) {
            $questions = Topic::select('*')
                ->where('type', 1)
                ->where(function ($query) use ($recherche) {
                    $query->where('title', 'LIKE', '%' . $recherche . '%')
                        ->orWhere('description', 'LIKE', '%' . $recherche . '%')
                        ->orWhere('tag', 'LIKE', '%' . $recherche . '%');
                })
                ->get();
            return view('pages.question.question', [
                'questions' => $questions,
            ]);
        } else {
            $questions = Topic::where('type', 1)
                ->orderByDesc('created_at')
                ->get();
            return view('pages.question.question', [
                'questions' => $questions,
            ]);
        }
    }

    public function showone()
    {
        $id = request("id");
        
        $questions = Topic::where('id', $id)->where('type', 1)->first(); 

        $reponses = Response::where('topic_id', $id)
            ->orderByDesc('created_at')
            ->get();

        return view('pages.question.readquestion', [
            'questions' => $questions,
            'reponses' => $reponses,
        ]);
    }
}
