<?php

namespace App\Http\Controllers;

use App\Helpers\MailConfig;
use App\Models\ParametreMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ParametreMailController extends Controller
{
    public function index()
    {
        $parametre = ParametreMail::actif() ?? new ParametreMail([
            'mailer' => 'smtp',
            'port' => 465,
            'encryption' => 'ssl',
            'from_name' => 'Traoré Mohamed',
            'emails_notification' => implode(', ', config('portfolio.emails_notification')),
        ]);

        return view('portfolio.admin.parametresmail.index', compact('parametre'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'host' => 'required|string|max:255',
            'port' => 'required|integer|between:1,65535',
            'encryption' => 'nullable|in:ssl,tls',
            'username' => 'nullable|string|max:255',
            'password' => 'nullable|string|max:255',
            'from_address' => 'required|email|max:255',
            'from_name' => 'required|string|max:255',
            'emails_notification' => ['required', 'string', 'max:1000', function ($attribute, $value, $fail) {
                foreach (array_filter(array_map('trim', explode(',', $value))) as $email) {
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $fail('Adresse invalide : ' . $email);
                    }
                }
            }],
        ]);

        $parametre = ParametreMail::actif() ?? new ParametreMail(['mailer' => 'smtp', 'is_actif' => true]);

        // Champ vide = on conserve le mot de passe déjà enregistré
        if (empty($data['password'])) {
            unset($data['password']);
        }

        $parametre->fill($data)->save();

        return back()->with('success', 'Paramètres mail enregistrés.');
    }

    public function test(Request $request)
    {
        $parametre = ParametreMail::actif();
        if (!$parametre) {
            return back()->with('error', 'Enregistrez d\'abord les paramètres mail.');
        }

        $destinataire = $request->input('email_test') ?: Auth::user()->email;
        $envoye = MailConfig::envoyer($destinataire, 'Test SMTP — Portfolio', 'test', ['parametre' => $parametre]);

        return back()->with(
            $envoye ? 'success' : 'error',
            $envoye ? 'E-mail de test envoyé à ' . $destinataire . '.' : 'Échec de l\'envoi. Consultez storage/logs/laravel.log pour le détail.'
        );
    }
}
