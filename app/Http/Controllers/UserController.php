<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;


class UserController extends Controller
{
    public function index()
    {
        $users = User::all(); 
        
        return view('User.ListeUser')->with('users', $users);
    }

    public function create()
    {
        return view('User.FormUser');
    }

    public function edit($id)
{
    $user = User::find($id);
    $roles = Role::all(); 

    return view('user.FormUser', compact('user', 'roles'));
}


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if (!$user) {
            return redirect()->back()->with('error', 'Utilisateur introuvable');
        }

        $user->delete();
        return redirect()->back()->with('success', 'Utilisateur supprimé avec succès');
    }
    public function store(Request $request)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'name' => 'required',
            'role_id' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        // Créer un nouvel objet 
        $user = new User();
        $user->name = $validatedData['name'];
        $user->role_id = $validatedData['role_id'];
        $user->email = $validatedData['email'];
        $user->password = $validatedData['password'];
        if ($request->nom !== null) {
            $user->nom = $request->nom;
        }
        if ($request->prenom !== null) {
            $user->prenom = $request->prenom;
        }
        if ($request->fonction !== null) {
            $user->fonction = $request->fonction;
        }
        if ($request->descriptif !== null) {
            $user->descriptif = $request->decriptif;
        }

        // Enregistrer dans la base de données
        $user->save();

        // Rediriger l'utilisateur vers la page de liste des événements ou faire une autre action appropriée
        return redirect()->route('GestionUser.index')->with('success', 'Utilisateur ajouté avec succès');
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
    
        $validatedData = $request->validate([
            'name' => 'required',
            'role_id' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
    
        $user->name = $validatedData['name'];
        $user->role_id = $validatedData['role_id'];
        $user->email = $validatedData['email'];
        $user->password = $validatedData['password'];
        if ($request->nom !== null) {
            $user->nom = $request->nom;
        }
        if ($request->prenom !== null) {
            $user->prenom = $request->prenom;
        }
        if ($request->fonction !== null) {
            $user->fonction = $request->fonction;
        }
        if ($request->descriptif !== null) {
            $user->descriptif = $request->decriptif;
        }
    
        $user->save();
    
        return redirect()->route('GestionUser.index')->with('success', 'Utilisateur a été mis à jour avec succès.');
    }
}
