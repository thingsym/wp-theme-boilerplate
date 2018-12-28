#!/usr/bin/env bash

set -e

if [ $1 == '--help' ]; then
  echo "Theme Starter script v1.0.0"
  echo "usage: bash bin/setup.sh --theme 'Mytheme'"
  echo "usage via npm-scripts: npm run setup -- --theme 'Mytheme'"
  exit 0
fi

if [ $# -ne 2 ]; then
  echo 'Error: Required Two arguments'
  exit 1
fi

if [ $1 != '--theme' ]; then
  echo "Error: Wrong option name"
  exit 1
fi

if [ -d ./.git ]; then
  rm -rf ./.git
  echo "Info: Delete .git"
fi

THEME=$2
THEME_LOWER=${THEME,,}
THEME_PASCAL_SNAKE=`echo ${THEME} | sed -r 's/ /_/g'`
THEME_KEBAB=`echo ${THEME_LOWER} | sed -r 's/ /-/g'`
THEME_SNAKE=`echo ${THEME_LOWER} | sed -r 's/ /_/g'`

if [ ! -d ../${THEME_KEBAB} ]; then
  echo "Error: Cannot execute"
  echo "The directory name and the theme name should be the same character string"
  echo "Directory name: $(cd $(dirname $0)/..;pwd)"
  echo "Theme name: ${THEME_KEBAB}"
  exit 1
fi

if [ -f ./languages/wp-theme-boilerplate.pot ]; then
  mv ./languages/wp-theme-boilerplate.pot ./languages/${THEME_KEBAB}.pot
  echo "Info: Generated ${THEME_KEBAB}.pot"
fi


find . -type f -not -iwholename './README.md' -type f -not -iwholename './bin/*' -not -iwholename './.git/*' -not -iwholename './node_modules/*' -not -name '.*' | xargs sed -i "s/@package WP Theme Boilerplate/@package ${THEME}/g"
find . -type f -not -iwholename './README.md' -type f -not -iwholename './bin/*' -not -iwholename './.git/*' -not -iwholename './node_modules/*' -not -name '.*' | xargs sed -i "s/Theme Name: WP Theme Boilerplate/Theme Name: ${THEME}/g"
find . -type f -not -iwholename './README.md' -type f -not -iwholename './bin/*' -not -iwholename './.git/*' -not -iwholename './node_modules/*' -not -name '.*' | xargs sed -i "s/theme based on WP Theme Boilerplate/theme based on ${THEME}/g"
find . -type f -not -iwholename './README.md' -type f -not -iwholename './bin/*' -not -iwholename './.git/*' -not -iwholename './node_modules/*' -not -name '.*' | xargs sed -i "s/\"Project-Id-Version: WP Theme Boilerplate/\"Project-Id-Version: ${THEME}/g"
find . -type f -not -iwholename './README.md' -type f -not -iwholename './bin/*' -not -iwholename './.git/*' -not -iwholename './node_modules/*' -not -name '.*' | xargs sed -i "s/msgid \"WP Theme Boilerplate\"/msgid \"${THEME}\"/g"
find . -type f -not -iwholename './README.md' -type f -not -iwholename './bin/*' -not -iwholename './.git/*' -not -iwholename './node_modules/*' -not -name '.*' | xargs sed -i "s/=== WP Theme Boilerplate ===/=== ${THEME} ===/g"

find . -type f -not -iwholename './README.md' -type f -not -iwholename './bin/*' -not -iwholename './.git/*' -not -iwholename './node_modules/*' -not -name '.*' | xargs sed -i "s/namespace WP_Theme_Boilerplate/namespace ${THEME_PASCAL_SNAKE}/g"
find . -type f -not -iwholename './README.md' -type f -not -iwholename './bin/*' -not -iwholename './.git/*' -not -iwholename './node_modules/*' -not -name '.*' | xargs sed -i "s/WP_Theme_Boilerplate\\\/${THEME_PASCAL_SNAKE}\\\/g"

find . -type f -not -iwholename './README.md' -type f -not -iwholename './bin/*' -not -iwholename './.git/*' -not -iwholename './node_modules/*' -not -name '.*' | xargs sed -i "s/Text Domain: wp-theme-boilerplate/Text Domain: ${THEME_KEBAB}/g"
find . -type f -not -iwholename './README.md' -type f -not -iwholename './bin/*' -not -iwholename './.git/*' -not -iwholename './node_modules/*' -not -name '.*' | xargs sed -i "s/'wp-theme-boilerplate'/'${THEME_KEBAB}'/g"
find . -type f -not -iwholename './README.md' -type f -not -iwholename './bin/*' -not -iwholename './.git/*' -not -iwholename './node_modules/*' -not -name '.*' | xargs sed -i "s/wp-theme-boilerplate-/${THEME_KEBAB}-/g"
find . -type f -not -iwholename './README.md' -type f -not -iwholename './bin/*' -not -iwholename './.git/*' -not -iwholename './node_modules/*' -not -name '.*' | xargs sed -i "s/\"name\": \"wp-theme-boilerplate\"/\"name\": \"${THEME_KEBAB}\"/g"
find . -type f -not -iwholename './README.md' -type f -not -iwholename './bin/*' -not -iwholename './.git/*' -not -iwholename './node_modules/*' -not -name '.*' | xargs sed -i "s/..\/wp-theme-boilerplate ..\/wp-theme-boilerplate\/languages\/wp-theme-boilerplate.pot/..\/${THEME_KEBAB} ..\/${THEME_KEBAB}\/languages\/${THEME_KEBAB}.pot/g"

find . -type f -not -iwholename './README.md' -type f -not -iwholename './bin/*' -not -iwholename './.git/*' -not -iwholename './node_modules/*' -not -name '.*' | xargs sed -i "s/add_action( 'wp_theme_boilerplate\//add_action( '${THEME_SNAKE}\//g"
find . -type f -not -iwholename './README.md' -type f -not -iwholename './bin/*' -not -iwholename './.git/*' -not -iwholename './node_modules/*' -not -name '.*' | xargs sed -i "s/do_action( 'wp_theme_boilerplate\//do_action( '${THEME_SNAKE}\//g"
find . -type f -not -iwholename './README.md' -type f -not -iwholename './bin/*' -not -iwholename './.git/*' -not -iwholename './node_modules/*' -not -name '.*' | xargs sed -i "s/$hook_prefix = 'wp_theme_boilerplate\//$hook_prefix = '${THEME_SNAKE}\//g"

find . -type f -not -iwholename './README.md' -type f -not -iwholename './bin/*' -not -iwholename './.git/*' -not -iwholename './node_modules/*' -not -name '.*' | xargs sed -i "s/Theme URI: https:\/\/github.com\/thingsym\/wp-theme-boilerplate/Theme URI: /g"
find . -type f -not -iwholename './README.md' -type f -not -iwholename './bin/*' -not -iwholename './.git/*' -not -iwholename './node_modules/*' -not -name '.*' | xargs sed -i "s/\"url\": \"https:\/\/github.com\/thingsym\/wp-theme-boilerplate\/issues\"/\"url\": \"\"/g"
find . -type f -not -iwholename './README.md' -type f -not -iwholename './bin/*' -not -iwholename './.git/*' -not -iwholename './node_modules/*' -not -name '.*' | xargs sed -i "s/\"homepage\": \"https:\/\/github.com\/thingsym\/wp-theme-boilerplate\"/\"homepage\": \"\"/g"
find . -type f -not -iwholename './README.md' -type f -not -iwholename './bin/*' -not -iwholename './.git/*' -not -iwholename './node_modules/*' -not -name '.*' | xargs sed -i "s/msgid \"https:\/\/github.com\/thingsym\/wp-theme-boilerplate\"/msgid \"\"/g"

find . -type f -not -iwholename './README.md' -type f -not -iwholename './bin/*' -not -iwholename './.git/*' -not -iwholename './node_modules/*' -not -name '.*' | xargs sed -i "s/'https:\/\/wordpress.org\/themes\/wp-theme-boilerplate\/' ); ?>\">WP Theme Boilerplate<\/a>/'https:\/\/wordpress.org\/themes\/${THEME_KEBAB}\/' ); ?>\">${THEME}<\/a>/g"

find . -type f -not -iwholename './README.md' -type f -not -iwholename './bin/*' -not -iwholename './.git/*' -not -iwholename './node_modules/*' -not -name '.*' | xargs sed -i "s/Author: thingsym/Author: /g"
find . -type f -not -iwholename './README.md' -type f -not -iwholename './bin/*' -not -iwholename './.git/*' -not -iwholename './node_modules/*' -not -name '.*' | xargs sed -i "s/Contributors: thingsym/Contributors: /g"
find . -type f -not -iwholename './README.md' -type f -not -iwholename './bin/*' -not -iwholename './.git/*' -not -iwholename './node_modules/*' -not -name '.*' | xargs sed -i "s/Copyright (C) 2018 thingsym/Copyright (C) 2018 /g"
find . -type f -not -iwholename './README.md' -type f -not -iwholename './bin/*' -not -iwholename './.git/*' -not -iwholename './node_modules/*' -not -name '.*' | xargs sed -i "s/msgid \"thingsym\"/msgid \"\"/g"
find . -type f -not -iwholename './README.md' -type f -not -iwholename './bin/*' -not -iwholename './.git/*' -not -iwholename './node_modules/*' -not -name '.*' | xargs sed -i "s/https:\/\/www.thingslabo.com\///g"

echo "Info: Generated a WordPress theme: ${THEME}"
