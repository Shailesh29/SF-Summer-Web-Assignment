<!DOCTYPE html>
<html>
<?php
	session_start();
?>
<head>
	<title>Library Portal</title>

	<style type="text/css">
		body{
			margin:0px;
			background-color: #5aa4a3;
		}
		#heading{
			margin-top: 0px;
			text-align: center;
			width: 100%;
			padding: 10px;
			background-color:#f9dac7;
			color:#74bafc; 
			font-size: 40px;
		}
		#main{
			border: 2px solid black;
			margin-left:200px;
			margin-right: 400px; 
			margin-bottom: 50px;
			position:relative;
			text-align: center;
			border-radius: 20px;
		}
		#but{
			position: absolute;
			top: 110px;
			left: 1100px;
			text-align: center;
			font-size: 25px;
			border-radius: 10px;
		}
		#name{
			position: relative;
			text-align: center;
			left: 400px;
			font-size: 20px;
		}
		#add{
			position: relative;
			text-align: center;
			left: 500px;
			font-size: 20px;
			border-radius: 10px;
		}
		#tab{
			position: relative;
			top: 20px;
			right: 320px;
			left: 320px;
		}
		.content{
			font-size: 25px;
			text-align: center;
			width:150px;
			border-top:1px solid black;
		}
		#sea_s{
			position:relative;
			left: 500px;
			font-size: 25px;
		}
	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script>
		function add_(s){
			var name=s.replace("i","");
       		$.post("issue.php",
        	{
        	"id":name
        	},
        	function(data){
        		$("#tab").html(data);
        	});
    	};

    	function rem_(s){
    		var name=(s).replace("r","");
    		$.post("return.php",
        	{
        	"id":name
        	},
        	function(data){
        		$("#tab").html(data);
            	alert("Returned");
        	 });
    	};

    	function search(){
    		var a=$("#sea").val();
    		$.post("search.php",
    		{
    			"name":a
    		},
    		function(data){
    			$("#tab").html(data);
    			});
    	};

	</script>
</head>
<body>

	<h1 id="heading">Library Portal</h1>
	<div id="main">
		<h2 style="text-align: center;">WELCOME <?php echo"'".$_SESSION['name']."'"; ?> </h2>
	</div>

	<button id="but" onclick="window.location.href='logout.php'">Log out</button>
	<span id="sea_s">
		Search:<input type="text" name="search" id="sea" onchange="search()">
	</span>
	<div id='tab'>
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
            <td class='content'><button style="display:none;" onclick="rem_(this.id)" <?php echo "id='r".htmlspecialchars($row['ID'])."'" ?> >Return</button></td>
        </tr>
   	<?php endwhile; ?>
   </table>
</div>
</body>
</html>
</html>