<?php

function myAutoload($class)
{
	$folders = [
		'/components/',
		'/models/',
	];

	foreach($folders as $folder)
	{
		$file_path = ROOT . $folder . $class . '.php';

		if(file_exists($file_path))
		{
			include_once($file_path);
		}
	}
}

spl_autoload_register('myAutoload');

?>