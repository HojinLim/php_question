    <?php

    // 퀵소트 알고리즘을 사용하여 배열을 정렬하는 함수
    function quicksort(&$arr, $left, $right)
    {
        if ($left < $right) {
            // 파티션 함수를 호출하여 피벗의 위치를 찾음
            $pivotIndex = partition($arr, $left, $right);

            // 피벗을 기준으로 왼쪽 부분 배열과 오른쪽 부분 배열을 각각 정렬
            quicksort($arr, $left, $pivotIndex - 1);
            quicksort($arr, $pivotIndex + 1, $right);
        }
    }

    // 배열을 피벗을 기준으로 분할하는 함수
    function partition(&$arr, $left, $right)
    {
        // 피벗을 배열에서 선택 (여기에서는 가장 오른쪽 원소를 피벗으로 선택)
        $pivot = $arr[$right];

        // 피벗보다 작은 원소를 왼쪽에, 큰 원소를 오른쪽에 배치
        $i = $left - 1; // 작은 원소들을 추적하는 인덱스

        for ($j = $left; $j < $right; $j++) {
            if ($arr[$j] < $pivot) {
                $i++;
                // 현재 원소($arr[$j])와 작은 원소 위치를 교환
                list($arr[$i], $arr[$j]) = array($arr[$j], $arr[$i]);
            }
        }

        // 피벗과 작은 원소들의 구분을 위해 피벗 위치를 변경
        list($arr[$i + 1], $arr[$right]) = array($arr[$right], $arr[$i + 1]);

        // 피벗의 최종 위치를 반환
        return $i + 1;
    }

    // 입력 받기
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $size = rand(1, 1000); // 1부터 1000까지의 랜덤 배열 크기
        $arr = array();

        // 랜덤 크기의 배열 생성
        for ($i = 0; $i < $size; $i++) {
            $arr[] = rand(-1000, $size - 1); // 랜덤 정수 원소 
        }

        // 랜덤 배열 출력
        echo "랜덤 배열(크기: $size):\n <br>";
        foreach ($arr as $value) {
            echo $value . "\n <br>";
        }

        // 퀵소트 함수 호출하여 배열 정렬
        quicksort($arr, 0, $size - 1);

        // 정렬된 결과 출력
        echo "\n정렬된 배열 <br>\n[";
        foreach ($arr as $value) {
            echo $value . "\n ";
        }
        echo "]";
    }
    ?>



    </body>

    </html>