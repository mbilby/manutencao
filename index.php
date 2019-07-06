<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'C:\xampp\htdocs\manutencao\mailer\src\PHPMailer.php';
require 'C:\xampp\htdocs\manutencao\mailer\src\Exception.php';
require 'C:\xampp\htdocs\manutencao\mailer\src\SMTP.php';

$comprovante = '';
    
    if (isset($_POST['email']) && !empty($_POST['email'])) {
         $email = $_POST['email'];
    
    $mail = new PHPMailer;
    $mail->setLanguage('pt-br', '/mailer/language/');

try {

    //Configuração do servidor
    
    $mail->SMTPDebug  = false; 
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->Port       = 587;
    $mail->SMTPAuth   = true;
    $mail->SMTPSecure = 'tls';
    $mail->Username   = 'adm.capmail@gmail.com';
    $mail->Password   = 'teste23#';

    //Destinatario e remetente

    $mail->SetFrom('adm.capmail@gmail.com', 'ADM');
    $mail->addAddress('suporte.oraculo@gmail.com', 'Receber email');
    

    //conteudo 

    $mail->isHTML(true);
    $mail->Subject = 'Aviso';
    $mail->Body = 'Existe um usuário interessado no seu site : '.$email;
    $mail->AltBody = 'Existe um usuário interessado no seu site : '.$email;

    


    $mail->send();
    $comprovante = '<center><span class="texto2">Mensagem Enviada</span></center>';
    header('Location: enviado.html');
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$email->ErrorInfo}";
}
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="font-awesome/css/fontawesome.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href="https://fonts.googleapis.com/css?family=Just+Another+Hand&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700|Just+Another+Hand&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/1a0c5a099a.js"></script>

     <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.countdown.js"></script>
    

    <title>Estamos em manuteção</title>
</head>

<body>

    <section id="logo">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <img src="img/my-logo.png" class="fluid" />
                </div>
            </div>
        </div>
    </section>
    <section id="intro">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p>Nós estamos trabalhando duro, estaremos pronto para lançar em....</p>
                </div>
            </div>
        </div>
    </section>

    <section id="counter">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="countdown">

                    </div>

                </div>
            </div>
        </div>
    </section>

    <section id="icons">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                   <ul class="list-inline">
                        <li class="list-inline-item"><a href="http://www.twitter.com" target="blank"><i class="fab twitter fa-twitter-square fa-3x" aria-hidden="true"></i></a></li>

                        <li class="list-inline-item"><a href="http://www.facebook.com" target="blank"><i class="fab facebook fa-facebook-square fa-3x" aria-hidden="true"></i></a></li>
                        
                        <li class="list-inline-item"><a href="http://www.instagram.com" target="blank"><i class="fab instagram fa-instagram fa-3x" aria-hidden="true"></i></a></li>

                        <li class="list-inline-item"><a href="http://www.googleplus.com" target="blank"><i class="fab google fa-google-plus-square fa-3x" aria-hidden="true"></i></a></li>
                        
                   </ul>

                </div>
            </div>
        </div>
    </section>

    <section id="singup">
            <div class="container">
                <div class="row">
                     <div class="col-md-12 col-sm-12"> 
                        <form class="form-check-inline " role="form" method="POST" action="#singup">
                            
                                <input type="email" class="form-control form-control-sm " name="email" placeholder="Digite seu e-mail" />
                            
                            
                                <button type="submit" class="btn btn-sm" name="submit" value="Enviar">Enviar</button>
                            
                        </form> 
                              <?php echo $comprovante; ?>  
                     </div> 
                </div>
            </div>
        </section>


   

    <script>
        $(function () {
            $('.countdown').countdown({
                date: "June 7, 2087 15:03:26"
            });
        });
    </script>






</body>

</html>