<?php
Class FileController extends GreatEastController {
	public function actionRemove($id) {
		$BG = GECompanyBg::model() -> findByPk($id);
		if (!empty($BG)) {
			if($BG->delete()){
				$delete = unlink(Yii::getPathOfAlias('webroot') . '/assets/uploads/images/' . $BG->background);
				if ($delete) {
					exit(json_encode(array('success'=>true)));
				}
			}
		}
	}
}