<?php
class Place
{
    private $city;
    // private $state;
    // private $stay;

    function __construct($visited_city) //, $visited_state, $stay_length)
    {
        $this->city = $visited_city;
        // $this->state = $visited_state;
        // $this->stay = $stay_length;
    }

    function setCity($new_city)
    {
        $this->city = (string) $new_city;
    }

    function getCity()
    {
        return $this->city;
    }

    function save()
    {
        array_push($_SESSION['list_of_cities'], $this);
    }

    static function getAll()
    {
        return $_SESSION['list_of_cities'];
    }

    static function deleteAll()
    {
        $_SESSION['list_of_cities'] = array();
    }
}
?>
