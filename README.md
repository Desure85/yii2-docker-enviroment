Yii 2 Docker Test Enviroment(with php_rdkafka)
===============================

1. Clone/Upload
2. Run #docker-compose up -d and wait until the deploy is complete
3. Enter in php container #docker exec -it [container-name] bash
4. Run in container #php composer.phar update
5. Wait for the token to be entered and enter it
6. Wait until the composer finishes
7. Run #php yii migrate/up
8. Run #php yii migrate --migrationPath=@yii/rbac/migrations
9. Run #php yii rbac/init

The application is available at 127.0.0.1:80
