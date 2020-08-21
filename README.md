# ClientIPHold #
本软件用于Hypixel加速IP的用户端IP绑定

原理：

1.在网页提交私人IP，通过后缀限制IP名字必须是你的私人IP

2.服务器ping IP，如果校验成功则继续

3.操作被控端安全组放行用户
<br>
### 使用的库/软件 ###
<br>

Aliyun CLI

测试环境 LNMP

---
## 安装 ##

### 1.依赖 ###

LNMP环境推荐使用无人值守

`wget http://soft.vpser.net/lnmp/lnmp1.7.tar.gz -cO lnmp1.7.tar.gz && tar zxf lnmp1.7.tar.gz && cd lnmp1.7 && ./install.sh lnmp `

阿里云CLI安装

`
https://help.aliyun.com/document_detail/121541.html?spm=a2c4g.11186623.4.1.584852afwLlzhQ
`

没了

### 2.本体 ###

将软件扔进wwwroot就行了

### 3.配置 ###

本软件共有3个主文件：

```
index.php 主页，用于接待、提交IP，提交后跳转至flix
edit.php 执行页，用于校验IP可用性、操作被控端
flix.php 提交页，接受参数，include了edit，优化界面
```

其中flix不需要配置

#### index.php： ####

L26: 将.hyp.ink替换成你自己的私人IP后缀

#### edit.php:  ####
L2-5: 将被控端安全组ID，域名后缀，AccessKey ID与Secret填写好

L19: 默认无需配置，可按需修改：地域上海，端口25565，协议TCP，权值1，仅绑定单IP而非IP段

没了

