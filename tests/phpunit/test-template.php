<?php
/**
 * Class Test_Template
 *
 * @package WP Theme Boilerplate
 */

class Test_Template extends WP_UnitTestCase {

	public function setUp() {
		parent::setUp();
		$this->template = new \WP_Theme_Boilerplate\Functions\Template\Template();
	}

	/**
	 * @test
	 * @group Template
	 */
	public function constructor() {
		$this->assertEquals( 10, has_filter( 'after_setup_theme', array( $this->template, 'custom_template_hierarchy' ) ) );
		$this->assertEquals( 10, has_filter( 'get_search_form', array( $this->template, 'get_search_form' ) ) );
	}

}
