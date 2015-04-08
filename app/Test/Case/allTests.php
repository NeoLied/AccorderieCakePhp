<?php

class AllTests extends CakeTestSuite {
	public static function suite() {
		$suite = new CakeTestSuite('All tests');
		$suite->addTestDirectory(TESTS . 'Case/Model');
		$suite->addTestDirectory(TESTS . 'Case/Controller');
		return $suite;
	}
}