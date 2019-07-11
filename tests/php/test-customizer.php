<?php
/**
 * Class Test_Customizer
 *
 * @package WP Theme Boilerplate
 */

class Test_Customizer extends WP_UnitTestCase {

	public function setUp() {
		parent::setUp();
		$this->customizer = new \WP_Theme_Boilerplate\Functions\Customizer\Customizer();
	}

	/**
	 * @test
	 * @group Customizer
	 */
	public function constructor() {
		$this->assertEquals( 10, has_filter( 'customize_register', array( $this->customizer, 'customizer' ) ) );
		$this->assertEquals( 10, has_filter( 'customize_preview_init', array( $this->customizer, 'preview_enqueue_scripts' ) ) );
	}

	/**
	 * @test
	 * @group Customizer
	 */
	public function preview_enqueue_scripts() {
		$this->customizer->preview_enqueue_scripts();
		$this->assertTrue( wp_script_is( 'wp-theme-boilerplate-customizer-preview' ) );
	}

}
