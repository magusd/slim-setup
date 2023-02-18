# Slim

**A minimal skeleton for bootstrapping PHP projects**

_This project is a work in progress._

---

### Features:

#### 🔋 Included batteries:

```
- Slim Framework
- Doctrine ORM
- PHPUnit
- Docker support (PHP-FPM + Nginx)
- Dependency injection with PHP-DI
- Environment variables support
```

#### 👷 Currently working on:

```
- Service container
- Database for Docker
```

#### ⏳ Roadmap:

```
- Middlewares
- JWT authentication
```

---

### Instructions:

```bash
git clone git@github.com:davisenra/slim-setup.git
cd slim-setup
cp .env.example .env
docker-compose up -d
docker-compose exec php-fpm composer install

open http://localhost:8080
```
