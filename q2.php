<?php
include 'q2_sqlLib.php';

// POST로 전송된 아이디와 비밀번호 가져오기
$input_id = $_POST["id"];
$input_password = $_POST["password"];

// SQL 인젝션 방어를 위해 mysqli_real_escape_string 사용
$input_id = mysqli_real_escape_string($conn, $input_id);
$input_password = mysqli_real_escape_string($conn, $input_password);

// Prepared Statement를 사용한 SQL 인젝션 방어
$stmt = $conn->prepare("SELECT * FROM member1 WHERE id = ? AND password = ?");
$stmt->bind_param("ss", $input_id, $input_password);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    echo  "로그인 되었습니다.";
} else {
    echo "아이디 또는 비밀번호가 잘못되었습니다.";
}

// Statement 닫기
$stmt->close();

// 데이터베이스 연결 종료
mysqli_close($conn);
