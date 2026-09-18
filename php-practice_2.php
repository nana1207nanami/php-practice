<?php

// Q1 tic-tac問題
echo "1から100までのカウントを開始します\n\n";

for ($i = 1; $i <= 100; $i++) {
    if ($i % 4 === 0 && $i % 5 === 0) {
        // 4の倍数 かつ 5の倍数（20の倍数）
        echo "tic-tac\n";
    } elseif ($i % 4 === 0) {
        // 4の倍数
        echo "tic\n";
    } elseif ($i % 5 === 0) {
        // 5の倍数
        echo "tac\n";
    } else {
        echo $i . "\n";
    }
}
// Q2 多次元連想配列

$personalInfos = [
    [
        'name' => 'Aさん',
        'mail' => 'aaa@mail.com',
        'tel'  => '09011112222'
    ],
    [
        'name' => 'Bさん',
        'mail' => 'bbb@mail.com',
        'tel'  => '08033334444'
    ],
    [
        'name' => 'Cさん',
        'mail' => 'ccc@mail.com',
        'tel'  => '09055556666'
    ],
];


var_dump($personalInfos);
// 問題１
echo $personalInfos[1]['name'] . 'の電話番号は' . $personalInfos[1]['tel'] . 'です。';

echo "\n";
// 問題２
foreach ($personalInfos as $key => $info) {
    $number = $key + 1;
    echo $number . '番目の' . $info['name'] . 'のメールアドレスは' . $info['mail'] .  'で、電話番号は' . $info['tel'] . 'です。';
}

echo "\n";

// 問題３
$ageList = [25, 30, 18];

foreach ($personalInfos as $key => $info) {
    $personalInfos[$key]['age'] = $ageList[$key];
}

// 確認用出力
var_dump($personalInfos);


echo "\n";


// Q3 オブジェクト-1

class Student
{
    public $studentId;
    public $studentName;

    public function __construct($id, $name)
    {
        $this->studentId = $id;
        $this->studentName = $name;
    }

    // Q4変更
    public function attend($subject)
    {
        echo $this->studentName . 'は' . $subject . 'の授業に参加しました。学籍番号：' . $this->studentId;
    }
}

$student = new Student(120, '山田');

echo "\n";

echo '学籍番号' . $student->studentId . '番の生徒は' . $student->studentName . 'です。';


echo "\n";

// Q4 オブジェクト-2
$yamada = new Student(120, '山田');
$yamada->attend('PHP');






// Q5 定義済みクラス

$date = new DateTime('2021-2-2');
echo $date->format('Y-m-d');


$start = new DateTime('1992-4-25');
$end = new DateTime();
$diff = $start->diff($end);

echo 'あの日から' . $diff->days . '日経過しました。';
