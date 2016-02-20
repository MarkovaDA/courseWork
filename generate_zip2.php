<?php
$error = "";
if (isset($_POST['download'])){
	$file_folder = "uploads/";
	//объединённый код элементов
	if (isset($_POST['files']) and count($_POST['files']) > 0){
		if (!chdir($file_folder)) echo 'ошибка перехода в директорию'; //переходим в текущую директорию
		$zip = new ZipArchive();
		$zip_name = time() . ".zip";
		if($zip->open($zip_name, ZIPARCHIVE::CREATE)!== TRUE){
			$error .= "* Sorry ZIP creation failed at this time";
		}
		foreach($_POST['files'] as $file){
			if (file_exists($file . '.css')){
				$css = file_get_contents($file . '.css');
				file_put_contents('dynamicUI.css', $css, FILE_APPEND | LOCK_EX);
			}
			if (file_exists($file . '.js')){
				$js = file_get_contents($file . '.js');
				file_put_contents('dynamicUI.js', $js, FILE_APPEND | LOCK_EX);
			}
			if (!file_exists('images/' . $file)) continue;
			//добавляем прилагаемые к виджетам изображения в архив
			$dir_imgs = opendir('images/' . $file);
			while (false !== ($img = readdir($dir_imgs))) {
				$info = new SplFileInfo($img);
				if ($info->getExtension() != null){
					$zip->addFile('images/' . $file . '/' . $img);
				}
			}
		}
		$zip->addFile('jquery-1.11.3.min.js');
		$zip->addFile('dynamicUI.css');
		$zip->addFile('dynamicUI.js');
		$zip->close();
		if(file_exists($zip_name)){
			header('Content-type: application/zip');
			header('Content-Disposition: attachment; filename="'.$zip_name.'"');
			readfile($zip_name);
			unlink($zip_name);
			unlink('dynamicUI.css');
			unlink('dynamicUI.js');
		}
	}
	else echo 'выберите файлы для загрузки';
}
?>