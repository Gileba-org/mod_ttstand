<?php
/**
* @Author	Gijs Lamon
* @license	GNU/GPL http://www.gnu.org/copyleft/gpl.html
**/

defined('_JEXEC') or die();

// Libraries
use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;

// Load external files
$document = Factory::getDocument();
$document->addStyleSheet(JURI::root() . "modules/mod_ttstand/css/mod_ttstand.css", array("version" => "auto"));

// Code
echo '<div class="ttstand">';
echo '<script src="https://ttapp.nl/dist/ttapp-widgets.js"></script>';
echo '<script>ttappwidget({token: "' . $api . '", view: "' . $type . '"';
switch ($type) {
	case "poule":
		echo ', pouleid: "' . $poule . '"});';
		break;
	default:
		echo '"});';
}
echo '</script>';
echo "</div>";
