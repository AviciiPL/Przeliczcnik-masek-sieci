<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" 
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl"> 
<head> 
<meta http-equiv="Content-type" content="text/html; charset=utf-8" /> 
<title>Kalkulator sieciowy</title> 
</head> 
<body> 
<p> 
<?php 
if ( isSet($_GET['IP1']))
{
$IP1 = $_GET['IP1'];
$IP2 = $_GET['IP2'];
$IP3 = $_GET['IP3'];
$IP4 = $_GET['IP4'];
$maska = $_GET['Maska'];
if ($maska == '255.255.255.0') $ip=256;
if ($maska == '255.255.255.128') $ip=128;
if ($maska == '255.255.255.192') $ip=64;
if ($maska == '255.255.255.224') $ip=32;
if ($maska == '255.255.255.240') $ip=16;
if ($maska == '255.255.255.248') $ip=8;
if ($maska == '255.255.255.252') $ip=4;
$podsiec=256/$ip;
print ("<strong>Maska:</strong>&nbsp;  ".$maska." &nbsp; &nbsp; &nbsp; <strong>IP:</strong>&nbsp;  ".$ip." &nbsp; &nbsp; &nbsp; <strong>Ilość podsieci:</strong>&nbsp; ".$podsiec);
print '<hr>';
print '<br>';
for($i=0; $i<=($podsiec-1); $i++)
{
$t=($IP4+($i*$ip));
print '&nbsp;&nbsp;<strong>Adres sieci:</strong>&nbsp;';
print ($IP1.".".$IP2.".".$IP3.".".$t);
print '&nbsp;&nbsp;<strong>Adresy robocze:</strong>&nbsp;';
print ($IP1.".".$IP2.".".$IP3.".".($t+1));
print '&nbsp;&nbsp;<strong>-</strong>&nbsp;';
print ($IP1.".".$IP2.".".$IP3.".".($t+($ip-2)));
print '&nbsp;&nbsp;<strong>Adres rozgłoszeniowy:</strong>&nbsp;';
print ($IP1.".".$IP2.".".$IP3.".".($t+($ip-1)));
print '<br>';
}
//$maska = $_GET['255.255.255.128'];
//$maska = $_GET['255.255.255.192'];
//$maska = $_GET['255.255.255.224'];
//$maska = $_GET['255.255.255.240'];
//$maska = $_GET['255.255.255.248'];
//$maska = $_GET['255.255.255.252'];
}
else
{
print '<form action="kalkulatorsieciowy.php" method="get">';
print '<div><strong>Adres IP</strong><br /><input type="text" name="IP1" style="width: 30px" />.<input type="text" name="IP2" style="width: 30px" />.<input type="text" name="IP3" style="width: 30px" />.<input type="text" name="IP4" style="width: 30px" /><br><br />';
print '<strong>Maska</strong><br />';
print '<select name="Maska">
<option>255.255.255.0</option>
<option>255.255.255.128</option>
<option>255.255.255.192</option>
<option>255.255.255.224</option>
<option>255.255.255.240</option>
<option>255.255.255.248</option>
<option>255.255.255.252</option>
</select>
</form>';
print '<input type="submit" value="Wyślij" />';
print '</div>';
}
?> 
</p> 
</body> 
</html> 
