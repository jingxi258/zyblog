<?php


namespace app\admin\controller;

use think\facade\View;
use think\route\dispatch\Controller;

class Article extends Controller
{
    protected $mod;

    public function __construct() {
        //parent::__construct();
        $this->mod = new \app\admin\model\Article();
        $category = new \app\admin\model\Category();
        $type = $category->where(['status' => 1])->orderRaw('sort')->column('title', 'id');
        View::assign([
            'notes' => $this->mod->notes,
            'type' => $type,
        ]);
    }

    public function index() {
        $pageSize = 5; //每页显示的数量
        $where = [];
        if (input('id')) {
            $where[] = ['id', '=', input('id')];
        }
        $list = $this->mod->where($where)->order('id', 'desc')->paginate($pageSize);
        View::assign(['list' => $list]);
        return view();
    }

    public function edit(){
        $id = input('id/d', 0);
        $info = $this->mod->where('id', $id)->find();
        if (!request()->isPost()) {
            View::assign(['info' => $info,]);
            return view();
        }
        $data = input('post.');
        unset($data['id']);
        if ($id) { //更新数据
            $where['id'] = $id;
            $x = $this->mod->where($where)->update($data);

        } else { //添加数据
            $data['c_time'] = date('Y-m-d H:i:s');
            $x = $this->mod->insertGetId($data);
        }
        //dump($id);die;
        if($x !== false){
            $result["error"]=0;
            $result["errmsg"] = "";
            return json($result);
        }else{
            $result["error"]=1;
            $result["errmsg"] = "保存失败";
            return json($result);
        }
    }

    public function CkUploaer(){
        if (1) {
            $result["uploaded"]=true;
            $result["url"] = "/upload/image/20200503/1.png";
            return json($result);
        }
    }
}