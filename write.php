<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$name = $_POST['name'] ?? '';
$mail = $_POST['mail'] ?? '';
$hobby = $_POST['hobby'] ?? '';
$skill = $_POST['skill'];
$social_issue = $_POST['social_issue'];
$challenge = $_POST['challenge'];
$startup_interest = $_POST['startup_interest'];
$service = $_POST['service'];

$data = [date('Y-m-d H:i:s'),$name, $mail, $hobby, $skill, $social_issue, $challenge,
$startup_interest,$service,];






$file = fopen(__DIR__ . "/data.csv", "a");
if (!$file) {
    exit("ファイルが開けないよ！");
}
fputcsv($file, $data);
fclose($file);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>書き込み完了</title>
</head>
<body>
    <h1>✅ データ保存できました！</h1>
    <p><a href="index.php">戻る</a></p>
</body>
</html>
