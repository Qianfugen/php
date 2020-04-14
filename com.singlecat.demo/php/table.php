<?php
$config=parse_ini_file(dirname(__FILE__)."/config/datasource.ini");
$host=$config["host"];
$username=$config["username"];
$password=$config["password"];
$dbname=$config["dbname"];

try{
    $conn=new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
    // 设置 PDO 错误模式，用于抛出异常
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 使用 sql 创建数据表
    $sql = "CREATE TABLE student (
    `id` INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    `name` VARCHAR(30), 
    `phone` INT(11),
    `email` VARCHAR(30),
    `birth` DATE,
    `password` VARCHAR(30),
    `interest` VARCHAR(10),
    `sex` VARCHAR(10),
    `eva` VARCHAR(50)
    )  ENGINE=InnoDB AUTO_INCREMENT=1000 DEFAULT CHARSET=utf8";

    // 使用 exec() ，没有结果返回
    $conn->exec($sql);
    echo "数据表 student 创建成功";
}catch (PDOException $e){
    $e->getMessage();
}
?>