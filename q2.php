<?php
include 'sqlLib.php';

// POST로 전송된 아이디와 비밀번호 가져오기
$input_id = $_POST["id"];
$input_password = $_POST["password"];

// SQL 인젝션 방어를 위해 mysqli_real_escape_string 사용
$input_id = mysqli_real_escape_string($conn, $input_id);

// Prepared Statement를 사용하여 SQL 인젝션 방어
$stmt = $conn->prepare("SELECT id, password FROM member1 WHERE id = ?");
$stmt->bind_param("s", $input_id);
$stmt->execute();
$stmt->bind_result($db_id, $db_password);

// 데이터 가져오기
$stmt->fetch();

// 사용자 인증
if ($db_id && password_verify($input_password, $db_password)) {
    echo "로그인 되었습니다.";
} else {
    echo "아이디 또는 비밀번호가 잘못되었습니다.";
}

// Statement 닫기
$stmt->close();

// 데이터베이스 연결 종료
$conn->close();