<?php
try
{
	$connection = new PDO('mysql:host=localhost;dbname=swdo;charset=utf8', 'swdo', 'Canaman2018'); // add the password inside the ''
}
catch(Exception $e)
{
        die('Error : '.$e->getMessage());
}
