<?php

namespace App\Helpers;

use App\Models\Logo;
use Illuminate\Support\Facades\DB;

class Menu
{
    public static function get_menu($idutil)
    {

        $roles = DB::table('users')
            ->join('model_has_roles', 'users.id', 'model_has_roles.model_id')
            ->join('roles', 'model_has_roles.role_id', 'roles.id')
            ->where([['users.id', '=', $idutil]])
            ->first();
        $idroles = $roles->role_id;

        $resulat = DB::table('role_has_sousmenus')
            ->join('sousmenu', 'role_has_sousmenus.sousmenus_id_sousmenu', 'sousmenu.id_sousmenu')
            ->join('roles', 'role_has_sousmenus.role_id', 'roles.id')
            ->join('menu', 'sousmenu.menu_id_menu', 'menu.id_menu')
            ->where([['roles.id', '=', $idroles], ['menu.is_valide', '=', true], ['sousmenu.is_valide', '=', true]])
            ->orderBy('menu.priorite_menu', 'ASC')
            ->orderBy('sousmenu.priorite_sousmenu', 'ASC')
            ->get();
        $tabl = [];
        foreach ($resulat as $ligne) {
            $tabl[$ligne->id_menu][] = $ligne;
        }
        return (isset($tabl) ? $tabl : '');
    }

    public static function get_id_profil($idutil)
    {
        $roles = DB::table('users')
            ->join('model_has_roles', 'users.id', 'model_has_roles.model_id')
            ->join('roles', 'model_has_roles.role_id', 'roles.id')
            ->where([['users.id', '=', $idutil]])
            ->first();
        $idroles = $roles->role_id;
        return (isset($idroles) ? $idroles : '');
    }


    public static function get_menu_profil($idutil)
    {
        $roles = DB::table('users')
            ->join('model_has_roles', 'users.id', 'model_has_roles.model_id')
            ->join('roles', 'model_has_roles.role_id', 'roles.id')
            ->where([['users.id', '=', $idutil]])
            ->first();
        $naroles = $roles->name;
        return (isset($naroles) ? $naroles : '');
    }

    public static function get_code_menu_profil($idutil)
    {

        $roles = DB::table('users')
            ->join('model_has_roles', 'users.id', 'model_has_roles.model_id')
            ->join('roles', 'model_has_roles.role_id', 'roles.id')
            ->where([['users.id', '=', $idutil]])
            ->first();
        $coderoles = @$roles->code_roles;
        return (isset($coderoles) ? $coderoles : '');
    }

    public static function get_logo()
    {
        $logof = Logo::where([['flag_logo', '=', true], ['valeur', '=', 'LOGO']])->first();
        return (isset($logof) ? $logof : '');
    }


    public static function get_info_acceuil()
    {
        $logof = Logo::where([['flag_logo', '=', true], ['valeur', '=', 'IMAGE ACCEUIL']])->first();
        return (isset($logof) ? $logof : '');
    }

    public static function get_info_couleur()
    {
        $logof = Logo::where([['flag_logo', '=', true], ['valeur', '=', 'COULEUR MENU HAUT']])->first();
        return (isset($logof) ? $logof : '');
    }

    public static function get_info_image_dashboard()
    {
        $logof = Logo::where([['flag_logo', '=', true], ['valeur', '=', 'IMAGE DASHBORD']])->get();
        return (isset($logof) ? $logof : '');
    }

    public static function get_info_reseaux()
    {
        $logof = Logo::where([['flag_logo', '=', true], ['valeur', '=', 'RESEAUX SOCIAUX']])->get();
        return (isset($logof) ? $logof : '');
    }

    public static function dateEnFrancais($dateSend)
    {
        // Configuration de la localisation en français
        $locale = 'fr_FR';
        // Obtenir la date actuelle
        $dateActuelle = new \DateTime($dateSend);
        // Créer un objet IntlDateFormatter
        $dateFormatter = new \IntlDateFormatter($locale, \IntlDateFormatter::FULL, \IntlDateFormatter::NONE);
        // Formater la date
        $dateFormatee = $dateFormatter->format($dateActuelle);
        // Afficher la date formatée
        // echo "Date en français : $dateFormatee";

        return (isset($dateFormatee) ? $dateFormatee : '');
    }


    public static function get_workflow()
    {
        $vue_workflow = DB::table('vue_workflow')->first();
        return (isset($vue_workflow) ? $vue_workflow : '');
    }

    public static function vue_timeline_bra($id)
    {
        $vue_timeline_bra = DB::table('vue_timeline_bra')->where('id_bon_reception_atelier',$id)->get();
        return (isset($vue_timeline_bra) ? $vue_timeline_bra : '');
    }

    public static function vue_performance_technicien()
    {
        $vue_performance_technicien = DB::table('vue_performance_technicien')->get();
        return $vue_performance_technicien ?? collect(); // Retourne une collection vide si null
    }

    public static function evolutionGraphique()
    {
        $bons = DB::table('vue_evolution_par_bon')->get();

        return $bons ?? collect();
    }

    public static function evolutionDonutGraphique()
    {
        $statutFinal = DB::table('vue_evolution_par_bon')
            ->select('libelle_statut', DB::raw('COUNT(*) as total'))
            ->groupBy('libelle_statut')
            ->get();

        return $statutFinal ?? collect();
    }



}
