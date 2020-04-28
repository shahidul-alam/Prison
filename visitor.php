<?php include 'conn.php'; ?>

<?php

include 'conn.php';

if(isset($_POST['done'])){
 $pid = $_POST['pid'];
 $visitor = $_POST['visitor'];
 $relation = $_POST['relation'];
 $md = $_POST['md'];
 $mdu = $_POST['mdu'];


 $query1 = "INSERT INTO `visitor`(`Prisoner_ID`, `Name`, `Relation`, `MeetingDate`, `MeetingDuration`) VALUES ('$pid',' $visitor','$relation', '$md', '$mdu')";

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
                <h1 class="text-primary text-center"> Visitors' Information </h1>
                <br>

                <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#exampleModal"
                    data-whatever="@mdo">Add Visitor</button>

                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Insert Visitor Information</h5>
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
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4"></label>Visitor Name</label>
                                            <input name="visitor" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="inputPassword4">Relation</label>
                                            <input name="relation" type="text" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Meeting Date</label>
                                            <input name="md" type="date" class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Meeting Duration</label>
                                            <input name="mdu" type="number" class="form-control">
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

                        <th> Prisoner ID </th>
                        <th> Visitor Name </th>
                        <th> Relation </th>
                        <th> Meeting Date </th>
                        <th> Meeting Duration </th>



                    </tr>


                    <?php


$q = "SELECT * FROM `visitor` INNER JOIN `prisoner` ON `visitor`.`Prisoner_ID` = `prisoner`.`pid`";

$show = mysqli_query($conn,$q);

while($res = mysqli_fetch_array($show)){
?>
                    <tr class="text-center">
                        <td>
                            <div class="btn btn-success"><?php echo $res['Prisoner_ID'];  ?></div>

                            <button class="btn btn-warning"> <a href="vinfo.php?pid=<?php echo $res['pid']; ?>" class="text-white">
                                    Last 6 months visitor info </a> </button> 
                        </td>
                        <td>
                            <?php echo $res['Name'];  ?>
                        </td>
                        <td>
                            <?php echo $res['Relation'];  ?>
                        </td>
                        <td>
                            <?php echo $res['MeetingDate']; ?>
                        </td>
                        <td>
                            <?php echo $res['MeetingDuration'];  ?> Minute(s)
                        </td>



                    </tr>

                    <?php 
}
?>

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