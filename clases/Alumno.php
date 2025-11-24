<?php

require_once "Miembro.php";
class Alumno extends Miembro{
    //Atributos
    public int $edad;
    //Se inicia con un array vacio
    public array $asignaturas = [];

    //Se inicia en false, una vez que llamas a la funcion de abonar se vuelve true
    public bool $cursoAbonado = false;

    //Constructor:
        //Para crear los alumnos por defecto, se da valores a asignaturas y a curso abonado para que al llamar no dé error.
    public function __construct($id, $nombre, $apellidos, $mail, $edad, $asignaturas = [], $cursoAbonado = false){
        parent::__construct($id, $nombre, $apellidos, $mail);
        $this->edad = $edad;
        $this->asignaturas = $asignaturas;
        $this->cursoAbonado = $cursoAbonado;
    }


    //Metodos
        //GEtter y Setter Edad
        //Abonar curso
    public function abonarCurso(){
        return $this->cursoAbonado = true;
    }

    //Esta funcion, acepta una asignatura como parametro, y por in_array busca si hay alguna coincidencia 
    //Caso exista no deja que el alumno se matricule dos veces en la misma asignatura.
    public function matricularseEnAsignatura($asignatura){
        foreach ($this->asignaturas as $a){
            if ($a->nombre === $asignatura->nombre){
                return "El alumno ya esta matriculado en esta asignatura: $asignatura->nombre.";
            }
        }
        //Si no encuentra coincidencias.
        $this->asignaturas[] = $asignatura;
            return "El alumno ha sido matriculado en $asignatura->nombre correctamente.";
        /*
        if(in_array($asignatura, $this->asignaturas)){
            return "El alumno ya esta matriculado en esta asignatura: $asignatura->nombre.";
        }else{
            $this->asignaturas[] = $asignatura;
            return "El alumno ha sido matriculado en $asignatura->nombre correctamente.";
        }
        */
    }

    //Crear get nombde asignatura. 
    public function getNombreAsignatura(): string {
        //fn es una funcion anonima, de manera muy corta, se usa para operaciones simples. 
        //es una funcion sin nombre, con un parámetro.
        return implode(" ,", array_map(fn($a) => $a->nombre, $this->asignaturas));
    }    

    //Crear alumnos de muestra

    public static function crearAlumnosDeMuestra(){
        return[
            new Alumno(1, "Laura", "Martínez", "laura.martinez@email.com", 22),
        new Alumno(2, "Sergio", "López", "sergio.lopez@email.com", 25),
        new Alumno(3, "Carlos", "García", "carlos.garcia@email.com", 24),
        new Alumno(4, "Marta", "Sánchez", "marta.sanchez@email.com", 23),
        new Alumno(5, "Alba", "Fernández", "alba.fernandez@email.com", 21),
        new Alumno(6, "David", "Rodríguez", "david.rodriguez@email.com", 26),
        new Alumno(7, "Lucía", "Jiménez", "lucia.jimenez@email.com", 20),
        new Alumno(8, "Jorge", "Pérez", "jorge.perez@email.com", 22),
        new Alumno(9, "Elena", "Romero", "elena.romero@email.com", 23),
        new Alumno(10, "Pablo", "Torres", "pablo.torres@email.com", 24),
        ];
        

}
}

?>