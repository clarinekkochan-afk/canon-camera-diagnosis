<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Canonカメラ診断</title>
    <style>
        :root {
            --bg: #f1f1ef;
            --surface: #ffffff;
            --surface-strong: #ffffff;
            --text: #111111;
            --muted: #6f6f6f;
            --line: #dededb;
            --accent: #d71920;
            --accent-dark: #ad1117;
            --accent-soft: #fbf1f1;
            --shadow: 0 22px 65px rgba(0, 0, 0, 0.08);
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            padding: 72px 20px 110px;
            min-height: 100vh;
            font-family: -apple-system, BlinkMacSystemFont, "Helvetica Neue", "Hiragino Kaku Gothic ProN", "Yu Gothic", sans-serif;
            line-height: 1.75;
            letter-spacing: 0.01em;
            color: var(--text);
            background:
                radial-gradient(circle at 50% -180px, #ffffff 0, #f6f6f4 34%, transparent 58%),
                var(--bg);
        }

        body > h1,
        body > h1 + p,
        body > h2,
        body > form,
        body > details {
            width: min(100%, 820px);
            margin-left: auto;
            margin-right: auto;
        }

        h1 {
            display: flex;
            align-items: baseline;
            gap: 13px;
            margin-top: 0;
            margin-bottom: 12px;
            font-size: clamp(38px, 6vw, 58px);
            font-weight: 800;
            line-height: 1;
            letter-spacing: -0.055em;
        }

        .brand-red {
            color: var(--accent);
            font-family: Arial, Helvetica, sans-serif;
            font-weight: 900;
            letter-spacing: -0.075em;
        }

        .title-ja {
            color: #111;
            font-size: 0.66em;
            font-weight: 750;
            letter-spacing: -0.045em;
        }


        .results-section {
            width: min(100%, 780px);
            margin: 56px auto 0;
        }

        .results-section > h2 {
            margin: 0 0 22px;
            font-size: 28px;
        }

        .result-card {
            display: grid;
            grid-template-columns: 1fr auto;
            gap: 18px 24px;
            margin-bottom: 18px;
            padding: 26px 28px;
            border: 1px solid var(--line);
            border-radius: 4px;
            background: #fff;
            box-shadow: 0 8px 28px rgba(0, 0, 0, 0.045);
            border-top: 3px solid #111;
        }

        .result-card h3 {
            grid-column: 1 / -1;
            margin: 0;
            font-size: 22px;
            letter-spacing: -0.035em;
        }

        .result-score {
            margin: 0;
            color: var(--accent);
            font-size: 34px;
            font-weight: 800;
            line-height: 1;
        }

        .result-summary {
            margin: 4px 0 0;
            color: var(--muted);
            font-size: 14px;
        }

        .result-specs {
            grid-column: 1 / -1;
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin: 0;
        }

        .result-specs span {
            padding: 6px 10px;
            border-radius: 2px;
            background: #f2f2f2;
            font-size: 13px;
            color: #333;
        }

        .result-details {
            grid-column: 1 / -1;
            margin-top: 0;
            box-shadow: none;
        }

        .result-details p {
            margin: 7px 0;
            font-size: 14px;
        }

        .official-link {
            grid-column: 1 / -1;
            display: inline-flex;
            width: fit-content;
            color: var(--accent-dark);
            font-weight: 700;
            text-decoration: none;
        }

        .official-link:hover {
            text-decoration: underline;
        }

        h1 + p {
            margin-top: 0;
            margin-bottom: 40px;
            color: var(--muted);
            font-size: 15px;
            letter-spacing: 0.045em;
        }

        form {
            position: relative;
            padding: 0 44px 44px;
            border: 1px solid var(--line);
            border-top: 5px solid #111111;
            border-radius: 5px;
            background: rgba(255,255,255,0.97);
            box-shadow: var(--shadow);
            overflow: hidden;
        }

        form > h2 {
            margin: 38px 0 14px;
            padding: 0 0 12px;
            border-bottom: 1px solid #d8d8d5;
            font-size: 18px;
            line-height: 1.45;
            font-weight: 750;
            letter-spacing: -0.025em;
        }

        form > h2:first-of-type {
            margin-top: 27px;
        }

        form p {
            margin: 15px 0 8px;
            color: var(--muted);
            font-size: 13.5px;
            line-height: 1.6;
        }

        form > br {
            display: none;
        }

        label {
            display: flex;
            width: 100%;
            align-items: flex-start;
            gap: 9px;
            margin: 0;
            padding: 10px 12px;
            border: 1px solid #e7e7e4;
            border-radius: 3px;
            cursor: pointer;
            transition: background .18s ease, border-color .18s ease, box-shadow .18s ease;
        }

        label:hover {
            border-color: #cfcfcb;
            background: #fafaf8;
        }

        input[type="radio"],
        input[type="checkbox"] {
            width: 17px;
            height: 17px;
            margin: 4px 2px 0 0;
            flex: 0 0 auto;
            accent-color: var(--accent);
            cursor: pointer;
        }

        select {
            width: 100%;
            margin-bottom: 8px;
            padding: 12px 42px 12px 14px;
            border: 1px solid var(--line);
            border-radius: 3px;
            outline: none;
            color: var(--text);
            background: var(--surface-strong);
            font: inherit;
            font-size: 15px;
            cursor: pointer;
            transition: border-color .18s ease, box-shadow .18s ease, background .18s ease;
        }

        select:hover {
            border-color: #bfbfbb;
            background: #fcfcfb;
        }

        select:focus {
            border-color: #111111;
            box-shadow: 0 0 0 3px rgba(0,0,0,0.06);
        }

        button {
            width: 100%;
            margin-top: 36px;
            min-height: 56px;
            padding: 15px 22px;
            border: 0;
            border-radius: 3px;
            color: #fff;
            background: #111111;
            box-shadow: 0 9px 24px rgba(0,0,0,0.11);
            font-size: 16px;
            font-weight: 800;
            letter-spacing: 0.1em;
            cursor: pointer;
            transition: background .18s ease, transform .18s ease, box-shadow .18s ease;
        }

        button:hover {
            background: var(--accent);
            transform: translateY(-1px);
            box-shadow: 0 12px 28px rgba(215,25,32,0.18);
        }
        input[type="radio"]:checked,
        input[type="checkbox"]:checked {
            accent-color: var(--accent);
        }

        label:has(input:checked) {
            border-color: #e2b8ba;
            background: #fdf4f4;
            box-shadow: inset 3px 0 0 var(--accent);
        }

        form > h2::before {
            content: "";
            display: inline-block;
            width: 18px;
            height: 3px;
            margin: 0 9px 5px 0;
            background: var(--accent);
            vertical-align: middle;
        }

        body > h2:not(:first-of-type) {
            margin-top: 56px;
            margin-bottom: 22px;
            font-size: 28px;
        }

        body > h3,
        body > h2:not(:first-of-type) ~ p {
            width: min(100%, 780px);
            margin-left: auto;
            margin-right: auto;
        }

        body > h3 {
            margin-top: 20px;
            margin-bottom: 8px;
            padding: 22px 24px 8px;
            border: 1px solid var(--line);
            border-bottom: 0;
            border-radius: 18px 18px 0 0;
            background: #fff;
            font-size: 21px;
        }

        body > h3 + p,
        body > h3 + p ~ p {
            padding-left: 24px;
            padding-right: 24px;
            background: #fff;
        }

        details {
            margin-top: 34px;
            padding: 18px 22px;
            border: 1px solid var(--line);
            border-radius: 3px;
            background: #fff;
            box-shadow: none;
        }

        summary {
            font-weight: 700;
            cursor: pointer;
        }

        @media (max-width: 640px) {
            body {
                padding: 38px 14px 72px;
            }

            h1 {
                gap: 8px;
                flex-wrap: wrap;
                font-size: clamp(34px, 12vw, 48px);
            }

            h1 + p {
                margin-bottom: 28px;
            }

            form {
                padding: 0 16px 30px;
                border-radius: 4px;
            }

            form > h2:first-of-type {
                margin-top: 23px;
            }

            form > h2 {
                margin-top: 34px;
                font-size: 17px;
            }

            label {
                padding: 10px 8px;
            }

            body > h2:not(:first-of-type) {
                font-size: 24px;
            }

            .result-card {
                grid-template-columns: 1fr;
                padding: 22px 18px;
            }

            .result-score {
                font-size: 30px;
            }
        }
    </style>
</head>
<body>
    <h1><span class="brand-red">Canon</span><span class="title-ja">カメラ診断</span></h1>
    <p>撮りたいものと使い方から<span class="brand-bla">あなたに合う一台を。</span></p>
    <?php
    $cameras = [
    [
        "name" => "EOS R50",
        "sensor" => "APS-C",
        "megapixels" => 24.2,
        "weight" => 328,
        "mount" => "RF",

        "new_available" => true,
        "new_price" => 111100,

        "used_available" => true,
        "used_price" => 80000,

        "price_checked_at" => "2026-09"
    ],

    [
        "name" => "EOS RP",
        "sensor" => "フルサイズ",
        "megapixels" => 26.2,
        "weight" => 440,
        "mount" => "RF",

        "new_available" => false,
        "new_price" => null,

        "used_available" => true,
        "used_price" => 80000,

        "price_checked_at" => "2026-09"
    ],

    [
        "name" => "EOS R7",
        "sensor" => "APS-C",
        "megapixels" => 32.5,
        "weight" => 530,
        "mount" => "RF",

        "new_available" => true,
        "new_price" => 198000,

        "used_available" => true,
        "used_price" => 150000,

        "price_checked_at" => "2026-09"
    ],

    [
        "name" => "EOS R6",
        "sensor" => "フルサイズ",
        "megapixels" => 20.1,
        "weight" => 598,
        "mount" => "RF",

        "new_available" => false,
        "new_price" => null,

        "used_available" => true,
        "used_price" => 190000,

        "price_checked_at" => "2026-09"
    ],

    [
        "name" => "EOS R8",
        "sensor" => "フルサイズ",
        "megapixels" => 24.2,
        "weight" => 414,
        "mount" => "RF",

        "new_available" => true,
        "new_price" => 242000,

        "used_available" => true,
        "used_price" => 175000,

        "price_checked_at" => "2026-09"
    ],
    [
        "name" => "EOS R100",
        "sensor" => "APS-C",
        "megapixels" => 24.1,
        "weight" => 309,
        "mount" => "RF",
        "new_available" => true,
        "new_price" => 88000,
        "used_available" => true,
        "used_price" => 54000,
        "price_checked_at" => "2026-09"
    ],
    [
        "name" => "EOS R10",
        "sensor" => "APS-C",
        "megapixels" => 24.2,
        "weight" => 382,
        "mount" => "RF",
        "new_available" => true,
        "new_price" => 143000,
        "used_available" => true,
        "used_price" => 115900,
        "price_checked_at" => "2026-09"
    ],
    [
        "name" => "EOS R6 Mark II",
        "sensor" => "フルサイズ",
        "megapixels" => 24.2,
        "weight" => 588,
        "mount" => "RF",
        "new_available" => true,
        "new_price" => 287100,
        "used_available" => true,
        "used_price" => 245633,
        "price_checked_at" => "2026-09"
    ],
    [
        "name" => "EOS 90D",
        "sensor" => "APS-C",
        "megapixels" => 32.5,
        "weight" => 619,
        "mount" => "EF-S",
        "new_available" => false,
        "new_price" => null,
        "used_available" => true,
        "used_price" => 95000,
        "price_checked_at" => "2026-09"
    ],
    [
        "name" => "EOS 80D",
        "sensor" => "APS-C",
        "megapixels" => 24.2,
        "weight" => 650,
        "mount" => "EF-S",
        "new_available" => false,
        "new_price" => null,
        "used_available" => true,
        "used_price" => 60000,
        "price_checked_at" => "2026-09"
    ],
    [
        "name" => "EOS 7D Mark II",
        "sensor" => "APS-C",
        "megapixels" => 20.2,
        "weight" => 820,
        "mount" => "EF-S",
        "new_available" => false,
        "new_price" => null,
        "used_available" => true,
        "used_price" => 40000,
        "price_checked_at" => "2026-09"
    ],
    [
        "name" => "EOS 6D Mark II",
        "sensor" => "フルサイズ",
        "megapixels" => 26.2,
        "weight" => 685,
        "mount" => "EF",
        "new_available" => false,
        "new_price" => null,
        "used_available" => true,
        "used_price" => 105000,
        "price_checked_at" => "2026-09"
    ],
    [
        "name" => "EOS 5D Mark IV",
        "sensor" => "フルサイズ",
        "megapixels" => 30.4,
        "weight" => 800,
        "mount" => "EF",
        "new_available" => false,
        "new_price" => null,
        "used_available" => true,
        "used_price" => 141849,
        "price_checked_at" => "2026-09"
    ],
    [
        "name" => "EOS Kiss X10",
        "sensor" => "APS-C",
        "megapixels" => 24.1,
        "weight" => 402,
        "mount" => "EF-S",
        "new_available" => false,
        "new_price" => null,
        "used_available" => true,
        "used_price" => 58700,
        "price_checked_at" => "2026-09"
    ],
    [
        "name" => "EOS Kiss X90",
        "sensor" => "APS-C",
        "megapixels" => 24.1,
        "weight" => 427,
        "mount" => "EF-S",
        "new_available" => true,
        "new_price" => 77000,
        "used_available" => true,
        "used_price" => 60000,
        "price_checked_at" => "2026-09"
    ],
    [
        "name" => "EOS 70D",
        "sensor" => "APS-C",
        "megapixels" => 20.2,
        "weight" => 675,
        "mount" => "EF-S",

        "new_available" => false,
        "new_price" => null,

        "used_available" => true,
        "used_price" => 35000,

        "price_checked_at" => "2026-09"
    ]
];
   ?> 
   <form method="POST" action="result.php" autocomplete="off">
   <h2>Q1. 新品と中古、どちらがいいですか？</h2>

    <label>
        <input type="radio" name="condition" value="new_only">
        新品だけ
    </label>

    <br>

    <label>
        <input type="radio" name="condition" value="prefer_new">
        できれば新品
    </label>

    <br>

    <label>
        <input type="radio" name="condition" value="used_ok">
        中古でもOK
    </label>

    <br>

    <label>
        <input type="radio" name="condition" value="prefer_used">
        中古で安く買いたい
    </label>

    <br>

    <label>
        <input type="radio" name="condition" value="no_preference">
        特にこだわりはない
    </label>

    <br><br>

<h2>Q2. 撮りたいものを優先順位で教えてください</h2>

<p>1番撮りたいもの</p>
<select name="purpose1">
    <option value="">選んでください</option>
    <option value="portrait">人物・ポートレート</option>
    <option value="family">家族・子ども</option>
    <option value="travel">旅行</option>
    <option value="daily">日常・スナップ</option>
    <option value="oshi">推し活・ライブ・舞台</option>
    <option value="themepark">テーマパーク・パレード</option>
    <option value="sports">スポーツ</option>
    <option value="pet">ペット</option>
    <option value="wildlife">野生生物・野鳥など</option>
    <option value="vehicle">車・電車などの乗り物</option>
    <option value="landscape">風景</option>
    <option value="architecture">建築物・街並み</option>
    <option value="macro">マクロ・接写</option>
    <option value="video">動画撮影</option>
</select>

<p>2番目に撮りたいもの</p>
<select name="purpose2">
    <option value="">選んでください</option>
    <option value="portrait">人物・ポートレート</option>
    <option value="family">家族・子ども</option>
    <option value="travel">旅行</option>
    <option value="daily">日常・スナップ</option>
    <option value="oshi">推し活・ライブ・舞台</option>
    <option value="themepark">テーマパーク・パレード</option>
    <option value="sports">スポーツ</option>
    <option value="pet">ペット</option>
    <option value="wildlife">野生生物・野鳥など</option>
    <option value="vehicle">車・電車などの乗り物</option>
    <option value="landscape">風景</option>
    <option value="architecture">建築物・街並み</option>
    <option value="macro">マクロ・接写</option>
    <option value="video">動画撮影</option>
</select>

<p>3番目に撮りたいもの</p>
<select name="purpose3">
    <option value="">選んでください</option>
    <option value="portrait">人物・ポートレート</option>
    <option value="family">家族・子ども</option>
    <option value="travel">旅行</option>
    <option value="daily">日常・スナップ</option>
    <option value="oshi">推し活・ライブ・舞台</option>
    <option value="themepark">テーマパーク・パレード</option>
    <option value="sports">スポーツ</option>
    <option value="pet">ペット</option>
    <option value="wildlife">野生生物・野鳥など</option>
    <option value="vehicle">車・電車などの乗り物</option>
    <option value="landscape">風景</option>
    <option value="architecture">建築物・街並み</option>
    <option value="macro">マクロ・接写</option>
    <option value="video">動画撮影</option>
    </select>
<p>
    <label>
        <input type="checkbox" name="undecided" value="1">
        まだ撮りたいものが決まっていない
    </label>
</p>

<h2>Q3. カメラ本体にかけられる予算はどのくらいですか？</h2>
<p>レンズ代は含めず、カメラ本体だけの予算で選んでください。</p>

<label>
    <input type="radio" name="budget" value="30000">
    3万円くらいまで
</label>
<br>
<label>
    <input type="radio" name="budget" value="50000">
    5万円くらいまで
</label>
<br>
<label>
    <input type="radio" name="budget" value="80000">
    8万円くらいまで
</label>
<br>
<label>
    <input type="radio" name="budget" value="100000">
    10万円くらいまで
</label>
<br>
<label>
    <input type="radio" name="budget" value="150000">
    15万円くらいまで
</label>
<br>
<label>
    <input type="radio" name="budget" value="200000">
    20万円くらいまで
</label>
<br>
<label>
    <input type="radio" name="budget" value="300000">
    30万円くらいまで
</label>
<br>
<label>
    <input type="radio" name="budget" value="no_limit">
    価格より自分に合うものを優先したい
</label>

<h2>Q4. 暗い場所で撮ることはどのくらいありますか？</h2>
<label><input type="radio" name="low_light" value="0"> ほとんどない</label><br>
<label><input type="radio" name="low_light" value="1"> たまにある</label><br>
<label><input type="radio" name="low_light" value="2"> よくある（室内・夕方など）</label><br>
<label><input type="radio" name="low_light" value="3"> とても多い（夜・ライブ・暗い会場など）</label>

<h2>Q5. 動いているものを撮ることはどのくらいありますか？</h2>
<label><input type="radio" name="action" value="0"> ほとんどない</label><br>
<label><input type="radio" name="action" value="1"> たまにある</label><br>
<label><input type="radio" name="action" value="2"> よくある（子ども・ペットなど）</label><br>
<label><input type="radio" name="action" value="3"> とても多い（スポーツ・野鳥・乗り物など）</label>

<h2>Q6. 遠くにいるものを大きく撮りたいことはありますか？</h2>
<label><input type="radio" name="telephoto" value="0"> ほとんどない</label><br>
<label><input type="radio" name="telephoto" value="1"> たまにある</label><br>
<label><input type="radio" name="telephoto" value="2"> よくある</label><br>
<label><input type="radio" name="telephoto" value="3"> とても多い（スポーツ・野鳥・飛行機など）</label>

<h2>Q7. 動画はどのくらい撮りたいですか？</h2>
<label><input type="radio" name="video_need" value="0"> ほとんど撮らない</label><br>
<label><input type="radio" name="video_need" value="1"> 思い出としてたまに撮れれば十分</label><br>
<label><input type="radio" name="video_need" value="2"> SNS・Vlogなどでも使いたい</label><br>
<label><input type="radio" name="video_need" value="3"> 動画もしっかり作品として撮りたい</label>

<h2>Q8. カメラの軽さ・持ち運びやすさはどのくらい大切ですか？</h2>
<label><input type="radio" name="portability" value="0"> あまり気にしない</label><br>
<label><input type="radio" name="portability" value="1"> できれば軽い方がいい</label><br>
<label><input type="radio" name="portability" value="2"> かなり大切。普段から持ち歩きたい</label><br>
<label><input type="radio" name="portability" value="3"> 最優先。できるだけ小さく軽いものがいい</label>

<h2>Q9. カメラをどのように使いたいですか？</h2>
<label><input type="radio" name="operation" value="easy"> 難しい設定はせず、できるだけ簡単に撮りたい</label><br>
<label><input type="radio" name="operation" value="learn"> 最初は簡単に使えて、少しずつ設定も覚えたい</label><br>
<label><input type="radio" name="operation" value="manual"> 自分で設定を変えながら撮影したい</label><br>
<label><input type="radio" name="operation" value="fast"> ボタンやダイヤルですばやく設定を変えられることを重視したい</label>

<h2>Q10. カメラをどのくらい本格的に使いたいですか？</h2>
<label><input type="radio" name="usage_level" value="memory"> 日常や旅行、家族との思い出をきれいに残したい</label><br>
<label><input type="radio" name="usage_level" value="hobby"> 趣味としてしっかり写真を楽しみたい</label><br>
<label><input type="radio" name="usage_level" value="serious"> 作品づくりや副業など、本格的な撮影にも使いたい</label><br>
<label><input type="radio" name="usage_level" value="professional"> 仕事・業務で使うことを想定している</label>

<h2>Q11. あなたのカメラ経験に近いものはどれですか？</h2>
<label><input type="radio" name="experience" value="first"> はじめてカメラを買う・ほとんど使ったことがない</label><br>
<label><input type="radio" name="experience" value="some"> カメラを使った経験はあるが、まだ初心者</label><br>
<label><input type="radio" name="experience" value="other_brand"> Sony・Nikonなど他メーカーのカメラを普段使っていて、Canonへの乗り換え・買い増しを考えている</label><br>
<label><input type="radio" name="experience" value="canon"> Canonを使っていて、買い替え・買い増しを考えている</label>

<h2>Q12. すでに持っているCanonのレンズはありますか？</h2>
<p>複数種類を持っている場合は、すべて選んでください。</p>
<label><input type="checkbox" name="existing_lens[]" value="ef_efs"> EF・EF-Sレンズを持っている</label><br>
<label><input type="checkbox" name="existing_lens[]" value="efm"> EF-Mレンズを持っている</label><br>
<label><input type="checkbox" name="existing_lens[]" value="rf"> RF・RF-Sレンズを持っている</label><br>
<label><input type="checkbox" name="existing_lens[]" value="unknown"> 持っているが種類が分からない</label><br>
<label><input type="checkbox" name="existing_lens[]" value="none"> Canonのレンズは持っていない</label>

<h2>Q13. 写真をあとから切り抜いて使うことは多そうですか？</h2>
<p>撮影した写真の一部分を、あとから大きく切り抜いて使うことを指します。</p>
<label><input type="radio" name="crop_need" value="0"> ほとんどしないと思う</label><br>
<label><input type="radio" name="crop_need" value="1"> たまにすると思う</label><br>
<label><input type="radio" name="crop_need" value="2"> よく使いたい</label><br>
<label><input type="radio" name="crop_need" value="3"> とても重要。切り抜いても細かく残したい</label>

<br><br>
<button type="submit">診断する</button>
</form>
</body>
</html>