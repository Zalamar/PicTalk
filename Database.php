<?php
	$link = mysql_connect('localhost', 'root', '');
	if (!$link) {
		die('Could not connect: ' . \mysql_error());
	}
	$link = mysql_select_db('Pictalk');
	if (!$link) {
		die ('Can\'t use foo : ' . \mysql_error());
	}
	?>