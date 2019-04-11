<?php

    class Igrac {

        public $ime;
        public $prezime;


        public function podaci(){

            if(isset($_POST['igrac'])){

            $this->ime = htmlspecialchars($_POST['imeIgraca']);
            $this->prezime = htmlspecialchars($_POST['prezimeIgraca']);
        }

    }
}