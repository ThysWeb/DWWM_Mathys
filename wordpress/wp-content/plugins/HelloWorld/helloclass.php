<?php
//on inclu la definition du widget
include_once plugin_dir_path(__FILE__) . '/hellowidget.php';
class HelloClass
{
    public function __construct()
    {  // on déclare le widget
        add_action('widgets_init', function () {register_widget('HelloWidget');});
        add_action('wp_enqueue_scripts', array($this, 'persoCSS'), 15);
        // on ajoute l'action de sauvegarde au chargement du widget
        add_action('wp_loaded', array($this, 'save_comm'));
        add_action('wp_loaded', array($this, 'save_pseudo'));
        add_action('admin_menu', array($this, 'add_admin_menu'), 20);
        add_action('admin_init', array($this, 'register_settings'));
    }

    public function persoCSS()
    {
        wp_enqueue_style('Hellocss', plugins_url('helloworld/design.css'));
    }

    public static function installComment()
    { //méthode déclenchée à l'activation du plug-in
        global $wpdb;
        $wpdb->query("CREATE TABLE IF NOT EXISTS {$wpdb->prefix}helloworld_commentaire (id INT
        AUTO_INCREMENT PRIMARY KEY, comm VARCHAR(255) NOT NULL);");
    }

    public static function installPseudo()
    {//méthode déclenchée à l'activation du plug-in
        global $wpdb;
        $wpdb->query("CREATE TABLE IF NOT EXISTS {$wpdb->prefix}helloworld_pseudo (id INT
        AUTO_INCREMENT PRIMARY KEY, pseudo VARCHAR(255) NOT NULL);");
    }

    public static function uninstall()
    {//méthode déclenchée à la suppression du module
        global $wpdb;
        $wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}helloworld_commentaire;");
    }
    
    public function save_comm()
    {
        if (isset($_POST['helloworld_comm']) && !empty($_POST['helloworld_comm'])) {
            global $wpdb;
            $comm = $_POST['helloworld_comm'];
            $row = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}helloworld_commentaire WHERE comm = '$comm'");
            if (is_null($row)) {
                $wpdb->insert("{$wpdb->prefix}helloworld_commentaire", array('comm' =>$comm));
            }
        }
    }

    public function save_pseudo()
    {
        if (isset($_POST['helloworld_pseudo']) && !empty($_POST['helloworld_pseudo'])) {
            global $wpdb;
            $pseudo = $_POST['helloworld_pseudo'];
            $row = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}helloworld_pseudo WHERE pseudo= '$pseudo'");
            if (is_null($row)) {
                $wpdb->insert("{$wpdb->prefix}helloworld_pseudo", array('pseudo' =>$pseudo));
            }
        }
    }

    public function add_admin_menu()
    { //on ajoute une page dans le menu administrateur
        add_menu_page('Hello World', 'Hello World plugin', 'manage_options', 'helloworld', array($this, 'menu_html'));
    }

    public function menu_html()
    {
        echo '<h1>'.get_admin_page_title().'</h1>';
        ?>
        <form method="post" action="options.php">
        <label>Couleur</label>
        <input type="text" name="helloworld_couleur" value="<?php echo
        get_option("helloworld_couleur")?>"/>
        <?php submit_button();
        settings_fields('helloworld_settings'); ?>
        </form>
        <?php
    }
    
    public function register_settings()
    {
        register_setting('helloworld_settings', 'helloworld_couleur');
    }
}
