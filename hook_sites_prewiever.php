<?php

function check_services_var_in_template($vars) {
    
    if( isset($vars['services']) && !empty($vars['services']) ) {
        
        require_once dirname(dirname(dirname(__FILE__))).'/modules/addons/sites_previewer/Previewer.php';
        
        $previewer = new Previewer($vars['services']);

        return ['services' => $previewer->flash_images()];
    }
}

add_hook("ClientAreaPage", 10, "check_services_var_in_template");


