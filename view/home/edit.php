<form action="<?= URL ?>home/editSave/<?= $calendar["id"]; ?>" method="post">
        <p>name</p><input type="text" name="name" value="<?= $calendar["person"] ?>"><br>
        <p>day</p><input type="number" min="0" max="31" name="day" value="<?= $calendar["day"] ?>"><br>
        <p>month</p><input type="number" min="01" max="12" name="month" value="<?= $calendar["month"] ?>"><br>
        <p>year</p><input type="number" min="0" max="2018" name="year" value="<?= $calendar["year"] ?>"><br>
        <input type="submit">
        <br>
        <a href="<?= URL ?>home/index">back to the calendar</a>
    </form>