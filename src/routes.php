<?php
// Routes

$app->get('/[{name}]', function ($request, $response, $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/" . $args['name'] . "' route");
    $db = $this->db;
    $db_list = mysql_list_dbs($db);
    $result = '';
    while ($row = mysql_fetch_object($db_list)) 
    {
        $result .= $row->Database . "<br>\n";
    }
    mysql_select_db($db_name) or die("Could not select database: " . mysql_errno() . ": " . mysql_error()  ."<br>\n");
    $args['name'] = $result;

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});
