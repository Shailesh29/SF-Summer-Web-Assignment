<?php
	include 'connect.php';
    $book_name=$_POST['name'];
    $available=1;
    $sql="INSERT INTO book(book_name,AVAILABLE)
    VALUES('$book_name','$available')
    ";
    $conn->exec($sql);
?>
    
    <table>
        <tr><th class="content">ID</th><th class="content">Book_name</th><th class="content">Available</th><th class="content">Remove</th></tr>
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
            <td class='content'><button onclick="rem_(this.id)" class='rem' name='remove' <?php echo "id='".htmlspecialchars($row['ID'])."'" ?> ">Remove</button></td>
        </tr>
    <?php endwhile; ?>
</table>