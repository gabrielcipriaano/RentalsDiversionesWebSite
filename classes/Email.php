<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email
{
    protected $name;
    protected $email;
    protected $token;

    public function __construct($name, $email, $token)
    {
        $this->name = $name ?? '';
        $this->email = $email ?? '';
        $this->token = $token ?? '';
    }
   

    public function sendResetInstructions()
    {
        $phpmailer = new PHPMailer();
        $phpmailer->isSMTP();
        $phpmailer->Host = 'sandbox.smtp.mailtrap.io';
        $phpmailer->SMTPAuth = true;
        $phpmailer->Port = 2525;
        $phpmailer->Username = '9daf845769fc4c';
        $phpmailer->Password = '5efe2d93194520';

        $phpmailer->setFrom("Rental's Y Diversiones.com","Rental's Y Diversiones");
        $phpmailer->addAddress($this->email,"Rental's Y Diversiones.com");

        $phpmailer->isHTML(true); 
        $phpmailer->CharSet = 'UTF-8';
        $phpmailer->Subject = "Restablece tu password Rental's Y Diversiones";
        $confirmationLink = 'http://192.168.100.9:5000/reset?token=' . $this->token;

        
        $phpmailer->Body = "
            <div style='font-family: Arial, sans-serif; color: #333;'>
                <div style='background-color: #004643; padding: 20px; color: #fff; text-align: center;'>
                    <h2 style='margin: 0;'>Rental's Y Diversiones</h2>
                </div>
                <div style='padding: 20px;'>
                    <p style='margin-bottom: 20px;'>
                        Estimado/a {$this->name},<br>
                        Para restablecer tu password en Rental's Y Diversiones, haz clic en el siguiente enlace:
                    </p>
                    <p style='text-align: center;'>
                        <a href='{$confirmationLink}' style='
                            display: inline-block;
                            background-color: #0891B2;
                            color: #fff;
                            padding: 10px 20px;
                            text-decoration: none;
                            border-radius: 5px;
                            transition: background-color 0.3s;
                        '>
                            Restablecer
                        </a>
                    </p>
                    <p style='margin-top: 20px;'>
                        Si no solicitaste restablecer tu password, por favor ignora este correo.
                    </p>
                </div>
                <div style='background-color: #004643; color: #fff; text-align: center; padding: 10px;'>
                    <p style='margin: 0;'>Atentamente,<br>Equipo de Rental's Y Diversiones</p>
                </div>
            </div>
        ";

        

        $phpmailer->send();   
    }

    public function sendContact()
{
    $answer  = $_POST['contact'];

    $phpmailer = new PHPMailer();
    $phpmailer->isSMTP();
    $phpmailer->Host = 'sandbox.smtp.mailtrap.io';
    $phpmailer->SMTPAuth = true;
    $phpmailer->Port = 2525;
    $phpmailer->Username = '9daf845769fc4c';
    $phpmailer->Password = '5efe2d93194520';

    $phpmailer->setFrom("rentalsydiversiones@gmail.com","Rental's Y Diversiones");
    $phpmailer->addAddress('email@email.com',"Rental's Y Diversiones.com");

    $phpmailer->isHTML(true);
    $phpmailer->CharSet = 'UTF-8';
    $phpmailer->Subject = 'Tienes un nuevo mensaje';

    $phpmailer->Body = "
        <div style='font-family: Arial, sans-serif; color: #333;'>
            <div style='background-color: #004643; padding: 20px; color: #fff; text-align: center;'>
                <h2 style='margin: 0;'>Rental's Y Diversiones</h2>
            </div>
            <div style='padding: 20px;'>
                <html>
                <h1> Rental's Y Diversiones </h1>
                <h2> Tienes un nuevo Mensaje </h2>
                <p> Nombre: {$answer['name']}</p>
                <p> Mensaje: {$answer['message']}</p>";

    if ($answer['type-contact'] == 'email') {
        $phpmailer->Body .= "
                <p> El usuario prefiere ser contactado por: {$answer['type-contact']}</p>
                <p> Email: {$answer['email']}</p>";
    } else {
        $phpmailer->Body .= "
                <p> El usuario prefiere ser contactado por: {$answer['type-contact']}</p>
                <p> Telefono: {$answer['phone']}</p>
                <p> Fecha: {$answer['date']}</p>
                <p> Hora: {$answer['time']}</p>";
    }

    $phpmailer->Body .= "
            </div>
            <div style='background-color: #004643; color: #fff; text-align: center; padding: 10px;'>
                <p style='margin: 0;'>Atentamente,<br>Equipo de Rental's Y Diversiones</p>
            </div>
        </div>
    ";

    if ($phpmailer->send()) {
        $message = '<div class="alert success w-100"> Mensaje enviado </div>';
    } else {
        $message = '<div class="alerta error w-100"> No se pudo enviar el mensaje </div>';
    }

    return $message;
}

}
