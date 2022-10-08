<?php
ob_start();
$API_KEY = '5468888704:AAHrnvNEuaGRsANsRWhs8mHutOJyum_8reQ'; #توكن البوت
define('API_KEY',$API_KEY);
echo file_get_contents("https://api.telegram.org/bot$API_KEY/setwebhook?url=".$_SERVER['SERVER_NAME']."".$_SERVER['SCRIPT_NAME']);
function bot($method,$datas=[]){
$url = "https://api.telegram.org/bot".API_KEY."/".$method;
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
$res = curl_exec($ch);
if(curl_error($ch)){
var_dump(curl_error($ch));
}else{
return json_decode($res);
}
}
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$chat_id2 = $update->callback_query->message->chat->id;
$message_id2 = $update->callback_query->message->message_id;
$data = $update->callback_query->data;
$id = $message->from->id;
$text = $message->text;
$chat_id = $message->chat->id;
$user = $message->from->username;
$message = $update->message;
$chat_id = $message->chat->id;
$text = $message->text;
$chat_id2 = $update->callback_query->message->chat->id;
$message_id = $update->callback_query->message->message_id;
$data = $update->callback_query->data;
$name = $update->message->from->first_name;
$from_id = $update->message->from->id;
 

$img = "https://t.me/SOURCEBADRY/16";
if($text !== "/start"){
$Api = json_decode(file_get_contents("http://spam-gmail.moelshafey.repl.co/?email=$text"), true);
$status = $Api["status"];
bot('sendphoto',[
'chat_id'=>$chat_id,
'photo'=>$img,
'caption'=>" - نتيجه الاسبام  :  $status -
", 
'reply_to_message_id'=>$message->message_id,
]);
}
