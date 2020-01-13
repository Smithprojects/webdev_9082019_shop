<?php 
    include('parts/header.php');
    
    if( isset( $_POST['fio'] ) ) {
        $pass = crypt($_POST['password'], 'shop');
       
        $sql_manader = "
                INSERT INTO managers (id, fio, phone, email, password)
                VALUE
                (NULL, '{$_POST['fio']}', '{$_POST['phone']}','{$_POST['email']}', '{$pass}')
        ";

        $result_manager = mysqli_query($db, $sql_manader);

        if( $result_manager ) {
            echo 'Пользователь успешно добавлен';

        }

    }
?>

<form method="POST" action="">
    <input type="text" name="fio" placeholder="ФИО">
    <input type="email" name="email" placeholder="email">
    <input type="tel" name="phone" placeholder="Телефон">
    <input type="password" name="password" placeholder="Пароль">
    <button type="submit">Зарегестрироваться</button>
</form>





<?php include('parts/footer.php');?>