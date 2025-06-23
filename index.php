<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ミドルシニアの意識アンケート</title>
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
        label {
            font-weight: bold;
            display: block;
            margin-top: 15px;
        }
        input, textarea, select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            box-sizing: border-box;
        }
        .submit-btn {
            margin-top: 20px;
            padding: 10px 20px;
            background: #2FA6E9;
            color: white;
            border: none;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <h1>ミドルシニア応援アンケート</h1>
    <form action="write.php" method="post">
        <label>お名前</label>
        <input type="text" name="name" required>

        <label>メールアドレス</label>
        <input type="email" name="mail" required>

        <label>今、新しく始めてみたい趣味は何ですか？</label>
        <textarea name="hobby" rows="2"></textarea>

        <label>今、学んでみたいこと・スキルはありますか？</label>
        <textarea name="skill" rows="2"></textarea>

        <label>興味のある社会課題は何ですか？</label>
        <textarea name="social_issue" rows="2"></textarea>

        <label>仲間と挑戦してみたいことはありますか？</label>
        <textarea name="challenge" rows="2"></textarea>

        <label>起業に興味はありますか？</label>
        <select name="startup_interest">
            <option value="">選んでください</option>
            <option value="ある">ある</option>
            <option value="少しある">少しある</option>
            <option value="ない">ない</option>
        </select>

        <label>「こんなサービスがあれば使いたい」と思うものはありますか？</label>
        <textarea name="service" rows="2"></textarea>

        <button class="submit-btn" type="submit">送信する</button>
    </form>
</body>
</html>
