<?php
	include 'connect.php';
    session_start();
    $id=$_POST['id'];
    $s=$conn->prepare("SELECT AVAILABLE,book_name FROM book WHERE ID='$id'
    ");
    $s->execute();
    $r=$s->fetch();
    $t=(int)$r[0];
    if($t==0)
    {
   	echo"<script type='text/javascript'>alert('Not Available');</script>";
    }
    else{
    	$t=$t-1;
    	$s="UPDATE book
    	SET AVAILABLE='$t' 
    	WHERE ID='$id'";
    	$conn->exec($s);
    	echo"<script type='text/javascript'>alert('Issued');</script>";
    $t=(string)$r[1];
    $sql="INSERT INTO ".$_SESSION['username']."(ID,book_name)
        VALUES ('$id','$t')
        ";
    $conn->exec($sql);
    }
    //header('Location: http://localhost/example/user.php');
?>
    <table>
        <tr><th class="content">ID</th><th class="content">Book_name</th><th class="content">Available</th><th class="content">Issue</th><th class="content">Return</th></tr>
    <?php
    include 'connect.php';
    $s=$conn->prepare("SELECT ID,book_name,AVAILABLE FROM book");
    $s->execute();
    $s->setFetchMode(PDO::FETCH_ASSOC);
    ?>
    <?php while ($row = $s->fetch()): ?>
        <tr>
            <td class='content'><?php echo htmlspecialchars($row['ID']) ?></td>
            <td class='content'><?php echo htmlspecialchars($row['book_name']); ?></td>
            <td class='content'><?php echo htmlspecialchars($row['AVAILABLE']); ?></td>
            <td class='content'><button onclick="add_(this.id)" <?php echo "id='i".htmlspecialchars($row['ID'])."'" ?> >Issue</button></td>
            <td class='content'><button style="display: none;" onclick="rem_(this.id)" <?php echo "id='r".htmlspecialchars($row['ID'])."'" ?> >Return</button></td>
        </tr>
    <?php endwhile; ?>

    <?php
        include 'connect.php';
        $s=$conn->prepare("SELECT ID FROM ".$_SESSION['username']);
        $s->execute();
        $s->setFetchMode(PDO::FETCH_ASSOC);
        while ($row = $s->fetch()){
        echo "<script type='text/javascript'>
        $('#r".$row['ID']."').css({'display':'inline-table'});
        $('#i".$row['ID']."').css({'display':'none'});
        </script>";
    }
    ?>
    </table>