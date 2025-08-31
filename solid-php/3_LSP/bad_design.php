<?php
/* 
 * Child classes should behave like their parent classes without unexpected changes.
 * If a subclass changes the expected behavior of the parent class, it violates LSP.
 * 
 * 
 * Here we have a base class PaymentMethod and create "CreditPayment" and 
 * "CashOnDelivery" Subclasses, both should work wherever "PaymentMethod" 
 * is expected - pay & refund. But "CashOnDelivery" would break this principle
 * since we can't expect refund from CashOnDelivery. 
 * 
 */
declare(strict_types = 1);

abstract class PaymentMethod
{
    abstract public function pay(float $amoun) : string;
    abstract public function refund(float $amoun) : string;
}

class CreditPayment extends PaymentMethod
{
    public function pay( float $amoun) : string
    {
        return "Paid Rs. " . $amoun . " with Credit Card.";
    }

    public function refund(float $amoun): string
    {
        return "Refunded Rs. " . $amoun . " to Credit Card.";
    }
}

class CashOnDelivery extends PaymentMethod
{
    public function pay(float $amoun): string
    {
        return "Cash of Rs. " . $amoun . " will be collected on delivery.";
    }

    // Problem: Cash on Delivery can't refund
    public function refund(float $amoun): string
    {
        throw new Exception("Refund not supported for Cash On Delivery.");
    }
}

function processRefund(PaymentMethod $payment, float $amoun) : void
{
    echo $payment->refund($amoun) . PHP_EOL;
}

// Usages
$card = new CreditPayment();
processRefund($card, 500); // Works

$cod = new CashOnDelivery();
processRefund($cod, 500); // Breaks: Unexpected exception.

?>