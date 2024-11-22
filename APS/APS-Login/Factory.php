<?php
class Factory {
    // Cria uma instância da classe User
    public static function createUser($db) {
        return new User($db);
    }

    // Cria uma instância da classe Auth
    public static function createAuth() {
        return new Auth();
    }
}
?>
