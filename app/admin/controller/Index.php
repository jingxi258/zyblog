<?php
declare (strict_types = 1);

namespace app\admin\controller;
use think\facade\Db;
use think\facade\View;
class Index
{
    public function index()
    {
        $id = session('current_admin')['id'];
        $admin = Db::name('user')->where('id',$id)->find();
        //dump($admin);die;
        View::assign('admin',$admin);
        return view();
    }
}
