<?php
/**
 * Title  : ICT-151
 * User   : simon.cuany
 * Date   : 06.02.2020
 * Time   : 13:57
 */

function getPDO()
{
    require ".constant.php";
    $dbh = new PDO('mysql:host=' . $dbhost . ';dbname=' . $dbname, $user, $pass);
    return $dbh;


}

function getAllItems()
{

    try {
        $dbh = getPDO();
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



    try {

        $dbh = getPDO();
        $query="SELECT * FROM filmmakers WHERE id=$id";
        $statement = $dbh->prepare($query);//Prepare Query
        $statement->execute();
        $queryResult = $statement->fetchAll(); //prepare result for client
        $dbh = null;
        return $queryResult;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";

    }

}

function getFilmMaker($id)
{

    try {
        $dbh = getPDO();
        $query = "SELECT * FROM filmakers ";
        $statment = $dbh->prepare($query);//prepare query
        $statment->execute();//execute query
        $queryResult = $statment->fetch();//prepare result for client
        $dbh = null;
        return $queryResult;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        return null;
    }
}

function updateFilmMaker($filmMakers)
{


    try {


        $dbh = getPDO();
        $query = "UPDATE filmMakers SET
                      filmakernumber=:filmakernumber,
                      lastname =:lastname, 
                      nationality =:nationality 
                      WHERE id =:id"; //initalise the Query variable and the commande to execute
        $statement = $dbh->prepare($query);//Prepare Query
        $statement->execute();
        $queryResult = $statement->fetchAll(); //prepare result for client
        $dbh = null;
        return $queryResult;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";

    }
}


//SELECT COLUMN_NAME
//  FROM INFORMATION_SCHEMA.COLUMNS
//  WHERE TABLE_SCHEMA = 'mcu' AND TABLE_NAME = 'filmmakers';


//######################################### Test unitaire ###############################################\\


require ".constant.php";
$cmd = "mysql -u $user -p$pass < Restore-MCU-PO-Final.sql";
exec($cmd);

// Test unitaire de la fonction getAllItems
echo "\n";
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
if (count($Item) == 1) {
    echo "Test unitaire de la fonction GetoneItem : ";
    echo "OK MON POTE ";
} else {
    echo "Test unitaire de la fonction GetoneItem : ";
    echo "PAS OK MON POTE";
}

echo "\n";

//Test unitaire de la fonction updateFilmMaker
//$Item = GetFilmMaker();
//if () {
//    echo "Test unitaire de la fonction GetFilmMaker : ";
//    echo "OK MON POTE ";
//} else {
//    echo "Test unitaire de la fonction GetFilmMaker : ";
//    echo "PAS OK MON POTE";
//
//}
//
//die();

?>
