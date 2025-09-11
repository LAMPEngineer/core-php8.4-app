# Singleton Pattern
The Singleton design pattern is a `creational pattern` that ensures a class has only one instance (object) throughout the entire application, and provides a global point of access to that instance. 

The singleton pattern is useful when we need to make sure we only have a single instance of a class for the entire request lifecycle in a web application. This require when we have global objects (such as a Configuration class, Database connection) or a shared resource (such as an event queue, logging, etc.).

## Easy way to understand
Think of it like the President of a country: there can only be one at any given time, and they're globally accessible to everyone in that country. The pattern ensures that you can't accidentally create a second President object.

## What Problem It Solves
The Singleton pattern solves two main problems:

1. **Ensure a single instance:** It prevents us from creating multiple objects of a class when we only need one. We might accidentally create multiple instances of a class that should be unique, leading to inconsistencies (e.g., two separate database connections fighting over the same data).

2. **Provides a global access point:** It offers a single, well-defined way to access that unique instance from anywhere in our code. It prevents scattered global variables, which could make our code messy and hard to debug, by encapsulating the logic in a class.

## Key Benefits of Singleton Pattern
- **Controlled access:** Only one instance exists globally

- **Lazy initialization:** Instance is created only when needed

- **Memory efficient:** Prevents multiple instances of heavy objects

- **Global access point:** Available throughout your application


## A Wise NOTE

**When NOT to use:**
- It could make unit testing difficult (global state)
- It could hide dependencies between classes
- Overuse could lead to tightly coupled code

The Singleton pattern is powerful but it should be used judiciously, as by its nature it introduces global state into our application, reducing testability. In most cases, modern alternatives like dependency injection containers can (and should) be used in place of a singleton class. Using dependency injection means that we do not introduce unnecessary coupling into the design of our application, as the object using the shared or global resource requires no knowledge of a concretely defined class.

## Real World Code Demo
A `DatabaseConnection` class that simulates a single DB connection, using a private constructor, a static property to hold the instance, and a static method to access it. Also override __clone() and __wakeup() magic methods to prevent copying (clone) or deserializing (unserialize) the object.

