<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Current Chemicals</title>
	
</head>
	<body>
		<?php
		echo Form::select('range', array('H' => 'Last Hour', 'D' => 'Last Day', 'W' => 'Last Week', 'M' => 'Last Month', 'Y' => 'Last Year'), 'D');
		?>
		<table border=1>
		<tr>
			<th>ORP</th><th>pH</th><th>Time Stamp</th><th>Serial Number</th>
		</tr>
		<?php
		foreach($entries as $logentry)
		{
			echo '
				<tr>
					<td>'.$logentry -> orp.'</td>
					<td>'.$logentry-> ph.'</td>
					<td>'.$logentry -> timestamp.'</td>
					<td>'.$logentry -> serial.'</td>
				</tr></a>
				';
		};
		
		?>
		</table>
	</body>
</html>
