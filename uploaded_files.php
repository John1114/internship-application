<?php
$dir    = '/home/virtuals/ilimi.org/internships/uploads/';
$files1 = scandir($dir);
$files2 = scandir($dir, 1);

print_r($files1);
?>