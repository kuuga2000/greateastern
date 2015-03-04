<?php
Class Website {
	public $name;
	public $title;
	public $keywords;
	public $description;
	public $favicon;
	public $logo;
	public $copyright;
	public $phone;
	public $fax;
	public $address;
	public $barcode;
	public $facebook;
	public $twitter;
	public $gplus;
	public $maintenance;
	private $db;
	
	
	public function __construct() {
		$this -> db = Yii::app() -> db;
	}
	
	public function defaultMeta() {
		$data = $this -> db -> createCommand("SELECT * FROM tb_config ORDER BY id ASC") -> queryAll();
		$metaArray = array();
		foreach ($data as $value) {
			$metaArray[$value['name']] = $value['value'];
		}
		$this -> name = $metaArray['name'];
		$this -> title = $metaArray['title'];
		$this -> keywords = $metaArray['keywords'];
		$this -> description = $metaArray['description'];
		$this -> favicon = $metaArray['favicon'];
		$this -> logo = $metaArray['logo'];
		$this -> copyright = $metaArray['copyright'];
		$this -> fax = $metaArray['fax'];
		$this -> phone = $metaArray['phone'];
		$this -> email = $metaArray['email'];
		$this -> address = $metaArray['address'];
		$this -> barcode = $metaArray['barcode'];
		$this -> facebook = $metaArray['facebook'];
		$this -> twitter = $metaArray['twitter'];
		$this -> gplus = $metaArray['gplus'];
		$this -> maintenance = $metaArray['maintenance'];
		return;
	}
	
	public function seoMatchUrl(){
		//echo $_SERVER['REQUEST_URI'];exit;	
		$seoMatchUrl = Seourl::model()->find('url_matched=:url',array(':url'=>static::catchURl()));
		if(!empty($seoMatchUrl)){
			if(!empty($seoMatchUrl->seo_title)){
				$this->title = $seoMatchUrl->seo_title;
			}
			if(!empty( $seoMatchUrl->keywords)){
				$this->keywords =  $seoMatchUrl->keywords;
			}
			if(!empty($seoMatchUrl->description)){
				$this->description =  $seoMatchUrl->description;
			}	
		}
		return;
	}
	
	/*slug url*/
	function slug($str, $separator = '-', $lowercase = TRUE) {
		if ($separator == 'dash') {
			$separator = '-';
		} else if ($separator == 'underscore') {
			$separator = '_';
		}
		$q_separator = preg_quote($separator);
		$trans = array('&.+?;' => '', '[^a-z0-9 _-]' => '', '\s+' => $separator, '(' . $q_separator . ')+' => $separator);
		$str = strip_tags($str);
		foreach ($trans as $key => $val) {
			$str = preg_replace("#" . $key . "#i", $val, $str);
		}
		if ($lowercase === TRUE) {
			$str = strtolower($str);
		}
		return trim($str, $separator);
	}
	
	public static function catchurl(){
		$request = parse_url($_SERVER['REQUEST_URI']);
		$path = $request["path"];
		return $result = rtrim(str_replace(basename($_SERVER['SCRIPT_NAME']), '', $path), '/');
	}
	public static function catchFullUrl(){
		return sprintf(
		    "%s://%s%s",
		    isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
		    $_SERVER['SERVER_NAME'],
		    $_SERVER['REQUEST_URI']
		);
	}
	public static function lang(){
		return  isset(Yii::app()->session['lang']) ? Yii::app()->session['lang'] : 'en';
	}
}