<?php
    $conn = mysqli_connect('localhost','root','','afterclass');

    function query($query){
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        } 
        return $rows;
    }

    function store($data){
        global $conn;

        $name = htmlspecialchars($data['name']);
        $instansi = htmlspecialchars($data['instansi']);
        $keperluan = htmlspecialchars($data['keperluan']);
        $alamat = htmlspecialchars($data['alamat']);

        $query = "INSERT INTO tamu VALUES ('','$name','$instansi','$keperluan','$alamat')";
        mysqli_query($conn,$query);
        
        return mysqli_affected_rows($conn);
    }
    function destoy($id){
        global $conn;
        mysqli_query($conn, 'DELETE FROM tamu WHERE id = '.$id);
        return mysqli_affected_rows($conn);
        
    }
?>

