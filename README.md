# ClientIPHold #
本软件用于Hypixel加速IP的用户端IP绑定

原理：

1.在网页提交私人IP，通过后缀限制IP名字必须是你的私人IP

2.服务器ping IP，如果校验成功则继续

3.操作被控端（IP入口服务器）iptables放行用户
<br>
### 使用的库/软件 ###
<br>
Libssh SSH2 PHP 7.x

测试环境 LNMP

---
## 安装 ##

### 1.依赖 ###

LNMP环境推荐使用无人值守

`wget http://soft.vpser.net/lnmp/lnmp1.7.tar.gz -cO lnmp1.7.tar.gz && tar zxf lnmp1.7.tar.gz && cd lnmp1.7 && ./install.sh lnmp `

SSH2安装（用于操控被控端放行IP，被、主控端可以一台机器实现）

```
yum -y install git libssh2-devel
git clone https://git.php.net/repository/pecl/networking/ssh2.git
cd ssh2
/usr/local/php7.3.5/bin/phpize 
./configure --with-php-config=/usr/local/php7.3.5/bin/php-config
make
make install
echo "extension=ssh2.so">>/usr/local/php7.3.5/etc/php.ini
rm -rf ../ssh2
service php-fpm restart
```
P.S 请替换PHP安装路径

没了

### 2.本体 ###

将软件扔进wwwroot就行了

### 3.配置 ###

本软件共有3个主文件：

index.php 主页，

edit.php

flix.php




