<?php
/* Google翻译PHP接口
 * 官成文 2009-03-8
 * http://blog.csdn.net/aprin/
 * 注意：如果翻译文本为UTF-8编码，则要删去mb_convert_encoding函数
 */
 
class Google_API_translator {
public $url = "http://translate.google.com/translate_t";
public $text = "";//翻译文本
public $out = ""; //翻译输出 
 
function setText($text){
 $this->text = $text;
 } 
 
function translate() {
 $this->out = ""; 
 
$gphtml = $this->postPage($this->url, $this->text); 
 
//提取翻译结果
$out = substr($gphtml, strpos($gphtml, " "));
 $out = substr($out, 29);
 $out = substr($out, 0, strpos($out, " ")); 
 
$this->out = $out;
 return $this->out;
 } 
 
function postPage($url, $text) {
 $html =''; 
 
if($url != "" && $text != "") {
 $ch = curl_init($url);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 curl_setopt($ch, CURLOPT_HEADER, 1);
 curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
 curl_setopt($ch, CURLOPT_TIMEOUT, 15); 
 
/*
 *hl – 界面语言，此处无用。
*langpair – src lang to dest lang
 *ie – urlencode的编码方式?
 *text – 要翻译的文本
*/
 $fields = array('hl=zh-CN', 'langpair=zh-CN|en', 'ie=UTF-8','text='.urlencode(mb_convert_encoding($text, 'UTF-8','GB2312')));
 curl_setopt($ch, CURLOPT_POST, 1);
 curl_setopt($ch, CURLOPT_POSTFIELDS, implode('&', $fields)); 
 
$html = curl_exec($ch);
 if(curl_errno($ch)) $html = "";
curl_close ($ch);
 }
 return $html;
 }
 } 
 
//just for test
 $g = new Google_API_translator();
 $g->setText("我爱Java！");
 $g->translate();
 echo $g->out;
 ?> 
