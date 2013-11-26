# DoctrineTestcase

Demonstrates a problem encountered when using a Doctrine Criteria object to filter a PersistentCollection; the required Criteria specification differs when the collection has been hydrated before the criteria is applied and when the collection will be hydrated by the application of a Criteria to PersistentCollection::matching.

If the entities have been hydrated the field names must be in camel case otherwise they must be underscore seperated.

## To Test

Install dependancies

    $ composer install

Create user and database, update config in app/config/parameters.yml

    $ app/console doctrine:database:create
    $ app/console doctrine:schema:update --force
    $ app/console app/console doctrine:fixtures:load

Visit these URLs to view the results of the matrix of possibilities between hydrated/non-hydrated entities and camel case/underscore separated fields.

    http://localhost/app_dev.php/hydrated_working
    http://localhost/app_dev.php/hydrated_not_working
    http://localhost/app_dev.php/non_hydrated_working
    http://localhost/app_dev.php/non_hydrated_not_working
