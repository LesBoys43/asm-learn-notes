#!/usr/bin/env php
<?php
include "test-backend.php";
$data = test_all();
$out = "";
$y = "√";
$n = "×";
$pattern_one = "; **%s** -- %s\n**预期值**: `%s`\n**实际值**: `%s`\n";
$pattern_base = "# 测试报告\n%s";
foreach ($data as $prog_name => $resu) {
	$out = $out . sprintf($pattern_one, $prog_name, $resu['passed'] ? $y : $n, $resu['excepted'], $resu['actual']);
}
echo sprintf($pattern_base, $out);
