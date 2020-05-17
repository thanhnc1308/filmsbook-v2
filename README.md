# Documentation

## Setup
### Run XAMPP in Ubuntu

sudo /etc/init.d/apache2 stop
sudo /opt/lampp/lampp start

### Copy Project
- Copy folder filmbooks-v2 to htdocs of XAMPP
- File/Open Project/filmbooks-v2 in Apache Netbeans
- Change config database in config.php
- Run script database in folder db if necessary
- Go to http://localhost/filmsbook-v2/items/viewall in browser

## Framework Structure

url: yoursite.com/controllerName/actionName/queryString
e.g. if our URL is todo.com/items/view/1/first-item, then
Controller is items
Model is item (corresponding mysql table)
View is delete
Action is delete
Query String is an array (1,first-item)