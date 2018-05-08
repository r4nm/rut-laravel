composer.json<br>
<br>
...<br>
"autoload": {<br>
        ...<br>
        "psr-4": {<br>
            "Rnm\\\\": "vendor/rnm/src/"
        }
        ...
    }
...
        
config/app.php

...
'providers' => [
    ...
    Rnm\Providers\Rut::class,
    ...
];

'aliases' => [
    ...
    'Rut' => Rnm\Facades\Rut::class,
    ...
];
