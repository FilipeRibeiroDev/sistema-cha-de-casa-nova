<?php
function readItensDb($conn) {
    $users = [];

    $sql = "SELECT * FROM cha";
    $result = mysqli_query($conn, $sql);

    $result_check = mysqli_num_rows($result);

    if($result_check > 0)
        $users = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_close($conn);
    return $users;
}

function updateUserDb($conn, $id, $name, $phone) {
    if($id && $name && $phone) {
        
        $db_name = 'id19394834_casamento';
        $db_host = 'localhost';
        $db_user = 'id19394834_fbrito';
        $db_pass = '}vLz9V>aY45|~LA~';
        
        try {
          $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
        
        } catch (\Throwable $th) {
          throw $th;
        }

        $sql = "UPDATE cha SET responsavel = '".$name."', telefone = '".$phone."' WHERE id = ".$id;
        $stmt = mysqli_stmt_init($conn);
       
        if(!mysqli_stmt_prepare($stmt, $sql))
            exit('SQL error');

        mysqli_stmt_bind_param($stmt, 'sssi', $name, $phone, $id);
        mysqli_stmt_execute($stmt);
        mysqli_close($conn);
        return true;
    }
}

