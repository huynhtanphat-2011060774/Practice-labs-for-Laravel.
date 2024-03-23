/* The PHP class 'member' represents a member entity with private properties for fullname, email, and
member ID, including methods to retrieve these properties. */
<?php

/*
    This PHP script defines a class 'member' representing a member entity
    with private properties for fullname, email, and member ID.
    It also includes methods to retrieve these properties.
*/

// Including external support methods
require_once("support.php");

class member {
    // Private properties
    private $fullname;
    private $email;

    // ? Is there any special reason for using external function for generating member ID?
    private $idmember;

    // Constructor to initialize object with fullname and email
   // TODO: Consider adding validation for fullname and email parameters in the constructor
public function __construct($fullname, $email) {
    $this->fullname = $fullname;
    $this->email = $email;
     // PERFORMANCE: Consider caching member ID for better performance if idcontinue() is expensive
    $this->idmember = idcontinue();
}


// FIXME: Destructor seems unnecessary, object properties are automatically released in PHP
public function __destruct() {
    // Nullifying object properties to release memory
    $this->fullname = NULL;
    $this->email = NULL;
    $this->idmember = NULL;
}

  /**
   * The PHP class contains methods to retrieve the full name, email address, and member ID of a
   * member.
   *
   * @return The `get_fullname()` method returns the full name of the member, the `get_email()` method
   * returns the email address of the member, and the `get_id()` method returns the member ID.
   */
    // !IMPORTANT: Method to retrieve the full name of the member
    public function get_fullname() {
        return $this->fullname;
    }

  // !IMPORTANT: Method to retrieve the email address of the member
    public function get_email() {
        return $this->email;
    }

// !IMPORTANT: Method to retrieve the member ID
    public function get_id() {
        return $this->idmember;

    }
}

?>
