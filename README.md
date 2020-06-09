# Documentation

## Setup
### Run XAMPP in Ubuntu

- sudo /etc/init.d/apache2 stop
- sudo /opt/lampp/lampp start

### Copy Project
- Copy folder filmbooks-v2 to htdocs of XAMPP
- File/Open Project/filmbooks-v2 in Apache Netbeans
- Change config database in config.php
- Run script database in folder db if necessary
- Run command __sudo chmod 777 /opt/lampp/htdocs/filmsbook-v2/tmp/cache__ to give permission to write cache (not sure about the security but it works)
- Go to http://localhost/filmsbook-v2/items/viewall in browser for v1
- Go to http://localhost/filmsbook-v2/ in browser for v2

## Framework Structure

- url: yoursite.com/controllerName/actionName/queryString
e.g. if our URL is todo.com/items/view/1/first-item, then
    + Controller is items
    + Model is item (corresponding mysql table)
    + View is delete
    + Action is delete
    + Query String is an array (1,first-item)


## Switch from v1 to v2
- shared.php: use callHook_v2()