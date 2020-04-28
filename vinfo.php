<?php include 'conn.php'; ?>

<!DOCTYPE html>
<html>

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
 
 
 
 
 
 
 <div class="container" id="pinfo" tabindex="-1" role="dialog" aria-labelledby="pinfo" aria-hidden="true">
                    <div class="row" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Last 6 Month's Details</h5>
                                
                            </div>
                            <div class="modal-body">
                                    <table id="tabledata" class=" table table-striped table-hover table-bordered">

                                            <tr class="bg-dark text-white text-center">
                                                <th> Prisoner Name </th>
                                                <th> Visitor Name </th>
                                                <th> Relation </th>
                                                <th> Meeting Date </th>
                                                <th> Meeting Duration </th>
                        
                        
                        
                                            </tr>
                        
                        
                                            <?php
                                            
                                            
                        $pp=$_GET['pid'];
                       
                        $qq = "SELECT * FROM `visitor` INNER JOIN `prisoner` ON `visitor`.`Prisoner_ID` = `prisoner`.`pid` where Prisoner_ID='$pp' and MeetingDate>=CURDATE() - INTERVAL 6 MONTH";
                        
                        $show1 = mysqli_query($conn,$qq);
                        
                        while($res = mysqli_fetch_array($show1)){
                        ?>
                                            <tr class="text-center">
                                                
                                            <td>
                                                    <?php echo $res['name'];  ?>
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