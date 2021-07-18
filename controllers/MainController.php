<?php

class MainController
{

	public function actionIndex() {
		require_once( ROOT . '/views/main/index.php' );

		return true;
	}
	
	public function actionContacts() {
		require_once( ROOT . '/views/main/contacts.php' );
		return true;
	}

	public function actionAbout() {
		require_once( ROOT . '/views/main/about.php' );
		return true;
	}
}

?>