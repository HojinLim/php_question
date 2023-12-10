<?php
// 랜덤으로 나이 생성 (1부터 100까지의 난수 생성)
$age = rand(1, 100);

// 성인 여부 판별
if ($age >= 20) {
    $result = "성인";
} else {
    $result = "미성년자";
}

echo "당신은 {$age}살로 {$result}입니다.";
