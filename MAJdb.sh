#!/usr/bin/env bash

# schema update
php bin/console doctrine:schema:validate
php bin/console doctrine:schema:update --force