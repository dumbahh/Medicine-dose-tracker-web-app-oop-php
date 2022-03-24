<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form action="add.inc.php" method="post">
      <input type="text" name="med" placeholder="Medicine..."><br>
      <input type="text" name="dosage" placeholder="Dosage...">
      <select name="dosageselect">
        <option value="mg">mg</option>
        <option value="g">g</option>
        <option value="kg">kg</option>
        <option value="ml">ml</option>
        <option value="floz">fl oz</option>
        <option value="c">c</option>
        <option value="pt">pt</option>
      </select><br>
      <input type="text" name="frequency" placeholder="Frequency...">
      <label for="per">Per/</label>
      <select name="per">
        <option value="day">Day</option>
        <option value="week">Week</option>
      </select><br>
      <button type="submit" name="submit-med">Submit</button>
    </form>
  </body>
</html>
