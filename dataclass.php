<?php
    class User{
        private $user = [];

        public function setUsername($name,$value){
            $this->$user[$name] = $value;
        }

        public function getName($name){
            if(!array_key_exists($name, this->user)){
                return null;
            }

            return $this->user[$name];
        }

        public function getUsername(){
            return $this->user;
        }
    }
?>