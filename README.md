# Structures de données

## Installation

```sh
composer install
```

## Utilisation

Exemple de code dans `index.php`

```php
<?php

require_once __DIR__.'/vendor/autoload.php';

use Opmvpc\StructuresDonnees\Lists\Collection;

$collection = new Collection();

$collection->push(1);
$collection->push(2);
```

Lancer le fichier `index.php`

```sh
php index.php
```

## Tests

```sh
composer test
```
