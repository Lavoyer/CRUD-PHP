<!-- Rafael Lavoyer RA:22208760 -->

<?php
    # comando para conexão com o banco de dados
    include 'a-conexao.php';

    # recuperando as informações do formulário      
    session_start();      
    $email = $_REQUEST['email'];
    $senha = md5($_REQUEST['senha']);

    $sql = " SELECT * FROM usuario 
             WHERE email =:email and
                   senha =:senha ";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha', $senha);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_OBJ);
    
    if($result){
        header('Location:crud.php');
        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $senha;
        $_SESSION['nome'] = $result->nome;
    } else {
        unset ($_SESSION['email']);
        unset ($_SESSION['senha']);
        unset ($_SESSION['nome']);
        header('Location:index.php?mensagem=Usuário ou senha inválidos');
        print($result);
    }



?>