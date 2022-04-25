<?php

namespace App\Http\Controllers;

use App\Models\Reporting;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function createreport(Request $request)
    {
        $request->validate([
            'options_outlined' => ['required'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
        ]);

        $checkReport = Reporting::where('topic_id', '=', $request->topId)
            ->where('response_id', '=', '0')
            ->where('user_id', auth()->user()->id)
            ->exists();

        if ($checkReport) {

            return back()->with('error', 'Signalement déja effectué!');
        } else {

            Reporting::create([
                'user_id' => auth()->user()->id,
                'topic_id' => $request->topId,
                'response_id' => 0,
                'type' => $request->options_outlined,
                'title' => $request->title,
                'description' => $request->description,
            ]);

            $type = $request->type;

            if ($type == 1) {

                return back()->with('success', 'Votre signalement à bien été envoyé!');
            } elseif ($type == 0) {

                return back()->with('success', 'Votre signalement à bien été envoyé!');
            }
        }
    }

    public function createreportresponse(Request $request)
    {
        $request->validate([
            'options_outlined' => ['required', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
        ]);
        $checkReport = Reporting::where('topic_id', '=', $request->topId)
            ->where('response_id', '=', $request->comId)
            ->where('user_id', auth()->user()->id)
            ->exists();

        if ($checkReport) {

            return redirect()->back()->with('error', 'Signalement déja effectué!');

        } else {

            Reporting::create([
                'user_id' => auth()->user()->id,
                'response_id' => $request->comId,
                'topic_id' => $request->topId,
                'type' => $request->options_outlined,
                'title' => $request->title,
                'description' => $request->description,
            ]);

            return redirect()->back()->with('success', 'Votre signalement à bien été envoyé!');

        }
    }
}