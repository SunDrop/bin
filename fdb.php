<?
$info = pathinfo(__FILE__);
$path = trim(file_get_contents( $info['dirname'].'/path' ));
$conf = require(realpath($info['dirname'].'/'.$path.'/config/app/production.php'));

$db = $argv[1];
if($db && $db != '_slave') $db = '-'.$db;
$db = 'mysql'.$db;

if(!isset($conf[$db])) {
	print $db.' not found';
	return;
}

$conf=$conf[$db];

print '-u'.$conf['user'].' -h'.$conf['host'].' -p'.$conf['password'].' znakomster';
