<!DOCTYPE html>
<html>
<head>
<title>Hypixel加速IP管理界面</title>
<meta charset="utf-8">
<meta name="author" content="MikeWu597 请勿删除此标记">
<style>
body{ text-align:center}
.div{ margin:0 auto}
</style>
<style type="text/css">
<!--
body {
color:#333333;
font-family:"Helvetica Neue", Helvetica, Arial, "PingFang SC", "Hiragino Sans GB", "Heiti SC", "Microsoft YaHei", "WenQuanYi Micro Hei", sans-serif;
}
.links {color: #009900}
#main {
    margin-top: 50px;
    margin-right: auto;
    margin-left: auto;
    width: 80%;
}
-->
</style>
</head>
<body>
<div class="div">
<h1>Hypixel加速IP管理界面</h1>

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
</div>
</body>
<script type="text/javascript" src="https://cdn.bootcss.com/canvas-nest.js/1.0.1/canvas-nest.min.js"></script>
</html>
