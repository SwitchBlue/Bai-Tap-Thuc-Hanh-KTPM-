<?php
$N = isset($_GET['n']) ? (int)$_GET['n'] : rand(1, 100);


if ($N < 1 || $N > 100) {
    $N = rand(1, 100);
}

$soChan = [];
for ($i = 2; $i <= $N; $i += 2) {
    $soChan[] = $i;
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Số chẵn từ 1 đến N</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .box {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 12px rgba(0,0,0,0.1);
            width: 500px;
            max-width: 90%;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        form {
            margin-bottom: 20px;
            text-align: center;
        }
        input[type="number"] {
            padding: 10px;
            width: 160px;
            margin-right: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            padding: 10px 16px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .result {
            margin-top: 20px;
            font-size: 18px;
            color: #222;
        }
        .numbers {
            font-weight: bold;
            color: #0056b3;
            word-wrap: break-word;
        }
    </style>
</head>
<body>
    <div class="box">
        <h2>Danh sách số chẵn từ 1 đến N</h2>

        <form method="GET">
            <label for="n">Nhập N (1 - 100): </label>
            <input type="number" id="n" name="n" min="1" max="100" value="<?php echo $N; ?>">
            <button type="submit">Kiểm tra</button>
        </form>

        <div class="result">
            <p>Giá trị N = <strong><?php echo $N; ?></strong></p>
            <p>Các số chẵn từ 1 đến <?php echo $N; ?> là:</p>
            <div class="numbers">
                <?php
                if (!empty($soChan)) {
                    echo implode(", ", $soChan);
                } else {
                    echo "Không có số chẵn nào trong khoảng này.";
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>
