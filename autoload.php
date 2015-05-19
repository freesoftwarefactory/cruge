<?php
function cruge_autoload ($pClassName) {
	if(strncmp($pClassName, "cruge\\", 6) !== 0)
		return false;
	$pClassName = substr($pClassName, 6);
	$pClassName = str_replace("\\","/",$pClassName);
	include(__DIR__ . "/" . $pClassName . ".php");
}
spl_autoload_register("cruge_autoload");


