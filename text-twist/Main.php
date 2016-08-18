<!DOCTYPE html>
<html>
    <head>
    <style type="text/css">
        #div1 {
            text-align:center;
            width: 550px;
            border-radius: 15px 60px 30px 5px;
            background: #F5F6CE;
            padding: 20px; 
            height: 100%; 
            margin: 0 auto; 
            
            position: relative;
            top: 10px;
            border: 3px solid #63AD21;
        }
        body{
            background-repeat:no-repeat;
            background-size:cover;
        }
    </style>
    </head>
    
    <body style="text-align:center;" background="background.jpg" >
        <img src="title.png" style="width:580px;border-radius: 15px 30px 30px 15px;"></img>
        <div id="div1">
        
        
        <h3>Start  game!</h3>
        <button type="button" onclick="f1()">Click me!</button><br>
        <?php

        session_start();
        $op=$_GET['op'];
        
        if ($op=="0"){
        // Echo session variables that were set on previous page
            if ($_SESSION["word"]!=null){
                echo "<br>"."7 new characters are generated: " . $_SESSION["word"] . ".<br>";
            }
           
        }
        ?>
        
        <hr>
        <h3>Input a word!</h3>
        <input id='word'onkeyup="validate(this.value)" type='text'/>
        <button type="button" onclick="check()">Submit!</button>
        <div id='validation'></div>
        <hr>
        <div>
            <h3>Score Board:</h3>
                
            <span id='score'>0</span>
            
        </div>
        <hr>
        <h3>All combinations!</h3>
        <button type="button" onclick="f2()">Show them!</button><br>
        <br>
         <div id ="result" align="center" style="display:none">
            <?php
            session_start();
            if($_SESSION["result"]!=null){
            $result=$_SESSION["result"];
            
                $html = '<table border="1">';
                $i=0;
                    
                    foreach($result as $value){
                        if($i==0)$html .= '<tr>';
                        $html .= '<td>' . $value . '</td>';
                        if($i==8){
                            $html .= '</tr>';
                            $i=-1;
                        }
                        $i+=1;
                    }
                }
            
                // finish table and return it
            
                $html .= '</table>';
                echo $html;
            
            ?>
        </div>
            
            
        </div>
        <h4 style="color:#100000;float:right ">Produced by: Ye Wong</h4>
    </body>
</html>
    

<script type="text/javascript">
    // var x=0;
    function f1(){
        location.href = "action.php?op=1";
    }
    
    function f2(){
        var computedDisplay = window.getComputedStyle(document.getElementById("result"), null).getPropertyValue('display');

        if (computedDisplay === 'none') {
            document.getElementById("result").style.display = 'block';
        }
        else{
            document.getElementById("result").style.display = 'none';
        }
        
    }
    
    function check(){
        
        var word=document.getElementById('word').value;
    
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            // alert("wang");
            // alert(xmlhttp.responseText);
            
            // document.getElementById('score').innerHTML =xmlhttp.responseText;
            // window.location ='./Main.php';
            // {"status":1,"score":1,"finish:"["BA"]}
            var json_data=JSON.parse(xmlhttp.responseText);
            // json_data=JSON.parse('{"status":1,"score":1,"finish:"["BA"]}');
 
            // alert(json_data.length);
            document.getElementById('score').innerHTML =json_data.length+'<hr><h3>Completed:</h3>';
            for(var x in json_data){
            document.getElementById('score').innerHTML+=json_data[x]+'<br>';
            }
            
        } 
        }
        xmlhttp.open("GET", "check.php?input=" + word, false);
        xmlhttp.send();
       
    }

    function validate(input) {
        
        if(input!=''){
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState != 4 && xmlhttp.status == 200) {
            // alert("wang");
            document.getElementById('validation').innerHTML = "Validating..";
        } else if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            // alert("wang");
            document.getElementById('validation').innerHTML = xmlhttp.responseText;
        } else {
            // alert("wang");
            document.getElementById('validation').innerHTML = "Error Occurred. <a href='index.php'>Reload Or Try Again</a> the page.";
        }
        }
        xmlhttp.open("GET", "validation.php?input=" + input, false);
        xmlhttp.send();
        }
        else{
            document.getElementById('validation').innerHTML = "Please input a word...";
        }
    }
</script>