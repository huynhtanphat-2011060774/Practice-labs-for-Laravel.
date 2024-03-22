<?php
require_once("character.php");

class staff extends character
{
    private $staffcode;
    private $part;

    public function __construct($fullname_staff, $countrycode, $part)
    {
        parent::__construct($fullname_staff, $countrycode);
        $this->staffcode = $this->StaffCode_continue();
        $this->part = $part;
    }

    public function getStaffCode()
    {
        return $this->staffcode;
    }

    public function getPart()
    {
        return $this->part;
    }

    private function StaffCode_continue()
    {
        static $makecode = 1;
        return $makecode++;
    }
}
?>
