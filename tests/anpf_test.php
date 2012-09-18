<?php

require_once '../src/anpf.php';

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
		$param = $this->f->remove_prefix('/myblog/somebody/', '/myblog/somebody/photos/list');
		$this->assertEquals($param, 'photos/list');
	}
	
	function testUrl_to_function() {
		$fname = $this->f->url_to_function('posts/list');
		$this->assertEquals($fname['fname'], 'route_posts_list');
		$fname = $this->f->url_to_function('contact');
		$this->assertEquals($fname['fname'], 'route_contact');
	}
	
	function testUrl_for() {
		$url = $this->f->url_for('posts_list');
		$this->assertEquals($url, './?q=posts/list');
	}


}