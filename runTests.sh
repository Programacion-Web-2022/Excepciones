docker run -d --rm --name dbTest -p 3306:3306 -e MYSQL_ROOT_PASSWORD=1234 -e MYSQL_DATABASE=unitTest mysql:5.7
sleep 10
mysql -u root -p1234 -h 127.0.0.1 unitTest < db.sql
cd Tests
../vendor/bin/phpunit UserTest.php
../vendor/bin/phpunit EjemploTest.php
docker rm -f dbTest