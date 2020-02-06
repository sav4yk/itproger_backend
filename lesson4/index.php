<?php
$website_title="PHP BLOG";
 require('blocks/header.php'); ?>
<main class="container mt-5">
	<div class="row">
		<div class="col-md-8 mb-3">
			<?php
			require_once 'mysql_connect.php';

			$sql = 'SELECT * FROM `articles` ORDER BY `date` DESC';
			$query = $pdo->query($sql);
			while ($row = $query->fetch(PDO::FETCH_OBJ)) {
				echo "<h2>$row->title</h2>
				<p>$row->intro</p>
				<p><b>Автор статьи:</b><mark>$row->avtor</mark></p>
				<a href='news.php?id=$row->id' title='$row->title'>
					<button class='brn btn-warning mb-5'>Прочитать больше</button>
				</a>";

			}

			 ?>
		</div>
<?php require('blocks/aside.php'); ?>
	</div>
</main>

<?php require('blocks/footer.php'); ?>
