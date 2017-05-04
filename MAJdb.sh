#!/usr/bin/env bash

# schema update
php bin/console doctrine:schema:update --force --no-ansi --dump-sql
php bin/console generate:doctrine:entities AchatCentraleCrmBundle --no-backup
php bin/console generate:doctrine:entities SiteBundle --no-backup
php bin/console doctrine:schema:validate --no-ansi

