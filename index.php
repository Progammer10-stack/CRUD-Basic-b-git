<?php
/**
 * haal de inloggegevens op uit het bestand config.php
 */
include('config/config.php');

/**
 * wer gaan een data - sourcenamestring maken waarin alle benodigde gegevens
 * staan die nodig zijn om een verbinding te maken met de database
 
 */


$dsn = "mysql:host=$dbHost;
        dbname=$dbName; 
        charset=UTF8";




/** 
 * maak een nieuw PDO-object zodat we een verbinding kunnen maken 
 * met de mysql-sever en database
 
*/



$pdo = new PDO($dsn, $dbUser, $dbPass);






/**
 * maak een select-query die alle gegevens uit de tabel
 * hoogsteachtbaanvaneuropa haalt. sorteer op hoogte aflopend

 */



$sql = "SELECT HAVE.Id
              ,HAVE.Rollercoaster
              ,HAVE..AmusmentPark
              ,HAVE.Country
              ,HAVE.Topspeed
              ,HAVE.Height
              ,DATE_FORMAT(HAVE.YearOfConstruction, '%d-%m-%y') AS YOFC
        FROM HoogsteAchtbaanVanEuropa As HAVE
        ORDER BY HAVE.Height DESC";


/**
 * met de method prepare van het PDO-Object maak je de dql-query 
 * klaar voor het PDO-Object om uitgevoerd te worden. de geprepareerde
 * sql-query stoppen we in een variable $statement
 
 */

$statement = $pdo->prepare($sql);

/**
 * we voren nu de geprepareerde sql-query uit op de database 

 */
$statement->execute();

/**
 * haal de geselecteerde record binnen als een array van objecten en stop deze in de
 * variable $ result
 */
$result = $statement->fetchAll(PDO::FETCH_OBJ);

//toon de geselecteerde data uit de database
var_dump($result);
?>




<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crud basics</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/style.css">
        <link rel="shortcut-icon" href="img/favicon.ico" type="image/x-icon">
</head>

<body>

<div class="container-mt-3">
    <div class="row-justify-content-center">
    <div class="col-8">


<h3>Hoogste achtbanen van Europa!</h3>
</div>
</div>

<div class="row-justify-content-center">
    <div class="col-8">
        <table class="table table-striped table-hover">
<thead>
    <th>Naam achtbaan</th>
     <th>Naam pretpark</th>
      <th>Land</th>
       <th>Topsnelheid</th>
        <th>Hoogte (m)</th>
         <th>Bouwjaar</th>
</thead>
<tbody>
    <tr>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
</tbody>
        </table>

    </div>
</div>

</div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>