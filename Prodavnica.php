<?php
require_once 'Drzava.php';
require_once 'Database.php';
$drzava = new Drzava;
$conn = new Database;
    class Prodavnica{

            public  $budzet;    
            private $cenaVojnika;
            private $cenaAviona;
            private $cenaTenka;
            private $cenaTopa;

            private $narucenoVojnika;
            private $narucenoAviona;
            private $narucenoTenkova;
            private $narucenoTopova;

            private $narucenoUkupno;


                public function oduzmiBudzet(){

                        $this->narucenoUkupno  = $this->narucenoVojnika  + $this->narucenoAviona + 

                        $this->narucenoTenkova + $this->narucenoTopova;

                }


            public function kupi($conn){

                $this->narucenoVojnika = (int) htmlspecialchars($_POST['kolikoVojnika']);
                $this->narucenoAviona = (int) htmlspecialchars($_POST['kolikoAviona']);
                $this->narucenoTenkova = (int) htmlspecialchars($_POST['kolikoTenkova']);
                $this->narucenoTopova = (int) htmlspecialchars($_POST['kolikoTopova']);

                echo "<div style='width: 200px; height: 300px; margin: 0 auto; border: 1px solid #ccc; margin-top: 200px;
                padding: 30px; font-size: 20px; '>";
                echo "Naruceno vojnika ".$this->narucenoVojnika;
                echo "<br>Naruceno aviona ".$this->narucenoAviona;
                echo "<br>Naruceno tenkova ".$this->narucenoTenkova;
                echo "<br>Naruceno topova ".$this->narucenoTopova;
                echo "<br>Moj budzet je: ".$this->budzet;
                echo "<p><a href = 'Podaci.php'>Nazad</a></p>";
                echo "</div>";

                $this->oduzmiBudzet();

                $this->dodajOruzje($conn);

                //echo "Za uplatu ".$this->narucenoUkupno;

                $sql = ("UPDATE drzave SET budzet =  budzet - $this->narucenoUkupno WHERE id_drzave = 1");

                $stmt = $conn->prepare($sql);
    
                $stmt->execute();
    
                //echo $stmt->rowCount() . " redova promenjeno";

            }

            public function dodajOruzje($conn){

                $sql = ("UPDATE drzave SET broj_vojnika =  broj_vojnika + $this->narucenoVojnika,
                
                
                broj_tenkova = broj_tenkova + $this->narucenoTenkova,
                
                broj_aviona = broj_aviona + $this->narucenoAviona,

                broj_topova = broj_topova +  $this->narucenoTopova
                
                 WHERE id_drzave = 1");

                $stmt = $conn->prepare($sql);
    
                $stmt->execute();
    
                //echo $stmt->rowCount() . " redova promenjeno";



            }


    }

    $prodavnica = new Prodavnica;

    $mojBudzet =  $drzava->mojaSnaga($conn->conn());

    $prodavnica->budzet = $mojBudzet->budzet ?? '';

    $prodavnica->kupi($conn->conn());