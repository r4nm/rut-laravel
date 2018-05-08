<html>
    <body>
        <pre>
<b>composer.json</b>
            
...
"autoload": {
    ...
    "psr-4": {
        "Rnm\\\\": "vendor/rnm/src/"
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
    </body>
</html>
