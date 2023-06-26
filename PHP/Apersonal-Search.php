<?php

    include('Apersonal.php');

    search = $_POST['search'];

    if(!empty($search)){
        $query = "SELECT * FROM profesor WHERE name LIKE '$search%' ";
        $result = mysqli_query($conn, $query);
        if(!$result){
            die('Query Error'. mysqli_error($conn));
        }

        $json = array();
        while($row = mysqli_fetch_array($result)) {
            $json[] = array(
                'boleta' => $row['boleta'],
                'admin' => $row['admin'],
                'nombre' => $row['nombre'],
                'apPat' => $row['apPat'],
                'apMat' => $row['apMat'],
                'correo' => $row['correo']
            );

            
        }

        $jsonstring = json_encode ($json);
        echo $jsonstring;
    }




?>