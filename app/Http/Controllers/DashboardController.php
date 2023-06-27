<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Publication;
use App\Models\Evenement;
use App\Models\Activite;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::all();
        $publications = Publication::all();
        $evenements = Evenement::all();

        return view('dashboard', compact('users', 'publications', 'evenements'));
    }
}