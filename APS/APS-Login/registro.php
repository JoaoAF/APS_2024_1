<?php
session_start();
include_once('Database.php');
include_once('User.php');
include_once('Auth.php');
include_once('Factory.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Usando o Singleton para a conexão com o banco de dados
    $database = Database::getInstance();
    $db = $database->getConnection();
    
    // Criando o usuário com a Factory
    $user = Factory::createUser($db);
    $user->email = $email;
    $user->senha = $senha;

    // Autenticando o usuário
    if ($user->authenticate()) {
        // Criando uma instância de Auth
        $auth = Factory::createAuth();
        $auth->login($user);
        echo "Login bem-sucedido! Bem-vindo, " . $user->nome;
    } else {
        echo "E-mail ou senha incorretos!";
    }
}
?>

<form method="POST">
    E-mail: <input type="email" name="email" required><br>
    Senha: <input type="password" name="senha" required><br>
    <button type="submit">Entrar</button>
</form>
