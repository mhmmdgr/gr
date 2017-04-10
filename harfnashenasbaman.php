<?php
ob_start();
/*
─═ঊঈঊঈ═─╮
Developer : mohammadhosseinheidari
Dev ID : @NOBLEST
Channel ID : @harfnashenasbeman
Github Addres : github.com/NobLestDev/harfnashenasbeman
─═ঊঈঊঈ═─╯
*/
define('API_KEY','توکن');
//-----------------------------------------------------------------------------------------
//فانکشن MrPHPBot :
function MrPHPBot($method,$datas=[]){
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
//-----------------------------------------------------------------------------------------
//متغیر ها :
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$from_id = $message->from->id;
mkdir("data/$from_id");
$chat_id = $message->chat->id;
$message_id = $message->message_id;
$first_name = $message->from->first_name;
$last_name = $message->from->last_name;
$username = $message->from->username;
mkdir("data/$username");
$textmassage = $message->text;
$step= file_get_contents("data/$from_id/file.txt");
$Dev = 193930120;
$txtt = file_get_contents('data/users.txt');
$ban = file_get_contents('data/banlist.txt');
$chatha = file_get_contents("data/chatlist.txt");
$chat = file_get_contents("data/chat.txt");
$banlist = file_get_contents("data/banlist.txt");
$member = file_get_contents("data/member.txt");
//-----------------------------------------------------------------------------------------
//فانکشن ها : 
function SendMessage($chat_id, $text){
MrPHPBot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>$text,
'parse_mode'=>'MarkDown']);
}
function save($filename, $data)
{
$file = fopen($filename, 'w');
fwrite($file, $data);
fclose($file);
}
function sendAction($chat_id, $action){
MrPHPBot('sendChataction',[
'chat_id'=>$chat_id,
'action'=>$action]);
}
function Forward($berekoja,$azchejaei,$kodompayam)
{
MrPHPBot('ForwardMessage',[
'chat_id'=>$berekoja,
'from_chat_id'=>$azchejaei,
'message_id'=>$kodompayam
]);
}
//-----------------------------------------------------------------------------------------
if($textmassage=="/start"){
  sendAction($chat_id, 'typing');
save("data/$username/$username.txt","$from_id");
	MrPHPBot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"سلام ".$first_name." 😉\nشما در برنامه حرف به من عضو شدیدحالامیتونی با دریافت لینک خودوبادادن اون لینک به دوستات بتونی انتقادهای ان ها از خودت دریافت کنیخب یکی از دکمه هاروانتخاب کن دوست من :",
  'parse_mode'=>'MarkDown',
	'reply_markup'=>json_encode([
	'resize_keyboard'=>true,
	'keyboard'=>[
	[
	['text'=>"لینک من برای دریافت پیام ناشناس 📩"]
	],
        [
	['text'=>"تنظیمات ⚙️"],['text'=>"راهنما ⁉️"],
	],
	]
	])
	]);
	}
elseif (strpos($create , "$from_id") !== false  ) {
  SendMessage($chat_id,"");
 }elseif($textmassage=="برگشت 🔙"){
  sendAction($chat_id, 'typing');
  save("data/$from_id/file.txt","none");
	MrPHPBot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"برگشتیم :",
  'parse_mode'=>'MarkDown',
	'reply_markup'=>json_encode([
	'resize_keyboard'=>true,
	'keyboard'=>[
	[
	['text'=>"لینک من برای دریافت پیام ناشناس 📩"]
	],
        [
	['text'=>"تنظیمات ⚙️"],['text'=>"راهنما ⁉️"],
	],
	]
	])
	]);
	}elseif($textmassage=="لینک من برای دریافت پیام ناشناس 📩"){
SendMessage($chat_id,"متن پایین رو به دوستانتون و گروه‌هایی که می‌شناسید فوروارد کنید تا بتونن براتون پیام ناشناس بفرستن. پیام‌ها از طریق همین برنامه به شما می‌رسه.
👇👇👇👇👇");
  sendAction($chat_id, 'typing');
	MrPHPBot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"سلام $first_name هستم 😉
روی لینک زیر کلیک کن و هر انتقادی که نسبت به من داری یا اعتراف و حرفی که تو دلت هست رو با خیال راحت بنویس و بفرست. بدون اینکه از اسمت باخبر بشم متنت به من می‌رسه. خودتم می‌تونی امتحان کنی و از همه بخوای راحت و ناشناس بهت پیام بفرستن، حرفای خیلی جالبی می‌شنوی.

👇👇👇👇👇
https://telegram.me/harfnashenasbemanbot?start=$username\n➖➖➖\nنکته اگر لینک شما کامل نشد باید برای تلگرام خود یوزرنیم انتخاب کنید.",
  'parse_mode'=>'MarkDown',
	'reply_markup'=>json_encode([
	'resize_keyboard'=>true,
	'keyboard'=>[
	[
	['text'=>"برگشت 🔙"]
	],
	]
	])
	]);
	}elseif(strpos($textmassage,'/start') !== false) {
  $id = str_replace("/start ","",$textmassage);
$mos = file_get_contents("data/$id/$id.txt");
save("data/$from_id/text.txt","$mos");
save("data/$from_id/file.txt","payam");
MrPHPBot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"سلام
شما در حال نوشتن پیام به $id هستید. می‌تونید نقد یا هر حرفی که تو دلتون هست رو بنویسید چون پیام شما به صورت ناشناس ارسال می‌شه.

بعد از ارسال می‌تونید با زدن دستور /start لینک اختصاصی خودتون رو بگیرید تا بقیه بتونند در مورد شما نظر بدن و براتون متن ناشناس بفرستن.
دقت داشته باشید که باید کل متن رو در یک پیام بفرستید نه چند پیام پشت سر هم.

تاکید می‌کنیم که ارسال پیام تبلیغاتی، تکراری یا پیام‌هایی حاوی توهین به عقاید، یا با مضامین جنسی و تهدید از طریق این برنامه ممنوعه و در صورتی که پیامی با این محتوا دریافت کردید، می‌تونید از گزینه گزارش تخلف استفاده کنید. در صورتی که کاربر بیش از 5 بار گزارش بشه، به طور کامل از استفاده از برنامه محروم می‌شه.




متن مورد نظر خود را بنویسید و ارسال کنید.
لطفا سعی کنید در یک پست همه حرفهای خودتون رو بگید.
👇👇👇",
  'parse_mode'=>'MarkDown',
	'reply_markup'=>json_encode([
	'resize_keyboard'=>true,
	'keyboard'=>[
	[
	['text'=>"برگشت 🔙"]
	],
	]
	])
	]);
	}
          elseif ($step == 'payam') {
          $payam = $textmassage;
          $mo = file_get_contents("data/$from_id/text.txt");
          SendMessage($mo,"$payam");
          SendMessage($chat_id,"پیغام شما با موفقیت ارسال شد.");
      }
elseif($textmassage=="راهنما ⁉️"){
  sendAction($chat_id, 'typing');
	MrPHPBot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"«پیام ناشناس» یه برنامه محبوب و هیجان‌انگیز در تلگرامه که باهاش می‌تونید به دوستان و اشناهاتون اجازه بدید هر انتقادی به شما دارند یا حرفی تو دلشون مونده به صورت ناشناس بهتون بگن.
قوانین :
از به کاربردن کلمات زشت و ناپسند در متن خود پرهیز کنید 
از به کاربردن صحبت سیاسی پرهیز کنید
از توهین به ادیان شدیدا خودداری کنید
برنامه حرف به من هیچ مسولیتی در قبال رد وبدل شدن پیام ها ندارد
ولی ما درصورت مشاهده شکایت یک فرد ازیک پیام تمام اطلاعات را در اختیارمراجعه قانونی میگزاریم.
هرکس که در ربات برخلاف قوانین عمل کنند
برای همیشه از برنامه مسدود میشود.
باتشکرازشما تیم مدیریتی برنامه حرف به من\nاین سورس توسط محمدحسین حیدری نوشته شده است\nارتباط با برنامه نویس:\n@NOBLEST\n@NOBLESTBOT",
  'parse_mode'=>'MarkDown',
	'reply_markup'=>json_encode([
	'resize_keyboard'=>true,
	'keyboard'=>[
	[
	['text'=>"برگشت 🔙"]
	],
	]
	])
	]);
	}elseif($textmassage=="تنظیمات ⚙️"){
  sendAction($chat_id, 'typing');
	MrPHPBot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"یک دکمه رو انتخاب کن :",
  'parse_mode'=>'MarkDown',
	'reply_markup'=>json_encode([
	'resize_keyboard'=>true,
	'keyboard'=>[
        [
	['text'=>"قطع سرویس 📵"],['text'=>"راه اندازی سرویس 🔃"]
	],
	[
	['text'=>"برگشت 🔙"]
	],
	]
	])
	]);
	}elseif($textmassage=="قطع سرویس 📵"){
  sendAction($chat_id, 'typing');
unlink("data/$username/$username.txt");
	MrPHPBot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"سرویس قطع شد.",
  'parse_mode'=>'MarkDown',
	'reply_markup'=>json_encode([
	'resize_keyboard'=>true,
	'keyboard'=>[
	[
	['text'=>"برگشت 🔙"]
	],
	]
	])
	]);
	}elseif($textmassage=="راه اندازی سرویس 🔃"){
  sendAction($chat_id, 'typing');
save("data/$username/$username.txt","$from_id");
	MrPHPBot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"سرویس مجددا راه اندازی شد.",
  'parse_mode'=>'MarkDown',
	'reply_markup'=>json_encode([
	'resize_keyboard'=>true,
	'keyboard'=>[
	[
	['text'=>"برگشت 🔙"]
	],
	]
	])
	]);
	}$users = file_get_contents('data/username.txt');
$members = explode("\n", $users);
if (!in_array($username, $members)) {
    $adduser = file_get_contents('data/username.txt');
    $adduser .=$username . "\n";
    file_put_contents('data/username.txt', $adduser);
}$users = file_get_contents('data/users.txt');
$members = explode("\n", $users);
if (!in_array($chat_id, $members)) {
    $adduser = file_get_contents('data/users.txt');
    $adduser .= $chat_id . "\n";
    file_put_contents('data/users.txt', $adduser);
}elseif($textmassage=="آمار ربات"){
                        $membersidd= explode("\n",$txtt);
                        $mmemcount = count($membersidd) -1;
                        sendAction($chat_id, 'typing');
				MrPHPBot('sendmessage',[
		'chat_id'=>$chat_id,
		'text'=>"تعداد کاربران : $mmemcount",
                'hide_keyboard'=>true,
		]);
		}elseif ($textmassage == 'ارسال به همه' && $from_id == $Dev) {
save("data/$from_id/file.txt","sendtoall");
         MrPHPBot('sendmessage',[
        	'chat_id'=>$Dev,
        	'text'=>"لطفا متن خود را بفرستید :",
		'parse_mode'=>'MarkDown',
    		]);
}elseif ($step == 'sendtoall') {
$mem = fopen( "data/users.txt", 'r');
    while( !feof( $mem)) {
    $memuser = fgets( $mem);
save("data/$from_id/file.txt","to");
     MrPHPBot('sendmessage',[
          'chat_id'=>$memuser,
          'text'=>$textmassage,
    'parse_mode'=>'MarkDown'
        ]);
    }
}     
?>