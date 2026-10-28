<?php

/*
|--------------------------------------------------------------------------
| Applications SaaS proposées à la commercialisation
|--------------------------------------------------------------------------
| La clé sert de code dans le formulaire de demande d'accès et dans le backoffice.
*/

return [

    'applications' => [
        'ERP_GEST_COM' => [
            'nom' => 'ERP GEST COM',
            'slogan' => 'ERP & CRM commercial multi-sites',
            'url' => 'https://erpcrm.it-prodiges.com',
            'icone' => 'fa-cash-register',
            'couleur' => '#2563eb',
            'description' => "Ventes, caisse, stocks multi-dépôts, achats, fidélité client, restauration (tables, réservations), RH et comptabilité, avec une application mobile pour le terrain.",
            'fonctions' => ['Caisse & sessions', 'Stocks multi-dépôts', 'Achats & fournisseurs', 'Fidélité client', 'Comptabilité', 'Mobile'],
        ],
        'GEST_IMMO' => [
            'nom' => 'GEST IMMO',
            'slogan' => 'Gestion immobilière multi-agences',
            'url' => 'https://gestimmo.it-prodiges.com',
            'icone' => 'fa-building',
            'couleur' => '#0ea5e9',
            'description' => "Patrimoine, gestion locative, ventes et programmes, syndic de copropriété, recouvrement et relances, comptabilité SYSCOHADA, BI et espace client.",
            'fonctions' => ['Gestion locative', 'Syndic', 'Ventes & lotissements', 'Recouvrement', 'SYSCOHADA', 'BI'],
        ],
        'SIH' => [
            'nom' => 'SIH',
            'slogan' => "Système d'Information Hospitalier",
            'url' => 'https://sih.it-prodiges.com',
            'icone' => 'fa-hospital',
            'couleur' => '#06b6d4',
            'description' => "Parcours patient complet, dossier patient informatisé, urgences, laboratoire, imagerie, pharmacie, facturation et assurances. Interopérable HL7, FHIR R4, DICOMweb, DHIS2.",
            'fonctions' => ['Dossier patient', 'Urgences & bloc', 'Labo & imagerie', 'Pharmacie', 'Facturation', 'FHIR / HL7'],
        ],
        'E_CONTRIBUABLE' => [
            'nom' => 'E-CONTRIBUABLE',
            'slogan' => 'Fiscalité locale des collectivités',
            'url' => 'https://e-contribuable.it-prodiges.com',
            'icone' => 'fa-landmark',
            'couleur' => '#6366f1',
            'description' => "Recensement des contribuables, taxation, recouvrement terrain via application agent, paiement et reçus sécurisés par QR code, relances et prédiction du recouvrement.",
            'fonctions' => ['Recensement', 'Recouvrement terrain', 'Reçus QR code', 'Relances auto', 'App contribuable', 'Multi-collectivités'],
        ],
    ],

    // Destinataires par défaut si aucun paramètre mail n'est enregistré en base
    'emails_notification' => ['traoremohamed2g@gmail.com', 'mtraore@it-prodiges.com'],

    'statuts_demande' => [
        'EN_ATTENTE' => ['libelle' => 'En attente', 'badge' => 'warning'],
        'EN_COURS' => ['libelle' => 'En cours', 'badge' => 'info'],
        'TRAITEE' => ['libelle' => 'Traitée', 'badge' => 'success'],
        'REJETEE' => ['libelle' => 'Rejetée', 'badge' => 'danger'],
    ],
];
