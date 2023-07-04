<?php
set_time_limit(0);
class Files{
	public static $mimesImage = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif', 'image/bmp', 'image/x-icon'];
	public static $mimesPDF = ['application/pdf'];
	public static $names = [];

	public static function upload($files){
		foreach ($files as $index => $file){			
			$finfo = finfo_open(FILEINFO_MIME_TYPE);
			$mime = finfo_file($finfo, $file['tmp_name']);

			if (strpos($mime, 'image') !== false){
				$mimes =  self::$mimesImage;
				$route = '../../../images/LogoPartido/';
				$e = '.jpg';
			}
			
			if ($file['error'] == UPLOAD_ERR_OK && in_array($mime, $mimes)){
				$name = sha1($file['name'] . microtime(true)) . $e;
			    move_uploaded_file($file['tmp_name'], $route . $name);
			    self::$names[$index] = $name;
			}
			else{
				return [
					'valido' => false,
					'names' => self::$names
				];
			}
		}

		return [
			'valido' => true,
			'names' => self::$names
		];
	}
}
?>