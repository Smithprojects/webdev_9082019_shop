<?php 
    include('parts/header.php');

    if( isset( $_POST['email'] ) ) {
        $pass = crypt($_POST['password'], 'shop');
       
        $sql_manader = "
            SELECT * FROM managers
            WHERE email = '{$_POST['email']}' AND password = '{$pass}'
        ";

        $result_manager = mysqli_query($db, $sql_manader);

        if( mysqli_num_rows( $result_manager ) > 0) {
            //Процедура авторизации
            echo 'Вы авторизованы';
            $_SESSION['auth'] = true;
            $_SESSION['manager'] = mysqli_fetch_assoc($result_manager);
        } else {
            echo 'Логин или пароль неверные';
        }
    }
    
?>

<form method="POST" action="">
    <input type="email" name="email" placeholder="email">
    <input type="password" name="password" placeholder="Пароль">
    <button type="submit">Войти</button>
</form>


<?php include('parts/footer.php');?>