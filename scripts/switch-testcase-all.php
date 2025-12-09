<?php
include "switch-testcase.php";
$progs = glob("./pages/Prog:*");
foreach ($progs as $prog) {
	$prog_name = substr($prog, 13, 9999);
	$a1 = argv[1];
	switch_testcase($prog_name, intval($a1) - 2);
	trigger_error("已经为 $prog_name 切换为第 $a1 号测试用例", E_USER_NOTICE);
}
