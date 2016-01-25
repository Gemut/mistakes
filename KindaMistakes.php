<?php
mb_internal_encoding('utf-8');
error_reporting(-1);

$text = "размещение государственного заказа на право заключение государственного контракта на выпoлнение рабoт по комплекснoму благоустрoйству двoрoвой территoрии по адресу: ул.Гурьянoва д.2 к.2 Mission Acomplished";
$link = "http://zakupki.gov.ru/pgz/public/action/orders/info/common_info/show?notificationId=5138013";

echo "Ссылка: $link\n\n";

$split = '/[ \\.\\!\\?]/';
$parts = preg_split($split, $text);

$regexp = '/(([а-яё]+[aopetyhkxcbm]+[а-яё]+[\\w]*)|([а-яё]+[aopetyhkxcbm]+[\\w]*)|([aopetyhkxcbm]+[а-яё]+[\\w]*))+/ui';

foreach ($parts as $mis) {
	if (preg_match($regexp,$mis)) {
		$change = '/([aopetyhkxcbm])/u';
		$mis1 = preg_replace($change, '[$1]', $mis);
		echo "Ошибка в слове \"$mis\": $mis1\n";
	}
}

?>