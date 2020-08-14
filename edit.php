<?php
$ctrlip="45.11.1.197";   //被控端IP
$ctrlpw="0N9UfzMf1ot6C7Nu8P";   //被控端密码
$ctrlport=22; //被控端端口
$ctrlusr="root";  //被控端用户名（使用Linux）
$ip=$_POST["ipname"].".hyp.ink"; //域名后缀默认hyp.ink，此处请修改
$client=$_SERVER["REMOTE_ADDR"];
echo "你所请求的IP：".$ip;
echo "<br>";
echo "欲绑定的用户IP：".$client;
echo "<br>绑定结果：<br>";
$ret=file_get_contents("https://mcapi.us/server/status?ip=".$ip);
$dec=json_decode($ret);
if($dec->status=="success")
{
	echo "当前请求的IP可用";
	$connection=ssh2_connect($ctrlip,$ctrlport);
	ssh2_auth_password($connection,$ctrlusr,$ctrlpw);
//	$cmd="mkdir /home/remotesucc";
//	$return_d=ssh2_exec($connection,$cmd);
	stream_set_blocking($return_d,true);
	echo $return_d;
}
else
{
	echo "错误！请检查你的IP是否填写正确";
}
?>
