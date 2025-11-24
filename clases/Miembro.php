<?php

abstract class Miembro {
    //Atributos
    public int $id;

    public $nombre;

    public $apellidos;

    public $mail;

    //================== Metodos =====================
    //Constructor
    public function __construct($id, $nombre, $apellidos, $mail){
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> apellidos = $apellidos;
        $this -> mail = $mail;
    }

    // === Getters y Setters ===
        //========= Getters =======
    public function getId(){
        return $this -> id;
    }
    public function getNombre(){
        return $this -> nombre;
    }
    public function getApellidos(){
        return $this -> apellidos;
    }

    public function getMail(){
        return $this -> mail;
    }
        // ======= Setters ========

    public function setId($nuevoId){
        $this ->id = $nuevoId;
    }
    
    public function setNombre($nuevoNombre){
        $this -> nombre = $nuevoNombre;
    }

    public function setApellidos($nuevoApellidos){
        $this -> nombre = $nuevoApellidos;
    }

    public function setMail($nuevoMail){
        $this -> mail = $nuevoMail;
    }

    public function __toString()
    {
        return "Miembro --> Id: $this->id | Nombre: $this->nombre | Apellidos: $this->apellidos | Mail: $this->mail|";
    }

    
}



?>