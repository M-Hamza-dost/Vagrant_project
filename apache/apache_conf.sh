#!/bin/bash

echo "---------------------- INSTALLING APACHE2----------------------"
sudo apt-get install -y apache2
sudo chown -R vagrant:vagrant /var/www/html
sudo rm /var/www/html/index.html
sudo service apache2 restart
echo "---------------------- DONE --------------------------"
