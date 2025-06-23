<?php
// エラー表示ON（開発中のみ）
ini_set('display_errors', 1);
error_reporting(E_ALL);

// 起業への関心を集計するための初期値
$counts = [
    'ある' => 0,
    '少しある' => 0,
    'ない' => 0
];

// CSVファイル読み込み＆集計
$file = fopen(__DIR__ . "/data.csv", "r");
if ($file) {
    while (($line = fgetcsv($file)) !== false) {
        // 必要な列数があるか確認（8番目が「起業への関心」）
        if (count($line) >= 8) {
            $interest = trim($line[7]); // 前後の空白も削除
            if (isset($counts[$interest])) {
                $counts[$interest]++;
            }
        }
    }
    fclose($file);
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>起業への関心グラフ</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: sans-serif;
            padding: 20px;
        }
        h1 {
            background-color: #2FA6E9;
            color: white;
            padding: 10px;
        }
        .chart-container {
            max-width: 500px;
            margin: auto;
        }
    </style>
</head>
<body>
    <h1>起業に興味ありますか？（回答の割合）</h1>

    <div class="chart-container">
        <canvas id="myPieChart"></canvas>
    </div>

    <?php if (array_sum($counts) === 0): ?>
        <p>まだ起業に関する回答がありません。</p>
    <?php else: ?>
        <script>
            const ctx = document.getElementById('myPieChart').getContext('2d');
            const chart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['ある', '少しある', 'ない'],
                    datasets: [{
                        label: '起業への関心',
                        data: [<?= $counts['ある'] ?>, <?= $counts['少しある'] ?>, <?= $counts['ない'] ?>],
                        backgroundColor: ['#2FA6E9', '#FDCB58', '#D9534F']
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'bottom'
                        }
                    }
                }
            });
        </script>
    <?php endif; ?>

    <p><a href="index.php">アンケートに戻る</a> | <a href="read.php">回答一覧を見る</a></p>
</body>
</html>
