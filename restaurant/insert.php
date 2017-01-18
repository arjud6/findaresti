<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Submit a Restaurant</title>
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    </head>
    <body>
        <center>
        <script>
            var pass = prompt();
            if (pass === "san0021") {
                
            } else {
                window.history.back();
            }
        </script>
            
        <h1>Submit a Restaurant</h1>
        <form action="database.php" method="post">
            <input id=rname name=rname type=text placeholder="Restaurant Name">
            <br>
            <input id=type name=type type=text placeholder="Type of Cuisine">
            <br>
            <input id=country name=country type=text placeholder="Country">
            <br>
            <input id=star name="star" type="text" placeholder="Star Rating (1-5)"><br>
            <input id=submit name=submit type=submit>
            
        </form>
        </center>
    </body>
</html>