<?php

namespace App\Http\Controllers;

use App\Models\Response;
use Illuminate\Http\Request;

class ReponseController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'content' => ['required', 'string'],
        ]);

        Response::create([
            'user_id' => auth()->user()->id,
            'topic_id' => $request->topId,
            'content' => $request->content,
        ]);
        return back();
    }  
}
