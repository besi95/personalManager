<?php
/**
 * this file will handle registration process
 */
include 'config.php';
$errors = array();
if(isset($_POST['register'])){

    $params = $_POST;
    $firstName = $params['first_name'];
    $lastName = $params['last_name'];
    $email = $params['email'];
    $dateOfBirth = $params['birth_date'];
    $userName = $params['user_name'];
    $password = md5($params['user_password']);
    $contactNo = $params['contact_no'];
    $plan = $params['plan'];

    if (!preg_match("/[a-zA-Z]+/",$firstName))
        $errors2['firstName'] = "*Lejohen vetem shkronja";
    if (!preg_match("/[a-zA-Z]+/",$lastName))
        $errors2['lastName'] = "Lejohen vetem shkronja";
    if (strlen($lastName) > '25')
    {
        $errors2['lastName']  = "Mbiemri nuk mund te jete me i gjate se 25 karaktere";
    }
    if (!preg_match("/^06[0-9]{1}[-\s]?[0-9]{4}[0-9]{3}$/",$contactNo))
        $errors2['contactNo'] = "Format i gabuar i numrit te telefonit 06********";
    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        $errors2['email'] = "Format i gabuar i emailit";

    if(!$errors2){

//check if email exists in users table
        $sql = "SELECT * FROM perdorues WHERE email = '{$email}'";
        $result = $conn->query($sql);

        $count = $result->num_rows;

        if($count > 0){

            $errors[] = "Perdoruesi me kete email ekziston.";
            setcookie('registration_status', json_encode($errors), time() + 3600, '/');
            header('Location: ../views/login.php');


        }else {

// prepare and bind parameters to prevent sql injection

            $stmt = $conn->prepare(
                "INSERT INTO perdorues (emri, mbiemri, username, email,
    datelindja,plan_id,telefon,pasuord)
VALUES (?,?,?,?,?,?,?,?)");

            $stmt->bind_param("ssssssis",
                $firstName,
                $lastName,
                $userName,
                $email,
                $dateOfBirth,
                $plan,
                $contactNo,
                $password
            );

            $stmt->execute();

            $stmt->close();
            $conn->close();

            $errors[] = "Perdoruesi u krijua me sukses.";
            setcookie('registration_status', json_encode($errors), time() + 3600, '/');
            header('Location: ../views/login.php');

        }
    }

}?>

