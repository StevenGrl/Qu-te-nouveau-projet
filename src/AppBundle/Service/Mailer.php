<?php

namespace AppBundle\Service;

use Swift_Mailer;
use Swift_Message;
use Twig_Environment;

class Mailer
{
    private $mailer;

    private $twig;

    const REPLY = 'contact@flyaround.com';

    const FROM = 'no-reply@flyaround.com';

    const NAME = 'Equipe FlyAround';

    public function __construct(Swift_Mailer $mailer, Twig_Environment $twig)
    {
        $this->mailer = $mailer;
        $this->twig = $twig;
    }

    public function sendMessage($to, $subject, $title, $body, $img=null)
    {
        $mail = Swift_Message::newInstance();

        $mail
            ->setFrom(self::FROM,self::NAME)
            ->setTo($to)
            ->setSubject($subject)
            ->setBody(
                $this->twig->render('template_email.html.twig',
                    [
                        'title' => $title,
                        'body' => $body,
                        'img' => $img
                    ]
                )
            )
            ->setReplyTo(self::REPLY,self::NAME)
            ->setContentType('text/html');

        $this->mailer->send($mail);
    }

    /**
     * @return Swift_Mailer
     */
    public function getMailer()
    {
        return $this->mailer;
    }

    /**
     * @param Swift_Mailer $mailer
     * @return Mailer
     */
    public function setMailer($mailer)
    {
        $this->mailer = $mailer;
        return $this;
    }

    /**
     * @return Twig_Environment
     */
    public function getTemplating()
    {
        return $this->templating;
    }

    /**
     * @param Twig_Environment $templating
     * @return Mailer
     */
    public function setTemplating($templating)
    {
        $this->templating = $templating;
        return $this;
    }
}
