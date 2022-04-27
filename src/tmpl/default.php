<?php
/**
* @Author	Gijs Lamon
* @license	GNU/GPL http://www.gnu.org/copyleft/gpl.html
**/

defined('_JEXEC') or die();

// Libraries
use Joomla\CMS\Language\Text;

// Hello World
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
