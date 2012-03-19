<?php
$settings = new Settings();
define('ROOT_DIR', $settings::$ROOT_DIR);

function __autoload($className) {
	$className = strtolower($className);
    $folder=classFolder($className);
	echo('Folder: ' . $folder);
    if($folder) require_once(ROOT_DIR . $folder.'/'.$className.'.class.php');
}

function classFolder($className,$folder='') {
    $dir=dir(ROOT_DIR.$folder);
    if($folder=='lib' && file_exists(ROOT_DIR.$folder.'/'.$className.'.class.php')) return $folder;
    else {
        while (false!==($entry=$dir->read())) {
            $checkFolder=$folder.'/'.$entry;
            if(strlen($entry)>2) {
                if(is_dir(ROOT_DIR.$checkFolder)) {
                    if(file_exists(ROOT_DIR.$checkFolder.'/'.$className.'.class.php')) return $checkFolder;
                    else {
                        $subFolder=classFolder($className,$checkFolder);
                        if($subFolder) return $subFolder;
                    }
                }
            }
        }
    }
    $dir->close();
    return 0;
}
