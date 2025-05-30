<?php

namespace App\Http\Controllers;

use App\Helpers\Audit;
use App\Helpers\Crypt;
use App\Helpers\Email;
use App\Helpers\Menu;
use App\Models\BonReceptionAtelier;
use App\Models\BonSortieAtelier;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NotificationGeneraleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function depotmateriel($id)
    {

        $id = Crypt::UrldeCrypt($id);
        $bonReceptionAtelier = BonReceptionAtelier::find($id);

        if (!$bonReceptionAtelier) {
            return response()->json(['error' => 'Bon de réception en atélier introuvable'], 404);
        }

        // Mettre à jour le statut du rendez-vous
        $bonReceptionAtelier->flag_envoie_mail_atteste = true;
        $bonReceptionAtelier->date_envoie_mail_atteste = Carbon::now();
        $bonReceptionAtelier->save();

        $nom =  $bonReceptionAtelier->userCreer->name;
        $email =  $bonReceptionAtelier->userCreer->email;
        $cel_users =  $bonReceptionAtelier->userCreer->cel_users;
        $prenom_users =  $bonReceptionAtelier->userCreer->prenom_users;

        $logo = Menu::get_logo();
        if (isset($email)) {
            $sujet = "Confirmation du dépot du bon de reception atelier";
            $titre = "Bienvenue sur ".@$logo->mot_cle ."";

            $messageMail = "<b>Cher,  ".$nom. " ".$prenom_users." ,</b>
            <br><br>Nous avons le plaisir de vous notifier la confirmation du dépot du bon de reception atelier a ete validé par :

            <br><b>Raison sociale  : </b> ".@$bonReceptionAtelier->client->raison_sociale."
            <br><b>Nom et prenom du deposant  : </b> ".@$bonReceptionAtelier->nom_prenom_deposant_bra."
            <br><br>



            <br><br>
            Cordialement,

            <br><br><br>
            -----
            Ceci est un mail automatique, merci de ne pas y répondre.
            -----
            ";

            $messageMailEnvoi = Email::get_envoimailTemplate($email, $bonReceptionAtelier->client->raison_sociale, $messageMail, $sujet, $titre);


        }

        Audit::logSave([

            'action'=>'INDEX',

            'code_piece'=>'',

            'menu'=>'SERVICE (Réponse du mail du mail d attestation du depot)',

            'etat'=>'Succès',

            'objet'=>'SERVICE '

        ]);
        return view('notification.reparation.confirmation', ['message' => 'Le depot du matériel a été attesté avec succès.']);

    }

    public function recumateriel($id)
    {

        $id = Crypt::UrldeCrypt($id);
        $sortieatelier = BonSortieAtelier::find($id);

        if (!$sortieatelier) {
            return response()->json(['error' => 'Bon de sortie en atélier introuvable'], 404);
        }

        // Mettre à jour le statut du rendez-vous
        $sortieatelier->flag_envoie_mail_atteste = true;
        $sortieatelier->flag_valide_bsa = true;
        $sortieatelier->flag_livrer_pro_bsa = true;
        $sortieatelier->date_envoie_mail_atteste = Carbon::now();
        $sortieatelier->date_valide_bsa = Carbon::now();
        $sortieatelier->date_livrer_pro_bsa = Carbon::now();
        $sortieatelier->save();

        $nom =  $sortieatelier->user->name;
        $email =  $sortieatelier->user->email;
        $cel_users =  $sortieatelier->user->cel_users;
        $prenom_users =  $sortieatelier->user->prenom_users;

        $logo = Menu::get_logo();
        if (isset($email)) {
            $sujet = "Confirmation du dépot du bon de reception atelier";
            $titre = "Bienvenue sur ".@$logo->mot_cle ."";

            $messageMail = "<b>Cher,  ".$nom. " ".$prenom_users." ,</b>
            <br><br>Nous avons le plaisir de vous notifier la confirmation de la reception du bon de sortie atelier a ete validé par :

            <br><b>Raison sociale  : </b> ".@$sortieatelier->bonReceptionAtelier->client->raison_sociale."
            <br><b>Nom et prenom du deposant  : </b> ".@$sortieatelier->bonReceptionAtelier->nom_prenom_deposant_bra."
            <br><br>



            <br><br>
            Cordialement,

            <br><br><br>
            -----
            Ceci est un mail automatique, merci de ne pas y répondre.
            -----
            ";

            $messageMailEnvoi = Email::get_envoimailTemplate($email, $sortieatelier->bonReceptionAtelier->client->raison_sociale, $messageMail, $sujet, $titre);


        }

        Audit::logSave([

            'action'=>'INDEX',

            'code_piece'=>'',

            'menu'=>'SERVICE (Réponse du mail du mail d attestation du depot)',

            'etat'=>'Succès',

            'objet'=>'SERVICE '

        ]);
        return view('notification.reparation.confirmation', ['message' => 'La reception du matériel a été attesté avec succès.']);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
