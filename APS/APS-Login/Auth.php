<?php
class Auth {
    // Método para login
    public function login(User $user) {
        // Inicia a sessão e armazena as informações do usuário
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_name'] = $user->nome;
        $_SESSION['user_email'] = $user->email;
    }

    // Verifica se o usuário está autenticado
    public function isAuthenticated() {
        return isset($_SESSION['user_id']);
    }

    // Método para logout
    public function logout() {
        session_destroy();
    }
}
?>
