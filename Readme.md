<pre>

<h2>Configuracion</h2>

<b>composer.json</b>
            
...
"autoload": {
    ...
    "psr-4": {
        "Rnm\\": "vendor/rnm/src/"
    }
    ...
}
...

<b>config/app.php</b>

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
</pre>

<b>En linea de comandos</b>

#composer dump-autoload
