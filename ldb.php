<?
$info = pathinfo(__FILE__);
$path = trim(file_get_contents( $info['dirname'].'/path' ));
$conf = require(realpath($info['dirname'].'/'.$path.'/config/app/production.php'));
$dev = realpath($info['dirname'].'/'.$path.'/config/dev');

if(is_file($dev)) {
	$dev = require $dev;
	$dev = realpath($info['dirname'].'/'.$path.'/config/app/'.$dev.'.php');
	if(is_file($dev)) {
		$conf = array_merge($conf, require $dev);
	}
}

$db = $argv[2];
if($db) $db = '-'.$db;
$db = 'mysql'.$db;

if(!isset($conf[$db])) {
	print 'echo "'.$db.' not found"';
	return;
}

$conf=$conf[$db];

print '-u'.$conf['user'].' -h'.$conf['host'].' -p'.$conf['password'].' znakomster';
