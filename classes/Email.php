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
        $this->name = $name;
        $this->email = $email;
        $this->token = $token;
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

        $phpmailer->setFrom("cuentas@uptask.com","Rental's Y Diversiones");
        $phpmailer->addAddress($this->email);

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
}
