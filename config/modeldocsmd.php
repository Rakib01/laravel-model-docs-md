<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Output file path
    |--------------------------------------------------------------------------
    */
    'output_path' => storage_path('app/model-docs.md'),

    /*
    |--------------------------------------------------------------------------
    | Base model directories
    |--------------------------------------------------------------------------
    | These paths are used as starting points for model discovery.
    | Additional paths (Modules, Packages, etc.) will be auto-detected.
    |--------------------------------------------------------------------------
    */
    'model_paths' => [
        app_path('Models'),
    ],

];
