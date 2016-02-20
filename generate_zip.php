<?php
$error = "";
if (isset($_POST['download'])){
	$file_folder = "uploads/";
	//объединённый код элементов
	if (isset($_POST['files']) and count($_POST['files']) > 0){
		$zip = new ZipArchive();
		$zip_name = time() . ".zip";
		if($zip->open($zip_name, ZIPARCHIVE::CREATE)!== TRUE){
			$error .= "* Sorry ZIP creation failed at this time";
		}
		foreach($_POST['files'] as $file){
			//переходим в папку $file_folder . file
			//добавляем файлы из папки images все в архив, таким образом, в нашем архиве должна быть папка images
			if (file_exists($file_folder . $file . '.css')){
				$css = file_get_contents($file_folder . $file . '.css');
				file_put_contents($file_folder . 'dynamicUI.css', $css, FILE_APPEND | LOCK_EX);
			}
			if (file_exists($file_folder . $file . '.js')){
				$js = file_get_contents($file_folder . $file . '.js');
				file_put_contents($file_folder . 'dynamicUI.js', $js, FILE_APPEND | LOCK_EX);
			}
		}
		$zip->addFile($file_folder . 'jquery-1.11.3.min.js');
		$zip->addFile($file_folder . 'dynamicUI.css');
		$zip->addFile($file_folder . 'dynamicUI.js');
		$zip->close();
		if(file_exists($zip_name)){
			echo 'zip-файл существует';
			header('Content-type: application/zip');
			header('Content-Disposition: attachment; filename="'.$zip_name.'"');
			readfile($zip_name);
			unlink($zip_name);
			unlink($file_folder . 'dynamicUI.css');
			unlink($file_folder . 'dynamicUI.js');
		}
	}
	else echo 'выберите файлы для загрузки';
}
?>