<?php 

$con = mysqli_connect('localhost', 'root','','loginpro');

//Function Clean String Values
function escape($string)
{
    global $con;
    return mysqli_real_escape_string($con,$string);
}
//Query Function
function Query($query)
{
    global $con;
    return mysqli_query($con,$query);
}

//Confirm Function
function confirm($result){
    global $con;
    if(!$result){
        die('Query Failed'.mysqli_error($con));
    }
}

// fetch dATA  FROM DATABASE
function fetch_data($result){
    global $con;
    return mysqli_fetch_assoc($result);
}

//Row Value From Database
function row_count($count){
    return mysqli_num_rows($count);
}


?>