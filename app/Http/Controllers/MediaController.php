<?php

namespace App\Http\Controllers;
use App\Models\Media;
use Illuminate\Http\Request;

class MediaController extends Controller

{
    public function Index()
    {
        $medias = Media::all();

        return view('media.ListeMedia')->with('medias', $medias);
    }   
    public function create()
    {
    }
    public function edit()
    {
    }
    public function destroy($id)
    {
        $media = Media::findOrFail($id);
        if (!$media) {
            return redirect()->back()->with('error', 'Media introuvable');
        }
        
        $media->delete();
        return redirect()->back()->with('success', 'Media supprimé avec succès');
    }
}
