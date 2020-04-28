<?php include 'conn.php'; ?>
<?php

include 'conn.php';

if(isset($_POST['done'])){
 $cid = $_POST['CourtID'];
 $prid = $_POST['pid'];


 $queryy = "INSERT INTO `sents`(`Court_Number`, `Prisoner_ID`) VALUES ('$cid',' $prid')";

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
                <h1 class="text-primary text-center"> Prisoners' who are sent to court </h1>
                <br>
                <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#exampleModal"
                    data-whatever="@mdo">Add Prisoners to Court</button>

                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Insert Court Number and Prisoners ID</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="post">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Court ID</label>
                                            <input name="CourtID" type="number" class="form-control">
                                        </div>
                                        
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Prisoner ID</label>
                                            <input name="pid" type="number" class="form-control">
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
                <table id="tabledata" class=" table table-striped table-hover table-bordered">

                    <tr class="bg-dark text-white text-center">
                        <th> Court ID </th>
                        <th> Prisoner ID </th>
                        <th> Prisoner Name </th>
                        
                        <th> Court Name </th>
                       



                    </tr>


                    <?php


#$q = "SELECT * FROM `visitor` INNER JOIN `prisoner` ON `visitor`.`Prisoner_ID` = `prisoner`.`pid`";
$q5 = "SELECT * 
FROM `prisoner` `p`
    INNER JOIN `sents` `s` ON `p`.`pid` = `s`.`Prisoner_ID`
    INNER JOIN `court` `c` ON `s`.`Court_Number`  = `c`.`CourtID`";

$showw = mysqli_query($conn,$q5);

while($res = mysqli_fetch_array($showw)){
?>
                    <tr class="text-center">
                       
                        <td>
                            <?php echo $res['Court_Number'];  ?>
                        </td>
                        <td>
                            <?php echo $res['Prisoner_ID'];  ?>
                        </td>
                        <td>
                            <?php echo $res['name']; ?>
                        </td>
                        <td>
                            <?php echo $res['CourtName'];  ?>
                        </td>



                    </tr>

                    <?php 
}
?>

                </table>
                <table>
                        
                        <?php
       
        
       $sql = "SELECT count(*) as Total
       FROM `prisoner` `p`
           INNER JOIN `sents` `s` ON `p`.`pid` = `s`.`Prisoner_ID`
           INNER JOIN `court` `c` ON `s`.`Court_Number`  = `c`.`CourtID`";
        
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