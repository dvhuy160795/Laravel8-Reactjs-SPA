#!/bin/sh
PHPCS_PATH=phpcs.phar
PHPCBF_PATH=phpcbf.phar
PHPMD_PATH=phpmd.phar
PRECOMMIT_PATH=../../../.git/hooks/pre-commit

# install phpcs, phpcbf
if [ ! -f $PHPCS_PATH ]; then
  curl -OL https://squizlabs.github.io/PHP_CodeSniffer/phpcs.phar
fi

if [ ! -f $PHPCBF_PATH ]; then
  curl -OL https://squizlabs.github.io/PHP_CodeSniffer/phpcbf.phar
fi

if [ ! -f PHPMD_PATH ]; then
  curl -OL https://phpmd.org/static/latest/phpmd.phar
fi

# copy precommit to .git
cp pre-commit ../../../.git/hooks/
