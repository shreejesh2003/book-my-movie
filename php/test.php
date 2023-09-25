<?php
    require('connection.php');
    $sql="CALL `movproc`(58);";
    $res=mysqli_query($con,$sql);
    // $row=mysqli_fetch_assoc($res);
    // $stmt = mysqli_prepare($con, $sql);
    // mysqli_stmt_execute($stmt);
    // $temp = mysqli_stmt_store_result($stmt);

    // $count = mysqli_stmt_num_rows($stmt);
    // print("Number of rows in the table: ".$count."\n");


    // mysqli_stmt_close($stmt);

    // $res = mysqli_query($sql);
    $row=mysqli_fetch_array($res);

    echo $row['Name'];

    $row = null;

    unset($res);

    require('connection.php');
    // $q=mysqli_query($con,$sql);
   
    // // $temp = mysqli_fetch_assoc($stmt);
    // // echo $temp;
    // echo 'efgerfg';



    $sql="select * from movies";
    $res=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($res);
    echo $row['Name']
    // while($row=mysqli_fetch_assoc($res)){
    //     echo $row['T_id'] ." ". $row['M_id']." ". $row['time']; 
    // }
?>
