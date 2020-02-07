<?php
/**
 * Created by PhpStorm.
 * User: Miguel.SOARES
 * Date: 06.02.2020
 * Time: 13:37
 */

function getAllItems()
{
    require ".constant.php";
    try {

        $dbh = new PDO('mysql:host=' . $dbhost . ';dbname=' . $dbname, $user, $pass);
        $query = 'SELECT * FROM filmmakers';
        $statment = $dbh->prepare($query);//prepare query
        $statment->execute();//execute query
        $queryResult = $statment->fetchAll();//prepare result for client
        $dbh = null;
        return $queryResult;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        return null;
    }
}

function getActorsItem(){
    require ".constant.php";
    try {

        $dbh = new PDO('mysql:host=' . $dbhost . ';dbname=' . $dbname, $user, $pass);
        $query = 'SELECT * FROM actors';
        $statment = $dbh->prepare($query);//prepare query
        $statment->execute();//execute query
        $queryResult = $statment->fetchAll();//prepare result for client
        $dbh = null;
        return $queryResult;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        return null;
    }
}

//Test unitaire de la fonction getAllItems
$items=getAllItems();
if(count($items)==4){
    echo 'OK Funtion getAllItems!!!';
}
else
{
    echo 'BUG !!!';
}

//Test unitaire de la fonction getActorstems
$items=getActorsItem();
if(count($items)==11){
    echo 'OK Function getActorsItems !!!';
}
else
{
    echo 'BUG !!!';
}
?>

