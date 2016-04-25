<?PHP
include 'Database.php';
session_start();

function login($username, $password) {
    $hash_password = md5($password);
    $data = mysql_query("SELECT * FROM users WHERE username = '$username' && password = '$hash_password'");
    if($data) {
        if (mysql_num_rows($data) == 1 ) {
            $row = mysql_fetch_assoc($data);
            $_SESSION['userid'] = $row['userid'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['name'] = $row['name'];
            redirect("front.php");
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

function upload($pic, $description, $owner) {
    
}

function redirect($location) {
    header("Location: http://localhost/Pictalk/$location");
    die();
}

if($_POST["action"] == "sign in") {
    login($_POST["username"], $_POST["password"]);
}
elseif($_POST["action"] == "sign up") {
    redirect("signup");
}
else {
    redirect("index.php");
}
?>