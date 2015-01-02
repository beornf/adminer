<?php

function adminer_object()
{
	// required to run any plugin
	include_once "./plugins/plugin.php";

	// autoloader
	foreach (glob("plugins/*.php") as $filename) {
		include_once "./$filename";
	}

	$input = file_get_contents(".hosts");
	$hosts = $input ? unserialize($input) : array();
	array_unshift($hosts, "localhost");

	$plugins = array(
		// specify enabled plugins here
		new AdminerDatabaseHide(array("mysql", "information_schema", "performance_schema", "postgres", "template0", "template1")),
		new AdminerLoginServers($hosts, array("server" => "MySQL", "pgsql" => "PostgreSQL")),
		new AdminerSelectDefault("25", "50", idf_escape("id") . " DESC"),
		new AdminerSimpleMenu(),
		new AdminerJsonPreview(),
	);

	return new AdminerPlugin($plugins);
}
// include original Adminer or Adminer Editor
include "./adminer.php";
