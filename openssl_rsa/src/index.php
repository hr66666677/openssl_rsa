<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pubkey = $_POST['pubkey'];
    $flag = getenv('GZCTF_FLAG');
    
    if (empty($pubkey) || empty($flag)) {
        die("Error: Missing public key or flag");
    }
    
    $publicKey = openssl_pkey_get_public($pubkey);
    if (!$publicKey) {
        die("Error: Invalid public key format");
    }
    
    $encrypted = '';
    if (openssl_public_encrypt($flag, $encrypted, $publicKey, OPENSSL_PKCS1_OAEP_PADDING)) {
        echo "Encrypted Flag (hex): " . bin2hex($encrypted);
    } else {
        die("Encryption failed: " . openssl_error_string());
    }
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>RSA Encryptor</title>
    <meta charset="UTF-8">
</head>
<body>
    <h1>RSA Public Key Encryptor</h1>
    <form method="post">
        <textarea name="pubkey" placeholder="Paste RSA public key (PEM format)" style="width:600px;height:300px;"></textarea><br>
        <button type="submit">Encrypt Flag</button>
    </form>
</body>
</html>