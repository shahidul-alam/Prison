<?php

include 'conn.php';

if(isset($_POST['done'])){

 $pid = $_GET['pid'];

 $name = $_POST['inputName'];
 $address = $_POST['inputAddress'];
 $nid = $_POST['inputNID'];
 $dob = $_POST['inputDOB'];
 $bg = $_POST['inputBG'];
 $ed = $_POST['inputEntryDate'];
 $pd = $_POST['inputDuration'];
 $cn = $_POST['inputCell'];

$q = "UPDATE `prisoner` SET `name`= '$name',`address`= '$address',`nid`= '$nid' ,`bloodgroup`='$bg',`entryDate`= '$ed',`dateofbirth`='$dob',`punishmentDuration`='$pd',`CellNo`='$cn'  WHERE pid = '$pid' ";

 $query = mysqli_query($conn,$q);

 if (mysqli_query($conn, $q)) {
    echo "New record created successfully";
} else {
    echo "Error: " .$q . "<br>" . mysqli_error($conn);
}


 header('location:prisonerInfo.php');
}

?>

<!DOCTYPE html>
<html>

<head>
    <title></title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="col-lg-6 m-auto">



        <form method="post">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Name</label>
                    <input name="inputName" type="text" class="form-control" placeholder="Name">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">NID</label>
                    <input name="inputNID" type="number" class="form-control" placeholder="NID">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="inputPassword4">Address</label>
                    <input name="inputAddress" type="text" class="form-control" placeholder="Address">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Date of Birth</label>
                    <input name="inputDOB" type="date" class="form-control" placeholder="Date of Birth">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Blood Group</label>
                    <input name="inputBG" type="text" class="form-control" placeholder="Blood Group">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputEmail4">Entry Date</label>
                    <input name="inputEntryDate" type="date" class="form-control" placeholder="Entry Date">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputPassword4">P. Duration</label>
                    <input name="inputDuration" type="number" class="form-control" placeholder="Duration">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputPassword4">Cell number</label>
                    <input name="inputCell" type="text" class="form-control" placeholder="Cell number">
                </div>
            </div>
            <div class="modal-footer ml-auto">
                <button class="btn btn-success" type="submit" name="done"> Submit </button><br>
            </div>
        </form>




    </div>
</body>

</html>