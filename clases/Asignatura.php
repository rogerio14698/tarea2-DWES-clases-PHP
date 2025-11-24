<?php
class Asignatura{ 
    //Atributos

    public $id;
    public $nombre;

    public $creditos;
    

    //Constructor

    public function __construct($id, $nombre, $creditos){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->creditos = $creditos;
    }
    //Metodo de crear asignatura de muestra. 

    public static function crearAsignaturaDeMuestra(){
        return [
            new Asignatura(1, "DWES", "7 créditos"), //0
            new Asignatura(2, "DWEC", "6 créditos"), //1
            new Asignatura(3, "DIW", "4 créditos"), // 2
            new Asignatura(4, "DAW", "4 créditos"), // 3
        ];
    }


}



?>