<?php
    //error_reporting(0);
    $a = 1;
    $i = 1;
    $con = mysqli_connect("localhost","arjud6","arjuna123");
    mysqli_select_db($con,"restaurant2");
    $output = '';
    $output1style = '';
    if(isset($_POST['searchval']) || isset($_POST['selecta']) || isset($_POST['selectb']) || isset($_POST['selectc'])) {
        $serachq = $_POST['searchval'];
        $select1 = $_POST['selecta'];
        $select2 = $_POST['selectb'];
        $select3 = $_POST['selectc'];
        $serachq = preg_replace("#[^0-9a-z]#i","",$serachq);
        //Start Test
        if ($select1 == "(Select Type of Food)" && $select2 == "(Select Your Country)" && ($select3 == "(Select Rating Range)" || $select3 == "Doesn't Matter") && $serachq == '') {
            $query = mysqli_query($con, "SELECT * FROM table2 ORDER BY RAND() LIMIT 10");
        } else if ($select1 == "(Select Type of Food)" && $select2 == "(Select Your Country)" && ($select3 == "(Select Rating Range)" || $select3 == "Doesn't Matter") && $serachq !== '') {
            $query = mysqli_query($con, "SELECT * FROM table2 WHERE Restaurant LIKE '%$serachq%' ORDER BY LOCATE('$serachq', Restaurant) LIMIT 10");  
        } else if ($select1 !== "(Select Type of Food)" && $select2 == "(Select Your Country)" && ($select3 == "(Select Rating Range)" || $select3 == "Doesn't Matter") && $serachq == '') {
            $query = mysqli_query($con, "SELECT * FROM table2 WHERE Type='$select1' ORDER BY RAND() LIMIT 10");    
        } else if ($select1 == "(Select Type of Food)" && $select2 !== "(Select Your Country)" && ($select3 == "(Select Rating Range)" || $select3 == "Doesn't Matter") && $serachq == '') {
            $query = mysqli_query($con, "SELECT * FROM table2 WHERE Country='$select2' ORDER BY RAND() LIMIT 10");  
        } else if ($select1 == "(Select Type of Food)" && $select2 == "(Select Your Country)" && ($select3 !== "(Select Rating Range)" || $select3 !== "Doesn't Matter") && $serachq == '') {
            $query = mysqli_query($con, "SELECT * FROM table2 WHERE Star='$select3' ORDER BY RAND() LIMIT 10");  
        } else if ($select1 !== "(Select Type of Food)" && $select2 !== "(Select Your Country)" && ($select3 == "(Select Rating Range)" || $select3 == "Doesn't Matter") && $serachq == '') {
            $query = mysqli_query($con, "SELECT * FROM table2 WHERE Type='$select1' AND Country='$select2' ORDER BY RAND() LIMIT 10");  
        } else if ($select1 !== "(Select Type of Food)" && $select2 == "(Select Your Country)" && ($select3 !== "(Select Rating Range)" || $select3 !== "Doesn't Matter") && $serachq == '') {
            $query = mysqli_query($con, "SELECT * FROM table2 WHERE Type='$select1' AND Star='$select3' ORDER BY RAND() LIMIT 10");      
        } else if ($select1 == "(Select Type of Food)" && $select2 !== "(Select Your Country)" && ($select3 !== "(Select Rating Range)" || $select3 !== "Doesn't Matter") && $serachq == '') {
            $query = mysqli_query($con, "SELECT * FROM table2 WHERE Country='$select2' AND Star='$select3' ORDER BY RAND() LIMIT 10"); 
        } else if ($select1 !== "(Select Type of Food)" && $select2 !== "(Select Your Country)" && ($select3 !== "(Select Rating Range)" || $select3 !== "Doesn't Matter") && $serachq == '') {
            $query = mysqli_query($con, "SELECT * FROM table2 WHERE Country='$select2' AND Type='$select1' AND Star='$select3' ORDER BY RAND() LIMIT 10"); 
        } else if ($select1 !== "(Select Type of Food)" && $select2 !== "(Select Your Country)" && ($select3 == "(Select Rating Range)" || $select3 == "Doesn't Matter") && $serachq !== '') {
            $query = mysqli_query($con, "SELECT * FROM table2 WHERE Type='$select1' AND Country='$select2' AND Restaurant LIKE '%$serachq%' ORDER BY LOCATE('$serachq', Restaurant) LIMIT 10");  
        } else if ($select1 !== "(Select Type of Food)" && $select2 == "(Select Your Country)" && ($select3 == "(Select Rating Range)" || $select3 == "Doesn't Matter") && $serachq !== '') {
            $query = mysqli_query($con, "SELECT * FROM table2 WHERE Type='$select1' AND Restaurant LIKE '%$serachq%' ORDER BY LOCATE('$serachq', Restaurant) LIMIT 10");  
        } else if ($select1 !== "(Select Type of Food)" && $select2 == "(Select Your Country)" && ($select3 !== "(Select Rating Range)" || $select3 !== "Doesn't Matter") && $serachq !== '') {
            $query = mysqli_query($con, "SELECT * FROM table2 WHERE Type='$select1' AND Star='$select3' AND Restaurant LIKE '%$serachq%' ORDER BY LOCATE('$serachq', Restaurant) LIMIT 10");      
        } else if ($select1 == "(Select Type of Food)" && $select2 !== "(Select Your Country)" && ($select3 !== "(Select Rating Range)" || $select3 !== "Doesn't Matter") && $serachq !== '') {
            $query = mysqli_query($con, "SELECT * FROM table2 WHERE Country='$select2' AND Star='$select3' AND Restaurant LIKE '%$serachq%' ORDER BY LOCATE('$serachq', Restaurant) LIMIT 10"); 
        } else if ($select1 !== "(Select Type of Food)" && $select2 !== "(Select Your Country)" && ($select3 !== "(Select Rating Range)" || $select3 !== "Doesn't Matter") && $serachq !== '') {
            $query = mysqli_query($con, "SELECT * FROM table2 WHERE Country='$select2' AND Type='$select1' AND Star='$select3' AND Restaurant LIKE '%$serachq%' ORDER BY LOCATE('$serachq', Restaurant) LIMIT 10");     
        }  
        //Finish
        //$("#searchbar1").data("inputa");
        $count = mysqli_num_rows($query);
        if($count == 0) {
            $output = '<p30>No Results</p30>';
        } else {
            while($record = mysqli_fetch_array($query)) {
                $rname = $record['Restaurant'];
                if (strlen($rname)>20) {
                    $truncateword = substr($rname, 0, 20);
                    $rname = substr($truncateword, 0, 20)."...";
                }
                $output .= '<div id=output'.$a.' class="'.$record['Restaurant'].'"><p90>'.$rname.'</p90>
                </div><div id=output1'.$a.'></div><script>
                document.getElementById("output'.$a.'").addEventListener("mouseover", function(){
                document.getElementById("searchbar1").value = document.getElementById("output'.$a.'").className;
                document.getElementById("searchbar1").style.backgroundColor = "rgba(232, 218, 192, 1)";
                document.getElementById("output110").style.transform = "scale(3)";
                document.getElementById("output19").style.transform = "scale(3)";
                document.getElementById("output18").style.transform = "scale(3)";
                document.getElementById("output17").style.transform = "scale(3)";
                document.getElementById("output16").style.transform = "scale(3)";
                document.getElementById("output15").style.transform = "scale(3)";
                document.getElementById("output14").style.transform = "scale(3)";
                document.getElementById("output13").style.transform = "scale(3)";
                document.getElementById("output12").style.transform = "scale(3)";
                document.getElementById("output11").style.transform = "scale(3)";
                document.getElementById("output1'.$a++.'").addEventListener("mouseenter", function(){
                        document.getElementById("searchbar1").value = $("#searchbar1").data("inputa");   
                        document.getElementById("searchbar1").style.backgroundColor = "rgba(195,195,195,1)";
                        
            });
            });
            document.getElementById("output'.$a.'").addEventListener("click", function(){
                document.getElementById("searchbar1").value = document.getElementById("output'.$a.'").className; 
                document.getElementById("output110").style.transform = "scale(0)";
                document.getElementById("output19").style.transform = "scale(0)";
                document.getElementById("output18").style.transform = "scale(0)";
                document.getElementById("output17").style.transform = "scale(0)";
                document.getElementById("output16").style.transform = "scale(0)";
                document.getElementById("output15").style.transform = "scale(0)";
                document.getElementById("output14").style.transform = "scale(0)";
                document.getElementById("output13").style.transform = "scale(0)";
                document.getElementById("output12").style.transform = "scale(0)";
                document.getElementById("output11").style.transform = "scale(0)";
                
            });
                
            </script>
            <style>
#output110 {
    position: absolute;
    margin-top: 44.3%;
    margin-left: 56%;
    border-radius: 10px; 
    padding-bottom: 3.6%;  
    padding-top: 1.3%;
    width: 11.8%;
    z-index: -1;
    transform: scale(3);
}
#output19 {
    position: absolute;
    margin-top: 44.3%;
    margin-left: 43.8%;
    border-radius: 10px; 
    padding-bottom: 3.6%;  
    padding-top: 1.3%;
    width: 11.8%;
    z-index: -1;
    transform: scale(3);
}
#output18 {
    position: absolute;
    margin-top: 44.3%;
    margin-left: 31.6%;
    border-radius: 10px; 
    padding-bottom: 3.6%;  
    padding-top: 1.3%;
    width: 11.8%;
    z-index: -1;
    transform: scale(3);
}
#output17 {
    position: absolute;
    margin-top: 44.3%;
    margin-left: 19.4%;
    border-radius: 10px; 
    padding-bottom: 3.6%;  
    padding-top: 1.3%;
    width: 11.8%;
    z-index: -1;
    transform: scale(3);
}
#output16 {
    position: absolute;
    margin-top: 44.3%;
    margin-left: 7.2%;
    border-radius: 10px; 
    padding-bottom: 3.6%;  
    padding-top: 1.3%;
    width: 11.8%;
    z-index: -1;
    transform: scale(3);
}
#output15 {
    position: absolute;
    margin-top: 43.3%;
    margin-left: 54%;
    border-radius: 10px; 
    padding-bottom: 3.6%;  
    padding-top: 1.3%;
    width: 11.8%;
    z-index: -1;
    transform: scale(3);
}
#output14 {
    position: absolute;
    margin-top: 43.3%;
    margin-left: 41.4%;
    border-radius: 10px; 
    padding-bottom: 3.6%;  
    padding-top: 1.3%;
    width: 11.8%;
    z-index: -1;
    transform: scale(3);
}
#output13 {
    position: absolute;
    margin-top: 43.3%;
    margin-left: 28.9%;
    border-radius: 10px; 
    padding-bottom: 3.6%;  
    padding-top: 1.3%;
    width: 11.8%;
    z-index: -1;
    transform: scale(3);
}
#output12 {
    position: absolute;
    margin-top: 43.3%;
    margin-left: 16.3%;
    border-radius: 10px; 
    padding-bottom: 3.6%;  
    padding-top: 1.3%;
    width: 11.8%;
    z-index: -1;
    transform: scale(3);
}
#output11 {
    position: absolute;
    margin-top: 43.3%;
    margin-left: 4.1%;
    border-radius: 10px; 
    padding-bottom: 3.6%;  
    padding-top: 1.3%;
    width: 11.8%;
    z-index: -1;
    transform: scale(3);
}
</style>';
                
            }
        }
    } else {
        $query = mysqli_query($con, "SELECT * FROM table2 ORDER BY RAND() LIMIT 10");
        while($record = mysqli_fetch_array($query)) {
            $rname = $record['Restaurant'];
                if (strlen($rname)>20) {
                    $truncateword = substr($rname, 0, 20);
                    $rname = substr($truncateword, 0, 20)."...";
                } 
                $output .= '<div id=output'.$a.' class="'.$record['Restaurant'].'"><p90>'.$rname.'</p90>
                </div><div id=output1'.$a.'></div><script>
                document.getElementById("output'.$a.'").addEventListener("mouseover", function(){
                document.getElementById("searchbar1").value = document.getElementById("output'.$a.'").className;
                document.getElementById("searchbar1").style.backgroundColor = "rgba(232, 218, 192, 1)";
                document.getElementById("output110").style.transform = "scale(3)";
                document.getElementById("output19").style.transform = "scale(3)";
                document.getElementById("output18").style.transform = "scale(3)";
                document.getElementById("output17").style.transform = "scale(3)";
                document.getElementById("output16").style.transform = "scale(3)";
                document.getElementById("output15").style.transform = "scale(3)";
                document.getElementById("output14").style.transform = "scale(3)";
                document.getElementById("output13").style.transform = "scale(3)";
                document.getElementById("output12").style.transform = "scale(3)";
                document.getElementById("output11").style.transform = "scale(3)";
                document.getElementById("output1'.$a++.'").addEventListener("mouseenter", function(){
                        document.getElementById("searchbar1").value = "";    
                        document.getElementById("searchbar1").style.backgroundColor = "rgba(195,195,195,1)";
                        
            });
            });
            document.getElementById("output'.$a.'").addEventListener("click", function(){
                document.getElementById("searchbar1").value = document.getElementById("output'.$a.'").className; 
                document.getElementById("output110").style.transform = "scale(0)";
                document.getElementById("output19").style.transform = "scale(0)";
                document.getElementById("output18").style.transform = "scale(0)";
                document.getElementById("output17").style.transform = "scale(0)";
                document.getElementById("output16").style.transform = "scale(0)";
                document.getElementById("output15").style.transform = "scale(0)";
                document.getElementById("output14").style.transform = "scale(0)";
                document.getElementById("output13").style.transform = "scale(0)";
                document.getElementById("output12").style.transform = "scale(0)";
                document.getElementById("output11").style.transform = "scale(0)";
                
            });
                
            </script>
            <style>
#output110 {
    position: absolute;
    margin-top: 44.3%;
    margin-left: 56%;
    border-radius: 10px; 
    padding-bottom: 3.6%;  
    padding-top: 1.3%;
    width: 11.8%;
    z-index: -1;
    transform: scale(3);
}
#output19 {
    position: absolute;
    margin-top: 44.3%;
    margin-left: 43.8%;
    border-radius: 10px; 
    padding-bottom: 3.6%;  
    padding-top: 1.3%;
    width: 11.8%;
    z-index: -1;
    transform: scale(3);
}
#output18 {
    position: absolute;
    margin-top: 44.3%;
    margin-left: 31.6%;
    border-radius: 10px; 
    padding-bottom: 3.6%;  
    padding-top: 1.3%;
    width: 11.8%;
    z-index: -1;
    transform: scale(3);
}
#output17 {
    position: absolute;
    margin-top: 44.3%;
    margin-left: 19.4%;
    border-radius: 10px; 
    padding-bottom: 3.6%;  
    padding-top: 1.3%;
    width: 11.8%;
    z-index: -1;
    transform: scale(3);
}
#output16 {
    position: absolute;
    margin-top: 44.3%;
    margin-left: 7.2%;
    border-radius: 10px; 
    padding-bottom: 3.6%;  
    padding-top: 1.3%;
    width: 11.8%;
    z-index: -1;
    transform: scale(3);
}
#output15 {
    position: absolute;
    margin-top: 43.3%;
    margin-left: 54%;
    border-radius: 10px; 
    padding-bottom: 3.6%;  
    padding-top: 1.3%;
    width: 11.8%;
    z-index: -1;
    transform: scale(3);
}
#output14 {
    position: absolute;
    margin-top: 43.3%;
    margin-left: 41.4%;
    border-radius: 10px; 
    padding-bottom: 3.6%;  
    padding-top: 1.3%;
    width: 11.8%;
    z-index: -1;
    transform: scale(3);
}
#output13 {
    position: absolute;
    margin-top: 43.3%;
    margin-left: 28.9%;
    border-radius: 10px; 
    padding-bottom: 3.6%;  
    padding-top: 1.3%;
    width: 11.8%;
    z-index: -1;
    transform: scale(3);
}
#output12 {
    position: absolute;
    margin-top: 43.3%;
    margin-left: 16.3%;
    border-radius: 10px; 
    padding-bottom: 3.6%;  
    padding-top: 1.3%;
    width: 11.8%;
    z-index: -1;
    transform: scale(3);
}
#output11 {
    position: absolute;
    margin-top: 43.3%;
    margin-left: 4.1%;
    border-radius: 10px; 
    padding-bottom: 3.6%;  
    padding-top: 1.3%;
    width: 11.8%;
    z-index: -1;
    transform: scale(3);
}
</style>';
            
            
                
        }
    }
echo($output);
echo($output1style);
?>