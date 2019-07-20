<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Form DumbWays</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<?php require_once 'process.php'; ?>
<?php 
  $mysqli = new mysqli('localhost', 'root', '', 'dumbways') or die(mysqli_error($mysqli));
  $result = $mysqli->query("SELECT * FROM biodata") or die($mysqli->error());
  $cities = $mysqli->query("SELECT * FROM cities") or die($mysqli->error());
  ?>

<?php 
    if(isset($_SESSION['message'])):?>
  <div> <h2 class="<?php=$_SESSION['msg_type']?>">
  <?php echo $_SESSION['message']; unset($_SESSION['message']); ?>
  </h2></div>
  <?php endif ?>

<form class="form-dumways" action="process.php" method="POST">
  <div>
    <label for="nama">Nama Lengkap</label>
    <input type="text" name="nama" id='nama' value="<?php echo $name;?>">
  </div>
  <div>
    <label for="tempat-lahir">Tempat Lahir</label>
    <select name="tempat-lahir" id="tempat-lahir">
    <?php 
        while($rowCity = $cities->fetch_assoc()): ?>
          <option value="<?php echo $rowCity['id']; ?>"><?php echo $rowCity['name'];?></option>
      <?php endwhile;?>
    </select>
  </div>
  <div>
    <label for="birthdate">Tanggal Lahir</label>
    <input type="date" name="birthdate" id='birthdate'>
  </div>
  <div>
    <label for="telepon">No. HP</label>
    <input type="number" name="telepon" id='telepon'>
  </div>
  <div>
    <label for="alamat">Alamat</label>
    <textarea type="text" name="alamat" id='alamat' cols="30" rows="5" value=" value="<?php echo $alamat;?>></textarea>
  </div>
  <div>
    <label for="pendidikan">Pendidikan Terakhir</label>
    <select name="pendidikan" id="pendidikan">
      <option value=""></option>
      <option value="S1">S2</option>
      <option value="S1">S1</option>
      <option value="SMA">SMA</option>
      <option value="SMP">SMP</option>
      <option value="SD">SD</option>
    </select>
  </div>

  <div>
    <label for="agama">Agama</label><br>
    <input type="radio" name="agama" id='agama' value="islam">Islam <br>
    <input type="radio" name="agama" id='agama' value="kristen">Kristen <br>
    <input type="radio" name="agama" id='agama' value="katolik">Katolik
  </div>

  <div>
    <label for="hobi">Hobi</label><br>
    <input type="checkbox" name="hobi" id='hobi' value="renang">Renang <br>
    <input type="checkbox" name="hobi" id='hobi' value="mancing">Mancing <br>
    <input type="checkbox" name="hobi" id='hobi' value="game">Game <br>
    <input type="checkbox" name="hobi" id='hobi' value="gibah">Gibah <br>
    <input type="checkbox" name="hobi" id='hobi' value="programming">Programming
  </div>
  <div>
    <input type="submit" name='submit' value="Submit" class="submit-button">
    <input type="reset" value="Edit Label" class="reset-button" >
  </div>
</form>
  
  <div class='row'>
    <table class='table'>
      <thead>
        <tr>
          <th>No.</th>
          <th>Nama Lengkap</th>
          <th>Tempat Lahir</th>
          <th>Tanggal Lahir</th>
          <th>No. HP</th>
          <th>Alamat</th>
          <th>Pendidikan Terakhir</th>
          <th>Agama</th>
          <th>Hobby</th>
          <th colspan='2'>Action</th>
        </tr>
      </thead>
      <?php 
        while($row = $result->fetch_assoc()): ?>

        <tr>
          <td><?php echo $row['id'];?></td>
          <td><?php echo $row['full_name'];?></td>
          <td><?php echo $row['place_of_birth_id'];?></td>
          <td><?php echo $row['date_of_birth'];?></td>
          <td><?php echo $row['phone_number'];?></td>
          <td><?php echo $row['address'];?></td>
          <td><?php echo $row['last_education'];?></td>
          <td><?php echo $row['religion'];?></td>
          <td><?php echo $row['hobby']; ?></td>
          <td>
            <a href="index.php?edit=<?php echo $row['id'];?>">Edit</a>
            <a href="process.php?delete=<?php echo $row['id'];?>">Delete</a>
          </td>
          </tr>
      <?php endwhile;?>
    </table>
  </div>

  
</body>
</html>