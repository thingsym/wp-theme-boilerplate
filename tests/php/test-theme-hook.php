<?php
/**
 * Class Test_Theme_Hook
 *
 * @package WP Theme Boilerplate
 */

class Test_Theme_Hook extends WP_UnitTestCase {

	public function setUp() {
		parent::setUp();
		$this->theme_hook = new \WP_Theme_Boilerplate\Functions\Theme_Hook\Theme_Hook();
	}

	/**
	 * @test
	 * @group Theme Hook
	 */
	public function constructor() {
		$this->assertEquals( 10, has_filter( 'wp_theme_boilerplate/theme_hook/site/header', array( $this->theme_hook, 'header' ) ) );
		$this->assertEquals( 10, has_filter( 'wp_theme_boilerplate/theme_hook/site/header/after', array( $this->theme_hook, 'global_navi' ) ) );
		$this->assertEquals( 10, has_filter( 'wp_theme_boilerplate/theme_hook/site/header/after', array( $this->theme_hook, 'header_image' ) ) );
		$this->assertEquals( 10, has_filter( 'wp_theme_boilerplate/theme_hook/site/footer/after', array( $this->theme_hook, 'site_info' ) ) );

		$this->assertEquals( 10, has_filter( 'wp_theme_boilerplate/theme_hook/entry/post_thumbnail', array( $this->theme_hook, 'post_thumbnail' ) ) );
		$this->assertEquals( 10, has_filter( 'wp_theme_boilerplate/theme_hook/entry/meta/header', array( $this->theme_hook, 'entry_meta_header' ) ) );
		$this->assertEquals( 10, has_filter( 'wp_theme_boilerplate/theme_hook/entry/meta/footer', array( $this->theme_hook, 'entry_meta_footer' ) ) );

		$this->assertEquals( 10, has_filter( 'wp_theme_boilerplate/theme_hook/content/index/prepend', array( $this->theme_hook, 'prepend_content_index' ) ) );
		$this->assertEquals( 10, has_filter( 'wp_theme_boilerplate/theme_hook/content/archive/prepend', array( $this->theme_hook, 'prepend_content_archive' ) ) );

		$this->assertEquals( 10, has_filter( 'wp_theme_boilerplate/theme_hook/content/index/append', array( $this->theme_hook, 'append_content_archive' ) ) );
		$this->assertEquals( 10, has_filter( 'wp_theme_boilerplate/theme_hook/content/archive/append', array( $this->theme_hook, 'append_content_archive' ) ) );
		$this->assertEquals( 10, has_filter( 'wp_theme_boilerplate/theme_hook/content/search/append', array( $this->theme_hook, 'append_content_archive' ) ) );

		$this->assertEquals( 10, has_filter( 'wp_theme_boilerplate/theme_hook/content/page/append', array( $this->theme_hook, 'append_content_page' ) ) );
		$this->assertEquals( 10, has_filter( 'wp_theme_boilerplate/theme_hook/content/single/append', array( $this->theme_hook, 'append_content_single' ) ) );
	}
}
