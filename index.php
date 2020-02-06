<?php
/**
 * Title  : ICT-151
 * User   : simon.cuany
 * Date   : 06.02.2020
 * Time   : 13:57
 */

$user = "PHPApplication";

$pass = "Pa$\$w0rd";

try {

    $dbh = new PDO('mysql:host=localhost;dbname=mcu', $user, $pass);
    foreach ($dbh->query('SELECT * from actors') as $row) {
        print_r($row);
    }
    $dbh = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

?>