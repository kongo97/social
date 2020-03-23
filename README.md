# Social

Social is the basis for the development of your personal social network

## Install

Locate on the root project folder
```
cd /your-path/social/src/L58/
```

Build the current project and run it:

```
docker build -t social .
docker run -d --rm -p 8000:8000 -v "$PWD":/var/www/html --name social-run social
docker exec -it social-run bash
```
Update your machine (we need ifconfig command)
```
apt-get update
apt-get install net-tools
```

Get local ip
```
ifconfig
```

Edit .env.dev file with personal data and remove '.dev'
```
mv .env.dev ./.env
```

Run project (docker shell)
```
composer install
php artisan key:generate
php artisan migrate:refresh --seed
php artisan serve --host 0.0.0.0
```

Open this URL http://localhost:8000


Check the result and if ok stop the container  (out of docker shell)
```
docker stop running
```