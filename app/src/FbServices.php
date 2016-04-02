<?php

use Facebook\Facebook;
class FbServices {

	protected $fb;

	public function __construct(){
		$this->fb = new Facebook([
					  'app_id' => Config::get('facebook.fbAppId'),
					  'app_secret' => Config::get('facebook.fbAppSecret'),
					  'default_graph_version' => Config::get('facebook.fbVersion'),
					]);
	}

	public function postLinkMe($linkData){
		if(Session::get('fb_access_token') != null):
			try {
				$response = $this->fb->post('/me/feed', $linkData, Session::get('fb_access_token');

			} catch (Facebook\Exception\FacebookResponseException $e) {
				echo 'Graph returned error '.$e->getMessage();
				exit;
			} catch (Facebook\Exception\FacebookSDKException $e){
				echo 'Facebook SDK returned error '.$e->getMessage();
				exit;
			}
		endif;
	}

	public function postLinkPage($linkData){
		if(Session::get('fb_access_token') != null):
			try {
				$responsePages = $this->fb->post('/'.Config::get('facebook.fbPageId').'/feed', $linkData, Session::get('fbPageToken'));

			} catch (Facebook\Exception\FacebookResponseException $e) {
				echo 'Graph returned error '.$e->getMessage();
				exit;
			} catch (Facebook\Exception\FacebookSDKException $e){
				echo 'Facebook SDK returned error '.$e->getMessage();
				exit;
			}
		endif;
	}
}