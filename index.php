<?php include_once("db_connect.php");?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajax Option Dependent Get Value</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</head>

<body>
    <div class="container">
        <h1>Dependent Select List</h1>
        <form>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="country">Country</label>
                    <select class="form-control" id="country">
                        <option selected>Please Select One:</option>
                        <?php 
                    // $sql="SELECT ID,country FROM `country`";
                    // $country=mysqli_query($conn,"SELECT ID,country FROM `country`");
                    $country=$conn->query("SELECT ID,country FROM `country`");
                    while($row=mysqli_fetch_assoc($country)) : ?>
                        <option value="<?= $row['ID'];?>"><?php echo $row['country'];?></option>
                        <?php endwhile; ?>
                    </select>
                    <br>
                </div>
                <div class="form-group col-md-6">
                    <label for="state">State</label>
                    <select class="form-control" id="state">
                        <option selected>Please Select One:</option>
                       
                    </select>
                    <br>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="city">City</label>
                    <select class="form-control" id="city">
                        <option selected>Please Select One:</option>
                        
                    </select>
                    <br>
                </div>
                <div class="form-group col-md-6">
                    <label for="pinCode">Pin Code</label>
                    <select class="form-control" id="pinCode">
                        <option selected>Please Select One:</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                    </select>
                    <br>
                </div>
            </div>
        </form>
    </div>
    <script>
        $(document).ready(function(){
            $("#country").on('change',function(){
                var countryID=$(this).val();
                // console.log(countryID);
                $.ajax({
                    url:"get_Ajax_data.php",
                    method:"POST", /// type is also method
                    data:{ID:countryID},
                    dataType:"html",
                    success:function(data){
                       $("#state").html(data);
                    //    console.log(data);
                    }
                });
            });
            $("#state").on('change',function(){
                var stateID=$(this).val();
                // console.log(stateID);
                $.ajax({
                    url:"get_Ajax_data.php",
                    method:"POST", /// type is also method
                    data:{stateID:stateID},
                    dataType:"html",
                    success:function(data){
                       $("#city").html(data);
                    //    console.log(data);
                    }
                });
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
        integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous">
    </script>
</body>

</html>