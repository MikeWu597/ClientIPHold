# ClientIPHold #
本软件用于Hypixel加速IP的用户端IP绑定

### [用户使用说明](https://github.com/MikeWu597/ClientIPHold/blob/master/Usage.md) ###

### ToDo List ###

1.使用统一配置文件

### 曾经试过以下方案： ###

1.SSH控制iptables放行 失败原因：丢包率太高登录不稳定

2.直接用本机做入口，自己控制自己  失败原因：不能用在生产环境，不够安全

3.在游戏内登录进行绑定  失败原因：麻烦，资金不够

4.直接集成阿里云API在软件代码里  失败原因：在编写过程中不巧遇上阿里偷偷修改了API的请求方式，调了2天才发现问题，说明这样不能保持接口的更新速度

最终选用安全组是因为这样可用性比较高，管理方便，可以配置权值

### 原理： ###

1.在网页提交私人IP，通过后缀限制IP名字必须是你的私人IP

2.服务器Ping IP，如果校验成功则继续

3.操作被控端安全组放行用户
<br>
### 使用的库/软件 ###
<br>

Aliyun CLI

测试环境 LNMP

---
## 安装 ##

### 1.依赖 ###

LNMP环境安装

`wget http://soft.vpser.net/lnmp/lnmp1.7.tar.gz -cO lnmp1.7.tar.gz && tar zxf lnmp1.7.tar.gz && cd lnmp1.7 && ./install.sh lnmp `

阿里云CLI安装

`
https://help.aliyun.com/document_detail/121541.html?spm=a2c4g.11186623.4.1.584852afwLlzhQ
`

没了

### 2.本体 ###

将源代码扔进wwwroot就行了

### 3.配置 ###

本软件共有3个主文件：

```
index.php 主页，用于接待、提交IP，提交后跳转至flix
edit.php 执行页，用于校验IP可用性、操作被控端
flix.php 提交页，接受参数，include了edit.php，优化界面
```

其中flix.php不需要配置

#### index.php： ####

L26: 将.hyp.ink替换成你自己的私人IP后缀

#### edit.php:  ####
L2-5: 将被控端安全组ID，域名后缀，AccessKey ID与Secret填写好

L19: 默认无需配置，可按需修改：地域上海，端口25565，协议TCP，权值1，目前仅绑定单IP而非IP段

没了

