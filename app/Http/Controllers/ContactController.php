<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Models\MotifContact;


class ContactController extends Controller
{

    public function showContactForm()
    {
        $motifs = MotifContact::pluck('motif', 'id');
        return view('contact', compact('motifs'));
    }

    public function submitContactForm(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'prenom' => 'required',
            'nom' => 'required',
            'motif' => 'required',
            'mail' => 'required|email',
            'message' => 'required',
        ], [
            'prenom.required' => 'Veuillez renseigner votre prénom',
            'nom.required' => 'Veuillez renseigner votre nom',
            'motif.required' => 'Veuillez renseigner le motif de votre message',
            'mail.required' => 'Veuillez renseigner votre adresse email',
            'mail.email' => 'Veuillez renseigner une adresse email valide',
            'message.required' => 'Veuillez renseigner votre message',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $nom = $request->input('nom');
        $prenom = $request->input('prenom');
        $motifId = $request->input('motif');
        $mail = $request->input('mail');
        $message = $request->input('message');

        $motif = MotifContact::find($motifId);

        if ($motif) {
            $adresseEmail = $motif->email;

            $sujet = "Nouveau message de $nom $prenom";
            $contenu = "
                <h2>Formulaire contact Opus musique</h2>
                <p><strong>Nom :</strong> $nom</p>
                <p><strong>Prénom :</strong> $prenom</p>
                <p><strong>Motif :</strong> $motif->motif</p>
                <p><strong>Email :</strong> $mail</p>
                <p><strong>Message :</strong> $message</p>
            ";
            Mail::send([], [], function ($message) use ($adresseEmail, $sujet, $contenu) {
                $message->to($adresseEmail);
                $message->subject($sujet);
                $message->setBody($contenu, 'text/html');
            });

            return redirect()->back()->with('success', 'Votre message a bien été envoyé !');
        }

    }
}