<?php
namespace app\index\controller;
use think\Db;
//
class Index extends \think\Controller {
	public function getip(){
    if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown")) 
            $ip = getenv("HTTP_CLIENT_IP");
    else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown")) 
            $ip = getenv("HTTP_X_FORWARDED_FOR");
    else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown")) 
            $ip = getenv("REMOTE_ADDR");
    else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown")) 
            $ip = $_SERVER['REMOTE_ADDR'];
    else 
            $ip = "unknown";
    return($ip);
}	
	public function index() {
		include "index/index.php";
		// $name = "admin";
		// $name = "admin";
		// $name = "abc";
		$this->assign("name", $name);
		return $this->fetch();
	}
	public function hello($name = 'ThinkPHP5') {
		return 'hello,' . $name;
	}
	public function login(){
		return $this->fetch();
	}
	public function reply(){
    	$username=$this->request->post('username');
		$password=$this->request->post('password');
		$where="UserName=".$username;
		$passwords=Db::name('user')->where('UserName='.$username)->find();
		$uid=Db::name('user')->where("UserName=".$username)->find();
		if($password==$passwords){
			$this->success('开始了');
			$result=Db::execute("INSERT INTO Userlogs (Uid,date,Active) VALUE(".$uid.",now(),1)");
		}else{
			$this->error('继续赶紧的s');
		}
	}
	public function loginpass(){
		$username=$this->request->post('username');
		$password=$this->request->post('password');
		$where="UserName=".$username;
		$passwords=Db::name('user')->where('UserName='.$username)->value('password');
		$uid=Db::name('user')->where("UserName=".$username)->value('Uid');
		if($password==$passwords){
			$data=array(
				'Uid'=>$uid,
				'Active'=>1
			);
			$data['Date']=date('Y-m-d H:i:s',time());
			$res=Db::name('userlogs')->insert($data);
			echo 1;
		}else{
			
			echo "登录失败。";
		}
	}
}