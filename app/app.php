<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Place.php";
    date_default_timezone_set("America/New_York");

    session_start();

    if (empty($_SESSION['list_of_cities'])) {
        $_SESSION['list_of_cities'] = array();
    }

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__.'/../views'
    ));

    $app->get("/", function()  use ($app) {
      return $app['twig']->render('places.html.twig', array('places' => Place::getAll()));
    });

    $app->post("/createplace", function() use ($app) {
      $place = new Place($_POST['city_locale']);
      $place->save();
      return $app['twig']->render('createplace.html.twig', array('newcity' => $place));
    });
    return $app;
?>
