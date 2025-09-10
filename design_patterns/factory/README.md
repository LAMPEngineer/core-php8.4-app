# Factory Pattern
The Factory design pattern is a `creational pattern` that provides a way to create objects without specifying the exact class of object that will be created.

The Factory pattern is like having a centralized workshop that creates objects for us. Instead of creating objects directly in our code, we ask a "factory" to make them for us to use.

## What Problem It Solves
The main problem the Factory pattern solves is tight coupling. Tight coupling occurs when a class directly instantiates another class using the `new` keyword.

## Easy way to understand
Let's suppose there is an application that needs to create different types of vehicles like cars, bikes, and trucks. We would create like:

`Bad approach` - tightly coupled code
if ($type === 'car') {
    $vehicle = new Car();
} elseif ($type === 'bike') {
    $vehicle = new Bike();
} elseif ($type === 'truk') {
    $vehicle = new Truck();
}

Instead of the client code having multiple new Car(), new Bike(), and new Truck() calls, a factory can be used to create the appropriate vehicle object based on a request, for example, VehicleFactory::create('car').

## Key Benefits of Factory Pattern
1. Loose Coupling
    Our code depends on interfaces, not concrete classes
    Easy to swap implementations without changing client code
2. Single Responsibility
    Object creation logic is centralized in one place
    Each class has a single, well-defined purpose
3. Open/Closed Principle
    Easy to add new product types without modifying existing code
    Just create new classes and update the factory
4. Testability
    Easy to mock objects for testing
    Factory can be easily substituted in tests

## Code Demo
Let's imagine a scenario where we have an application that sends notifications through different channels (e.g., Email, SMS, Push Notification).
We define an interface that all our notification classes must implement. Next, we create a centralized notification factory class that create objects of type interface as requested.
