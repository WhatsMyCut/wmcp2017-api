<?php
// DIC configuration

$container = $app->getContainer();

// view renderer
$container['renderer'] = function ($c) {
    $settings = $c->get('settings')['renderer'];
    return new Slim\Views\PhpRenderer($settings['template_path']);
};

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
    return $logger;
};

// db
$container['db'] = function ($c) {
    $settings = $c->get('settings')['db'];
    die ($settings);
    $db_host = $settings['host'];
    $db_user = $settings['user'];
    $db_pass = $settings['pass'];
    $link = mysql_connect($db_host, $db_user, $db_pass);
    if (!$link) {
        die('Could not connect: ' . mysql_errno() . ": " . mysql_error());
    }
    echo 'Connected successfully';
    return $link;
};
