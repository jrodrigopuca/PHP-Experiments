lsof -ti:8080 | xargs kill -9
php -S 127.0.0.1:8080 -t ./
