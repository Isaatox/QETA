<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminQuestionController extends Controller
{
    public function show()
    {
        $questions = Topic::where('type', 1)
            ->orderByDesc('created_at')
            ->get();
            return view('admin.question.question', [
                'questions'=>$questions,
            ]);
    }

    public function showone()
    {
        $id = request("id");
        $question = Topic::where('id', $id)
        ->first();
        return view('admin.question.modifierquestion', [
            'question'=>$question,
        ]); 
    }

    public function edit(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            // 'image' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'tag' => ['required', 'string', 'max:255'],
            'Radios' => ['required'],
        ]);

        $id = request("id");
        $question = Topic::find($id);
        $question->title = $request->title;
        $question->tag = $request->tag;
        $question->description = $request->description;
        $question->setting =$request->Radios;
        $question->save();
        return Redirect::to('admin/question');
    }

    public function create(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'image' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'tag' => ['required', 'string', 'max:255'],
            'Radios' => ['required'],
        ]);


            $topic = Topic::create([
                'user_id'=> auth()->user()->id,
                'type'=> 1,
                'tag'=>$request->tag,
                'title' => $request->title,
                'description' => $request->description,
                'image'=>$request->image,
                'setting'=>$request->Radios,
            ]);
            $topic->save();
            return redirect('admin/question');
    }
    
    public function redirection()
    {
        return view('admin.question.creerquestion', []);
    }

    public function delete()
    {
        $id = request("id");
            $checkTopic = Topic::where('type',0)
            ->where('id',$id)
            ->exists();
            
            Topic::where('id', $id)
            ->delete();
            if ($checkTopic) {
                return redirect('admin/sondage');
            }
            else
            {
                return redirect('admin/question');
            }
    }
}
