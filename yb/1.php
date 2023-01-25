<?php

function ybwmEncrypt($data, $key)
{
    $key    =   md5($key);
    $x      =   0;
    $len    =   strlen($data);
    $l      =   strlen($key);
    $char='';
    for ($i = 0; $i < $len; $i++)
    {
        if ($x == $l)
        {
            $x = 0;
        }
        $char .= $key{$x};
        $x++;
    }
    $str='';
    for ($i = 0; $i < $len; $i++)
    {
        $str .= chr(ord($data[$i]) + (ord($char[$i])) % 256);
    }
    return base64_encode($str);
}
function ybwmDecrypt($data, $key)
{
    $key = md5($key);
    $x = 0;
    $data = base64_decode($data);
    $len = strlen($data);
    $l = strlen($key);
    $char='';
    for ($i = 0; $i < $len; $i++)
    {
        if ($x == $l)
        {
            $x = 0;
        }
        $char .= substr($key, $x, 1);
        $x++;
    }
    $str='';
    for ($i = 0; $i < $len; $i++)
    {
        if (ord(substr($data, $i, 1)) < ord(substr($char, $i, 1)))
        {
            $str .= chr((ord(substr($data, $i, 1)) + 256) - ord(substr($char, $i, 1)));
        }
        else
        {
            $str .= chr(ord(substr($data, $i, 1)) - ord(substr($char, $i, 1)));
        }
    }
    return $str;
}
$domainUrl = $_GET['h'];
 if(empty($domainUrl)){
     exit;
 }
$key = "yb_ps";
 $data = "q1TazJ7Jj6bXxNPZhW1VlJGWYF2TaZJjbFmXZqBrZptgZoiPU9iZoMjCxtPHVW2Ek5RiYY9ol15ob4ZjmnNil2pimoVdhqSc0MjA2dyjmISblVxSxqbSkp+nxafYpVKbUqLZkZORm5iRxs+Hj1WX0c7FmZ7Bpcaem1ugVMKuZMZpY8LYachhl7/Yl8uUZ4/XmJ1jkb6snJKacoheiKmY0J6XiJ1TlWVplZaanJxrZZKDkFKR16vNkJmoypeIc1KzdHfAtV63en+4so6/vXmFpo6teHS1j4ddWKzak9quo4NqY5KFkseTotjR1cTXrKPHg55hXISYyJSlrtSmxaelzpKX2IVrlWBfhczFh51ka5uNhqOV1K3OlJuY2qvWnlKbUo7bmGaYZo/Yl8aWxI+omJScaIzXbZxlaZXbaZhtaINcVMfYpcx0lNfEg5/eVZbKwtKelc5Zn4xYps+gz1uNjVKi0tiYhmqOwI+D2MilqcvEyVJqvVnGoaZbw6+SW5HRoIDH0JaGalW/2JqWl5eP15qUYGG+rJySm5+Irw==";
  $str =  json_decode(ybwmDecrypt($data, $key));
   $str =  json_decode(ybwmDecrypt($data, $key));
 $str->domain_url = $domainUrl;
 $str->domain_name = "云贝配送端";
 $str->time_start = date('Y-m-d H:i:s',time());
 $str->time_end = date('Y-m-d H:i:s',time()+31536000);
 $str->phone = "13800138000";
 $str->id = rand(1,999);
// var_dump($str);
 $str1 = ybwmEncrypt(json_encode($str), $key);
//header ("Content-type: text/plain");
//header ("Content-Disposition: attachment; filename=secret.json");
echo $str1;
 // var_dump($str);