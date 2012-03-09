<?php>
define('ROOT_DIR', dirname(__FILE__).'/');

function __autoload($className) {
    $folder=classFolder($className);
    if($folder) require_once($folder.'/'.$className.'.class.php');
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