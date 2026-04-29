<?php 
    
    include "oop.php";
    $oop = new OOP();


    $name="";
    $email="";
    $password="";
    $Conpas="";
    $acctype="";
    $location="";

    if(isset($_POST['register'])){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $Conpas=$_POST['Conpassword'];
        $acctype=$_POST['acctype'];
        $location=$_POST['location'];       
        
        if(strlen($password) < 8){
            echo "<script>alert('Password must be at least 8 characters. Try again...');</script>";
        }else if($password!=$Conpas){
            echo "<script>alert('Passwords do not match. Try again...');</script>";
        }else{
            $oop->register($name,$email,$hash,$acctype,$location);
        }

    }

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="register.css">
	<title>DisasterWatch</title>
    <script>

        function showPass(){
            let password = document.getElementById("pass").value;
            let passwarning = document.getElementById("password");

            if(password.length<8){
                passwarning.style.display="block";
            }else{
                passwarning.style.display="none";
            }

        }

        function showConPass(){
            let password = document.getElementById("pass").value;
            let password2 = document.getElementById("passwordmatch").value;
            let passwarning = document.getElementById("passwordMatching");

            if(password2!=""&&password!=password2){
                passwarning.style.display="block";
            }else{
                passwarning.style.display="none";
            }

        }
    </script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-center align-items-center" style="height:150vh;">
                <div class="card" style="width:30rem">

                <h2 class="header">Create Account</h2>
                <h5 class="subheader">Join DisasterWatch's Vigilant Community</h5>
                    <form method="post" action="">
                        <div style="display:flex;flex-direction:column;gap:0.3rem">
                            <label for="name">Full Name</label>
                            <input type="text" name="name" placeholder="e.g. Juan Dela Cruz" autocomplete="off" style="color:white" required>
                        </div>
                        <br>
                        <div style="display:flex;flex-direction:column;gap:0.3rem">
                            <label for="email">Email Address</label>
                            <input type="email" name="email" placeholder="yourname@gmail.com" autocomplete="off" style="color:white" required>
                        </div>
                        <br>
                        <div style="display:flex;flex-direction:column;gap:0.3rem">
                            <label for="password">Password</label>
                            <input type="password" name="password" placeholder="Min 8 characters" autocomplete="off" style="color:white" id="pass" onkeyup="showPass()" required>
                            <label id="password" style="color:red;display: none;">Password must at least be 8 characters...</label>
                        </div>
                        <br>
                        <div style="display:flex;flex-direction:column;gap:0.3rem">
                            <label for="password">Confirm Password</label>
                            <input type="password" name="Conpassword" placeholder="Confirm password" autocomplete="off" style="color:white" id="passwordmatch" onkeyup="showConPass()" required>
                            <label id="passwordMatching" style="color:red;display: none;">Passwords do not match...</label>
                        </div>
                        <br>
                       
                        <div style="display:flex;flex-direction:column;gap:0.3rem" id="location">
                            <label for="location">Barangay</label>
                            <select name="location" style="background-color: #121929; border: 1px solid #899aad;border-radius: 5px; padding: 0.3rem 0;padding-left: 0.5rem;color:#899aad; width: 100%;" required >
                                <option value="2" style="color:white;">Abanao-Zandueta-Kayong-Chugum-Otek (AZKCO)</option>
                                <option value="1" style="color:white;">A. Bonifacio-Caguioa-Rimando (ABCR)</option>
                                <option value="3" style="color:white;">Alfonso Tabora</option>
                                <option value="4" style="color:white;">Ambiong</option>
                                <option value="5" style="color:white;">Andres Bonifacio (Lower Bokawkan)</option>
                                <option value="6" style="color:white;">Apugan-Loakan</option>
                                <option value="7" style="color:white;">Asin Road</option>
                                <option value="8" style="color:white;">Atok Trail</option>
                                <option value="10" style="color:white;">Aurora Hill North Central</option>
                                <option value="13" style="color:white;">Bakakeng Central</option>
                                <option value="14" style="color:white;">Bakakeng North</option>
                                <option value="16" style="color:white;">Balsigan</option>
                                <option value="17" style="color:white;">Bayan Park East</option>
                                <option value="19" style="color:white;">Bayan Park West</option>
                                <option value="22" style="color:white;">Brookspoint</option>
                                <option value="21" style="color:white;">Brookside</option>
                                <option value="23" style="color:white;">Cabinet Hill-Teacher's Camp</option>
                                <option value="24" style="color:white;">Camdas Subdivision</option>
                                <option value="25" style="color:white;">Camp 7</option>
                                <option value="26" style="color:white;">Camp 8</option>
                                <option value="27" style="color:white;">Camp Allen</option>
                                <option value="28" style="color:white;">Campo Filipino</option>
                                <option value="29" style="color:white;">City Camp Central</option>
                                <option value="30" style="color:white;">City Camp Proper</option>
                                <option value="31" style="color:white;">Country Club Village</option>
                                <option value="32" style="color:white;">Cresencia Village</option>
                                <option value="33" style="color:white;">Dagsian Lower</option>
                                <option value="34" style="color:white;">Dagsian Upper</option>
                                <option value="35" style="color:white;">Dizon Subdivision</option>
                                <option value="36" style="color:white;">Dominican Hill-Mirador</option>
                                <option value="37" style="color:white;">Dontogan</option>
                                <option value="38" style="color:white;">DPS Area</option>
                                <option value="39" style="color:white;">Engineers' Hill</option>
                                <option value="40" style="color:white;">Fairview Village</option>
                                <option value="41" style="color:white;">Ferdinand (Happy Homes-Campo Sioco)</option>
                                <option value="42" style="color:white;">Fort del Pilar</option>
                                <option value="43" style="color:white;">Gabriela Silang</option>
                                <option value="44" style="color:white;">General Emilio F. Aguinaldo</option>
                                <option value="45" style="color:white;">General Luna Lower</option>
                                <option value="46" style="color:white;">General Luna Upper</option>
                                <option value="47" style="color:white;">Gibraltar</option>
                                <option value="48" style="color:white;">Greenwater Village</option>
                                <option value="49" style="color:white;">Guisad Central</option>
                                <option value="50" style="color:white;">Guisad Sorong</option>
                                <option value="51" style="color:white;">Happy Hollow</option>
                                <option value="52" style="color:white;">Happy Homes-Lucban</option>
                                <option value="53" style="color:white;">Harrison-Claudio Carantes</option>
                                <option value="54" style="color:white;">Hillside</option>
                                <option value="55" style="color:white;">Holy Ghost Extension</option>
                                <option value="56" style="color:white;">Holy Ghost Proper</option>
                                <option value="57" style="color:white;">Honeymoon-Holy Ghost</option>
                                <option value="60" style="color:white;">Irisan</option>
                                <option value="61" style="color:white;">Kabayanihan</option>
                                <option value="62" style="color:white;">Kagitingan</option>
                                <option value="63" style="color:white;">Kayang Extension</option>
                                <option value="67" style="color:white;">Liwanag-Loakan</option>
                                <option value="68" style="color:white;">Loakan Proper</option>
                                <option value="70" style="color:white;">Lourdes Subdivision Extension</option>
                                <option value="72" style="color:white;">Lourdes Proper</option>
                                <option value="74" style="color:white;">Lucnab</option>
                                <option value="75" style="color:white;">Magsaysay Private Road</option>
                                <option value="78" style="color:white;">Malcolm Square-Perfecto</option>
                                <option value="79" style="color:white;">Manuel A. Roxas</option>
                                <option value="80" style="color:white;">Market Subdivision, Upper</option>
                                <option value="81" style="color:white;">Middle Quezon Hill Subdivision</option>
                                <option value="84" style="color:white;">Modern Site East</option>
                                <option value="85" style="color:white;">Modern Site West</option>
                                <option value="86" style="color:white;">MRR-Queen of Peace</option>
                                <option value="87" style="color:white;">New Lucban</option>
                                <option value="88" style="color:white;">Outlook Drive</option>
                                <option value="89" style="color:white;">Pacdal</option>
                                <option value="90" style="color:white;">Padre Burgos</option>
                                <option value="91" style="color:white;">Padre Zamora</option>
                                <option value="92" style="color:white;">Palma-Urbano</option>
                                <option value="93" style="color:white;">Phil-Am</option>
                                <option value="94" style="color:white;">Pinget</option>
                                <option value="95" style="color:white;">Pinsao Pilot Project</option>
                                <option value="96" style="color:white;">Pinsao Proper</option>
                                <option value="97" style="color:white;">Poliwes</option>
                                <option value="98" style="color:white;">Pucsusan</option>
                                <option value="99" style="color:white;">Quezon Hill Proper</option>
                                <option value="100" style="color:white;">Quezon Hill Upper</option>
                                <option value="101" style="color:white;">Quirino Hill East</option>
                                <option value="102" style="color:white;">Quirino Hill Lower</option>
                                <option value="103" style="color:white;">Quirino Hill Middle</option>
                                <option value="104" style="color:white;">Quirino Hill West</option>
                                <option value="105" style="color:white;">Quirino-Magsaysay Upper</option>
                                <option value="106" style="color:white;">Rizal Monument Area</option>
                                <option value="107" style="color:white;">Rock Quarry Lower</option>
                                <option value="109" style="color:white;">Rock Quarry Upper</option>
                                <option value="110" style="color:white;">Saint Joseph Village</option>
                                <option value="111" style="color:white;">Salud Mitra</option>
                                <option value="112" style="color:white;">San Antonio Village</option>
                                <option value="113" style="color:white;">San Luis Village</option>
                                <option value="114" style="color:white;">San Roque Village</option>
                                <option value="115" style="color:white;">San Vicente</option>
                                <option value="119" style="color:white;">Santo Rosario Valley</option>
                                <option value="120" style="color:white;">Santo Tomas Proper</option>
                                <option value="122" style="color:white;">Scout Barrio</option>
                                <option value="123" style="color:white;">Session Road Area</option>
                                <option value="126" style="color:white;">South Drive</option>
                                <option value="127" style="color:white;">Teodora Alonzo</option>
                                <option value="128" style="color:white;">Trancoville</option>
                                <option value="129" style="color:white;">Victoria Village</option>
                                                                
                            </select>    
                        </div>

                        
                        <button class="login" name="register">Create Account</button>
                        <hr>
                        <h3 class="dont">Already have an account? <span class="create"><a href="login.php">Login here</a></span></h3>
                        <br>
                    </form>

                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</html>