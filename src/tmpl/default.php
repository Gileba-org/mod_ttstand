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
$document->addScript("https://ttapp.nl/dist/ttapp-widgets.js");
$document->addStyleSheet("modules/mod_ttstand/css/mod_ttstand.css", array("version" => "auto"));

// Code
echo '<div class="ttstand">';
echo '<script>ttappwidget({token: "' . $api . '", view: "' . $type . '"';
switch ($type) {
	case "poule":
		echo ', pouleid: "' . $poule . '"';
		if ($cols != "") {
			echo ', cols: "' . $cols . '"';
		}
		if ($headers != "") {
			echo ', headers: "' . $headers . '"';
		}
		echo '});';
		break;
	default:
		echo '});';
}
echo '</script>';
echo "</div>";
