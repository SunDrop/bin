<?
$info = pathinfo(__FILE__);
$path = trim(file_get_contents( $info['dirname'].'/path' ));
$conf = require(realpath($info['dirname'].'/'.$path.'/config/app/production.php'));

$db = $argv[2];
if($db) $db = $db.'_';
$db = $db.'gearman';

if(!isset($conf[$db])) {
	print 'echo "'.$db.' not found"';
	return;
}

$conf=$conf[$db];

print $conf['host'].' '.$conf['port'];
