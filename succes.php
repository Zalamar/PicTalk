<?PHP
include 'Database.php';
session_start();

function login($email, $password) {
    $data = mysql_query("SELECT * FROM profile WHERE email = '$email' && password = '$password'");
    if($data) {
        if (mysql_num_rows($data) == 1 ) {
            $row = mysql_fetch_assoc($data);
            $_SESSION['userid'] = $row['userid'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['password'] = $row['password'];
            echo($_SESSION['password']);
        }
        else {
            redirect("index.php?err");
        }
    }
    else {
        redirect("index.php?err");
    }
}

function signup($name, $email, $password, $telephone) {
    $sql = "INSERT INTO profile (name, email, password, telephone) VALUES ('name', 'email', 'password', 'telephone')";
    $result = mysql_query($sql);
    
    if ($result) {
        
    }
}

function redirect($location) {
    header("Location: http://localhost/Pictalk/$location");
    die();
}

if($_POST["action"] == "sign in") {
    login($_POST["email"], $_POST["password"]);
    
}
elseif($_POST["action"] == "sign up") {
    signup();
}

?>

<!DOCTYPE html>