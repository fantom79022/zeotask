<?php

require_once __DIR__.'/vendor/autoload.php';

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


foreach ($tokens as $token) {
    if ($token[0]==373) {
        $field['label'] = $labelClass->getLabel($token[1]);
        $field['input'] = $cleaner->prepareToken($token[1]);
        $field['input'] = $stringClass->getStringType($field['input']);
        $field['input'] = $intClass->getIntType($field['input']);
        $field['input'] = $lengthClass->getLength($field['input']);
        $field['input'] = $rangeClass->getRange($field['input']);
        $field['name']  = each($properties)['value']->name;
        if ($field['label']) {
            echo $field['label'];
        } else {
            echo $field['name'];
        }
        echo ': <input name ="' . $field['name'] .'"' . $field['input'] . ' />';
        echo '<br>';
    }
}
