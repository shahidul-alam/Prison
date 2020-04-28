<?php include 'conn.php'; ?>
<?php

include 'conn.php';

if(isset($_POST['done'])){
 $pid = $_POST['pid'];
 $cn = $_POST['cn'];
 $crid = $_POST['crid'];


 $queryy = "INSERT INTO `crime`(`Prisoner_ID`, `Crime_Name`,`Crime_ID`) VALUES ('$pid',' $cn','$crid')";

  $queryy2 = mysqli_query($conn,$queryy);


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
                <h1 class="text-primary text-center"> Crime Details </h1>
                <br>
                <button type="button" class="btn btn-primary mb-7 btn-block" data-toggle="modal" data-target="#exampleModal1"
                    data-whatever="@mdo">Add Crime</button>
                    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                         <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Insert Prisoner ID and Crime Name</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="post">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Prisoner ID</label>
                                            <input name="pid" type="number" class="form-control">
                                        </div>
                                        
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Crime Name</label>
                                            <input name="cn" type="text" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Crime ID</label>
                                            <input name="crid" type="number" class="form-control">
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
                

                    <h3 class="text-primary text-centre"> Crime List </h3>

                 <!-- thief-->

                    <button type="button" class="btn btn-secondary mb-3 btn-block" data-toggle="modal" data-target="#exampleModal2"
                    data-whatever="@mdo">1. Thief</button>
                    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModal2" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">List of Thief</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                    <table id="tabledata" class=" table table-striped table-hover table-bordered">

                                            <tr class="bg-dark text-white text-center">

                                                <th> Prisoner ID </th>
                                                <th> Prisoner Name </th>
                                                <th> Crime Name </th>
                                                
                        
                        
                        
                                            </tr>
                        
                        
                                            <?php
                       
                        
                        $qq = "SELECT * FROM `prisoner` p INNER JOIN crime c on p.pid=c.Prisoner_ID where EXISTS (select * from crime having Crime_ID=1)";
                        
                        $show5 = mysqli_query($conn,$qq);
                        
                        while($res = mysqli_fetch_array($show5)){
                        ?>
                                            <tr class="text-center">
                                                
                                                <td>
                                                    <?php echo $res['pid'];  ?>
                                                </td>
                                                <td>
                                                    <?php echo $res['name'];  ?>
                                                </td>
                                                <td>
                                                    <?php echo $res['Crime_Name']; ?>
                                                </td>
                                                
                        
                        
                        
                                            </tr>
                        
                                            <?php 
                        }
                        ?>
                        <thead>
                        <table>
                        
                                        <?php
                       
                        
                       $sql = "SELECT count(*) as Total FROM `prisoner` p INNER JOIN crime c on p.pid=c.Prisoner_ID where Crime_ID=1";
                        
                       $result = $conn->query($sql);
                        
                       while($row = $result->fetch_assoc()) {
                        
                                           
                                                
                                               
                                                     echo "Total = ".$row['Total'];?>
                                               
                                           
                        
                                            <?php 
                        }
                        ?>


                                    </thead>
                                    </table>
                       
                                         
                                        
                        
                            </div>

                        </div>
                    </div>
                </div>

                <!-- robbery-->
                <button type="button" class="btn btn-success mb-2 btn-block" data-toggle="modal" data-target="#exampleModal3"
                    data-whatever="@mdo">2. Robber</button>
                    <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModal3" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">List of Robber</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                    <table id="tabledata" class=" table table-striped table-hover table-bordered">

                                            <tr class="bg-dark text-white text-center">

                                                <th> Prisoner ID </th>
                                                <th> Prisoner Name </th>
                                                <th> Crime Name </th>
                                                
                        
                        
                        
                                            </tr>
                        
                        
                                            <?php
                       
                        
                        $qq = "SELECT * FROM `prisoner` p INNER JOIN crime c on p.pid=c.Prisoner_ID where EXISTS (select * from crime having Crime_ID=2)";
                        
                        $show5 = mysqli_query($conn,$qq);
                        
                        while($res = mysqli_fetch_array($show5)){
                        ?>
                                            <tr class="text-center">
                                                
                                                <td>
                                                    <?php echo $res['pid'];  ?>
                                                </td>
                                                <td>
                                                    <?php echo $res['name'];  ?>
                                                </td>
                                                <td>
                                                    <?php echo $res['Crime_Name']; ?>
                                                </td>
                                                
                        
                        
                        
                                            </tr>
                        
                                            <?php 
                        }
                        ?>
                        <thead>
                        <table>
                        
                                        <?php
                       
                        
                       $sql = "SELECT count(*) as Total FROM `prisoner` p INNER JOIN crime c on p.pid=c.Prisoner_ID where Crime_ID=2";
                        
                       $result = $conn->query($sql);
                        
                       while($row = $result->fetch_assoc()) {
                        
                                           
                                                
                                               
                                                     echo "Total = ".$row['Total'];?>
                                               
                                           
                        
                                            <?php 
                        }
                        ?>


                                    </thead>
                                    </table>
                       
                                         
                                        
                        
                            </div>

                        </div>
                    </div>
                </div>

                    <!-- Murder-->
                    <button type="button" class="btn btn-warning mb-2 btn-block" data-toggle="modal" data-target="#exampleModal4"
                    data-whatever="@mdo">3. Murder</button>
                    <div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModal4" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">List of Murdere</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                    <table id="tabledata" class=" table table-striped table-hover table-bordered">

                                            <tr class="bg-dark text-white text-center">

                                                <th> Prisoner ID </th>
                                                <th> Prisoner Name </th>
                                                <th> Crime Name </th>
                                                
                        
                        
                        
                                            </tr>
                        
                        
                                            <?php
                       
                        
                        $qq = "SELECT * FROM `prisoner` p INNER JOIN crime c on p.pid=c.Prisoner_ID where EXISTS (select * from crime having Crime_ID=3)";
                        
                        $show5 = mysqli_query($conn,$qq);
                        
                        while($res = mysqli_fetch_array($show5)){
                        ?>
                                            <tr class="text-center">
                                                
                                                <td>
                                                    <?php echo $res['pid'];  ?>
                                                </td>
                                                <td>
                                                    <?php echo $res['name'];  ?>
                                                </td>
                                                <td>
                                                    <?php echo $res['Crime_Name']; ?>
                                                </td>
                                                
                        
                        
                        
                                            </tr>
                        
                                            <?php 
                        }
                        ?>
                        <thead>
                        <table>
                        
                                        <?php
                       
                        
                       $sql = "SELECT count(*) as Total FROM `prisoner` p INNER JOIN crime c on p.pid=c.Prisoner_ID where Crime_ID=3";
                        
                       $result = $conn->query($sql);
                        
                       while($row = $result->fetch_assoc()) {
                        
                                           
                                                
                                               
                                                     echo "Total = ".$row['Total'];?>
                                               
                                           
                        
                                            <?php 
                        }
                        ?>


                                    </thead>
                                    </table>
                       
                                         
                                        
                        
                            </div>

                        </div>
                    </div>
                </div>

                    <!-- rape-->
                    <button type="button" class="btn btn-danger mb-2 btn-block" data-toggle="modal" data-target="#exampleModal5"
                    data-whatever="@mdo">4. Rape</button>
                    <div class="modal fade" id="exampleModal5" tabindex="-1" role="dialog" aria-labelledby="exampleModal5" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">List of Rapist</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                    <table id="tabledata" class=" table table-striped table-hover table-bordered">

                                            <tr class="bg-dark text-white text-center">

                                                <th> Prisoner ID </th>
                                                <th> Prisoner Name </th>
                                                <th> Crime Name </th>
                                                
                        
                        
                        
                                            </tr>
                        
                        
                                            <?php
                       
                        
                        $qq = "SELECT * FROM `prisoner` p INNER JOIN crime c on p.pid=c.Prisoner_ID where EXISTS (select * from crime having Crime_ID=4)";
                        
                        $show5 = mysqli_query($conn,$qq);
                        
                        while($res = mysqli_fetch_array($show5)){
                        ?>
                                            <tr class="text-center">
                                                
                                                <td>
                                                    <?php echo $res['pid'];  ?>
                                                </td>
                                                <td>
                                                    <?php echo $res['name'];  ?>
                                                </td>
                                                <td>
                                                    <?php echo $res['Crime_Name']; ?>
                                                </td>
                                                
                        
                        
                        
                                            </tr>
                        
                                            <?php 
                        }
                        ?>
                        <thead>
                        <table>
                        
                                        <?php
                       
                        
                       $sql = "SELECT count(*) as Total FROM `prisoner` p INNER JOIN crime c on p.pid=c.Prisoner_ID where Crime_ID=4";
                        
                       $result = $conn->query($sql);
                        
                       while($row = $result->fetch_assoc()) {
                        
                                           
                                                
                                               
                                                     echo "Total = ".$row['Total'];?>
                                               
                                           
                        
                                            <?php 
                        }
                        ?>


                                    </thead>
                                    </table>
                       
                                         
                                        
                        
                            </div>

                        </div>
                    </div>
                </div>
                


           




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