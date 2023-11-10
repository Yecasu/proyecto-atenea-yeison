<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style-login.css" />
</head>

<body>
    <?php
    include('config.php');
    session_start();
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = $connection->prepare("SELECT * FROM users WHERE USERNAME=:username");
        $query->bindParam("username", $username, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        if (!$result) {
            echo '<p class="error">La combinación de nombre de usuario y contraseña es incorrecta</p>';
        } else {
            if (password_verify($password, $result['password'])) {
                $_SESSION['user_id'] = $result['id'];
                echo '<p class="success">Felicitaciones, ha iniciado sesión</p>';
            } else {
                echo '<p class="error">La combinación de nombre de usuario y contraseña es incorrecta</p>';
            }
        }
    }
    ?>
    <form method="post" action="" name="signin-form">
        <div class="form-element">
            <label>Usuario</label>
            <input type="text" name="username" pattern="[a-zA-Z0-9]+" required />
        </div>
        <div class="form-element">
            <label>Contraseña</label>
            <input type="password" name="password" required />
        </div>
        <button type="submit" name="login" value="login">Ingresar</button>
        <br>
        <a href="register.php" class="button">Registrarme</a>
    </form>
</body>

</html>