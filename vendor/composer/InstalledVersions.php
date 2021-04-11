<?php











namespace Composer;

use Composer\Semver\VersionParser;






class InstalledVersions
{
private static $installed = array (
  'root' => 
  array (
    'pretty_version' => 'dev-master',
    'version' => 'dev-master',
    'aliases' => 
    array (
    ),
    'reference' => 'df996af88214c0e6e609e80c892289724700f126',
    'name' => '__root__',
  ),
  'versions' => 
  array (
    '__root__' => 
    array (
      'pretty_version' => 'dev-master',
      'version' => 'dev-master',
      'aliases' => 
      array (
      ),
      'reference' => 'df996af88214c0e6e609e80c892289724700f126',
    ),
    'barryvdh/laravel-dompdf' => 
    array (
      'pretty_version' => 'v0.9.0',
      'version' => '0.9.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '5b99e1f94157d74e450f4c97e8444fcaffa2144b',
    ),
    'doctrine/inflector' => 
    array (
      'pretty_version' => '2.0.3',
      'version' => '2.0.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '9cf661f4eb38f7c881cac67c75ea9b00bf97b210',
    ),
    'dompdf/dompdf' => 
    array (
      'pretty_version' => 'v1.0.2',
      'version' => '1.0.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '8768448244967a46d6e67b891d30878e0e15d25c',
    ),
    'illuminate/contracts' => 
    array (
      'pretty_version' => 'v7.30.4',
      'version' => '7.30.4.0',
      'aliases' => 
      array (
      ),
      'reference' => '7d964384f0283bd7525ae7b5baa7ad32e5503b8e',
    ),
    'illuminate/support' => 
    array (
      'pretty_version' => 'v7.30.4',
      'version' => '7.30.4.0',
      'aliases' => 
      array (
      ),
      'reference' => '1c95b8f842308ff15a56d29d897d3bda29001f1c',
    ),
    'nesbot/carbon' => 
    array (
      'pretty_version' => '2.46.0',
      'version' => '2.46.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '2fd2c4a77d58a4e95234c8a61c5df1f157a91bf4',
    ),
    'phenx/php-font-lib' => 
    array (
      'pretty_version' => '0.5.2',
      'version' => '0.5.2.0',
      'aliases' => 
      array (
      ),
      'reference' => 'ca6ad461f032145fff5971b5985e5af9e7fa88d8',
    ),
    'phenx/php-svg-lib' => 
    array (
      'pretty_version' => 'v0.3.3',
      'version' => '0.3.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '5fa61b65e612ce1ae15f69b3d223cb14ecc60e32',
    ),
    'psr/container' => 
    array (
      'pretty_version' => '1.1.1',
      'version' => '1.1.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '8622567409010282b7aeebe4bb841fe98b58dcaf',
    ),
    'psr/simple-cache' => 
    array (
      'pretty_version' => '1.0.1',
      'version' => '1.0.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '408d5eafb83c57f6365a3ca330ff23aa4a5fa39b',
    ),
    'sabberworm/php-css-parser' => 
    array (
      'pretty_version' => '8.3.1',
      'version' => '8.3.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'd217848e1396ef962fb1997cf3e2421acba7f796',
    ),
    'symfony/polyfill-mbstring' => 
    array (
      'pretty_version' => 'v1.22.1',
      'version' => '1.22.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '5232de97ee3b75b0360528dae24e73db49566ab1',
    ),
    'symfony/polyfill-php80' => 
    array (
      'pretty_version' => 'v1.22.1',
      'version' => '1.22.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'dc3063ba22c2a1fd2f45ed856374d79114998f91',
    ),
    'symfony/translation' => 
    array (
      'pretty_version' => 'v5.2.5',
      'version' => '5.2.5.0',
      'aliases' => 
      array (
      ),
      'reference' => '0947ab1e3aabd22a6bef393874b2555d2bb976da',
    ),
    'symfony/translation-contracts' => 
    array (
      'pretty_version' => 'v2.3.0',
      'version' => '2.3.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'e2eaa60b558f26a4b0354e1bbb25636efaaad105',
    ),
    'symfony/translation-implementation' => 
    array (
      'provided' => 
      array (
        0 => '2.3',
      ),
    ),
    'voku/portable-ascii' => 
    array (
      'pretty_version' => '1.5.6',
      'version' => '1.5.6.0',
      'aliases' => 
      array (
      ),
      'reference' => '80953678b19901e5165c56752d087fc11526017c',
    ),
  ),
);







public static function getInstalledPackages()
{
return array_keys(self::$installed['versions']);
}









public static function isInstalled($packageName)
{
return isset(self::$installed['versions'][$packageName]);
}














public static function satisfies(VersionParser $parser, $packageName, $constraint)
{
$constraint = $parser->parseConstraints($constraint);
$provided = $parser->parseConstraints(self::getVersionRanges($packageName));

return $provided->matches($constraint);
}










public static function getVersionRanges($packageName)
{
if (!isset(self::$installed['versions'][$packageName])) {
throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}

$ranges = array();
if (isset(self::$installed['versions'][$packageName]['pretty_version'])) {
$ranges[] = self::$installed['versions'][$packageName]['pretty_version'];
}
if (array_key_exists('aliases', self::$installed['versions'][$packageName])) {
$ranges = array_merge($ranges, self::$installed['versions'][$packageName]['aliases']);
}
if (array_key_exists('replaced', self::$installed['versions'][$packageName])) {
$ranges = array_merge($ranges, self::$installed['versions'][$packageName]['replaced']);
}
if (array_key_exists('provided', self::$installed['versions'][$packageName])) {
$ranges = array_merge($ranges, self::$installed['versions'][$packageName]['provided']);
}

return implode(' || ', $ranges);
}





public static function getVersion($packageName)
{
if (!isset(self::$installed['versions'][$packageName])) {
throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}

if (!isset(self::$installed['versions'][$packageName]['version'])) {
return null;
}

return self::$installed['versions'][$packageName]['version'];
}





public static function getPrettyVersion($packageName)
{
if (!isset(self::$installed['versions'][$packageName])) {
throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}

if (!isset(self::$installed['versions'][$packageName]['pretty_version'])) {
return null;
}

return self::$installed['versions'][$packageName]['pretty_version'];
}





public static function getReference($packageName)
{
if (!isset(self::$installed['versions'][$packageName])) {
throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}

if (!isset(self::$installed['versions'][$packageName]['reference'])) {
return null;
}

return self::$installed['versions'][$packageName]['reference'];
}





public static function getRootPackage()
{
return self::$installed['root'];
}







public static function getRawData()
{
return self::$installed;
}



















public static function reload($data)
{
self::$installed = $data;
}
}
