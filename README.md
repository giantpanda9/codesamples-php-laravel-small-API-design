# codesamples-php-laravel-small-API-design
PHP 7.2 Laravel API design
# Description
This project is implemented using Laravel as basis so the file must be copied into corresponding directory created as a Laravel project with the file contents update
# Purposes
To demonstrate ability to create own APIs using the Laravel framework and api.php routing file
# Requirements
1. PHP 7.2
2. Laravel (the latest version being installed from Ubuntu 18.04 repositories)
3. Ubuntu 18.04
# Installation instructions (approximate, not the last ones to follow):
1. Ubuntu mini.iso installed without any components in VirtualBox is required
2. Please set Adapter 1 in VirtualBox Guest settings to NAT value, and Adapter 2 to Network Bridge value
3. Set port redirection for Adapter one as follows(Name, Protocol, Host Address, Host port, Guest Address, Guest Port)
A. SSH, TCP, 127.0.0.1, 2222, , 22
B. WWW, TCP, , 8080, , 80
4 Need to isntall SSH server inside VirtualBox Guest to access console (sudo apt-get install openssh-server)
5 sudo apt-get update
6 sudo apt-get upgrade
7 sudo apt-get install software-properties-common (on some distros could be sudo apt-get install software-properties-common python-software-properties)
8 sudo add-apt-repository ppa:ondrej/php
9 sudo apt install php-7.2
10. sudo apt-get install php7.2-mysql php7.2-soap (for proper PHP 7.2 installetion on Ubuntu 18.04 - technically not required for the project to work)
11. sudo pecl channel-update pecl.php.net
12. sudo pecl install mcrypt-1.0.1 (required for Laravel to work properly)
13. [May not be required] sudo nano /etc/php/7.2/cli/php.ini and then add extension=mcrypt.so and extension=zip.so to the list of extensions
14. Install composer by the point 14A-14D or by point 15 (on some distros work either the first or the second):
A. php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
B. php -r "if (hash_file('sha384', 'composer-setup.php') === '8a6138e2a05a8c28539c9f0fb361159823655d7ad2deecb371b04a83966c61223adc522b0189079e3e9e277cd72b8897') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
C. php composer-setup.php
D. php -r "unlink('composer-setup.php');"
15. sudo apt-get install php7.2-zip and edit the php.ini to add zip extension if needed (see above point 13)
16. sudo apt install composer
17. composer global require laravel/installer
18. sudo apt-get install php7.2-mbstring
19. sudo composer create-project --prefer-dist laravel/laravel test1 in the directory you wish to store your laravel project
20. copy the test1 dir from the GitHub project to the laravel project directory you have created in point 19 with overwriting (cp test1(from github) to test1(on your localhost))
21. cd /path/to/test1/
22. [optional] sudo apt-get install net-tools , ifconfig and check address on the Network Bridge net card
23. [optional, if installed] sudo service apache2 stop as it will use the port 80 we want to use for artisan
24. sudo php artisan serve --host=<ip_address_from_point 22>  --port=80
25. [if you wish to test in guest os] sudo apt-get install lynx and lynx http://127.0.0.1:80
# How to run?
1. on your Host OS, in browser, please populate address line as follows:
2. http://127.0.0.1:8080/api/getbooks/
3. http://127.0.0.1:8080/api/getbooks/<Name of the Author> (for example: http://127.0.0.1:8080/api/getbooks/Frank%20Herbert)
to see the result for a given author

# Sources:
1. https://laravel.com/docs/4.2/quick
2. https://www.twilio.com/blog/building-and-consuming-a-restful-api-in-laravel-php

  
