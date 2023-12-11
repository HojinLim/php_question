<?
// 데이터베이스 연결 설정

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "member";

$conn = new mysqli($servername, $username, $password, $dbname);

// 연결 확인
if ($conn->connect_error) {
    echo "mysql 접속중 오류가 발생했습니다. ";
    echo mysqli_connect_error();
} else {
    echo "mysql 접속 성공!";
    echo "<br/>";
}
