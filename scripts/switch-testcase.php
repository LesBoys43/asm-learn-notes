<?php
$prog = $argv[1];
$tc = intval($argv[2]) - 2;
chdir("pages/Prog:$prog");
include 'testcases.php';
if (isset($testcases[$tc])) {
	file_put_contents('excepted_rbx_val.txt', $testcases[$tc]['excepted_rbx_val']);
	$src = $testcases[$tc]['content_S_sed_pattern'][0];
	$dest = $testcases[$tc]['content_S_sed_pattern'][1];
	system("sed content.S -i -e 's/$src/$dest/'");
}
chdir("../../");
