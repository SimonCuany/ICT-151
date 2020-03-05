<?php
/**
 * Title  : ICT-151
 * User   : simon.cuany
 * Date   : 27.02.2020
 * Time   : 13:36
 */

require ("crud.php");
require (".constant.php");
$cmd = "mysql -u $user -p$pass < Restore-MCU-PO-Final.sql";
exec($cmd);

function testcreateFilmMaker(){ //Create one
    $filmMaker = ['firstname'=>'Joe','lastname' => 'Dalton','nationality' => 'us'];

    echo "\n";
    $Items = createFilmMaker(4);
    if (($Items) == 4 + 1) {
        echo "Test d'acceptation (Create) : ";
        echo "Réussis pour ce test";
        echo "\n";
    } else {
        echo "Test d'acceptation (Create) : ";
        echo "Échoué pour ce test";
        echo "\n";
    }
}


function testgetFilmMaker(){ //Get one
    echo "\n";
    $item = getFilmMaker(3);
    if ($item['lastname'] == 'Chamblon') {
        echo "Test d'acceptation (Getone) : ";
        echo "Réussis pour ce test";
        echo "\n";
    } else {
        echo "Test d'acceptation (Getone) : ";
        echo "Échoué pour ce test";
        echo "\n";
    }

}


function testgetFilmMakers(){ //Get All




    $Items = getFilmMakers();
    if (count($Items) == 4) {
        echo "Test d'acceptation (GetAll) : ";
        echo "Réussis pour ce test";
        echo "\n";
    } else {
        echo "Test d'acceptation (GetAll) : ";
        echo "Échoué pour ce test";

    }
}


function testgetFilmMakerByName(){ //Get one by name

}

function testupdateFilmMaker(){  //update one

}


function testdeleteFilmMaker(){ //delete one

}


testgetFilmMaker();         //Function Getone FilmMaker
testgetFilmMakers();        //Function GetAll FilmMakers
testgetFilmMakerByName();   //Function Getone Byname FilmMaker
testupdateFilmMaker();      //Function Edit FilmMaker
testcreateFilmMaker();      //Function Add FilmMaker
testdeleteFilmMaker();      //Function remove one FilmMaker


?>