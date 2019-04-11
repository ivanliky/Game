<?php
require_once 'database.php';
require 'Drzava.php';
require 'Igrac.php';


$database = new Database;
$conn = $database->Conn();
$drzava = new Drzava;
$igrac = new Igrac;
$igrac->podaci();
$mojaSnaga = $drzava->mojaSnaga($conn);
$drzava->azurirajKoeficijent($conn);
$drzava->unesiKoeficijent($conn);
$database->unesiSliku();

$title = "Pocetna";
$href = "style.css";
require 'bodyUp.php';
?>

    <h1 class='title'>Imperija</h1>
    <div id="wrapper">
        <div class="igrac">
      
         <p>Ime: <?php echo  $database->prikaziAvatar()['ime'] ?? ''; ?></p>
         <p>Prezime: <?php echo $database->prikaziAvatar()['prezime'] ?? ''; ?></p>
          <p>Drzava: <?php echo $mojaSnaga->name ?? ''; ?></p>
         <p>Raspolozivi novac: <?php echo $mojaSnaga->budzet ?? ''; ?></p>
         <p><a href="reset.php">Resetuj igru</a></p>
         </div>

    <div class="igrac">
        <p class="center">Avatar</p>
        <?php
        echo "<img src='upload/".$database->prikaziAvatar()['photo']."' height = '150px' width = '200px' alt='Avatar'>" ;
        ?>
    </div>
    <div class="igrac pravila">
      <p>Potrebno je osvojiti svaku drzavu oznacenu crvenom linijom. Klikom na link unutar te linije se vidi snaga te drzave
       i koliko je potrebno kupiti oruzja da bi se ta drzava osvojila. Pri svakom osvajanju se oduzima oruzje, pa se mora kupiti 
       od novca koji se dobija od osvojene drzave. Ukoliko se u borbu povede veci broj od potrebnog, sve se gubi</p>
    </div>
    <div class="igrac">
    <p class="center">Raspoloziva snaga</p>
    <ul>
    <li>Vojnici: <?php  echo $mojaSnaga->broj_vojnika ?? '' ?></li>
    <li>Tenkovi: <?php  echo $mojaSnaga->broj_tenkova ?? ''?></li>
    <li>Avioni: <?php  echo $mojaSnaga->broj_aviona ?? ''?></li>
    <li>Topovi: <?php  echo $mojaSnaga->broj_topova ?? '' ?></li>
    </ul>
    </div>
    
    <!-- <div class="igrac">
        <p class="center">Municija</p>
        <ul>
            <li>Municija za granate: 452</li>
            <li>Municija za pistolj: 32424</li>
            <li>Municija za snajper: 1223</li>
            <li>Municija za tenk: 1234</li>
            <li>Rakete za avion: 345</li>   
        </ul>
    </div> -->

    <div class="igrac vece">
        <p class="center">Prodavnica</p>
        <form action="Prodavnica.php" method="post">

        <label for="kolikoVojnika">Broj Vojnika</label>
        <input type="text"  name='kolikoVojnika' id='kolikoVojnika'><br>

        <label for="kolikoAviona">Broj Aviona</label>
        <input type="text"  name='kolikoAviona' id='kolikoAviona'><br>

        <label for="kolikoTenkova">Broj Tenkova</label>
        <input type="text" name='kolikoTenkova' id='kolikoTenkova'><br>

        <label for="kolikoTopova">Broj Topova</label>
        <input type="text" name='kolikoTopova' id='kolikoTopova'><br>

        <input type="submit" name="kupi" value="Kupi">
        
        
        </form>
        
    </div>
    <div  class="borba clearfix">
        <p class="center color">Kreni u pohod</p>
        <form action="Borba.php" method='post'>
        <label for="objava">Ime drzave koju napadas</label>
        <select name="objava" id="objava">
        <?php    
            $drzava->SveDrzave($conn);      
        ?>
        </select><br>

        <label for="brojTenkova">Broj tenkova</label>
        <input type="text" name='brojTenkova' id='brojTenkova'><br>
        <label for="brojVojnika">Broj vojnika za borbu</label>
        <input type="text" name='brojVojnika' id='brojVojnika'><br>
        <label for="brojAviona">Broj aviona za borbu</label>
        <input type="text" name='brojAviona' id='brojAviona'><br>
        <label for="brojTopova">Broj topova za borbu</label>
        <input type="text" name='brojTopova' id='brojTopova'><br>
        <input type="submit" name="borba" value="Kreni u napad">
        </form>
    </div>

    <?php $drzava->Drzave($conn);?>

    </div>

     
</body>
</html>