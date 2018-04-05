<?php
       //include connection file
        include 'connection.php';
        if(!isset($_POST["submit"])){
$sql="SELECT * FROM images WHERE ID='{$_GET['id']}'";
            $result=mysqli_query($con, $sql);
            $record=  mysqli_fetch_array($result);
        }else{
 $sql2="SELECT * FROM images WHERE ID='{$_POST['id']}'"; 
           $result2=mysqli_query($con, $sql2);
            $rec=  mysqli_fetch_array($result2);
           
            $title=$_POST['title'];
           if(isset($_POST['image'])){
           $target="./images/".basename($_FILES['image']['name']);
           }else{
           $target=$rec['image'];
           echo $target;
           } 
$sql1="UPDATE images SET title='{$title}', image='{$target}' WHERE id='{$_POST['id']}'";
           mysqli_query($con, $sql1) or die(mysqli_error($con));
           move_uploaded_file($_FILES['image']['tmp_name'],$target);
          header('Location:index.php');
      
        }
 ?>
<h1>Editati inregistrarea:</h1>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
    Titlu:<br/><input type="text" name="title" value="<?php echo $record['title'] ;?>"/><br/>
    Image: <br/><input type="file" name="image" value="<?php echo $record['image'] ;?>"><br/>
    <img src="<?php echo $record['image'] ;?>"><br/>
    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>"/>
    <input type="submit" name="submit" value="Edit"/>
</form>
