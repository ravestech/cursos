<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura os dados do formulário
    $nome = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $mensagem = htmlspecialchars($_POST['message']);

    // Configurações do email
    $destinatario = "spumaiankoski@gmail.com"; // Email de destino
    $assunto = "Sobre os Cursos";
    $corpo = "Nome: $nome\n";
    $corpo .= "Email: $email\n";
    $corpo .= "Mensagem:\n$mensagem\n";

    // Cabeçalhos do email
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    if (mail($destinatario, $assunto, $corpo, $headers)) {
        // Redireciona para a página de obrigado
        header("Location: obrigado.html");
        exit();
    } else {
        // Caso ocorra um erro no envio, redireciona para a página de obrigado também (pode ser modificado para uma página de erro, se preferir)
        header("Location: obrigado.html");
        exit();
    }
} else {
    // Redireciona para a página de contato se acessar o arquivo diretamente
    header("Location: contato.html");
    exit();
}
?>
