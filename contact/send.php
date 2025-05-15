! doctype=html
<?php
$yourname = htmlspecialchars($_POST['yourname'], ENT_QUOTES);
$email = htmlspecialchars($_POST['mail'], ENT_QUOTES);
$kinds = htmlspecialchars($_POST['kinds'],ENT_QUOTES);
$naiyou = htmlspecialchars($_POST['naiyou'], ENT_QUOTES);
$adminText = '名前：'.$yourname."\r\n"
           .'メールアドレス：'.$email."\r\n"
           .'種別：'.$kinds."\r\n"
	       .'お問い合わせ内容'.$naiyou."\r\n";

$replyText = "この度は、お問い合わせ頂き誠にありがとうございます。\r\n"
           . "下記の内容でお問い合わせを受け付けました。\r\n"
           . "返信をお待ちください。\r\n\r\n"
           . '名前：'.$yourname."\r\n"
           .'メールアドレス：'.$email."\r\n"
           .'種別：'.$kinds."\r\n"
	       .'お問い合わせ内容'.$naiyou."\r\n";

$header  = "MIME-Version: 1.0\r\n";
$header .= "Content-Type: text/plain; charset=UTF-8\r\n";
$header .= "From: キョーカスイゲツ。 <kyoukasuigetsu.809@gmail.com>\r\n";
$header .= "Reply-To: キョーカスイゲツ。 <kyoukasuigetsu.809@gmail.com>\r\n";

$adminMailSuccess = mail('tsukukomasobiken@gmail.com', 'お問い合わせ', $adminText);
$userMailSuccess = mail($email, 'お問い合わせを受付いたしました', $replyText, $header);


$discordWebhookUrl = 'https://discordapp.com/api/webhooks/1372380808207401091/hiyf_3KNlchdcws9xU4uXaakHylE1irKPKcU6Lto8N15G0vDx3IvSWGcMcGZwCYdd3EJ';

$discordMessage = "**問い合わせがありました！**\n"
                .'名前：'.$yourname."\r\n"
           .'名前：'.$yourname."\r\n"
           .'メールアドレス：'.$email."\r\n"
           .'種別：'.$kinds."\r\n"
	       .'お問い合わせ内容'.$naiyou."\r\n";

$data = json_encode(["content" => $discordMessage], JSON_UNESCAPED_UNICODE);

$options = [
    'http' => [
        'header'  => "Content-Type: application/json\r\n",
        'method'  => 'POST',
        'content' => $data,
    ],
];

$context  = stream_context_create($options);
$result = file_get_contents($discordWebhookUrl, false, $context);

if ($result === FALSE) {
    error_log("Discord 送信エラー");
}
?>
<html>
<meta charset="utf-8">
<title>送信完了</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>
       <h1>送信完了</h1>
    <?php if ($adminMailSuccess && $userMailSuccess): ?>
        <p>お問い合わせありがとうございます。</p>
        <p>送信が完了しました。</p>
    <?php else: ?>
        <p>エラーが発生しました。メールの送信に失敗しました。</p>
        <p>お手数ですが、再度お試しいただくか、直接ご連絡ください。</p>
    <?php endif; ?>
</body>
</html>