<?
CModule::AddAutoloadClasses("", array(
    '\Bas\Pict' => '/local/php_interface/toWebp.php',
));
require_once('site.php');
getInfoSite();

function dump($var)
{
    global $USER;
    if ($USER->isAdmin()) {
        echo '<pre>';
        var_dump($var);
        echo '</pre>';
    }
}
