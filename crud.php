<?php
/**
 * Title  : ICT-151
 * User   : simon.cuany
 * Date   : 27.02.2020
 * Time   : 13:35
 */

//Get the informations of the database and put them in the function getPDO
function getPDO()
{
    require ".constant.php";
    $dbh = new PDO('mysql:host=' . $dbhost . ';dbname=' . $dbname, $user, $pass);
    return $dbh;

}


function createFilmMaker($filmmaker)
{


    try {

        $dbh = getPDO();
        $query = 'INSERT INTO filmmaker value (filmaker =:filmaker)'; //initalise the Query variable and the commande to execute
        $statement = $dbh->prepare($query);//Prepare Query
        $statement->execute();
        $queryResult = $statement->fetchAll(); //prepare result for client
        $dbh = null;
        return $queryResult;

    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "\n";

    }
} //don't work


function getFilmMaker($id)
{
    require ".constant.php";
    try {
        $dbh = getPDO();
        $query = 'SELECT * FROM filmmakers where id =:id'; //initalise the Query variable and the commande to execute
        $statement = $dbh->prepare($query);//Prepare Query
        $statement->execute(['id'=>$id]);
        $queryResult = $statement->fetch(PDO::FETCH_ASSOC); //prepare result for client
        $dbh = null;
        return $queryResult;

    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "\n";

    }
} //don't work

function getFilmMakers()
{
    require ".constant.php";
    try {
        $dbh = getPDO();
        $query = 'SELECT * FROM filmmakers'; //initalise the Query variable and the commande to execute
        $statement = $dbh->prepare($query);//Prepare Query
        $statement->execute();
        $queryResult = $statement->fetchAll(); //prepare result for client
        $dbh = null;
        return $queryResult;

    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "\n";

    }

} //Work great



function getFilmMakerByName($name)
{

}

function updateFilmMaker($filmMaker)
{

}


function deleteFilmMaker($id)
{

}


?>