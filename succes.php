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
            redirect(3);
        }
    }
    else {
        redirect(3);
    }
}

function redirect($error) {
    header("Location: http://localhost/Pictalk/index.php?err=$error");
    die();
}

if($_POST["action"] == "sign in") {
    if(!$_POST["email"]) {
        redirect(1);
    }
    elseif(!$_POST["password"]) {
        redirect(2);
    }
    else {
        login($_POST["email"], $_POST["password"]);
    }
}

?>

<!DOCTYPE html>