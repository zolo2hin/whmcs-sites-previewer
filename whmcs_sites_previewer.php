<?php

if (!defined("WHMCS")) {
    die("This file cannot be accessed directly");
}

function whmcs_sites_previewer_config()
{
    return [
        'name'          => 'Sites Previewer',
        'description'   => 'Provides preview for main service site for displaying somewhere at client area.',
        'version'       => '1.0',
        'language'      => 'english',
        'author'        => 'senikz',
        'fields'        => [],
    ];
}
