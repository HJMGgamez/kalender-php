<?php
require(ROOT . "model/CalendarModel.php");

function index()
{
	$calendars = getCalendar();
	
	render("home/index", array(
		'calendars' => $calendars)
	);
}
function create()
{
	render("home/create");
}

function createSave()
{
	if (createCalendar()) {
		header("location:" . URL . "home/index");
		exit();
	} else {
		//er is iets fout gegaan..
		header("location:" . URL . "error/error_db");
		exit();	
	}
}

function read($id)
{
	$calendar = getBirthday($id);

	render("home/read", array(
		"calendar" => $calendar
	));
}

function edit($id)
{
	$calendar = getBirthday($id);

	render("home/edit", array(
		"calendar" => $calendar
	));
}

function editSave($id)
{
	if (editCalendar($id)) {
		header("location:" . URL . "home/index");
		exit();
	} else {
		header("location:" . URL . "error/error_404");
		exit();
	}
}

function delete($id)
{
	$calendar = getBirthday($id);

	render("home/delete", array(
		"calendar" => $calendar
	));
}

function deleteSave($id)
{
	if (deleteCalendar($id)) {
		header("location:" . URL . "home/index");
		exit();
	} else {
		//er is iets fout gegaan..
		header("location:" . URL . "error/error_delete");
		exit();	
	}
}