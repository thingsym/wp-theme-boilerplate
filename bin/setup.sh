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

THEME=$2
THEME_LOWER=${THEME,,}
THEME_ARRAY=($THEME)
THEME_PASCAL_SNAKE=`echo ${THEME_ARRAY[@]^} | sed -r 's/ /_/g'`
THEME_KEBAB=`echo ${THEME_LOWER} | sed -r 's/ /-/g'`
THEME_SNAKE=`echo ${THEME_LOWER} | sed -r 's/ /_/g'`

if [ ! -d ../${THEME_KEBAB} ]; then
  echo "Error: Cannot execute"
  echo "The directory name and the Theme Slug should be the same character string"
  echo "Directory name: $(cd $(dirname $0)/..;pwd)"
  echo "Theme Slug: ${THEME_KEBAB}"
  exit 1
fi

echo "Info: Run Theme Starter script"

if [ -d ./.git ]; then
  rm -rf ./.git
  echo "Info: Delete .git"
fi

if [ -f ./languages/wp-theme-boilerplate.pot ]; then
  mv ./languages/wp-theme-boilerplate.pot ./languages/${THEME_KEBAB}.pot
  echo "Info: Rename to ${THEME_KEBAB}.pot"
fi

find . -type f -name '*.php' -o -name '*.pot' -not -iwholename './.git/*' -not -iwholename './node_modules/*' -not -iwholename './vendor/*' | xargs sed -i "s/WP Theme Boilerplate/${THEME}/g"

find . -type f -name '*.php' -not -iwholename './.git/*' -not -iwholename './node_modules/*' -not -iwholename './vendor/*' | xargs sed -i "s/WP_Theme_Boilerplate/${THEME_PASCAL_SNAKE}/g"
find . -type f -name '*.php' -not -iwholename './.git/*' -not -iwholename './node_modules/*' -not -iwholename './vendor/*' | xargs sed -i "s/wp_theme_boilerplate/${THEME_SNAKE}/g"
find . -type f -name '*.php' -not -iwholename './.git/*' -not -iwholename './node_modules/*' -not -iwholename './vendor/*' | xargs sed -i "s/'wp-theme-boilerplate'/'${THEME_KEBAB}'/g"
find . -type f -name '*.php' -not -iwholename './.git/*' -not -iwholename './node_modules/*' -not -iwholename './vendor/*' | xargs sed -i "s/wp-theme-boilerplate-/${THEME_KEBAB}-/g"

find . -type f -name 'site-info.php' -not -iwholename './.git/*' -not -iwholename './node_modules/*' -not -iwholename './vendor/*' | xargs sed -i "s/https:\/\/wordpress.org\/themes\/wp-theme-boilerplate\//https:\/\/wordpress.org\/themes\/${THEME_KEBAB}\//g"
find . -type f -name 'site-info.php' -not -iwholename './.git/*' -not -iwholename './node_modules/*' -not -iwholename './vendor/*' | xargs sed -i "s/thingsym/Author/g"

find . -type f -name 'style.css' -o -name 'rtl.css' -not -iwholename './.git/*' -not -iwholename './node_modules/*' -not -iwholename './vendor/*' | xargs sed -i "s/Theme Name: WP Theme Boilerplate/Theme Name: ${THEME}/g"
find . -type f -name 'style.css' -not -iwholename './.git/*' -not -iwholename './node_modules/*' -not -iwholename './vendor/*' | xargs sed -i "s/Text Domain: wp-theme-boilerplate/Text Domain: ${THEME_KEBAB}/g"
find . -type f -name 'style.css' -not -iwholename './.git/*' -not -iwholename './node_modules/*' -not -iwholename './vendor/*' | xargs sed -i "s/Theme URI: https:\/\/github.com\/thingsym\/wp-theme-boilerplate/Theme URI: /g"
find . -type f -name 'style.css' -not -iwholename './.git/*' -not -iwholename './node_modules/*' -not -iwholename './vendor/*' | xargs sed -i "s/Author: thingsym/Author: /g"

find . -type f -name 'style.css' -o -name '*.pot' -not -iwholename './.git/*' -not -iwholename './node_modules/*' -not -iwholename './vendor/*' | xargs sed -i "s/https:\/\/www.thingslabo.com\///g"

find . -type f -name '*.pot' -not -iwholename './.git/*' -not -iwholename './node_modules/*' -not -iwholename './vendor/*' | xargs sed -i "s/https:\/\/github.com\/thingsym\/wp-theme-boilerplate//g"
find . -type f -name '*.pot' -not -iwholename './.git/*' -not -iwholename './node_modules/*' -not -iwholename './vendor/*' | xargs sed -i "s/Copyright (C) [0-9]\+ thingsym/Copyright (C) /g"
find . -type f -name '*.pot' -not -iwholename './.git/*' -not -iwholename './node_modules/*' -not -iwholename './vendor/*' | xargs sed -i "s/msgid \"thingsym\"/msgid \"\"/g"
find . -type f -name '*.pot' -not -iwholename './.git/*' -not -iwholename './node_modules/*' -not -iwholename './vendor/*' | xargs sed -i "s/\"Report-Msgid-Bugs-To: https:\/\/wordpress.org\/support\/theme\/wp-theme-\"//g"
find . -type f -name '*.pot' -not -iwholename './.git/*' -not -iwholename './node_modules/*' -not -iwholename './vendor/*' | xargs sed -i "s/\"boilerplate\\\n\"//g"

find . -type f -name 'readme.txt' -not -iwholename './.git/*' -not -iwholename './node_modules/*' -not -iwholename './vendor/*' | xargs sed -i "s/=== WP Theme Boilerplate ===/=== ${THEME} ===/g"
find . -type f -name 'readme.txt' -not -iwholename './.git/*' -not -iwholename './node_modules/*' -not -iwholename './vendor/*' | xargs sed -i "s/Contributors: thingsym/Contributors: /g"

find . -type f -name '*.json' -not -iwholename './.git/*' -not -iwholename './node_modules/*' -not -iwholename './vendor/*' | xargs sed -i "s/\"name\": \"wp-theme-boilerplate\"/\"name\": \"${THEME_KEBAB}\"/g"
find . -type f -name 'package.json' -not -iwholename './.git/*' -not -iwholename './node_modules/*' -not -iwholename './vendor/*' | xargs sed -i "s/..\/wp-theme-boilerplate ..\/wp-theme-boilerplate\/languages\/wp-theme-boilerplate.pot/..\/${THEME_KEBAB} ..\/${THEME_KEBAB}\/languages\/${THEME_KEBAB}.pot/g"
find . -type f -name 'package.json' -not -iwholename './.git/*' -not -iwholename './node_modules/*' -not -iwholename './vendor/*' | xargs sed -i "s/\"url\": \"https:\/\/github.com\/thingsym\/wp-theme-boilerplate\/issues\"/\"url\": \"\"/g"
find . -type f -name 'package.json' -not -iwholename './.git/*' -not -iwholename './node_modules/*' -not -iwholename './vendor/*' | xargs sed -i "s/\"url\": \"https:\/\/github.com\/thingsym\/wp-theme-boilerplate\"/\"url\": \"\"/g"
find . -type f -name 'package.json' -not -iwholename './.git/*' -not -iwholename './node_modules/*' -not -iwholename './vendor/*' | xargs sed -i "s/\"homepage\": \"https:\/\/github.com\/thingsym\/wp-theme-boilerplate\"/\"homepage\": \"\"/g"
find . -type f -name 'package.json' -not -iwholename './.git/*' -not -iwholename './node_modules/*' -not -iwholename './vendor/*' | xargs sed -i "s/\"description\": \"Next Generation WordPress Theme Starter Kit\"/\"description\": \"\"/g"
find . -type f -name 'package.json' -not -iwholename './.git/*' -not -iwholename './node_modules/*' -not -iwholename './vendor/*' | xargs sed -i "s/\"author\": \"thingsym\"/\"author\": \"\"/g"

echo "Info: Generated a WordPress theme: ${THEME}"

echo "Info: Please manually delete the bin/setup.sh after Theme Starter script execution."
