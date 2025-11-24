<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarea 2 DWES</title>
    <style>
    .table {
        border: 1px solid black;
        border-collapse: collapse;
        padding: 5px;

    }

    .table th,
    td {
        border: 1px solid black;
        padding: 5px;
    }
    </style>
</head>

<body>
    <?php
        require("clases/Miembro.php");
        require("clases/Alumno.php");
        require("clases/Asignatura.php");
        require("clases/Profesor.php");

        $alumnos = Alumno::crearAlumnosDeMuestra();
        $profesores = Profesor::crearProfesoresDeMuestra();
        $asignaturas = Asignatura::crearAsignaturaDeMuestra();
    ?>
    <nav>
        <a href="biblioteca.php">Biblioteca</a>
        <a href="index.php">Index</a>
        <a href="triangle.php">Generador de Triangulo</a>
    </nav>

    <h2>ALUMNOS: Listado de todos los Alumnos</h2>
    <table class="table">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Edad</th>
            <th>Asignaturas</th>
            <th>Curso Abonado</th>
        </tr>
        <?php foreach ($alumnos as $alumno): ?>
        <tr>
            <td> <?= $alumno->id ?> </td>
            <td> <?= $alumno->nombre ?> </td>
            <td> <?= $alumno->mail ?> </td>
            <td> <?= $alumno->edad ?> </td>
            <!-- No se como funciona esto bien, buscar el porque se hace así
    <td> <//?= $alumno->asignaturas ?> </td>-->
            <!--Buscar implode
            Implode se usa para convertir un Array como un unico texto,
            se pone de 1º parametro un separador, y luego el array. 
        -->
            <td><?= implode(", ", $alumno->asignaturas) ?></td>
            <!--Como vimos en el 1º año de DAW, esto es como un if, el lado izquierdo es 1, el lado derecho es 0
            Lo que viene a ser: If "tacata "else "tacata"
        
        -->
            <td> <?= $alumno->cursoAbonado ? "True" : "False" ?> </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h2>PROFESORES: Listado de todos los profesores</h2>

    <table class="table">
        <tr>
            <td>ID</td>
            <td>NOMBRE</td>
            <td>MAIL</td>
            <td>ASIGNATURA</td>
        </tr>
        <?php foreach ($profesores as $profesor): ?>

        <tr>
            <td><?= $profesor->id ?></td>
            <td><?= $profesor->nombre ?></td>
            <td><?= $profesor->mail ?></td>
            <td><?= $profesor->getAsignatura()->nombre; ?></td>

        </tr>
        <?php endforeach; ?>

    </table>

    <h2>ALUMNOS MENORES DE 23: Listado de alumnos menores de 23 años</h2>
    <table class="table">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Edad</th>
            <th>Asignaturas</th>
            <th>Curso Abonado</th>
        </tr>
        <?php
        /*
        Primero filtramos y almacenamos en una variable todos los alumnos que cumplan el requisito
        de ser menores de 23, despues sobre cada uno de ellos hacemos un for each para mostrar en el listado
         **Como en el ejemplo de clase es return  $alumno["edad"] < 18; Ahora en nuestro caso al ser un objeto, 
        se hace de esta forma. 

}); 
        */
            $alumnosMenoresDe23 = array_filter($alumnos, function ($alumno){
                return $alumno->edad < 23;
            });
            foreach ($alumnosMenoresDe23 as $alumno):
        ?>

        <tr>
            <td><?= $alumno->id ?></td>
            <td><?= $alumno->nombre ?></td>
            <td><?= $alumno->mail ?></td>
            <td><?= $alumno->edad ?></td>
            <td><?= implode(", ", $alumno->asignaturas) ?></td>
            <td> <?= $alumno->cursoAbonado ? "True" : "False" ?> </td>
        </tr>
        <?php endforeach; ?>


    </table>

    <h2>ALUMNOS CON AL MENOS DOS ASIGNATURAS: Listado de alumnos con al menos dos asignaturas matriculadas.</h2>
    <?php 
    //Primero matriculamos a los alumnos en las asignaturas. 
        $alumnos[0]->matricularseEnAsignatura($asignaturas[0]);
        $alumnos[1]->matricularseEnAsignatura($asignaturas[0]);
        $alumnos[1]->matricularseEnAsignatura($asignaturas[1]);
        $alumnos[2]->matricularseEnAsignatura($asignaturas[0]);
        $alumnos[2]->matricularseEnAsignatura($asignaturas[2]);
        $alumnos[3]->matricularseEnAsignatura($asignaturas[0]);
        $alumnos[4]->matricularseEnAsignatura($asignaturas[0]);
        $alumnos[4]->matricularseEnAsignatura($asignaturas[1]);
        $alumnos[4]->matricularseEnAsignatura($asignaturas[2]);
        $alumnos[5]->matricularseEnAsignatura($asignaturas[0]);
        $alumnos[6]->matricularseEnAsignatura($asignaturas[1]);
        $alumnos[6]->matricularseEnAsignatura($asignaturas[1]);
        $alumnos[7]->matricularseEnAsignatura($asignaturas[2]);
        $alumnos[8]->matricularseEnAsignatura($asignaturas[1]);
        $alumnos[9]->matricularseEnAsignatura($asignaturas[0]);
        /*echo "<pre>";
        print_r($alumnos);
        echo "</pre>"; */   
    ?>
    <table class="table">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Edad</th>
            <th>Asignaturas</th>
            <th>Curso Abonado</th>
        </tr>

        <?php 
        //count, cuenta cuantas asiganturas tiene cada alumno, y luego lo filtramos por la condicion que sea Mayor que 2. 
        $alumnos2Asignaturas = array_filter($alumnos, function($filtroAsignatura){
            return count($filtroAsignatura->asignaturas) >= 2; //Al menos, lo interpreto como mayor igual.
        });

        foreach ($alumnos2Asignaturas as $dosAsignaturas):
        ?>

        <tr>
            <td> <?= $dosAsignaturas->id ?> </td>
            <td> <?= $dosAsignaturas->nombre ?> </td>
            <td> <?= $dosAsignaturas->mail ?> </td>
            <td> <?= $dosAsignaturas->edad ?> </td>
            <td><?= $dosAsignaturas->getNombreAsignatura()?></td>
            <td> <?= $dosAsignaturas->cursoAbonado ? "True" : "False" ?> </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <!--USAR array_filter para filtrar los dos arrays anteriores en lugar de utilizar un condicional-->

    <h2>ASIGNATURAS CON ALGÚN ALUMNO MATRICULADO: Listado de asignaturas con al menos un alumno en las mismas
        'No utilizar array_filter'</h2>

    <?php 
            $asignaturasConAlumnos = [];

            foreach ($asignaturas as $asignatura){
                foreach($alumnos as $alumno){
                    //Aqui recorre las asignaturas del alumno.
                    foreach ($alumno->asignaturas as $asigAlumno){
                        //Verificamos si hacen match los ids.
                        if ($asigAlumno->id == $asignatura->id) {
                            //Añadimos en el array vacio que declaramos fuera antes.
                            $asignaturasConAlumnos[] = $asignatura;
                            break 2;
                        }
                    }

                }
            }
        
        ?>

    <ul>
        <?php foreach ($asignaturasConAlumnos as $asg): ?>
        <li><?= $asg->nombre ?></li>
        <?php endforeach ?>
    </ul>





</body>

</html>