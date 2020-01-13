<?php
    include ('../config/db.php');
    include ('../modules/functions.php');

    $response = [
        'products'=>[],
        'quantity_all'=> 0,
        'full_price_all'=>0
    ];

    //d($response);
    //если $_GET не пустой
    if( !empty( $_GET['id'] ) ){
        // если $_SESSION['basket'] пуст создаю его
        if( empty( $_SESSION['basket'] ) ){
            
            $_SESSION['basket'] = [];    
        
        }
        //проверяю есть ли такой товар в сессии, если есть увеличиваю кол-во товара
        $is_find = false;
        foreach($_SESSION['basket'] as $key=>$basketItem){
            
            if( $basketItem['id'] == $_GET['id'] ){
                
                $_SESSION['basket'][$key]['quantity']++;
                $is_find = true;
                
                if (( @$_GET['quantiy'] ) ) {
                    
                    $_SESSION['basket'][$key]['quantity'] = $_GET['quantiy'];
                
                }  

                if (@$_GET['quantiy'] === '0'  ) {
                    
                    unset($_SESSION['basket'][$key]); 
                    
                }
            }
        }
        //если товара нет создаю запись
        if($is_find == false){
            $_SESSION['basket'][] = [
                'id'=> $_GET['id'],
                'quantity'=> 1
            ];
        }
    }

    $quantity = 0;
    if( !empty( $_SESSION['basket'] ) ){
        foreach( $_SESSION['basket'] as $basket_item ){

            $sql_basket_item = "
                SELECT * FROM products WHERE id = {$basket_item['id']}
            ";
            $result_basket_item = mysqli_query($db, $sql_basket_item);
            $data_basket_item = mysqli_fetch_assoc($result_basket_item);
            $data_basket_item['quantity'] =  $basket_item['quantity'];
            $data_basket_item['full_price'] = $basket_item['quantity'] * $data_basket_item['price'];
            $response['products'][] = $data_basket_item;

            $response['full_price_all'] += $data_basket_item['full_price'];
            $response['quantity_all'] += $basket_item['quantity'];
            $quantity += $basket_item['quantity'];   
        }
    }
    //d($_SESSION);

    //echo $quantity;
    //d($response);
    echo json_encode($response);
?>