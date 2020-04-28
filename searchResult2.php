<?php include 'conn.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
</head>
<body>

 <div class="container">
        <div class="row">
            <div class="col-sm-6 offset-3">
                <h1 class="display-4">Prison Control System</h1>
            </div> 
            <br>
                <h3 class="text-primary text-center"> Search Result for : <?php $d = $_GET['searchFor2'];echo $d?> </h3>
                <br>
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

$dd = $_GET['searchFor2'];
$q3 = "select * from prisonpolice where Name like'%$dd%' ";

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