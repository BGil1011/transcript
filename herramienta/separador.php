<?php


if($_SERVER['REQUEST_METHOD'] === 'POST'){

    function separador($minu, $text): string
    {

        $result = $text;
        for ($i=0; $i <= (int)$minu; $i++){ 
            
            for ($n=0; $n <= 59; $n++) { 
                if(strpos($text,"0$i:$n") || strpos($text,"$i:0$n") || strpos($text,"0$i:0$n") || strpos($text,"$i:$n")){
                    if($n <=9 && $i> 9){
                        // echo "$i:0$n";
                        // echo '<br>';
                        $result = str_replace("$i:0$n",' ',$result);
                    }elseif($i <= 9 && $n> 9){
                        // echo "0$i:$n";
                        // echo '<br>';
                        $result = str_replace("0$i:$n",' ',$result);
                    }elseif($i > 9 && $n > 9) {
                        // echo "$i:$n";
                        // echo '<br>';
                        $result = str_replace("$i:$n",' ',$result);
                    }else{
                        // echo "0$i:0$n";
                        // echo '<br>';
                        $result = str_replace("0$i:0$n",' ',$result);
                    }
                    
                }
            }
        }

        //var_dump($result);
        return $result;
    }

    $texto = htmlspecialchars($_POST['texto']);
    $ancho = strlen($_POST['tiempo']);
    $tiempo =  $_POST['tiempo'];
    //var_dump($_POST);

    $respuesta = separador( $tiempo, $texto );
}
//var_dump($_SERVER);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Separador</title>
</head>
<body>
    <h1>Insertar transcision de los minutos</h1>

    <form class="formulario" method="POST">
        <div>
            <label for="tiempo">Tiempo en minutos</label>
            <input type="number" id="tiempo" name="tiempo"> 
        </div>
        <div>
            <label for="texto">Texto</label>
            <input type="text" name="texto" id="texto">
        </div>
        <input class="boton" type="submit" value="separar">
    </form>


    <div class="separacion"> 
        <h2>Texto sin conteo</h2>
        <div>
            <p> <?php echo $respuesta?? ''; ?></p>
        </div>
        
    </div>
</body>
</html>

