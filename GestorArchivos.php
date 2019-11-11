<?php

    /**
     * Funcion que comprueba los input file que contienen algo y llama a la funcion encargada de subir las imagenes.
     * 
     * @param type $dir Directorio en el que se quiere subir las imagenes (usar '' si no se quiere usar un subdirectorio).
     * @param $conexion Conexion con la base de datos.
     */
    function subirImagenes($dir, $idTopic){
        // Recorremos la lista de campos para subir archivos.
        foreach ($_FILES  as $key => $value) {
            echo "Procesando: ".$key;
            // Se comprueba si el nombre del archivo no esta vacio para subirlo
            if ($_FILES[$key]["name"] != ''){
                subirImagen($key, $dir, $idTopic);
            }
        }
    }

    /**
     * Funcion para subir imagenes
     * 
     * @param $campoArchivo Nombre del campo en el que se subira el archivo.
     * @param $dir Directorio en el que se guardara la imagen. 
     * @param $conexion Conexion con la base de datos.
     */
    function subirImagen($archivo, $dir, $idTopic){
        // Se comprueba que el archivo a subir sea una imagen.
        //if($_FILES[$archivo]["type"] == "image/jpeg"){
            
            // Se comprueba si ha ocurrido algun error al subir el archivo.
            if ($_FILES[$archivo]["error"]) {
                echo '<div class="error">Error '.$_FILES["archivo"]["error"].'al intentar subir el archivo '.$_FILES[$archivo]["name"].'</div>';
            }else{
            
                // Se comprueba si ya se ha creado el subdirectorio para almacenar la imagen.
                // Y se crea si no existe aun.
                if(!is_dir("imagenes/".$dir)){
                    mkdir("imagenes/".$dir, 0755);
                }
                
                $nombre = $_FILES[$archivo]["name"];
                $ruta = "imagenes/".$dir."/".$_FILES[$archivo]["name"];

                // Comprobamos que no haya ningun archivo con el mismo nombre en el servidor.
                if (file_exists($ruta)) {
                    echo '<div class="error">Ya hay un archivo con nombre '.$nombre.'. Renombralo y vuelve a subirlo.</div>';   
                }else{
                    // Subimos la imagen.
                    move_uploaded_file($_FILES[$archivo]["tmp_name"], $ruta);
                    echo '<div class="subido">Archivo '.$nombre.' subido.</div>';
                                        
                    // Agregamos la imagen a la base de datos.
                    $consulta = sprintf("INSERT INTO galeriaimagenes (archivo, directorio, id_topics) VALUES ('%s', '%s', '%s')",          
                        $nombre, $dir, $idTopic);
                    // Se ejecuta la consulta.
                    mysql_query($consulta);
                    mysql_query("COMMIT");
                }
            }
        //}else{
        //     echo '<div class="error">'.$_FILES[$archivo]["name"].': Formato de archivo no permitido. </div>';
        //}      
    }
?>