<?php
/*
 * The Factory design pattern
 */



/*
 * An interface that all our notification types must implement.
 */
interface Notifier
{
    public function send(string $message) : string;
}

/*
 * Email notifier that implements Notifier interface.
 */
class EmailNotifier implements Notifier
{
    public function send(string $message): string
    {
        return 'Sending email with message: ' . $message . PHP_EOL;
    }
}


/*
 * SMS notifier that implements Notifier interface.
 */
class SMSNotifier implements Notifier
{
    public function send(string $message): string
    {
        return 'Sending SMS with message: ' . $message . PHP_EOL;
    }
}


/*
 * Push notifier that implements Notifier interface.
 */
class PushNotifier implements Notifier
{
    public function send(string $message): string
    {
        return 'Sending push notification with message: ' . $message . PHP_EOL;
    }
}


/*
 * The Notify Factory:
 *
 * It has a single static method that takes a type as a parameter
 * and returns the corresponding Notifier object.
 *
 */
class NotifyFactory
{
    public static function create( string $type) : Notifier
    {
        return match(strtolower($type)){
            'email' => new EmailNotifier(),
            'sms' => new SMSNotifier(),
            'push' => new PushNotifier(),
            default => throw new InvalidArgumentException('Invalid notifier type provided'),
        };
    }
}


/*
 * Usages - Client code
 *
 * The client uses the factory to create object it needs,
 * without knowing the specific concrete class.
 */

$emailnotifier = NotifyFactory::create(type: 'email');
echo $emailnotifier->send(message: 'Hello via Email!'); // Sending email with message: Hello via Email!


$smsnotifier = NotifyFactory::create(type: 'sms');
echo $smsnotifier->send(message: 'Hello via SMS!'); // Sending SMS with message: Hello via SMS!


$pushnotifer = NotifyFactory::create(type: 'push');
echo $pushnotifer->send(message: 'Hello via Push!'); // Sending push notification with message: Hello via Push!


