<?php

if (!defined("WHMCS"))
    die("This file cannot be accessed directly");

function sites_previewer_config() {
    $configarray = array(
        'name'          => 'Sites Previewer',
        'description'   => 'Provides preview for any client site',
        'version'       => '1.0',
        'language'      => 'english',
        'author'        => 'Sergey Zolotukhin',
        'fields'        => array(),    
    );
    return $configarray;
}
