#!/bin/bash
sudo rm -rf /usr/share/nginx/html/db_final/*
cd ~/Desktop/2023_Learning/LNMP/DB_homework
sudo cp -R * /usr/share/nginx/html/db_final
sudo systemctl restart nginx
sudo nginx -t
sudo ln -s /usr/share/webapps/phpMyAdmin/ /usr/share/nginx/html/db_final
sudo systemctl restart nginx
sudo systemctl restart php-fpm