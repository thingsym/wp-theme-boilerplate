<?php
/**
 * Class Test_Setup_Menu
 *
 * @package WP Theme Boilerplate
 */

class Test_Setup_Menu extends WP_UnitTestCase {

	public function setUp() {
		parent::setUp();
		$this->menu = new \WP_Theme_Boilerplate\Functions\Setup\Menu();
	}

	/**
	 * @test
	 * @group Menu
	 */
	public function constructor() {
		$this->assertEquals( 10, has_filter( 'after_setup_theme', array( $this->menu, 'init' ) ) );
	}

}
