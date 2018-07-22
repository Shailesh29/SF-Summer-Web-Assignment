<?php
	session_start();
	include 'connect.php';
	$name=$_POST['name'];
	$s=$conn->prepare("SELECT ID,book_name,AVAILABLE from book 
		 WHERE book_name LIKE '".$name."%' ");
    $s->execute();
    $s->setFetchMode(PDO::FETCH_ASSOC);
?>
	
	<table>
	<?php while ($row = $s->fetch()): ?>
        <tr>
            <td class='content'><?php echo htmlspecialchars($row['ID']) ?></td>
            <td class='content'><?php echo htmlspecialchars($row['book_name']); ?></td>
            <td class='content'><?php echo htmlspecialchars($row['AVAILABLE']); ?></td>
            <td class='content'><button onclick="add_(this.id)" <?php echo "id='i".htmlspecialchars($row['ID'])."'" ?> >Issue</button></td>
            <td class='content'><button style="display: none;" onclick="rem_(this.id)" <?php echo "id='r".htmlspecialchars($row['ID'])."'" ?> >Return</button></td>
        </tr>
    <?php endwhile; ?>
	</table>