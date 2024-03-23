/* The class "character" in PHP defines properties for a character's full name and country code along
with methods to retrieve these values. */
<?php
// !IMPORTANT: This is an important note about the character class.
class character
{
    private $fullname;
    private $countrycode;
    public function __construct($fullname, $countrycode)
    {
    $this->fullname = $fullname;
    $this->countrycode = $countrycode;
    }


    public function get_fullname()
    {
    return $this->fullname;
    }
    public function get_countrycode()
    {
    return $this->countrycode;
    }
    }
