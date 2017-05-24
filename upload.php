<?php
	include "conexion.php";	
    session_start();
    $user = $_SESSION['username'];
    $uploadOk = 1;

    if(isset($_POST['submit']))
    {
	 	$codigo = $_POST['key'];
		if($codigo == "")
		{
		  $codigo = "0";
		}
        if(count($_FILES['upload']['name']) > 0)
        {
            //Get user ID
            $getID = mysqli_fetch_assoc(mysqli_query($conn, "SELECT _id FROM printing_srv.users WHERE _username = '".$user."'"));
            $userID = $getID['_id'];
				 
				 //Revisa cada archivo
                for($i=0; $i<count($_FILES['upload']['name']); $i++) 
                {  
                    //Crear registro de print
                $sql = "INSERT INTO printing_srv.print (_name, _user, _status, _project) values ('".$_POST['name']."', ".$userID.", 'Nuevo', '".$codigo."');";
                $result = mysqli_query($conn, $sql);
                  
                if ($result)
                {
                    //Obtiene el path temporal del archivo
                    $tmpFilePath = $_FILES['upload']['tmp_name'][$i];

                    //Revisar que existe el path
                    if($tmpFilePath != "")
                    {
            
                        //guardar el nombre del archivo
                        $shortname = $_FILES['upload']['name'][$i];

                        //guardar el url y el archivo
                        $filePath = "uploads/" . date('d-m-Y-H-i-s').'-'.$_FILES['upload']['name'][$i];

                        $stlFileType = pathinfo($_FILES['upload']['name'][$i],PATHINFO_EXTENSION);

                        if($stlFileType != "stl" && $stlFileType != "STL" ) 
                        {
                            echo "Sorry, only STL files are allowed.";
                            $uploadOk = 0;
                        }

                        if ($uploadOk == 0) 
                        {
                            echo "Sorry, your file was not uploaded.";
                            // if everything is ok, try to upload file
                        } 
                        else 
                        {
                            //Subir el archivo a la carpeta temporal
                            if(move_uploaded_file($tmpFilePath, $filePath)) 
                            {
                            $files[] = $shortname;
                            //insert into db 
                            //use $shortname for the filename
                            //use $filePath for the relative url to the file
                            }
                        }
                    }		
				    $sql2 = "INSERT INTO printing_srv.files (_file, _print) values ('".$filePath."', ".mysqli_insert_id($conn).");";
                    $result = mysqli_query($conn, $sql2);   
				}
                else
                {
                    echo mysqli_error($conn); 
                    $i = count($_FILES['upload']['name'])+1;
                    $uploadOk = 0;
                }
			    }
			}
            
        }
        if ($uploadOk == 1)
        {
            //Mensaje de Confirmacion
            echo "<h1>Archivos Subidos:</h1>";
			echo "Tus archivos han sido subidos exitosamente";    
            if(is_array($files))
            {
                echo "<ul>";
                foreach($files as $file)
                {
                    echo "<li>$file</li>";
                }
                echo "</ul>";
            }
        }
        else
        {
            echo "<h1>Archivos Subidos:</h1>";
            echo "Ha ocurrido un error al subir tus archivos ";
        }
		header( "refresh:10;url=subir.php" );
?>