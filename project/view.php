<?php
       $db = mysqli_connect("db1.cs.uakron.edu:3306", "kff6", "aem8Aquo");
// if(!empty($_GET['id'])){

//     //Create connection and select DB
//         $db = mysqli_connect("db1.cs.uakron.edu:3306", "kff6", "aem8Aquo");
    
//     //Check connection
//     if($db->connect_error){
//        die("Connection failed: " . $db->connect_error);
//     }
    
//     //Get image data from database
//     $sql="select * from ISP_kff6.images";
//     $query=$db->query($sql);
//     $num=mysqli_num_rows($query);
//     $result=mysqli_fetch_array($query);
//     echo '<img src="data:image/jpeg;base64,'.base64_encode($result['image']).'"/>';

// }
$sql="select * from ISP_kff6.images";
$query=$db->query($sql);
$num=mysqli_num_rows($query);
$result=mysqli_fetch_array($query);
echo '<img src="data:image/jpeg;base64,'.base64_encode($result['image']).'"/>';
?>