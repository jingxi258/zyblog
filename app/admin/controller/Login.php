<?php
declare (strict_types = 1);

namespace app\admin\controller;

use app\BaseController;
use think\facade\Db;

class Login extends BaseController
{
    protected $middleware = [
        "check"    =>  ['except' => ['ajax_do_login']]
    ];
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        return view();
    }

    public function ajax_do_login(){
        if (!$this->request->isPost()){
            throw new \Exception("非法登录");
        }
        $name = input("post.name/s",'');
        $password = input("post.password/s",'');
        $captcha = input("post.captcha/s","");
        //dump($captcha);die;
        $result = [
            "error"=>1,
            "errmsg"=>""
        ];
        if(!$name){
            //throw new \Exception("用户名不能为空");
            $result['errmsg'] = '用户名不能为空';
            return json($result);
        }
        if(!$password){
            //throw new \Exception("密码不能为空");
            $result['errmsg'] = '密码不能为空';
            return json($result);
        }
        if(!captcha_check($captcha)){
            //throw new \Exception("验证码错误");
            $result['errmsg'] = '验证码错误';
            $result['captcha'] = $captcha;
            return json($result);
        };
        $admin = Db::name("user")->where(["name"=>$name])->field('id,nick,password,name,status')->find();
        if(!$admin){
            //throw new \Exception("账号不存在");
            $result['errmsg'] = '账号不存在';
            return json($result);
        }
/*        if(!password_verify($password,$admin["password"])){
            throw new \Exception("密码错误");
        }*/
        if($password != $admin["password"]){
            //throw new \Exception("密码错误");
            $result['errmsg'] = '密码错误';
            return json($result);
        }
        if($admin["status"] == 1){
            //throw new \Exception("您的账户已被禁用");
            $result['errmsg'] = '您的账户已被禁用';
            return json($result);
        }
        session("current_admin",$admin);
        $result = [
            "error"=>0,
            "errmsg"=>"登录成功，跳转中..."
        ];
        return json($result);
    }

    /*验证码*/
    public function Verify()
    {
        return captcha();
    }

    public function logout(){
        session('current_admin', null);
        return redirect('admin/Login/index');
    }
}
