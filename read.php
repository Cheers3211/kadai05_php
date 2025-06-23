<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>アンケート結果一覧</title>
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
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #999;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #F0F8FF;
        }
    </style>
</head>
<body>
    <h1>アンケート結果一覧</h1>

    <table>
        <tr>
            <th>日時</th>
            <th>お名前</th>
            <th>メール</th>
            <th>始めたい趣味</th>
            <th>学びたいスキル</th>
            <th>興味ある社会課題</th>
            <th>仲間との挑戦</th>
            <th>起業への関心</th>
            <th>欲しいサービス</th>
        </tr>

        <?php
        // CSVファイルを開く
        if (($file = fopen("data.csv", "r")) !== false) {
            while (($line = fgetcsv($file)) !== false) {
                echo "<tr>";
                foreach ($line as $cell) {
                    echo "<td>" . htmlspecialchars($cell, ENT_QUOTES, 'UTF-8') . "</td>";
                }
                echo "</tr>";
            }
            fclose($file);
        } else {
            echo "<tr><td colspan='9'>データがありません。</td></tr>";
        }
        ?>
    </table>

    <p><a href="index.php">アンケートに戻る</a></p>
</body>
</html>
