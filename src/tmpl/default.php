<?php
/**
 * @Author	Gijs Lamon
 * @license	GNU/GPL http://www.gnu.org/copyleft/gpl.html
 **/

defined("_JEXEC") or die();

// Libraries
use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;

// Load external files
$document = Factory::getDocument();
$document->addScript("https://ttapp.nl/dist/ttapp-widgets.js");
$document->addStyleSheet("modules/mod_ttstand/css/mod_ttstand.css", ["version" => "auto"]);

switch ($api) {
	case "ttapp":
		// Code
		echo '<div class="ttstand">';
		echo '<script>ttappwidget({token: "' . $key . '", view: "' . $type . '"';
		switch ($type) {
			case "poule":
				echo ', pouleid: "' . $poule . '"';
				if ($cols != "") {
					echo ', cols: "' . $cols . '"';
				}
				if ($headers != "") {
					echo ', headers: "' . $headers . '"';
				}
				echo "});";
				break;
			default:
				echo "});";
		}
		echo "</script>";
		echo "</div>";
		break;
	case "tabt":
		echo "<table class='ttstand'>";
		echo "<thead><tr>";
		if (count($headers) > 1) {
			echo "<td>$headers[0]</td>";
			echo "<td>$headers[1]</td>";
			echo "<td>$headers[2]</td>";
			echo "<td>$headers[3]</td>";
		} else {
			echo "<td>#</td><td>Team</td><td>Gesp</td><td>Punt</td>";
		}
		echo "</tr></thead>";
		foreach ($response->RankingEntries as $entry) {
			echo "<tr>";
			echo "<td>$entry->Position</td>";
			echo "<td>$entry->Team</td>";
			echo "<td>$entry->GamesPlayed</td>";
			echo "<td>$entry->Points</td>";
			echo "</tr>";
		}
		echo "</table>";
		break;
}
