<?
use Bitrix\Main\Loader;
use Bitrix\Main\Context;

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

function getCanonical() {
    $domain = (isset($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'];
    return $domain . preg_replace("/\?.*/", "", $_SERVER["REQUEST_URI"]);
}
 
Loader::includeModule('iblock');
AddEventHandler("main", "OnBeforeProlog", "CheckAndRedirect");

function CheckAndRedirect() {
    $request = Context::getCurrent()->getRequest();
    $url = $request->getRequestUri();
    
    $pathParts = explode('/', trim($url, '/'));
    if (empty($pathParts[0])) {
        return;
    }

    $symbolicCode = $pathParts[0];

    $currentDate = new DateTime();
    $compareDate = new DateTime('2025-02-17'); // Дата окончания логики редиректа

    if ($currentDate > $compareDate) return;

    $iblockCode = 'articles';
    $elementFilter = [
        'IBLOCK_CODE' => $iblockCode,
        'CODE' => $symbolicCode,
        'ACTIVE' => 'Y'
    ];

    $element = CIBlockElement::GetList([], $elementFilter, false, ['nTopCount' => 1], ['ID', 'CODE'])->Fetch();

    if ($element) {
        LocalRedirect('/articles/' . $symbolicCode, true, '301 Moved Permanently');
        exit;
    }
}
?>
