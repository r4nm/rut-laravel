<h2>Configuración</h2>

<b>composer.json</b>

<pre>
...
"autoload": {
    ...
    "psr-4": {
        "Rnm\\": "vendor/rnm/src/"
    }
    ...
}
...
</pre>

<b>config/app.php</b>
<pre>
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
<pre>
#composer dump-autoload
</pre>
