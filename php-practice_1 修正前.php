<?php
// Q1 変数と文字列
$name = '鈴木';
echo "私の名前は「 $name 」です。";

echo  "\n\n";

// Q2 四則演算
$num = 5 * 4;

echo $num . "\n";
echo $num / 2;

echo  "\n\n";

// Q3 日付操作
$date;
echo '現在時刻は、';
echo date('Y年m月d日 H時i分s秒');
echo 'です。';

echo  "\n\n";

// Q4 条件分岐-1 if文
$device = 'mac';
if ($device === 'mac' || $device === 'windows') {
    echo ('使用デバイスは' . $device . 'です');
} else {
    echo ('どちらでもありません。');
}

echo  "\n\n";

// Q5 条件分岐-2 三項演算子
$age = 23;
echo ($age < 18) ? '未成年です。' : '成人です。';

echo  "\n\n";

// Q6 配列
$kanto = ['東京都', '神奈川県', '栃木県', '千葉県', '埼玉県', '群馬県', '茨城県'];

echo ("$kanto[2]と$kanto[3]は関東地方の都道府県です。");

echo  "\n\n";

// Q7 連想配列-1
$japan = [
    '東京都' => '新宿区',
    '神奈川県' => '横浜市',
    '千葉県' => '千葉市',
    '埼玉県' => 'さいたま市',
    '栃木県' => '宇都宮市',
    '群馬県' => '前橋市',
    '茨城県' => '水戸市'
];

foreach ($japan as $value) {
    echo $value . "\n";
}

echo  "\n\n";

// Q8 連想配列-2
foreach ($japan as $todoufuken => $city) {
    if ($todoufuken === '埼玉県') {
        echo ($todoufuken . 'の県庁所在地は' . $city . 'です');
    }
}

echo  "\n\n";

// Q9 連想配列-3
$japan += [
    '愛知県' => '名古屋市',
    '大阪府' => '大阪府'
];

foreach ($japan as $todoufuken => $city) {
    if (in_array($todoufuken, $kanto)) {
        echo ($todoufuken . 'の県庁所在地は' . $city . 'です。' . "\n");
    } else {
        echo ($todoufuken . 'は関東地方ではありません。' . "\n");
    }
}

echo  "\n\n";

// Q10 関数-1
function hello($name)
{
    return $name .  "さん、こんにちは。";
}

echo hello("金谷") . "\n";
echo hello("安藤");

echo  "\n\n";

// Q11 関数-2
function calcTaxInPrice($price, $tax = 0.1)
{
    $included = $price + $price * $tax;
    return floor($included);
}

$price = 1000;
$included = calcTaxInPrice($price);

echo "$price 円の商品の税込価格は $included 円です。";

echo  "\n\n";

// Q12 関数とif文
function distinguishNum($number)
{
    if ($number % 2 === 0) {
        return "$number は偶数です。";
    } else {
        return "$number は奇数です。";
    }
}

echo distinguishNum(13);

echo  "\n\n";

// Q13 関数とswitch文
function evaluateGrade($score)
{
    switch ($score) {
        case 'A':
        case 'B':
            echo '合格です。';
            break;

        case 'C':
            echo '合格ですが追加課題があります。';
            break;

        case 'D':
            echo '不合格です。';
            break;

        default:
            echo '判定不明です。講師に問い合わせてください。';
            break;
    }
}

echo evaluateGrade('A') . "\n";
echo evaluateGrade('aknxk');
