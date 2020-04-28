<?php include 'conn.php'; ?>

<?php

include 'conn.php';

if(isset($_POST['done'])){

 $name = $_POST['inputName'];
 $phone = $_POST['inputPhone'];
 $wa = $_POST['inputWa'];
 $ds = $_POST['inputDs'];
 $de = $_POST['inputDe'];
 

 $query1 = " INSERT INTO `prisonpolice`(`name`, `PhoneNumber`, `WorkingArea`, `DutyStarts`, `DutyEnds`) VALUES ('$name','$phone', '$wa', '$ds', '$de')";

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
                <h1 class="text-primary text-center"> Police Information </h1>
                <br>

                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                    data-whatever="@mdo">Inser Police Info</button>
                
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Insert Police Info</h5>
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
                                            <label for="inputPassword4">Phone</label>
                                            <input name="inputPhone" type="number" class="form-control" placeholder="Phone">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="inputPassword4">Working Area</label>
                                            <input name="inputWa" type="text" class="form-control" placeholder="area">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Duty Starts</label>
                                            <input name="inputDs" type="time" class="form-control" placeholder="Duty Starts">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Duty Ends</label>
                                            <input name="inputDe" type="time" class="form-control" placeholder="Duty Ends">
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
                
                <form class="form-inline" method="get" action="searchResult2.php">
                <div class="form-group mx-sm-3 mb-2">
                    <label for="inputPassword2" class="sr-only">Search</label>
                    <input type="text" class="form-control" name="searchFor2" placeholder="Search here">
                </div>
                <button type="submit" class="btn btn-primary mb-2">Search</button>
             </form>

                    
                

                                        </div>
                                    </div>

                
                <table id="tabledata" class=" table table-striped table-hover table-bordered">

                    <tr class="bg-dark text-white text-center">

                        <th> ID </th>
                        <th> Name </th>
                        <th> Phone </th>
                        <th> Working Area </th>
                        <th> Duty Starts </th>
                        <th> Duty Ends </th>
                        


                    </tr>

                
                    <?php


$q3 = "select * from prisonpolice ";

$show3 = mysqli_query($conn,$q3);

while($res = mysqli_fetch_array($show3)){
?>
                    <tr class="text-center">
                        <td>
                            <?php echo $res['Police_ID'];  ?>
                        </td>
                        <td>
                            <?php echo $res['Name'];  ?>
                        </td>
                        <td>
                            <?php echo $res['PhoneNumber'];  ?>
                        </td>
                        <td>
                            <?php echo $res['WorkingArea'];  ?>
                        </td>
                        <td>
                            <?php echo $res['DutyStarts'];  ?>
                        </td>
                        <td>
                            <?php echo $res['DutyEnds'];  ?>
                        </td>
                       
                    </tr>

                    <?php 
}

?>

                </table>
            

                <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#pinfo"
                    data-whatever="@mdo">Emergency Police(10AM-6pm)</button>
                    <div class="modal fade" id="pinfo" tabindex="-1" role="dialog" aria-labelledby="pinfo" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Emergency Available</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                    <table id="tabledata" class=" table table-striped table-hover table-bordered">

                                            <tr class="bg-dark text-white text-center">

                                                <th> ID </th>
                                                <th> Police Name </th>
                                                <th> Phone Number </th>
                                                
                        
                        
                        
                                            </tr>
                        
                        
                                            <?php
                       
                        
                        $qq = "Select * from prisonpolice where DutyStarts='18:00:00' or DutyStarts='02:00:00';";
                        
                        $show5 = mysqli_query($conn,$qq);
                        
                        while($res = mysqli_fetch_array($show5)){
                        ?>
                                            <tr class="text-center">
                                                
                                                <td>
                                                    <?php echo $res['Police_ID'];  ?>
                                                </td>
                                                <td>
                                                    <?php echo $res['Name'];  ?>
                                                </td>
                                                <td>
                                                    <?php echo $res['PhoneNumber']; ?>
                                                </td>
                                                
                        
                        
                        
                                            </tr>
                        
                                            <?php 
                        }
                        ?>
                        
                                        </table>
                        
                            </div>

                        </div>
                    </div>
                </div>




           
                <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#pinfo1"
                    data-whatever="@mdo">Emergency Police(6PM-2AM)</button>
                    <div class="modal fade" id="pinfo1" tabindex="-1" role="dialog" aria-labelledby="pinfo1" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Emergency Available</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                    <table id="tabledata" class=" table table-striped table-hover table-bordered">

                                            <tr class="bg-dark text-white text-center">
                        
                                                <th> ID </th>
                                                <th> Police Name </th>
                                                <th> Phone Number </th>
                        
                        
                        
                                            </tr>
                        
                        
                                            <?php
                       
                       $qq2 = "Select * from prisonpolice where DutyStarts='02:00:00' or DutyStarts='10:00:00';";
                        
                       $show6 = mysqli_query($conn,$qq2);
                       
                       while($res = mysqli_fetch_array($show6)){
                       ?>
                                           <tr class="text-center">
                                               
                                               <td>
                                                   <?php echo $res['Police_ID'];  ?>
                                               </td>
                                               <td>
                                                   <?php echo $res['Name'];  ?>
                                               </td>
                                               <td>
                                                   <?php echo $res['PhoneNumber']; ?>
                                               </td>
                                               
                       
                       
                       
                                           </tr>
                       
                                           <?php 
                       }
                       ?>
                       
                                       </table>
                        
                            </div>

                        </div>
                    </div>
                </div>




           
                <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#pinfo2"
                    data-whatever="@mdo">Emergency Police(2AM-10AM)</button>
                    <div class="modal fade" id="pinfo2" tabindex="-1" role="dialog" aria-labelledby="pinfo2" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Emergency Available</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                    <table id="tabledata" class=" table table-striped table-hover table-bordered">

                                            <tr class="bg-dark text-white text-center">
                        
                                                <th> ID </th>
                                                <th> Police Name </th>
                                                <th> Phone Number </th>
                        
                        
                        
                                            </tr>
                        
                        
                                            <?php
                       
                       $qq1 = "Select * from prisonpolice where DutyStarts='10:00:00' or DutyStarts='18:00:00';";
                        
                       $show7 = mysqli_query($conn,$qq1);
                       
                       while($res = mysqli_fetch_array($show7)){
                       ?>
                                           <tr class="text-center">
                                               
                                               <td>
                                                   <?php echo $res['Police_ID'];  ?>
                                               </td>
                                               <td>
                                                   <?php echo $res['Name'];  ?>
                                               </td>
                                               <td>
                                                   <?php echo $res['PhoneNumber']; ?>
                                               </td>
                                               
                       
                       
                       
                                           </tr>
                       
                                           <?php 
                       }
                       ?>
                       
                                       </table>
                        
                            </div>

                        </div>
                    </div>
                </div>




            </div>
            
         </div>


        </div>




    <div> 

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