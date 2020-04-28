<?php include 'conn.php'; ?>

<?php

include 'conn.php';

if(isset($_POST['done'])){

 $name = $_POST['inputName'];
 $address = $_POST['inputAddress'];
 $nid = $_POST['inputNID'];
 $dob = $_POST['inputDOB'];
 $bg = $_POST['inputBG'];
 $ed = $_POST['inputEntryDate'];
 $pd = $_POST['inputDuration'];
 $cn = $_POST['inputCell'];
 

 $query1 = " INSERT INTO `prisoner`(`name`, `address`, `nid`, `bloodgroup`, `entryDate`, `dateofbirth`, `punishmentDuration`, `CellNo`) VALUES ('$name','$address', '$nid', '$bg', '$ed', '$dob',  '$pd', '$cn')";

  $query = mysqli_query($conn,$query1);


}
?>

<!doctype html>
<html lang="en">

<head>


    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
    <title>Prison Control System</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 offset-3">
                <h1 class="display-4">Prison Control System</h1>
            </div>
        </div>
        <div class="container">
            <div class="col-lg-12">
                <br><br>
                <h1 class="text-primary text-center"> Prisoners' Information </h1>
                <br>

                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                    data-whatever="@mdo">Insert Data</button>

                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Insert Prisoner Info</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
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

                        </div>
                    </div>
                </div>
                



                <div class= container>
                <div class="col-sm-6 offset-9">
                
                <form class="form-inline" method="get" action="searchResult.php">
                <div class="form-group mx-sm-3 mb-2">
                    <label for="inputPassword2" class="sr-only">Search</label>
                    <input type="text" class="form-control" name="searchFor" placeholder="Search here">
                </div>
                <button type="submit" class="btn btn-primary mb-2">Search</button>
             </form>

                    
                

                                        </div>
                                    </div>





         </div>
</div>

                <table id="tabledata" class=" table table-striped table-hover table-bordered">

                    <tr class="bg-dark text-white text-center">

                        <th> ID </th>
                        <th> Name </th>
                        <th> Address </th>
                        <th> NID </th>
                        <th> DoB </th>
                        <th> Blood Group </th>
                        <th> Entry Date </th>
                        <th> Punishment Duration </th>
                        <th> Cell Number </th>
                        <th> Update </th>
                        <th> Delete </th>


                    </tr>


                    <?php


$q = "select * from prisoner order by name";

$show = mysqli_query($conn,$q);

while($res = mysqli_fetch_array($show)){
?>
                    <tr class="text-center">
                        <td>
                            <?php echo $res['pid'];  ?>
                        </td>
                        <td>
                            <?php echo $res['name'];  ?>
                        </td>
                        <td>
                            <?php echo $res['address'];  ?>
                        </td>
                        <td>
                            <?php echo $res['nid'];  ?>
                        </td>
                        <td>
                            <?php echo $res['dateofbirth'];  ?>
                        </td>
                        <td>
                            <?php echo $res['bloodgroup'];  ?>
                        </td>
                        <td>
                            <?php echo $res['entryDate'];  ?>
                        </td>
                        <td>
                            <?php echo $res['punishmentDuration'];  ?> Years </td>
                        <td>
                            <?php echo $res['CellNo'];  ?>
                        </td>
                        <td> <button class="btn-success btn"> <a href="update.php?pid=<?php echo $res['pid']; ?>" class="text-white">
                                    Update </a> </button> </td>
                        <td> <button class="btn-danger btn"> <a href="delete.php?pid=<?php echo $res['pid']; ?>" class="text-white">
                                    Delete </a> </button> </td>

                    </tr>

                    <?php 
}
?>

                </table>
                <?php
       
        
       $sql = "select count(*) as Total from prisoner";
        
       $result = $conn->query($sql);
        
       while($row = $result->fetch_assoc()) {
        
                           
                                
                               
                                     echo "Total = ".$row['Total'];?>
                               
                           
        
                            <?php 
        }
        ?>


                    </thead>
                    

            </div>
        </div>


    </div>





                <?php

include 'footer.php';
?>




    <script type="text/javascript">
        $(document).ready(function () {
            $('#tabledata').DataTable();
        })
    </script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</body>

</html>