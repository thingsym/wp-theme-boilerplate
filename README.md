# WP Theme Boilerplate

Next Generation WordPress Theme Starter Kit

## Features

* Improve template hierarchy and directory layout
* Implement **WordPress Theme Autoloader**
* Implement class based theme functions
* Implement **Theme hooks**
* Support the Block Editor [Gutenberg](https://github.com/WordPress/gutenberg)
* Generate your starter theme on **Theme Starter script**
* Theme development environment on **npm scripts**
* Theme testing environment on **composer scripts**

## Getting Started

### 1. clone WP Theme Boilerplate with change directory name to Theme Slug

```shell
git clone https://github.com/thingsym/wp-theme-boilerplate.git mytheme
```

or

Download archive file (zip or tar.gz) form [GitHub Releases page](https://github.com/thingsym/wp-theme-boilerplate/releases)

Note: Change folder name to Theme Slug

### 2. run Theme Starter script with passing Theme name

Note: Run only once.
Note: Theme name does case-sensitive.

```shell
cd mytheme

bash bin/setup.sh --theme 'Mytheme'
```

or (via npm)

```shell
npm run setup -- --theme 'Mytheme'
```

### 3. delete `bin/setup.sh`

### 4. update the theme header in `style.css`

### 5. update or delete `README.md`

### 6. create Git repository and first commit

```shell
git init
git add .
git commit -m "initial commit"
```

### 7. build Theme development environment

```shell
npm install
```

### 8. make your WordPress theme

### 9. Good luck

## Requirements

* [WordPress](https://wordpress.org/) 5.0+
* [PHP](https://www.php.net/) 5.6+
* [Node.js](https://nodejs.org/)
* [npm](https://www.npmjs.com/) or [Yarn](https://yarnpkg.com/)
* [Composer](https://getcomposer.org/)

### Optional requirements

* [WordPress i18n tools](http://codex.wordpress.org/I18n_for_WordPress_Developers)
* [gettext](https://www.gnu.org/software/gettext/)
* [PHPUnit](https://phpunit.de)
* [PHP_CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer)
* [WordPress Coding Standards](https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards)
* [PHPStan](https://github.com/phpstan/phpstan)
* [PHPMD](https://phpmd.org/)

## Directory Layout

```console
|- bin/                           # scripts
|    |- setup.sh                  # Theme Starter script
|    |- install-wp-tests.sh       # install script for WordPress testing environment
|    |- reset-wp-tests.sh         # reset script for WordPress testing environment
|    |- uninstall-wp-tests.sh     # uninstall script for WordPress testing environment
|
|- css/                     # stylesheet files
|    |- block-editor-style.css
|    |- editor-style.css
|    |- style-rtl.css
|    |- style.css
|    |- style.min.css
|
|- functions/               # PHP classes and functional php files
|    |- custom-header/
|    |- customizer/
|    |- entry-meta/
|    |- post-thumbnail/
|    |- setup/
|    |- template/
|    |- theme-hook/
|    |- autoload.php        # WordPress Theme Autoloader
|    |- loadup.php
|
|- js/                      # Javascript files
|
|- languages/               # Translation files
|
|- node_modules/            # npm modules
|
|- src/                     # assets for development
|    |- js/               # javascript files
|    |- scss/               # scss files
|
|- templates/               # template files and partial files
|    |- content/            # content part files
|    |- page-header/            # page header part files
|    |- parts/              # partial files
|    |- sidebar/            # sidebar part files
|    |- 404.php
|    |- archive.php
|    |- index.php
|    |- page.php
|    |- search.php
|    |- single.php
|
|- tests/                   # testing suite files
|    |- js/                 # Javascript testing suite
|    |- phpunit/            # PHP testing suite
|
|- vendor/                  # Composer dependencies
|
|- .editorconfig            # Editor config settings
|- .gitignore               # gitignore config settings
|- .travis.yml
|- composer.json            # Composer package file for theme testing and using PHP libraries
|- functions.php            # WordPress functionality file
|- index.php                # WordPress file
|- LICENSE                  # LICENSE file
|- package.json             # npm package file for theme development
|- phpcs.ruleset.xml        # PHP_CodeSniffer config settings
|- phpmd.ruleset.xml        # PHPMD config settings
|- phpstan.neon             # PHPStan config settings
|- phpunit.xml              # PHPUnit config settings
|- README.md                # this file
|- readme.txt               # theme readme file for your starter theme
|- screenshot.png           # Screenshot image file
|- style.css                # main stylesheet file, only theme header
|- webpack.config.js        # webpack config settings
```

## Template hierarchical

The top priority template hierarchy is the `templates` directory.

For example, the template hierarchy of the top page is as follows:

1. `templates`/front-page.php
2. front-page.php
3. `templates`/home.php
4. home.php
5. `templates`/index.php
6. index.php

## Theme hooks

Theme hooks adds an action through the `add_action` function.

```php
add_action( 'wp_theme_boilerplate/theme_hook/site/header', [ $this, 'header' ] );
```

Note: Replace `wp_theme_boilerplate` with `your_theme_slug`

### Site

* `your_theme_slug`/theme_hook/site/header/before
* `your_theme_slug`/theme_hook/site/header
* `your_theme_slug`/theme_hook/site/header/after
* `your_theme_slug`/theme_hook/site/content/before
* `your_theme_slug`/theme_hook/site/content/after
* `your_theme_slug`/theme_hook/site/footer/before
* `your_theme_slug`/theme_hook/site/footer
* `your_theme_slug`/theme_hook/site/footer/after

### Content

* `your_theme_slug`/theme_hook/content/prepend
* `your_theme_slug`/theme_hook/content/append
* `your_theme_slug`/theme_hook/content/index/prepend
* `your_theme_slug`/theme_hook/content/index/append
* `your_theme_slug`/theme_hook/content/page/prepend
* `your_theme_slug`/theme_hook/content/page/append
* `your_theme_slug`/theme_hook/content/archive/prepend
* `your_theme_slug`/theme_hook/content/archive/append

### Entry

* `your_theme_slug`/theme_hook/entry/meta/header
* `your_theme_slug`/theme_hook/entry/post_thumbnail
* `your_theme_slug`/theme_hook/entry/meta/footer

## Theme Starter script

Theme Starter script generate your starter theme.

Note: Run only once.

```shell
bin/setup.sh --theme 'Mytheme'
```

### Via npm

```shell
npm run setup -- --theme 'Mytheme'
```

## Theme development environment

### Build development environment

```shell
npm install
```

### Run npm script

```shell
npm run <task>
```

### npm scripts task list

* setup
* makepot
* msgfmt:ja
* msgfmt
* sass:style
* sass:style:minify
* sass:block-editor
* rtlcss:rtl
* webpack
* build:css
* build:js
* build:i18n
* build
* lint:css
* lint:scss
* lint:es
* lint:\es:fix
* lint
* stats:css
* bs:server
* bs:server:watch
* bs:proxy
* bs:proxy:watch
* watch:css
* watch:js
* watch
* server
* archive:package
* archive:zip
* archive

## Theme testing environment

### Build testing environment

```shell
composer install
```

### Run composer script

```shell
composer run <task>
```

### composer scripts task list

* phpcs:config-set
* phpcs
* phpcs:warning
* phpcbf
* phpmd
* phpstan
* phpunit
* ci

## Resources (Third-party)

* Based on [Underscores](https://underscores.me/), [GPLv2 or later](https://www.gnu.org/licenses/gpl-2.0.html)
* CSS reset by [normalize.css](https://necolas.github.io/normalize.css/), [MIT](https://opensource.org/licenses/MIT)

## Contribution

### Patches and Bug Fixes

Small patches and bug reports can be submitted a issue tracker in Github. Forking on Github is another good way. You can send a pull request.

1. Fork [WP Theme Boilerplate](https://github.com/thingsym/wp-theme-boilerplate) from GitHub repository
2. Create a feature branch: git checkout -b my-new-feature
3. Commit your changes: git commit -am 'Add some feature'
4. Push to the branch: git push origin my-new-feature
5. Create new Pull Request

## Changelog

### [1.9.0] - 2020.08.26

* fix webpack.config.js, generate compressed and uncompressed files
* fix npm scripts
* update package.json

### [1.8.0] - 2020.08.10

* update package.json
* assign object to variable for child theme
* fix hooks priority

### [1.7.0] - 2020.05.14

* replace array() to short array syntax []

### [1.6.0] - 2020.04.23

* fix css header
* fix npm scripts
* fix setup.sh
* move test case directory
* bump up phpunit version 7.x
* add version number with zip archive

### [1.5.0] - 2020.03.24

* move template parts files to page-header dir
* add non minified javascript files for theme review
* change javascript files bundle from webpack to minify
* move javascript files to src/javascript/main directory
* exclude node_modules in test scope
* remove README.md in zip archive

### [1.4.0] - 2019.11.19

* fix Theme Starter script
* add style-rtl.css
* update .pot
* fix Requires at least to 5.0
* fix header image and logo image size
* add archive script with npm script

### [1.3.0] - 2019.10.21

* fix test case
* bundle javascript files
* add webpack, replace from uglify-es
* move javascript files to src directory
* fix error content
* remove paginated with archive

### [1.2.0] - 2019.09.30

* add Class Editor

### [1.1.2] - 2019.09.19

* fix site-info
* add editor-style.scss

### [1.1.1] - 2019.07.30

* replace from uglifyjs to uglify-es
* fix header container

### [1.1.0] - 2019.07.11

* add Composer autoloader
* add editor-style.css
* add test case

### [1.0.0] - 2019.05.19

* initial release

## License

Licensed under [GPLv2 or later](https://www.gnu.org/licenses/gpl-2.0.html)

## Author

[thingsym](https://github.com/thingsym)

Copyright (c) 2019-2020 by thingsym
