## Start docker

```bash
docker-compose up
```

## first run

composer install
php artisan key:generate
copy .env.example .env

### PHP container access

```
docker-compose exec app sh
composer install
php artisan migrate:fresh --seed
```

### Build Breeze
```shell
npm install
npm run dev
# for production mode use npm run build
```
