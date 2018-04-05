<?php
       //include connection file
        include 'connection.php';
        $sql='SELECT * FROM images;';
        $query=  mysqli_query($con, $sql)or die(mysqli_error($con));
        ?>
        <table width="30%" cellpadding="4" cellspace="4" rules="rows">
            <tr>
                <th>Nume</th>
                <th>Imagine</th>
                <th colspan="3" align="center">Actions</th>
            </tr>
<?php while($row=mysqli_fetch_array($query)){ ?>
            <tr style="border-bottom: 1px solid black;">
  <td><?php echo $row['title'];?></td>
 <td><img src="<?php echo $row['image'];?>"</td>
 <td>
     <?php echo "<a href=\"view.php?id=".$row['id']."\">View</a> <a href=\"edit.php?id=".$row['id']."\">Edit</a> 
<a href=\"delete.php?id=".$row['id']."\" onclick=\"return confirm('Are you sure?')\">Delete</a>"?>
 </td>
            </tr>
           <?php } ?>
        </table>
<br><br>
<a href="upload.php">Upload another image</a>
    </body>
</html>
