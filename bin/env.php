#!/usr/bin/env php
<?php
/**
 * Env checker
 *
 * usage: $ php bin/env.php;
 */
$ok = '[OK] ';
$ng = '[NG] ';

echo '# Required' . PHP_EOL;
$isPhpVersionOk = version_compare(phpversion(), '5.4', '>=') ? $ok : $ng;
echo "{$isPhpVersionOk}PHP: " . phpversion() . PHP_EOL;
$installedJson = dirname(__DIR__) . '/vendor/composer/installed.json';
var_dump($installedJson);
