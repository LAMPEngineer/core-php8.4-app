<?php
/*
 * The strategy design pattern to implement process payments
 * with multiple payment methods at run time and follow
 * Open-Close Princile (OCP) of SOLID design principles.
 *
 */


// 1. Define strategy interface
interface PaymentStrategy
{
    public function process(float $amount) : string;
}

// 2. Implement strategies - Credit Card simulation
class CreditCardStrategy implements PaymentStrategy
{
    public function process(float $amount): string
    {
        return 'Processed payment of $' . $amount . ' via Credit Card.';
    }
}

// PayPal simulation
class PayPalStrategy implements PaymentStrategy
{
    public function process(float $amount): string
    {
        return 'Processed payment of $' . $amount . ' via PayPal.';
    }
}

// Crypto Currency simulation
class CryptoStrategy implements PaymentStrategy
{
    public function process(float $amount): string
    {
        return 'Processed payment of $' . $amount . ' via Cryptocurrency.';
    }
}

// 3. The Context class that uses the strategy
class PaymentProcessor
{

    // constructor injection for strategy using property promotion
    public function __construct(private PaymentStrategy $strategy)
    {}


    // Method to change strategy at runtime
    public function setStrategy(PaymentStrategy $strategy) : void
    {
        $this->strategy = $strategy;
    }


    // Delegate the processing to the current strategy
    public function processPayment(float $amount) : string
    {
        if ($amount <= 0) {
            throw new InvalidArgumentException('Payment amount must be greater than 0');
        }

        return $this->strategy->process($amount);
    }

}

// Usages
$processor = new PaymentProcessor(new CreditCardStrategy());
echo $processor->processPayment(549.30) . PHP_EOL;

$processor->setStrategy(new PayPalStrategy());
echo $processor->processPayment(20.50) . PHP_EOL;

$processor->setStrategy(new CryptoStrategy());
echo $processor->processPayment(900.18) . PHP_EOL;


/*Output:
Processed payment of $549.3 via Credit Card.
Processed payment of $20.5 via PayPal.
Processed payment of $900.18 via Cryptocurrency.*/


// Step 4: Demo: Dynamic strategy selection based on conditions at run time
function selectPaymentStrategy(float $amount) : PaymentStrategy
{
    return match(true){
        $amount < 100 => new CryptoStrategy(),
        $amount < 500 => new PayPalStrategy(),
        default => new CreditCardStrategy,
    };
}

$testAmounts = [1500.45, 55.00, 450.25, 750.50];

foreach ($testAmounts as $testAmount) {
    $strategy = selectPaymentStrategy($testAmount);
    $processor->setStrategy($strategy);
    echo $processor->processPayment($testAmount) . PHP_EOL;
}

/*Output:
Processed payment of $1500.45 via Credit Card.
Processed payment of $55 via Cryptocurrency.
Processed payment of $450.25 via PayPal.
Processed payment of $750.5 via Credit Card.*/

