<?php
$config=parse_ini_file(dirname(__FILE__)."/config/datasource.ini");
$host=$config["host"];
$username=$config["username"];
$password=$config["password"];
$dbname=$config["dbname"];

// 创建连接
$conn = new mysqli($host, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

$sql = "SELECT * FROM student";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // 输出数据
    $student=null;
    $studentList=[];
    while($row = $result->fetch_assoc()) {
        $student=array(
            "id"=>$row["id"],
            "name"=>$row["name"],
            "phone"=>$row["phone"],
            "email"=>$row["email"],
            "birth"=>$row["birth"],
            "password"=>$row["password"],
            "interest"=>$row["interest"],
            "sex"=>$row["sex"],
            "eva"=>$row["eva"]
        );
        array_push($studentList,$student);
    }
//    print_r($studentList);
    $result=array(
        "code"=>0,
        "msg"=>"",
        "count"=>1000,
        "data"=>$studentList
    );

    $results=json_encode($result);
    echo $results;
} else {
    echo "0 结果";
}
$conn->close();
?>