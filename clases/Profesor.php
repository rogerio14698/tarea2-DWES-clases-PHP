<?php
    class Profesor {
        //Atributos 

        public bool $titular;
        
        public $asignatura;

        public $id;

        public $nombre;

        public $mail;


        //Constructor
        public function __construct($titular = false, $asignatura){
            $this->asignatura = $asignatura;
        }

        //Getters y Setters

        public function getTitular(){
            return $this -> titular;
        }
        public function getAsignatura(){
            return $this -> asignatura;

        }

        //El bool enfrente del parametro  fuerza a que solo acepte valores de tipo bolean
        public function setTitular(bool $nuevoTitular){
            $this -> titular = $nuevoTitular;
        }

        public function setAsignatura($nuevaAsignatura){
            return $this -> asignatura = $nuevaAsignatura;
        }

        //Metodo de crear un profesor de muestra.

        public static function crearProfesoreDeMuestra(){
            return [
                new Profesor(false, "Lengua"),
                new Profesor(false, "Lengua"),
                new Profesor(false, "Lengua"),
            ];
        }



    }


?>