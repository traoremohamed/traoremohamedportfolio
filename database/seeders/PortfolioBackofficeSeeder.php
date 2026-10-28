<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\PermissionRegistrar;

/**
 * Menu « PORTFOLIO » du backoffice : demandes d'accès, messages de contact, paramètres mail.
 * Idempotent : peut être relancé sans créer de doublons.
 *
 * php artisan db:seed --class=PortfolioBackofficeSeeder
 */
class PortfolioBackofficeSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        $idMenu = DB::table('menu')->where('menu', 'PORTFOLIO')->value('id_menu');
        if (!$idMenu) {
            $idMenu = DB::table('menu')->insertGetId([
                'menu' => 'PORTFOLIO',
                'priorite_menu' => '0',
                'is_valide' => true,
                'icone' => '<i class="menu-icon tf-icons ti ti-briefcase"></i>',
                'created_at' => $now,
                'updated_at' => $now,
            ], 'id_menu');
        }

        $sousmenus = [
            'demandesacces' => ["Demandes d'accès", 1],
            'messagescontact' => ['Messages de contact', 2],
            'parametresmail' => ['Paramètres mail', 3],
        ];

        $roleAdmin = DB::table('roles')->where('code_roles', 'ADMIN')->value('id');

        foreach ($sousmenus as $slug => [$libelle, $priorite]) {
            $idSousmenu = DB::table('sousmenu')->where('sousmenu', $slug)->value('id_sousmenu');
            if (!$idSousmenu) {
                $idSousmenu = DB::table('sousmenu')->insertGetId([
                    'menu_id_menu' => $idMenu,
                    'sousmenu' => $slug,
                    'libelle' => $libelle,
                    'priorite_sousmenu' => (string) $priorite,
                    'is_valide' => true,
                    'created_at' => $now,
                    'updated_at' => $now,
                ], 'id_sousmenu');
            }

            foreach (['index' => 'Consulter', 'edit' => 'Traiter'] as $action => $libAction) {
                $nom = $slug . '-' . $action;
                $idPermission = DB::table('permissions')->where('name', $nom)->value('id');
                if (!$idPermission) {
                    $idPermission = DB::table('permissions')->insertGetId([
                        'name' => $nom,
                        'guard_name' => 'web',
                        'is_valide' => true,
                        'lib_permission' => $libAction . ' — ' . $libelle,
                        'id_sousmenu' => $idSousmenu,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ]);
                }

                if ($roleAdmin) {
                    DB::table('role_has_permissions')->insertOrIgnore([
                        'permission_id' => $idPermission,
                        'role_id' => $roleAdmin,
                    ]);
                }
            }

            if ($roleAdmin && !DB::table('role_has_sousmenus')->where(['sousmenus_id_sousmenu' => $idSousmenu, 'role_id' => $roleAdmin])->exists()) {
                DB::table('role_has_sousmenus')->insert([
                    'sousmenus_id_sousmenu' => $idSousmenu,
                    'role_id' => $roleAdmin,
                ]);
            }
        }

        app(PermissionRegistrar::class)->forgetCachedPermissions();
    }
}
