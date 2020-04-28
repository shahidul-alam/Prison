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
                <h3 class="text-primary text-center"> Search Result for : <?php $d = $_GET['searchFor'];echo $d?> </h3>
                <br>
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



$search = $_GET['searchFor'];



$q = "select * from prisoner where name like '%$search%'";

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