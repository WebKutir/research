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
  a. This Model has 4 methods. These are **getItem()**, **insertItem()**, **updateItem()** and **deleteItem()**.  
