<?php
    if(!isset($_SESSION)) session_start();
    if(!empty($_POST) AND (empty($_POST['email']))){
        header('Location: index.php');
        exit();
    }

    include('config.php');

    $email = $_POST['email'];

    $sql = "SELECT * FROM usuarios WHERE email='{$email}'";

    $res = $conn->query($sql);

    $row = $res->fetch_object();

    if($res->num_rows > 0){
        $token = md5(uniqid(""));
      
        $sql2 = "INSERT INTO tokens_recuperacoes (idUsuario, token) VALUES ('{$row->id}' , '{$token}' )";
        
        $res2 = $conn->query($sql2);
        $link = "O(a) Sr(Sra) solicitou a redefinição de senha! Acesse o link a seguir para redefir sua senha "."http://localhost/Login/novaSenha.php?token={$token}" . " Caso O(a) Sr(Sra) não tenha solicitado, por favor ignore este email! ";
        include("email.php");
        sendEmail($link);
        
        }