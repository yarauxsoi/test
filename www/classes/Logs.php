<?php
namespace App\classes;
use Exception;
use PHP_Timer;
class Logs {
    private $message;
    public function __construct(Exception $e) {
        $this->message = $e->getMessage();
    }
    public static function show() {
        $time = PHP_Timer::resourceUsage();
        return $time . '<br>' . nl2br(file_get_contents(__DIR__ . '/../logs/logs.txt'));
    }
    public function insert() {
        return error_log(date('[H:i:s j.m.Y] ') . $this->message . "\n", 3, __DIR__ . '/../logs/logs.txt');
    }
    public static function send() {
        $transport = \Swift_SmtpTransport::newInstance('aspmx.l.google.com', 25);
        $transport->setUsername('shadoff1@gmail.com');
        $transport->setPassword('morkovka');
        $mailer = \Swift_Mailer::newInstance($transport);
        $message = \Swift_Message::newInstance('Tha Logs(a)');
        $message->setFrom(array('g@google' => 'Kadilaf'));
        $message->setTo(array('shadoff1@gmail.com' => 'kabakaba'));
        $message->setBody(file_get_contents(__DIR__ . '/../logs/logs.txt'));
        $mailer->send($message);
    }
}
?>