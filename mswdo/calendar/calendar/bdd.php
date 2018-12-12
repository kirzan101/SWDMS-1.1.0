<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=calendar;charset=utf8', 'swdo', 'Canaman2018');
}
catch(Exception $e)
{
        die('Error : '.$e->getMessage());
}
