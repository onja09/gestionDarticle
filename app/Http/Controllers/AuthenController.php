<?php

namespace App\Http\Controllers;

use App\Http\Requests\SingupFormRequest;
use App\Models\Persimage;
use App\Models\Projet;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Apropos;

class AuthenController extends Controller
{

    public function inscription()
    {
        return view('home.inscription');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'photo' => 'required',
            'password'=> 'required'
        ]);

        
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'photo' => $request->photo,
            'password' => Hash::make($request->password)
        ]);
        
        return redirect('/connexion');
    }

    public function updatestore(User $personne, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'photo' => 'required|image|mimes:png,jpg,jpeg|max:10000'
        ]);

        if ($request->photo) {
            $storage = Storage::disk('public');

            if ($storage->exists($personne->photo)) {
                $storage->delete($personne->photo);
            }

            $photoName = Str::random(10) . "." . $request->photo->getClientOriginalExtension();
            Storage::disk('public')->put($photoName, file_get_contents($request->photo));
    

            $personne->name = $request->name;
            $personne->email = $request->email;
            $personne->photo = $photoName;
            $personne->save();
        }

        // return redirect('/apropos');
        return redirect()->back()->with('success', "changement de photo avec sucés");
    }

    public function updatemail(User $personne, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'photo' => 'required'
        ]);


            $personne->name = $request->name;
            $personne->email = $request->email;
            $personne->photo = $request->photo;
            $personne->save();

        // return redirect('/apropos');
        return redirect()->back()->with('success', "changement de photo avec sucés");
    }

    public function connexion()
    {
        return view('home.connexion');
    }


    public function singIn(Request $request)
    {
        $credentials  = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);


        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/accueil');
        } else {
            return redirect()->back()->with('error', 'Inscrivez-vous svp');
        }
    }

    public function accueil()
    {

        return view('home.accueil');
    }




    public function logout()
    {
        Auth::logout();
        return redirect('/connexion');
    }

    public function gestion()
    {
        $projets = Projet::all();
        // $projets = Projet::paginate(4);
        return view('projets.article', ['projets' => $projets]);
    }


    public function storeProjet(Request $request)
    {
        $request->validate([
            'titre' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:10000'
        ]);

        $imageName = Str::random(10) . "." . $request->image->getClientOriginalExtension();

        Storage::disk('public')->put($imageName, file_get_contents($request->image));

        Projet::create([
            'titre' => $request->titre,
            'description' => $request->description,
            'image' => $imageName,
            'user_id' => Auth::id()
        ]);
        return redirect()->back()->with('success', "insertion d'article avec succès");
    }

    public function deleteProjet(Projet $projet)
    {
        $storage = Storage::disk('public');

        if ($storage->exists($projet->image)) {
            $storage->delete($projet->image);
        }
        $projet->delete();
        return redirect('/blog');
    }

    public function showEdit(Projet $projet)
    {
        return view('projets.show', ['projet' => $projet]);
    }

    public function update(Projet $projet, Request $request)
    {
        $request->validate([
            'titre' => 'required',
            'description' => 'required',
            'image'=> 'required|image|mimes:png,jpg,jpeg'
        ]);

        if ($request->image) {
            $storage = Storage::disk('public');

            if ($storage->exists($projet->image)) {
                $storage->delete($projet->image);
            }

            $imageName = Str::random(10) . "." . $request->image->getClientOriginalExtension();
            $storage->put($imageName, file_get_contents($request->image));

            $projet->description = $request->description;
            $projet->titre = $request->titre;
            $projet->image = $imageName;
            $projet->save();
        }

        return redirect('/gestion');
    }

    public function blog()
    {
        $mesprojets = Projet::where('user_id', Auth::id())->get();
        // $mesprojets = Projet::paginate(4);
        return view('projets.blog', ['projets' => $mesprojets]);
    }

    public function apropos()
    {
        $personnes = User::get();
        $personnels = Apropos::where('user_id', Auth::id())->get();
        return view('home.apropos', compact('personnes', 'personnels'));
    }

    public function showperso(User $personne){
        $personnels = Apropos::where('user_id', Auth::id())->get();
        return view('projets.pageperso', [
            'personne'=>$personne, 
            'personnels'=>$personnels
        ]);
    }
    
}
