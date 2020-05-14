<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// +----------------------------------------------------------------------
// | 自定义配置
// +----------------------------------------------------------------------
return [

    'upload_dir'		=> './uploads',			//文件上传根目录
    'upload_subdir'		=> 'Ym',				//文件上传二级目录 标准的日期格式
    'nocheck'			=> ['/admin/Login/Verify','/admin/Login/index','/admin/Index/index','/admin/Index/main','/admin/Login/logout','/admin/Upload/editorUpload','/admin/Upload/uploadImages','/admin/Upload/uploadUeditor','/admin/Login/captcha'],   					//不需要验证权限的url
    'img_show_status'	=> true,				//图片输入框 鼠标移动上去 是否显示图片 true 显示 false 不显示

    'export_per_num'	=> 50,					//excel每次导入的数据量 建议不要高于200
    'import_type'	=> 'csv',					//可选格式有 xls、xlsx、csv

    'clear_cache_dir'	=> true,				//清除缓存 true 只删除admin 后台应用  false 删除所有

    'password_secrect'	=> 'xhadmin',			//密码加密秘钥

    'create_table_pre'	=> 'ext_',				//创建模型时的数据表前缀
];