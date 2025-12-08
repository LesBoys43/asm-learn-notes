#!/usr/bin/env php
<?php
include "localsettings.php";
$progs = glob("./pages/Prog:*");
foreach ($progs as $prog) {
	$prog_name = substr($prog, 13, 9999);
	if (!file_exists("$prog/content.S")) {
		trigger_error("程序 $prog_name 不包含必须的 content.S", E_USER_NOTICE);
		continue;
	}
	$rv = 0;
	chdir($prog);
	$cmd = "nasm content.S $wgAsflags -o content.o";
	system($cmd, $rv);
	if ($rv != 0) {
		trigger_error("程序 $prog_name 未能成功编译", E_USER_NOTICE);
		chdir("../../");
		continue;
	}
	trigger_error("程序 $prog_name 成功编译", E_USER_NOTICE);
	$cmd = "ld content.o $wgLdflags -o app";
	system($cmd, $rv);
	if ($rv != 0) {
		trigger_error("程序 $prog_name 未能成功链接", E_USER_NOTICE);
		chdir("../../");
		continue;
	}
	trigger_error("程序 $prog_name 成功链接", E_USER_NOTICE);
	unlink("content.o");
	chdir("../../");
	continue;
}
