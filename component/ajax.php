<?php

//joomla bootstrap
define( 'DS', DIRECTORY_SEPARATOR );
error_reporting(E_ALL);
date_default_timezone_set('UTC');
define('_JEXEC', 1);
define('JOOMLA_PATH',realpath(dirname(__FILE__).DS.'..'.DS.'..' ));
$_SERVER['HTTP_HOST'] = 'localhost';
$_SERVER['REQUEST_METHOD'] = 'GET';
$_SERVER['REQUEST_URI'] = '';

if (file_exists(JOOMLA_PATH . '/defines.php'))
{
    include_once JOOMLA_PATH . '/defines.php';
}

if (!defined('_JDEFINES'))
{
    define('JPATH_BASE', JOOMLA_PATH);
    require_once JPATH_BASE . '/includes/defines.php';
}

require_once JPATH_BASE . '/includes/framework.php';


if(isset($_POST['snow']) && isset($_POST['music']) && isset($_POST['fireworks']) && isset($_POST['presents'])){

  $snow = $_POST['snow'];
  $music = $_POST['music'];
  $fireworks = $_POST['fireworks'];
  $presents = $_POST['presents'];

  $db = JFactory::getDbo();
  $query = $db->getQuery(true);

  //Snow
  $query = "UPDATE #__seasonal SET published=". $snow ." WHERE id=1;";
  $db->setQuery($query);
  $result = $db->query();
  if($result){
    $result1 = 'success';
  }

  //Music
  $query = "UPDATE #__seasonal SET published=". $music ." WHERE id=2;";
  $db->setQuery($query);
  $result = $db->query();
  if($result){
    $result2 = 'success';
  }

  //Fireworks
  $query = "UPDATE #__seasonal SET published=". $fireworks ." WHERE id=3;";
  $db->setQuery($query);
  $result = $db->query();
  if($result){
    $result3= 'success';
  }

  //Presents
  $query = "UPDATE #__seasonal SET published=". $presents ." WHERE id=4;";
  $db->setQuery($query);
  $result = $db->query();
  if($result){
    $result4= 'success';
  }

  if($result1 == 'success' && $result2 == 'success' && $result3 == 'success'  && $result4 == 'success') {
    echo 'success';
  }

}
?>
