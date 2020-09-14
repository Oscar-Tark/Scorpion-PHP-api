<?php
$includes_templates = array(
    'PHP' => "phpinclude/modules/*.php",
    'JS' => "jsinclude/modules/*.js",
    'CSS' => "cssinclude/*.css",
    'DEF' => null,
);

$includes_templates_functionality = array(
    'PHP' => function($path)
    {
        include_once($path);
        return;
    },
    'JS' => function($path)
    {
        echo "<script src='".$path."'></script>";
        return;
    },
    'CSS'=> function($path)
    {
        echo "<link rel='stylesheet' href='".$path."'>";
        return;
    },
    'DEF' => null,
);

function includes($concatenation_level, $type)
{
    //Takes: int = 0 = ./ = 1 = ../ = 2 = ../../ etc...
    global $includes_templates, $includes_templates_functionality;
    $concat = "./";
	//$concatenation_level = (int)((int)($concatenation_level));
    if($concatenation_level != 0 && $concatenation_level != -1 && $concatenation_level != 88 && $concatenation_level != 87)
        $concat = create_concatenation($concatenation_level);
    else if($concatenation_level == 88 || $concatenation_level == 87)
		$concat = create_concatenation($concatenation_level)."scorpion-php-api/";
	
    foreach(glob($concat.$includes_templates[$type]) as $filename)
        $includes_templates_functionality[$type]($filename);
    return;
}

function create_concatenation($concatenation_level)
{
	$concatenation_level = (int)((int)($concatenation_level) - 86);
    $concatenation = "";
    $intup = 0;
    
    while($intup < (int)$concatenation_level)
    {
        $concatenation = $concatenation."../";
        $intup++;
    }
    return $concatenation;
}
?>
