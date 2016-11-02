<?php

function check_services_var_in_template($vars) {
    
    var_dump($vars);
    exit;
    
    return [];
}

add_hook("ClientAreaPage", 10, "check_services_var_in_template");


