<?php
        function generateTriangle(int $altura){

            if($altura<=0){
                return "";
            }

            $resultado = ""; //Para alamacenar el resultado.

            //Recorrer cada fila.

            //Empieza por la fila 1 y va hasta la fila que le asignes caso sea un numero positivo.
            for ($i = 1; $i <= $altura; $i++){
                //Numero de espacios al inicio
                //Calcular los espacios para que el triangulo quede centrado
                //Ejemplo, si em triangulo tiene una altura de 7,
                //Tendrá 6 espacios, y el asterisco en medio. para que quede centrado.
                //  ---*---
                //  --***--
                //  --****--
                $espacio = $altura - $i;
                //Cantidad de asteriscos en esa fila en concreto. 

                //Triangulos isoceles son numeros impares por lo que si multiplicamos por 2
                //y restamos 1, siempre nos va a dar un numero impar

                $asterisco = 2 * $i - 1;


                //Creamos la fila con la etiqueta <p>
                $fila = "<p>";

                //Añadimos los espacios. 
                //Se imprime con &nbsp; pongo dos espacios para que quede mejor centrado. 
                //con solo uno queda de lado la piramde. 
                $fila .= str_repeat("&nbsp;&nbsp;", $espacio);

                //Añadimos los asteriscos.
                $fila .= str_repeat("*", $asterisco);

                //cerramos la fila
                $fila .= "</p>";

                $resultado .= $fila . "\n";
            }
            return $resultado;
        }

?>