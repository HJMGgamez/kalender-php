<h3>Do you want to delete this preson <?php echo $calendar["person"]; ?></h3>
			<form action="<?= URL ?>home/deleteSave/<?= $calendar["id"]; ?>"  method="post">
			  <input type="submit" value="yes">
			</form>
<p><a href='<?= URL ?>home/index'>back to the calendar</a></p>