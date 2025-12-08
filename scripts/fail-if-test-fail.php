<?php
ini_set('error_reporting', E_WARNING);
include 'test-backend.php';
$result = test_all();
$fail_cnt = 0;
foreach ($result as $pn => $pr) {
	if (!$pr['passed']) {
		$fail_cnt++;
	}
}
exit($fail_cnt);
