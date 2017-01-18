<html>
    <head>
        <meta charset=utf-8>
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        
    </head>
    <body>
        <center>
            
        
        
        <?php
        error_reporting(0);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        echo "<div id=head1>";
        echo "<form action=search.php method=post>
                <input id=search1 name=search1 type=text value='$_POST[restaurantsearch]'>
            </form>";
        echo "</div>";
        echo "<img id=background2 src=background2.jpg>";
        echo "<div id=getout></div>";
        echo "<div id=coversearch1></div>";
        echo "<div id=coversearch2></div>";
        $gobackto = "Go_Back_To_Previous_Page";
        echo "<img onclick=window.history.back() id=goback src=goback1.png title=" . $gobackto . ">";
        echo "<style>
            body {
                width: 100%;
                margin-left: 0;
            }
            #head1 {
                position: fixed;
                background-color: rgba(247, 248, 249,1);
                width: 103%;
                margin-left: -2%;
                margin-top: -1.2%;
                padding-top: 3%;
                padding-bottom: 7.5%;
                border-bottom: 2px solid rgba(200,200,200,0.6);
                z-index: 100;
                
                
                
            }
            #search1 {
                width: 65%;
                padding-top: 1.5%;
                padding-bottom: 1.5%;
                box-shadow: 2px 4.5px 10px 0px lightgrey;
                border: 1px solid lightgrey;
                position: fixed;
                margin-left: -32%;
                text-align: center;
                font-size: 1.7vw;
                z-index: 1000000;
                
                
                
            }
            
            #search1:hover {
                width: 65%;
                padding-top: 1.5%;
                padding-bottom: 1.5%;
                box-shadow: 2px 4.5px 10px 2px lightgrey;
                border: 1px solid lightgrey;
                position: fixed;
                z-index: 1000000;
                
            }
            
            #getout {
                width: 100%;
                padding-bottom: 12%;
            }
            #coversearch1 {
                position:fixed;
                z-index:-2;
                width: 70%;
                padding-bottom: 10%;
                margin-top: -10%;
                margin-left: 15%;
                background: url(background2.jpg) no-repeat fixed;
                filter: blur(30px);
                -webkit-filter: blur(30px);
                height: 100%;
                
            }
            #coversearch2 {
                position:fixed;
                z-index:-1;
                width: 70%;
                padding-bottom: 10%;
                margin-top: -10%;
                margin-left: 15%;
                background-color: rgba(225,225,225,0.3);
                height: 100%
            }
            #background2 {
                position:fixed;
                z-index:-3;
                margin-left: -50%;
                margin-top: -1%
                
            }
            #goback {
                border-radius: 100000000000000px;
                //border: 0.35vw solid black;
                width: 5.4%;
                position: fixed;
                z-index: 101;
                margin-left: -42%;
                margin-top: -10.4%;
                animation-name: example2;
                animation-duration: 0.5s;
                animation-fill-mode: forwards;
                
            }
            @keyframes example1 {
                    from {background-color: none;}
                    to {background-color: rgba(200,200,200,0.5);}
                }
            @keyframes example2 {
                    from {background-color: rgba(200,200,200,0.5);}
                    to {background-color: none;}
                }
            #goback:hover {
                border-radius: 100000000000000px;
                //border: 0.35vw solid black;
                width: 5.4%;
                position: fixed;
                z-index: 101;
                margin-left: -42%;
                margin-top: -10.4%;
                animation-name: example1;
                animation-duration: 0.4s;
                animation-fill-mode: forwards;
                cursor: pointer;
            }
            textarea:focus, input:focus{
    outline: 0;
}
*:focus {
    outline: 0;
}
              </style>";
        if (isset($_POST['somewhere']) || isset($_POST['form2'])) {
            $restaurantsearch = $_POST['restaurantsearch'];
            $typesearch = $_POST['typesearch'];
            $countrysearch = $_POST['countrysearch'];
            $ratingsearch = $_POST['ratingsearch'];
            $con = mysqli_connect("localhost","arjud6","arjuna123");
            if (!$con) {
                die("Cannot connect; " . mysqli_error());
            }
            mysqli_select_db($con,"restaurant2");
            $sql = "SELECT * FROM table2 WHERE Type='$typesearch' AND Country='$countrysearch' AND Star='$ratingsearch' AND Restaurant LIKE '%$restaurantsearch%'";
            $sql3 = "SELECT * FROM table2 WHERE Type!='$typesearch' AND Country!='$countrysearch' AND Star!='$ratingsearch' AND Restaurant LIKE '%$restaurantsearch%'";
            $sql4 = "SELECT * FROM table2 WHERE Type='$typesearch' AND Country!='$countrysearch' AND Star!='$ratingsearch' AND Restaurant LIKE '%$restaurantsearch%'";
            $sql5 = "SELECT * FROM table2 WHERE Type!='$typesearch' AND Country='$countrysearch' AND Star!='$ratingsearch' AND Restaurant LIKE '%$restaurantsearch%'";
            $sql6 = "SELECT * FROM table2 WHERE Type!='$typesearch' AND Country!='$countrysearch' AND Star='$ratingsearch' AND Restaurant LIKE '%$restaurantsearch%'";
            $sql7 = "SELECT * FROM table2 WHERE Type='$typesearch' AND Country='$countrysearch' AND Star!='$ratingsearch' AND Restaurant LIKE '%$restaurantsearch%'";
            
            $sql1 = "SELECT * FROM table2 WHERE Type='$typesearch' AND Country='$countrysearch' AND Restaurant AND Star='$ratingsearch' AND NOT LIKE '%$restaurantsearch%'";
            $sql2 = "SELECT * FROM table2 WHERE Type='$typesearch' AND Country='$countrysearch' AND Restaurant AND Star!='$ratingsearch' AND NOT LIKE '%$restaurantsearch%'";
            
            $mydata = mysqli_query($con,$sql);
            $result1 = mysqli_query($con,$sql);
            $mydata1 = mysqli_query($con,$sql1);
            $result2 = mysqli_query($con,$sql1);
            $mydata2 = mysqli_query($con,$sql2);
            $result3 = mysqli_query($con,$sql2);
            ////////////////////////////////////////////////////
            $mydata3 = mysqli_query($con,$sql3);
            $result4 = mysqli_query($con,$sql3);
            /////////////////////////////////////////////////////
            $mydata4 = mysqli_query($con,$sql4);
            $result5 = mysqli_query($con,$sql4);
            /////////////////////////////////////////////////////
            $mydata5 = mysqli_query($con,$sql5);
            $result6 = mysqli_query($con,$sql5);
            /////////////////////////////////////////////////////
            $mydata6 = mysqli_query($con,$sql6);
            $result7 = mysqli_query($con,$sql6);
            /////////////////////////////////////////////////////
            $mydata7 = mysqli_query($con,$sql7);
            $result8 = mysqli_query($con,$sql7);
            /////////////////////////////////////////////////////
            
            
            
            while($record = mysqli_fetch_array($mydata)) {
                echo "<a href=https://www.google.com.au/maps/search/" . urlencode($record['Restaurant']) . " target=_blank><div id=searchboxes>
                <hr id=line1>
                <p1>" . $record['Restaurant'] . "</p1>
                <p2>Type of Food: " . $record['Type'] . "</p2>
                <p3>Country: " . $record['Country'] . "</p3>
                <p4>Rating: " . $record['Star'] . "</p4>
            </div></a>";
            }
            while($record1 = mysqli_fetch_array($mydata1)) {
                echo "<a href=https://www.google.com.au/maps/search/" . urlencode($record1['Restaurant']) . " target=_blank><div id=searchboxes>
                <hr id=line1>
                <p1>" . $record1['Restaurant'] . "</p1>
                <p2>Type of Food: " . $record1['Type'] . "</p2>
                <p3>Country: " . $record1['Country'] . "</p3>
                <p4>Rating: " . $record1['Star'] . "</p4>
            </div></a>";    
            }
            while($record2 = mysqli_fetch_array($mydata2)) {
                echo "<a href=https://www.google.com.au/maps/search/" . urlencode($record2['Restaurant']) . " target=_blank><div id=searchboxes>
                <hr id=line1>
                <p1>" . $record2['Restaurant'] . "</p1>
                <p2>Type of Food: " . $record2['Type'] . "</p2>
                <p3>Country: " . $record2['Country'] . "</p3>
                <p4>Rating: " . $record2['Star'] . "</p4>
            </div></a>";    
            }
            while($record3 = mysqli_fetch_array($mydata3)) {
                echo "<a href=https://www.google.com.au/maps/search/" . urlencode($record3['Restaurant']) . " target=_blank><div id=searchboxes>
                <hr id=line1>
                <p1>" . $record3['Restaurant'] . "</p1>
                <p2>Type of Food: " . $record3['Type'] . "</p2>
                <p3>Country: " . $record3['Country'] . "</p3>
                <p4>Rating: " . $record3['Star'] . "</p4>
            </div></a>";    
            }
            while($record4 = mysqli_fetch_array($mydata4)) {
                echo "<a href=https://www.google.com.au/maps/search/" . urlencode($record4['Restaurant']) . " target=_blank><div id=searchboxes>
                <hr id=line1>
                <p1>" . $record4['Restaurant'] . "</p1>
                <p2>Type of Food: " . $record4['Type'] . "</p2>
                <p3>Country: " . $record4['Country'] . "</p3>
                <p4>Rating: " . $record4['Star'] . "</p4>
            </div></a>";    
            }
            while($record5 = mysqli_fetch_array($mydata5)) {
                echo "<a href=https://www.google.com.au/maps/search/" . urlencode($record5['Restaurant']) . " target=_blank><div id=searchboxes>
                <hr id=line1>
                <p1>" . $record5['Restaurant'] . "</p1>
                <p2>Type of Food: " . $record5['Type'] . "</p2>
                <p3>Country: " . $record5['Country'] . "</p3>
                <p4>Rating: " . $record5['Star'] . "</p4>
            </div></a>";    
            }
            while($record6 = mysqli_fetch_array($mydata6)) {
                echo "<a href=https://www.google.com.au/maps/search/" . urlencode($record6['Restaurant']) . " target=_blank><div id=searchboxes>
                <hr id=line1>
                <p1>" . $record6['Restaurant'] . "</p1>
                <p2>Type of Food: " . $record6['Type'] . "</p2>
                <p3>Country: " . $record6['Country'] . "</p3>
                <p4>Rating: " . $record6['Star'] . "</p4>
            </div></a>";    
            }
            while($record7 = mysqli_fetch_array($mydata7)) {
                echo "<a href=https://www.google.com.au/maps/search/" . urlencode($record7['Restaurant']) . " target=_blank><div id=searchboxes>
                <hr id=line1>
                <p1>" . $record7['Restaurant'] . "</p1>
                <p2>Type of Food: " . $record7['Type'] . "</p2>
                <p3>Country: " . $record7['Country'] . "</p3>
                <p4>Rating: " . $record7['Star'] . "</p4>
            </div></a>";    
            }
            
            if (mysqli_num_rows($result1) == 0 and mysqli_num_rows($result2) == 0 and mysqli_num_rows($result3) and mysqli_num_rows($result4) and mysqli_num_rows($result5) and mysqli_num_rows($result6) and mysqli_num_rows($result7) and mysqli_num_rows($result8)) {
                echo "<div id=doesntexit>
                <p12><b><em>No Results</em></b></p12>
            </div>";
            }
            
            
            echo "<style>
                @keyframes example {
                    from {background-color: white;}
                    to {background-color: rgba(225, 225, 225,1);}
                }
                
                #searchboxes {
                    background-color: white;
                    width: 65%;
                    padding-top: 3.5%;
                    padding-bottom: 4%;
                    box-shadow: 2px 4.5px 10px 4.5px rgba(100,100,100,0.7); 
                    color: black;
                    margin-top: 2.8%;
                    margin-bottom: -1%;
                    
                }
                #searchboxes:hover {
                    background-color: white;
                    width: 65%;
                    padding-top: 3.5%;
                    padding-bottom: 4%;
                    box-shadow:2px 6px 10px 4.5px rgba(100,100,100,0.7); 
                    animation-name: example;
                    animation-duration: 0.5s;
                    animation-fill-mode: forwards;
                    cursor: pointer;
                    color: black;
                    margin-top: 2.8%;
                    margin-bottom: -1%;
                    
                    
                }
                #line1 {
                    position: absolute;
                    border-top: 0.7px solid rgba(179,179,179,0.5);
                    border-bottom: 0.7px solid rgba(179,179,179,0.5);
                    margin-top: -0.3%;
                    
                    
                    width: 62.85%;
                    margin-left: 1%
                }
                p1 {
                    position: absolute;
                    font-size: 1.7vw;
                    margin-top: -2.7%;
                    font-family: Arial;
                    margin-left: -31.5%;
                    color: rgb(0,58,166);
                    
                }
                
                p2,p3,p4 {
                    position: absolute;
                }
                p2 {
                    margin-left: -31.5%;
                    font-family: Arial;
                    font-size: 1.5vw;
                    margin-top: 0.8%
                }
                p3 {
                    margin-left: -8.5%;
                    font-family: Arial;
                    font-size: 1.5vw;
                    margin-top: 0.8%
                }
                p4 {
                    margin-left: 11.5%;
                    font-family: Arial;
                    font-size: 1.5vw;
                    margin-top: 0.8%
                }
                
                
            </style>";
            echo "<style>
                #searchingmore {
                    width: 65%;
                    padding-bottom: 3.5;
                    background-color: rgba(255,255,255,0.5);
                    margin-top: 3.5%;
                    font-size: 1.5vw;
                    
                }
            </style>";
            echo "<style>
                #doesntexit {
                    background-color: white;
                    width: 65%;
                    padding-top: 2%;
                    padding-bottom: 2%;
                    box-shadow: 2px 4.5px 10px 4.5px rgba(100,100,100,0.7); 
                    margin-top: 1%;
                    
                }
            </style>";
        
        
        
            mysqli_close($con);
            
        } else {
            $restaurantsearch = $_POST['search1'];
            $con = mysqli_connect("localhost","arjud6","arjuna123");
            if (!$con) {
                die("Cannot connect; " . mysqli_error());
            }
            mysqli_select_db($con,"restaurant2");
            $sql = "SELECT * FROM table2 WHERE Restaurant LIKE '%$restaurantsearch%'";
            $mydata = mysqli_query($con,$sql);
            $result1 = mysqli_query($con,$sql);
            while($record = mysqli_fetch_array($mydata)) {
                echo "<a href=https://www.google.com.au/maps/search/" . urlencode($record['Restaurant']) . " target=_blank><div id=searchboxes>
                <hr id=line1>
                <p1>" . $record['Restaurant'] . "</p1>
                <p2>Type of Food: " . $record['Type'] . "</p2>
                <p3>Country: " . $record['Country'] . "</p3>
                <p4>Rating: " . $record['Star'] . "</p4>
            </div></a>";    
            }
            
            if (mysqli_num_rows($result1) == 0) {
                echo "<div id=doesntexit>
                <p12><b><em>No Results</em></b></p12>
            </div>";
            }
           
            
            echo "<style>
                @keyframes example {
                    from {background-color: white;}
                    to {background-color: rgba(225, 225, 225,1);}
                }
                #searchboxes {
                    background-color: white;
                    width: 65%;
                    padding-top: 3.5%;
                    padding-bottom: 4%;
                    box-shadow: 2px 4.5px 10px 4.5px rgba(100,100,100,0.7); 
                    margin-top: 2.8%;
                    margin-bottom: -1%;
                    color: black;
                }
                #searchboxes:hover {
                    background-color: white;
                    width: 65%;
                    padding-top: 3.5%;
                    padding-bottom: 4%;
                    box-shadow:2px 6px 10px 4.5px rgba(100,100,100,0.7); 
                    margin-top: 2.8%;
                    margin-bottom: -1%;
                    animation-name: example;
                    animation-duration: 0.5s;
                    animation-fill-mode: forwards;
                    cursor: pointer;
                    color: black;
                    
                    
                }
                #line1 {
                    position: absolute;
                    border-top: 0.7px solid rgba(179,179,179,0.5);
                    border-bottom: 0.7px solid rgba(179,179,179,0.5);
                    margin-top: -0.3%;
                    
                    
                    width: 62.85%;
                    margin-left: 1%
                }
                p1 {
                    position: absolute;
                    font-size: 1.7vw;
                    margin-top: -2.7%;
                    font-family: Arial;
                    margin-left: -31.5%;
                    color: rgb(0,58,166);
                    
                }
                
                p2,p3,p4 {
                    position: absolute;
                }
                p2 {
                    margin-left: -31.5%;
                    font-family: Arial;
                    font-size: 1.5vw;
                    margin-top: 0.8%
                }
                p3 {
                    margin-left: -8.5%;
                    font-family: Arial;
                    font-size: 1.5vw;
                    margin-top: 0.8%
                }
                p4 {
                    margin-left: 11.5%;
                    font-family: Arial;
                    font-size: 1.5vw;
                    margin-top: 0.8%
                }
                
                
            </style>";
            echo "<style>
                #searchingmore {
                    width: 65%;
                    padding-bottom: 3.5;
                    background-color: rgba(255,255,255,0.6);
                    margin-top: 3.5%;
                    font-size: 1.5vw;
                    margin-bottom: -1%
                    
                }
            </style>";
            echo "<style>
                #doesntexit {
                    background-color: white;
                    width: 65%;
                    padding-top: 2%;
                    padding-bottom: 2%;
                    box-shadow: 2px 4.5px 10px 4.5px rgba(100,100,100,0.7); 
                    
                }
            </style>";
            
        
        
        
            mysqli_close($con);
            
            
        }
        } else {
            echo "<script src=main2.js></script>";
        }
            
        ?>
        </center>
    </body>
    <head>
        <title>Searching for <?php echo "'$restaurantsearch'"; ?></title>
    </head>
</html>