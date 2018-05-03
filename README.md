## GraphQL application for KNU Shevchenko

### Install

```
composer install
# change your settings for database

bin/console doctrine:database:create
bin/console doctrine:schema:update --force
bin/console server:run
```
