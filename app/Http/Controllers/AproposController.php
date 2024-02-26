<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apropos;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AproposController extends Controller
{
    public function storeApropos(Request $request){
        $request->validate([
            'soustitre' => 'required',
            'histoire' => 'required'
        ]);

        Apropos::create([
            'soustitre' => $request->soustitre,
            'histoire' =>$request->histoire,
            'user_id' => Auth::id()
        ]);
        return redirect()->back()->with('success', "insertion d'article avec succès");
    }

    public function getApropos(){
        $personnels = Apropos::all();
        return view('home.allapropos', compact('personnels'));
    }
}
