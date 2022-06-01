<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Topic;
use App\Models\Response;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules\Password;

class ProfilController extends Controller
{
    public function show()
    {
        $nbsurvey = Topic::where('user_id', auth()->user()->id)
            ->where('type', '=', 0)
            ->count();

        $nbresponse = Response::where('user_id', auth()->user()->id)
            ->count();

        $nbquestion = Topic::where('user_id', auth()->user()->id)
            ->where('type', '=', 1)
            ->count();

        $user = User::where('id', auth()->user()->id)
            ->first();

        return view('pages.profil.profil', [
            'nbsurvey' => $nbsurvey,
            'nbresponse' => $nbresponse,
            'nbquestion' => $nbquestion,
            'user' => $user,
        ]);
    }

    public function redirection()
    {
        return view('pages.profil.modifierprofile', []);
    }

    public function edit(Request $request)
    {

        $request->validate([
            'pseudo' => ['string', 'max:255'],
            'email' => ['string', 'email', 'max:255'],
            // 'password' => ['password', Rules\Password::defaults()],
            'image' => ['string', 'max:255'],
            'website' => ['max:255'],
            'github' => ['max:255'],
            'twitter' => ['max:255'],
        ]);

        $id = $request->id;
        $email = $request->email;
        $pseudo = $request->pseudo;


        // $checkMail = User::where('email', $request->email)
        //     ->where('id', $id)
        //     ->exists();
        // $checkPseudo = User::where('pseudo', $request->pseudo)
        //     ->where('id', $id)
        //     ->exists();
        if (auth()->user()->email != $email && auth()->user()->pseudo != $pseudo) {
            $checkUser = User::where('email', $email)->where('pseudo', $pseudo)->exists();
            if ($checkUser) {
                return redirect()->back()->with('error','Ce pseudo et cette email existe déjà !');
            }else {
                User::find($id)->update([
                    "pseudo" => $request->pseudo,
                    "email" => $request->email,
                    "image" => $request->image,
                    "website" => $request->website,
                    "github" => $request->github,
                    "twitter" => $request->twitter,
                ]);
    
                return Redirect::to('profil')->with('success', 'Votre profil à bien été modifié !');
            }
        } elseif (auth()->user()->pseudo != $pseudo) {
            $checkUser = User::where('pseudo', $pseudo)->exists();
            if ($checkUser) {
                return redirect()->back()->with('error','Ce pseudo existe déjà !');
            }else {
                User::find($id)->update([
                    "pseudo" => $request->pseudo,
                    "email" => $request->email,
                    "image" => $request->image,
                    "website" => $request->website,
                    "github" => $request->github,
                    "twitter" => $request->twitter,
                ]);
    
                return Redirect::to('profil')->with('success', 'Votre profil à bien été modifié !');
            }
        } elseif (auth()->user()->email != $email) {
            $checkUser = User::where('email', $email)->exists();
            if ($checkUser) {
                return redirect()->back()->with('error','Cette email existe déjà !');
            }else {
                User::find($id)->update([
                    "pseudo" => $request->pseudo,
                    "email" => $request->email,
                    "image" => $request->image,
                    "website" => $request->website,
                    "github" => $request->github,
                    "twitter" => $request->twitter,
                ]);
    
                return Redirect::to('profil')->with('success', 'Votre profil à bien été modifié !');
            }
        } else {
            User::find($id)->update([
                "pseudo" => $request->pseudo,
                "email" => $request->email,
                "image" => $request->image,
                "website" => $request->website,
                "github" => $request->github,
                "twitter" => $request->twitter,
            ]);

            return Redirect::to('profil')->with('success', 'Votre profil à bien été modifié !');
        }
    }
}
