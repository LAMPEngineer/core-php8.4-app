# Strategy Pattern
The Strategy design pattern is a `behavioral pattern` that provides a way to choose a specific algorithm from a family of algorithms at runtime, rather than at compile time. The client class responsible for instantiating a particular algorithm to have no knowledge of the actual implementation.

## Easy way to understand
Imagine we're traveling from point A to point B. we have multiple strategies:
 - Walking (cheap, slow)
 - Taking a bus (moderate cost, moderate speed)
 - Taking a taxi (expensive, fast)

We can choose any strategy based on our needs (budget, time constraints), but the goal remains the same: getting to our destination.

## What Problem It Solves
The Strategy pattern solves the problem of having multiple, similar algorithms or behaviors that a client might need to use, but without using a complex series of conditional statements (like `if-else` or `switch-case`) to select which one to run. By using the Strategy pattern, we could make our code more flexible and easier to manage.

 - **Avoiding long if/else or switch statements** for different behaviors

 - **Making algorithms interchangeable** at runtime

 - **Following the Open-Closed Principle** - open for extension, closed for modification

 - **Eliminating code duplication** when similar algorithms exist


## Key Benefits of Strategy Pattern
1. **Flexibility:** Easy to add new strategies without modifying existing code.

2. **Maintainability:** Each strategy is isolated and easier to test.

3. **Runtime switching:** Can change behavior dynamically.

4. **Clean code:** Eliminates complex conditional logic.

    
## Real World Code Demo
We'll have a PaymentProcessor (the `context`) that uses different strategies for processing payments: CreditCard, PayPal, and Crypto.

Key components:
  1. **Strategy Interface** (`PaymentStrategy`): Defines the contract that all payment methods must follow
  2. **Concrete Strategies**: Each payment method (`Credit Card`, `PayPal`, `Crypto`) implements the interface differently
  3. **Context Class** (`PaymentProcessor`): Uses strategies without knowing their specific implementation details
  4. **Runtime Flexibility**: We can switch payment methods dynamically based on conditions
