/* The Db class in PHP establishes a database connection, executes query statements, and returns
results as arrays. */
<?php
class Db
{
    //Database connection variable
    protected static $connection;


    //Connection initialization function
   /**
    * The function `connect` establishes a connection to a MySQL database and returns the connection
    * object.
    *
    * @return The `connect()` function returns the connection to the database after establishing a
    * connection using mysqli_connect().
    */
    public function connect()
    {
        // !IMPORTANT: Function connects to the database and returns the connection
        $connection = mysqli_connect(
            "localhost",
            "root",
            "",
            "demo_lap3"
        );

        mysqli_set_charset($connection, 'utf8');
        // Check connection
        if (mysqli_connect_errno()) {
            echo "Database connection failed: " . mysqli_connect_error();
        }
        return $connection;
    }

    //The function executes the query statement
    public function query_execute($queryString)
    {
        //Initiate connection
        $connection = $this->connect();
        //Execute query execution, query is a function of mysqli library
        $result = $connection->query($queryString);
        $connection->close();
        return $result;
    }

    //The implementation function returns an array of result lists
    /**
     * The function `select_to_array` queries data from the database and returns an array of results.
     *
     * @param queryString The `select_to_array` function you provided is used to execute a query and
     * return the results as an array. The `queryString` parameter is the SQL query that you want to
     * execute to fetch data from the database. This query should be a SELECT statement that retrieves
     * data from one or more tables in
     *
     * @return An array of results from the database query is being returned.
     */
    public function select_to_array($queryString)
    {
        // !IMPORTANT: The function queries data from the database and returns an array of results
        $rows = array();
        $result = $this->query_execute($queryString);
        if ($result == false) return false;
        // while loop is used to output the data array to each element
        while ($item = $result->fetch_assoc()) {
            $rows[] = $item;
        }
        return $rows;
    }
}
