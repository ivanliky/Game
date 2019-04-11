<?php

class NapadnutaStrana extends Database{

    public $imeNapadnutaDrzava;


    public function NapadnutaDrzava(){

        if(isset($_POST['borba'])){


            if(isset($_POST['objava'])){

            $this->imeNapadnutaDrzava = htmlspecialchars($_POST['objava']) ;
            }
         }

    }

    public function podaciNapadnuteDrzave(){

        $stm = $this->Conn()->prepare("select * from drzave where name =  '{$this->imeNapadnutaDrzava}'");

        $stm->execute();
    
        $res =  $stm->fetch(PDO::FETCH_OBJ);

        return $res;

    }

    public function prikaziPobednika($koeficijent,
                                     $Tvojkoeficijent,
                                     $budzet,
                                     $mojBrojVojnika,
                                     $mojBrojAviona,
                                     $mojBrojTenkova,
                                     $mojBrojTopova,
                                     $mojaSnaga){



            if($mojBrojVojnika > $mojaSnaga->broj_vojnika){

                echo "<p style='font-size: 50px; color: red;'>Nema na raspolaganju toliko vojnika</p>";
    
                }elseif($mojBrojAviona > $mojaSnaga->broj_aviona){
    
                echo "<p style='font-size: 50px; color: red;'>Nema na raspolaganju toliko aviona</p>";
    
                }elseif( $mojBrojTenkova > $mojaSnaga->broj_tenkova){
    
                echo "<p style='font-size: 50px; color: red;'>Nema na raspolaganju toliko tenkova</p>";
    
    
                }elseif($mojBrojTopova > $mojaSnaga->broj_topova){
    
                echo "<p style='font-size: 50px; color: red;'>Nema na raspolaganju toliko topova</p>";
    
                }

        elseif($koeficijent > $Tvojkoeficijent){

          

            $sql = "
                
                UPDATE drzave SET budzet = budzet + $budzet, 
                broj_vojnika = ($mojaSnaga->broj_vojnika - $mojBrojVojnika),
                broj_aviona = ($mojaSnaga->broj_aviona - $mojBrojAviona),
                broj_tenkova = ($mojaSnaga->broj_tenkova - $mojBrojTenkova),
                broj_topova = ($mojaSnaga->broj_topova - $mojBrojTopova)
                
                WHERE id_drzave = 1;";

                echo "<p style='font-size: 50px; color: red;'>Izgubio si</p>";
                echo "<p><a style='color: #fff; font-size: 30px;' href = 'Podaci.php'>Nazad</a></p>";

                die();  

                try {
            
                     $this->conn()->exec($sql);

                }

                catch (PDOException $e)
                {
                    echo $e->getMessage();
                    die();
                }

         }else{

            $sql = "
                UPDATE drzave SET style_id = 1 WHERE name = '{$this->imeNapadnutaDrzava}';

                UPDATE drzave SET budzet = budzet + $budzet, 
                broj_vojnika = ($mojaSnaga->broj_vojnika - $mojBrojVojnika),
                broj_aviona = ($mojaSnaga->broj_aviona - $mojBrojAviona),
                broj_tenkova = ($mojaSnaga->broj_tenkova - $mojBrojTenkova),
                broj_topova = ($mojaSnaga->broj_topova - $mojBrojTopova)
                
                WHERE id_drzave = 1;";

               

         if($this->imeNapadnutaDrzava == 'n6'){

            echo "<p><a style='color: #fff; font-size: 30px;' href = 'Podaci.php'>Nazad</a></p>";  
            die("<h1>Ti si pobedio u igri , cestitam</h1>");
            $this->UnesiDobitak($budzet);
            

         }else{ 
             
          

        echo "<p style='font-size: 50px; color: green;'>Cestitam, osvojio si drzavu: $this->imeNapadnutaDrzava </p>";

        echo "<p><a style='color: #fff; font-size: 30px;' href = 'Podaci.php'>Nazad</a></p>";
        $this->UnesiDobitak($budzet);
       
         }

        try {
            
            $stmt = $this->conn()->exec($sql);
          
        }
        catch (PDOException $e){

            echo $e->getMessage();
            die();
        }


        die(); //provera
        
         }
    }

           public function UnesiDobitak($budzet){

     
            $sql = ("UPDATE drzave SET budzet =  budzet + $budzet WHERE id_drzave = 1");

            $stmt = $this->Conn()->prepare($sql);

            $stmt->execute();

            echo $stmt->rowCount() . " podataka uneseno";

            echo "<br>Budzet je ".$budzet.' dinara';

           } 


        public function podaciODrzavi($koeficijent,$res){

            
            echo "<p class='size'>Napao si drzavu:  $this->imeNapadnutaDrzava</p>";

            echo "<p class='size'>Koeficijent napadnute drzave je: $koeficijent</p>";

            echo "<p class='size'>Broj vojnika napadnute drzave je : $res->broj_vojnika</p>";

            echo "<p class='size'>Broj aviona napadnute drzave je : $res->broj_aviona</p>";

            echo "<p class='size'>Broj tenkova napadnute drzave je : $res->broj_tenkova</p>";

            echo "<p class='size'>Broj topova napadnute drzave je : $res->broj_topova</p>";

            echo "<p class='size'>Budzet napadnute drzave je : $res->budzet</p>";

        
        }


        public function BudzetNapadnuteDrzave($res){

                return $res->budzet;
        }
    

        public function infoDrzave($conn){

            $id = htmlspecialchars($_GET['id']);
       
            $stm = $conn->prepare("select * from drzave where id_drzave = $id");

            $stm->execute();
            
            $res =  $stm->fetch(PDO::FETCH_OBJ);
         
            echo "<p>Ime drzave: $res->name </p>";
            echo "<p>Broj vojnika: $res->broj_vojnika</p>";
            echo "<p>Budzet: $res->budzet</p>";
            echo "<p>Broj tenkova: $res->broj_tenkova</p>";
            echo "<p>Broj aviona: $res->broj_aviona</p>";
            echo "<p>Broj topova: $res->broj_topova</p>";
            echo "<p>Koeficijent drzave: $res->koficijent_drzave</p>";

        }

    
}