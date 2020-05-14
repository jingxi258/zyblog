<?php


namespace app\admin\controller;


use app\BaseController;
use think\facade\Db;
use think\facade\View;

class Welcome extends BaseController
{
    public function index(){
        $id = session('current_admin')['id'];
        $admin = Db::name('user')->where('id',$id)->find();
        //dump($admin);die;
        View::assign('admin',$admin);
        View::assign('time',date("Y-m-d H:i",time()));
        return view();
    }
}