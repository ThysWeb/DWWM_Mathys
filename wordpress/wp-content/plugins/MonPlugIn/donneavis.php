<?php
/*
Plugin Name: DonneAvis
Description: Permet de donner un avis sur un site
Author: Mathys
Version: 1.0
*/
class DonneAvis_Plugin
{
    public function __construct()
    {
        include_once plugin_dir_path(__FILE__) . '/donneavisClass.php';
        new DonneAvisClass();  
    }
}
new DonneAvis_Plugin();