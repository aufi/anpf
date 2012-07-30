<?php

require_once '/Users/aufi/Anpf/src/anpf.php';

class AnpfTest extends PHPUnit_Framework_TestCase
{
	var $f;
	
	function AnpfTest($name = '') {
//	   $this->PHPUnit_Framework_TestCase($name);
	}

	function setUp() {
	    $this->f = new Anpf();
	}

	function tearDown() {
	    unset($this->f);
	}
	
	function testRemove_prefix() {
		$param = $this->f->remove_prefix('qwert', 'qwertz');
		$this->assertEquals($param, 'z');
		$param = $this->f->remove_prefix('/adasd/Dfgdh/', '/adasd/Dfgdh/asdasd/Asd');
		$this->assertEquals($param, 'asdasd/Asd');
	}
	
	function testUrl_to_function() {
		$fname = $this->f->url_to_function('/qwer/tqwertz');
		$this->assertEquals($fname['fname'], 'route_qwer_tqwertz');
		$fname = $this->f->url_to_function('/qwer');
		$this->assertEquals($fname['fname'], 'route_qwer');
	}
	
	function testUrl_for() {
		
	}


}