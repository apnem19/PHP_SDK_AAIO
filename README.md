
require_once "vendor/autoload.php";<br>
<br>
//Создание платежа<br>
use Kvash\Aaio\Create;<br>
<br>
$url = new Create($merchatid, $orderid, $amount, $secretkey1, $currency, $lang);<br>
<br>
$url->getUrl(); // Готовая ссылка на оплату<br>
<br>
//Проверка подписи<br>
use Kvash\Aaio\Webhook;<br>
<br>
$url = new WebHook($_POST['merchant_id'], $_POST['order_id'], $_POST['amount'], $secretkey2, $_POST['sign'], $_POST['currency']);<br>
<br>
if($url->check() === false){<br>
    die("error sign");<br>
}<br>
<br>
//Оплата прошла успешно, можно проводить операцию.<br>
