<?php
$aki='';     //Access Key ID，请修改
$aks='';   //Access Key Secret，请修改
$ip=$_POST["ipname"].".hyp.ink";       //域名后缀默认hyp.ink，此处请修改
$sgid='';       //要控制的安全组的ID，请修改

$client=$_SERVER["REMOTE_ADDR"];

echo "你所请求的IP：".$ip;
echo "<br>";
echo "欲绑定的用户IP：".$client;
echo "<br>绑定结果：<br>";
$ret=file_get_contents("https://mcapi.us/server/status?ip=".$ip);
$dec=json_decode($ret);

if($dec->status=="success")
{
	echo "成功！已经放行你的IP";
	$cmd='aliyun ecs AuthorizeSecurityGroup --mode AK --access-key-id ' . $aki . ' --access-key-secret ' . $aks .' --region cn-shanghai --RegionId cn-shanghai --SecurityGroupId ' . $sgid . ' --IpProtocol tcp --PortRange 25565/25565 --SourceCidrIp ' . $client . ' --Policy accept --Priority 1';
//	echo $cmd;
	shell_exec($cmd);
	
}
else
{
	echo "错误！请检查你的IP是否填写正确";
}
?>
