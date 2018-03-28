<form action="<?= URL ?>home/createSave" method="GET">
        <p>name</p><input type="text" name="name"><br>
        <p>day</p><input type="number" min="0" max="31" name="day" value="01"><br>
        <p>month</p><input type="number" min="01" max="12" name="month" value="01"><br>
        <p>year</p><input type="number" min="0" max="2018" name="year"><br>
        <input type="submit">
        <br>
        <a href="<?= URL ?>home/index">back to the calendar</a>
    </form>