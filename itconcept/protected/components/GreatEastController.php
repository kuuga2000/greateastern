<?php
Class GreatEastController extends Controller {

	public $layout = "greattheme";
	
	
	public function actions()
    {
        return array(
            'edit'=>'application.controllers.UpdateAction',
        );
    }

}
