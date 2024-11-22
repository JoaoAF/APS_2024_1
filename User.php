<?php
class User {
    private $db;
    public $id;
    public $nome;
    public $email;
    public $senha;

    public function __construct($db) {
        $this->db = $db;
    }

    // Método de autenticação para verificar e-mail e senha
    public function authenticate() {
        $query = "SELECT id, nome, senha FROM usuarios WHERE email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $this->email);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($this->id, $this->nome, $db_password);
        
        if ($stmt->fetch()) {
            // Verifica se a senha fornecida corresponde ao hash no banco de dados
            if (password_verify($this->senha, $db_password)) {
                return true;
            }
        }
        return false;
    }
}
?>
