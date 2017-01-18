<html>
    <head>
    </head>
    <body>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $con = mysqli_connect("localhost","id477766_arjud6","arjuna123");
            if (!$con) {
                die("Cannot connect; " . mysqli_error());
            }
            mysqli_query($con,"CREATE DATABASE id477766_restaurant2");
            mysqli_select_db($con,"id477766_restaurant2");
            
            
            $sql = "SELECT * FROM table2";
            $myData = mysqli_query($con,$sql);
            $table1 = "CREATE TABLE table2 (
                Restaurant varchar(50),
                Type varchar(20),
                Country varchar(20),
                Star varchar(3)
            )";
            echo "<table border=1>
            <tr>
            <th>Restaurant</th>
            <th>Type of Food</th>
            <th>Country</th>
            <th>Rating</th>
            </tr>";
            while($record = mysqli_fetch_array($myData)) {
                echo "<form action=database.php method=post>";
                echo "<tr>";
                echo "<td>" . $record['Restaurant'] . " </td>";
                echo "<td>" . "<input type=text name=type value=" . $record['Type'] . " </td>";
                echo "<td>" . "<input type=text name=country value=" . $record['Country'] . " </td>";
                echo "<td>" . "<input type=text name=star value=" . $record['Star'] . " </td>";
                echo "<td>" . "<input type=hidden name=hidden value=" . $record['Restaurant'] . " </td>";
                echo "<td>" . "<input type=submit name=update value=update" . " </td>";
                echo "<td>" . "<input type=submit name=delete value=delete" . " </td>";
                echo "</tr>";
                echo "</form>";
            }
            echo "</table>";
            $insert1 = "INSERT INTO table2 (Restaurant,Type,Country,Star) VALUES ('$_POST[rname]','$_POST[type]','$_POST[country]','$_POST[star]')";
            mysqli_query($con,$insert1);
            mysqli_query($con,$table1);
            mysqli_close($con);
        }
        ?>
        <script>
            window.history.back();
        </script>
    </body>
</html>