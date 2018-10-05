<?php

function assets($file = NULL){
	$path = base_url("assets/".$file);
	return $path;
}

function linkTo($path = NULL) {
	return base_url($path);
}

function listGugus($index = NULL){

	$gugus = [
		'Bulungan', 'Gowa Tallo', 'Sambas', 'Tidore', 'Bima', 'Buton', 'Serdang'
	];

	if($index != NULL) {
		return $gugus[$index];
	} else {
		return $gugus;
	}

}

?>