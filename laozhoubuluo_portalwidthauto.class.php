<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class plugin_laozhoubuluo_portalwidthauto {

	public function global_cpnav_top() {
		global $_G;

		// 不是 Portal 模块或开关关闭时直接返回 array() 结束 Hook
		if(CURSCRIPT != 'portal' || !$_G['cache']['plugin']['laozhoubuluo_portalwidthauto']['status']) {
			return array();
		}

		// 如果不是门户首页就解除宽屏限制
		if(isset($_GET['mod']) && $_GET['mod'] != 'index') {
			$_G['disabledwidthauto'] = 0;
		} else if($_G['cache']['plugin']['laozhoubuluo_portalwidthauto']['allowindex']) {
			// 如果是门户首页且允许修改门户首页就对门户首页解除宽屏限制
			$_G['disabledwidthauto'] = 0;
		}

		// 如果没被拦截, 直接返回 array() 结束 Hook
		return array();
	}

}