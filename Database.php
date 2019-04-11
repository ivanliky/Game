<?php
require_once 'config.php';


    class Database {

        private $conn;
   
       

        public function __construct(){

            $this->conn = new pdo(DRIVER,USER,PASS); 
            $this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, 0);  
                
        }

        public function Conn(){

            return $this->conn;

        }


        public function unesiSliku(){

            if(isset($_POST['igrac'])) {
    
                $file = $_FILES['file'];
                $file_name = $file['name'];
                $file_type = $file ['type'];
                $file_size = $file ['size'];
                $file_path = $file ['tmp_name'];
                
                
   if($file_name!="" && ($file_type="image/jpeg"||$file_type="image/png"||$file_type="image/gif")&& $file_size<=614400){
                
                $ime = htmlspecialchars($_POST['imeIgraca']);
                $prezime = htmlspecialchars($_POST['prezimeIgraca']);
                
                if(move_uploaded_file ($file_path,'upload/'.$file_name)){
                
                    $statement = $this->conn->prepare('INSERT INTO igrac (photo,ime,prezime)
                    VALUES (:photo,:ime,:prezime)');
                
                
                $statement->execute(['photo' => $file_name,'ime'=> $ime, 'prezime'=>$prezime]);
                       
                        }
                    }
                
                }
    

        }

        

        public function prikaziAvatar(){

         
            $stm = $this->conn->prepare("SELECT photo, ime, prezime FROM igrac where id=(SELECT max(id) from igrac)");
            $stm->execute();
            $res =  $stm->fetch(PDO::FETCH_ASSOC);
            return $res;
            
            
        }


    }