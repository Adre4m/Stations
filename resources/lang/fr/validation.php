<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    "accepted" => "Le champ :attribute doit être accepté.",
    "active_url" => "Le champ :attribute n'est pas une URL valide.",
    "after" => "Le champ :attribute doit être une date postérieure au :date.",
    "alpha" => "Le champ :attribute doit seulement contenir des lettres.",
    "alpha_dash" => "Le champ :attribute doit seulement contenir des lettres, des chiffres et des tirets.",
    "alpha_num" => "Le champ :attribute doit seulement contenir des chiffres et des lettres.",
    "before" => "Le champ :attribute doit être une date antérieure au :date.",
    "between" => array(
        "numeric" => "La valeur de :attribute doit être comprise entre :min et :max.",
        "file" => "Le fichier :attribute doit avoir une taille entre :min et :max kilobytes.",
        "string" => "Le texte :attribute doit avoir entre :min et :max caractères.",
    ),
    "confirmed" => "Le champ de confirmation :attribute ne correspond pas.",
    "date" => "Le champ :attribute n'est pas une date valide.",
    "date_format" => "Le champ :attribute ne correspond pas au format :format.",
    "different" => "Les champs :attribute et :other doivent être différents.",
    "digits" => "Le champ :attribute doit avoir :digits chiffres.",
    "digits_between" => "Le champ :attribute doit avoir entre :min and :max chiffres.",
    "email" => "Le format du champ :attribute est invalide.",
    "exists" => "Le champ :attribute sélectionné est invalide.",
    "image" => "Le champ :attribute doit être une image.",
    "in" => "Le champ :attribute est invalide.",
    "integer" => "Le champ :attribute doit être un entier.",
    "ip" => "Le champ :attribute doit être une adresse IP valide.",
    "max" => array(
        "numeric" => "La valeur de :attribute ne peut être supérieure à :max.",
        "file" => "Le fichier :attribute ne peut être plus gros que :max kilobytes.",
        "string" => "Le texte de :attribute ne peut contenir plus de :max caractères.",
    ),
    "mimes" => "Le champ :attribute doit être un fichier de type : :values.",
    "min" => array(
        "numeric" => "La valeur de :attribute doit être inférieure à :min.",
        "file" => "Le fichier :attribute doit être plus que gros que :min kilobytes.",
        "string" => "Le texte :attribute doit contenir au moins :min caractères.",
    ),
    "not_in" => "Le champ :attribute sélectionné n'est pas valide.",
    "numeric" => "Le champ :attribute doit contenir un nombre.",
    "regex" => "Le format du champ :attribute est invalide.",
    "required" => "Le champ :attribute est obligatoire.",
    "required_if" => "Le champ :attribute est obligatoire quand la valeur de :other est :value.",
    "required_with" => "Le champ :attribute est obligatoire quand :values est présent.",
    "required_without" => "Le champ :attribute est obligatoire quand :values n'est pas présent.",
    "required_without_all" => "Le champ :attribute est obligatoire quand aucun des champs :values ne sont présent.",
    "same" => "Les champs :attribute et :other doivent être identiques.",
    "size" => array(
        "numeric" => "La taille de la valeur de :attribute doit être :size.",
        "file" => "La taille du fichier de :attribute doit être de :size kilobytes.",
        "string" => "Le texte de :attribute doit contenir :size caractères.",
    ),
    "unique" => "La valeur du champ :attribute est déjà utilisée.",
    "unique_with" => "La valeur du champ :attribute est déjà utilisée dans :other.",
    "url" => "Le format de l'URL de :attribute n'est pas valide.",

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
        'sample_site-code' => [
            'unique' => 'Ce site de prélèvement existe déjà au sein de cette station',
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | Le champ following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
        'station-name' => 'nom',
        'station-code' => 'code',
        'station-x' => 'x',
        'station-y' => 'y',
        'station-manager_id' => 'gestionnaire',
        'station-owner_id' => 'propriétaire',
        'station-file' => 'fichier',
        'network_station-station_id' => 'station',
        'network_station-network_id' => 'réseau',
        'network_station-began_at' => 'date de début du contrat',
        'network_station-end_at' => 'date de fin du contrat',
        'network-code' => 'code',
        'network-name' => 'nom',
        'sample_site-code' => 'code',
        'sample_site-name' => 'nom',
        'sample_site-x' => 'x',
        'sample_site-y' => 'y',
        'sample_site-station_id' => 'station',
        'contributor-code' => 'code',
        'contributor-name' => 'Prénom',
        'contributor-last_name' => 'nom',
        'contributor-siret' => 'SIRET',
    ],

    'siret' => 'Le numéro SIRET est invalide',

    'no_errors' => 'Aucune erreur lors de l\'import',

    'preview' => [
        'file_correct'  => 'Fichier correctement lu',
        'exceptions'    => 'Exceptions',
        'msg'           => 'Validation',
        'errors'        => 'erreurs',
        'warnings'      => 'avertissements',
        'info'          => 'informations',
    ],

    'exceptions' => [
        'unreadable_line' => 'La ligne :lineNumber est illisible (nombre de paramètre incorrects)',
        'unreadable_file' => 'Le fichier spécifié est incorrect',
    ]


];
