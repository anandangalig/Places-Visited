<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Place.php";
    date_default_timezone_set("America/New_York");

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__.'/../views'
    ));

    $app->get("/", function()  use ($app) {
      $first_place = new Place('Hawaii');
      $second_place = new Place('New York');
      $places = array($first_place, $second_place);
      return $app['twig']->render('places.html.twig', array('places' => $places));

    });
    return $app;
?>
