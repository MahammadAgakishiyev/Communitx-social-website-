<?php
    session_start();
    $id=$_SESSION["communitx_userid"];
    $conn=mysqli_connect("localhost:3307","root","","communitx");
    $query1="DELETE FROM users WHERE userid='$id'";
    $query2="DELETE FROM posts WHERE userid='$id'";
    $query3="DELETE FROM community_members WHERE userid='$id'";
    mysqli_query($conn,$query1);
    mysqli_query($conn,$query2);
    mysqli_query($conn,$query3);
    $query1="DELETE FROM users WHERE owner='$id'";
    mysqli_query($conn,$query1);
    $query2="DELETE FROM posts WHERE owner='$id'";
    mysqli_query($conn,$query2);
    $query4="SELECT likes,contentid FROM likes";
    $result=mysqli_query($conn,$query4);
    if ($result){
        $data=false;
        while ($row=mysqli_fetch_assoc($result)){
            $data[]=$row;
        }
        if ($data){
            for($i=0;$i<count($data);$i++){
                $r=$data[$i]['contentid'];
                $likes=json_decode($data[$i]['likes'],true);
                for ($k=0;$k<count($likes);$k++){
                    
                    if ($likes[$k]["userid"]==$id){
                        unset($likes[$k]);
                    }
                }
                if (count($likes)==0){
                    $query="DELETE FROM likes WHERE contentid='$r'";
                }
                else{
                    $string=json_encode($likes);
                    $query="UPDATE likes SET likes='$string' WHERE contentid='$r'";
                }
                mysqli_query($conn,$query);
            }
        }
    }
    header("Location: signup");
        

?>