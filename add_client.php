<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

    if (!empty($name) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $file = 'clients.json';
        $currentData = file_exists($file) ? json_decode(file_get_contents($file), true) : [];
        
        $newClient = [
            'id' => time(),
            'name' => $name,
            'email' => $email
        ];
        
        $currentData[] = $newClient;
        file_put_contents($file, json_encode($currentData, JSON_PRETTY_PRINT));
        
        header('Location: index.html?success=1');
        exit();
    } else {
        http_response_code(400);
        echo "Erreur : Données invalides.";
    }
}