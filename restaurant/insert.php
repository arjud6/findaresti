<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Submit a Restaurant</title>
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    </head>
    <body>
        <center>
        <!--<script>
            var pass = prompt();
            if (pass === "san0021") {
                
            } else {
                window.history.back();
            }
        </script>-->
            <div id=cover1></div>
            <div id="cover2"></div>
        <!--<h1>Submit a Restaurant</h1>
        <form action="database.php" method="post">
            <input id=rname name=rname type=text placeholder="Restaurant Name">
            <br>
            <input id=type name=type type=text placeholder="Type of Cuisine">
            <br>
            <input id=country name=country type=text placeholder="Country">
            <br>
            <input id=star name="star" type="text" placeholder="Star Rating (1-5)"><br>
            <input id=submit name=submit type=submit>
            
        </form>-->
        </center>
        <style>
            body {
                width: 100%;
                margin-left: 0;
                background-image: url(restaurant-e1456862749354.jpg);
                background-size: cover;
                background-repeat: no-repeat;
                background-color: rgba(0,0,0,0.8);
                
                
            }
            h1 {
                position: absolute;
            }
            #rname {
                position: absolute;
            }
            #type {
                position: absolute;    
            }
            #country {
                position: absolute;
            }
            #star {
                position: absolute;
            }
            #submit {
                position: absolute;
            }
            #cover1 {
                position: absolute;
                background: url(restaurant-e1456862749354.jpg) no-repeat fixed;
                filter: blur(15px);
                background-size: 100%;
                width: 60%;
                padding-bottom: 50%;
                z-index: -1;
                border-radius: 10vw;
                margin-left: 19%;
                margin-top: 1%;
                
                
            }
            #cover2 {
                position: absolute;
                width: 60%;
                padding-bottom: 50%;
                background-color: rgba(0,0,0,0.4);
                z-index: 1;
                border: 1vw solid rgba(25,25,25,0.7);
                border-radius: 10vw;
                margin-left: 19%;
                margin-top: 1%;
                
            }
        </style>
        
    </body>
</html>