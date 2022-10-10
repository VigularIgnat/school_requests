<?php
    require "index.php";
    include "config.php";   
    if (!(isset($_POST['child_name'])|| !(isset($_POST['id_teacher'])) || !(isset($_POST['born_dt'])) || !(isset($_POST['parent_name'])))){
        die('no');
    }
    else{
        $link = mysqli_connect($host, $user, $password,$db);
        $child_name =htmlspecialchars($_POST['child_name']);
        $id_teacher=htmlspecialchars($_POST['id_teacher']);
        $born_dt=htmlspecialchars($_POST['born_dt']);
        $parent_name=htmlspecialchars($_POST['parent_name']);
        // Check connection 
        if (!$link) {   
        die("Connection failed: " . mysqli_connect_error());
        }
        $child_name=mysqli_real_escape_string($link,$child_name);
        /* Escaping the string. */
        $born_dt=mysqli_real_escape_string($link,$born_dt);
        $parent_name=mysqli_real_escape_string($link,$parent_name);
        
        $query_check="SELECT id FROM booking WHERE  name='".$child_name."' AND born_dt='".$born_dt."' AND parent_name='".$parent_name."'";
        $result_check = mysqli_query($link, $query_check);
        $n=mysqli_num_rows($result_check);
        if ($n==0){
            if (isset($_POST["description"])){
                $description=$_POST["description"];
                $query="INSERT INTO booking( name, born_dt, id_teacher, parent_name, description) VALUES ('".$child_name."','".$born_dt."','".$id_teacher."','".$parent_name."','".$description."')";      
            }
            else{
                $query="INSERT INTO booking( name, born_dt, id_teacher, parent_name, description) VALUES ('".$child_name."','".$born_dt."','".$id_teacher."','".$parent_name."','')";
            }
            $result = mysqli_query($link, $query);
            
            if ($result) {
                echo 1;
            }
            else{
                echo "j";
            }
        }
        else{
            echo "u have already";
        }
    
    }
?>