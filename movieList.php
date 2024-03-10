<?php

include_once 'db.php';
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <link href="css/style.css" rel="stylesheet">

  <style>
    .card-footer {
      background-color: white;
      position: absolute;
      bottom: 0;
      width: 100%;
    }

    .name {
      font-weight: bold;
      font-size: 20px;
    }

    .row {
      display: -ms-flexbox;
      display: flex;
      -ms-flex-wrap: wrap;
      flex-wrap: wrap;
      padding: 0 4px;
      margin-top: 20px;
    }

    .card {
      margin-bottom: 10px;
    }
  </style>
</head>

<body>
  <div class="container" style="border:1px solid red;">
    <div>
      Events available
      <br>
      <div class="row">
        <?php
        $count = 0;
        $res = $conn->query("select * from eventlist;");
        while ($row = $res->fetch_object()) {
          $_SESSION['movie'] = $row->eventId;

          if ($count == 3) {
            echo '</div><div class="row">';
            $count = 0;
          }

          echo "
            <div class='col-md-4'>
              <div class='card'>
                <img src='uploadimages/{$row->image}' class='card-img-top' alt='image'>
                <div class='card-body'>
                  <h3 class='name'>{$row->Name}</h3>
                  <p>{$row->Short_desc}</p>

                  <div class='card-footer'>
                    <form action='ticketProcessing.php' method='post' >
                      <input type='hidden' name='eventId' value='{$row->eventId}' >
                      <input type='submit'  class='btn btn-primary btn-xs btn-block' type='submit' value='Book tickets' name='submit'>
                    </form>
                  </div>
                </div>
              </div>
            </div>";

          $count++;
        }
        ?>
      </div>
    </div>
  </div>

</body>
</html>

