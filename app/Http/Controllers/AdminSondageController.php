<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminSondageController extends Controller
{
    public function show()
    {
        $sondages = Topic::where('type', 0)
            ->orderByDesc('created_at')
            ->get();
            return view('admin.sondage.sondage', [
                'sondages'=>$sondages,
            ]); 
    }

    public function showone()
    {
        $id = request("id");
        $sondage = Topic::where('id', $id)
        ->first();
        return view('admin.sondage.modifiersondage', [
            'sondage'=>$sondage,
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

        $id = $request->id;
        $sondage = Topic::where('id', $id)->update([
            "title" => $request->title,
            "description" => $request->description,
            "tag" => $request->tag,
            "image" => $request->image,
            "setting" => $request->Radios,
        ]);
        return Redirect::to('admin/sondage');
    }

    public function create(Request $request)
    {

        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            // 'image' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'tag' => ['required', 'string', 'max:255'],
            'Radios' => ['required'],
        ]);

        $topic = Topic::create([
            'user_id'=> auth()->user()->id,
            'type'=> 0,
            'tag'=>$request->tag,
            'title' => $request->title,
            'description' => $request->description,
            'image'=>$request->image,
            'setting'=>$request->Radios,
        ]);
        $topic->save();
        return redirect('admin/sondage');
    }

    public function redirection()
    {
        return view('admin.sondage.creersondage', []);
    }
}
