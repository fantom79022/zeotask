<?php
require_once __DIR__.'/vendor/autoload.php';

$request = \Symfony\Component\HttpFoundation\Request::createFromGlobals();
$cleaner = new Prepare;
$stringClass = new String;
$intClass = new Int;
$lengthClass = new Length;
$rangeClass = new Range;
$labelClass = new Label;
$reflection = new ReflectionClass(new Person);

$source = file_get_contents('source.php');
$tokens = token_get_all($source);
$properties = $reflection->getProperties();

$cache = new Cache();
$cache->startCaching();
if ($request->query->get('invalidation')) {
    $cache->invalidation();
}
foreach ($tokens as $token) {

    if ($token[0] == 373) {
        $cachedAnnotation = $cache->getFromCache($token[1]);
        if (!preg_match('/(param)/', $token[1]) && !preg_match('/(return)/', $token[1]) && !$cachedAnnotation) {
            $field['label'] = $labelClass->getLabel($token[1]);
            $field['name'] = each($properties)['value']->name;
            $field['label'] ? null : $field['label'] = $field['name'];
            $field['input'] = $cleaner->prepareToken($token[1]);
            $field['input'] = $stringClass->getStringType($field['input']);
            $field['input'] = $intClass->getIntType($field['input']);
            $field['input'] = $lengthClass->getLength($field['input']);
            $field['input'] = $rangeClass->getRange($field['input']);
            $cachedField = $field['label'] . ': <input name ="' . $field['name'] . '"' . $field['input'] . ' />';
            $cache->saveToCache($token[1], $cachedField);
            echo $cachedField;
            echo '<br>';
        } elseif ($cachedAnnotation) {
            echo $cachedAnnotation;
            echo '<br>';

        }
    }
}
$cache->endCaching();

if (!$request->query->get('invalidation')) {
    echo '<a href="?invalidation=true">Erase the cache</a>';
} else {
    echo '<a href="/"> Enable Cache </a>';
}
