ThinkPHP 6.0
===============

> 运行环境要求PHP7.1+。

## 安装

~~~
composer create-project topthink/think tp 6.0.*
~~~

如果需要更新框架使用
~~~
composer update topthink/framework
~~~

安装多应用模式 
~~~
composer require topthink/think-multi-app
~~~

创建admin和index应用
~~~
php think build admin
~~~
~~~
php think build index
~~~

后台使用X-admin

安装视图模板 
~~~
composer require topthink/think-view
~~~

配置视图替换 项目config文件夹view.php文件
~~~
    'tpl_replace_string'=>[
        '__PUBLIC__' => '/',
        '__STATIC__' => '/static'
    ]
~~~

### 安装验证码扩展包 
~~~
composer require topthink/think-captcha
~~~

使用方式
~~~
    public function Verify()
    {
        return captcha();
    }
~~~
~~~
<img src="{:url('admin/Login/Verify')}" onClick="this.src=this.src+'?'+Math.random()">
~~~

### 创建admin应用的中间件，项目admin应用使用应用中间件实现登录和权限验证
~~~
php think make:middleware admin\middleware\Check 
~~~
创建的文件位置为admin\middleware\Check 
坑：命令行创建的middleware命名空间不对
