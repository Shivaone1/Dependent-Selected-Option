<?php include_once("db_connect.php");?>
<?php 
if(isset($_POST['ID'])){
 $ID=$_POST['ID'];
//  $query=mysqli_query($conn,"SELECT ID,state FROM `state` WHERE countryID='$ID'");
 $queryState=$conn->query("SELECT ID,state FROM state WHERE countryID='$ID'");
 while($row=mysqli_fetch_assoc($queryState)){
    $ID = $row['ID'];
    $state = $row['state'];
    echo "<option value='$ID'>$state</option>";
}
}
if(isset($_POST['stateID'])){
    $id=$_POST['stateID'];
    // echo $queryCity="SELECT ID,city FROM `city` WHERE state_ID='$stateID'";
    $query=$conn->query("SELECT ID,city FROM `city` WHERE state_ID='$id'");
    while($row=mysqli_fetch_assoc($query)){
       $cityID = $row['ID'];
       $city = $row['city'];
       echo "<option value='$cityID'>$city</option>";
   }
}
?>