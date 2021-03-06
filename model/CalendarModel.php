<?php
    function getCalendar()
    {
        $db = openDatabaseConnection();

        $sql = "SELECT * FROM `birthdays` ORDER BY `birthdays`.`month`,`day`,`year` ASC";

        $query = $db->prepare($sql);
        $query->execute();

        $db = null;

        return $query->fetchAll();
    }
    function getBirthday($id)
{
    $db = openDatabaseConnection();

    $sql = "SELECT * FROM `birthdays` WHERE id = :id LIMIT 1";

    $query = $db->prepare($sql);
    $query->execute(array(
        ":id" => $id
    ));

    $db = null;

    return $query->fetch();
}

function createCalendar()
{
    $person = isset($_POST["name"]) ? $_POST["name"] : null;
    $day = isset($_POST["day"]) ? $_POST["day"] : null;
    $month = isset($_POST["month"]) ? $_POST["month"] : null;
    $year = isset($_POST["year"]) ? $_POST["year"] : null;
    
    if ($person === null || $day === null || $month === null || $year === null) {
        return false;
        exit();
    }
    $db = openDatabaseConnection();

    $sql = "INSERT INTO `birthdays` (`person`, `day`, `month`, `year`) 
    VALUES (:person, :day, :month, :year)";

    $query = $db->prepare($sql);
    $query->execute(array(
        ":person" => $person,
        ":day" => $day,
        ":month" => $month,
        ":year" => $year
    ));

    //Database verbinding sluiten
    $db = null;

    return true;
}

function deleteCalendar($id)
{
    if ($id === '') {
        return false;
    }

    $db = openDatabaseConnection();

    $sql = "DELETE FROM `birthdays` WHERE id = :id";

    $query = $db->prepare($sql);
    $query->execute(array(
        ":id" => $id
    ));

    $db = null;

    return true;
}

function editCalendar($id=null)
{
    $person = isset($_POST["name"]) ? $_POST["name"] : null;
    $day = isset($_POST["day"]) ? $_POST["day"] : null;
    $month = isset($_POST["month"]) ? $_POST["month"] : null;
    $year = isset($_POST["year"]) ? $_POST["year"] : null;
    
    if ($person === null || $day === null || $month === null || $year === null) {
        return false;
    }
    if (checkdate($month, $day, $year) === false){
        return false;
    }

    $db = openDatabaseConnection();

    $sql = "UPDATE `birthdays` 
            SET person = :name, day = :day, month = :month, year = :year 
            WHERE id = :id";

    $query = $db->prepare($sql);

    $query->execute(array(
        ":id" => $id,
        ":name" => $person,
        ":day" => $day,
        ":month" => $month,
        ":year" => $year
    ));

    $db = null;

    return true;
}