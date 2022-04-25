<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminCommentController extends Controller
{
    public function show()
    {
        $id = request("id");
    
        // $questions = Topic::where('type', 1)->paginate(3);
        $commentaires = Response::where('topic_id', $id)
        ->orderByDesc('created_at')
        ->get();

        $questions = Topic::where('id', $id)
        ->first();
        
        return view('admin.question.commentaire.comquestion', [
            'commentaires'=>$commentaires,
            'questions'=>$questions,
        ]); 
    }

    public function deletequestion()
    {
        $id = request("id");
        Response::where('id', $id)
        ->delete();
        return back()->with('success','Commentaire supprimé!');
    }

    public function showonequestion()
    {
        $id = request("id");
        $commentaires = Response::where('id', $id)
        ->first();
        return view('admin.question.commentaire.editcomquest', [
            'commentaires'=>$commentaires,
        ]); 
    }

    public function editquestion(Request $request)
    {
        $request->validate([
            'description' => ['required', 'string'],
        ]);

        $id = $request->id;
        $commentaire = Response::where('id', $id)->update([
            "content" => $request->description,
        ]);
        return redirect()->route('admin.question')->with('success','Commentaire modifié');
    }

    public function createquestion(Request $request)
    {
        $request->validate([
            'description' => ['required', 'string'],
        ]);

        $id = $request->id;
        $response = Response::create([
            'user_id'=> auth()->user()->id,
            'topic_id'=> $id,
            'content' => $request->description,
        ]);
        $response->save();
        return redirect()->route('admin.question.commentaire', ['id' => $id])->with('success','Commentaire ajouté avec succès');
    }
    public function createsondage(Request $request)
    {

        $request->validate([
            'content' => ['required', 'string'],
        ]);

        $id = $request->id;
        $response = Response::create([
            'user_id'=> auth()->user()->id,
            'topic_id'=> $id,
            'content' => $request->content,
        ]);
        $response->save();
        return redirect()->route('admin.sondage.commentaire', ['id' => $id])->with('success','Commentaire ajouté avec succès');
    }

    public function showtwo()
    {
        $id = request("id");
        $quest = Topic::where('id', $id)
        ->first();
        return view('admin.question.commentaire.addcomquestion', [
            'quest'=>$quest,
        ]);
    }

    public function showfive()
    {
        $id = request("id");
        $sondage = Topic::where('id', $id)
        ->first();
        return view('admin.sondage.commentaire.creercomsondage', [
            'sondage'=>$sondage,
        ]);
    }

    public function showthree()
    {
        $id = request("id");

        $topic = Topic::where('id', $id)
        ->first();
        //$questions = Topic::where('type', 1)->paginate(3);
        $commentaires = Response::with('User')->where('topic_id', $id)
        ->orderByDesc('created_at')
        ->get();

        return view('admin.sondage.commentaire.comsondage', [
            'commentaires'=>$commentaires,
            'topic'=>$topic,
        ]); 
    }

    public function showfour()
    {
        $id = request("id");
        $response = Response::where('id', $id)
        ->first();
        return view('admin.sondage.commentaire.modifiercomsond', [
            'response'=>$response,
        ]); 
    }

    public function editsondage(Request $request)
    {
        $request->validate([
            'content' => ['required', 'string'],
        ]);

        $id = $request->id;
        $response = Response::where('id', $id)->update([
            "content" => $request->content,
        ]);
        return Redirect::to('admin/sondage');
    }
}
