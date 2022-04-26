<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules\Password;

class AdminUserController extends Controller
{
    public function show()
    {
        $users = User::get();
        return view('admin.utilisateur.utilisateur', [
            "users" => $users,
        ]);
    }

    public function delete()
    {
        $id = request("id");
        User::where('id', $id)
            ->delete();

        return redirect('admin/utilisateur');
    }

    public function showone()
    {
        $id = request("id");
        $user = User::where('id', $id)
            ->first();

        return view('admin.utilisateur.modifierutilisateur', [
            'user' => $user,
        ]);
    }

    public function edit(Request $request)
    {
        $request->validate([
            'pseudo' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'Radios' => ['required'],
        ]);
        $id = $request->id;

        User::find($id)->update([
            "pseudo" => $request->pseudo,
            "email" => $request->email,
            "role" => $request->Radios
        ]);

        return Redirect::to('admin/utilisateur')->with('success', 'Votre profil à bien été modifié !');
    }

    public function create(Request $request)
    {
        $request->validate([
            'pseudo' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', Rules\Password::defaults()],
            'image' => ['string', 'max:255'],
            'website' => ['max:255'],
            'github' => ['max:255'],
            'twitter' => ['max:255'],
            'Radios' => ['required'],
        ]);

        $user = User::create([
            'user_id' => auth()->user()->id,
            'pseudo' => $request->pseudo,
            'email' => $request->email,
            'password' => $request->password,
            'image' => $request->image,
            'website' => $request->website,
            'github' => $request->github,
            'twitter' => $request->twitter,
            'role' => $request->Radios,
        ]);
        $user->save();
        return redirect('admin/utilisateur');
    }

    public function redirection()
    {
        return view('admin.utilisateur.creerutilisateur', []);
    }
}
