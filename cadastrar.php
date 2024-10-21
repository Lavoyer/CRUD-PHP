<!-- Rafael Lavoyer RA:22208760 -->
<?php
    # comando para conexão com o banco de dados
    include 'a-conexao.php';

    # recuperando as informações do formulário   
    $nome = $_REQUEST['nome'];         
    $email = $_REQUEST['email'];
    $senha = md5($_REQUEST['senha']);

    $sql = "INSERT INTO usuario (nome, email, senha) VALUES (:nome, :email, :senha)";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha', $senha);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_OBJ);
    header('Location:index.php?mensagem=Conta criada com sucesso!');
 
?>