<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Swagger UI Route
    |--------------------------------------------------------------------------
    |
    | Define the route to access the Swagger UI.
    |
    */

    'swagger-ui' => '/api/documentation',

    /*
    |--------------------------------------------------------------------------
    | API Routes
    |--------------------------------------------------------------------------
    |
    | The routes used for the Swagger API documentation generation.
    | You can disable the registration of the routes if necessary.
    |
    */

    'api' => [
        'routes' => [
            /*
            |--------------------------------------------------------------------------
            | Route Path
            |--------------------------------------------------------------------------
            |
            | The path under which the API routes should be available.
            |
            */

            'path' => '/api/documentation',

            /*
            |--------------------------------------------------------------------------
            | Middleware
            |--------------------------------------------------------------------------
            |
            | The middleware to apply to the API routes.
            |
            */

            'middleware' => [],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Documentation Options
    |--------------------------------------------------------------------------
    |
    | Additional options for generating the Swagger documentation.
    |
    */

    'documentation' => [
        /*
        |--------------------------------------------------------------------------
        | Base Path
        |--------------------------------------------------------------------------
        |
        | The base path for the generated Swagger documentation files.
        |
        */

        'basePath' => storage_path('app/public/docs'),

        /*
        |--------------------------------------------------------------------------
        | API File
        |--------------------------------------------------------------------------
        |
        | The file name for the generated Swagger API JSON file.
        |
        */

        'apiFile' => 'api.json',

        /*
        |--------------------------------------------------------------------------
        | UI File
        |--------------------------------------------------------------------------
        |
        | The file name for the generated Swagger UI HTML file.
        |
        */

        'uiFile' => 'index.html',

        /*
        |--------------------------------------------------------------------------
        | Additional Documentation Options
        |--------------------------------------------------------------------------
        |
        | Additional options for the Swagger documentation generation.
        |
        */

        'additionalOptions' => [
            'info' => [
                'title' => 'API LARAVEL',
                'description' => 'Teste api laravel',
                'version' => '1.0.0',
            ],
        ],
    ],
];
