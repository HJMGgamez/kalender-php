<?php
    $months = array(null,"januari","febuari","maart","april","mei","juni","juli","augustus","september","otktober","november","december");
    $currentMonth = null;
    $currentDay = null;

    foreach ($calendars as $birthday) {
    if ($currentMonth !== $birthday["month"]) {
        $currentMonth = $birthday["month"];
?>
    <h1> <?= $months[$birthday["month"]]; ?></h1>
    

<?php 
    }
    if ($currentDay !== $birthday["day"]) {
        $currentDay = $birthday["day"];

?>
    <h2> <?= $birthday["day"]; ?></h2>

<?php 
    }
    echo "<p><a href=\"" . URL . "home/edit/" . $birthday['id'] . "\">".$birthday["person"]." (".$birthday["year"].")"."</a><a href=\"" . URL . "home/delete/" . $birthday['id'] . "\">x</a></p>";
} ?>
<p><a href='<?= URL ?>home/create'>+ Toevoegen</a></p>