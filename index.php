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
        $statement->execute();
        $queryResult = $statement->fetchAll(); //prepare result for client
        $dbh = null;
        return $queryResult;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";

    }
}

function getoneItem()
{

    require ".constant.php";

    try {

        $dbh = new PDO('mysql:host=' . $dbhost . ';dbname=' . $dbname, $user, $pass);
        $query = 'SELECT * FROM filmMakers'; //initalise the Query variable and the commande to execute
        $statement = $dbh->prepare($query);//Prepare Query
        $statement->execute();
        $queryResult = $statement->fetchAll(); //prepare result for client
        $dbh = null;
        return $queryResult;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";

    }

}


function updateFilmMaker($filmMakers)
{


    try {

        require ".constant.php";
        $dbh = new PDO('mysql:host=' . $dbhost . ';dbname=' . $dbname, $user, $pass);
        $query = "UPDATE filmMakers SET lastname = 'Toto', nationality = 'Espagol' WHERE id = $id"; //initalise the Query variable and the commande to execute
        $statement = $dbh->prepare($query);//Prepare Query
        $statement->execute();
        $queryResult = $statement->fetch(); //prepare result for client
        $dbh = null;
        return $queryResult;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";

    }
}


//######################################### Test unitaire ###############################################\\


require ".constant.php";
$cmd = "mysql -u $user -p$pass < Restore-MCU-PO-Final.sql";
exec($cmd);

// Test unitaire de la fonction getAllItems
$Items = getAllItems();
if (count($Items) == 4) {
    echo "Test unitaire de la fonction getAllItems : ";
    echo "OK MON POTE ";
} else {
    echo "Test unitaire de la fonction getAllItems : ";
    echo "PAS OK MON POTE";

}
echo "\n";

//Test unitaire de la fonction getoneItem
$Item = getoneItem();
if (count($Item) == 4) {
    echo "Test unitaire de la fonction GetoneItem : ";
    echo "OK MON POTE ";
} else {
    echo "Test unitaire de la fonction GetoneItem : ";
    echo "PAS OK MON POTE";
}

echo "\n";

//Test unitaire de la fonction updateFilmMaker
$Item = updateFilmMaker(2);
if ($Item('lastname') == 'Toto') {
    echo "Test unitaire de la fonction updateFilmMaker : ";
    echo "OK MON POTE ";
} else {
    echo "Test unitaire de la fonction updateFilmMaker : ";
    echo "PAS OK MON POTE";

}

die();

?>
