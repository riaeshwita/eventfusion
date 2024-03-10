<?php 
session_start();
if (empty($_SESSION['user'])) {
  header("Location: index.php");
}
include 'db.php';

$userId=$_SESSION['user'];
$stmt = $conn->prepare("SELECT userName FROM user WHERE userId=?");
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$userName = $row['userName'];

$stmt = $conn->prepare("SELECT event_name, no_of_tickets, UniqueId FROM booked_tickets WHERE userId=?");
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Profile</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <link href="css/style.css" rel="stylesheet">

</head>
<body>
  <?php 
    include 'header.php';
  ?>
	<div class="container">
		<h2 style="text-align:center">
      
      <?php 
      echo "Hello,".$userName;
      ?>

    </h2>
    <h3 style="text-align:center">Events booked/Orders</h3>
      <table class="table table-bordered table-hover table-striped" align=center>
        <thead>
          <tr>
            <th>Event</th>
            <th>No. of Tickets</th>
            <th>Unique order ID</th>
          </tr>
        </thead>
        <tbody> 
          <?php
              while ($row = $result->fetch_assoc()) {
              echo "
              <tr>
                <td>".$row['event_name']."</td>
                <td>".$row['no_of_tickets']."</td>
                <td>".$row['UniqueId']."</td>
              </tr>
              ";
              }
          ?>
        </tbody>
      </table>
  </div>
</body>
</html>

