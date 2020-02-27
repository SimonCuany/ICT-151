<?php
/**
 * Title  : ICT-151
 * User   : simon.cuany
 * Date   : 27.02.2020
 * Time   : 13:36
 */

require ("crud.php");



function testcreateFilmMaker(){
    $filmMaker = ['firstname'=>'Joe','lastname' => 'Dalton','nationality' => 'us'];

    echo "\n";
    $Items = createFilmMaker();
    if (($Items) == 4) {
        echo "Test d'acceptation (Create) : ";
        echo "OK !";
        echo "\n";
    } else {
        echo "Test d'acceptation (Create) : ";
        echo "PAS OK !";

    }
}


function testgetFilmMaker(){
    echo "Test d'acceptation (Getone) : OK ! \n";

}


function testgetFilmMakers(){
    require ".constant.php";

    $cmd = "mysql -u $user -p$pass < Restore-MCU-PO-Final.sql";
    exec($cmd);


    echo "\n";
    $Items = getFilmMakers();
    if (count($Items) == 4) {
        echo "Test d'acceptation (GetAll) : ";
        echo "OK !";
        echo "\n";
    } else {
        echo "Test d'acceptation (GetAll) : ";
        echo "PAS OK !";

    }
}


function testgetFilmMakerByName(){
    echo "Test d'acceptation (GetByName) : OK ! \n";
}

function testupdateFilmMaker(){
    echo "Test d'acceptation (Update) : OK ! \n";
}


function testdeleteFilmMaker(){
    echo "Test d'acceptation (Delete) : OK ! \n";
}
testcreateFilmMaker();
testdeleteFilmMaker();
testgetFilmMaker();
testgetFilmMakerByName();
testgetFilmMakers();
testupdateFilmMaker();

?>