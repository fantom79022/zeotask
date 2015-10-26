<?php
include('source.php');

$class = new ReflectionClass(new Person);
$source = file_get_contents('source.php');
$tokens = token_get_all($source);
$properties = $class->getProperties();
$patterns[0] = '[\*]';
$patterns[1] = '[/]';
$patterns[2] = '/var/';
$patterns[3] = '/ string/';
$patterns[4] = '/ int/';
$patterns[5] = '/(length)[(](\d++)\)/';
$patterns[7] = '/(range)[(](\d+), (\d+)[)]/';
$patterns[7] = '/(range)[(](\d+), (\d+)[)]/';
$patterns[8] = '[\@]';

$replacements[0] = '';
$replacements[1] = '';
$replacements[2] = 'type="';
$replacements[3] = 'text"';
$replacements[4] = 'number"';
$replacements[5] = 'maxlength="$2"';
$replacements[7] = 'min="$2" max="$3"';
$replacements[8] = '';

$patternForLable = '/(text)[(]\'(label)\' => \'(.+)\'\)/';
$replacementForLabel = '';
$i = 0;
foreach ($tokens as $token) {
    if ($token[0]==373) {

        $attribs[] = preg_replace($patterns, $replacements, $token[1]);
        $names[$i] = array_shift($properties);

        if (preg_match($patternForLable, $attribs[$i], $matches)) {
            $attribs[$i] = preg_replace($patternForLable, $replacementForLabel, $attribs[$i]);
               $label[$i] = '<lable for="' . $names[$i]->name .'">' . $matches[3] . '</label>';
        } else {
            $label[$i] = null;
        }
        $i++;
    }
}
$i = 0;
foreach ($names as $name) {

    if($label[$i]) {
        echo $label[$i];
    } else {
        echo $names[$i]->name;
    }
    echo ' <input name ="'.$names[$i]->name .
        '"' .$attribs[$i]. '/>';
    echo '<br>';
    $i++;
}

