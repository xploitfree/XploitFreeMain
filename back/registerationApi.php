<?php
    $response = array();
    $con = mysqli_connect("localhost","root","","EaseYourHire") or die(mysqli_error($con));
    $body= file_get_contents('php://input');
    $string=json_decode($body);
    $name = $string->name;
    $phone = $string->phone;
    $email = $string->email;
    $interest = $string->interest;

    $query1 = "INSERT INTO RegisteredStudents(name,email,phone) values('$name','$email','$phone')";
    $query2 = "INSERT INTO StudentInterests(name,interest,phone) values('$name','$interest','$phone')";
    $query_result1 = mysqli_query($con,$query1);
    $query_result2 = mysqli_query($con,$query2);

    if($query_result1 != 1 && $query_result2 != 1){
        $response['success'] = false;
        $response['message'] = "wrong credentials";   
    }
    else{
        
        $response['success'] = true;
        $response['message'] = "successfully registered";
    }

    echo json_encode($response);
?>