<?php
$bangCuuChuong = range(1, 10);
$phepTinh = range(1, 10);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bảng cửu chương 1 - 10</title>
	<style>
		:root {
			--ink: #17212b;
			--muted: #62707b;
			--paper: #fffdf8;
			--line: #eadfce;
			--accent: #e55b3c;
			--accent-soft: #fff0e9;
			--teal: #176b73;
		}

		* { box-sizing: border-box; }

		body {
			margin: 0;
			color: var(--ink);
			background: #f4efe6;
			font-family: Georgia, 'Times New Roman', serif;
		}

		.page {
			min-height: 100vh;
			padding: 56px 24px 72px;
			background:
				radial-gradient(circle at 10% 8%, rgba(229, 91, 60, .12), transparent 25%),
				linear-gradient(135deg, #f8f3ea 0%, #edf3ef 100%);
		}

		.intro,
		.grid {
			width: min(1180px, 100%);
			margin: 0 auto;
		}

		.intro { margin-bottom: 34px; }

		.eyebrow {
			margin: 0 0 10px;
			color: var(--accent);
			font: 700 13px/1.2 Arial, sans-serif;
			letter-spacing: .16em;
			text-transform: uppercase;
		}

		h1 {
			max-width: 720px;
			margin: 0;
			font-size: clamp(38px, 6vw, 72px);
			line-height: .98;
			letter-spacing: -.04em;
		}

		.intro p:last-child {
			max-width: 570px;
			margin: 18px 0 0;
			color: var(--muted);
			font: 17px/1.6 Arial, sans-serif;
		}

		.grid {
			display: grid;
			grid-template-columns: repeat(5, minmax(0, 1fr));
			gap: 18px;
		}

		.table-card {
			overflow: hidden;
			background: var(--paper);
			border: 1px solid var(--line);
			border-radius: 8px;
			box-shadow: 0 12px 28px rgba(53, 44, 30, .07);
			animation: rise .55s both;
		}

		.table-card:nth-child(2n) { animation-delay: .05s; }
		.table-card:nth-child(3n) { animation-delay: .1s; }

		.card-title {
			display: flex;
			align-items: center;
			justify-content: space-between;
			padding: 15px 16px 13px;
			color: white;
			background: var(--teal);
			font: 700 17px/1 Arial, sans-serif;
		}

		.card-title span {
			color: #bfe5df;
			font-size: 11px;
			letter-spacing: .1em;
			text-transform: uppercase;
		}

		.equations { padding: 7px 16px 13px; }

		.equation {
			display: flex;
			justify-content: space-between;
			padding: 8px 0;
			border-bottom: 1px dashed var(--line);
			font: 15px/1.2 Arial, sans-serif;
		}

		.equation:last-child { border-bottom: 0; }
		.equation strong { color: var(--accent); }

		@keyframes rise {
			from { opacity: 0; transform: translateY(10px); }
			to { opacity: 1; transform: translateY(0); }
		}

		@media (max-width: 980px) {
			.grid { grid-template-columns: repeat(3, minmax(0, 1fr)); }
		}

		@media (max-width: 620px) {
			.page { padding: 36px 16px 48px; }
			.grid { grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 12px; }
			.card-title, .equations { padding-left: 12px; padding-right: 12px; }
			.equation { font-size: 13px; }
		}

		@media (max-width: 380px) {
			.grid { grid-template-columns: 1fr; }
		}
	</style>
</head>
<body>
	<main class="page">
		<header class="intro">
			<p class="eyebrow">Toán học căn bản</p>
			<h1>Bảng cửu chương<br>từ 1 đến 10</h1>
			<p>Tra cứu nhanh các phép nhân, trình bày gọn gàng để học và ghi nhớ mỗi ngày.</p>
		</header>

		<section class="grid" aria-label="Các bảng cửu chương từ 1 đến 10">
			<?php foreach ($bangCuuChuong as $so): ?>
				<article class="table-card">
					<h2 class="card-title">
						Bảng <?php echo $so; ?>
						<span>x 1—10</span>
					</h2>
					<div class="equations">
						<?php foreach ($phepTinh as $thuTu): ?>
							<div class="equation">
								<span><?php echo $so; ?> × <?php echo $thuTu; ?></span>
								<strong><?php echo $so * $thuTu; ?></strong>
							</div>
						<?php endforeach; ?>
					</div>
				</article>
			<?php endforeach; ?>
		</section>
	</main>
</body>
</html>
