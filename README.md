T9-PHP-ELASTICSEARCH
====================

About
-----

Show suggestions from a dictionary file in php.
Elasticseach-php is used as the base search engine to index and operate researchs.
The dictionary file used, come from AdamBom https://github.com/adambom/dictionary/blob/master/dictionary.json.

t9-php-elasticsearch helps you search quickly on huge documents.


Requirements
------------

Require PHP version 5.4 or greater and Mysql 5 or greater.


Installation
------------

1. Put t9-php-elasticsearch on your server and target Apache root directory to the "web" folder.

2. Apply chmod 0755 to all the project.

3. Ensure you have Elasticsearch installed and running on your machine. 

4. Install dependencies
```
    php composer.phar run
```

5. Populate the dictionary into Elasticsearch
```
    cd web
    php index.php populate
```

6. The dictionary is very huge, please wait for a little moment

7. target the browser to simulate T9 with the virtual keybord in html
```
    http://localhost/index.html
```

Contributing
-------------

If you want to help me improve this bundle, please make sure it conforms to the PSR coding standard. The easiest way to contribute is to work on a checkout of the repository, or your own fork, rather than an installed version.



Issues
------

Bug reports and feature requests can be submitted on the [Github issues tracker](https://github.com/edouardkombo/t9-php-elasticsearch/issues).

For further informations, contact me directly at edouard.kombo@gmail.com.
