<?php
    session_start();
    

    if(isset($_GET['action'])){

        switch($_GET['action']){
            case "add":
                if(isset($_POST['submit'])){
        
                    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                    $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);
            
                    if($name && $price && $qtt){
            
                        $product = [
                            "name" => $name,
                            "price" => $price,
                            "qtt" => $qtt,
                            "total" => $price*$qtt
                        ];
            
                        $_SESSION['products'][] = $product;
                    }
                }
                break;
            case "delete":
                
            case "clear": 
                session_destroy();

                break;
            case "up-qtt":
            case "down-qtt":
        }
    }
    

    header("Location:index.php");