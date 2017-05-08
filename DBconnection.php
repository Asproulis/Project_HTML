<?php
	$conf['db']['db_Host'] = 'localhost';
	$conf['db']['db_Login'] = 'root';
	$conf['db']['db_PWord'] = '';
	$conf['db']['db_Name'] = 'project_2017';

	$linkDB = mysqli_connect($conf['db']['db_Host'], $conf['db']['db_Login'], $conf['db']['db_PWord'], $conf['db']['db_Name']);
	mysqli_query($linkDB, 'SET NAMES utf8');
	//session_start();
	if (!$linkDB) {
		die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
	}
?>