{{content()}}
<center>
<?php 
echo '<pre>' . var_export($res, true) . '</pre>';
/*
$std=$res['result']['stdout']['0'];
if($std==30)
{
 echo "<center><h1> Success </h1></center>";
 echo "Runtime ".$res['result']['time']['0']."</br>";
 echo "Memory ".$res['result']['memory']['0'];
}
else 
{
echo "<center><h1> Failure </h1></center>";
echo $res['result']['censored_stderr']['0'];
}
*/

?>
</center>