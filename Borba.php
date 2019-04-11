<?php
require_once 'Database.php';
require_once 'Drzava.php';
require_once 'NapadnutaStrana.php';
$title = "Borba";
$href = 'style.css';
require 'bodyUp.php';
?>

<h1>Bojno polje</h1>
   
    <?php 

    $drzava = new Drzava;
  
    $mojBrojVojnika = (int)htmlspecialchars($_POST['brojVojnika']); 
    $mojBrojTenkova = (int)htmlspecialchars($_POST['brojTenkova']);  
    $mojBrojAviona = (int)htmlspecialchars($_POST['brojAviona']);  
    $mojBrojTopova = (int)htmlspecialchars($_POST['brojTopova']); 

    $napdnutaDrzava = new NapadnutaStrana;

    $conn = $napdnutaDrzava->Conn();

    $mojaSnaga = $drzava->mojaSnaga($conn);

    $napdnutaDrzava->NapadnutaDrzava();

    $res = $napdnutaDrzava->podaciNapadnuteDrzave();

    $koeficijent = $drzava->racunajKoeficijent($res);

    $tvojKoeficijent = $drzava->tvojKoeficijent($mojBrojVojnika,
                                                $mojBrojTenkova,
                                                $mojBrojAviona, 
                                                $mojBrojTopova );

    echo $napdnutaDrzava->podaciODrzavi($koeficijent,$res);

    $budzet = $napdnutaDrzava->BudzetNapadnuteDrzave($res);

    $napdnutaDrzava->prikaziPobednika($koeficijent, 
                                      $tvojKoeficijent,
                                      $budzet,
                                      $mojBrojVojnika,
                                      $mojBrojAviona,
                                      $mojBrojTenkova,
                                      $mojBrojTopova,
                                      $mojaSnaga);


    echo "<br>Tvoj broj vojnika: ".$mojBrojVojnika."<br>";
    echo "Tvoj broj tenkova: ".$mojBrojTenkova."<br>";
    echo "Tvoj broj aviona: ".$mojBrojAviona."<br>";
    echo "Tvoj broj topova: ".$mojBrojTopova."<br>";

 ?>

 <a href="Podaci.php">Nazad</a>



</body>
</html>



