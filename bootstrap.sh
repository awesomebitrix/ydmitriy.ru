#!/usr/bin/env bash

#   settings

PASSWORD='root'
PROJECT='ydmitriy.ru'

#   update

sudo apt-get update

#   apache2 and php5 with modules
sudo apt-get install -y apache2
sudo apt-get install -y php5
sudo apt-get install -y libapache2-mod-php5 php5-mcrypt php5-cgi php5-common php5-curl php5-dbg php5-gd

#   mysql

sudo debconf-set-selections <<< "mysql-server mysql-server/root_password password $PASSWORD"
sudo debconf-set-selections <<< "mysql-server mysql-server/root_password_again password $PASSWORD"
sudo apt-get -y install mysql-server
sudo apt-get install php5-mysql

#   phpmyadmin
sudo debconf-set-selections <<< "phpmyadmin phpmyadmin/dbconfig-install boolean true"
sudo debconf-set-selections <<< "phpmyadmin phpmyadmin/app-password-confirm password $PASSWORD"
sudo debconf-set-selections <<< "phpmyadmin phpmyadmin/mysql/admin-pass password $PASSWORD"
sudo debconf-set-selections <<< "phpmyadmin phpmyadmin/mysql/app-pass password $PASSWORD"
sudo debconf-set-selections <<< "phpmyadmin phpmyadmin/reconfigure-webserver multiselect apache2"
sudo apt-get -y install phpmyadmin

#   another apps
sudo apt-get install mc
sudo apt-get install vboxsf

#   vagrant root as www root

if ! [ -L /var/www ]; then
  sudo rm -rf /var/www
  sudo ln -fs /vagrant /var/www
fi