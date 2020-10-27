<?
$link='https://brhknwpvnpewivnw.xyz/redirect-merchant-1/?flow=616&amount=';
$postdata = json_decode(file_get_contents("php://input")); 
//print_r($postdata);

$resp = array(
"result" =>1,

"time" =>time(),
"msg" => 'Спасибо! Ваша заявка отправлена. В ближайшее время мы с Вами свяжемся!',
);


if($postdata->items){
	$summ=0;
	foreach($postdata->items as $key=>$value){
		$summ += $value[1]->value * $value[3]->value;
	}
	$url = $link.$summ;
	$resp["url"] = $url;
}

if($postdata->fields[0]->value){
	echo json_encode($resp);
	//echo '{"result":1,"url2":"http://google.ru","time":1566844412,"msg":"\u0421\u043f\u0430\u0441\u0438\u0431\u043e! \u0412\u0430\u0448\u0430 \u0437\u0430\u044f\u0432\u043a\u0430 \u043e\u0442\u043f\u0440\u0430\u0432\u043b\u0435\u043d\u0430. \u0412 \u0431\u043b\u0438\u0436\u0430\u0439\u0448\u0435\u0435 \u0432\u0440\u0435\u043c\u044f \u043c\u044b \u0441 \u0412\u0430\u043c\u0438 \u0441\u0432\u044f\u0436\u0435\u043c\u0441\u044f!"}';
}
else{
	echo'{"result":2,"msg":"\u041d\u0435\u0432\u043e\u0437\u043c\u043e\u0436\u043d\u043e \u043e\u0442\u043f\u0440\u0430\u0432\u0438\u0442\u044c \u0437\u0430\u044f\u0432\u043a\u0443 \u0441 \u043f\u0443\u0441\u0442\u044b\u043c\u0438 \u043f\u043e\u043b\u044f\u043c\u0438!"}';
}

?>