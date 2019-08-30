<?php
    //создаю ассоц.массив
    $response = [
        'name' => '',
        'email' => '',
        'massege' => '',
        'erroe' => false,
    ];
    //проверяю что массив пришел
    if(!empty($_POST['data'])){
        //декодирую данные
        $data = json_decode($_POST['data'], true);
        //Подключаюсь к БД
        $db = mysqli_connect('localhost', 'root', '', 'webdev_5042019_19');
        mysqli_set_charset($db, 'utf8');
            
        //проверяю что в массиве пришли нужные мне данные
            if (!empty($data['name']) && !empty($data['email'])){
                //записываю данные в ассоц.массив
                $response['name'] = $data['name'];
                $response['email'] = $data['email'];
                $response['massege'] = 'Подписка оформлена';

                    //формирую строку sql и отправляю в БД
                    $sql = "INSERT INTO subscribe (`id`, `name`, `email`) 
                    VALUES (NULL, '{$data['name']}', '{$data['email']}')";
                    
                    $result = mysqli_query($db, $sql);

                    //проверяю на ошибки добавления в БД
                    if ($result) {
                        $response['massege'] = 'Подписка оформлена';

                    } else {
                        $response['error'] = true;
                        $response['massege'] = 'Ошибка в базе данных';
                    }
            
            } else {
                $response['error'] = true;
                $response['massege'] = 'Введите данные';
            }
    
    } else {
        $response['error'] = true;
        $response['massege'] = 'Введите данные';
    }

    echo json_encode($response);
?>

<?php
    // $db = mysqli_connect('localhost', 'root', '', 'webdev_5042019_19');
    // mysqli_set_charset($db, 'utf8');

    // if ( !empty($data['name']) && !empty($data['email'])){
        
    //     $sql = "INSERT INTO subscribe (`id`, `name`, `email`) 
    //             VALUES (NULL, '{$data['name']}', '{$data['email']}')";

    //     $result = mysqli_query($db, $sql);

    //     if ($result) {
    //         echo "Подписка оформлена";

    //     } else {
    //         echo "Произошла ошибка";
    //     }

    // } 
?>

<?php

// function d( $arr ) {
//     echo '<pre>';
//     print_r ( $arr );
//     echo '</pre>';
// };

// d($_POST);
?>