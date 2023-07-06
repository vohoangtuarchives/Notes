#Xóa file sau 10 ngày
``` php
    $days = 10;
    $dir = dirname ( __FILE__ );

    if ($handle = opendir($dir)) {
        while (( $files = readdir($handle)) !== false ) {
            if ( $files == '.' || $files == '..' || is_dir($dir.'/'.$files) ) {
                continue;
            }
            if ((time() - filemtime($dir.'/'.$files)) > ($days *86400)) {
                unlink($dir.'/'.$files);
                break;
            }
        }
        closedir($handle);              
    }
```