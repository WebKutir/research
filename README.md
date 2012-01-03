Welcome to the Research Project!

This is a research based project by which we will learn how to use Doctrine ORM & Slim Framework with CodeIgniter Environment. Slim will provide a web service layer to the CodeIgniter front-end. CodeIgniter will make [RESTful](http://en.wikipedia.org/wiki/Representational_State_Transfer) requests to the Slim service, and slim will use Doctrine DBAL for database communication and will serve data in JSON / PHP Array.  
  
**Goal**  
You will have to make a Login Page using a **User Name** and a **Password**. If authenticated then a page will display with option to add, update or delete Users. There will be **Logout** option.  

***  
**Research Result**  
***  
**CodeIgniter & Slim Communication Process**  
1. To Communicate with Slim Framework I use [Pest](http://github.com/educoder/pest) which is a REST Client for PHP.  
2. To configure **Pest** with CodeIgniter according to our need I use a custom Model extended from CI_Model.  
3. Now I use a global model named **Data_model** and autoloaded the model in **Config->autoload**. We are going to use this only ONE model through-out our whole application.  
4. This Model has 4 methods. These are **getItem()**, **insertItem()**, **updateItem()** and **deleteItem()**.  

**getItem** will return **JSON / PHP Array**  
**insertItem** will return anything defined in $retval['return'] in route file / **String** failure message / **Int** zero(0) if not defined $retval['return']  
**updateItem** & **deleteItem** will return **Boolean** (true) / **String** failure message  

5. Data_model communicates with Slim Framework.
6. Slim Framework has 4 **dynamic** routes. **Routes are autoloaded from `/routes` folder, no need to manually include the files later on**.  

**Slim & Doctrine Communication Process**  
1. Slim Communicates with Doctrine using **EntityManager** feature of Doctrine.  
2. Doctrine loads **Entities** on demand, **no need to manually include them**.  
3. Each routes use `try{}catch{}`. If any exception occurs caller controller will receive `Exception Message` with no success  
4. In each route file developers will have `$app` variable automatically. They must have to pass the `$retval` array to complete the operation. `$retval` may consists of three keys which are `success`, `return` & `message`. `$retval['success']` is a **Boolean** which indicates the Success or Failure of the Operation, `$retval['return']` is an **Array** and `$retval['message']` is a **String** which passes the caller any message.  
***
  
Hope my Research will help a lot of people who want to design their Application with **CodeIgniter - Slim Framework - Doctrine**