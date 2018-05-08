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

<h2>Ejemplos</h2>

<pre>
    <h4>Validación de un rut</h4>
    \Rut::isValid('999999999');          /* true */
    <h4>Calcular digito verificador</h4>
    \Rut::calcCheckDigit('99999999');    /* 9 */
    <h4>Dar formato al rut</h4>
    \Rut::format('999999999');           /* 99.999.999-9 */
</pre>
