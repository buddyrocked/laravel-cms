<?php
use Facebook\Facebook;
use Illuminate\View\View;

class FacebookViewComposer {

	public function compose(View $view){

		$fb = new Facebook([
			'app_id' => Config::get('facebook.fbAppId'),
			'app_secret' => Config::get('facebook.fbAppSecret'),
			'default_graph_version' => Config::get('facebook.fbVersion'),
		]);

		$helper = $fb->getRedirectLoginHelper();

		$permissions = ['publish_actions', 'manage_pages', 'publish_pages']; // Optional permissions
		$loginUrl = $helper->getLoginUrl(Config::get('facebook.fbCallBack').'/fbcallback', $permissions);
		$logoutUrl = $helper->getLogoutUrl(Session::get('fb_access_token'), Config::get('facebook.fbCallBack').'/logoutfb');

		if(Session::get('fb_access_token') != null):
			$fbMe = $fb->get('/me', Session::get('fb_access_token'))->getGraphUser();
			$accountMe = $fb->get('/me/accounts', Session::get('fb_access_token'));			
			//Yii::app()->session['fb_page_access_token'] = $fb->get('/798484873563813/fields=access_token', Yii::app()->session['fb_access_token'])->getAccessToken();
		endif;

		$data['loginUrl'] = $loginUrl;
		$data['logoutUrl'] = $logoutUrl;

		$view->facebook = $data;

		/*if(Session::get('fb_access_token') == null):
			echo CHtml::link('<i class="icon-lock"></i> login using facebook',  $loginUrl, ['class'=>'btn btn-info btn-large']);
		else:
			if(isset($fbMe)):
				echo '<div>Login as '.$fbMe['name'].'</div>';
			endif;
			echo CHtml::link('<i class="icon-off"></i> logout facebook',  $logoutUrl, ['class'=>'btn btn-info btn-large']);
		endif;*/
	}
}	