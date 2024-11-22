<?php
require_once __DIR__ . '/../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
class CustomPHPMailer extends PHPMailer
{
    public function enviarMail($nombreCliente, $mailCliente, $idEstadoCompra)
    {

        switch ($idEstadoCompra) {
            case 1:
                $asunto = 'Su compra ha sido iniciada';
                $cuerpo = "Estimado $nombreCliente,\n\nSu compra ha sido iniciada. ¡Gracias por confiar con nosotros!\n\nEl Rincón Literario";
                break;
            case 2:
                $asunto = 'Su compra ha sido aceptada';
                $cuerpo = "Estimado $nombreCliente,\n\nSu compra ha sido aceptada, ya estamos preparando el envío de su pedido.\n\nEl Rincón Literario";
                break;
            case 3:
                $asunto = 'Su compra ha sido enviada';
                $cuerpo = "Estimado $nombreCliente,\n\nSu compra ha sido enviada. ¡Hasta la próxima!\n\nEl Rincón Literario";
                break;
            case 4:
                $asunto = 'Su compra ha sido cancelada';
                $cuerpo = "Estimado $nombreCliente,\n\nLamentamos informarle que su compra ha sido cancelada.\n\n¡Lo sentimos!";
                break;
        }

        $this->isSMTP();
        $this->Host = 'smtp.gmail.com';
        $this->SMTPAuth = true;
        $this->Username = 'romartinez1997@gmail.com';
        $this->Password = 'fzae rvrq ifut xnpr';
        $this->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $this->Port = 587;

        $this->CharSet = 'UTF-8';
        $this->setFrom('romartinez1997@gmail.com', 'El Rincon Literario');
        $this->addAddress($mailCliente, $nombreCliente);
        $this->Subject = $asunto;
        $this->Body = $cuerpo;

        if (!$this->send()) {
            $mensaje = 'El correo no pudo enviarse. Error: ' . $this->ErrorInfo;
        } else {
            $mensaje = 'Se ha enviado un correo informando el nuevo estado de compra.';
        }

        $this->smtpClose();

        return $mensaje;
    }
}
?>