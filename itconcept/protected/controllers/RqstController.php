<?php
Class RqstController extends GreatEastController{
	
	public function actionGetcr(){
		if($this->isAjax()){
			$product_id = $_POST['product_id'];
			$PRODUCT = GEProduct::model()->findByPk($product_id);
			exit(json_encode($PRODUCT->attributes));
		}
	}
	
}
