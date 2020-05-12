<?php
//on inclu la definition du widget
include_once plugin_dir_path( __FILE__ ).'/hellowidget.php';
class HelloClass{
public function __construct(){
// on déclare le widget
add_action('widgets_init', function(){register_widget('HelloWidget');});
}
add_action('wp_enqueue_scripts',array($this,'persoCSS'),15);

function persoCSS()
{
wp_enqueue_style('Hellocss', plugins_url('helloworld/design.css'));
}
public static function install()
{//méthode déclenchée à l'activation du plug-in
global $wpdb;
$wpdb->query("CREATE TABLE IF NOT EXISTS {$wpdb->prefix}helloworld_commentaire (id INT
AUTO_INCREMENT PRIMARY KEY, comm VARCHAR(255) NOT NULL);");
}
public static function uninstall()
{//méthode déclenchée à la suppression du module
global $wpdb;
$wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}helloworld_commentaire;");
}
}