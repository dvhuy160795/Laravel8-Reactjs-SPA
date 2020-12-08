#!/bin/sh
PHPCS_PATH=phpcs.phar
PHPCBF_PATH=phpcbf.phar
PRECOMMIT_PATH=../../../.git/hooks/pre-commit

# install phpcs, phpcbf
if [ ! -f $PHPCS_PATH ]; then
  curl -OL https://squizlabs.github.io/PHP_CodeSniffer/phpcs.phar
fi

if [ ! -f $PHPCBF_PATH ]; then
  curl -OL https://squizlabs.github.io/PHP_CodeSniffer/phpcbf.phar
fi

# copy precommit to .git
cp pre-commit ../../../.git/hooks/
