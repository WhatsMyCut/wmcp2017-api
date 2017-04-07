<?php
// Routes
/*
$app->get('/[{name}]', function ($request, $response, $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/" . $args['name'] . "' route");

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});
*/
$app->get('/about', function ($request, $response, $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/about' route");

    // Render index view
    return $this->renderer->render($response, 'about.phtml', $args);
});

?>