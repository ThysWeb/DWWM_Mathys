<?php
//on inclu la definition du widget
include_once plugin_dir_path( __FILE__ ).'/donneaviswidget.php';
class donneavisClass{
public function __construct(){
    // on déclare le widget
    add_action('widgets_init', function(){register_widget('donneaviswidget');});
}
}