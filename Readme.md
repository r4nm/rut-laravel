composer.json<br>
<br>
...<br>
"autoload": {<br>
        ...<br>
        "psr-4": {<br>
            "Rnm\\\\": "vendor/rnm/src/"<br>
        }<br>
        ...<br>
    }<br>
...<br>
        
config/app.php<br>
<br>
...<br>
'providers' => [<br>
    ...<br>
    Rnm\Providers\Rut::class,<br>
    ...<br>
];<br>

'aliases' => [<br>
    ...<br>
    'Rut' => Rnm\Facades\Rut::class,<br>
    ...<br>
];<br>
