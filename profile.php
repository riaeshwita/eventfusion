<?php
session_start();
if (empty($_SESSION['user'])) {
  header("Location: index.php");
}
include 'db.php';

// Retrieve user name for greeting (unchanged)
$userId = $_SESSION['user'];
$stmt = $conn->prepare("SELECT userName FROM user WHERE userId=?");
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$userName = $row['userName'];

// Fetch events from event_list table
$stmt = $conn->prepare("SELECT * FROM eventlist");  // Modified SQL statement
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
  <?php include 'header.php'; ?>
  <div class="container">
    <h2 style="text-align:center">
      <?php echo "Hello, " . $userName; ?>
    </h2>
    <h3 style="text-align:center">Available Events</h3>  <table class="table table-bordered table-hover table-striped" align=center>
      <thead>
        <tr>
          <?php while ($column = $result->fetch_field()) { ?>
            <th><?php echo $column->name; ?></th>  <?php } ?>
        </tr>
      </thead>
      <tbody>
        <?php
          while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            foreach ($row as $key => $value) {
              echo "<td>" . $value . "</td>";
            }
            echo "</tr>";
          }
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>

