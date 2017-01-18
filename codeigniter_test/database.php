<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>codeigniter_test</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script>
            function serachq() {
                var searchtxt = $("input[name='search1']").val();
                $.post("database.php", {searchval: searchtxt}, function(output) {
                $("#output").html(output);    
            });
            }
        </script>
    </head>
    <body>
<center>
<h1>Insert data into database</h1>
<form action="database.php" method="post">
    <input name="fname" type="text" placeholder="Insert First Name Here">
    <br>
    <input name="lname" type="text" placeholder="Insert Second Name Here">
    <br>
    <input name="age" type="number" placeholder="Insert Age Here">
    <br>
    <input name="submit" type="submit" placeholder="Submit">
</form>
<form action="database.php" method="post">
    <br>
    <br>
    <br>
    <input name="search1" type="search" placeholder="Search First Name" onkeyup="serachq();" autocomplete="off">
    <input name="searchsub" type="submit" placeholder="Search">
</form>
<?php
    $output = "";
    $con = mysqli_connect("localhost", "arjud6", "arjuna123");
    mysqli_query($con, "CREATE DATABASE coding_igniter");
    mysqli_select_db($con, "coding_igniter");
    $table1a = "CREATE TABLE table1a (
        first_name varchar(30),
        second_name varchar(30),
        age int(3)
    )";
    mysqli_query($con, $table1a);
    if (isset($_POST['submit'])) {
        $insert1 = "INSERT INTO table1a(first_name,second_name,age) VALUES ('$_POST[fname]', '$_POST[lname]', '$_POST[age]')";
        mysqli_query($con, $insert1);
        
    }
    if (isset($_POST['searchsub'])) {
        $search1 = $_POST['search1'];
        $sql = "SELECT * FROM table1a WHERE first_name LIKE '%$search1%'";
        $myData = mysqli_query($con, $sql);
        echo "<br>";
        echo "<table border=1>";
        echo "<th>";
        echo "<td><b>No.</b></td>";
        echo "<td><b>First Name</b></td>";
        echo "<td><b>Last Name</b></td>";
        echo "<td><b>Age</b></td>";
        echo "</th>";
        $i = 1;
        while ($record = mysqli_fetch_array($myData)) {
            echo "<tr>";
            echo "<td> </td>";
            echo "<td>" . $i++ . ".</td>";
            echo "<td>" . $record['first_name'] . "</td>";
            echo "<td>" . $record['second_name'] . "</td>";
            echo "<td>" . $record['age'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    mysqli_close($con);
?>
        </center>
    </body>
</html>