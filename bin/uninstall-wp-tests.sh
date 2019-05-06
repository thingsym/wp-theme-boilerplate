#!/usr/bin/env bash

if [ $# -lt 3 ]; then
	echo "usage: $0 <db-name> <db-user> <db-pass> [wp-version]"
	exit 1
fi

DB_NAME=$1
DB_USER=$2
DB_PASS=$3
WP_VERSION=${4-latest}

TMPDIR=${TMPDIR-/tmp}
TMPDIR=$(echo $TMPDIR | sed -e "s/\/$//")
WP_TESTS_DIR=${WP_TESTS_DIR-$TMPDIR/wordpress-tests-lib}
WP_CORE_DIR=${WP_CORE_DIR-$TMPDIR/wordpress/}

delete_wp() {
	if [[ $WP_VERSION == 'nightly' || $WP_VERSION == 'trunk' ]]; then
		if [ -f $TMPDIR/wordpress-nightly/wordpress-nightly.zip ]; then
			rm $TMPDIR/wordpress-nightly/wordpress-nightly.zip
		fi
	else
		if [ -f $TMPDIR/wordpress.tar.gz ]; then
			rm $TMPDIR/wordpress.tar.gz
		fi
	fi

	if [ -d $WP_CORE_DIR ]; then
		rm -rf $WP_CORE_DIR
	fi
}

delete_test_suite() {
	if [ -d $WP_TESTS_DIR ]; then
		rm -rf $WP_TESTS_DIR
	fi
}

drop_db() {
	mysqladmin drop $DB_NAME --user="$DB_USER" --password="$DB_PASS"
}

delete_wp
delete_test_suite
drop_db
