<?php
$dom = simplexml_load_file("menu.xml");

foreach($dom->userdata as $u)
{
	echo "<h2>$u->menu - $u->item - $u->price</h2>"."<hr>";	
}

?>