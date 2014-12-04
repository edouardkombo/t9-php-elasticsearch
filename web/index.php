<?php

require "../vendor/autoload.php";
require "../src/Interfaces/T9Interface.php";
require "../src/Interfaces/EngineInterface.php";
require "../src/Abstracts/T9Abstract.php";
require "../src/Abstracts/EngineAbstract.php";
require "../src/Engine.php";
require "../src/T9.php";

$directory = __DIR__.DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "app" . 
    DIRECTORY_SEPARATOR."prod".DIRECTORY_SEPARATOR."conf".DIRECTORY_SEPARATOR;

$jsonDictionary     = file_get_contents($directory . 'dictionary.json');
$dictionary         = json_decode($jsonDictionary, true);
$consoleArguments   = (isset($argv)) ? $argv : null ;

$userInput          = filter_input(INPUT_POST, 'number'); 

$client = new Elasticsearch\Client(array(
    'hosts' => array('http://localhost:9200')
));

$params = array('index' => 'dictionary', 'type'=>'words');
$engine = new src\Engine($client, $dictionary, $params);
$engine->populate($consoleArguments);

if (!empty($userInput)) {
    $t9 = new src\T9($engine);
    $t9->setLimit(10);    
    $t9->getAllCharactersDigits($userInput);
    $t9->combine();
    echo $t9->response();
}
