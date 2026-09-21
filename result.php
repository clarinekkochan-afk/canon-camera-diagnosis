

<?php
// 診断ページを通らず直接開いた場合は、質問ページへ戻す
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php");
    exit;
}

// index.php の診断ロジック・機種データをこのページでも再現
$answers = $_POST;

// カメラ機種データ
// Canon EOS 診断対象モデル
$cameras = [
    [
        'name' => 'EOS R50',
        'sensor' => 'APS-C',
        'megapixels' => 24.2,
        'weight' => 328,
        'mount' => 'RF',
        'new_available' => true,
        'used_available' => true,
        'new_price' => 111100,
        'used_price' => 80000,
        'price_checked_at' => '2026-09',
        'canon_url' => 'https://personal.canon.jp/product/camera/eos/r50',
    ],
    [
        'name' => 'EOS RP',
        'sensor' => 'フルサイズ',
        'megapixels' => 26.2,
        'weight' => 440,
        'mount' => 'RF',
        'new_available' => false,
        'used_available' => true,
        'new_price' => null,
        'used_price' => 80000,
        'price_checked_at' => '2026-09',
        'canon_url' => 'https://personal.canon.jp/product/camera/eos/rp',
    ],
    [
        'name' => 'EOS R7',
        'sensor' => 'APS-C',
        'megapixels' => 32.5,
        'weight' => 530,
        'mount' => 'RF',
        'new_available' => true,
        'used_available' => true,
        'new_price' => 220000,
        'used_price' => 150000,
        'price_checked_at' => '2026-09',
        'canon_url' => 'https://personal.canon.jp/product/camera/eos/r7',
    ],
    [
        'name' => 'EOS R6',
        'sensor' => 'フルサイズ',
        'megapixels' => 20.1,
        'weight' => 598,
        'mount' => 'RF',
        'new_available' => false,
        'used_available' => true,
        'new_price' => null,
        'used_price' => 190000,
        'price_checked_at' => '2026-09',
        'canon_url' => 'https://personal.canon.jp/product/camera/eos/old-products',
    ],
    [
        'name' => 'EOS R8',
        'sensor' => 'フルサイズ',
        'megapixels' => 24.2,
        'weight' => 414,
        'mount' => 'RF',
        'new_available' => true,
        'used_available' => true,
        'new_price' => 242000,
        'used_price' => 175000,
        'price_checked_at' => '2026-09',
        'canon_url' => 'https://personal.canon.jp/product/camera/eos/r8',
    ],
    [
        'name' => 'EOS R100',
        'sensor' => 'APS-C',
        'megapixels' => 24.1,
        'weight' => 309,
        'mount' => 'RF',
        'new_available' => true,
        'used_available' => true,
        'new_price' => 88000,
        'used_price' => 54000,
        'price_checked_at' => '2026-09',
        'canon_url' => 'https://personal.canon.jp/product/camera/eos/r100',
    ],
    [
        'name' => 'EOS R10',
        'sensor' => 'APS-C',
        'megapixels' => 24.2,
        'weight' => 382,
        'mount' => 'RF',
        'new_available' => true,
        'used_available' => true,
        'new_price' => 143000,
        'used_price' => 115900,
        'price_checked_at' => '2026-09',
        'canon_url' => 'https://personal.canon.jp/product/camera/eos/r10',
    ],
    [
        'name' => 'EOS R6 Mark II',
        'sensor' => 'フルサイズ',
        'megapixels' => 24.2,
        'weight' => 588,
        'mount' => 'RF',
        'new_available' => true,
        'used_available' => true,
        'new_price' => 319000,
        'used_price' => 245633,
        'price_checked_at' => '2026-09',
        'canon_url' => 'https://personal.canon.jp/product/camera/eos/r6mk2',
    ],
    [
        'name' => 'EOS R5',
        'sensor' => 'フルサイズ',
        'megapixels' => 45.0,
        'weight' => 650,
        'mount' => 'RF',
        'new_available' => false,
        'used_available' => true,
        'new_price' => null,
        'used_price' => 230000,
        'price_checked_at' => '2026-09',
        'canon_url' => 'https://personal.canon.jp/product/camera/eos/r5',
    ],
    [
        'name' => 'EOS R3',
        'sensor' => 'フルサイズ',
        'megapixels' => 24.1,
        'weight' => 822,
        'mount' => 'RF',
        'new_available' => false,
        'used_available' => true,
        'new_price' => null,
        'used_price' => 350000,
        'price_checked_at' => '2026-09',
        'canon_url' => 'https://personal.canon.jp/product/camera/eos/r3',
    ],
    [
        'name' => 'EOS R5 Mark II',
        'sensor' => 'フルサイズ',
        'megapixels' => 45.0,
        'weight' => 656,
        'mount' => 'RF',
        'new_available' => true,
        'used_available' => true,
        'new_price' => 654500,
        'used_price' => 560000,
        'price_checked_at' => '2026-09',
        'canon_url' => 'https://personal.canon.jp/product/camera/eos/r5mk2',
    ],
    [
        'name' => 'EOS R6 Mark III',
        'sensor' => 'フルサイズ',
        'megapixels' => 32.5,
        'weight' => 609,
        'mount' => 'RF',
        'new_available' => true,
        'used_available' => true,
        'new_price' => 429000,
        'used_price' => 390000,
        'price_checked_at' => '2026-09',
        'canon_url' => 'https://personal.canon.jp/product/camera/eos/r6mk3',
    ],
    // 2026年10月29日発売予定。発売前のため中古価格なし。
    [
        'name' => 'EOS R8 Mark II',
        'sensor' => 'フルサイズ',
        'megapixels' => 24.2,
        'weight' => 546,
        'mount' => 'RF',
        'new_available' => true,
        'used_available' => false,
        'new_price' => 275000,
        'used_price' => null,
        'price_checked_at' => '2026-09',
        'canon_url' => 'https://personal.canon.jp/product/camera/eos/r8mk2',
    ],
    [
        'name' => 'EOS R1',
        'sensor' => 'フルサイズ',
        'megapixels' => 24.2,
        'weight' => 920,
        'mount' => 'RF',
        'new_available' => true,
        'used_available' => true,
        'new_price' => 1089000,
        'used_price' => 900000,
        'price_checked_at' => '2026-09',
        'canon_url' => 'https://personal.canon.jp/product/camera/eos/r1',
    ],
    [
        'name' => 'EOS 90D',
        'sensor' => 'APS-C',
        'megapixels' => 32.5,
        'weight' => 619,
        'mount' => 'EF-S',
        'new_available' => false,
        'used_available' => true,
        'new_price' => null,
        'used_price' => 95000,
        'price_checked_at' => '2026-09',
        'canon_url' => 'https://personal.canon.jp/product/camera/eos/old-products',
    ],
    [
        'name' => 'EOS 80D',
        'sensor' => 'APS-C',
        'megapixels' => 24.2,
        'weight' => 650,
        'mount' => 'EF-S',
        'new_available' => false,
        'used_available' => true,
        'new_price' => null,
        'used_price' => 60000,
        'price_checked_at' => '2026-09',
        'canon_url' => 'https://personal.canon.jp/product/camera/eos/old-products',
    ],
    [
        'name' => 'EOS 7D Mark II',
        'sensor' => 'APS-C',
        'megapixels' => 20.2,
        'weight' => 820,
        'mount' => 'EF-S',
        'new_available' => false,
        'used_available' => true,
        'new_price' => null,
        'used_price' => 40000,
        'price_checked_at' => '2026-09',
        'canon_url' => 'https://personal.canon.jp/product/camera/eos/old-products',
    ],
    [
        'name' => 'EOS 6D Mark II',
        'sensor' => 'フルサイズ',
        'megapixels' => 26.2,
        'weight' => 685,
        'mount' => 'EF',
        'new_available' => false,
        'used_available' => true,
        'new_price' => null,
        'used_price' => 105000,
        'price_checked_at' => '2026-09',
        'canon_url' => 'https://personal.canon.jp/product/camera/eos/old-products',
    ],
    [
        'name' => 'EOS 5D Mark IV',
        'sensor' => 'フルサイズ',
        'megapixels' => 30.4,
        'weight' => 800,
        'mount' => 'EF',
        'new_available' => false,
        'used_available' => true,
        'new_price' => null,
        'used_price' => 141849,
        'price_checked_at' => '2026-09',
        'canon_url' => 'https://personal.canon.jp/product/camera/eos/old-products',
    ],
    [
        'name' => 'EOS Kiss X10',
        'sensor' => 'APS-C',
        'megapixels' => 24.1,
        'weight' => 402,
        'mount' => 'EF-S',
        'new_available' => false,
        'used_available' => true,
        'new_price' => null,
        'used_price' => 58700,
        'price_checked_at' => '2026-09',
        'canon_url' => 'https://personal.canon.jp/product/camera/eos/old-products',
    ],
    [
        'name' => 'EOS Kiss X90',
        'sensor' => 'APS-C',
        'megapixels' => 24.1,
        'weight' => 427,
        'mount' => 'EF-S',
        'new_available' => true,
        'used_available' => true,
        'new_price' => 77000,
        'used_price' => 60000,
        'price_checked_at' => '2026-09',
        'canon_url' => 'https://personal.canon.jp/product/camera/eos/eoskissx90',
    ],
    [
        'name' => 'EOS 70D',
        'sensor' => 'APS-C',
        'megapixels' => 20.2,
        'weight' => 675,
        'mount' => 'EF-S',
        'new_available' => false,
        'used_available' => true,
        'new_price' => null,
        'used_price' => 35000,
        'price_checked_at' => '2026-09',
        'canon_url' => 'https://personal.canon.jp/product/camera/eos/old-products',
    ],
    // --- 追加モデル ---
    [
        'name' => 'EOS R',
        'sensor' => 'フルサイズ',
        'megapixels' => 30.3,
        'weight' => 660,
        'mount' => 'RF',
        'new_available' => false,
        'used_available' => true,
        'new_price' => null,
        'used_price' => 95000,
        'price_checked_at' => '2026-09',
        'canon_url' => 'https://personal.canon.jp/product/camera/eos/old-products',
    ],
    [
        'name' => 'EOS Kiss X7',
        'sensor' => 'APS-C',
        'megapixels' => 18.0,
        'weight' => 407,
        'mount' => 'EF-S',
        'new_available' => false,
        'used_available' => true,
        'new_price' => null,
        'used_price' => 28000,
        'price_checked_at' => '2026-09',
        'canon_url' => 'https://personal.canon.jp/product/camera/eos/old-products',
    ],
    [
        'name' => 'EOS Kiss X8i',
        'sensor' => 'APS-C',
        'megapixels' => 24.2,
        'weight' => 555,
        'mount' => 'EF-S',
        'new_available' => false,
        'used_available' => true,
        'new_price' => null,
        'used_price' => 38000,
        'price_checked_at' => '2026-09',
        'canon_url' => 'https://personal.canon.jp/product/camera/eos/old-products',
    ],
    [
        'name' => 'EOS Kiss X9',
        'sensor' => 'APS-C',
        'megapixels' => 24.2,
        'weight' => 453,
        'mount' => 'EF-S',
        'new_available' => false,
        'used_available' => true,
        'new_price' => null,
        'used_price' => 43000,
        'price_checked_at' => '2026-09',
        'canon_url' => 'https://personal.canon.jp/product/camera/eos/old-products',
    ],
    [
        'name' => 'EOS Kiss X9i',
        'sensor' => 'APS-C',
        'megapixels' => 24.2,
        'weight' => 532,
        'mount' => 'EF-S',
        'new_available' => false,
        'used_available' => true,
        'new_price' => null,
        'used_price' => 50000,
        'price_checked_at' => '2026-09',
        'canon_url' => 'https://personal.canon.jp/product/camera/eos/old-products',
    ],
    [
        'name' => 'EOS Kiss X10i',
        'sensor' => 'APS-C',
        'megapixels' => 24.1,
        'weight' => 515,
        'mount' => 'EF-S',
        'new_available' => false,
        'used_available' => true,
        'new_price' => null,
        'used_price' => 70000,
        'price_checked_at' => '2026-09',
        'canon_url' => 'https://personal.canon.jp/product/camera/eos/old-products',
    ],
    [
        'name' => 'EOS 60D',
        'sensor' => 'APS-C',
        'megapixels' => 18.0,
        'weight' => 755,
        'mount' => 'EF-S',
        'new_available' => false,
        'used_available' => true,
        'new_price' => null,
        'used_price' => 25000,
        'price_checked_at' => '2026-09',
        'canon_url' => 'https://personal.canon.jp/product/camera/eos/old-products',
    ],
    [
        'name' => 'EOS 8000D',
        'sensor' => 'APS-C',
        'megapixels' => 24.2,
        'weight' => 520,
        'mount' => 'EF-S',
        'new_available' => false,
        'used_available' => true,
        'new_price' => null,
        'used_price' => 40000,
        'price_checked_at' => '2026-09',
        'canon_url' => 'https://personal.canon.jp/product/camera/eos/old-products',
    ],
    [
        'name' => 'EOS 9000D',
        'sensor' => 'APS-C',
        'megapixels' => 24.2,
        'weight' => 540,
        'mount' => 'EF-S',
        'new_available' => false,
        'used_available' => true,
        'new_price' => null,
        'used_price' => 52000,
        'price_checked_at' => '2026-09',
        'canon_url' => 'https://personal.canon.jp/product/camera/eos/old-products',
    ],
    [
        'name' => 'EOS 7D',
        'sensor' => 'APS-C',
        'megapixels' => 18.0,
        'weight' => 820,
        'mount' => 'EF-S',
        'new_available' => false,
        'used_available' => true,
        'new_price' => null,
        'used_price' => 25000,
        'price_checked_at' => '2026-09',
        'canon_url' => 'https://personal.canon.jp/product/camera/eos/old-products',
    ],
    [
        'name' => 'EOS 6D',
        'sensor' => 'フルサイズ',
        'megapixels' => 20.2,
        'weight' => 680,
        'mount' => 'EF',
        'new_available' => false,
        'used_available' => true,
        'new_price' => null,
        'used_price' => 55000,
        'price_checked_at' => '2026-09',
        'canon_url' => 'https://personal.canon.jp/product/camera/eos/old-products',
    ],
    [
        'name' => 'EOS 5D Mark III',
        'sensor' => 'フルサイズ',
        'megapixels' => 22.3,
        'weight' => 860,
        'mount' => 'EF',
        'new_available' => false,
        'used_available' => true,
        'new_price' => null,
        'used_price' => 60000,
        'price_checked_at' => '2026-09',
        'canon_url' => 'https://personal.canon.jp/product/camera/eos/old-products',
    ],
    [
        'name' => 'EOS M200',
        'sensor' => 'APS-C',
        'megapixels' => 24.1,
        'weight' => 299,
        'mount' => 'EF-M',
        'new_available' => false,
        'used_available' => true,
        'new_price' => null,
        'used_price' => 55000,
        'price_checked_at' => '2026-09',
        'canon_url' => 'https://personal.canon.jp/product/camera/eos/old-products',
    ],
    [
        'name' => 'EOS Kiss M',
        'sensor' => 'APS-C',
        'megapixels' => 24.1,
        'weight' => 387,
        'mount' => 'EF-M',
        'new_available' => false,
        'used_available' => true,
        'new_price' => null,
        'used_price' => 50000,
        'price_checked_at' => '2026-09',
        'canon_url' => 'https://personal.canon.jp/product/camera/eos/old-products',
    ],
    [
        'name' => 'EOS Kiss M2',
        'sensor' => 'APS-C',
        'megapixels' => 24.1,
        'weight' => 387,
        'mount' => 'EF-M',
        'new_available' => false,
        'used_available' => true,
        'new_price' => null,
        'used_price' => 65000,
        'price_checked_at' => '2026-09',
        'canon_url' => 'https://personal.canon.jp/product/camera/eos/old-products',
    ],
    [
        'name' => 'EOS M6 Mark II',
        'sensor' => 'APS-C',
        'megapixels' => 32.5,
        'weight' => 408,
        'mount' => 'EF-M',
        'new_available' => false,
        'used_available' => true,
        'new_price' => null,
        'used_price' => 95000,
        'price_checked_at' => '2026-09',
        'canon_url' => 'https://personal.canon.jp/product/camera/eos/old-products',
    ],
];

// 診断ニーズ9種
$need_keys = [
    'portrait', 'action', 'low_light', 'telephoto', 'resolution',
    'video', 'portability', 'operability', 'reliability'
];

// Q2バリデーション
$purpose1 = isset($answers['purpose1']) ? trim($answers['purpose1']) : '';
$purpose2 = isset($answers['purpose2']) ? trim($answers['purpose2']) : '';
$purpose3 = isset($answers['purpose3']) ? trim($answers['purpose3']) : '';
$undecided = isset($answers['undecided']) ? $answers['undecided'] : '';
$purpose_error = false;
if (!$undecided) {
    if ($purpose1 === '' || $purpose2 === '' || $purpose3 === ''
        || $purpose1 === $purpose2 || $purpose1 === $purpose3 || $purpose2 === $purpose3) {
        $purpose_error = true;
    }
}

// 診断ニーズ点数ロジック
function calc_needs($answers, $need_keys) {
    $needs = array_fill_keys($need_keys, 0);
    // Q2: 目的
    $purpose_map = [
        'portrait' => ['portrait'=>3, 'low_light'=>2, 'resolution'=>1],
        'family' => ['portrait'=>2, 'action'=>2, 'low_light'=>1],
        'travel' => ['portability'=>3, 'resolution'=>1],
        'daily' => ['portability'=>3, 'portrait'=>1, 'operability'=>1],
        'oshi' => ['low_light'=>3, 'telephoto'=>2, 'action'=>2, 'resolution'=>1],
        'themepark' => ['telephoto'=>3, 'action'=>2, 'low_light'=>1, 'portability'=>1],
        'sports' => ['action'=>3, 'telephoto'=>2, 'operability'=>1],
        'pet' => ['action'=>2, 'portrait'=>2, 'low_light'=>1],
        'wildlife' => ['telephoto'=>3, 'action'=>2, 'resolution'=>1],
        'vehicle' => ['action'=>3, 'telephoto'=>2, 'operability'=>1],
        'landscape' => ['resolution'=>3, 'portability'=>1],
        'architecture' => ['resolution'=>3, 'operability'=>1],
        'macro' => ['resolution'=>2, 'operability'=>2],
        'video' => ['video'=>3, 'operability'=>1, 'portability'=>1],
    ];
    $rank_mul = [3,2,1];
    if (isset($answers['purpose1'], $answers['purpose2'], $answers['purpose3'])
        && $answers['purpose1'] && $answers['purpose2'] && $answers['purpose3']) {
        $ps = [$answers['purpose1'],$answers['purpose2'],$answers['purpose3']];
        foreach ($ps as $i=>$p) {
            if (isset($purpose_map[$p])) {
                foreach ($purpose_map[$p] as $k=>$v) {
                    $needs[$k] += $v * $rank_mul[$i];
                }
            }
        }
    }
    // Q2: 迷っている
    if (!empty($answers['undecided'])) {
        foreach ($needs as $k=>$v) $needs[$k] += 1;
    }
    // Q3: 直接指定（0-3段階で入力されるので、その値×4を加算）
    foreach (['low_light','action','telephoto','video_need','portability'] as $k) {
        if (isset($answers[$k]) && $answers[$k] !== '') {
            $map = ['low_light'=>'low_light','action'=>'action','telephoto'=>'telephoto','video_need'=>'video','portability'=>'portability'];
            $needs[$map[$k]] += intval($answers[$k]) * 4;
        }
    }
    // Q4: 操作性
    if (!empty($answers['operation'])) {
        if ($answers['operation'] === 'learn') $needs['operability'] += 2;
        elseif ($answers['operation'] === 'manual') $needs['operability'] += 5;
        elseif ($answers['operation'] === 'fast') $needs['operability'] += 8;
    }
    // Q5: 使い方
    if (!empty($answers['usage_level'])) {
        if ($answers['usage_level'] === 'hobby') $needs['reliability'] += 2;
        elseif ($answers['usage_level'] === 'serious') { $needs['reliability'] += 5; $needs['operability'] += 2; }
        elseif ($answers['usage_level'] === 'professional') { $needs['reliability'] += 9; $needs['operability'] += 3; }
    }
    // Q6/Q7 obsolete: 解像度・ポートレート単独指定は廃止
    // クロップ需要（crop_need）は解像度ニーズを増加させる
    if (isset($answers['crop_need']) && $answers['crop_need'] !== '') {
        // Cropping increases the need for resolution
        $needs['resolution'] += intval($answers['crop_need']) * 4;
    }
    return $needs;
}

// カメラ性能スコア計算
function calc_camera_scores($camera) {
    $scores = [];
    // 解像度
    $scores['resolution'] = $camera['megapixels'] >= 30 ? 30 : ($camera['megapixels'] >= 26 ? 24 : ($camera['megapixels'] >= 24 ? 21 : 17));
    // ポートレート: フルサイズ+AF点数
    $scores['portrait'] = ($camera['sensor']==='フルサイズ' ? 14 : 8) + ($camera['megapixels'] >= 24 ? 4 : 2);
    // 動体
    $scores['action'] = 0;
    if ($camera['name']==='EOS R7') $scores['action']=24;
    elseif ($camera['name']==='EOS R6 Mark II') $scores['action']=22;
    elseif ($camera['name']==='EOS R5') $scores['action']=22;
    elseif ($camera['name']==='EOS R3') $scores['action']=24;
    elseif ($camera['name']==='EOS R6') $scores['action']=20;
    elseif ($camera['name']==='EOS R8') $scores['action']=18;
    elseif ($camera['name']==='EOS R10') $scores['action']=15;
    elseif ($camera['name']==='EOS R50') $scores['action']=13;
    elseif ($camera['name']==='EOS RP') $scores['action']=10;
    elseif ($camera['name']==='EOS R100') $scores['action']=8;
    elseif ($camera['name']==='EOS 90D') $scores['action']=16;
    elseif ($camera['name']==='EOS 80D') $scores['action']=14;
    elseif ($camera['name']==='EOS 7D Mark II') $scores['action']=22;
    elseif ($camera['name']==='EOS 6D Mark II') $scores['action']=10;
    elseif ($camera['name']==='EOS 5D Mark IV') $scores['action']=16;
    elseif ($camera['name']==='EOS Kiss X10') $scores['action']=8;
    elseif ($camera['name']==='EOS Kiss X90') $scores['action']=7;
    elseif ($camera['name']==='EOS 70D') $scores['action']=12;
    // 追加モデル分
    elseif ($camera['name']==='EOS R') $scores['action']=12;
    elseif ($camera['name']==='EOS Kiss X7') $scores['action']=7;
    elseif ($camera['name']==='EOS Kiss X8i') $scores['action']=9;
    elseif ($camera['name']==='EOS Kiss X9') $scores['action']=8;
    elseif ($camera['name']==='EOS Kiss X9i') $scores['action']=11;
    elseif ($camera['name']==='EOS Kiss X10i') $scores['action']=13;
    elseif ($camera['name']==='EOS 60D') $scores['action']=10;
    elseif ($camera['name']==='EOS 8000D') $scores['action']=9;
    elseif ($camera['name']==='EOS 9000D') $scores['action']=11;
    elseif ($camera['name']==='EOS 7D') $scores['action']=20;
    elseif ($camera['name']==='EOS 6D') $scores['action']=8;
    elseif ($camera['name']==='EOS 5D Mark III') $scores['action']=15;
    elseif ($camera['name']==='EOS M200') $scores['action']=8;
    elseif ($camera['name']==='EOS Kiss M') $scores['action']=9;
    elseif ($camera['name']==='EOS Kiss M2') $scores['action']=10;
    elseif ($camera['name']==='EOS M6 Mark II') $scores['action']=15;
    // 新モデル分
    elseif ($camera['name']==='EOS R5 Mark II') $scores['action']=24;
    elseif ($camera['name']==='EOS R6 Mark III') $scores['action']=24;
    elseif ($camera['name']==='EOS R8 Mark II') $scores['action']=22;
    elseif ($camera['name']==='EOS R1') $scores['action']=24;
    // 暗所
    $scores['low_light'] = 0;
    if ($camera['sensor']==='フルサイズ') $scores['low_light'] += 18;
    elseif ($camera['sensor']==='APS-C') $scores['low_light'] += 10;
    if ($camera['megapixels'] <= 24) $scores['low_light'] += 6;
    elseif ($camera['megapixels'] <= 26) $scores['low_light'] += 4;
    else $scores['low_light'] += 2;
    if ($camera['name']==='EOS R6 Mark II' || $camera['name']==='EOS R6') $scores['low_light'] += 6;
    // 望遠
    $scores['telephoto'] = 0;
    if ($camera['name']==='EOS R7' || $camera['name']==='EOS 90D') $scores['telephoto']=30;
    elseif ($camera['sensor']==='APS-C') $scores['telephoto']=21;
    else $scores['telephoto']=15;
    // 動画
    $scores['video'] = 0;
    if ($camera['name']==='EOS R6 Mark II' || $camera['name']==='EOS R8' || $camera['name']==='EOS R7') $scores['video']=21;
    elseif ($camera['name']==='EOS R5') $scores['video']=21;
    elseif ($camera['name']==='EOS R3') $scores['video']=21;
    elseif ($camera['name']==='EOS R6') $scores['video']=18;
    elseif ($camera['name']==='EOS R10' || $camera['name']==='EOS RP') $scores['video']=16;
    elseif ($camera['name']==='EOS R50') $scores['video']=15;
    elseif ($camera['name']==='EOS 90D' || $camera['name']==='EOS 5D Mark IV') $scores['video']=14;
    elseif ($camera['name']==='EOS R100') $scores['video']=10;
    elseif ($camera['name']==='EOS Kiss X10') $scores['video']=9;
    elseif ($camera['name']==='EOS 80D') $scores['video']=10;
    elseif ($camera['name']==='EOS 7D Mark II') $scores['video']=8;
    elseif ($camera['name']==='EOS 6D Mark II') $scores['video']=10;
    elseif ($camera['name']==='EOS Kiss X90') $scores['video']=8;
    elseif ($camera['name']==='EOS 70D') $scores['video']=7;
    // 追加モデル分
    elseif ($camera['name']==='EOS R') $scores['video']=16;
    elseif ($camera['name']==='EOS Kiss X7') $scores['video']=7;
    elseif ($camera['name']==='EOS Kiss X8i') $scores['video']=8;
    elseif ($camera['name']==='EOS Kiss X9') $scores['video']=9;
    elseif ($camera['name']==='EOS Kiss X9i') $scores['video']=10;
    elseif ($camera['name']==='EOS Kiss X10i') $scores['video']=12;
    elseif ($camera['name']==='EOS 60D') $scores['video']=7;
    elseif ($camera['name']==='EOS 8000D') $scores['video']=8;
    elseif ($camera['name']==='EOS 9000D') $scores['video']=10;
    elseif ($camera['name']==='EOS 7D') $scores['video']=7;
    elseif ($camera['name']==='EOS 6D') $scores['video']=7;
    elseif ($camera['name']==='EOS 5D Mark III') $scores['video']=8;
    elseif ($camera['name']==='EOS M200') $scores['video']=11;
    elseif ($camera['name']==='EOS Kiss M') $scores['video']=11;
    elseif ($camera['name']==='EOS Kiss M2') $scores['video']=12;
    elseif ($camera['name']==='EOS M6 Mark II') $scores['video']=15;
    // 新モデル分
    elseif ($camera['name']==='EOS R5 Mark II') $scores['video']=21;
    elseif ($camera['name']==='EOS R6 Mark III') $scores['video']=21;
    elseif ($camera['name']==='EOS R8 Mark II') $scores['video']=21;
    elseif ($camera['name']==='EOS R1') $scores['video']=21;
    // 携帯性
    $scores['portability'] = 0;
    if ($camera['weight'] < 350) $scores['portability']=30;
    elseif ($camera['weight'] < 420) $scores['portability']=25;
    elseif ($camera['weight'] < 500) $scores['portability']=20;
    elseif ($camera['weight'] < 600) $scores['portability']=14;
    else $scores['portability']=8;
    // 操作性
    $scores['operability'] = 0;
    if ($camera['name']==='EOS R7' || $camera['name']==='EOS 90D' || $camera['name']==='EOS 7D Mark II' || $camera['name']==='EOS 5D Mark IV') $scores['operability']=19;
    elseif ($camera['name']==='EOS R5') $scores['operability']=19;
    elseif ($camera['name']==='EOS R3') $scores['operability']=19;
    elseif ($camera['name']==='EOS R6 Mark II' || $camera['name']==='EOS R6' || $camera['name']==='EOS R8' || $camera['name']==='EOS 6D Mark II' || $camera['name']==='EOS 80D' || $camera['name']==='EOS 70D') $scores['operability']=15;
    elseif ($camera['name']==='EOS R10' || $camera['name']==='EOS RP') $scores['operability']=13;
    elseif ($camera['name']==='EOS R50' || $camera['name']==='EOS Kiss X10' || $camera['name']==='EOS R100' || $camera['name']==='EOS Kiss X90') $scores['operability']=10;
    // 追加モデル分
    elseif ($camera['name']==='EOS R') $scores['operability']=15;
    elseif ($camera['name']==='EOS Kiss X7') $scores['operability']=8;
    elseif ($camera['name']==='EOS Kiss X8i') $scores['operability']=9;
    elseif ($camera['name']==='EOS Kiss X9') $scores['operability']=9;
    elseif ($camera['name']==='EOS Kiss X9i') $scores['operability']=11;
    elseif ($camera['name']==='EOS Kiss X10i') $scores['operability']=12;
    elseif ($camera['name']==='EOS 60D') $scores['operability']=14;
    elseif ($camera['name']==='EOS 8000D') $scores['operability']=11;
    elseif ($camera['name']==='EOS 9000D') $scores['operability']=13;
    elseif ($camera['name']==='EOS 7D') $scores['operability']=18;
    elseif ($camera['name']==='EOS 6D') $scores['operability']=15;
    elseif ($camera['name']==='EOS 5D Mark III') $scores['operability']=19;
    elseif ($camera['name']==='EOS M200') $scores['operability']=8;
    elseif ($camera['name']==='EOS Kiss M') $scores['operability']=9;
    elseif ($camera['name']==='EOS Kiss M2') $scores['operability']=9;
    elseif ($camera['name']==='EOS M6 Mark II') $scores['operability']=13;
    // 新モデル分
    elseif ($camera['name']==='EOS R5 Mark II') $scores['operability']=19;
    elseif ($camera['name']==='EOS R6 Mark III') $scores['operability']=19;
    elseif ($camera['name']==='EOS R8 Mark II') $scores['operability']=16;
    elseif ($camera['name']==='EOS R1') $scores['operability']=19;
    // 信頼性
    $scores['reliability'] = 0;
    if ($camera['name']==='EOS 5D Mark IV' || $camera['name']==='EOS 7D Mark II') $scores['reliability']=9;
    elseif ($camera['name']==='EOS R5') $scores['reliability']=9;
    elseif ($camera['name']==='EOS R3') $scores['reliability']=9;
    elseif ($camera['name']==='EOS R6 Mark II' || $camera['name']==='EOS R6' || $camera['name']==='EOS 90D' || $camera['name']==='EOS 6D Mark II') $scores['reliability']=7;
    elseif ($camera['name']==='EOS R7' || $camera['name']==='EOS R8' || $camera['name']==='EOS 80D' || $camera['name']==='EOS 70D') $scores['reliability']=6;
    elseif ($camera['name']==='EOS R10' || $camera['name']==='EOS RP' || $camera['name']==='EOS Kiss X10') $scores['reliability']=5;
    elseif ($camera['name']==='EOS R50' || $camera['name']==='EOS R100' || $camera['name']==='EOS Kiss X90') $scores['reliability']=4;
    // 追加モデル分
    elseif ($camera['name']==='EOS R') $scores['reliability']=6;
    elseif ($camera['name']==='EOS Kiss X7') $scores['reliability']=4;
    elseif ($camera['name']==='EOS Kiss X8i') $scores['reliability']=4;
    elseif ($camera['name']==='EOS Kiss X9') $scores['reliability']=4;
    elseif ($camera['name']==='EOS Kiss X9i') $scores['reliability']=5;
    elseif ($camera['name']==='EOS Kiss X10i') $scores['reliability']=5;
    elseif ($camera['name']==='EOS 60D') $scores['reliability']=6;
    elseif ($camera['name']==='EOS 8000D') $scores['reliability']=4;
    elseif ($camera['name']==='EOS 9000D') $scores['reliability']=5;
    elseif ($camera['name']==='EOS 7D') $scores['reliability']=8;
    elseif ($camera['name']==='EOS 6D') $scores['reliability']=7;
    elseif ($camera['name']==='EOS 5D Mark III') $scores['reliability']=9;
    elseif ($camera['name']==='EOS M200') $scores['reliability']=4;
    elseif ($camera['name']==='EOS Kiss M') $scores['reliability']=4;
    elseif ($camera['name']==='EOS Kiss M2') $scores['reliability']=4;
    elseif ($camera['name']==='EOS M6 Mark II') $scores['reliability']=5;
    // 新モデル分
    elseif ($camera['name']==='EOS R5 Mark II') $scores['reliability']=9;
    elseif ($camera['name']==='EOS R6 Mark III') $scores['reliability']=8;
    elseif ($camera['name']==='EOS R8 Mark II') $scores['reliability']=7;
    elseif ($camera['name']==='EOS R1') $scores['reliability']=9;
    return $scores;
}

// 正規化最大値
$need_max = [
    'portrait'=>18, 'action'=>24, 'low_light'=>30, 'telephoto'=>30, 'resolution'=>30,
    'video'=>21, 'portability'=>30, 'operability'=>19, 'reliability'=>9
];

// 診断ニーズ点数
$need_points = calc_needs($answers, $need_keys);

// 購入条件
// 購入条件
$condition = isset($answers['condition']) ? $answers['condition'] : 'used_ok';
if (isset($answers['budget']) && $answers['budget'] === 'no_limit') {
    $budget = 0;
} elseif (isset($answers['budget'])) {
    $budget = intval($answers['budget']);
} else {
    $budget = 0;
}
$new_only = ($condition === 'new_only');
$existing_lens = isset($answers['existing_lens']) ? (array)$answers['existing_lens'] : [];

// カメラごとの診断スコア
$results = [];
foreach ($cameras as $cam) {
    // 新品のみ希望で中古専売は除外
    if ($new_only && !$cam['new_available']) continue;
    // 価格選択ロジック
    $ref_price = null;
    $price_type = '';
    if ($condition === 'new_only') {
        if ($cam['new_available']) {
            $ref_price = $cam['new_price'];
            $price_type = '新品参考価格';
        } else {
            // 除外済み
            continue;
        }
    } elseif ($condition === 'prefer_new') {
        if ($cam['new_available']) {
            $ref_price = $cam['new_price'];
            $price_type = '新品参考価格';
        } elseif ($cam['used_available']) {
            $ref_price = $cam['used_price'];
            $price_type = '中古参考価格';
        }
    } elseif ($condition === 'used_ok' || $condition === 'no_preference') {
        if ($cam['used_available'] && $cam['new_available']) {
            // 両方ある場合は安い方
            if ($cam['used_price'] <= $cam['new_price']) {
                $ref_price = $cam['used_price'];
                $price_type = '中古参考価格';
            } else {
                $ref_price = $cam['new_price'];
                $price_type = '新品参考価格';
            }
        } elseif ($cam['used_available']) {
            $ref_price = $cam['used_price'];
            $price_type = '中古参考価格';
        } elseif ($cam['new_available']) {
            $ref_price = $cam['new_price'];
            $price_type = '新品参考価格';
        }
    } elseif ($condition === 'prefer_used') {
        if ($cam['used_available']) {
            $ref_price = $cam['used_price'];
            $price_type = '中古参考価格';
        } elseif ($cam['new_available']) {
            $ref_price = $cam['new_price'];
            $price_type = '新品参考価格';
        }
    }
    // 性能スコア
    $perf = calc_camera_scores($cam);
    // 撮影適合度
    $shoot_score = 0;
    $need_total = 0;
    foreach ($need_keys as $k) $need_total += $need_points[$k];
    foreach ($need_keys as $k) {
        $shoot_score += ($need_total>0 ? $need_points[$k]/$need_total : 0) * ($need_max[$k]>0 ? $perf[$k]/$need_max[$k] : 0);
    }
    $shoot_score = $shoot_score * 100;
    // マッチ度
    $score = 0;
    foreach ($need_keys as $k) $score += $need_points[$k] * ($need_max[$k]>0 ? $perf[$k]/$need_max[$k] : 0);
    // 価格ペナルティ
    $budget_penalty = 0;
    if ($budget > 0 && $ref_price !== null && $ref_price > $budget) {
        $budget_penalty = min(35, round(($ref_price-$budget)/$budget*35));
    }
    // 条件ペナルティ（prefer_newで新品なしのみ8点減点）
    $condition_penalty = 0;
    if ($condition === 'prefer_new' && !$cam['new_available']) $condition_penalty = 8;
    // レンズ資産
    $lens_bonus = 0;
    foreach ($existing_lens as $l) {
        if ($l === 'rf' && $cam['mount'] === 'RF') $lens_bonus += 5;
        if ($l === 'ef_efs' && ($cam['mount'] === 'EF' || $cam['mount'] === 'EF-S')) $lens_bonus += 5;
    }
    // 合計
    $final = $score - $budget_penalty - $condition_penalty + $lens_bonus;
    $final = max(0, min(100, round($final)));
    $results[] = [
        'camera'=>$cam,
        'perf'=>$perf,
        'shoot_score'=>round($shoot_score),
        'final'=>$final,
        'budget_penalty'=>$budget_penalty,
        'condition_penalty'=>$condition_penalty,
        'lens_bonus'=>$lens_bonus,
        'ref_price'=>$ref_price,
        'price_type'=>$price_type,
    ];
}
// 降順ソート
usort($results, function($a,$b){ return $b['final'] <=> $a['final']; });
$top3 = array_slice($results, 0, 3);

function format_price($p) {
    if ($p===null) return '―';
    return number_format($p).'円';
}
function is_discontinued($cam) {
    return !$cam['new_available'];
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>診断結果 | Canonカメラ診断</title>
    <style>
        :root {
            --bg: #f1f1ef;
            --surface: #ffffff;
            --text: #111111;
            --muted: #6f6f6f;
            --line: #dededb;
            --accent: #d71920;
            --soft-red: #fbf1f1;
            --shadow: 0 22px 65px rgba(0, 0, 0, 0.08);
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            background:
                radial-gradient(circle at 50% -180px, #ffffff 0, #f6f6f4 34%, transparent 58%),
                var(--bg);
            color: var(--text);
            font-family: -apple-system, BlinkMacSystemFont, "Helvetica Neue", "Hiragino Kaku Gothic ProN", "Yu Gothic", sans-serif;
            letter-spacing: 0.01em;
        }

        main {
            width: min(960px, calc(100% - 32px));
            margin: 0 auto;
            padding: 72px 0 96px;
        }

        .brand {
            margin: 0 0 10px;
            font-size: clamp(2.15rem, 6vw, 3.75rem);
            line-height: 1;
            letter-spacing: -0.045em;
            font-weight: 800;
        }

        .brand-red { color: var(--accent); }

        .lead {
            margin: 0 0 38px;
            color: var(--muted);
            font-size: 1.02rem;
            letter-spacing: 0.04em;
        }

        .result-shell {
            position: relative;
            padding: 38px;
            background: rgba(255,255,255,0.96);
            border: 1px solid var(--line);
            border-top: 5px solid #111111;
            border-radius: 5px;
            box-shadow: var(--shadow);
            overflow: hidden;
        }

        .result-shell h2 {
            position: relative;
            z-index: 1;
            margin: 0 0 24px;
            font-size: 1.45rem;
            letter-spacing: -0.02em;
        }

        .notice {
            margin: 0;
            line-height: 1.8;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-top: 28px;
            min-height: 46px;
            padding: 0 22px;
            background: #111111;
            color: #ffffff;
            text-decoration: none;
            border-radius: 3px;
            font-weight: 700;
            letter-spacing: 0.04em;
            transition: transform .18s ease, background .18s ease, box-shadow .18s ease;
        }

        .back-link:hover {
            background: var(--accent);
            transform: translateY(-1px);
            box-shadow: 0 8px 20px rgba(215, 25, 32, 0.18);
        }

        .result-list {
            display: flex;
            flex-direction: column;
            gap: 18px;
            margin-bottom: 32px;
        }

        .camera-card {
            position: relative;
            width: 100%;
            padding: 27px 29px 24px;
            background: #ffffff;
            border: 1px solid var(--line);
            border-radius: 4px;
            box-shadow: 0 6px 24px rgba(0,0,0,0.055);
            overflow: hidden;
            transition: transform .18s ease, box-shadow .18s ease, border-color .18s ease;
        }

        .camera-card::before {
            content: "";
            position: absolute;
            inset: 0 auto 0 0;
            width: 4px;
            background: #111111;
        }

        .camera-card:first-child {
            border-color: #cfcfcb;
            box-shadow: 0 10px 32px rgba(0,0,0,0.075);
        }

        .camera-card:first-child::before {
            background: var(--accent);
        }

        .camera-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 13px 34px rgba(0,0,0,0.09);
        }

        .rank-line {
            display: flex;
            align-items: baseline;
            gap: 5px;
            margin-bottom: 5px;
            color: var(--muted);
            font-size: .86rem;
            font-weight: 700;
            letter-spacing: .1em;
        }

        .rank-number {
            color: var(--accent);
            font-size: 1.65rem;
            line-height: 1;
            letter-spacing: -0.04em;
        }

        .camera-name {
            margin-bottom: 9px;
            font-size: clamp(1.35rem, 3vw, 1.62rem);
            line-height: 1.2;
            font-weight: 800;
            letter-spacing: -0.025em;
        }

        .match-row {
            display: flex;
            align-items: baseline;
            flex-wrap: wrap;
            gap: 4px 7px;
            margin-bottom: 14px;
        }

        .match-main {
            font-size: 1.65rem;
            line-height: 1;
            font-weight: 800;
            letter-spacing: -0.04em;
        }

        .match-sub {
            color: var(--accent);
            font-weight: 800;
        }

        .spec-line {
            display: flex;
            flex-wrap: wrap;
            gap: 7px;
            margin-bottom: 14px;
        }

        .spec-chip {
            display: inline-block;
            padding: 5px 9px;
            background: #f5f5f3;
            border: 1px solid #e8e8e5;
            border-radius: 2px;
            color: #333;
            font-size: .89rem;
        }

        .price-row {
            display: flex;
            align-items: baseline;
            flex-wrap: wrap;
            gap: 5px 9px;
            padding-top: 13px;
            border-top: 1px solid #eeeeeb;
            margin-bottom: 10px;
        }

        .price-value {
            font-size: 1.22rem;
            font-weight: 800;
            letter-spacing: -0.02em;
        }

        .official-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 38px;
            padding: 0 16px;
            color: #fff;
            background: #111;
            border-radius: 2px;
            text-decoration: none;
            font-size: .91rem;
            font-weight: 700;
            transition: background .18s ease, transform .18s ease;
        }

        .official-link:hover {
            background: var(--accent);
            transform: translateY(-1px);
        }

        details summary {
            transition: color .18s ease;
        }

        details summary:hover {
            color: #111 !important;
        }

        @media (max-width: 600px) {
            main { padding: 42px 0 70px; }
            .lead { margin-bottom: 28px; }
            .result-shell { padding: 27px 18px 24px; }
            .camera-card { padding: 23px 19px 20px 22px; }
            .match-main { font-size: 1.45rem; }
        }
    </style>
</head>
<body>
<main>
    <h1 class="brand"><span class="brand-red">Canon</span> カメラ診断</h1>
    <p class="lead">あなたに合う一台を診断しました。</p>

    <section class="result-shell">
        <h2>診断結果 TOP3</h2>
<?php if ($purpose_error): ?>
        <div style="color:var(--accent);font-weight:bold;font-size:1.13em;padding:16px 0">
            Q2「撮りたいもの・用途」の選択に不備があります。<br>
            <span style="font-size:0.96em;color:var(--muted);">3つ全て選択し、重複しないようにしてください。</span>
        </div>
        <a class="back-link" href="index.php">回答を修正する</a>
<?php else: ?>
        <div class="result-list">
<?php foreach ($top3 as $i => $r):
    $cam = $r['camera']; $perf = $r['perf'];
    $rank = $i+1;
    $discontinued = is_discontinued($cam);
    $over_budget = ($budget>0 && $r['ref_price']!==null && $r['ref_price']>$budget);
?>
            <div class="camera-card">
                <div class="rank-line"><span class="rank-number"><?php echo $rank; ?></span><span>位</span></div>
                <div class="camera-name">
                    <?php echo htmlspecialchars($cam['name']); ?>
                    <?php if ($discontinued): ?><span style="font-size:0.82em;color:var(--muted);font-weight:normal;margin-left:7px;">生産完了品</span><?php endif; ?>
                    <?php if ($discontinued && $cam['mount'] === 'EF-M'): ?>
                        <span style="font-size:0.81em;color:var(--muted);font-weight:normal;margin-left:5px;">EF-Mシステム</span>
                    <?php endif; ?>
                </div>
                <div class="match-row">
                    <span class="match-main"><?php echo $r['final']; ?>%</span>
                    <span style="color:var(--muted);font-size:0.97em;">マッチ度</span>
                    <span class="match-sub"><?php echo $r['shoot_score']; ?>%</span>
                    <span style="color:var(--muted);font-size:0.9em;">撮影適合度</span>
                </div>
                <div class="spec-line">
                    <span class="spec-chip"><?php echo htmlspecialchars($cam['sensor']); ?></span>
                    <span class="spec-chip"><?php echo $cam['megapixels']; ?>MP</span>
                    <span class="spec-chip"><?php echo $cam['weight']; ?>g</span>
                    <span class="spec-chip"><?php echo htmlspecialchars($cam['mount']); ?>マウント</span>
                </div>
                <div class="price-row">
                    <span><?php echo $r['price_type']; ?></span>
                    <span class="price-value"><?php echo format_price($r['ref_price']); ?></span>
                    <span style="color:var(--muted);font-size:0.93em;">(調査:<?php echo $cam['price_checked_at']; ?>)</span>
                </div>
                <?php if ($over_budget): ?>
                <div style="color:var(--accent);font-size:0.98em;margin-bottom:7px;">※ご予算を超えています</div>
                <?php endif; ?>
                <?php if ($cam['mount'] === 'EF-M'): ?>
                <p style="color:var(--muted);font-size:0.93em;margin-bottom:7px;margin-top:0.5em;">
                    ※ EF-Mマウントは生産終了システムです。小型・中古価格は魅力ですが、今後レンズを増やしたい場合はRF系も比較してください。
                </p>
                <?php endif; ?>
                <details style="margin-bottom:10px;">
                    <summary style="cursor:pointer;color:var(--accent);font-size:0.97em;">性能スコアを見る</summary>
                    <div style="font-size:0.97em;line-height:1.7;padding-top:5px;">
                        <div>ポートレート: <?php echo $perf['portrait']; ?>/18</div>
                        <div>動体: <?php echo $perf['action']; ?>/24</div>
                        <div>暗所: <?php echo $perf['low_light']; ?>/30</div>
                        <div>望遠: <?php echo $perf['telephoto']; ?>/30</div>
                        <div>解像度: <?php echo $perf['resolution']; ?>/30</div>
                        <div>動画: <?php echo $perf['video']; ?>/21</div>
                        <div>携帯性: <?php echo $perf['portability']; ?>/30</div>
                        <div>操作性: <?php echo $perf['operability']; ?>/19</div>
                        <div>信頼性: <?php echo $perf['reliability']; ?>/9</div>
                    </div>
                </details>
                <div style="margin-bottom:7px;">
                    <a href="<?php echo htmlspecialchars($cam['canon_url']); ?>"
                        target="_blank" rel="noopener"
                        class="official-link">
                        公式サイトで詳しく見る
                    </a>
                </div>
            </div>
<?php endforeach; ?>
        </div>
        <details style="margin-bottom:18px;">
            <summary style="cursor:pointer;color:var(--accent);font-size:1.01em;">診断で重視されたポイントを見る</summary>
            <div style="font-size:0.99em;line-height:1.7;padding:5px 0 0 5px;">
<?php foreach ($need_keys as $k): ?>
                <span style="display:inline-block;width:110px;"><?php
                    $labels = ['portrait'=>'ポートレート','action'=>'動体','low_light'=>'暗所','telephoto'=>'望遠','resolution'=>'解像度','video'=>'動画','portability'=>'携帯性','operability'=>'操作性','reliability'=>'信頼性'];
                    echo $labels[$k]; ?>: <b><?php echo $need_points[$k]; ?></b></span>
<?php endforeach; ?>
            </div>
        </details>
        <a class="back-link" href="index.php">もう一度診断する</a>
<?php endif; ?>
    </section>
</main>
</body>
</html>