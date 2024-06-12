<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="fit.css?v=<?php echo time(); ?>">
</head>
<body>
    <div>
        <div class="btn" id="add_client" onclick="add_client()"><p>Add client</p></div>
        <div class="btn" id="add_instructor" onclick="add_ins()"><p>Add instructor</p></div>
        <div class="btn" id="add_train" onclick="add_trn()"><p>Add training</p></div>
        <div class="btn" id="week_rep" onclick="week_rep()"><p>Instructors report</p></div>
        <div class="btn" id="mon_rep" onclick="mon_rep()"><p>Money report</p></div>
    </div>
    <script src="scrpt.js?v=<?php echo time(); ?>"></script>

    <div class="block" id="add_client_block">
        <form method="get">
            <input type="text" name="name_C" value="Name"></input>
            <input type="text" name="surname_C" value="Surname"></input>
            <select name="sex_C">
                <option value="M">Male</option>
                <option value="F">Female</option>
            </select><br>
            <input type="number" name="age_C" value="18" min="0" max="100" ></input><label>Age</label><br>
            <input type="number" name="pesel_C" value="12345678901" min="0" ></input><label>Pesel</label><br>
            <input type="tel" name="phone_C" value="48123456789" pattern="48[0-9]{3}[0-9]{3}[0-9]{3}"><label>Number</label><br>
            <input type="email" name="email_C"><label>Mail</label><br>
            <input type="number" name="MemID_C" min="1" max="7"></input><label>MembershipID</label><br>
            <input type="date" name="start_C" value="2024-05-10" min="2024-01-01"/><label>Date of start</label><br>
            <input type="date" name="end_C" value="2024-06-10" min="2024-06-01"/><label>Date of end</label><br>

            <input type="submit" name="add_person" value="Add person">
            
            <?php 
                if(isset($_GET['name_C'])) {
                    $name_C = $_GET['name_C'];                
                }if(isset($_GET['surname_C'])) {
                    $surname_C = $_GET['surname_C'];                
                }if(isset($_GET['sex_C'])) {
                    $sex_C = $_GET['sex_C'];                
                }if(isset($_GET['age_C'])) {
                    $age_C = $_GET['age_C'];                
                }if(isset($_GET['pesel_C'])) {
                    $pesel_C = $_GET['pesel_C'];                
                }if(isset($_GET['phone_C'])) {
                    $phone_C = $_GET['phone_C'];                
                }if(isset($_GET['email_C'])) {
                    $email_C = $_GET['email_C'];                
                }if(isset($_GET['MemID_C'])) {
                    $MemID_C = $_GET['MemID_C'];                
                }if(isset($_GET['start_C'])) {
                    $start_C = $_GET['start_C'];                
                }if(isset($_GET['end_C'])) {
                    $end_C = $_GET['end_C'];                
                }
                 
                if(isset($_GET['add_person'])){
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "fitness";

                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $database);

                    // Check connection
                    if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                    }                
                    $sql = "INSERT INTO client (age, mail, membershipID, name, pesel, phoneNumber, sex, surname, date_start, date_end) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                    $stmt = $conn->prepare($sql);
                    if ($stmt) {
                        // Bind parameters
                        $stmt->bind_param("isississss", $age_C, $email_C, $MemID_C, $name_C, $pesel_C, $phone_C, $sex_C, $surname_C, $start_C, $end_C);
                        
                        // Execute the statement
                        if ($stmt->execute()) {
                            echo "New record created successfully";
                        } else {
                            echo "Error: " . $stmt->error;
                        }

                        // Close statement
                        $stmt->close();
                    } else {
                        echo "Error: " . $conn->error;
                    }

                        
                    $conn->close();
                    header("Location: " . $_SERVER['PHP_SELF']);
                }   
            ?>
        </form>
    </div>
    <div class="block" id="add_instr_block">
        <form method="get">
            <input type="text" name="name_I" value="Name"></input>
            <input type="text" name="surname_I" value="Surname"></input>
            <select name="sex_I">
                <option value="M">Male</option>
                <option value="F">Female</option>
            </select><br>
            <input type="number" name="age_I" value="18" min="0" max="100" ></input><label>Age</label><br>
            <input type="number" name="pesel_I" value="12345678901" min="0" ></input><label>Pesel</label><br>

            <input type="checkbox" id="option1" name="option1" value="option1">
            <label for="option1">Pilates</label>
            <input type="checkbox" id="option2" name="option2" value="option2">
            <label for="option2">Aerobics</label>
            <input type="checkbox" id="option3" name="option3" value="option3">
            <label for="option3">Zumba</label>
            <input type="checkbox" id="option4" name="option4" value="option4">
            <label for="option4">Dance classes</label><br>
            <input type="checkbox" id="option5" name="option5" value="option5">
            <label for="option5">Cardio</label>
            <input type="checkbox" id="option6" name="option6" value="option6">
            <label for="option6">Strength training</label>
            <input type="checkbox" id="option7" name="option7" value="option7">
            <label for="option7">Crossfit</label><br>

            <input type="submit" name="add_ins" value="Add person">
            <?php 
                if(isset($_GET['name_I'])) {
                    $name_I = $_GET['name_I'];                
                }if(isset($_GET['surname_I'])) {
                    $surname_I = $_GET['surname_I'];                
                }if(isset($_GET['sex_I'])) {
                    $sex_I = $_GET['sex_I'];                
                }if(isset($_GET['age_I'])) {
                    $age_I = $_GET['age_I'];                
                }if(isset($_GET['pesel_I'])) {
                    $pesel_I = $_GET['pesel_I'];                
                }
                $lst_activites = [];
                if(isset($_GET['option1'])) {
                    $Pilates = $_GET['option1'];  
                    array_push($lst_activites, 1); 
                }if(isset($_GET['option2'])) {
                    $Aerobics = $_GET['option2'];  
                    array_push($lst_activites, 2);               
                }if(isset($_GET['option3'])) {
                    $Zumba = $_GET['option3'];     
                    array_push($lst_activites, 3);            
                }if(isset($_GET['option4'])) {
                    $Dance = $_GET['option4'];      
                    array_push($lst_activites, 4);           
                }if(isset($_GET['option5'])) {
                    $Cardio = $_GET['option5'];    
                    array_push($lst_activites, 5);             
                }if(isset($_GET['option6'])) {
                    $Strength = $_GET['option6'];   
                    array_push($lst_activites, 6);              
                }if(isset($_GET['option7'])) {
                    $Crossfit = $_GET['option7']; 
                    array_push($lst_activites, 7);                
                }
                 
                if(isset($_GET['add_ins'])){
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "fitness";

                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $database);

                    // Check connection
                    if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                    }                
                    // Insert data into the client table
                    $sql_ins1 = "INSERT INTO worker (age, name, pesel, sex, surname) VALUES (?, ?, ?, ?, ?)";
                    $stmt_ins1 = $conn->prepare($sql_ins1);
                    $stmt_ins1->bind_param("isiss", $age_I, $name_I, $pesel_I, $sex_I, $surname_I);
                    $stmt_ins1->execute();

                    // Insert data into the instructor table
                    $sql_ins2 = "INSERT INTO instructor (workerID) SELECT workerID FROM worker ORDER BY workerID DESC LIMIT 1";
                    $stmt_ins2 = $conn->prepare($sql_ins2);
                    $stmt_ins2->execute();


                    for($i = 0; $i != count($lst_activites); $i++){
                        $activity = $lst_activites[$i];
                        $sql_ins3 = "INSERT INTO instructorguidance (instructorID, activityID) SELECT workerID, $activity FROM worker ORDER BY workerID desc LIMIT 1";
                        $stmt_ins3 = $conn->prepare($sql_ins3);
                        $stmt_ins3->execute();
                    }
                    $conn->close();
                    header("Location: " . $_SERVER['PHP_SELF']);

                }   
            ?>
        </form>
    </div>
    <div class="block" id="add_train_block">
        <form method="get">
            <select name="clients_to_check">
            <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "fitness";
                $conn = new mysqli($servername, $username, $password, $database);

                $sql = "SELECT name, surname, clientID FROM client";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<option id='clientID_" . $row['clientID'] . "' value='" . $row['clientID'] . "'>" . $row['clientID'] . " " . $row['name'] . " " . $row['surname'] . "</option>";
                    }
                } else {
                    echo "0";
                }
                $conn->close();
            ?>
            </select><br>
            <select name="type_of_training">
                <option name="tr1" id="tr1" value="1">Pilates</option>
                <option name="tr2" id="tr2" value="2">Aerobics</option>
                <option name="tr3" id="tr3" value="3">Zumba</option>
                <option name="tr4" id="tr4" value="4">Dance classes</option>
                <option name="tr5" id="tr5" value="5">Cardio</option>
                <option name="tr6" id="tr6" value="6">Strength training</option>
                <option name="tr7" id="tr7" value="7">Crossfit</option>
            </select><br>
            <select name="instr_to_check">
                <option name="workerID_null" id="workerID_null" value="0">No Instructor</option>
                <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "fitness";
                    $conn = new mysqli($servername, $username, $password, $database);

                    $sql = "SELECT workerID, name, surname from worker where workerID in (SELECT workerID FROM instructor)";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<option id='workerID_" . $row['workerID'] . "' value='" . $row['workerID'] . "'>" . $row['workerID'] . " " . $row['name'] . " " . $row['surname'] . "</option>";
                        }

                    } else {
                        echo "0";
                    }
                    $conn->close();
                ?>
                
            </select>
            <input type="submit" name="add_rec" value="Add training">
        <form>
        <?php 
            if(isset($_GET['type_of_training']) && isset($_GET['clients_to_check']) && isset($_GET['instr_to_check'])) {
                $type_of_training = $_GET['type_of_training'];                
                $clients_to_check = $_GET['clients_to_check'];                
                $instr_to_check = $_GET['instr_to_check'];   

                if(isset($_GET['add_rec'])){
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "fitness";

                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $database);

                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }                

                    // Insert data into the client table
                    $sql_ins1 = "INSERT INTO clienttimetable (clientID, activityID, instructorID, trainDay) VALUES (?, ?, ?, CURDATE())";
                    $stmt_ins1 = $conn->prepare($sql_ins1);
                    
                    if ($stmt_ins1 === false) {
                        die("Prepare failed: " . $conn->error);
                    }
                    $type_of_training = (int)$type_of_training;
                    $clients_to_check = (int)$clients_to_check;
                    if ($instr_to_check == 0){
                        $instr_to_check = null;
                    }
                    $bind = $stmt_ins1->bind_param("iii", $clients_to_check, $type_of_training, $instr_to_check);
                    
                    if ($bind === false) {
                        die("Bind param failed: " . $stmt_ins1->error);
                    }
                    echo $instr_to_check;
                    $exec = $stmt_ins1->execute();
                    
                    if ($exec === false) {
                        die("Execute failed: " . $stmt_ins1->error);
                    }

                    $stmt_ins1->close();
                    $conn->close();
                    
                    // Redirect to avoid form resubmission
                    echo" 
                    <script>
                        var url = window.location.origin + window.location.pathname;
                        window.location.href = url;
                    </script>";
                }
            }
        ?>
    </div>
    <div class="block" id="week_rep_block">
        <form method="get">
            <input type="date" value="2024-01-01" id="date1" name="date1"> <label for="date1">Start date</label><br>
            <input type="date" value="2024-12-01" id="date2" name="date2"> <label for="date2">End date</label><br>
            <select name="instr_to_check2">
                <option name="workerID_all" id="workerID_all" value="0">All instructors</option>
                <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "fitness";
                    $conn = new mysqli($servername, $username, $password, $database);

                    $sql = "SELECT t.instructorID, w.name, w.surname from worker as w join instructor as t on w.workerID = t.workerID";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<option id='workerID_" . $row['instructorID'] . "' value='" . $row['instructorID'] . "'>" . $row['instructorID'] . " " . $row['name'] . " " . $row['surname'] . "</option>";
                        }

                    } else {
                        echo "0";
                    }
                    $conn->close();
                ?>
                
            </select>
            <input type="submit" name="check_rep" value="Check trainings">
        </form><br><br>
        
    <?php 
            if(isset($_GET['date1']) && isset($_GET['date2'])) {
                $date1 = "".$_GET['date1'];                
                $date2 = "".$_GET['date2'];                         
                $instr_to_check = (int)$_GET['instr_to_check2'];         

                if(isset($_GET['check_rep'])){
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "fitness";

                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $database);

                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }                
                    if ($instr_to_check == 0){
                        $sql = "SELECT trainDay, clientID, activityID, instructorID FROM clienttimetable
                                WHERE trainDay BETWEEN ? AND ?";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param('ss', $date1, $date2);
                    }else{
                        $sql = "SELECT trainDay, clientID, activityID, instructorID FROM clienttimetable
                                WHERE instructorID = ? AND trainDay BETWEEN ? AND ? ";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param('iss',$instr_to_check, $date1, $date2);
                    }
                    
                    $stmt->execute();
                    $result = $stmt->get_result();
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                        $sql2 = "SELECT name, surname FROM client WHERE clientID = ?";
                        $stmt2 = $conn->prepare($sql2);
                        $stmt2->bind_param('i', $row['clientID']);
                        $stmt2->execute();
                        $result2 = $stmt2->get_result();
                        $row2 = $result2->fetch_assoc(); 

                        $sql1 = "SELECT name, surname FROM worker WHERE workerID = (SELECT workerID FROM instructor WHERE instructorID = ?)";
                        $stmt1 = $conn->prepare($sql1);
                        $stmt1->bind_param('i', $row['instructorID']);
                        $stmt1->execute();
                        $result1 = $stmt1->get_result();
                        if ($result1->num_rows > 0) {
                            $row1 = $result1->fetch_assoc(); 
                            echo "Client " . $row2['name']  ." ". $row2['surname']. ", Day " . $row['trainDay'] ." " . $row1['name']." ". $row1['surname']."<br>";
                       
                        } else {
                            echo "Client " . $row2['name']  ." ". $row2['surname']. ", Day " . $row['trainDay'] ."<br>";
                        }
                        }

                    } else {
                        echo "0";
                    }
                    $conn->close();
                    echo" 
                    <script>
                    week_rep();
                    </script>";
                }
            }
        ?>
    </div>
    <div id="mon_rep_block" class="block">
        <form method="get">
            <select name="act_to_check2">
                <option name="membership_all" id="membership_all" value="0">All memberships</option>
                <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "fitness";
                    $conn = new mysqli($servername, $username, $password, $database);

                    $sql = "SELECT membershipID, title FROM membership";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<option id='membership_" . $row['membershipID'] . "' value='" . $row['membershipID'] . "'>" . $row['membershipID'] . " " . $row['title'] . "</option>";
                        }

                    } else {
                        echo "0";
                    }
                    $conn->close();
                ?>
            </select>
            <input type="submit" name="check_rep" value="Count memberships">
        </form><br>
        <?php
            if (isset($_GET["act_to_check2"])){
                $lst = [];
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "fitness";
                $conn = new mysqli($servername, $username, $password, $database);
                 
                $act_check = (int)$_GET['act_to_check2'];   

                if ($act_check == 0){
                    $sql = "SELECT c.membershipID, m.price 
                    FROM `client` as c join membership as m on c.membershipID = m.membershipID 
                    WHERE month(c.date_end) = month(curdate())";
                }else{
                    $sql = "SELECT c.membershipID, m.price 
                    FROM `client` as c join membership as m on c.membershipID = m.membershipID 
                    WHERE month(c.date_end) = month(curdate()) and c.membershipID = ". $act_check;
                
                }

                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "membership " . $row['membershipID'] . " " . $row['price'] . "<br>";
                        array_push($lst, $row['price']);
                    }

                } else {
                    echo "0";
                }
                echo "summ - ".array_sum($lst);
                $conn->close();
                echo" 
                <script>
                mon_rep();
                </script>";
            }
        ?>
    
    </div>
</body>
</html>