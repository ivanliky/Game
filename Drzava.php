<?php

    class Drzava {

            public $niz = [];
            public $ids = [];
      
            

            public function Drzave($conn){

                $stm = $conn->prepare('select * from drzave join style on style.id = drzave.style_id');
                $stm->execute();
                  echo "<div class='clearfix'>"; 
                  echo "<h3>Drzave koje treba osvojiti</h3>";
              
                  while($result = $stm->fetch(PDO::FETCH_OBJ)){
                      if($result->id_drzave === 1){
                               continue; 
                      }
                      $width = ($result->koficijent_drzave/1000);
                      echo "<div class='bar' style=\"width:{$width}px; height:{$result->height}px; background-color:$result->color;\" >
                      <a style='font-size: 30px;' href=infoDrzave?id=$result->id_drzave class='link'>$result->name</a>
                      </div>";
                      
                  };
                    
                  echo "</div>";
            }

            public function mojaSnaga($conn){

                $stm = $conn->prepare('select * from drzave where id_drzave = 1');
                $stm->execute();
                $res =  $stm->fetch(PDO::FETCH_OBJ);
                return $res;

            }

            public function racunajKoeficijent($res){

            

            $koeficijent =  $res->broj_vojnika + ($res->broj_tenkova * 20) + ($res->broj_aviona * 45) +
                      ($res->broj_topova * 11);

                       return $koeficijent;
                       $koeficijenti[] = $res;
              
            }

            public function tvojKoeficijent($broj_vojnika,$broj_tenkova, $broj_aviona, $broj_topova){

                $Tvojkoeficijent =  $broj_vojnika + ($broj_tenkova * 20) + ($broj_aviona * 45) +
                      ($broj_topova * 11);
 
                       return $Tvojkoeficijent;

            }

            public function azurirajKoeficijent($conn){

                $stm = $conn->prepare('select id_drzave from drzave;');
                $stm->execute();
                $res =  $stm->fetchAll(PDO::FETCH_ASSOC);

                        foreach($res as $ids){

                         $this->ids[] =  $ids["id_drzave"];
                         $id = $ids["id_drzave"];

                         $stm = $conn->prepare('select * from drzave where id_drzave = ?');
                         $stm->execute([$id]);
                         $res =  $stm->fetch(PDO::FETCH_OBJ);  
                         $this->niz[] = $this->racunajKoeficijent($res); 
                         
                        }

           }

           public function unesiKoeficijent($conn){

                         $stm = $conn->prepare('select id_drzave from drzave;');
                         $stm->execute();
                         $res =  $stm->fetchAll(PDO::FETCH_ASSOC);
                    
                         $sql = "update drzave set koficijent_drzave = ? where id_drzave = ?";

                       
                        foreach($this->niz as $niz){


                        $stmt= $conn->prepare($sql);
                     
                       $stmt->execute([$niz , $this->ids[0]++]);
                     
                    }
                
           }

           public function SveDrzave($conn){

            $stm = $conn->prepare('select name from drzave');
            $stm->execute();
            while($res =  $stm->fetch(PDO::FETCH_ASSOC)){;

                if($res['name'] == 'Srbija'){
                    continue; 

           }
                echo  "<option value=". $res['name'].">".$res['name']  ."</option>";
                
           }
}


}

   