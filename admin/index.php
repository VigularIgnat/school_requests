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
    
   
    <table id="booking">
        <tr>
            <td>Ім'я</td>
            <td>Дата нардження</td>
            <td>Батьки</td>
            <td>Вчитель</td>
            <td>Опис</td>
        </tr>
        <?php
        include "../config.php";
        $link = mysqli_connect($host, $user, $password,$db);

            // Check connection
        if (!$link) {   
        die("Connection failed: " . mysqli_connect_error());
        }
        $query="SELECT B.id, B.name AS child_name, B.born_dt, B.parent_name, B.description, T.name AS teacher_name FROM booking B, teachers T WHERE B.id_teacher=T.id ";
        $result = mysqli_query($link, $query);
        $n=mysqli_num_rows($result);
        if ($n > 0) {
            for ($i=0; $i < $n; $i++){
                echo "<tr>";
                $row =mysqli_fetch_assoc($result);
                echo "<td> ".$row["child_name"].'</td>';
                echo '<td> '.$row["born_dt"].'</td>';
                echo '<td> '.$row["parent_name"].'</td>';
                echo '<td>'.$row["teacher_name"].'</td>';
                echo '<td> '.$row["description"].'</td>';
                /*$array_clients=array("id"=> $row["id"], "name"=> $row["name"], "born_dt"=>$row["born_dt"],  "id_teacher"=>$row["cvc"],  "card_year"=>$row_cards["card_year"], "card_month"=>$row_cards["card_month"],"dt_create"=>$row_cards["dt_create"], "status"=>$row_cards["status"]);
                echo json_encode($array_clients);*/
                echo "</tr>";
            } 
            
        }
        ?>
    </table>
    <table id="booking">
        <tr>
            <td>Ім'я вчителя</td>
            <td>Кількість учнів</td>
        </tr>
        <?php
        include "../config.php";
        $link = mysqli_connect($host, $user, $password,$db);

            // Check connection
        if (!$link) {   
        die("Connection failed: " . mysqli_connect_error());
        }
        $query="SELECT  T.name AS teacher_name, COUNT(*) AS sum FROM booking B, teachers T WHERE B.id_teacher=T.id GROUP BY teacher_name";
        $result = mysqli_query($link, $query);
        
        if ($result){
            $n=mysqli_num_rows($result);
            for ($i=0; $i<$n; $i++){
                echo "<tr>";
                $row =mysqli_fetch_assoc($result);
                echo "<td> ".$row["teacher_name"].'</td>';
                echo '<td> '.$row["sum"].'</td>';
                echo "</tr>";
            }
           
        }
        ?>
    </table>
    <script>
    
    </script>   
</body>
</html>