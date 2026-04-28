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
        function showDrop(){
            let role = document.getElementById("role").value;
            let drop = document.getElementById("location");

            if(role==="Resident"){
                drop.style.display="block";
            }else{
                drop.style.display="none";
            }
        }

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
                        <div style="display:flex;flex-direction:column;gap:0.3rem">
                            <label for="acctype">Account Type</label>
                            <select name="acctype" style="background-color: #121929; border: 1px solid #899aad;border-radius: 5px; padding: 0.3rem 0;padding-left: 0.5rem;color:#899aad" 
                                onchange="showDrop()" id="role" required>
                                <option value="Resident" style="color:white;">Resident</option>
                                <option value="Responder" style="color:white;">Responder</option>
                            </select>    
                        </div>
                       
                        <div style="display:flex;flex-direction:column;gap:0.3rem" id="location">
                             <br>
                            <label for="location">Barangay</label>
                            <select name="location" style="background-color: #121929; border: 1px solid #899aad;border-radius: 5px; padding: 0.3rem 0;padding-left: 0.5rem;color:#899aad; width: 100%;" required >
                                <option value="Abanao-Zandueta-Kayong-Chugum-Otek (AZKCO)" style="color:white;">Abanao-Zandueta-Kayong-Chugum-Otek (AZKCO)</option>
                                <option value="A. Bonifacio-Caguioa-Rimando (ABCR)" style="color:white;">A. Bonifacio-Caguioa-Rimando (ABCR)</option>
                                <option value="Alfonso Tabora" style="color:white;">Alfonso Tabora</option>
                                <option value="Ambiong" style="color:white;">Ambiong</option>
                                <option value="Andres Bonifacio (Lower Bokawkan)" style="color:white;">Andres Bonifacio (Lower Bokawkan)</option>
                                <option value="Apugan-Loakan" style="color:white;">Apugan-Loakan</option>
                                <option value="Asin Road" style="color:white;">Asin Road</option>
                                <option value="Atok Trail" style="color:white;">Atok Trail</option>
                                <option value="Aurora Hill North Central" style="color:white;">Aurora Hill North Central</option>
                                <option value="Bakakeng Central" style="color:white;">Bakakeng Central</option>
                                <option value="Bakakeng North" style="color:white;">Bakakeng North</option>
                                <option value="Balsigan" style="color:white;">Balsigan</option>
                                <option value="Bayan Park East" style="color:white;">Bayan Park East</option>
                                <option value="Bayan Park West" style="color:white;">Bayan Park West</option>
                                <option value="Brookspoint" style="color:white;">Brookspoint</option>
                                <option value="Brookside" style="color:white;">Brookside</option>
                                <option value="Cabinet Hill-Teacher's Camp" style="color:white;">Cabinet Hill-Teacher's Camp</option>
                                <option value="Camdas Subdivision" style="color:white;">Camdas Subdivision</option>
                                <option value="Camp 7" style="color:white;">Camp 7</option>
                                <option value="Camp 8" style="color:white;">Camp 8</option>
                                <option value="Camp Allen" style="color:white;">Camp Allen</option>
                                <option value="Campo Filipino" style="color:white;">Campo Filipino</option>
                                <option value="City Camp Central" style="color:white;">City Camp Central</option>
                                <option value="City Camp Proper" style="color:white;">City Camp Proper</option>
                                <option value="Country Club Village" style="color:white;">Country Club Village</option>
                                <option value="Cresencia Village" style="color:white;">Cresencia Village</option>
                                <option value="Dagsian Lower" style="color:white;">Dagsian Lower</option>
                                <option value="Dagsian Upper" style="color:white;">Dagsian Upper</option>
                                <option value="Dizon Subdivision" style="color:white;">Dizon Subdivision</option>
                                <option value="Dominican Hill-Mirador" style="color:white;">Dominican Hill-Mirador</option>
                                <option value="Dontogan" style="color:white;">Dontogan</option>
                                <option value="DPS Area" style="color:white;">DPS Area</option>
                                <option value="Engineers' Hill" style="color:white;">Engineers' Hill</option>
                                <option value="Fairview Village" style="color:white;">Fairview Village</option>
                                <option value="Ferdinand (Happy Homes-Campo Sioco)" style="color:white;">Ferdinand (Happy Homes-Campo Sioco)</option>
                                <option value="Fort del Pilar" style="color:white;">Fort del Pilar</option>
                                <option value="Gabriela Silang" style="color:white;">Gabriela Silang</option>
                                <option value="General Emilio F. Aguinaldo" style="color:white;">General Emilio F. Aguinaldo</option>
                                <option value="General Luna Lower" style="color:white;">General Luna Lower</option>
                                <option value="General Luna Upper" style="color:white;">General Luna Upper</option>
                                <option value="Gibraltar" style="color:white;">Gibraltar</option>
                                <option value="Greenwater Village" style="color:white;">Greenwater Village</option>
                                <option value="Guisad Central" style="color:white;">Guisad Central</option>
                                <option value="Guisad Sorong" style="color:white;">Guisad Sorong</option>
                                <option value="Happy Hollow" style="color:white;">Happy Hollow</option>
                                <option value="Happy Homes-Lucban" style="color:white;">Happy Homes-Lucban</option>
                                <option value="Harrison-Claudio Carantes" style="color:white;">Harrison-Claudio Carantes</option>
                                <option value="Hillside" style="color:white;">Hillside</option>
                                <option value="Holy Ghost Extension" style="color:white;">Holy Ghost Extension</option>
                                <option value="Holy Ghost Proper" style="color:white;">Holy Ghost Proper</option>
                                <option value="Honeymoon-Holy Ghost" style="color:white;">Honeymoon-Holy Ghost</option>
                                <option value="Irisan" style="color:white;">Irisan</option>
                                <option value="Kabayanihan" style="color:white;">Kabayanihan</option>
                                <option value="Kagitingan" style="color:white;">Kagitingan</option>
                                <option value="Kayang Extension" style="color:white;">Kayang Extension</option>
                                <option value="Liwanag-Loakan" style="color:white;">Liwanag-Loakan</option>
                                <option value="Loakan Proper" style="color:white;">Loakan Proper</option>
                                <option value="Lourdes Subdivision Extension" style="color:white;">Lourdes Subdivision Extension</option>
                                <option value="Lourdes Proper" style="color:white;">Lourdes Proper</option>
                                <option value="Lucnab" style="color:white;">Lucnab</option>
                                <option value="Magsaysay Private Road" style="color:white;">Magsaysay Private Road</option>
                                <option value="Malcolm Square-Perfecto" style="color:white;">Malcolm Square-Perfecto</option>
                                <option value="Manuel A. Roxas" style="color:white;">Manuel A. Roxas</option>
                                <option value="Market Subdivision, Upper" style="color:white;">Market Subdivision, Upper</option>
                                <option value="Middle Quezon Hill Subdivision" style="color:white;">Middle Quezon Hill Subdivision</option>
                                <option value="Modern Site East" style="color:white;">Modern Site East</option>
                                <option value="Modern Site West" style="color:white;">Modern Site West</option>
                                <option value="MRR-Queen of Peace" style="color:white;">MRR-Queen of Peace</option>
                                <option value="New Lucban" style="color:white;">New Lucban</option>
                                <option value="Outlook Drive" style="color:white;">Outlook Drive</option>
                                <option value="Pacdal" style="color:white;">Pacdal</option>
                                <option value="Padre Burgos" style="color:white;">Padre Burgos</option>
                                <option value="Padre Zamora" style="color:white;">Padre Zamora</option>
                                <option value="Palma-Urbano" style="color:white;">Palma-Urbano</option>
                                <option value="Phil-Am" style="color:white;">Phil-Am</option>
                                <option value="Pinget" style="color:white;">Pinget</option>
                                <option value="Pinsao Pilot Project" style="color:white;">Pinsao Pilot Project</option>
                                <option value="Pinsao Proper" style="color:white;">Pinsao Proper</option>
                                <option value="Poliwes" style="color:white;">Poliwes</option>
                                <option value="Pucsusan" style="color:white;">Pucsusan</option>
                                <option value="Quezon Hill Proper" style="color:white;">Quezon Hill Proper</option>
                                <option value="Quezon Hill Upper" style="color:white;">Quezon Hill Upper</option>
                                <option value="Quirino Hill East" style="color:white;">Quirino Hill East</option>
                                <option value="Quirino Hill Lower" style="color:white;">Quirino Hill Lower</option>
                                <option value="Quirino Hill Middle" style="color:white;">Quirino Hill Middle</option>
                                <option value="Quirino Hill West" style="color:white;">Quirino Hill West</option>
                                <option value="Quirino-Magsaysay Upper" style="color:white;">Quirino-Magsaysay Upper</option>
                                <option value="Rizal Monument Area" style="color:white;">Rizal Monument Area</option>
                                <option value="Rock Quarry Lower" style="color:white;">Rock Quarry Lower</option>
                                <option value="Rock Quarry Upper" style="color:white;">Rock Quarry Upper</option>
                                <option value="Saint Joseph Village" style="color:white;">Saint Joseph Village</option>
                                <option value="Salud Mitra" style="color:white;">Salud Mitra</option>
                                <option value="San Antonio Village" style="color:white;">San Antonio Village</option>
                                <option value="San Luis Village" style="color:white;">San Luis Village</option>
                                <option value="San Roque Village" style="color:white;">San Roque Village</option>
                                <option value="San Vicente" style="color:white;">San Vicente</option>
                                <option value="Santo Rosario Valley" style="color:white;">Santo Rosario Valley</option>
                                <option value="Santo Tomas Proper" style="color:white;">Santo Tomas Proper</option>
                                <option value="Scout Barrio" style="color:white;">Scout Barrio</option>
                                <option value="Session Road Area" style="color:white;">Session Road Area</option>
                                <option value="South Drive" style="color:white;">South Drive</option>
                                <option value="Teodora Alonzo" style="color:white;">Teodora Alonzo</option>
                                <option value="Trancoville" style="color:white;">Trancoville</option>
                                <option value="Victoria Village" style="color:white;">Victoria Village</option>
                                
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