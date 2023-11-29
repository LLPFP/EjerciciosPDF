<?php
$db = mysqli_connect('localhost', 'root', 'root') or 
    die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'poems') or die(mysqli_error($db));

if ($_GET['action'] == 'edit') {
    // recuperar la información del registro
    $query = 'SELECT
            first_name, last_name, email, username, pass_phrase, is_admin, date_registered, profile_pic, registration_confirmed
        FROM
            users
        WHERE
            user_id = ' . $_GET['id'];
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
    extract(mysqli_fetch_assoc($result));

}else {
    //set values to blank
    $movie_name = '';
    $movie_type = 0;
    $movie_year = date('Y');
    $movie_leadactor = 0;
    $movie_director = 0;
}

?>
<html>
 <head>
  <title><?php echo ucfirst($_GET['action']);?> User</title>
 </head>
 <body>
  <form action="commit.php?action=<?php echo $_GET['action']; ?>&type=users"
   method="post">
   <table>
    <tr>
     <td>First Name</td>
     <td><input type="text" name="first_name"
      value="<?php echo $first_name; ?>"/></td>
    </tr><tr>
     <td>Last Name</td>
     <td><input type="text" name="last_name"
      value="<?php echo $last_name; ?>"/></td>
    </tr><tr>
     <td>Email</td>
     <td><input type="text" name="email"
      value="<?php echo $email; ?>"/></td>
    </tr><tr>
     <td>Username</td>
     <td><input type="text" name="username"
      value="<?php echo $username; ?>"/></td>
    </tr><tr>
     <td>Password</td>
     <td><input type="password" name="pass_phrase"
      value="<?php echo $pass_phrase; ?>"/></td>
    </tr><tr>
     <td>Is Admin</td>
     <td><input type="checkbox" name="is_admin"
      value="1" <?php echo $is_admin ?'checked="checked"' : ''; ?> /></td>
    </tr><tr>
     <td>Date Registered</td>
     <td><input type="text" name="date_registered"
      value="<?php echo $date_registered; ?>"/></td>
    </tr><tr>
     <td>Profile Pic</td>
     <td><input type="text" name="profile_pic"
      value="<?php echo $profile_pic; ?>"/></td>
    </tr><tr>
     <td>Registration Confirmed</td>
     <td><input type="checkbox" name="registration_confirmed"
      value="1" <?php echo $registration_confirmed ? 'checked="checked"' : ''; ?> /></td>
    </tr><tr>
     <td colspan="2" style="text-align: center;">
<?php

if ($_GET['action'] == 'edit') {
    echo '<input type="hidden" value="' . $_GET['id'] . '" name="user_id" />';
}
?>
      <input type="submit" name="submit"
       value="<?php echo ucfirst($_GET['action']); ?>" />
     </td>
    </tr>
   </table>
  </form>
 </body>
</html>
