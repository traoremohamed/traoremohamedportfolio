# Contexte de reprise — Portfolio Traoré Mohamed

> À lire avant toute tâche. À mettre à jour à chaque livraison (historique, état des tests, nouveautés).
> Dernière mise à jour : 2026-11-07

## 1. Le projet en bref

Portfolio public de **Traoré Mohamed** (chef de projet IT chez Barnoin Informatique, Abidjan), pensé pour des recruteurs, avec un back-office d'administration.

- **Page publique** (`/`) : profil, parcours, projets clients, compétences, vitrine des 4 logiciels SaaS, formulaire de demande d'accès, formulaire de contact.
- **Back-office** (`/connexion`, puis menu « PORTFOLIO ») : traitement des demandes d'accès, des messages de contact, paramétrage SMTP.
- **Langue** : tout le contenu et le code métier sont en français (noms de variables, commentaires, messages).

### Contenu métier
- **Postes** : stagiaire chez Barnoin en déc. 2018, développeur logiciel en 2019, puis ingénieur développement & data, tech lead (Victoire Immobilier, GNA Assurances, Librairie de France, FDFP), et aujourd'hui chef de projet technique et IA.
- **Portefeuille actuel** : CNPS (e-CNPS, Contrôle médical), FDFP, FAFCI, AEJ.
- **Logiciels SaaS** (9, définis dans `config/portfolio.php`, clé = code de la demande d'accès ; ne pas renommer les clés existantes) :
  - `ERP_GEST_COM` → affiché **ELVIPRO** (commerce, dossier `marieattieke-evolution`) : https://erpcrm.it-prodiges.com
  - `GEST_IMMO` (dossier `immobilier_saas`) : https://gestimmo.it-prodiges.com
  - `SIH` (dossier `sih`) : https://sih.it-prodiges.com
  - `E_CONTRIBUABLE` (dossier `collectes_des_taxes`) : https://e-contribuable.it-prodiges.com
  - Sans URL publique (« Demander une démonstration ») : `ERP_GLOBAL` (`erp_globale`), `ELSCOL` (`elscol-complet`), `NOUBTP` (`noubtp`), `PHARMAPRO` (`pharmacie`), `HR_PULSE` (`sirh_pulse`).
  - Contenu (constat, avantages, chiffres) repris des PowerPoint de chaque dossier ; `atouts_communs` = bandeau commun.
- **Emails admin notifiés** : traoremohamed2g@gmail.com, mtraore@it-prodiges.com.

## 2. Stack technique

- **Langage et framework** : PHP **8.3** et Laravel **13** (migré depuis Laravel 10). Le squelette L10 est conservé (`app/Http/Kernel.php`, providers), ce qui est supporté.
- **Base de données** : PostgreSQL, base `db_portfolio`.
- **Paquets principaux** : spatie/laravel-permission 8, yajra/datatables 13, sanctum 4.
- **Thème back-office** : Vuexy (`layouts.backLayout.designadmin`).
- **Menus back-office** : stockés en base (tables `menu`, `sousmenu`, `role_has_sousmenus`). Le lien d'un menu est `url('/'.sousmenu)`.
- **Environnement local** : Laragon sous Windows. `php artisan serve --port=9018` est utilisé par l'utilisateur.
- **Déploiement** : un `Dockerfile` existe. Il n'a pas été rebuildé depuis la migration L13.

## 3. Carte des fichiers clés

### Page publique
- `resources/views/welcome.blade.php` : page unique.
  - **Données** : tableaux PHP en tête de fichier (`$projets`, `$horizon`, `$competences`, `$parcours`, `$formations`…).
  - **Style « plan d'ingénieur »** :
    - polices Newsreader et IBM Plex Sans/Mono ;
    - tokens CSS `--encre`, `--nuit`, `--cobalt`, `--cobalt-vif`, `--ciel`, `--papier` ;
    - révélations au scroll (`.revele` / `.vu`), désactivées avec `prefers-reduced-motion`.
  - **Sections** : hero, profil + chiffres animés (`#chiffres`), parcours (frise `#frise`), projets, compétences + horizon (`#horizon`), solutions, demande d'accès (`#formDemande`), formation, contact (`#formContact`).
  - **Section Logiciels (`#solutions`)** : atouts communs, sélecteur collant (onglets `.onglet`, ancres `#logiciel-{dossier}` utilisables en lien direct), une fiche `.produit` par logiciel (en-tête, galerie de captures + téléphones, chiffres, « Le constat », « Ce que vous y gagnez », modules), visionneuse `<dialog id="visionneuse">`. Sans JS, toutes les fiches s'affichent à la suite.
  - Piège : la classe `.fiche` est déjà prise par la carte d'identité du profil (`<dl class="fiche">`) ; ne pas la réutiliser.
- `public/frontend/logiciels/{dossier}/*.webp` : captures (1440×900, WebP q80, ~3 Mo au total). Prises le 2026-11-07 sur les applis locales (comptes de démo) ; Elvipro avec le nom du client remplacé par « Boutique Démo » ; E-Contribuable limité aux pages publiques (mot de passe admin local inconnu) ; vues mobiles extraites des PowerPoint.
- `resources/views/welcome_ancien_version.blade.php` : copie de sauvegarde faite par l'utilisateur. Non suivie par git.
- `public/frontend/img/traore-mohamed.jpg` : photo.
- `resources/views/connexion/login.blade.php` : page de connexion. Le panneau gauche (`.panneau-stats`) affiche des stats agrégées : demandes, comptes ouverts, en attente, messages, répartition par logiciel, histogramme sur 6 mois.

### Formulaires publics (JSON / AJAX)
- `app/Http/Controllers/IndexController.php` : `index()`, `contact()`, `demandeAcces()`.
- `routes/web.php` :
  - `POST /portfolio/contact` (`portfolio.contact`) ;
  - `POST /portfolio/demande-acces` (`portfolio.demande`) ;
  - les deux routes sont limitées par `throttle:5,10`.
- Protections :
  - honeypot `site_web` ;
  - règle email `not_regex:/[\r\n]/` contre l'injection d'en-têtes ;
  - CSRF.
- `lang/fr/validation.php` : messages de validation en français.

### Back-office
- Contrôleurs :
  - `DemandeAccesController` : index, show (passe le statut à EN_COURS), traiter, renvoyer, rejeter ;
  - `MessageContactController` : index, show, repondre, destroy ;
  - `ParametreMailController` : index, update, test.
- Vues : `resources/views/portfolio/admin/` (demandes, messages, parametresmail, `_alertes`).
- Permissions : `demandesacces-index/-edit`, `messagescontact-index/-edit`, `parametresmail-index/-edit`, attribuées au rôle ADMIN.
- Seeder : `database/seeders/PortfolioBackofficeSeeder.php` (idempotent). Il crée le menu « PORTFOLIO », ses sous-menus et les permissions.

### Mails
- Configuration SMTP en base, table `parametres_mail` (mot de passe chiffré via cast `encrypted`).
  - `app/Helpers/MailConfig.php` l'applique à l'exécution (`Config::set` + `Mail::purge`).
  - `envoyer()` journalise les erreurs au lieu de planter.
- `app/Mail/PortfolioMail.php` utilise les vues `resources/views/mails/*` : layout, demande_recue, demande_nouvelle_admin, demande_traitee, demande_rejetee, contact_admin, contact_accuse, contact_reponse, test.
- Flux d'une demande d'accès :
  1. Le demandeur reçoit l'accusé « traitement sous 48 h ».
  2. Les admins sont notifiés.
  3. L'admin traite la demande dans le back-office.
  4. Le demandeur reçoit ses accès (URL, identifiant, mot de passe).

### Base de données
- Migration `2026_10_28_100000_create_portfolio_tables.php` (déjà migrée) : tables `parametres_mail`, `demandes_acces` (référence `DA-ymd-XXXXX`, statuts EN_ATTENTE / EN_COURS / TRAITEE / REJETEE) et `messages_contact`.
- Modèles : `ParametreMail`, `DemandeAcces`, `MessageContact`.

## 4. Points d'attention (pièges connus)

- **Carbon 3** : `diffIn*` renvoie des flottants signés. Il faut caster en `(int)` et passer `true` pour obtenir la valeur absolue.
- **Spatie 6+** : un id passé en chaîne numérique est interprété comme un nom. Il faut caster les ids en `int` avant `syncPermissions` (voir `GenerermenuController`).
- **Laravel 13** :
  - `VerifyCsrfToken` étend `PreventRequestForgery` ;
  - les clés de middleware dans `config/sanctum.php` ont changé ;
  - les middlewares Spatie sont dans `Spatie\Permission\Middleware\*`.
- **Code supprimé** : le modèle et la table `agence` n'existent pas. Leurs usages ont été retirés de `UserController`.
- **Composer sous Windows** : l'antivirus verrouille les fichiers de `vendor`.
  - Arrêter le serveur local avant `composer install/update`.
  - En dernier recours, renommer `vendor` puis réinstaller.
  - Ne pas tronquer la sortie de composer avec `| head`.
- **Tester les mails sans SMTP** : `MAIL_MAILER=log php artisan serve --no-reload` (sans `--no-reload`, la variable n'est pas transmise).

## 5. Historique des livraisons

| Date | Livraison |
|------|-----------|
| 2026-10-28 | Création du portfolio : page publique, formulaires, back-office (demandes, messages, paramètres mail), mails. |
| 2026-10-28 | Refonte visuelle « plan d'ingénieur » pour un rendu moins générique. |
| 2026-10-28 | Page de connexion : panneau de statistiques à gauche. |
| 2026-10-28 | Animations : compteurs des chiffres, bloc « Pourquoi moi » avec photo qui « parle », horizon présent/futur dans « Outils ». |
| 2026-10-28 | Migration PHP 8.3, puis Laravel 10 vers 13 (Spatie 8, Sanctum 4, Yajra 13…). |
| 2026-10-28 | Corrections des textes : profil et parcours (stagiaire 2018, développeur 2019, tech lead, chef de projet technique et IA). |
| 2026-10-28 | Commit « mise a jour CV » (956901a) par l'utilisateur. |
| après 956901a | Modifications **non commitées** de l'utilisateur dans `welcome.blade.php`. Voir l'état actuel ci-dessous. |
| 2026-11-03 | Ajout de `CONTEXTE_PROJET.md` et `CLAUDE.md`. |
| 2026-11-07 | Refonte de la section Logiciels : 9 logiciels (5 nouveaux codes), 53 captures réelles, argumentaire par logiciel, onglets, galerie et visionneuse. Formulaire de demande : grille 3 colonnes. |

## 6. État actuel / travaux en cours

Modifications non commitées dans `welcome.blade.php`, faites par l'utilisateur :
- **Bloc « Pourquoi moi » supprimé** : les tableaux `$apports` et `$paroles` ont été retirés.
- **Menu renommé** : « À propos » et « Solutions ».
- **Horizon** : l'étape « futur » est devenue « Perspectives ».
- **Titres et méta** : « Chef de projet IT ».
- **Révélations au scroll** : `.revele` n'est masqué que si la classe `.js-animations` est présente, pour que le contenu reste visible sans JS.

Incohérences signalées à l'utilisateur, non corrigées (en attente de sa décision) :
- La frise affiche encore « Déc. 2018 · Ingénieur développement & data », alors que décembre 2018 correspond au stage.
- `$projets` liste encore PROGES.
- Les rôles indiqués pour Victoire Immobilier et Librairie de France diffèrent de « tech lead ».
- Le libellé de date « Projets clients » du poste tech lead est provisoire, en attente des vraies dates.

## 7. État des tests

Dernière vérification complète : 2026-10-28, sous Laravel 13.

Vérifié et OK :
- **Pages** : `/`, `/connexion`, captcha, mot de passe oublié.
- **Formulaires** : soumission et mails (driver `log`).
- **CSRF** : une requête sans jeton renvoie 419.
- **Back-office** :
  - parcours complet des demandes et des messages ;
  - enregistrement des droits, testé dans une transaction annulée (permissions identiques) ;
  - écrans utilisateurs.
- **Application** :
  - 84 routes ;
  - `config:cache`, `route:cache` et `view:cache` OK ;
  - lint PHP OK ;
  - `composer audit` sans alerte.

Non testé :
- une connexion réelle au back-office avec un vrai compte ;
- le build de l'image Docker ;
- l'envoi SMTP réel.
