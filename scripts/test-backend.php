<?php
function test_one($prog) {
	chdir("pages/Prog:$prog");
	$cmd = "/bin/echo -e \"run\\ninfo registers\" | gdb ./app 2>&1 | grep rbx | sed -e 's/\s\+/ /g' | cut -d' ' -f3 > /tmp/{$prog}_rbx.txt";
	system($cmd);
	$actual = trim(file_get_contents("/tmp/{$prog}_rbx.txt"));
	$excepted = trim(file_get_contents("excepted_rbx_val.txt"));
	unlink("/tmp/{$prog}_rbx.txt");
	chdir("../../");
	return ["excepted" => $excepted, "actual" => $actual, "passed" => $excepted == $actual];
}
function test_all() {
	$progs = glob("./pages/Prog:*");
	$res = [];
	foreach ($progs as $prog) {
		$prog_name = substr($prog, 13, 9999);
		if(!file_exists("$prog/app")) {
			trigger_error("程序 $prog_name 尚未编译, 跳过测试", E_USER_NOTICE);
			continue;
		}
		$res[$prog_name] = test_one($prog_name);
		trigger_error("程序 $prog_name 测试结束", E_USER_NOTICE);
		continue;
	}
	return $res;
}
