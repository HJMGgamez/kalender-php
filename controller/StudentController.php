<?php

require(ROOT . "model/calenderModel.php");

function index()
{
	render("/index", array(
		'person' => getAllInterce()
	));
}
