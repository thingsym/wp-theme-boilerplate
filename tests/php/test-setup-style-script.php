<?php
/**
 * Class Test_Setup_Style_Script
 *
 * @package WP Theme Boilerplate
 */

class Test_Setup_Style_Script extends WP_UnitTestCase {

	public function setUp() {
		parent::setUp();
		$this->style_script = new \WP_Theme_Boilerplate\Functions\Setup\Style_Script();
	}

	/**
	 * @test
	 * @group Style_Script
	 */
	public function constructor() {
		$this->assertEquals( 10, has_filter( 'wp_enqueue_scripts', array( $this->style_script, 'enqueue_styles' ) ) );
		$this->assertEquals( 10, has_filter( 'wp_enqueue_scripts', array( $this->style_script, 'enqueue_scripts' ) ) );
		$this->assertEquals( 10, has_filter( 'enqueue_block_editor_assets', array( $this->style_script, 'block_editor_styles' ) ) );
	}

	/**
	 * @test
	 * @group Style_Script
	 */
	public function enqueue_styles() {
		$this->style_script->enqueue_styles();
		$this->assertTrue( wp_style_is( 'wp-theme-boilerplate' ) );
	}

	/**
	 * @test
	 * @group Style_Script
	 */
	public function enqueue_scripts() {
		$this->style_script->enqueue_scripts();
		$this->assertTrue( wp_script_is( 'wp-theme-boilerplate-navigation' ) );
		$this->assertTrue( wp_script_is( 'wp-theme-boilerplate-skip-link-focus-fix' ) );
		// $this->assertTrue( wp_script_is( 'comment-reply' ) );
	}

	/**
	 * @test
	 * @group Style_Script
	 */
	public function block_editor_styles() {
		$this->style_script->block_editor_styles();
		$this->assertTrue( wp_style_is( 'wp-theme-boilerplate-block-editor' ) );
	}

}
