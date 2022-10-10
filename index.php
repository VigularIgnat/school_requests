<?php
include "config.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Рєєстрація учнів до 1 класу</h2>
    <div id="teacher_area">
    <?php
        $link = mysqli_connect($host, $user, $password,$db);

        // Check connection
        if (!$link) {   
        die("Connection failed: " . mysqli_connect_error());
        }
        
        //$num_card=mysqli_real_escape_string($link,$num_card);
        //$pin_card=mysqli_real_escape_string($link,$pin_card);
        $query="SELECT name, id FROM teachers WHERE 1";
        $result = mysqli_query($link, $query);
        $n=mysqli_num_rows($result);
        if ($n > 0) {
            for ($i=0; $i < $n; $i++){
                $row =mysqli_fetch_assoc($result);
                echo '<div class="option" id_teacher="'.$row["id"].'">'.$row["name"].'</div>';
            }
            echo "</div>";
        }
        else{
            echo "0 results";
        }
        
        
    ?>
    
    <form method="post" name='registration' enctype="multipart/form-data" action="book.php" > 
        <p>Прізвище Ім'я По-батькові дитини  <input type="text" name="child_name" placeholder="Ім'я дитини" required></p>
        <p>Дата народження  <input type="date" name="born_dt" required></p>
        <input type="hidden" name="id_teacher" id="input_id_teacher" required>
        <p>Прізвище Ім'я По-батькові мати або батька  <input type="text" name="parent_name" placeholder="Ім'я мати або батька" required></p>
        <p>Додатково</p>  
        <input type="text" name="description" placeholder="Додайте опис">
        <input type="submit" value="Відправити">
    </form>
    

    <script src="index.js"></script>
</body>
</html>