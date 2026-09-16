<?php
function laSoNguyenTo(int $so): bool
{
	if ($so < 2) {
		return false;
	}

	for ($i = 2; $i * $i <= $so; $i++) {
		if ($so % $i === 0) {
			return false;
		}
	}

	return true;
}

$N = rand(-100, 100);
$laSoDuong = $N > 0;
$uocSo = [];
$tongSoNguyenTo = 0;
$laSoChinhPhuong = false;

if ($laSoDuong) {
	for ($i = 1; $i <= $N; $i++) {
		if ($N % $i === 0) {
			$uocSo[] = $i;
		}
	}

	for ($i = 2; $i < $N; $i++) {
		if (laSoNguyenTo($i)) {
			$tongSoNguyenTo += $i;
		}
	}

	$canBacHai = (int) sqrt($N);
	$laSoChinhPhuong = $canBacHai * $canBacHai === $N;
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Kiểm tra số N</title>
	<style>
		:root {
			--ink: #17212b;
			--muted: #68747d;
			--paper: #fffdf8;
			--line: #eadfce;
			--accent: #e55b3c;
			--teal: #176b73;
			--soft: #f7eee2;
		}

		* { box-sizing: border-box; }

		body {
			margin: 0;
			color: var(--ink);
			background: #f4efe6;
			font-family: Arial, sans-serif;
		}

		.page {
			min-height: 100vh;
			padding: 52px 24px 68px;
			background: radial-gradient(circle at 90% 5%, rgba(229, 91, 60, .14), transparent 28%),
				linear-gradient(135deg, #f8f3ea, #edf3ef);
		}

		.container { width: min(880px, 100%); margin: auto; }

		header { margin-bottom: 28px; }

		.eyebrow {
			margin: 0 0 10px;
			color: var(--accent);
			font-size: 13px;
			font-weight: 700;
			letter-spacing: .15em;
			text-transform: uppercase;
		}

		h1 {
			margin: 0;
			color: var(--ink);
			font: 700 clamp(38px, 7vw, 70px)/.98 Georgia, 'Times New Roman', serif;
			letter-spacing: -.04em;
		}

		.subtitle { max-width: 580px; margin: 16px 0 0; color: var(--muted); font-size: 17px; line-height: 1.55; }

		.number-panel {
			display: flex;
			align-items: center;
			justify-content: space-between;
			gap: 20px;
			margin-bottom: 18px;
			padding: 22px 24px;
			color: white;
			background: var(--teal);
			border-radius: 8px;
			box-shadow: 0 12px 26px rgba(23, 107, 115, .16);
		}

		.number-label { margin: 0 0 7px; color: #bfe5df; font-size: 13px; text-transform: uppercase; letter-spacing: .1em; }
		.number { margin: 0; font: 700 58px/.9 Georgia, 'Times New Roman', serif; }

		.refresh {
			padding: 12px 16px;
			color: var(--teal);
			background: white;
			border: 0;
			border-radius: 5px;
			font-weight: 700;
			cursor: pointer;
		}

		.refresh:hover { background: #e7f4f0; }

		.status {
			margin: 0 0 18px;
			padding: 14px 18px;
			color: var(--teal);
			background: #e7f4f0;
			border-left: 4px solid var(--teal);
			font-weight: 700;
		}

		.status.warning { color: #9b4029; background: #fff0e9; border-left-color: var(--accent); }

		.results { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 14px; }

		.result {
			min-height: 112px;
			padding: 20px;
			background: var(--paper);
			border: 1px solid var(--line);
			border-radius: 8px;
			box-shadow: 0 8px 20px rgba(53, 44, 30, .06);
			animation: rise .45s both;
		}

		.result:nth-child(2) { animation-delay: .05s; }
		.result:nth-child(3) { animation-delay: .1s; }
		.result:nth-child(4) { animation-delay: .15s; }
		.result h2 { margin: 0 0 12px; color: var(--muted); font-size: 14px; font-weight: 700; text-transform: uppercase; letter-spacing: .06em; }
		.value { margin: 0; color: var(--accent); font-size: 21px; font-weight: 700; line-height: 1.45; }
		.muted { color: var(--muted); font-size: 16px; font-weight: 400; }

		@keyframes rise { from { opacity: 0; transform: translateY(8px); } to { opacity: 1; transform: translateY(0); } }

		@media (max-width: 620px) {
			.page { padding: 36px 16px 48px; }
			.number-panel { align-items: flex-start; flex-direction: column; padding: 20px; }
			.refresh { width: 100%; }
			.results { grid-template-columns: 1fr; }
		}
	</style>
</head>
<body>
	<main class="page">
		<div class="container">
			<header>
				<p class="eyebrow">Bài tập số học</p>
				<h1>Kiểm tra số N</h1>
				<p class="subtitle">Một giá trị ngẫu nhiên trong khoảng từ -100 đến 100 được tạo và phân tích tự động.</p>
			</header>

			<section class="number-panel" aria-label="Giá trị N được sinh ngẫu nhiên">
				<div>
					<p class="number-label">Giá trị ngẫu nhiên</p>
					<p class="number"><?php echo $N; ?></p>
				</div>
				<form method="get">
					<button class="refresh" type="submit">Sinh số khác</button>
				</form>
			</section>

			<?php if ($laSoDuong): ?>
				<p class="status">N là số dương. Các phép kiểm tra được thực hiện bên dưới.</p>
				<section class="results" aria-label="Kết quả kiểm tra">
					<article class="result">
						<h2>Ước số của N</h2>
						<p class="value"><?php echo implode(', ', $uocSo); ?></p>
					</article>
					<article class="result">
						<h2>Số nguyên tố</h2>
						<p class="value"><?php echo laSoNguyenTo($N) ? 'Có' : 'Không'; ?></p>
					</article>
					<article class="result">
						<h2>Tổng số nguyên tố &lt; N</h2>
						<p class="value"><?php echo $tongSoNguyenTo; ?></p>
					</article>
					<article class="result">
						<h2>Số chính phương</h2>
						<p class="value"><?php echo $laSoChinhPhuong ? 'Có' : 'Không'; ?></p>
					</article>
				</section>
			<?php else: ?>
				<p class="status warning">N không phải là số dương, nên không thực hiện các phép kiểm tra còn lại.</p>
			<?php endif; ?>
		</div>
	</main>
</body>
</html>
