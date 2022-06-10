<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>CV  Gharagyozan</title>
	<meta name="description" content="CV">
	<link rel="stylesheet" href="css/admin.css">
</head>
<body>
<div class="logOut">
    <a href="/mycv/logout.php">Logout</a>
</div>

<?php
require_once 'config/access.php';

$conn = new mysqli('localhost', 'root', '', 'lesson');
if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}


if (isset($_POST['admin']))
{
    $name = $_POST['name'];
    $prof = $_POST['prof'];
    $insert_user = "INSERT INTO user (name, prof) VALUES ('$name', '$prof')";
    $conn->query($insert_user);
};

if (isset($_POST['aboutyou']))
{
    $about = $_POST['about'];
    $insert_about = "INSERT INTO aboutyou (about) VALUES ('$about')";
    $conn->query($insert_about);
};

// if (isset($_POST['update'])) {
//     $s_name = $_POST["s_name"];
//     $p_percent = $_POST['p_percent'];
//     $id = $_POST['current'];
//     var_dump($id)

    // $sql = "UPDATE skills SET name = '$s_name', percent = $p_percent WHERE id = $id";

    // $x = $conn->query($sql);
// };

if (isset($_POST['submit']))
{
    $s_name = $_POST["s_name"];
    $p_percent = $_POST["p_percent"];
    $insert_skills = "INSERT INTO skills (name, percent) VALUES ('$s_name', '$p_percent')";
    $conn->query($insert_skills);

};

if (isset($_POST['send']))
{
    $language = $_POST['language'];
    $center = $_POST['center'];
    $insert_edu = "INSERT INTO edu (language, center) VALUES ('$language',  '$center')";
    $conn->query($insert_edu);
};

if (isset($_POST['send_exp']))
{
    $profession = $_POST['profession'];
    $company = $_POST['company'];
    $insert_exp = "INSERT INTO exp (profession, company) VALUES ('$profession',  '$company')";
    $conn->query($insert_exp);
};

if (isset($_POST['contact']))
{
    $data = $_POST['data'];
    $class = $_POST['class'];
    $insert_contact = "INSERT INTO contact (data, class) VALUES ('$class', '$class')";
    $conn->query($insert_contact);
}

if (isset($_POST['socialinfo']))
{
    $icon = $_POST['icon'];
    $href = $_POST['href'];
    $insert_socialinfo = "INSERT INTO socialinfo (icon, href) VALUES ('$icon', '$href')";
    $conn->query($insert_socialinfo);
}

if (isset($_POST['image']))
{
    $image = $_POST['image'];
    $insert_image = "INSERT INTO photo (image) VALUES ('$image')";
    $conn->query($insert_image);
}

if (isset($_POST['skillsDelete']))
{
    $data = $_POST['skillsDelete'];
    var_dump($data);
    if ($conn->query("DELETE FROM skills WHERE id = $data"))
    {
        echo "Deleted";
    };
}
if (isset($_POST['aboutTextDelete']))
{
    $data = $_POST['aboutTextDelete'];
    var_dump($data);
    if ($conn->query("DELETE FROM aboutyou WHERE id = $data"))
    {
        echo "Deleted";
    };
}

if (isset($_POST['userDelete']))
{
    $data = $_POST['userDelete'];
    var_dump($data);
    if ($conn->query("DELETE FROM user WHERE id = $data"))
    {
        echo "Deleted";
    };
}

if (isset($_POST['eduDelete']))
{
    $data = $_POST['eduDelete'];
    var_dump($data);
    if ($conn->query("DELETE FROM edu WHERE id = $data"))
    {
        echo "Deleted";
    };
}

if (isset($_POST['expDelete']))
{
    $data = $_POST['expDelete'];
    var_dump($data);
    if ($conn->query("DELETE FROM exp WHERE id = $data"))
    {
        echo "Deleted";
    };
}

if (isset($_POST['contactDelete']))
{
    $data = $_POST['contactDelete'];
    var_dump($data);
    if ($conn->query("DELETE FROM contact WHERE id = $data"))
    {
        echo "Deleted";
    };
}

if (isset($_POST['sacialDelete']))
{
    $data = $_POST['sacialDelete'];
    var_dump($data);
    if ($conn->query("DELETE FROM socialinfo WHERE id = $data"))
    {
        echo "Deleted";
    };
}



$result_skills = mysqli_query($conn, "SELECT * FROM skills");
$result_edu = mysqli_query($conn, "SELECT * FROM edu");
$result_exp = mysqli_query($conn, "SELECT * FROM exp");
$result_contact = mysqli_query($conn, "SELECT * FROM contact");
$result_about = mysqli_query($conn, "SELECT * FROM aboutyou");
$result_socialinfo = mysqli_query($conn, "SELECT * FROM socialinfo");
$result_user = mysqli_query($conn, "SELECT * FROM user");
$insert_image = mysqli_query($conn, "SELECT * FROM photo");

?>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            




<div class="cvContent">
  <div class="row">
    
    <div>User</div>
    <?php if (mysqli_num_rows($result_user) === 0){ ?>
<form  action="" method="post" >
    <div class="w-70">
        <input type="text" name="name" placeholder="user name">
        <input type="text" name="prof" placeholder="prof">
    </div>
    <input type="submit" value="submit" name="admin">
</form>
<?php } ?>
<?php if (mysqli_num_rows($result_user) > 0)
{
    $i = 0;
    while ($user = mysqli_fetch_array($result_user))
    {
?>
      <form class="user" method="post">
        <span><?php echo $user['id'] ?></span>
        <span><?php echo $user['name'] ?></span>
        <span><?php echo $user['prof'] ?></span>
        <input type="hidden" name="userDelete" value="<?=$user['id'] ?>" />
        <input type="submit" name="userDeleteSubmit" value="Delete" />
      </form>

<?php
        $i++;
    }
}
else
{
    echo "No result found";
}
?>



</div>
  <div class="row">
<div>About</div>
<?php if (mysqli_num_rows($result_about) === 0){ ?>
  <form action="" method="post" >

<div class="w-70">
        <textarea  type="text" name="about" placeholder = "Tel about you"></textarea>
  </div>
    <input type="submit" value="submit" name="aboutyou">
</form>
<?php }?>
<br>
<?php
if (mysqli_num_rows($result_about) > 0)
{
    $i = 0;
    while ($about = mysqli_fetch_array($result_about))
    {
?>
        <form method="post">
          <span><?php echo $about['id'] ?></span>
          <span><?php echo $about['about'] ?></span>
          <input type="hidden" name="aboutTextDelete" value="<?=$about['id'] ?>" />
          <input type="submit" name="aboutTextDelete11" value="Delete" />
      </form>
  <?php
        $i++;
    }
}
else
{
    echo "No result found";
}
?>


</div>
<div class="row">
  <div>Skills</div>
 <form  action="" method="post" >
    <div class="w-70">
        <input type="text" name="s_name" placeholder="skills name">
        <input type="text" name="p_percent" placeholder="skills percent">
    </div>
    <input type="submit" value="submit" name="submit">
</form>
<?php
if (mysqli_num_rows($result_skills) > 0)
{
    $i = 0;
    while ($skill = mysqli_fetch_array($result_skills))
    {
?>

      <form class="skills" method="post">
        <span><?php echo $skill['id'] ?></span>
        <span><?php echo $skill['name'] ?></span>
        <span><?php echo $skill['percent'] ?></span>
        <input type="hidden" name="skillsDelete" value="<?=$skill['id'] ?>" />
        <input type="submit" name="skillsDeleteSubmit" value="Delete" />
      </form>
      <!-- <div class="update_form_wrap">
        <form action='' method='post' class='update_form'>
          <input type='hidden' name='current' value='<?=$row['id'] ?>'>
          <label>
            <input type="text" name="percent" value="<?=$row["percent"] ?>">
          </label>
          <label>
            <input type="text" name="skill" value="<?=$row["skill"] ?>">
          </label>
            <input type='submit' name='update' class='update' value='Update'>
        </form>
        <button class="edit_skill">Edit</button>
    </div> -->

<?php
        $i++;
    }
}
else
{
    echo "No result found";
}
?>

</div>

<div class="row">
  <div>Education</div>
<form action="" method="post">
<div class="w-70">
        <input type="text" name="language" placeholder = "language">
        <input type="text" name="center" placeholder="center">
    </div>
    <input type="submit" value="send" name="send">
</form>
<?php
if (mysqli_num_rows($result_edu) > 0)
{
    $i = 0;
    while ($edu = mysqli_fetch_array($result_edu))
    {
?>
        <form method="post">
          <span><?php echo $edu['id'] ?></span>
          <span><?php echo $edu['language'] ?></span>
          <span><?php echo $edu['center'] ?></span>
          <input type="hidden" name="eduDelete" value='<?=$edu['id'] ?>' />
          <input type="submit" name="eduDelete1" value="Delete" />
      </form>
  <?php
        $i++;
    }
}
else
{
    echo "No result found";
}

?>
</div>
<div  class="row">
  <div>Experiences</div>
<form action="" method="post">
<div class="w-70">
        <input type="text" name="profession" placeholder = "profession">
        <input type="text" name="company" placeholder="company">
    </div>
    <input type="submit" value="submit" name="send_exp">
</form>
<?php
if (mysqli_num_rows($result_exp) > 0)
{
    $i = 0;
    while ($exp = mysqli_fetch_array($result_exp))
    {
?>
          <form method="post">
            <span><?php echo $exp['id'] ?></span>
            <span><?php echo $exp['profession'] ?></span>
            <span><?php echo $exp['company'] ?></span>
            <input type="hidden" name="expDelete" value='<?=$exp['id'] ?>'/>
            <input type="submit" name="expDelete1" value="delete" />
        </form>
    <?php
        $i++;
    }
}
else
{
    echo "No result found";
}
?>
</div>
<div class="row">
  <div>Contact</div>
<form action="" method="post" >
<div class="w-70">
        <input type="text" name="data" placeholder = "data">
        <input type="text" name="class" placeholder = "icon">
    </div>
    <input type="submit" value="submit" name="contact">
</form>
<?php
if (mysqli_num_rows($result_contact) > 0)
{
    $i = 0;
    while ($cont = mysqli_fetch_array($result_contact))
    {
?>
              <form method="post">
                <span><?php echo $cont['id'] ?></span>
                <span><?php echo $cont['data'] ?></span>
                <span><?php echo $cont['class'] ?></span>
                <input type="hidden" name="contactDelete" value='<?=$cont['id'] ?>' />
                <input type="submit" name="contactDelete1" value="Delete" />
            </form>
        <?php
        $i++;
    }
}
else
{
    echo "No result found";
}
?>


</div>
<div class='row' >
<form action="" method="post" >
<div class="w-70">
        <div>Social data</div>
        <input type="text" name="icon" placeholder = "icon">
        <input type="text" name="href" placeholder = "href">
    </div>
    <input type="submit" value="submit" name="socialinfo">
</form>

<?php 
if (mysqli_num_rows($result_socialinfo) > 0)
{
    $i = 0;
    while ($social = mysqli_fetch_array($result_socialinfo))
    {
?>
        <form method="post">
          <span><?php echo $social['id'] ?></span>
          <span><?php echo $social['icon'] ?></span>
          <span><?php echo $social['href'] ?></span>
          <input type="hidden" name="sacialDelete" value='<?=$social['id'] ?>' />
          <input type="submit" name="sacialDelete1" value="Delete" />
      </form>
  <?php
        $i++;
    }
}
else
{
    echo "No result found";
} ?>
    

</div>
<form action="" method="post" class="row">
<div class="w-70">Photo
<input type="file" name="image" id="image">
    </div>
    <input type="submit" value="submit" name="image">
</form>
</div>

    <!-- <div class="row">UPLOAD YOUR IMAGE
<?php
if (mysqli_num_rows($result_image) > 0)
{
    $i = 0;
    while ($image = mysqli_fetch_array($result_image))
    {
?>
        <form method='post'>
          <span><?php echo $image['id'] ?></span>
          <span><?php echo $image['image'] ?></span>
          <input type="submit" name="image" value="delete" />
      </form>
  <?php
        $i++;
    }
}
else
{
    echo "No result found";
}
$conn->close();
?> -->

</div>
  </body>
</html>
