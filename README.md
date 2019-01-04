
     ,-----.,--.                  ,--. ,---.   ,--.,------.  ,------.
    '  .--./|  | ,---. ,--.,--. ,-|  || o   \  |  ||  .-.  \ |  .---'
    |  |    |  || .-. ||  ||  |' .-. |`..'  |  |  ||  |  \  :|  `--, 
    '  '--'\|  |' '-' ''  ''  '\ `-' | .'  /   |  ||  '--'  /|  `---.
     `-----'`--' `---'  `----'  `---'  `--'    `--'`-------' `------'
    ----------------------------------------------------------------- 


## Composer Install

```
composer init

{
    "name": "ebenites/framework-phpleague",
    "description": "Framework MVC con PHPLeague",
    "type": "project",
    "require": {
        "league/container": "^3.2",
        "league/route": "^4.2",
        "illuminate/database": "^5.7",
        "twig/twig": "^2.6",
        "aura/session": "^2.1",
        "zendframework/zend-diactoros": "^1.8",
        "kint-php/kint": "^3.1",
        "vlucas/phpdotenv": "^3.0",
        "jenssegers/blade": "^1.1"
    },
    "autoload": {
        "psr-4": {
            "App\\": "app/"
        }
    },
    "authors": [
        {
            "name": "Erick Benites Cuenca",
            "email": "erick.benites@gmail.com"
        }
    ]
}
    
composer install
```

## Autoload

```
nano composer.json

    "autoload": {
        "psr-4": {
            "App\\": "app/"
        }
    }
    
composer dump-autoload

```

## Database install

```
mysql -u root -p framework_php < database.sql
