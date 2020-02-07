<?php
/**
 * Title  : ICT-151
 * User   : simon.cuany
 * Date   : 06.02.2020
 * Time   : 13:57
 */


function getAllItems()
{

    require ".constant.php";

    try {

        $dbh = new PDO('mysql:host=' . $dbhost . ';dbname=' . $dbname, $user, $pass);
        $query = 'SELECT * FROM filmmakers'; //initalise the Query variable and the commande to execute
        $statement = $dbh->prepare($query);//Prepare Query
        $statement ->execute();
        $queryResult = $statement->fetchAll(); //prepare result for client
        $dbh = null;
        return $queryResult;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
}

function getoneItem() {

    require ".constant.php";

    try {

        $dbh = new PDO('mysql:host=' . $dbhost . ';dbname=' . $dbname, $user, $pass);
        $query = 'SELECT * FROM filmmakers'; //initalise the Query variable and the commande to execute
        $statement = $dbh->prepare($query);//Prepare Query
        $statement ->execute();
        $queryResult = $statement->fetchAll(); //prepare result for client
        $dbh = null;
        return $queryResult;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }

}
// Test unitaire de la fonction getAllItems
$Items = getAllItems();
if (count($Items) == 4) {
    echo "Test unitaire de la fonction getAllItems : ";
    echo "OK MON POTE
";
} else {
    echo "Test unitaire de la fonction getAllItems : ";
    echo "PAS OKE MON POTE";
}

//Test unitaire
$Item = getoneItem();
if (count($Item) == 4) {
    echo "Test unitaire de la fonction GetoneItem : ";
    echo "OK MON POTE";
} else {
    echo "Test unitaire de la fonction GetoneItem : ";
    echo "PAS OKE MON POTE";
}
?>
