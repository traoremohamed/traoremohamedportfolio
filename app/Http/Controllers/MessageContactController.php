<?php

namespace App\Http\Controllers;

use App\Helpers\MailConfig;
use App\Models\MessageContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageContactController extends Controller
{
    public function index()
    {
        $messages = MessageContact::latest()->get();

        return view('portfolio.admin.messages.index', compact('messages'));
    }

    public function show($id)
    {
        $message = MessageContact::findOrFail($id);
        if (!$message->is_lu) {
            $message->update(['is_lu' => true]);
        }

        return view('portfolio.admin.messages.show', compact('message'));
    }

    public function repondre(Request $request, $id)
    {
        $message = MessageContact::findOrFail($id);
        $data = $request->validate(['reponse' => 'required|string|max:10000']);

        $message->update($data + ['repondu_par' => Auth::id(), 'repondu_le' => now()]);

        $envoye = MailConfig::envoyer($message->email, 'Re : ' . $message->sujet, 'contact_reponse', ['contact' => $message]);

        return back()->with($envoye ? 'success' : 'error', $envoye ? 'Réponse envoyée à ' . $message->email . '.' : 'Réponse enregistrée mais l\'e-mail n\'a pas pu partir. Vérifiez les paramètres mail.');
    }

    public function destroy($id)
    {
        MessageContact::findOrFail($id)->delete();

        return redirect()->route('messagescontact.index')->with('success', 'Message supprimé.');
    }
}
