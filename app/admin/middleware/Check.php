<?php

namespace app\admin\middleware;

use think\response\Redirect;

class Check
{
    public function handle($request, \Closure $next)
    {
        $pathinfo = explode('/',$request->pathinfo());
        $controller = !empty($pathinfo[0]) ? str_replace('.html','',$pathinfo[0]) : 'Index';
        $action = !empty($pathinfo[1]) ? str_replace('.html','',$pathinfo[1]) : 'index';
        $app = app('http')->getName();
        $admin = session('current_admin');
        if( !$admin && ( $app <> 'admin' || $controller <> 'Login' )){
            return redirect(url('admin/Login/index'));
        }
        return $next($request);
    }
}
