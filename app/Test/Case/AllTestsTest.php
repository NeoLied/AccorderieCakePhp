<?php

class AllTestsTest extends CakeTestSuite {
	public static function suite() {
		$suite = new CakeTestSuite('All tests');
		$suite->addTestDirectoryRecursive(TESTS . 'Case/Model');
		$suite->addTestFile(TESTS . 'Case/Controller' . '/UsersControllerTest.php');
		return $suite;
	}
}