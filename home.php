<?php
  session_start();
  include 'db.php';
  include 'login/errors.php';
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="css/styles.css">
    <meta charset="utf-8">
    <title></title>
   <div id="tophompage">
     <a href="med/add.php"><button class="addbutton">Add</button></a>
     <h4 id="uid"><?php echo $_SESSION['uid']; ?></h4>
    <h4 id="logout"><a href="login/logout.inc.php">Logout</a></h4>
  </div><hr><br><br>
  </head>
  <body>
    <?php
    $error = new errors("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
    $db = new db;
    $query = "SELECT * FROM med WHERE uid=?";
    $stmt = $db->conn()->prepare($query);
    $stmt->execute([$_SESSION['uid']]);
    $result = $stmt->fetchAll();
    $form = '<form action="home.php" method="post" class="form"> <select name="select"> <option value="med">Medicine</option> <option value="dose">Dose</option> <option value="frequency">Frequency</option> </select> <button class="edit" type="submit" name="edit" value="">Edit</button></form>';

    ?>

    <div class="what2do">
      <?php if (count($result) > 0) {
        foreach ($result as $h) { ?>
          <ul>
            <li class="med"><?php echo $h['med'];?></li>
            <li class="med"> <?php echo $h['dosage'] . " " . $h['weight']; ?></li>
            <li class="med"><?php echo $h['frequency'] . "/" . $h['day'];?></li>
          </ul><br>
          <?php
          $id = $h['id'];
          $_SESSION['id'] = $id;
          echo $form;
           if (isset($_POST['edit'])) {
             switch ($_POST['select']) {
              case 'med':
                echo '<br><form action="med/add.inc.php" method="post"> <label>Change medicine:</label><br> <input type="text" name="med" placeholder="Medicine..."> <button type="submit" name="editmed">Submit</button></form>';
                break;

                case 'dose':
                  echo '<br><form action="med/add.inc.php" method="post"> <label>Change dose:</label><br> <input type="text" name="dose" placeholder="Dose..."> <select name="dosageselect">
                    <option value="mg">mg</option>
                    <option value="g">g</option>
                    <option value="kg">kg</option>
                    <option value="ml">ml</option>
                    <option value="floz">fl oz</option>
                    <option value="c">c</option>
                    <option value="pt">pt</option>
                  </select>  <button type="submit" name="editdose">Submit</button></form>';
                  break;

                  case 'frequency':
                    echo '<br><form action="med/add.inc.php" method="post"> <label>Change frequency:</label><br> <input type="text" name="fre" placeholder="Frequency..."> <select name="per">
                      <option value="day">Day</option>
                      <option value="week">Week</option>
                    </select><br> <button type="submit" name="editfre">Submit</button></form>';
                    break;


              default:
                // code...
                break;
            }
            // echo $edit;


          }
          echo "<br>";
          echo "<form action='med/add.inc.php' method='post'><button type='submit' name='delete'>Delete</button></form>";


          ?>

        <?php } ?>
      <?php } ?>
      <?php


       ?>


    </div>
  </body>
</html>
