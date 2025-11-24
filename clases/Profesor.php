<?php
    class Profesor {
        //Atributos 

        public bool $titular;
        
        public $asignatura;

        public int $id;

        public $nombre;

        public $mail;


        //Constructor
        //Se puede hacer como un objeto de la clase Asignatura.
        public function __construct($id, $nombre, $mail, Asignatura $asignatura, $titular = false){
            $this->id = $id;
            $this->nombre = $nombre;
            $this->mail = $mail;
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

        public static function crearProfesoresDeMuestra(){
            $asignaturas = Asignatura::crearAsignaturaDeMuestra();
            return [
                new Profesor(1, "Steve Wozniak", "steve@apple.com", $asignaturas[0]),
                new Profesor(2, "Ada Lovelace", "ada@gmail.com", $asignaturas[2]),
                new Profesor(3, "Taylor Otwell", "taylor@laravel.com", $asignaturas[1]),
                new Profesor(4, "Rasmus Lerdoff", "rasmus@php.com", $asignaturas[3]),
            ];
        }



    }


?>