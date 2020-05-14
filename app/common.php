<?php
// 应用公共文件
function AdminPassword(string $password): string {
    $en = md5(substr(md5($password), 2, 10));
    return $en;
}