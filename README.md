# Simple Content
This for website with simple content

##Installation
Add `"rofil/simple-content": "dev-master"` into composer.json as follows
```
...
    "requires": {
        ...
        "rofil/simple-content": "dev-master"
        ...
    }
...
```
and update by running `composer update`
##Register
Register the bundle in app/AppKernel.php as follow:
```
...
    new Rofil\Simple\ContentBundle\RofilSimpleContentBundle(),
...
```
##Routing
Update routing.yml|xml by addin following code:
```
...
rofil_simple_content:
    resource: "@RofilSimpleContentBundle/Controller/"
    type:     annotation
    prefix:   /
...
```
##Update Database schema
Update database schema by running symfony command `php app/console doctrine:schema:update --force`
##Security
Adding access control in security.yml as follows:
```
...
    access_control:
        ...
        - { path: ^/manage/information, roles: ROLE_MANAGER }
        - { path: ^/manage/news, roles: ROLE_MANAGER }
        ...
...
```