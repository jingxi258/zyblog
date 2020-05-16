<?php

declare (strict_types=1);

namespace app;

use think\facade\View;
use app\BaseController;

/**
 * 控制器基础类
 */
class BlogBaseController extends BaseController {

	public function __construct() {
		include_once dirname(__FILE__) . "/define.php";
		$this->initialize();
		$category = new admin\model\Category;
		$background = new admin\model\Background;
		$headernav = $category->where(['status' => 1])->order('sort asc')->column('title', 'id');
		$backimg = $background->find(1);
		View::assign(['headernav' => $headernav, 'backimg' => $backimg]);
	}

	// 初始化
	protected function initialize() {
	}


	public function jump404() {
		//只有在app_debug=False时才会正常显示404页面，否则会有相应的错误警告提示
		abort(404, '页面异常');
	}

	public function blogTpl() {
		return View::fetch('public/head') . View::fetch() . View::fetch('public/foot');
	}

	//空方法
	public function _empty() {
		return $this->jump404();
	}

}
