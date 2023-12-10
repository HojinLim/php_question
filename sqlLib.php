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

$id = 'test';
$password = '1234';


// $query = "insert into member1(id,password) values('$id','$password')";

// $mysqli_query($conn, $query);


// $connect = new mysqli("localhost", "root", "", "company");

// if (mysqli_connect_error()) {
//     echo "mysql 접속중 오류가 발생했습니다. ";
//     echo mysqli_connect_error();
//     // die("Connection failed: " . $conn->connect_error);
// }
