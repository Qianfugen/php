<?php
$config = parse_ini_file(realpath(dirname(__FILE__) . '/config/datasource.ini'));
$host = $config["host"];
$username = $config["username"];
$password = $config["password"];
$dbname = $config["dbname"];

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // 设置 PDO 错误模式，用于抛出异常
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    // 预处理 SQL 并绑定参数
    $stmt = $conn->prepare("INSERT INTO student (name,phone,email,birth,password,interest,sex,eva) 
    VALUES (:name,:phone,:email,:birth,:password,:interest,:sex,:eva)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':birth', $birth);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':interest', $interest);
    $stmt->bindParam(':sex', $sex);
    $stmt->bindParam(':eva', $eva);

    // 插入行
    $name = $_POST["name"];
    $phone=$_POST["phone"];
    $email=$_POST["email"];
    $birth=$_POST["birth"];
    $password=$_POST["password"];
    $interest=$_POST["interest"];
    $sex=$_POST["sex"];
    $eva = $_POST["eva"];

//    $name = "hello";
//    $phone=12345678;
//    $email="ajdfaj@daj";
////    $birth=$_POST["birth"];
//    $password="12dad";
//    $interest="like";
//    $sex="kdj";
//    $eva = "ajodfjoaij";

    $stmt->execute();
    echo "添加学生成功";
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>