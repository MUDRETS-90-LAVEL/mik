<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?=$this->title;?></title>
	<link rel="stylesheet" href="/public/css/style.css">
</head>
<body>
<div class="block-body">
	<div class="container">
		<div class="admin-block-body">
			<?php include 'app/include/header.php'; ?>
			<div class="block-conetent-wrap">
				<?php include 'app/include/sidebar.php'; ?>

				<div class="block-content">
					<div class="parametrs-block">
						<p class="title-pages">Общая статистика</p>
					</div>
					<main><?php echo $content; ?></main>
				</div>
			</div>
			<?php include 'app/include/footer.php'; ?>
		</div>
	</div>
</div>
</body>
</html>

