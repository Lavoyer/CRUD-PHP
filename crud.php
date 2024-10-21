<!-- Rafael Lavoyer RA:22208760 -->

<?php
session_start();
if((!isset ($_SESSION['email']) == true) and (!isset ($_SESSION['senha']) == true))
{
  header('location:crud.php');
}

$logado = $_SESSION['nome'];
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Formulario</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            margin: 20px;
        }
    </style>
</head>

<?php 
    # comando para conexão com o banco de dados
    include 'a-conexao.php';

    # trecho responsável pela listagem total de registros
    $sql = "SELECT * FROM usuario";
    $consulta = $conexao->query($sql);

    # consulta que permitirá a realização da edição de um determinado 
    # registro
    $result = null;
    if(isset($_REQUEST['id'])){
        $id = $_REQUEST['id'];
        $sqlConsulta = " SELECT * FROM usuario WHERE id =:id";
        $stmt = $conexao->prepare($sqlConsulta);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        (PDO::FETCH_OBJ);
    }
?>

<body>
    <div class="container">
        <h1>Inserir Usuarios</h1> 
        <!-- Formulário para Inserir Novo Usuário -->
        <div class="card mb-4">
            <div class="card-header">
                Inserir Novo Usuário
            </div>
            <div class="card-body">
                <form id="form-inserir" method="post" action="c-inserir.php">
                    <input type="hidden" name="id" 
                        value="<?php echo $result != null ? $result->id : ''?>"/>
                    <div class="form-group">
                        <label for="nome">Nome:</label>
                        <input type="text" class="form-control" name="nome" 
                            value="<?php echo $result != null ? $result->nome : ''?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail:</label>
                        <input type="email" class="form-control" name="email" 
                            value="<?php echo $result != null ? $result->email : ''?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Inserir</button>
                    <button type="reset" class="btn btn-primary">Limpar</button>
                </form>
            </div>
        </div>

        <!-- Tabela de Usuários -->
        <table id="tabela-usuarios" class="table table-striped"> 
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOME</th>
                    <th>EMAIL</th>
                    <th>AÇÕES</th>
                </tr>
            </thead>
            <!-- <tfoot>
                <tr>
                    <th>ID</th>
                    <th>NOME</th>
                    <th>EMAIL</th>
                    <th>AÇÕES</th>
                </tr>
            </tfoot> -->
            <tbody>
                <?php while ($linha = $consulta->fetch(PDO::FETCH_OBJ)) { ?>
                    <tr>
                        <td><?php echo $linha->id ?></td>
                        <td><?php echo $linha->nome ?></td>
                        <td><?php echo $linha->email ?></td>
                        <td>
                            <a href="crud.php?id=<?php echo $linha->id ?>">
                                Editar
                            </a>
                            |
                            <a href="b-excluir.php?id=<?php echo $linha->id ?>">
                                Excluir
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            <tbody>
        </table>
    </div>

    <script>
        // // Array para armazenar dados da tabela
        // let usuarios = [];

        // // Função para inserir novo usuário
        // function inserirUsuario(nome, email) {
        //     const novoUsuario = {
        //         id: usuarios.length + 1,
        //         nome,
        //         email
        //     };
        //     usuarios.push(novoUsuario);
        //     atualizarTabela();
        // }

        // // Função para atualizar tabela
        // function atualizarTabela() {
        //     const corpoTabela = document.getElementById('corpo-tabela');
        //     corpoTabela.innerHTML = '';
        //     usuarios.forEach(usuario => {
        //         const linha = document.createElement('tr');
        //         linha.innerHTML = `
        //             <td>${usuario.id}</td>
        //             <td>${usuario.nome}</td>
        //             <td>${usuario.email}</td>
        //             <td>
        //                 <button class="btn btn-primary" onclick="editarUsuario(${usuario.id})">Editar</button>
        //                 <button class="btn btn-danger" onclick="deletarUsuario(${usuario.id})">Deletar</button>
        //             </td>
        //         `;
        //         corpoTabela.appendChild(linha);
        //     });
        // }

        // // Função para editar usuário
        // function editarUsuario(id) {
        //     const usuario = usuarios.find(u => u.id === id);
        //     if (usuario) {
        //         const nome = prompt('Digite o novo nome:', usuario.nome);
        //         const email = prompt('Digite o novo e-mail:', usuario.email);
        //         if (nome && email) {
        //             usuario.nome = nome;
        //             usuario.email = email;
        //             atualizarTabela();
        //         }
        //     }
        // }

        // // Função para deletar usuário
        // function deletarUsuario(id) {
        //     const indice = usuarios.findIndex(u => u.id === id);
        //     if (indice !== -1) {
        //         usuarios.splice(indice, 1);
        //         atualizarTabela();
        //     }
        // }

        // // Adicionar evento de submit ao formulário
        // document.getElementById('form-inserir').addEventListener('submit', (e) => {
        //     e.preventDefault();
        //     const nome = document.getElementById('nome').value;
        //     const email = document.getElementById('email').value;
        //     inserirUsuario(nome, email);
        //     document.getElementById('nome').value = '';
        //     document.getElementById('email').value = '';
        // });
    </script>
</body>
</html>