/* The class "staff" extends the "character" class and includes properties for staff code and part,
with methods to retrieve these values and generate a unique staff code. */
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
        $this->part = $part; // TODO: Consider adding validation for the part property.
    }
    /**
     * The above PHP class contains methods to retrieve staff code and part of a staff member, as well
     * as a private method to generate a unique staff code each time it's called.
     *
     * @return The `StaffCode_continue()` method is returning a unique staff code each time it's
     * called. The method uses a static variable `` to keep track of the staff code and
     * increments it by 1 each time the method is called.
     */

       // !IMPORTANT: Method to retrieve the staff code of the staff member
        public function getStaffCode()
        {
            return $this->staffcode;
        }

        // !IMPORTANT: Method to retrieve the part of the staff member
        public function getPart()
        {
            return $this->part;
        }

        // !IMPORTANT: Method to generate and return a unique staff code each time it's called
        private function StaffCode_continue()
        {
            static $makecode = 1;
            return $makecode++;
        }
}
?>
