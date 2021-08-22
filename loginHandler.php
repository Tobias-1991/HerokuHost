<?php

session_start();
require_once 'DatabaseConnection.php';
require_once 'connectionTest.php';
if (! empty($_POST ) ) {
    if (isset( $_POST['username'] ) && isset($_POST['password' ] ) ) {
        
        $dbConnect = new DatabaseConnection();
        $stmt = new $dbConnect->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param('s', $_POST['username']);
        $stmt->execute();
        $result = $stmt->get_results();
        $user = $result->fetch_object();
        
        //check password
        if (password_verify($_POST['password'], $user->password )) {
            $_SESSION['user_id'] = $user->ID;
        }
    }
}
require_once 'index.php';