# Webflix

Voici le projet Laravel.

## Installation

La première étape du projet pour travailler dessus, c'est de cloner le dépôt :

```bash
git clone ...
```

Il faut installer les dépendances :

```bash
composer install
```

Il faut ensuite copier le fichier `.env.example` :

```bash
# Crée le fichier .env
php -r "file_exists('.env') || copy('.env.example', '.env');"
```

N'oublions pas de générer la clé :

```bash
php artisan key:generate
```
