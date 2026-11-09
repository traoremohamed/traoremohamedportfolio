@php
    $anneesExperience = (int) \Carbon\Carbon::parse('2018-12-01')->diffInYears(now());
    $atoutsCommuns = config('portfolio.atouts_communs', []);

    $projets = [
        [
            'client' => 'CNPS', 'titre' => 'e-CNPS', 'role' => 'Chef de projet',
            'texte' => "Portail de services en ligne de la Caisse Nationale de Prévoyance Sociale. Migration vers Laminas et mise en place du paiement en ligne des cotisations.",
            'tags' => ['Laminas', 'Paiement en ligne', 'PostgreSQL'],
        ],
        [
            'client' => 'CNPS', 'titre' => 'Contrôle médical', 'role' => 'Chef de projet',
            'texte' => "Dématérialisation du contrôle médical : circulation des dossiers, suivi des avis et des décisions, historique complet.",
            'tags' => ['Workflow', 'Laravel', 'Traçabilité'],
        ],
        [
            'client' => 'CNPS', 'titre' => 'PROGES', 'role' => 'Chef de projet',
            'texte' => "Application de gestion métier interne à la CNPS, avec tableaux de bord de suivi pour les responsables.",
            'tags' => ['Gestion métier', 'Tableaux de bord', 'Scrum'],
        ],
        [
            'client' => 'FAFCI', 'titre' => "Scoring du risque d'emprunt", 'role' => 'Data & chef de projet',
            'texte' => "Modèles de scoring en machine learning pour évaluer le risque avant l'octroi d'un financement.",
            'tags' => ['Python', 'Scikit-learn', 'Power BI'],
        ],
        [
            'client' => 'AEJ', 'titre' => 'Agence Emploi Jeunes', 'role' => 'Chef de projet',
            'texte' => "Plateforme de suivi des bénéficiaires et des programmes d'insertion, avec le reporting associé.",
            'tags' => ['Plateforme web', 'Reporting', 'PostgreSQL'],
        ],
        [
            'client' => 'Librairie de France', 'titre' => 'Fidélité client', 'role' => 'Data analyste',
            'texte' => "Segmentation de la clientèle et tableaux de bord fidélité utilisés par les équipes commerciales.",
            'tags' => ['Segmentation', 'Talend', 'Power BI'],
        ],
        [
            'client' => 'Victoire Immobilier', 'titre' => 'Gestion immobilière', 'role' => 'Chef de projet',
            'texte' => "Gestion du patrimoine, de la location et du suivi commercial.",
            'tags' => ['Laravel', 'Gestion locative'],
        ],
    ];

    $horizon = [
        ['hier', '2018', 'Le code', 'Laravel, API REST, mobile. Les bases du métier.'],
        ['present', "Aujourd'hui", 'Le pilotage', 'Projets CNPS, FDFP, FAFCI, AEJ. Équipes, délais, recettes.'],
        ['encours', 'En cours', "L'IA et le Big Data", 'Deux mastères spécialisés, appliqués à mes projets.'],
        ['futur', 'Perspectives', "Data et intelligence artificielle", 'Approfondir ces sujets et les intégrer aux projets lorsque le besoin le justifie.'],
    ];

    $competences = [
        'Développement' => ['Laravel, Laminas, Zend', 'Django, Flask', 'Vue.js, React, Angular', 'Flutter, Java'],
        'Données' => ['PostgreSQL, MySQL, Oracle', 'MongoDB', 'Talend (ETL)', 'Power BI'],
        'IA & analyse' => ['Scikit-learn, TensorFlow', 'Pandas, Seaborn, Matplotlib', 'Scoring, segmentation'],
        'Livraison & pilotage' => ['Docker, GitLab CI/CD', 'Coolify, Linux', 'Agile Scrum', 'Encadrement, formation'],
    ];

    $parcours = [
        ['Aujourd\'hui', 'Chef de projet', 'Barnoin Informatique', "Responsable des projets CNPS (e-CNPS, Contrôle médical), FDFP, FAFCI et AEJ. Cadrage, planning, relation client, recette, mise en production."],
        ['Projets clients', 'Tech lead', 'Barnoin Informatique', "Architecture et direction technique de la digitalisation des processus du FDFP, de Librairie de France et de Victoire Immobilier, encadrement des développeurs."],
        ['Déc. 2018', 'Ingénieur développement & data', 'Barnoin Informatique', "Développement web et mobile, pipelines ETL, tableaux de bord Power BI, analyses prédictives en Python."],
        ['Oct. 2018', 'Développeur stagiaire', 'DIS, Divam Integration Service', "Développement et maintenance d'applications web et mobiles."],
        ['Avr. 2018', 'Développeur stagiaire', 'Africa Connect', "API REST et module de planification des interventions techniques."],
    ];

    $formations = [
        ['Mastère spécialisé, Intelligence Artificielle', 'Tech Global University', 'en cours'],
        ['Mastère spécialisé, Visual Analytics & Big Data', 'Tech Global University', 'en cours'],
        ['Master, Génie Logiciel', 'Groupe EDHEC Abidjan', ''],
        ['Licence, Informatique', 'ESATIC', ''],
        ['Certificat Big Data & Business Intelligence', 'ESLSCA Business School', ''],
    ];
@endphp
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Mohamed Traoré | Chef de projet IT & ingénieur logiciel</title>
    <meta name="description" content="Mohamed Traoré, chef de projet IT et ingénieur logiciel à Abidjan. Expérience en pilotage de projets, développement logiciel, Data et solutions métier.">
    <meta property="og:title" content="Mohamed Traoré | Chef de projet IT & ingénieur logiciel">
    <meta property="og:image" content="{{ asset('frontend/img/traore-mohamed.jpg') }}">
    <link rel="icon" href="/favicon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,opsz,wght@0,6..72,400;0,6..72,500;1,6..72,400&family=IBM+Plex+Sans:wght@400;500;600&family=IBM+Plex+Mono:wght@400;500&display=swap" rel="stylesheet">
    <style>
        :root {
            --encre: #0a1838;
            --nuit: #0d2150;
            --cobalt: #1f4fd8;
            --cobalt-vif: #2f66ff;
            --ciel: #9cc0ff;
            --brume: #e6eefb;
            --papier: #f5f8fd;
            --blanc: #ffffff;
            --ligne: #d3dcec;
            --gris: #56658a;
            --serif: 'Newsreader', Georgia, serif;
            --sans: 'IBM Plex Sans', system-ui, sans-serif;
            --mono: 'IBM Plex Mono', ui-monospace, monospace;
            --sortie: cubic-bezier(.16, 1, .3, 1);
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }
        html { scroll-behavior: smooth; }
        body { font-family: var(--sans); color: var(--encre); background: var(--papier); line-height: 1.6; font-size: 16px; overflow-x: hidden; }
        a { color: inherit; text-decoration: none; }
        img { display: block; max-width: 100%; }
        ::selection { background: var(--cobalt); color: #fff; }
        .cadre { width: min(1180px, 100% - 40px); margin-inline: auto; }
        .mono { font-family: var(--mono); font-size: .78rem; letter-spacing: .02em; }
        .hero .cadre > *, .profil > *, .bloc-form > *, .etude > *, .titre-section > * { min-width: 0; }

        /* ---------- En-tête ---------- */
        .entete {
            position: fixed; inset: 0 0 auto; z-index: 50; transition: background .3s, border-color .3s;
            border-bottom: 1px solid transparent;
        }
        .entete.fond { background: rgba(245, 248, 253, .92); backdrop-filter: blur(8px); -webkit-backdrop-filter: blur(8px); border-color: var(--ligne); }
        .entete .cadre { display: flex; align-items: center; justify-content: space-between; height: 68px; }
        .signature { font-family: var(--serif); font-size: 1.25rem; }
        .signature b { font-weight: 500; }
        .menu { display: flex; gap: 28px; list-style: none; }
        .menu a { font-family: var(--mono); font-size: .8rem; color: var(--gris); position: relative; padding: 4px 0; transition: color .2s; }
        .menu a::after { content: ''; position: absolute; left: 0; bottom: 0; height: 1px; width: 100%; background: var(--cobalt); transform: scaleX(0); transform-origin: right; transition: transform .35s var(--sortie); }
        .menu a:hover, .menu a.ici { color: var(--encre); }
        .menu a:hover::after, .menu a.ici::after { transform: scaleX(1); transform-origin: left; }
        .burger { display: none; background: none; border: 0; font-family: var(--mono); font-size: .85rem; color: var(--encre); cursor: pointer; }

        /* ---------- Boutons ---------- */
        .bouton {
            display: inline-flex; align-items: center; gap: 12px; font-family: var(--sans); font-weight: 500; font-size: .95rem;
            padding: 14px 22px; border-radius: 3px; border: 1px solid var(--cobalt); cursor: pointer; position: relative; overflow: hidden;
            background: var(--cobalt); color: #fff; isolation: isolate; transition: color .3s;
        }
        .bouton::before { content: ''; position: absolute; inset: 0; background: var(--encre); transform: translateY(101%); transition: transform .4s var(--sortie); z-index: -1; }
        .bouton:hover::before { transform: none; }
        .bouton .fleche { transition: transform .3s var(--sortie); }
        .bouton:hover .fleche { transform: translateX(4px); }
        .bouton.clair { background: transparent; color: var(--encre); border-color: var(--encre); }
        .bouton.clair:hover { color: #fff; }
        .lien-souligne { font-weight: 500; border-bottom: 1px solid currentColor; padding-bottom: 2px; transition: color .2s; }
        .lien-souligne:hover { color: var(--cobalt); }

        /* ---------- Hero ---------- */
        .hero { padding: 130px 0 0; }
        .hero .cadre { display: grid; grid-template-columns: 1.25fr .75fr; gap: 64px; align-items: end; }
        .hero .meta { display: flex; flex-wrap: wrap; gap: 8px 22px; color: var(--gris); margin-bottom: 34px; }
        .hero .meta span::before { content: '/ '; color: var(--cobalt); }
        .hero h1 { font-family: var(--serif); font-weight: 400; font-size: clamp(3rem, 7.4vw, 6.2rem); line-height: .98; letter-spacing: -.025em; }
        .hero h1 .ligne-t { display: block; overflow: hidden; padding-bottom: .06em; }
        .hero h1 .ligne-t > span { display: block; transform: translateY(105%); animation: monte 1.1s var(--sortie) forwards; }
        .hero h1 .ligne-t:nth-child(2) > span { animation-delay: .12s; }
        .hero h1 em { font-style: italic; color: var(--cobalt); }
        @keyframes monte { to { transform: none; } }
        .hero .intro { font-size: 1.14rem; max-width: 560px; margin: 34px 0 38px; color: #2a3a60; opacity: 0; animation: apparait .9s .45s var(--sortie) forwards; }
        .hero .intro strong { font-weight: 600; color: var(--encre); }
        .hero .actions { display: flex; align-items: center; flex-wrap: wrap; gap: 26px; opacity: 0; animation: apparait .9s .6s var(--sortie) forwards; }
        @keyframes apparait { from { opacity: 0; transform: translateY(14px); } to { opacity: 1; transform: none; } }

        .planche {
            position: relative; aspect-ratio: 4 / 5; background: linear-gradient(165deg, var(--nuit) 0%, #143a9a 60%, var(--cobalt) 100%);
            clip-path: inset(100% 0 0 0); animation: devoile 1.3s .2s var(--sortie) forwards; overflow: hidden;
        }
        @keyframes devoile { to { clip-path: inset(0 0 0 0); } }
        .planche::after {
            content: ''; position: absolute; inset: 0; pointer-events: none;
            background: linear-gradient(180deg, rgba(13, 33, 80, .55) 0%, transparent 18%, transparent 55%, rgba(13, 33, 80, .35) 75%, rgba(10, 24, 56, .92) 100%);
        }
        .planche .grille-plan {
            position: absolute; inset: 0; opacity: .5; z-index: 1; pointer-events: none;
            -webkit-mask-image: radial-gradient(ellipse 60% 55% at 50% 45%, transparent 55%, #000 100%);
            mask-image: radial-gradient(ellipse 60% 55% at 50% 45%, transparent 55%, #000 100%);
            background-image: linear-gradient(rgba(156, 192, 255, .35) 1px, transparent 1px), linear-gradient(90deg, rgba(156, 192, 255, .35) 1px, transparent 1px);
            background-size: 28px 28px; animation: glisse-grille 24s linear infinite;
        }
        @keyframes glisse-grille { to { background-position: 28px 28px, 28px 28px; } }
        .planche img {
            position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; object-position: 50% 4%;
            filter: saturate(.92) contrast(1.05); transform: scale(1.08); animation: recadre 1.8s .3s var(--sortie) forwards;
        }
        @keyframes recadre { to { transform: none; } }
        .planche .trace { position: absolute; inset: 0; width: 100%; height: 100%; pointer-events: none; z-index: 2; }
        .planche .legende, .planche .cartouche { z-index: 3; }
        .planche .trace path, .planche .trace line, .planche .trace rect { stroke: var(--ciel); stroke-width: 1; fill: none; }
        .dessine { stroke-dasharray: var(--l, 600); stroke-dashoffset: var(--l, 600); animation: trait 1.6s var(--sortie) forwards; }
        @keyframes trait { to { stroke-dashoffset: 0; } }
        .planche .legende { position: absolute; left: 14px; top: 12px; right: 14px; display: flex; justify-content: space-between; color: var(--ciel); }
        .planche .cartouche {
            position: absolute; left: 14px; bottom: 14px; background: var(--papier); color: var(--encre); padding: 10px 14px; border-left: 3px solid var(--cobalt);
            font-size: .82rem; line-height: 1.4; opacity: 0; animation: apparait .8s 1.3s var(--sortie) forwards;
        }
        .planche .cartouche b { display: block; font-family: var(--serif); font-size: 1.02rem; font-weight: 500; }

        /* Bandeau des clients */
        .clients { margin-top: 80px; border-block: 1px solid var(--ligne); overflow: hidden; padding: 20px 0; background: var(--blanc); }
        .clients .piste { display: flex; width: max-content; animation: defile 50s linear infinite; }
        .clients span { font-family: var(--serif); font-style: italic; font-size: 1.5rem; color: var(--nuit); padding: 0 34px; white-space: nowrap; display: flex; align-items: center; gap: 34px; }
        .clients span::after { content: ''; width: 6px; height: 6px; background: var(--cobalt); transform: rotate(45deg); }
        .clients:hover .piste { animation-play-state: paused; }
        @keyframes defile { to { transform: translateX(-50%); } }

        /* ---------- Sections ---------- */
        .section { padding: 120px 0; }
        .titre-section { display: grid; grid-template-columns: 220px 1fr; gap: 40px; margin-bottom: 56px; align-items: baseline; }
        .titre-section .num { color: var(--cobalt); }
        .titre-section h2 { font-family: var(--serif); font-weight: 400; font-size: clamp(2rem, 4vw, 3.1rem); line-height: 1.08; letter-spacing: -.015em; max-width: 760px; }
        .titre-section h2 em { color: var(--cobalt); }
        .decale { margin-left: 260px; }

        .revele { opacity: 1; transform: none; transition: opacity .9s var(--sortie), transform .9s var(--sortie); }
        .js-animations .revele { opacity: 0; transform: translateY(18px); }
        .revele.vu { opacity: 1; transform: none; }

        /* Chiffres */
        .chiffres { display: grid; grid-template-columns: repeat(4, 1fr); position: relative; }
        .chiffres::before { content: ''; position: absolute; inset: 0 0 auto; height: 1px; background: var(--encre); transform: scaleX(0); transform-origin: left; transition: transform 1.3s var(--sortie); }
        .chiffres.vu::before { transform: none; }
        .chiffres div {
            padding: 26px 22px 0 0; opacity: 0; transform: translateY(28px);
            transition: opacity .8s var(--sortie), transform .9s var(--sortie); transition-delay: calc(.25s + var(--i) * .13s);
        }
        .chiffres.vu div { opacity: 1; transform: none; }
        .chiffres div + div { padding-left: 22px; border-left: 1px solid var(--ligne); }
        .chiffres div::after { content: ''; display: block; height: 2px; width: 0; margin-top: 16px; background: var(--cobalt); transition: width 1s var(--sortie); transition-delay: calc(.9s + var(--i) * .13s); }
        .chiffres.vu div::after { width: 44px; }
        .chiffres b { display: inline-block; font-family: var(--serif); font-weight: 400; font-size: 3.6rem; line-height: 1; color: var(--nuit); transition: color .4s; }
        .chiffres b.fini { animation: tic .6s var(--sortie); }
        @keyframes tic { 40% { transform: translateY(-6px); color: var(--cobalt); } }
        .chiffres span { display: block; margin-top: 10px; color: var(--gris); font-size: .92rem; max-width: 190px; }

        /* Profil */
        .profil { display: grid; grid-template-columns: 1.3fr .7fr; gap: 70px; }
        .profil .texte p { font-family: var(--serif); font-size: 1.42rem; line-height: 1.5; margin-bottom: 22px; color: #1b2b52; }
        .profil .texte p:first-child::first-letter { font-size: 3.4em; float: left; line-height: .9; padding: 6px 10px 0 0; color: var(--cobalt); }
        .marque { position: relative; white-space: nowrap; }
        .marque svg { position: absolute; left: -2%; bottom: -.32em; width: 104%; height: .5em; overflow: visible; }
        .marque path { fill: none; stroke: var(--cobalt); stroke-width: 3; stroke-linecap: round; stroke-dasharray: 260; stroke-dashoffset: 260; transition: stroke-dashoffset 1.2s .3s var(--sortie); }
        .vu .marque path { stroke-dashoffset: 0; }
        .fiche { border-top: 1px solid var(--encre); }
        .fiche div { display: grid; grid-template-columns: 110px 1fr; gap: 14px; padding: 15px 0; border-bottom: 1px solid var(--ligne); font-size: .94rem; }
        .fiche dt { color: var(--gris); }
        .fiche dd a:hover { color: var(--cobalt); }

        /* Apports */
        .dialogue { display: grid; grid-template-columns: 300px 1fr; gap: 60px; align-items: start; }
        .orateur { position: sticky; top: 96px; }
        .bulle {
            position: relative; background: var(--encre); color: #e3ebfb; padding: 18px 20px 20px; min-height: 150px; margin-bottom: 22px;
            border-left: 3px solid var(--cobalt-vif);
        }
        .bulle::after { content: ''; position: absolute; left: 60px; bottom: -14px; border: 14px solid transparent; border-bottom: 0; border-top-color: var(--encre); }
        .bulle .qui { display: flex; justify-content: space-between; color: var(--ciel); margin-bottom: 8px; }
        .bulle .qui i { font-style: normal; color: #7e93bd; }
        .bulle p { font-family: var(--serif); font-size: 1.18rem; line-height: 1.45; color: #fff; }
        .bulle .caret { display: inline-block; width: 2px; height: 1.05em; margin-left: 2px; vertical-align: -2px; background: var(--ciel); animation: clignote 1s step-end infinite; }
        @keyframes clignote { 50% { opacity: 0; } }
        .portrait-parle { position: relative; aspect-ratio: 4 / 4.4; overflow: hidden; background: linear-gradient(165deg, var(--nuit), var(--cobalt)); }
        .portrait-parle img { width: 100%; height: 100%; object-fit: cover; object-position: 50% 3%; transform-origin: 50% 30%; transform: scale(1.35) translateY(5%); transition: transform .6s var(--sortie); }
        .orateur.parle .portrait-parle img { animation: parler 1.6s ease-in-out infinite; }
        @keyframes parler {
            0%, 100% { transform: scale(1.35) translateY(5%) rotate(0); }
            25% { transform: scale(1.36) translateY(4.6%) rotate(-.6deg); }
            50% { transform: scale(1.355) translateY(5.2%) rotate(.3deg); }
            75% { transform: scale(1.362) translateY(4.8%) rotate(.5deg); }
        }
        .onde { position: absolute; right: 12px; bottom: 12px; display: flex; align-items: flex-end; gap: 3px; height: 22px; padding: 6px 8px; background: rgba(10, 24, 56, .75); }
        .onde i { width: 3px; height: 4px; background: var(--ciel); transition: height .3s; }
        .orateur.parle .onde i { animation: onde .9s ease-in-out infinite; }
        .orateur.parle .onde i:nth-child(2) { animation-delay: -.2s; }
        .orateur.parle .onde i:nth-child(3) { animation-delay: -.45s; }
        .orateur.parle .onde i:nth-child(4) { animation-delay: -.1s; }
        .orateur.parle .onde i:nth-child(5) { animation-delay: -.6s; }
        @keyframes onde { 50% { height: 18px; } }
        .astuce { display: block; margin-top: 12px; color: var(--gris); }
        .apports { display: grid; grid-template-columns: 1fr 1fr; gap: 0 50px; }
        .apport { cursor: pointer; transition: opacity .9s var(--sortie), transform .9s var(--sortie), color .3s; outline: none; }
        .apport h3, .apport p { transition: color .4s; }
        .dialogue.actif .apport:not(.dit) h3 { color: #7d8aa8; }
        .dialogue.actif .apport:not(.dit) p { color: #98a3bd; }
        .apport.dit::before, .apport:focus-visible::before { width: 100% !important; }
        .apport { border-top: 1px solid var(--ligne); padding: 30px 0 40px; position: relative; }
        .apport::before { content: ''; position: absolute; top: -1px; left: 0; height: 2px; width: 0; background: var(--cobalt); transition: width .9s var(--sortie); }
        .apport.vu::before { width: 64px; }
        .apport .mono { color: var(--cobalt); }
        .apport h3 { font-family: var(--serif); font-weight: 500; font-size: 1.55rem; margin: 10px 0 12px; line-height: 1.2; }
        .apport p { color: #3a4a6e; max-width: 470px; }

        /* Parcours */
        .parcours { position: relative; }
        .parcours .rail { position: absolute; left: 220px; top: 0; bottom: 0; width: 1px; background: var(--ligne); }
        .parcours .rail i { position: absolute; inset: 0 0 auto; height: 0; background: var(--cobalt); width: 2px; left: -.5px; }
        .poste { display: grid; grid-template-columns: 220px 1fr; padding-bottom: 46px; position: relative; }
        .poste .quand { color: var(--gris); padding-top: 6px; }
        .poste .contenu { padding-left: 40px; position: relative; }
        .poste .contenu::before { content: ''; position: absolute; left: -5px; top: 12px; width: 9px; height: 9px; background: var(--papier); border: 1.5px solid var(--cobalt); transform: rotate(45deg); transition: background .4s; }
        .poste.vu .contenu::before { background: var(--cobalt); }
        .poste h3 { font-family: var(--serif); font-weight: 500; font-size: 1.5rem; }
        .poste .ou { color: var(--cobalt); font-weight: 500; font-size: .95rem; }
        .poste p { color: #3a4a6e; margin-top: 8px; max-width: 640px; }

        /* ---------- Projets (fond bleu nuit) ---------- */
        .projets { background: var(--encre); color: #dfe8fb; position: relative; overflow: hidden; }
        .projets::before {
            content: ''; position: absolute; inset: 0; opacity: .5; pointer-events: none;
            background-image: linear-gradient(rgba(156, 192, 255, .07) 1px, transparent 1px), linear-gradient(90deg, rgba(156, 192, 255, .07) 1px, transparent 1px);
            background-size: 40px 40px;
        }
        .projets::after { content: ''; position: absolute; width: 900px; height: 900px; right: -300px; top: -300px; background: radial-gradient(circle, rgba(47, 102, 255, .28), transparent 65%); pointer-events: none; }
        .projets .cadre { position: relative; z-index: 1; }
        .projets .titre-section h2 { color: #fff; }
        .projets .titre-section h2 em { color: var(--ciel); }
        .projets .titre-section .num { color: var(--ciel); }

        .etude { display: grid; grid-template-columns: .9fr 1.1fr; gap: 56px; padding: 44px; border: 1px solid rgba(156, 192, 255, .22); background: linear-gradient(140deg, rgba(31, 79, 216, .22), rgba(13, 33, 80, .2)); margin-bottom: 70px; }
        .etude .mono { color: var(--ciel); }
        .etude h3 { font-family: var(--serif); font-weight: 400; font-size: 2.3rem; line-height: 1.1; color: #fff; margin: 12px 0 16px; }
        .etude p { color: #b9c8e8; margin-bottom: 14px; }
        .etude ul { list-style: none; margin-top: 22px; border-top: 1px solid rgba(156, 192, 255, .2); }
        .etude li { padding: 11px 0; border-bottom: 1px solid rgba(156, 192, 255, .2); display: flex; justify-content: space-between; gap: 20px; font-size: .93rem; }
        .etude li span:first-child { color: #8ea3cc; }
        .schema svg { width: 100%; height: auto; }
        .schema text { font-family: var(--mono); font-size: 10.5px; fill: #c9d8f6; }
        .schema .boite { fill: rgba(10, 24, 56, .85); stroke: var(--ciel); stroke-width: 1; }
        .schema .boite.forte { fill: var(--cobalt); stroke: var(--cobalt-vif); }
        .schema .lien-s { stroke: #6f93db; stroke-width: 1.2; fill: none; }
        .schema .flux { stroke: #fff; stroke-width: 1.6; fill: none; stroke-dasharray: 3 12; animation: circule 1.4s linear infinite; opacity: .9; }
        @keyframes circule { to { stroke-dashoffset: -30; } }
        .schema .etape-s { opacity: 0; transform: translateY(6px); transition: opacity .6s var(--sortie), transform .6s var(--sortie); }
        .schema.vu .etape-s { opacity: 1; transform: none; }

        .liste-projets { border-top: 1px solid rgba(156, 192, 255, .3); }
        .projet { border-bottom: 1px solid rgba(156, 192, 255, .18); }
        .projet button {
            all: unset; box-sizing: border-box; cursor: pointer; width: 100%; display: grid; grid-template-columns: 70px 220px 1fr 220px 30px;
            gap: 20px; align-items: baseline; padding: 24px 0; position: relative; transition: padding .4s var(--sortie);
        }
        .projet button:focus-visible { outline: 2px solid var(--ciel); outline-offset: 4px; }
        .projet button:hover { padding-left: 14px; }
        .projet .idx { color: #7e93bd; }
        .projet .cl { font-family: var(--mono); font-size: .82rem; color: var(--ciel); }
        .projet .ti { font-family: var(--serif); font-size: 1.6rem; color: #fff; line-height: 1.2; }
        .projet .ro { color: #9fb2d8; font-size: .9rem; }
        .projet .plus { width: 16px; height: 16px; position: relative; justify-self: end; }
        .projet .plus::before, .projet .plus::after { content: ''; position: absolute; background: var(--ciel); left: 0; top: 7px; width: 16px; height: 1.5px; transition: transform .4s var(--sortie); }
        .projet .plus::after { transform: rotate(90deg); }
        .projet.ouvert .plus::after { transform: rotate(0); }
        .projet .detail { display: grid; grid-template-rows: 0fr; transition: grid-template-rows .5s var(--sortie); }
        .projet.ouvert .detail { grid-template-rows: 1fr; }
        .projet .detail > div { overflow: hidden; }
        .projet .detail p { margin: 0 0 0 310px; max-width: 560px; color: #c2d0ee; }
        .projet .tags { margin: 14px 0 26px 310px; display: flex; flex-wrap: wrap; gap: 8px; }
        .projet .tags span { font-family: var(--mono); font-size: .74rem; border: 1px solid rgba(156, 192, 255, .35); padding: 3px 9px; color: var(--ciel); }

        /* Compétences */
        .competences { display: grid; grid-template-columns: repeat(4, 1fr); border-top: 1px solid var(--encre); }
        .competences div { padding: 24px 24px 0 0; }
        .competences div + div { padding-left: 24px; border-left: 1px solid var(--ligne); }
        .competences h3 { font-family: var(--mono); font-size: .8rem; font-weight: 500; color: var(--cobalt); margin-bottom: 16px; text-transform: uppercase; letter-spacing: .06em; }
        .competences li { list-style: none; padding: 7px 0; border-bottom: 1px dashed var(--ligne); font-size: .95rem; }
        .competences > div { opacity: 0; transform: translateY(20px); transition: opacity .8s var(--sortie), transform .8s var(--sortie); transition-delay: calc(var(--c) * .12s); }
        .competences li { opacity: 0; transform: translateX(-10px); transition: opacity .6s var(--sortie), transform .6s var(--sortie); transition-delay: calc(.3s + var(--c) * .12s + var(--j) * .07s); }
        .competences.vu > div, .competences.vu li { opacity: 1; transform: none; }

        /* Frise de réflexion : présent → futur */
        .horizon { position: relative; margin-bottom: 70px; padding-top: 6px; }
        .ligne-h { position: absolute; top: 12px; left: 0; right: 0; height: 2px; }
        .ligne-h .plein { position: absolute; left: 0; top: 0; height: 2px; width: 52%; background: var(--cobalt); transform: scaleX(0); transform-origin: left; transition: transform 1.6s var(--sortie); }
        .ligne-h .pointille {
            position: absolute; left: 52%; right: 0; top: 0; height: 2px; opacity: 0; transition: opacity .8s 1.4s;
            background: repeating-linear-gradient(90deg, var(--cobalt) 0 6px, transparent 6px 13px); background-size: 13px 2px; animation: avance 1s linear infinite;
        }
        @keyframes avance { to { background-position: 13px 0; } }
        .ligne-h .projection { position: absolute; top: -4px; left: 52%; width: 10px; height: 10px; border-radius: 50%; background: var(--cobalt-vif); box-shadow: 0 0 0 4px rgba(47, 102, 255, .18); opacity: 0; }
        .horizon.vu .plein { transform: none; }
        .horizon.vu .pointille { opacity: 1; }
        .horizon.vu .projection { animation: projette 3.4s 2s ease-in-out infinite; }
        @keyframes projette { 0% { left: 52%; opacity: 0; } 15% { opacity: 1; } 85% { opacity: 1; } 100% { left: 99%; opacity: 0; } }
        .jalons { display: grid; grid-template-columns: repeat(4, 1fr); gap: 26px; position: relative; }
        .jalon { opacity: 0; transform: translateY(16px); transition: opacity .8s var(--sortie), transform .8s var(--sortie); transition-delay: calc(.3s + var(--i) * .35s); }
        .horizon.vu .jalon { opacity: 1; transform: none; }
        .jalon .point { position: relative; display: block; width: 14px; height: 14px; margin-bottom: 22px; background: var(--papier); border: 2px solid var(--cobalt); transform: rotate(45deg); }
        .jalon.hier .point, .jalon.encours .point { background: var(--cobalt); }
        .jalon.present .point { background: var(--cobalt-vif); border-color: var(--cobalt-vif); animation: pulse-jalon 2.2s infinite; }
        @keyframes pulse-jalon { 0% { box-shadow: 0 0 0 0 rgba(47, 102, 255, .5); } 100% { box-shadow: 0 0 0 14px rgba(47, 102, 255, 0); } }
        .jalon { position: relative; }
        .ici-label { position: absolute; left: 22px; top: -22px; white-space: nowrap; font-style: normal; color: var(--cobalt-vif); font-size: .7rem; }
        .jalon.futur .point { border-style: dashed; }
        .jalon .quand { color: var(--cobalt); }
        .jalon h3 { font-family: var(--serif); font-weight: 500; font-size: 1.3rem; margin: 6px 0 6px; line-height: 1.2; }
        .jalon p { color: #3a4a6e; font-size: .92rem; }
        .jalon.futur h3, .jalon.futur p { color: var(--gris); }
        .jalon.futur { border: 1px dashed #b9c6de; padding: 0 14px 14px; margin-top: -8px; padding-top: 8px; }
        .jalon.futur .point { margin-left: -8px; }
        .reflexion { display: inline-flex; gap: 4px; margin-left: 8px; vertical-align: middle; }
        .reflexion i { width: 5px; height: 5px; border-radius: 50%; background: var(--cobalt); animation: pense 1.4s ease-in-out infinite; }
        .reflexion i:nth-child(2) { animation-delay: .2s; }
        .reflexion i:nth-child(3) { animation-delay: .4s; }
        @keyframes pense { 0%, 100% { opacity: .2; transform: translateY(0); } 40% { opacity: 1; transform: translateY(-4px); } }

        /* ---------- Solutions ---------- */
        .solutions { background: var(--blanc); border-top: 1px solid var(--ligne); }
        .solutions .chapeau { margin-top: 20px; max-width: 700px; color: #3a4a6e; font-size: 1.05rem; }

        /* Atouts communs */
        .atouts { display: grid; grid-template-columns: repeat(3, 1fr); border-top: 1px solid var(--encre); margin-bottom: 70px; }
        .atouts > div { padding: 22px 26px 26px 0; border-bottom: 1px solid var(--ligne); }
        .atouts > div:not(:nth-child(3n+1)) { padding-left: 26px; border-left: 1px solid var(--ligne); }
        .atouts .mono { color: var(--cobalt); }
        .atouts h3 { font-family: var(--serif); font-weight: 500; font-size: 1.25rem; margin: 6px 0 6px; line-height: 1.2; }
        .atouts p { color: #3a4a6e; font-size: .93rem; }

        /* Sélecteur */
        .selecteur { position: sticky; top: 68px; z-index: 20; background: rgba(255, 255, 255, .96); backdrop-filter: blur(6px); -webkit-backdrop-filter: blur(6px); padding: 14px 0 0; border-bottom: 1px solid var(--ligne); }
        .legende-sel { display: block; color: var(--gris); margin-bottom: 10px; }
        .onglets { display: grid; grid-template-columns: repeat(9, minmax(0, 1fr)); gap: 2px; }
        .onglet { min-width: 0; padding: 10px 10px 12px; border-top: 3px solid transparent; background: var(--papier); transition: background .25s, border-color .25s; scroll-snap-align: start; }
        .onglet span { display: block; color: var(--gris); font-size: .64rem; line-height: 1.35; min-height: 2.7em; }
        .onglet b { display: block; font-family: var(--serif); font-weight: 500; font-size: .92rem; line-height: 1.2; letter-spacing: -.015em; }
        .onglet:hover { background: var(--brume); }
        .onglet[aria-selected="true"] { background: var(--blanc); border-top-color: var(--teinte); box-shadow: inset 1px 0 0 var(--ligne), inset -1px 0 0 var(--ligne); }
        .onglet[aria-selected="true"] span { color: var(--teinte); }
        .onglet:focus-visible { outline: 2px solid var(--cobalt); outline-offset: -2px; }

        /* Fiche d'un logiciel */
        .fiches { margin-top: 0; }
        .produit { padding: 44px 0 56px; border-bottom: 1px solid var(--ligne); scroll-margin-top: 240px; }
        .js-onglets .produit { display: none; border-bottom: 0; }
        .js-onglets .produit.active { display: block; animation: fiche-entre .6s var(--sortie); }
        @keyframes fiche-entre { from { opacity: 0; transform: translateY(12px); } }
        .fiche-tete { display: grid; grid-template-columns: 1fr auto; gap: 30px; align-items: end; margin-bottom: 30px; }
        .fiche-tete > * { min-width: 0; }
        .produit .secteur { color: var(--teinte); text-transform: uppercase; letter-spacing: .08em; }
        .produit .secteur i { font-style: normal; color: var(--ligne); margin: 0 4px; }
        .produit .statut { color: var(--gris); }
        .produit h3 { font-family: var(--serif); font-weight: 400; font-size: clamp(2.2rem, 4.5vw, 3.4rem); line-height: 1; margin: 10px 0 10px; letter-spacing: -.01em; }
        .produit .slogan { font-family: var(--serif); font-style: italic; font-size: 1.3rem; color: #34446a; max-width: 680px; line-height: 1.35; }
        .produit .pour { margin-top: 12px; color: var(--gris); font-size: .95rem; max-width: 680px; }
        .produit .pour .mono { color: var(--encre); margin-right: 6px; text-transform: uppercase; }
        .produit .actions-l { display: flex; flex-direction: column; align-items: flex-end; gap: 12px; }
        .produit .url { color: var(--cobalt); }
        .produit .url:hover { text-decoration: underline; }

        /* Vitrine : capture principale, miniatures, téléphones */
        .vitrine { display: grid; grid-template-columns: 1fr; gap: 28px; align-items: start; }
        .vitrine.avec-mobile { grid-template-columns: minmax(0, 1fr) auto; }
        .galerie { min-width: 0; }
        .ecran { border: 1px solid #c6d2e6; background: var(--blanc); box-shadow: 0 30px 60px -30px rgba(10, 24, 56, .35), 0 0 0 6px var(--papier); }
        .fenetre { display: flex; align-items: center; gap: 6px; padding: 9px 12px; background: var(--papier); border-bottom: 1px solid #c6d2e6; }
        .fenetre i { width: 9px; height: 9px; border-radius: 50%; background: #c6d2e6; }
        .fenetre i:first-child { background: var(--teinte); }
        .fenetre span { margin-left: 12px; padding: 2px 12px; background: var(--blanc); border: 1px solid var(--ligne); color: var(--gris); font-size: .7rem; flex: 0 1 340px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }
        .agrandir { display: block; position: relative; width: 100%; padding: 0; border: 0; background: var(--papier); cursor: zoom-in; }
        .agrandir img { width: 100%; height: auto; aspect-ratio: 16 / 10; object-fit: cover; object-position: top left; transition: opacity .25s; }
        .agrandir img.change { opacity: .25; }
        .loupe { position: absolute; right: 12px; bottom: 12px; padding: 5px 10px; background: rgba(10, 24, 56, .82); color: #fff; opacity: 0; transform: translateY(4px); transition: opacity .25s, transform .25s; }
        .agrandir:hover .loupe, .agrandir:focus-visible .loupe { opacity: 1; transform: none; }
        .ecran figcaption { padding: 12px 16px; border-top: 1px solid var(--ligne); color: #34446a; font-size: .93rem; min-height: 48px; }
        .ecran .compteur { color: var(--teinte); margin-right: 8px; }
        .miniatures { display: flex; gap: 10px; margin-top: 16px; overflow-x: auto; padding: 4px 2px 8px; scrollbar-width: thin; }
        .miniature { flex: 0 0 132px; padding: 0; border: 1px solid var(--ligne); background: var(--blanc); cursor: pointer; opacity: .62; transition: opacity .25s, border-color .25s, transform .25s; }
        .miniature img { width: 100%; aspect-ratio: 16 / 10; object-fit: cover; object-position: top left; }
        .miniature:hover { opacity: 1; transform: translateY(-2px); }
        .miniature.active { opacity: 1; border-color: var(--teinte); box-shadow: 0 0 0 1px var(--teinte); }
        .miniature:focus-visible { outline: 2px solid var(--cobalt); outline-offset: 2px; }
        .telephones { display: flex; gap: 16px; }
        .telephone { width: 190px; }
        .telephone img { width: 100%; border: 8px solid var(--encre); border-radius: 26px; background: var(--encre); box-shadow: 0 24px 50px -24px rgba(10, 24, 56, .5); }
        .telephone figcaption { margin-top: 10px; color: var(--gris); font-size: .7rem; text-align: center; }

        /* Chiffres, argumentaire, modules */
        .indicateurs { display: grid; grid-template-columns: repeat(4, 1fr); margin: 44px 0 40px; border-top: 1px solid var(--encre); border-bottom: 1px solid var(--ligne); }
        .indicateurs div { padding: 18px 18px 18px 0; }
        .indicateurs div + div { padding-left: 18px; border-left: 1px solid var(--ligne); }
        .indicateurs b { display: block; font-family: var(--serif); font-weight: 400; font-size: 2.3rem; line-height: 1.05; color: var(--teinte); }
        .indicateurs span { display: block; margin-top: 4px; color: var(--gris); font-size: .88rem; }
        .argumentaire { display: grid; grid-template-columns: .8fr 1.6fr; gap: 50px; }
        .argumentaire > * { min-width: 0; }
        .argumentaire h4 { font-weight: 500; text-transform: uppercase; letter-spacing: .08em; margin-bottom: 14px; }
        .constat h4 { color: #b4232c; }
        .gains h4 { color: #15803d; }
        .constat ul { list-style: none; padding: 20px 22px; background: #fbf3f3; border-left: 2px solid #e5a3a7; }
        .constat li { padding: 9px 0; }
        .constat li + li { border-top: 1px dashed #edc8ca; }
        .constat b { display: block; font-weight: 600; font-size: .95rem; }
        .constat span { display: block; color: #5b4a52; font-size: .9rem; margin-top: 2px; }
        .grille-gains { display: grid; grid-template-columns: 1fr 1fr; gap: 0 30px; }
        .grille-gains > div { padding: 14px 0 16px 28px; border-top: 1px solid var(--ligne); position: relative; }
        .grille-gains > div::before { content: '✓'; position: absolute; left: 0; top: 14px; width: 18px; height: 18px; display: grid; place-items: center; font-size: .7rem; color: #fff; background: #15803d; border-radius: 50%; }
        .grille-gains h5 { font-size: 1rem; font-weight: 600; line-height: 1.35; }
        .grille-gains p { color: #3a4a6e; font-size: .92rem; margin-top: 4px; }
        .pied-fiche { display: flex; justify-content: space-between; align-items: center; gap: 24px; margin-top: 36px; padding-top: 24px; border-top: 1px solid var(--ligne); }
        .modules-l { display: flex; flex-wrap: wrap; gap: 8px; }
        .modules-l span { border: 1px solid var(--ligne); padding: 4px 10px; color: #34446a; font-size: .74rem; background: var(--papier); }
        .pied-fiche .bouton { flex-shrink: 0; }
        .note-captures { margin-top: 26px; color: var(--gris); }

        /* Visionneuse */
        .visionneuse { width: min(1500px, 96vw); max-width: none; max-height: 96vh; margin: auto; padding: 0; border: 0; background: var(--encre); color: #fff; }
        .visionneuse::backdrop { background: rgba(5, 12, 30, .86); }
        .visionneuse[open] { display: flex; flex-direction: column; }
        .visionneuse img { width: 100%; max-height: calc(96vh - 120px); object-fit: contain; background: #fff; }
        .visionneuse-haut, .visionneuse-bas { display: flex; align-items: center; justify-content: space-between; gap: 16px; padding: 12px 16px; }
        .visionneuse-haut .mono { color: var(--ciel); }
        .visionneuse-bas p { flex: 1; text-align: center; color: #d6e2fb; font-size: .95rem; }
        .visionneuse button { background: none; border: 1px solid rgba(156, 192, 255, .4); color: #fff; padding: 7px 12px; cursor: pointer; }
        .visionneuse button:hover { background: rgba(156, 192, 255, .15); }

        /* ---------- Formulaires ---------- */
        .bloc-form { display: grid; grid-template-columns: .75fr 1.25fr; gap: 70px; }
        .bloc-form .gauche h2 { font-family: var(--serif); font-weight: 400; font-size: clamp(2rem, 3.6vw, 2.8rem); line-height: 1.1; margin: 12px 0 18px; }
        .bloc-form .gauche p { color: #3a4a6e; }
        .bloc-form .gauche .mono { color: var(--cobalt); }
        .deroule { list-style: none; counter-reset: e; margin-top: 30px; border-top: 1px solid var(--ligne); }
        .deroule li { counter-increment: e; display: grid; grid-template-columns: 40px 1fr; padding: 13px 0; border-bottom: 1px solid var(--ligne); font-size: .95rem; }
        .deroule li::before { content: counter(e, decimal-leading-zero); font-family: var(--mono); font-size: .78rem; color: var(--cobalt); padding-top: 3px; }
        .formulaire { background: var(--blanc); border: 1px solid var(--ligne); padding: 40px; position: relative; }
        .formulaire::before { content: ''; position: absolute; left: -1px; top: -1px; width: 60px; height: 3px; background: var(--cobalt); }
        .champs { display: grid; grid-template-columns: 1fr 1fr; gap: 26px 28px; }
        .champ { position: relative; }
        .champ.large { grid-column: 1 / -1; }
        .champ label { display: block; font-family: var(--mono); font-size: .74rem; color: var(--gris); margin-bottom: 4px; text-transform: uppercase; letter-spacing: .05em; }
        .champ input, .champ select, .champ textarea {
            width: 100%; border: 0; border-bottom: 1px solid #b9c6de; background: transparent; padding: 9px 0; font: inherit; font-size: 1rem; color: var(--encre);
            border-radius: 0; transition: border-color .25s;
        }
        .champ textarea { resize: vertical; min-height: 90px; }
        .champ input:focus, .champ select:focus, .champ textarea:focus { outline: none; border-color: var(--cobalt); }
        .champ .barre-focus { position: absolute; left: 0; height: 2px; width: 100%; background: var(--cobalt); transform: scaleX(0); transform-origin: left; transition: transform .45s var(--sortie); margin-top: -2px; }
        .champ :is(input, select, textarea):focus ~ .barre-focus { transform: none; }
        .champ.erreur :is(input, select, textarea) { border-color: #c62828; }
        .champ .msg-erreur { color: #c62828; font-size: .82rem; margin-top: 6px; display: none; }
        .champ.erreur .msg-erreur { display: block; }
        .piege { position: absolute; left: -9999px; width: 1px; height: 1px; overflow: hidden; }
        .choix-apps { display: grid; grid-template-columns: repeat(3, 1fr); gap: 1px; background: #b9c6de; border: 1px solid #b9c6de; margin-top: 6px; }
        .choix-apps > div { position: relative; background: var(--blanc); }
        .choix-apps input { position: absolute; opacity: 0; pointer-events: none; }
        .choix-apps label { margin: 0; display: block; text-transform: none; letter-spacing: 0; font-family: var(--sans); font-size: .86rem; color: var(--encre); padding: 13px 8px; text-align: center; cursor: pointer; transition: background .25s, color .25s; }
        .choix-apps label:hover { background: var(--brume); }
        .choix-apps input:checked + label { background: var(--cobalt); color: #fff; }
        .choix-apps input:focus-visible + label { outline: 2px solid var(--cobalt); outline-offset: -4px; }
        .pied-form { display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 16px; margin-top: 34px; }
        .pied-form small { color: var(--gris); }
        .bouton .attente { display: none; width: 14px; height: 14px; border: 1.5px solid rgba(255, 255, 255, .4); border-top-color: #fff; border-radius: 50%; animation: tourne .8s linear infinite; }
        .bouton.charge .attente { display: inline-block; }
        .bouton.charge { pointer-events: none; opacity: .8; }
        @keyframes tourne { to { transform: rotate(360deg); } }

        /* Formation */
        .formations { border-top: 1px solid var(--encre); }
        .formation { display: grid; grid-template-columns: 1fr 300px 120px; gap: 20px; padding: 18px 0; border-bottom: 1px solid var(--ligne); align-items: baseline; }
        .formation b { font-family: var(--serif); font-weight: 500; font-size: 1.25rem; }
        .formation span { color: var(--gris); }
        .formation .mono { color: var(--cobalt); text-align: right; }

        /* Contact */
        .contact { background: linear-gradient(180deg, var(--papier), var(--brume)); }
        .grand-mail { font-family: var(--serif); font-size: clamp(1.6rem, 3.6vw, 2.8rem); color: var(--cobalt); display: inline-block; margin: 6px 0 26px; border-bottom: 1px solid currentColor; word-break: break-word; }
        .grand-mail:hover { color: var(--encre); }
        .coordonnees { list-style: none; border-top: 1px solid var(--ligne); }
        .coordonnees li { display: grid; grid-template-columns: 110px 1fr; padding: 12px 0; border-bottom: 1px solid var(--ligne); font-size: .95rem; }
        .coordonnees span { color: var(--gris); }
        .coordonnees a:hover { color: var(--cobalt); }

        footer { background: var(--encre); color: #8ea3cc; padding: 34px 0; }
        footer .cadre { display: flex; justify-content: space-between; flex-wrap: wrap; gap: 14px; }
        footer a:hover { color: #fff; }

        /* Notification */
        .notif {
            position: fixed; left: 20px; bottom: 20px; z-index: 100; max-width: min(440px, calc(100vw - 40px));
            background: var(--encre); color: #e3ebfb; padding: 18px 22px 18px 20px; border-left: 3px solid var(--cobalt-vif);
            transform: translateY(130%); transition: transform .5s var(--sortie); box-shadow: 0 18px 40px -18px rgba(10, 24, 56, .7);
        }
        .notif.visible { transform: none; }
        .notif.erreur { border-left-color: #ef5350; }
        .notif b { display: block; font-family: var(--serif); font-weight: 500; font-size: 1.15rem; color: #fff; margin-bottom: 2px; }
        .notif p { font-size: .92rem; }

        /* ---------- Responsive ---------- */
        @media (max-width: 1000px) {
            .hero .cadre, .profil, .bloc-form, .etude { grid-template-columns: 1fr; }
            .planche { max-width: 420px; }
            .titre-section { grid-template-columns: 1fr; gap: 10px; }
            .decale { margin-left: 0; }
            .competences, .chiffres { grid-template-columns: 1fr 1fr; }
            .competences div:nth-child(3), .chiffres div:nth-child(3) { border-left: 0; padding-left: 0; }
            .competences div:nth-child(n+3), .chiffres div:nth-child(n+3) { margin-top: 26px; }
            .onglets { display: flex; overflow-x: auto; scrollbar-width: thin; scroll-snap-type: x proximity; }
            .onglet { flex: 0 0 132px; }
            .onglet span { min-height: 0; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
            .atouts { grid-template-columns: 1fr 1fr; }
            .atouts > div:not(:nth-child(3n+1)) { padding-left: 0; border-left: 0; }
            .atouts > div:nth-child(even) { padding-left: 22px; border-left: 1px solid var(--ligne); }
            .fiche-tete { grid-template-columns: 1fr; align-items: start; }
            .produit .actions-l { flex-direction: row; flex-wrap: wrap; align-items: center; }
            .vitrine.avec-mobile { grid-template-columns: 1fr; }
            .telephones { justify-content: center; }
            .argumentaire { grid-template-columns: 1fr; gap: 34px; }
            .indicateurs { grid-template-columns: 1fr 1fr; }
            .indicateurs div:nth-child(3) { padding-left: 0; border-left: 0; }
            .indicateurs div:nth-child(n+3) { border-top: 1px solid var(--ligne); }
            .projet button { grid-template-columns: 50px 1fr 30px; }
            .projet .cl { grid-column: 2; grid-row: 1; }
            .projet .ti { grid-column: 2; }
            .projet .ro { grid-column: 2; }
            .projet .plus { grid-column: 3; grid-row: 1; }
            .projet .detail p, .projet .tags { margin-left: 70px; }
            .parcours .rail { left: 0; }
            .poste { grid-template-columns: 1fr; padding-left: 28px; }
            .poste .contenu { padding-left: 0; }
            .poste .contenu::before { left: -33px; }
            .poste .quand { padding: 0 0 4px; }
            .formation { grid-template-columns: 1fr auto; }
            .dialogue { grid-template-columns: 1fr; gap: 30px; }
            .orateur { position: static; display: grid; grid-template-columns: 150px 1fr; gap: 18px; align-items: end; }
            .orateur .bulle { grid-column: 2; grid-row: 1; margin: 0; min-height: 130px; }
            .orateur .bulle::after { left: -14px; bottom: 24px; border: 14px solid transparent; border-left: 0; border-right-color: var(--encre); }
            .orateur .portrait-parle { grid-column: 1; grid-row: 1; }
            .astuce { display: none; }
            .ligne-h { display: none; }
            .jalons { grid-template-columns: 1fr 1fr; gap: 34px 26px; }
            .formation span { grid-column: 1; grid-row: 2; }
        }
        @media (max-width: 760px) {
            .menu { position: fixed; inset: 68px 0 auto; flex-direction: column; gap: 0; background: var(--papier); border-bottom: 1px solid var(--ligne); padding: 8px 20px 18px; transform: translateY(-8px); opacity: 0; pointer-events: none; transition: .3s var(--sortie); }
            .menu.ouvert { transform: none; opacity: 1; pointer-events: auto; }
            .menu a { display: block; padding: 12px 0; font-size: .9rem; }
            .burger { display: block; }
            .section { padding: 84px 0; }
            .apports, .champs, .jalons { grid-template-columns: 1fr; }
            .orateur { grid-template-columns: 110px 1fr; }
            .bulle p { font-size: 1.02rem; }
            .choix-apps { grid-template-columns: 1fr 1fr; }
            .choix-apps > div:last-child:nth-child(odd) { grid-column: span 2; }
            .atouts { grid-template-columns: 1fr; margin-bottom: 50px; }
            .atouts > div:nth-child(even) { padding-left: 0; border-left: 0; }

            .onglet { flex-basis: 118px; padding: 8px 10px 10px; }
            .produit { padding: 32px 0 44px; }
            .grille-gains { grid-template-columns: 1fr; }
            .telephone { width: 150px; }
            .miniature { flex-basis: 104px; }
            .ecran figcaption { font-size: .86rem; }
            .pied-fiche { flex-direction: column; align-items: stretch; }
            .pied-fiche .bouton { justify-content: center; }
            .indicateurs b { font-size: 1.8rem; }
            .formulaire { padding: 28px 20px; }
            .etude { padding: 26px 20px; }
            .projet .detail p, .projet .tags { margin-left: 0; }
            .profil .texte p { font-size: 1.22rem; }
            .chiffres b { font-size: 2.8rem; }
        }
        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after { animation-duration: .01ms !important; animation-delay: 0s !important; animation-iteration-count: 1 !important; transition-duration: .01ms !important; }
            .revele { opacity: 1; transform: none; }
        }
    </style>
</head>
<body>

<header class="entete" id="entete">
    <div class="cadre">
        <a href="#haut" class="signature"><b>Traoré</b> Mohamed</a>
        <ul class="menu" id="menu">
            <li><a href="#profil">À propos</a></li>
            <li><a href="#parcours">Parcours</a></li>
            <li><a href="#projets">Projets</a></li>
            <li><a href="#solutions">Solutions</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
        <button class="burger" id="burger" aria-expanded="false">Menu</button>
    </div>
</header>

<!-- Hero -->
<section class="hero" id="haut">
    <div class="cadre">
        <div>
            <div class="meta mono">
                <span>Chef de projet IT · Barnoin Informatique</span>
                <span>Abidjan</span>
                <span>Ingénieur logiciel et Data</span>
            </div>
            <h1>
                <span class="ligne-t"><span>Traoré</span></span>
                <span class="ligne-t"><span><em>Mohamed</em></span></span>
            </h1>
            <p class="intro">
                Je travaille sur des projets informatiques qui vont de la conception au déploiement : <strong>applications métier, plateformes web, données et outils de pilotage</strong>.
                Mon parcours m'a amené du développement logiciel au pilotage de projets, avec une attention particulière aux besoins des utilisateurs et aux contraintes techniques.
            </p>
            <div class="actions">
                <a href="#projets" class="bouton">Voir les projets <span class="fleche">→</span></a>
                <a href="#contact" class="lien-souligne">Me contacter</a>
            </div>
        </div>

        <figure class="planche" aria-label="Photo de Traoré Mohamed">
            <div class="grille-plan"></div>
            <img src="{{ asset('frontend/img/traore-mohamed.jpg') }}" alt="Traoré Mohamed">
            <svg class="trace" viewBox="0 0 400 500" preserveAspectRatio="none" aria-hidden="true">
                <line class="dessine" x1="20" y1="40" x2="380" y2="40" style="--l:360; animation-delay:.9s"/>
                <line class="dessine" x1="20" y1="34" x2="20" y2="46" style="--l:12; animation-delay:1.2s"/>
                <line class="dessine" x1="380" y1="34" x2="380" y2="46" style="--l:12; animation-delay:1.2s"/>
                <path class="dessine" d="M386 70 L386 470" style="--l:400; animation-delay:1s"/>
                <rect class="dessine" x="300" y="380" width="70" height="70" style="--l:280; animation-delay:1.4s; stroke-dasharray:4 4"/>
            </svg>
            <figcaption class="legende mono"><span>fig. 01</span><span>{{ now()->year }}</span></figcaption>
            <div class="cartouche"><b>{{ $anneesExperience }} ans</b>chez Barnoin Informatique</div>
        </figure>
    </div>

    <div class="clients" aria-label="Clients">
        <div class="piste">
            @for ($i = 0; $i < 2; $i++)
                @foreach (['CNPS', 'FDFP', 'FAFCI', 'AEJ', 'GNA Assurances', 'Librairie de France', 'Victoire Immobilier'] as $client)
                    <span>{{ $client }}</span>
                @endforeach
            @endfor
        </div>
    </div>
</section>

<!-- Profil -->
<section class="section" id="profil">
    <div class="cadre">
        <div class="titre-section revele">
            <span class="num mono">01 / Profil</span>
            <h2>Du développement à la <em>direction de projet</em>.</h2>
        </div>

        <div class="chiffres decale" id="chiffres" style="margin-bottom:80px">
            <div style="--i:0"><b data-compte="{{ $anneesExperience }}">{{ $anneesExperience }}</b><span>ans chez Barnoin Informatique</span></div>
            <div style="--i:1"><b data-compte="8">8</b><span>projets suivis et accompagnés</span></div>
            <div style="--i:2"><b data-compte="{{ count($applications) }}">{{ count($applications) }}</b><span>logiciels conçus et commercialisés</span></div>
            <div style="--i:3"><b data-compte="2">2</b><span>mastères spécialisés en cours : IA et Big Data</span></div>
        </div>

        <div class="profil decale">
            <div class="texte revele">
                <p>
                    J'ai rejoint Barnoin Informatique en décembre 2018 comme ingénieur développement et data. Depuis,
                    mon travail a évolué avec les projets : développement d'applications, traitement des données,
                    encadrement technique et pilotage.
                </p>
                <p>
                    J'ai ensuite pris des responsabilités de tech lead sur plusieurs réalisations, notamment dans
                    l'immobilier, l'assurance, la fidélisation client et la digitalisation des processus du FDFP.
                    Cette expérience m'a progressivement conduit vers le pilotage de projets et la coordination des équipes.
                </p>
                <p>
                    J'interviens aujourd'hui sur des projets liés à la CNPS, au FDFP, au FAFCI et à l'AEJ. Je développe
                    également des solutions logicielles que je fais évoluer et que je propose à des organisations.
                </p>
            </div>
            <dl class="fiche revele">
                <div><dt class="mono">Fonction</dt><dd>Chef de projet IT, Barnoin Informatique</dd></div>
                <div><dt class="mono">Localisation</dt><dd>Abidjan, Côte d'Ivoire</dd></div>
                <div><dt class="mono">Langues</dt><dd>Français, anglais</dd></div>
                <div><dt class="mono">E-mail</dt><dd><a href="mailto:traoremohamed2g@gmail.com">traoremohamed2g@gmail.com</a></dd></div>
                <div><dt class="mono">Téléphone</dt><dd><a href="tel:+2250709495198">+225 07 09 49 51 98</a></dd></div>
            </dl>
        </div>
    </div>
</section>

<!-- Expérience de travail -->
<section class="section" style="padding-top:0">
    <div class="cadre">
        <div class="titre-section revele">
            <span class="num mono">02 / Façon de travailler</span>
            <h2>Un pied dans le métier, un autre dans la technique.</h2>
        </div>
        <div class="competences revele" style="margin-left:0" id="outils-travail">
            <div>
                <h3>Comprendre le besoin</h3>
                <ul><li>Échanger avec les utilisateurs</li><li>Préciser le périmètre</li><li>Formaliser les besoins</li></ul>
            </div>
            <div>
                <h3>Organiser le travail</h3>
                <ul><li>Planifier les activités</li><li>Coordonner les intervenants</li><li>Suivre les points de blocage</li></ul>
            </div>
            <div>
                <h3>Suivre la réalisation</h3>
                <ul><li>Échanger avec les développeurs</li><li>Suivre les évolutions</li><li>Préparer les recettes</li></ul>
            </div>
            <div>
                <h3>Aller jusqu'à la livraison</h3>
                <ul><li>Préparer la mise en production</li><li>Documenter</li><li>Accompagner les utilisateurs</li></ul>
            </div>
        </div>
    </div>
</section>

<!-- Parcours -->
<section class="section" id="parcours" style="padding-top:0">
    <div class="cadre">
        <div class="titre-section revele">
            <span class="num mono">03 / Parcours</span>
            <h2>Mon parcours chez Barnoin et mes premières expériences.</h2>
        </div>
        <div class="parcours" id="frise">
            <div class="rail"><i id="railPlein"></i></div>
            @foreach ($parcours as [$date, $poste, $entreprise, $texte])
                <div class="poste revele">
                    <span class="quand mono">{{ $date }}</span>
                    <div class="contenu">
                        <h3>{{ $poste }}</h3>
                        <span class="ou">{{ $entreprise }}</span>
                        <p>{{ $texte }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Projets -->
<section class="section projets" id="projets">
    <div class="cadre">
        <div class="titre-section revele">
            <span class="num mono">04 / Projets</span>
            <h2>Quelques projets auxquels j'ai contribué.</h2>
        </div>

        <article class="etude revele">
            <div>
                <span class="mono">Étude de cas · FDFP</span>
                <h3>Digitaliser tous les processus métier du FDFP</h3>
                <p>
                    Le projet FDFP porte sur la digitalisation de plusieurs processus liés à la formation professionnelle,
                    depuis les démarches des entreprises jusqu'au traitement et au suivi des dossiers par les équipes.
                </p>
                <p>
                    J'ai démarré le projet comme tech lead : architecture, choix techniques, encadrement des développeurs.
                    J'en ai ensuite pris la direction : planning, arbitrages avec le client, recettes et mises en production.
                </p>
                <ul>
                    <li><span>Intervention</span><span>Tech lead puis pilotage de projet</span></li>
                    <li><span>Environnement</span><span>Laravel, PostgreSQL, Docker, GitLab CI/CD</span></li>
                    <li><span>Méthode</span><span>Scrum, livraisons par lots</span></li>
                </ul>
            </div>
            <div class="schema" id="schema" aria-hidden="true">
                <svg viewBox="0 0 440 380">
                    <!-- liens -->
                    <path class="lien-s" d="M80 70 L80 120 L220 120 L220 150"/>
                    <path class="lien-s" d="M220 70 L220 150"/>
                    <path class="lien-s" d="M360 70 L360 120 L220 120"/>
                    <path class="lien-s" d="M220 200 L220 240"/>
                    <path class="lien-s" d="M220 290 L220 310 L100 310 L100 320"/>
                    <path class="lien-s" d="M220 290 L220 320"/>
                    <path class="lien-s" d="M220 290 L220 310 L340 310 L340 320"/>
                    <path class="flux" d="M80 70 L80 120 L220 120 L220 150"/>
                    <path class="flux" d="M360 70 L360 120 L220 120"/>
                    <path class="flux" d="M220 200 L220 240"/>
                    <path class="flux" d="M220 290 L220 310 L340 310 L340 320"/>

                    <g class="etape-s" style="transition-delay:.1s">
                        <rect class="boite" x="20" y="30" width="120" height="40"/><text x="80" y="54" text-anchor="middle">Entreprises</text>
                    </g>
                    <g class="etape-s" style="transition-delay:.2s">
                        <rect class="boite" x="160" y="30" width="120" height="40"/><text x="220" y="54" text-anchor="middle">Cabinets</text>
                    </g>
                    <g class="etape-s" style="transition-delay:.3s">
                        <rect class="boite" x="300" y="30" width="120" height="40"/><text x="360" y="54" text-anchor="middle">Agents FDFP</text>
                    </g>
                    <g class="etape-s" style="transition-delay:.5s">
                        <rect class="boite forte" x="120" y="150" width="200" height="50"/><text x="220" y="179" text-anchor="middle" style="fill:#fff">Portail & workflow</text>
                    </g>
                    <g class="etape-s" style="transition-delay:.7s">
                        <rect class="boite" x="140" y="240" width="160" height="50"/><text x="220" y="269" text-anchor="middle">API · PostgreSQL</text>
                    </g>
                    <g class="etape-s" style="transition-delay:.9s">
                        <rect class="boite" x="40" y="320" width="120" height="40"/><text x="100" y="344" text-anchor="middle">Paiements</text>
                        <rect class="boite" x="160" y="320" width="120" height="40"/><text x="220" y="344" text-anchor="middle">Notifications</text>
                        <rect class="boite" x="280" y="320" width="120" height="40"/><text x="340" y="344" text-anchor="middle">Power BI</text>
                    </g>
                </svg>
            </div>
        </article>

        <div class="liste-projets">
            @foreach ($projets as $i => $projet)
                <div class="projet revele">
                    <button type="button" aria-expanded="false">
                        <span class="idx mono">{{ sprintf('%02d', $i + 1) }}</span>
                        <span class="cl">{{ $projet['client'] }}</span>
                        <span class="ti">{{ $projet['titre'] }}</span>
                        <span class="ro">{{ $projet['role'] }}</span>
                        <span class="plus"></span>
                    </button>
                    <div class="detail"><div>
                        <p>{{ $projet['texte'] }}</p>
                        <div class="tags">@foreach ($projet['tags'] as $tag)<span>{{ $tag }}</span>@endforeach</div>
                    </div></div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Compétences -->
<section class="section" id="competences">
    <div class="cadre">
        <div class="titre-section revele">
            <span class="num mono">05 / Outils</span>
            <h2>Les outils et méthodes que j'utilise.</h2>
        </div>

        <div class="horizon decale" id="horizon">
            <div class="ligne-h"><i class="plein"></i><i class="pointille"></i><b class="projection"></b></div>
            <div class="jalons">
                @foreach ($horizon as $i => [$etat, $quand, $titre, $texte])
                    <div class="jalon {{ $etat }}" style="--i:{{ $i }}">
                        <span class="point"></span>@if ($etat === 'present')<em class="mono ici-label">vous êtes ici</em>@endif
                        <span class="mono quand">{{ $quand }}</span>
                        <h3>{{ $titre }}@if ($etat === 'futur')<span class="reflexion"><i></i><i></i><i></i></span>@endif</h3>
                        <p>{{ $texte }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="competences decale" id="outils">
            @foreach ($competences as $domaine => $outils)
                <div style="--c:{{ $loop->index }}">
                    <h3>{{ $domaine }}</h3>
                    <ul>@foreach ($outils as $outil)<li style="--j:{{ $loop->index }}">{{ $outil }}</li>@endforeach</ul>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Logiciels -->
<section class="section solutions" id="solutions">
    <div class="cadre">
        <div class="titre-section revele">
            <span class="num mono">06 / Logiciels</span>
            <div>
                <h2>{{ count($applications) }} logiciels métier, conçus pour <em>les réalités du terrain ivoirien</em>.</h2>
                <p class="chapeau">Je les ai conçus, développés et testés de bout en bout. Chacun part d'un problème concret : recettes qui se perdent, stocks mal suivis, documents falsifiables, équipes sans réseau. Choisissez un secteur pour voir les écrans réels, ce que le logiciel résout et ce que vous y gagnez.</p>
            </div>
        </div>

        <!-- Ce que tous les logiciels ont en commun -->
        <div class="atouts revele">
            @foreach ($atoutsCommuns as [$titre, $texte])
                <div style="--i:{{ $loop->index }}">
                    <span class="mono">{{ sprintf('%02d', $loop->iteration) }}</span>
                    <h3>{{ $titre }}</h3>
                    <p>{{ $texte }}</p>
                </div>
            @endforeach
        </div>

        <!-- Sélecteur : un onglet par logiciel (de simples ancres si le JavaScript est désactivé) -->
        <nav class="selecteur revele" aria-label="Choisir un logiciel">
            <span class="mono legende-sel">Choisissez un logiciel</span>
            <div class="onglets" role="tablist">
                @foreach ($applications as $code => $app)
                    <a href="#logiciel-{{ $app['dossier'] }}" class="onglet" role="tab" id="onglet-{{ $app['dossier'] }}" aria-controls="logiciel-{{ $app['dossier'] }}" style="--teinte: {{ $app['couleur'] }}">
                        <span class="mono">{{ sprintf('%02d', $loop->iteration) }} · {{ $app['secteur'] }}</span>
                        <b>{{ $app['nom'] }}</b>
                    </a>
                @endforeach
            </div>
        </nav>

        <div class="fiches">
            @foreach ($applications as $code => $app)
                @php
                    $captures = $app['captures'] ?? [];
                    $mobiles = $app['mobile'] ?? [];
                    $dossierImg = 'frontend/logiciels/' . $app['dossier'] . '/';
                @endphp
                <article class="produit" id="logiciel-{{ $app['dossier'] }}" role="tabpanel" aria-labelledby="onglet-{{ $app['dossier'] }}" style="--teinte: {{ $app['couleur'] }}">
                    <header class="fiche-tete">
                        <div>
                            <span class="mono secteur">{{ $app['secteur'] }} <i>·</i> <span class="statut">{{ $app['statut'] }}</span></span>
                            <h3>{{ $app['nom'] }}</h3>
                            <p class="slogan">{{ $app['slogan'] }}</p>
                            <p class="pour"><span class="mono">Pour</span> {{ $app['pour'] }}</p>
                        </div>
                        <div class="actions-l">
                            <a href="#demande" class="bouton" data-application="{{ $code }}">{{ $app['url'] ? 'Demander un accès' : 'Demander une démonstration' }} <span class="fleche">→</span></a>
                            @if ($app['url'])
                                <a href="{{ $app['url'] }}" target="_blank" rel="noopener" class="url mono">{{ parse_url($app['url'], PHP_URL_HOST) }} ↗</a>
                            @endif
                        </div>
                    </header>

                    @if ($captures)
                        <div class="vitrine {{ $mobiles ? 'avec-mobile' : '' }}">
                            <div class="galerie" data-galerie>
                                <figure class="ecran">
                                    <div class="fenetre" aria-hidden="true"><i></i><i></i><i></i><span class="mono">{{ $app['url'] ? parse_url($app['url'], PHP_URL_HOST) : strtolower($app['nom']) . ' · démo' }}</span></div>
                                    <button type="button" class="agrandir" aria-label="Agrandir la capture">
                                        <img src="{{ asset($dossierImg . $captures[0][0]) }}" alt="{{ $app['nom'] }} : {{ $captures[0][1] }}" width="1440" height="900" loading="lazy" decoding="async" data-principale>
                                        <span class="loupe mono">Agrandir ⤢</span>
                                    </button>
                                    <figcaption><span class="mono compteur" data-compteur>1 / {{ count($captures) }}</span> <span data-legende>{{ $captures[0][1] }}</span></figcaption>
                                </figure>
                                <div class="miniatures" role="list">
                                    @foreach ($captures as [$fichier, $legende])
                                        <button type="button" role="listitem" class="miniature {{ $loop->first ? 'active' : '' }}" data-src="{{ asset($dossierImg . $fichier) }}" data-legende="{{ $legende }}" aria-label="Voir : {{ $legende }}">
                                            <img src="{{ asset($dossierImg . $fichier) }}" alt="" width="160" height="100" loading="lazy" decoding="async">
                                        </button>
                                    @endforeach
                                </div>
                            </div>
                            @if ($mobiles)
                                <div class="telephones">
                                    @foreach ($mobiles as [$fichier, $legende])
                                        <figure class="telephone">
                                            <img src="{{ asset($dossierImg . $fichier) }}" alt="{{ $app['nom'] }} sur mobile : {{ $legende }}" loading="lazy" decoding="async">
                                            <figcaption class="mono">{{ $legende }}</figcaption>
                                        </figure>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    @endif

                    <div class="indicateurs">
                        @foreach ($app['chiffres'] ?? [] as [$valeur, $libelle])
                            <div><b>{{ $valeur }}</b><span>{{ $libelle }}</span></div>
                        @endforeach
                    </div>

                    <div class="argumentaire">
                        <div class="constat">
                            <h4 class="mono">Le constat</h4>
                            <ul>
                                @foreach ($app['constat'] ?? [] as [$titre, $texte])
                                    <li><b>{{ $titre }}</b><span>{{ $texte }}</span></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="gains">
                            <h4 class="mono">Ce que vous y gagnez</h4>
                            <div class="grille-gains">
                                @foreach ($app['avantages'] ?? [] as [$titre, $texte])
                                    <div><h5>{{ $titre }}</h5><p>{{ $texte }}</p></div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="pied-fiche">
                        <div class="modules-l">
                            @foreach ($app['fonctions'] as $fonction)
                                <span class="mono">{{ $fonction }}</span>
                            @endforeach
                        </div>
                        <a href="#demande" class="bouton clair" data-application="{{ $code }}">Essayer {{ $app['nom'] }} <span class="fleche">→</span></a>
                    </div>
                </article>
            @endforeach
        </div>
        <p class="note-captures mono">Captures réelles des applications, prises sur des environnements de démonstration aux données fictives.</p>
    </div>

    <!-- Visionneuse plein écran -->
    <dialog class="visionneuse" id="visionneuse" aria-label="Capture d'écran agrandie">
        <div class="visionneuse-haut">
            <span class="mono" id="visionneuseTitre"></span>
            <button type="button" class="fermer mono" data-fermer aria-label="Fermer">Fermer ✕</button>
        </div>
        <img id="visionneuseImg" alt="">
        <div class="visionneuse-bas">
            <button type="button" class="nav-v mono" data-pas="-1" aria-label="Capture précédente">← Préc.</button>
            <p id="visionneuseLegende"></p>
            <button type="button" class="nav-v mono" data-pas="1" aria-label="Capture suivante">Suiv. →</button>
        </div>
    </dialog>
</section>

<!-- Demande d'accès -->
<section class="section" id="demande">
    <div class="cadre bloc-form">
        <div class="gauche revele">
            <span class="mono">Demande de compte</span>
            <h2>Essayer un logiciel avec vos propres données.</h2>
            <p>Remplissez le formulaire. Je crée votre compte et vous envoie les accès par e-mail.</p>
            <ol class="deroule">
                <li>Vous choisissez le logiciel et décrivez votre structure.</li>
                <li>Un e-mail confirme la réception de votre demande.</li>
                <li>La demande est traitée sous 48 heures.</li>
                <li>Vous recevez l'adresse, l'identifiant et le mot de passe.</li>
            </ol>
        </div>

        <form id="formDemande" class="formulaire revele" action="{{ route('portfolio.demande') }}" novalidate>
            <div class="piege" aria-hidden="true"><input type="text" name="site_web" tabindex="-1" autocomplete="off"></div>
            <div class="champs">
                <div class="champ large">
                    <label>Logiciel</label>
                    <div class="choix-apps">
                        @foreach ($applications as $code => $app)
                            <div>
                                <input type="radio" name="application" id="app_{{ $code }}" value="{{ $code }}">
                                <label for="app_{{ $code }}">{{ $app['nom'] }}</label>
                            </div>
                        @endforeach
                    </div>
                    <div class="msg-erreur" data-pour="application"></div>
                </div>
                <div class="champ">
                    <label for="d_nom">Nom</label>
                    <input id="d_nom" name="nom" required maxlength="100" autocomplete="family-name"><span class="barre-focus"></span>
                    <div class="msg-erreur" data-pour="nom"></div>
                </div>
                <div class="champ">
                    <label for="d_prenom">Prénom(s)</label>
                    <input id="d_prenom" name="prenom" required maxlength="150" autocomplete="given-name"><span class="barre-focus"></span>
                    <div class="msg-erreur" data-pour="prenom"></div>
                </div>
                <div class="champ">
                    <label for="d_contact">Contact</label>
                    <input id="d_contact" name="contact" type="tel" required maxlength="30" placeholder="+225" autocomplete="tel"><span class="barre-focus"></span>
                    <div class="msg-erreur" data-pour="contact"></div>
                </div>
                <div class="champ">
                    <label for="d_email">E-mail</label>
                    <input id="d_email" name="email" type="email" required maxlength="150" autocomplete="email"><span class="barre-focus"></span>
                    <div class="msg-erreur" data-pour="email"></div>
                </div>
                <div class="champ">
                    <label for="d_raison">Raison sociale</label>
                    <input id="d_raison" name="raison_sociale" required maxlength="200"><span class="barre-focus"></span>
                    <div class="msg-erreur" data-pour="raison_sociale"></div>
                </div>
                <div class="champ">
                    <label for="d_structure">Nom de la structure</label>
                    <input id="d_structure" name="nom_structure" required maxlength="200" autocomplete="organization"><span class="barre-focus"></span>
                    <div class="msg-erreur" data-pour="nom_structure"></div>
                </div>
                <div class="champ large">
                    <label for="d_message">Précisions (facultatif)</label>
                    <textarea id="d_message" name="message" maxlength="2000" rows="2" placeholder="Nombre d'utilisateurs, sites, modules…"></textarea><span class="barre-focus"></span>
                    <div class="msg-erreur" data-pour="message"></div>
                </div>
            </div>
            <div class="pied-form">
                <small>Tous les champs sont obligatoires sauf les précisions.</small>
                <button type="submit" class="bouton"><span class="attente"></span>Envoyer la demande <span class="fleche">→</span></button>
            </div>
        </form>
    </div>
</section>

<!-- Formation -->
<section class="section" id="formation" style="padding-top:0">
    <div class="cadre">
        <div class="titre-section revele">
            <span class="num mono">07 / Formation</span>
            <h2>Formation.</h2>
        </div>
        <div class="formations decale revele">
            @foreach ($formations as [$diplome, $ecole, $etat])
                <div class="formation">
                    <b>{{ $diplome }}</b>
                    <span>{{ $ecole }}</span>
                    <span class="mono">{{ $etat }}</span>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Contact -->
<section class="section contact" id="contact">
    <div class="cadre bloc-form">
        <div class="gauche revele">
            <span class="mono">08 / Contact</span>
            <h2>Échangeons sur un poste, une mission ou un projet.</h2>
            <a href="mailto:traoremohamed2g@gmail.com" class="grand-mail">traoremohamed2g@gmail.com</a>
            <ul class="coordonnees">
                <li><span class="mono">Tél.</span><a href="tel:+2250709495198">+225 07 09 49 51 98</a></li>
                <li><span class="mono">WhatsApp</span><a href="https://wa.me/2250709495198" target="_blank" rel="noopener">Écrire sur WhatsApp</a></li>
                <li><span class="mono">Pro</span><a href="mailto:mtraore@it-prodiges.com">mtraore@it-prodiges.com</a></li>
            </ul>
        </div>

        <form id="formContact" class="formulaire revele" action="{{ route('portfolio.contact') }}" novalidate>
            <div class="piege" aria-hidden="true"><input type="text" name="site_web" tabindex="-1" autocomplete="off"></div>
            <div class="champs">
                <div class="champ">
                    <label for="c_nom">Nom</label>
                    <input id="c_nom" name="nom" required maxlength="150" autocomplete="name"><span class="barre-focus"></span>
                    <div class="msg-erreur" data-pour="nom"></div>
                </div>
                <div class="champ">
                    <label for="c_email">E-mail</label>
                    <input id="c_email" name="email" type="email" required maxlength="150" autocomplete="email"><span class="barre-focus"></span>
                    <div class="msg-erreur" data-pour="email"></div>
                </div>
                <div class="champ">
                    <label for="c_tel">Téléphone</label>
                    <input id="c_tel" name="telephone" type="tel" maxlength="30" autocomplete="tel"><span class="barre-focus"></span>
                    <div class="msg-erreur" data-pour="telephone"></div>
                </div>
                <div class="champ">
                    <label for="c_entreprise">Entreprise</label>
                    <input id="c_entreprise" name="entreprise" maxlength="150" autocomplete="organization"><span class="barre-focus"></span>
                    <div class="msg-erreur" data-pour="entreprise"></div>
                </div>
                <div class="champ large">
                    <label for="c_sujet">Objet</label>
                    <select id="c_sujet" name="sujet" required>
                        <option value="">Choisir…</option>
                        <option>Proposition de poste</option>
                        <option>Mission / prestation</option>
                        <option>Démonstration d'un logiciel</option>
                        <option>Partenariat</option>
                        <option>Autre</option>
                    </select><span class="barre-focus"></span>
                    <div class="msg-erreur" data-pour="sujet"></div>
                </div>
                <div class="champ large">
                    <label for="c_message">Message</label>
                    <textarea id="c_message" name="message" required maxlength="5000" rows="4"></textarea><span class="barre-focus"></span>
                    <div class="msg-erreur" data-pour="message"></div>
                </div>
            </div>
            <div class="pied-form">
                <small>Réponse sous 24 à 48 heures.</small>
                <button type="submit" class="bouton"><span class="attente"></span>Envoyer <span class="fleche">→</span></button>
            </div>
        </form>
    </div>
</section>

<footer>
    <div class="cadre mono">
        <span>© {{ date('Y') }} Traoré Mohamed, Abidjan</span>
        <a href="{{ url('/connexion') }}">Espace admin</a>
    </div>
</footer>

<div class="notif" id="notif" role="status" aria-live="polite"><b></b><p></p></div>

<script>
(() => {
    document.documentElement.classList.add('js-animations');
    const csrf = document.querySelector('meta[name="csrf-token"]').content;
    const entete = document.getElementById('entete');
    const menu = document.getElementById('menu');
    const burger = document.getElementById('burger');
    const liens = [...menu.querySelectorAll('a')];
    const sections = liens.map(a => document.querySelector(a.getAttribute('href')));
    const frise = document.getElementById('frise');
    const railPlein = document.getElementById('railPlein');

    function defilement() {
        entete.classList.toggle('fond', scrollY > 30);
        let ici = -1;
        sections.forEach((s, i) => { if (s && s.getBoundingClientRect().top < innerHeight * .4) ici = i; });
        liens.forEach((a, i) => a.classList.toggle('ici', i === ici));
        if (frise && railPlein) {
            const r = frise.getBoundingClientRect();
            railPlein.style.height = Math.min(Math.max((innerHeight * .65 - r.top) / r.height, 0), 1) * 100 + '%';
        }
    }
    addEventListener('scroll', defilement, { passive: true });
    defilement();

    burger.addEventListener('click', () => {
        const ouvert = menu.classList.toggle('ouvert');
        burger.setAttribute('aria-expanded', ouvert);
        burger.textContent = ouvert ? 'Fermer' : 'Menu';
    });
    liens.forEach(a => a.addEventListener('click', () => { menu.classList.remove('ouvert'); burger.textContent = 'Menu'; }));

    // Apparitions et compteurs
    function compter(el) {
        const cible = +el.dataset.compte;
        const depart = Number(el.textContent) || 0;
        if (depart === cible) return;
        const debut = performance.now();
        (function pas(t) {
            const p = Math.min((t - debut) / 900, 1);
            const progression = 1 - Math.pow(1 - p, 4);
            el.textContent = Math.round(depart + (cible - depart) * progression);
            if (p < 1) requestAnimationFrame(pas);
        })(debut);
    }
    const obs = new IntersectionObserver(entrees => entrees.forEach(e => {
        if (!e.isIntersecting) return;
        e.target.classList.add('vu');
        // Chaque chiffre démarre quand sa colonne apparaît, puis « tique » une fois arrivé
        e.target.querySelectorAll('[data-compte]').forEach((el, i) => setTimeout(() => {
            compter(el);
            setTimeout(() => el.classList.add('fini'), 1400);
        }, 350 + i * 130));
        obs.unobserve(e.target);
    }), { threshold: .2, rootMargin: '0px 0px -60px 0px' });
    document.querySelectorAll('.revele, #schema, #chiffres, #horizon, #outils').forEach(el => obs.observe(el));

    // Projets dépliables
    document.querySelectorAll('.projet button').forEach(b => b.addEventListener('click', () => {
        const ouvert = b.parentElement.classList.toggle('ouvert');
        b.setAttribute('aria-expanded', ouvert);
    }));

    // Logiciels : un onglet par logiciel. Sans JavaScript, toutes les fiches restent affichées les unes sous les autres.
    const fiches = [...document.querySelectorAll('.produit')];
    const onglets = [...document.querySelectorAll('.onglet')];
    if (fiches.length) {
        document.documentElement.classList.add('js-onglets');
        const montrer = (id, defiler) => {
            const fiche = document.getElementById(id) || fiches[0];
            fiches.forEach(f => f.classList.toggle('active', f === fiche));
            onglets.forEach(o => {
                const actif = o.getAttribute('aria-controls') === fiche.id;
                o.setAttribute('aria-selected', actif);
                o.tabIndex = actif ? 0 : -1;
                if (actif) o.scrollIntoView({ block: 'nearest', inline: 'nearest' });
            });
            const marge = (document.querySelector('.selecteur')?.offsetHeight || 0) + 68 + 16;
            if (defiler && fiche.getBoundingClientRect().top < marge) {
                scrollTo({ top: scrollY + fiche.getBoundingClientRect().top - marge, behavior: 'smooth' });
            }
        };
        onglets.forEach((o, i) => {
            o.addEventListener('click', e => {
                e.preventDefault();
                montrer(o.getAttribute('aria-controls'), true);
                history.replaceState(null, '', '#' + o.getAttribute('aria-controls'));
            });
            o.addEventListener('keydown', e => {
                const pas = { ArrowRight: 1, ArrowLeft: -1 }[e.key];
                if (!pas) return;
                e.preventDefault();
                const suivant = onglets[(i + pas + onglets.length) % onglets.length];
                suivant.focus();
                suivant.click();
            });
        });
        const ancre = location.hash.slice(1);
        montrer(ancre.startsWith('logiciel-') ? ancre : fiches[0].id, false);
        if (ancre.startsWith('logiciel-')) setTimeout(() => { const f = document.getElementById(ancre); if (f) scrollTo({ top: scrollY + f.getBoundingClientRect().top - ((document.querySelector('.selecteur')?.offsetHeight || 0) + 84) }); }, 60);
    }

    // Galeries de captures et visionneuse plein écran
    const visionneuse = document.getElementById('visionneuse');
    const vImg = document.getElementById('visionneuseImg');
    const vLegende = document.getElementById('visionneuseLegende');
    const vTitre = document.getElementById('visionneuseTitre');
    let vListe = [], vIndex = 0;
    function afficherV() {
        const m = vListe[vIndex];
        vImg.src = m.dataset.src;
        vImg.alt = m.dataset.legende;
        vLegende.textContent = m.dataset.legende;
        vTitre.textContent = `${vTitre.dataset.nom} · ${vIndex + 1} / ${vListe.length}`;
    }
    document.querySelectorAll('[data-galerie]').forEach(g => {
        const principale = g.querySelector('[data-principale]');
        const legende = g.querySelector('[data-legende]');
        const compteur = g.querySelector('[data-compteur]');
        const minis = [...g.querySelectorAll('.miniature')];
        const nom = g.closest('.produit').querySelector('h3').textContent;
        const choisir = i => {
            const m = minis[i];
            minis.forEach(x => x.classList.toggle('active', x === m));
            principale.classList.add('change');
            const img = new Image();
            img.onload = img.onerror = () => {
                principale.src = m.dataset.src;
                principale.alt = `${nom} : ${m.dataset.legende}`;
                principale.classList.remove('change');
            };
            img.src = m.dataset.src;
            legende.textContent = m.dataset.legende;
            compteur.textContent = `${i + 1} / ${minis.length}`;
        };
        minis.forEach((m, i) => m.addEventListener('click', () => choisir(i)));
        g.querySelector('.agrandir').addEventListener('click', () => {
            if (!visionneuse.showModal) { window.open(principale.src, '_blank', 'noopener'); return; }
            vListe = minis;
            vIndex = Math.max(0, minis.findIndex(m => m.classList.contains('active')));
            vTitre.dataset.nom = nom;
            afficherV();
            visionneuse.showModal();
        });
    });
    if (visionneuse) {
        const deplacer = pas => { vIndex = (vIndex + pas + vListe.length) % vListe.length; afficherV(); };
        visionneuse.querySelectorAll('[data-pas]').forEach(b => b.addEventListener('click', () => deplacer(+b.dataset.pas)));
        visionneuse.querySelector('[data-fermer]').addEventListener('click', () => visionneuse.close());
        visionneuse.addEventListener('click', e => { if (e.target === visionneuse) visionneuse.close(); });
        visionneuse.addEventListener('keydown', e => {
            if (e.key === 'ArrowRight') deplacer(1);
            if (e.key === 'ArrowLeft') deplacer(-1);
        });
    }

    // Le bouton « Demander un accès » présélectionne le logiciel
    document.querySelectorAll('[data-application]').forEach(b => b.addEventListener('click', () => {
        const radio = document.getElementById('app_' + b.dataset.application);
        if (radio) radio.checked = true;
    }));

    // Notification
    const notif = document.getElementById('notif');
    let minuteur;
    function notifier(titre, texte, erreur = false) {
        notif.querySelector('b').textContent = titre;
        notif.querySelector('p').textContent = texte;
        notif.classList.toggle('erreur', erreur);
        notif.classList.add('visible');
        clearTimeout(minuteur);
        minuteur = setTimeout(() => notif.classList.remove('visible'), erreur ? 6000 : 9000);
    }

    // Envoi des formulaires
    function brancher(form, titre) {
        form.addEventListener('submit', async e => {
            e.preventDefault();
            form.querySelectorAll('.champ.erreur').forEach(c => c.classList.remove('erreur'));
            const bouton = form.querySelector('button[type="submit"]');
            bouton.classList.add('charge');
            try {
                const rep = await fetch(form.action, {
                    method: 'POST',
                    headers: { 'X-CSRF-TOKEN': csrf, 'Accept': 'application/json' },
                    body: new FormData(form),
                });
                const data = await rep.json().catch(() => ({}));
                if (rep.ok) {
                    form.reset();
                    notifier(titre, data.message);
                } else if (rep.status === 422 && data.errors) {
                    Object.entries(data.errors).forEach(([champ, messages]) => {
                        const zone = form.querySelector(`[data-pour="${champ}"]`);
                        if (zone) { zone.textContent = messages[0]; zone.closest('.champ').classList.add('erreur'); }
                    });
                    form.querySelector('.champ.erreur')?.scrollIntoView({ behavior: 'smooth', block: 'center' });
                } else if (rep.status === 429) {
                    notifier('Un instant', 'Trop d\'envois rapprochés. Réessayez dans quelques minutes.', true);
                } else if (rep.status === 419) {
                    notifier('Session expirée', 'Rechargez la page puis renvoyez le formulaire.', true);
                } else {
                    notifier('Envoi impossible', 'Réessayez, ou écrivez directement à traoremohamed2g@gmail.com.', true);
                }
            } catch (err) {
                notifier('Pas de connexion', 'Vérifiez votre connexion internet puis réessayez.', true);
            } finally {
                bouton.classList.remove('charge');
            }
        });
    }
    brancher(document.getElementById('formDemande'), 'Demande envoyée');
    brancher(document.getElementById('formContact'), 'Message envoyé');
})();
</script>
</body>
</html>
