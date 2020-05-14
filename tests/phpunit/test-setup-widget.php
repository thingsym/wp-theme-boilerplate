<?php
/**
 * Class Test_Setup_Widget
 *
 * @package WP Theme Boilerplate
 */

class Test_Setup_Widget extends WP_UnitTestCase {

	public function setUp() {
		parent::setUp();
		$this->widget = new \WP_Theme_Boilerplate\Functions\Setup\Widget();
	}

	/**
	 * @test
	 * @group Widget
	 */
	public function constructor() {
		$this->assertEquals( 10, has_filter( 'widgets_init', [ $this->widget, 'init' ] ) );
	}

}
