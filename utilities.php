<?php

function message($array,$withcontainer = 1) {
	$html = null;
	if ($withcontainer) {
		$html .= "<div class='container'>";
	}
	$html .= "<span class='alert alert-" . $array[0] . "'>" . $array[1] . "</span>";
	if ($withcontainer) {
		$html .= "</div>";
	}
	return $html;
}
function cleanup($str){
	return addslashes($str);
}