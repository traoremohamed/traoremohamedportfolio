<?php

namespace App\Http\Controllers;

use App\Helpers\Audit;
use App\Helpers\Crypt;
use App\Helpers\Email;
use App\Models\BonReceptionAtelier;
use App\Models\Client;
use App\Models\HistoriqueReparations;
use App\Models\StatutReparation;
use App\Models\TypeMateriel;
use Illuminate\Http\Request;
use App\Helpers\GenerateCode as Gencode;
use App\Helpers\Menu;
use App\Models\LigneBonReceptionAtelier;
use App\Http\Controllers\ShortLinkController;
use App\Models\BonSortieAtelier;
use App\Models\Techniciens;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SortieAtelierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bons = BonSortieAtelier::all();

        Audit::logSave([
            'action' => 'INDEX',
            'code_piece' => '',
            'menu' => 'LISTE BONS DE SORTIE ATELIER',
            'etat' => 'Succès',
            'objet' => 'Services'
        ]);

        return view('sortieatelier.index', compact('bons'));
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
    public function edit($id)
    {
        $id = \App\Helpers\Crypt::UrldeCrypt($id);

        $clients = Client::where('flag_actif_cli',true)->get();

        $bonsortie = BonSortieAtelier::findOrFail($id);

        $reception = BonReceptionAtelier::findOrFail($bonsortie->id_bon_reception_atelier);

        $typesMateriels = TypeMateriel::where('flag_type_materiel',true)->get();

        $ligneBra = LigneBonReceptionAtelier::where('id_bon_reception_atelier',$bonsortie->id_bon_reception_atelier)->get();

       // $techniciens = Techniciens::where('flag_techniciens',true)->get();

        $techniciens = DB::table('users')
            ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->select('users.name', 'users.prenom_users', 'users.id','users.login_users')
            ->where([['roles.code_roles','=','TECHNICIEN']])
            ->get();

        $codeRoles = Menu::get_code_menu_profil(Auth::user()->id);

        $id_bon_reception_atelier = $bonsortie->id_bon_reception_atelier;

        $statuts = DB::table('statut_reparation')->whereNotExists(function ($query) use ($id_bon_reception_atelier){
            $query->select('*')
            ->from('historique_reparations')
            ->whereColumn('historique_reparations.id_statut','=','statut_reparation.id_statut')
            ->where('historique_reparations.id_bon_reception_atelier',$id_bon_reception_atelier);
            })
            ->where([
                ['statut_reparation.flag_statut_reparation','=', true]
            ])->get();


        //StatutReparation::where('flag_statut_reparation',true)->get();

        $MiseAJourStatuts = HistoriqueReparations::where('id_bon_reception_atelier',$id_bon_reception_atelier)->get();

        $statutMajTerminer = HistoriqueReparations::join('statut_reparation','historique_reparations.id_statut','statut_reparation.id_statut')
                                    ->where('flag_statut_reparation_fin',true)
                                    ->where('id_bon_reception_atelier',$id_bon_reception_atelier)
                                    ->get();

        Audit::logSave([
            'action' => 'MODIFIER',
            'code_piece' => $id,
            'menu' => 'LISTE DES BONS DE SORTIE ATELIER',
            'etat' => 'Succès',
            'objet' => 'Services'
        ]);

        return view('sortieatelier.edit', compact('reception','clients','typesMateriels','ligneBra','techniciens','codeRoles','statuts','MiseAJourStatuts','statutMajTerminer','bonsortie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $id =  Crypt::UrldeCrypt($id);

        $sortieatelier = BonSortieAtelier::findOrFail($id);

        if ($request->isMethod('put')) {

            $data = $request->all();

            if ($data['action'] == 'Modifier'){

                $request->validate([
                    'nom_prenom_receveur_bsa' => 'required',
                    'email_receveur_bsa' => 'required',
                    'contact_receveur_bsa' => 'required',
                ],[
                    'nom_prenom_receveur_bsa.required' => 'Veuillez ajoutez le nom et prénom du receveur',
                    'email_receveur_bsa.required' => 'Veuillez ajoutez un email du receveur',
                    'contact_receveur_bsa.required' => 'Veuillez ajoutez un contact du receveur',
                ]);

                $input = $request->all();



                $sortieatelier->update($input);


                Audit::logSave([
                    'action' => 'MISE A JOUR',
                    'code_piece' => $sortieatelier->id_bon_sortie_atelier,
                    'menu' => 'LISTE BONS DE REPARATIONS',
                    'etat' => 'Succès',
                    'objet' => 'Services'
                ]);

                return redirect('sortieatelier/'.\App\Helpers\Crypt::UrlCrypt($sortieatelier->id_bon_sortie_atelier).'/edit')->with('success', 'Succes : Enregistrement reussi ');

            }

            if ($data['action'] == 'EnvoieMail'){


                $logo = Menu::get_logo();

                $acceptUrl = route('notification.recumateriel', ['id' => Crypt::UrlCrypt($sortieatelier->id_bon_sortie_atelier), 'token' => Str::random(40)]);

                $shortener = new ShortLinkController();

                $acceptUrlShort = $shortener->createShortLink($acceptUrl);

                if (isset($sortieatelier->email_receveur_bsa)) {
                    $sujet = "Demande de dépot du bon de reception atelier au SAV";
                    $titre = "Bienvenue sur " . @$logo->mot_cle;

                    $messageMail = "
                        <b>Chère entreprise <span style='text-transform: uppercase;'>{$sortieatelier->bonReceptionAtelier->client->raison_sociale}</span>,</b>
                        <br><br>
                        Nous vous informons que votre entreprise à faire une demande de depannage et maintenance informatique aupres de notre service.
                        <br><br>
                        Ce mail vient pour confirmer la fin et la reception de bon de sortie en atelier.
                        <br><br>

                        Merci de bien vouloir confirmer le dépot en cliquant sur l'un le bouton ci-dessous :
                        <br><br>

                        <a href='" . $acceptUrlShort . "' style='display: inline-block; padding: 12px 20px; font-weight: bold; color: white; background-color: #28a745; text-decoration: none; border-radius: 5px;'>✅ Accepter</a>
                        &nbsp;&nbsp;

                        <br><br>
                        Pour toute question ou information complémentaire, veuillez contacter votre chargé de contrôle à l'adresse suivante : <b>{$sortieatelier->bonReceptionAtelier->userCreer->email}</b>.
                        <br><br>

                        Cordialement,<br>
                        <b>L'équipe SAV</b>
                        <br><br>
                        -----
                        <br>
                        <i>Ceci est un message automatique. Merci de ne pas y répondre.</i>
                        <br>
                        -----
                    ";

                    $messageMailEnvoi = Email::get_envoimailTemplate($sortieatelier->email_receveur_bsa, $sortieatelier->bonReceptionAtelier->client->raison_sociale, $messageMail, $sujet, $titre);

                }

                $sortieatelier->update([
                    'flag_envoie_mail' => true,
                    'id_user_cree_bsa' => Auth::user()->id,
                    'date_envoie_mail' => Carbon::now()
                ]);

                Audit::logSave([
                    'action' => 'MISE A JOUR',
                    'code_piece' => $sortieatelier->id_bon_sortie_atelier,
                    'menu' => 'LISTE BONS DE SORTIE',
                    'etat' => 'Succès',
                    'objet' => 'Envoi du mail'
                ]);

                return redirect('sortieatelier/'.\App\Helpers\Crypt::UrlCrypt($sortieatelier->id_bon_sortie_atelier).'/edit')->with('success', 'Succes : Enregistrement reussi ');

            }

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
