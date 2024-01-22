<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Redirection Type
    |--------------------------------------------------------------------------
    |
    | A permanent redirect notifies the visitor's browser to update any bookmarks linked to the redirected page.
    | Temporary redirects do not update the visitor's bookmarks.
    |
    | 301 = Permanent
    | 302 = Temporary
    |
    | Supported: 301, 302
    |
    |
    */

    'type' => env('WWW_PROTOCOL_RESOLVER_TYPE', 301),

    /*
    |--------------------------------------------------------------------------
    | Scheme
    |--------------------------------------------------------------------------
    |
    | Redirect all requests with the "http" scheme to "https".
    |
    | Supported: "http", "https"
    |
    */

    'use' => env('WWW_PROTOCOL_RESOLVER_USE'),

    /*
    |--------------------------------------------------------------------------
    | Mode
    |--------------------------------------------------------------------------
    |
    | Redirect all requests with or without "www".
    |
    | Supported: "with_www", "without_www"
    |
    */

    'mode' => env('WWW_PROTOCOL_RESOLVER_MODE'),
];
