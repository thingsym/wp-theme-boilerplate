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
		$this->assertEquals( 10, has_filter( 'wp_theme_boilerplate/theme_hook/site/header', [ $this->theme_hook, 'header' ] ) );
		$this->assertEquals( 10, has_filter( 'wp_theme_boilerplate/theme_hook/site/header/after', [ $this->theme_hook, 'global_navi' ] ) );
		$this->assertEquals( 10, has_filter( 'wp_theme_boilerplate/theme_hook/site/header/after', [ $this->theme_hook, 'header_image' ] ) );
		$this->assertEquals( 10, has_filter( 'wp_theme_boilerplate/theme_hook/site/footer/after', [ $this->theme_hook, 'site_info' ] ) );

		$this->assertEquals( 10, has_filter( 'wp_theme_boilerplate/theme_hook/entry/post_thumbnail', [ $this->theme_hook, 'post_thumbnail' ] ) );
		$this->assertEquals( 10, has_filter( 'wp_theme_boilerplate/theme_hook/entry/meta/header', [ $this->theme_hook, 'entry_meta_header' ] ) );
		$this->assertEquals( 10, has_filter( 'wp_theme_boilerplate/theme_hook/entry/meta/footer', [ $this->theme_hook, 'entry_meta_footer' ] ) );

		$this->assertEquals( 10, has_filter( 'wp_theme_boilerplate/theme_hook/content/index/prepend', [ $this->theme_hook, 'add_page_header' ] ) );
		$this->assertEquals( 10, has_filter( 'wp_theme_boilerplate/theme_hook/content/archive/prepend', [ $this->theme_hook, 'add_page_header' ] ) );

		$this->assertEquals( 10, has_filter( 'wp_theme_boilerplate/theme_hook/content/index/append', [ $this->theme_hook, 'add_posts_navigation' ] ) );
		$this->assertEquals( 10, has_filter( 'wp_theme_boilerplate/theme_hook/content/archive/append', [ $this->theme_hook, 'add_posts_navigation' ] ) );
		$this->assertEquals( 10, has_filter( 'wp_theme_boilerplate/theme_hook/content/search/append', [ $this->theme_hook, 'add_posts_navigation' ] ) );

		$this->assertEquals( 10, has_filter( 'wp_theme_boilerplate/theme_hook/content/single/append', [ $this->theme_hook, 'add_post_navigation' ] ) );

		$this->assertEquals( 10, has_filter( 'wp_theme_boilerplate/theme_hook/content/page/append', [ $this->theme_hook, 'add_comments' ] ) );
		$this->assertEquals( 10, has_filter( 'wp_theme_boilerplate/theme_hook/content/single/append', [ $this->theme_hook, 'add_comments' ] ) );
	}
}
