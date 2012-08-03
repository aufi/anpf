<?php

/** Anpf basic example - static pages routed and rendered by framework */

//include and initialize framework
require('../../src/anpf.php');
$f = new Anpf();

//define actions (index and error action must be defined)

function route_index() {

}

function route_error($code) {
	return array('code' => $code);
}

function route_contact() {
	global $f;
	if (isset($_POST['action_message'])) {
		//do something, foo example
		return array('last_message' => $f->sec($_POST['message']));
	}
}

//process action by Anpf
$f->run();

//thats all :-)