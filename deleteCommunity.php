<?php
    session_start();
    $id=$_SESSION["community_id"];
    $conn=mysqli_connect("localhost:3307","root","","communitx");
    $query1="DELETE FROM users WHERE userid='$id'";
    mysqli_query($conn,$query1);
    $query2="DELETE FROM posts WHERE owner='$id'";
    mysqli_query($conn,$query2);
    header("Location: login");  

?>