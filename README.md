# WP Theme Boilerplate

Next Generation WordPress Theme Starter Kit

## Features

* Improve template hierarchy and directory layout
* Implement WordPress Theme Autoloader
* Implement class based theme functions
* Implement theme hooks
* Support Block Editor [Gutenberg](https://github.com/WordPress/gutenberg)
* Generate your starter theme on **Theme Starter script**
* Theme development environment on **npm scripts**
* Theme testing environment on **composer scripts**

## Getting Started

### 1. clone WP Theme Boilerplate with change directory name to Theme Slug

```
git clone https://github.com/thingsym/wp-theme-boilerplate.git mytheme
```

### 2. run Theme Starter script with passing Theme name

Note: Run only once.

```
cd mytheme

bin/setup.sh --theme 'Mytheme'

or

npm run setup -- --theme 'Mytheme'
```

### 3. delete `bin/setup.sh`
### 4. update the theme header in `style.css`
### 5. update or delete `README.md`

### 6. create Git repository and first commit

```
git init
git add .
git commit -m "initial commit"
```

### 7. build Theme development environment

```
npm install
```

### 8. make your WordPress theme
### 9. Good luck!

## Requirements

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

## Theme Starter script


## Directory Layout


## Theme hooks


## Theme development environment

```
npm run
```

## Theme testing environment

```
composer run-script --list
```

## Resources

* Based on [Underscores](https://underscores.me/), [GPLv2 or later](https://www.gnu.org/licenses/gpl-2.0.html)
* CSS reset by [normalize.css](https://necolas.github.io/normalize.css/), [MIT](https://opensource.org/licenses/MIT)

## Changelog

### [1.0.0] - 2019.04.10

- initial release

## License

Licensed under [GPLv2 or later](https://www.gnu.org/licenses/gpl-2.0.html)
