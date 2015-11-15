<?php
require 'clases/AutoCarga.php';
$sesion=new Session();
$paciente=$sesion->get('_paciente');
$numTarjeta=$paciente->getNumTarjeta();
$subidos=$sesion->get('numSubidos');
$intentos=$sesion->get('numIntentos');
//var_dump($subidos);
//echo 'Numero de Archivos subidos: '.$subidos;
//echo 'Numero de intentos: '.$intentos;



?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="estilo/estilo.css"/>
    <body>
        <div id="contenedor">
            <div id="limpia"></div>
        <div id="principio">
            <h1>
                Resumen de actividad:
            </h1>
            <h2>
                Número de archivos subidos: <?php echo $subidos;?>
            </h2>
            <h2>
                Número de archivos que ha intentado subir: <?php echo $intentos;?>
            </h2>
            <h3>
                Total de errores: <?php echo $intentos-$subidos;?>
            </h3>
            
        </div>
             <a id="enlaceCerrar" href="logout.php"><div id="cerrar">Cerrar Sesión</div></a>
        <div id="lista">  
            <h1>
                Relación de archivos:
            </h1>
            <span>
                Pinche sobre los nombres de los archivos para acceder a las imágenes
            </span>
        <?php
        
        $carpeta="../../../pacientes_SAS/$numTarjeta";
            $cadena="";
            if(file_exists($carpeta)){
                 $directorio=opendir($carpeta);
                while($archivo=  readdir($directorio))
                {
                    if(!is_dir($archivo))
                    {    
                    $cadena=$cadena.'<a href="leer.php?imagen='.$carpeta.'/'.$archivo.'"><li>'.$archivo.'</li></a>';
                    }
                }
                echo $cadena;
            }
                    
        ?>
        </div>
            </div>
    </body>
</html>
