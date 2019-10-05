<?php require("functions.php"); ?>
<?php require("config.php"); ?>

<style>

div {
	background-color: white;
	height: 75px;
	display: inline-block;
}

.year {
	background-color: white;
	width: <?php echo $since; ?>px;
	height: 30px;
}

.timeline_bar {
	background-color: white;
	width: <?php echo $since; ?>px;
}

.tooltip {
	position: relative;
	display: inline-block;
}

.tooltip .tooltiptext {
	visibility: hidden;
	font-size: 0.9em;
	width: 95px;
	background-color: black;
	color: #fff;
	text-align: center;
	padding: 5px 0;
	border-radius: 6px;
	position: absolute;
	z-index: 1;
}

.tooltip:hover .tooltiptext {
	visibility: visible;
}

</style>

<div class="year tooltip">
	<?php
	for($i = 0; $i < $years; $i++) {
		$year = $i + $start_year;
		echo "<div style='width: " 
		. 36.525
		. "; background-color: " 
		. random_color_darker() 
		. ";'>" . $year . "</div>";
	}
	?>
</div>

<?php foreach($dataset as $data): ?>
	<div class="timeline_bar tooltip">
		<?php
		for($i = 0; $i < sizeof($data); $i++) {
			if($data[$i][2] == "present") {
				$data[$i][2] = date("d/m/Y");
			}
			$data[$i][1] = get_uk_timestamp($data[$i][1]) + 43200;
			$data[$i][2] = get_uk_timestamp($data[$i][2]) + 43200;
			$data[$i][1] = round(days($data[$i][1], $start_date), 0) / 10;
			$data[$i][2] = round(days($data[$i][2], $start_date)) / 10;
			$data[$i][3] = $data[$i][2] - $data[$i][1];

			$prev = $i - 1;
			$gap = $data[$i][1] - $data[$prev][2];
			echo "<div style='width: " 
			. $data[$i][3]
			. "; margin-left: " 
			. $gap . "px" 
			. "; background-color: " 
			. random_color_darker() 
			. ";'><span class='tooltiptext'>" . $data[$i][0] . "</span></div>";
		}
		?>
	</div>
<?php endforeach ?>