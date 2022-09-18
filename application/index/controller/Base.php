<?php
namespace app\admin\controller;
use think\Db;
//Ê¹ÓÃÊý¾Ý¿âÀà
// use think\facade\Session;
// use think\facade\Cookie;
// use think\Lang;

class Base extends \think\Controller {
	public function select($tablename, $where = "1=1") {
		return Db::name($tablename)->where($where);
	}

}