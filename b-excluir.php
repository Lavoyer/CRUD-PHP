<!-- Rafael Lavoyer RA:22208760 -->
<?php
    # comando para conexão com o banco de dados
    include 'a-conexao.php'; 

    $id = $_REQUEST['id'];

    $sql = "DELETE FROM usuario WHERE id =:id";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    header('Location:crud.php?mensagem=Usuário excluído com sucesso!');
?>