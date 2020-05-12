<?php
class hellowidget extends WP_Widget
{
public function __construct()
{
parent::__construct('helloworld', 'Hello World', array('description' => 'Un plug-in
qui écrit Hello World'));
}
public function widget($args, $instance)
{ // formulaire afficher à l'écran pour l'utilisateur
// on appel les méthodes standard au cas où un autre plug-in les aurait surchargées
echo $args['before_widget'];
echo $args['before_title'];
echo apply_filters('widget_title', $instance['title']);
echo $args['after_title'];
// corps du widget
?>
<h1>Hello World</h1>
<?php
echo $args['after_widget'];
}