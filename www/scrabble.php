<?php 
session_start();
if(!isset($_SESSION["sess_user"])){
	header("location:index.php");
} else 
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Fun tourist</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.scrolly.min.js"></script>
    <script src="js/jquery.scrollzer.min.js"></script>
    <script src="js/skel.min.js"></script>
    <script src="js/skel-layers.min.js"></script>
    <script src="js/init.js"></script>
    <script src="http://maps.googleapis.com/maps/api/js"></script>
    
    <script type="text/javascript" src="cordova.js"></script>
    <script type="text/javascript" src="js/index.js"></script>
    
    <noscript>
        <link rel="stylesheet" href="css/skel.css" />
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/style-wide.css" />
    </noscript>
    <!--[if lte IE 9]><link rel="stylesheet" href="css/ie/v9.css" /><![endif]-->
    <!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
    <style>
    .button-help {
        width: 34px;
        height: 34px;
        float: right;
        margin-top: -93px;
        margin-right: 1%;
    }
    
    .button-help:hover {
        color: rgb(215, 133, 180);
    }
    
    .modalDialog {
        position: fixed;
        font-family: Arial, Helvetica, sans-serif;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        background: rgba(0, 0, 0, 0.8);
        z-index: 99999;
        opacity: 0;
        -webkit-transition: opacity 400ms ease-in;
        -moz-transition: opacity 400ms ease-in;
        transition: opacity 400ms ease-in;
        pointer-events: none;
    }
    
    .modalDialog:target {
        opacity: 1;
        pointer-events: auto;
    }
    
    .modalDialog > div {
        width: 87%;
        min-height: 50%;
        position: relative;
        margin: 10% auto;
        padding: 5px 20px 13px 20px;
        border-radius: 10px;
        background: #fff;
        border: 3px solid black;
        font-size: medium;
        line-height: 30px;
        box-shadow: 3px 3px 4px rgb(113, 103, 103);
    }
    
    .close {
        background: #606061;
        color: #FFFFFF;
        line-height: 25px;
        position: absolute;
        right: -12px;
        text-align: center;
        top: -10px;
        width: 24px;
        text-decoration: none;
        font-weight: bold;
        -webkit-border-radius: 12px;
        -moz-border-radius: 12px;
        border-radius: 12px;
        -moz-box-shadow: 1px 1px 3px #000;
        -webkit-box-shadow: 1px 1px 3px #000;
        box-shadow: 1px 1px 3px #000;
        position: absolute;
    }
    
    .close:hover {
        background: #505354;
    }
    
    .open-modal {
        width: 50px;
        height: 50px;
        background: red;
        border-radius: 50%;
        padding: 5px;
        text-align: center;
        border: 1px solid #ccc;
        text-decoration: none;
    }
    
    .open-modal > a {
        color: black;
        text-decoration: none;
    }
    
    .sample2 {
        overflow-y: scroll;
    }
    
    #modalLink {
        text-decoration: none;
    }
    
    .modal-title {
        font-size: 26px;
        text-align: center;
        padding-bottom: 4px;
        border-bottom: 1px dotted #D39595;
        margin-bottom: 7px;
    }
    
    #div1 {
        width: 33%;
        height: 35px;
        padding-left: 10px;
        border: 1px solid #aaaaaa;
        border-radius: 7px;
        min-width: 55%;
        margin: 0 auto;
        margin-top: -80px;
        padding-bottom: 11px;
        margin-right: 25%;
    }
    
    #div2 {
        width: 350px;
        height: 70px;
        padding: 10px;
        border: 1px solid #aaaaaa;
    }
    
    .draggable {
        height: 51px;
        display: -webkit-inline-box;
        padding-left: 11px;
        margin-left: 6px;
        color: rgb(33, 37, 40);
        font-weight: bold;
        font-size: 22px;
    }
    
    .btn-icon {
        width: 65px;
        height: 65px;
        border-radius: 50%;
        padding-top: 14px;
        padding-left: 4px;
    }
    
    .clear-letters {
        width: 65px !important;
        height: 65px;
        background: #222629;
        z-index: 10;
        border-radius: 50%;
        box-shadow: 3px 3px 6px 0px #515151;
        margin-left: 81%;
        margin-bottom: -3%;
    }
    
    .clear-letters:hover {
        color: #E27689;
    }
    
    .clear-letters:active {
        color: #E27689;
    }
    
    .btn-class {
        width: 65px !important;
        height: 65px;
        background: #222629;
        z-index: 10;
        float: right;
        position: relative;
        border-radius: 50%;
        /* border: 2px solid #CCCCCD; */
        top: 229px;
        box-shadow: 3px 3px 6px 0px #515151;
    }
    
    .btn-class:hover {
        color: #E27689;
    }
    
    .btn-class:active {
        color: #E27689;
    }
	
	#submit {
		margin:0 auto;
		background-color: black;
	}
	p{
	margin-bottom: 4em;
	}
    .p_lista {
        margin-top: 0.5em;
        margin-bottom: 0.5em;
    }
    </style>
</head>
<body>
    <!-- Header -->
    <div id="header" class="skel-layers-fixed">
        <div class="top">
            <!-- Logo -->
            <div id="logo">
                <span class="image "><img src="images/travel.png" alt="" /></span>
                <h1 id="title">
					<span class="icon fa-user" style="margin-right:5px;"></span>
					<?=$_SESSION['sess_user'];?> 
					<br>
					<br>
					<a href="logout.php">Logout</a>
				</h1>
                
            </div>
            <!-- Nav -->
            <nav id="nav">
                <ul>
                    <li><a href="home.php" id="top-link"><span class="icon fa-home">Home</span></a>
                    </li>
                    <li><a href="map.php" id="portfolio-link"><span class="icon fa-map-marker">Location</span></a>
                    </li>
                    <li><a href="scrabble.php" id="about-link"><span class="icon fa-pencil">Scrabble</span></a>
                    </li>
                    
                </ul>
            </nav>
        </div>
        <div class="bottom">
            <!-- Social Icons -->
            <ul class="icons">
                <li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a>
                </li>
                <li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a>
                </li>
                <li><a href="#" class="icon fa-google-plus"><span class="label">Google Plus</span></a>
                </li>
            </ul>
        </div>
    </div>
    <!-- Main -->
    <div id="main">
        <!-- About Me -->
        <section id="about" class="two">
            <div class="container">
                <header>
                    <h2>Let's play!</h2>
                </header>
                <a href="#" class="image featured">
                    <img src="images/logo.png" alt="" />
                </a>

                <p>Form a destination</p>
                <div class="button-help">
                    <a href="#openModal" id="modalLink">
                        <span class="icon fa-question-circle"></span>
                    </a>
                </div>
            </div>
			<div id="openModal" class="modalDialog">
                <div>
                    <a href="#close" title="Close" class="close">X</a>
                    <h2 class="modal-title">Help</h2>
                    <div class="sample2">
                        Combine the letters you have collected to form a name of a destination. 
                        <br>
                        If you are lucky you will win a trip to that place.
                        <br>
                        After submitting your destination, you lose the letters forming it. 

                    </div>
                </div>
            </div>

        <div id="div1" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
		
		
		<br>
		
		<form action="" method="POST">
			<!-- get word -->
			<input type="hidden" id="words" name="words" value="dsdasda"/>
            <!-- array of letters -->
            <input type="hidden" id="arr" name="arr" value="jas sum niza"/>
			<!-- kopce sto ja prakja destinacijata-->
			<input type="submit" id="submit" name="submit" value="send the destination" onclick="sendDestination()" />
		</form>
			
        <p class="p_lista" >Here's a list of your letters:</p>
        <!-- ovie fiksni da se izbrisat -->
        <div id="vrati" ondrop="drop(event)" ondragover="allowDrop(event)">
            <div  class="draggable">L </div>
            <div  class="draggable">O </div>
            <div  class="draggable">N </div>
            <div  class="draggable">D </div>
            <div  class="draggable">O </div>
            <div  class="draggable">N </div>
            - se vrakaat posto se fiksni
        </div>
        <div id="vrati" ondrop="drop(event)" ondragover="allowDrop(event)">
            <?php 
            $con=mysqli_connect('lean.mk','mktour@lean.mk','mktour123mktour!@','mktour'); 
            if(!$con) echo "<br> umre konekcija";
            else echo "<br> uspea konekcija <br>";
            
            //id na user-----------$idUser
            $user =$_SESSION['sess_user'];
                echo "user: ". $user;
            $proverka_user = "select idKorisnik from Korisnik as k
                              where k.username ='".$user."'";
            $rez1 = $con->query($proverka_user);
            while($row1 = $rez1->fetch_assoc()) {
                $idUser = $row1["idKorisnik"];
                echo "<br> idKorisnik: ". $idUser. "<br>";
            }
            
            //selektiraj gi bukvite od ima_bukva
            //cuvaj go i id-to od ima_bukva za posle da se brisat bukvite
            $sql = "SELECT id_ima_bukva, bukva FROM ima_bukva as ima, Bukvi as b
                    WHERE ima.idKorisnik = '".$idUser."'
                    AND ima.idBukva = b.idBukvi";
            $query=mysqli_query($con,$sql);
            if(!$query) echo "<br> umre query <br>";
            else echo "<br> uspea query <br>";

            $rez = $con->query($sql);
            if ($rez->num_rows > 0) {
                while($row = $rez->fetch_assoc()) {
                    $idImaBukva = $row["id_ima_bukva"]; 
                    echo "<br> idImaBukva: ". $idImaBukva. " ";
                    ?> 
                    <div id="<?php echo $idImaBukva;?>" draggable="true" ondragstart="drag(event)" class="draggable" > 
                        <?php echo " ".$row["bukva"]." ";?>
                    </div>
                    <?php
                }
            }
            else {
                echo "You don't have any letters yet!";
            }
            
            
            if(isset($_POST["submit"])){
                
                echo "<br>----- php po klik na kopceto -------<br>";
                
                //get word
                if(!empty($_POST['words'])) {
                    $word=$_POST['words'];
                }
                //echo $word;   
                $destinacija = preg_replace('/\s/u', '', $word); 
                echo "Formirana destinacija: ".$destinacija.".";
                
                $sql1 = "SELECT idDestinacija,destinacija FROM Destinacii
                        WHERE destinacija='".$destinacija."'";
                                
                $query1=mysqli_query($con,$sql1);
                if(!$query1) echo "<br> umre query <br>";
                else echo "<br> uspea query <br>";
            
                $rez1 = $con->query($sql1);
                if ($rez1->num_rows > 0) {
                    while($row1 = $rez1->fetch_assoc()) {
                        echo "<br> idDestinacija: ". $row1["idDestinacija"]. " - destinacija: ". $row1["destinacija"]. "<br>";
                        $dest = $row1["destinacija"];
                        echo "dest: ". $dest. "<br>";
                        
                        echo "Congratulations, you have won a trip in ".$destinacija."!";
                    }   
                }
                else
                {
                    echo "<br>We're sorry, that destination doesn't exist in our database.";
                }
                
                //stringot so id objektot vo ciklus podeli go po zapirki i da gi zacuvuva vo array
                //pr. array(4,9) -> array[1]=9 
                    //check

                if(!empty($_POST['arr'])) {
                    $arr=$_POST['arr'];
                }
                echo "<br>".$arr."<br>";
                
                $del = explode(",",$arr);
                //$dani = $del['1'];
                //echo "vtora bukva: ".$dani."<br>";

                //dolu delete from ima_bukva where [for i=o do array.lengthi++ {id? = niza[i]}] 
                //-vidi vo sql sintaksa za for
                //ili sql da e vnatre vo for-ot - poverojatno!

                $niza = array();
                for ($i = 0; $i < sizeof($del); $i++)
                {
                    //echo "Bukvata ".$del[$i]." ima id vo ima_bukva ".$idImaBukva."<br>";
                    $niza[] = $del[$i];
                    // $sql_brisi =  query
                    //probuvam cuda:
                    $sql_id = "SELECT id_ima_bukva FROM ima_bukva as ima, Bukvi as b
                                WHERE ima.idKorisnik = '".$idUser."'
                                AND ima.idBukva = b.idBukvi
                                AND b.bukva = '".$del[$i]."'";
                    $query_id=mysqli_query($con,$sql_id);
                    if(!$query_id) echo "<br> umre query <br>";
                    else echo "<br> uspea query <br>";

                    $rez_id = $con->query($sql_id);
                    if ($rez_id->num_rows > 0) {
                        while($row_id = $rez->fetch_assoc()) {
                            $id = $row_id["id_ima_bukva"]; 
                            echo "<br> idImaBukva: ". $id. " ";
                            
                        } // ????
                    }
                }
                print_r($niza);


                
            }
            
            ?>
        </div>


        </section>
		

        
        	
		
		
    </div>
	
	
</body>
<script>
window.addEventListener('DOMContentLoaded', splitWords, false);
function splitWords() {
    var elems = document.querySelectorAll('.draggable'),
        text,
        textNode,
        words,
        elem;
    // iterate through all .draggable elements
    for (var i = 0, l = elems.length; i < l; i++) {
        elem = elems[i];
        textNode = elem.childNodes[0];
        text = textNode.nodeValue;
        // remove current text node
        elem.removeChild(textNode);
        words = text.split(' ');
        // iterate through words
        for (var k = 0, ll = words.length; k < ll; k++) {
            // create node for all words
            textNode = document.createElement('span');
            textNode.id = 'word_' + i + k;
            // allow dragging for words
            textNode.draggable = true;
            textNode.ondragstart = drag;
            textNode.appendChild(document.createTextNode(words[k] + ' '));
            elem.appendChild(textNode)
        }
    }
}
function allowDrop(ev) {
    ev.preventDefault();
}
function drag(ev) {
    ev.dataTransfer.setData("Text", ev.target.id);
    //console.log('targetid: ' + ev.target.id);
}
function drop(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("Text");
    ev.target.appendChild(document.getElementById(data));
}

//get word
var word;
function sendDestination()
{
	// for da gi cita id na divovite ($idImaBukva) ??
    
	word = document.getElementById("div1").textContent;
    //word = document.getElementById("<?php echo $idImaBukva;?>").textContent; - nejke
    if (word){
        alert ( word);
        //document.getElementById("words").innerHTML+=word;
		document.getElementById("words").value = word;
        var i;
        var arr = [];
        var spoeno;
            spoeno = word.replace(/ /g,'');
            alert(spoeno);
        for(i=0; i<=spoeno.length; i++) {
            arr.push(spoeno.charAt(i)); //deli go bukva po bukva
        }
        arr = arr.filter(Boolean); //trgni prazni elementi
        //console.log(arr);
        alert(arr);
        document.getElementById("arr").value = arr;
    }
	else
	{
		alert("Please enter letters to form a word.");
	}
}  

</script>
</html>
