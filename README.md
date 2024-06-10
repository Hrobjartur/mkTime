#MK Time
_This is a fictional website and is used for educational illustration purposes only._

##Features

###Admin pages: 
•	CRUD system;
•	Protected pages;
•	Utilised radio buttons for critical fields to minimize errors;
•	GET method to retrieve item_id during Update, reducing the risk of errors.

###Main website:
•	Modular architecture with a mobile-friendly user interface;
 ![navBarMobile](https://github.com/Hrobjartur/mkTime/assets/157384055/3a77d2d0-8f1b-4621-8871-6f65230c3580)
•	Dynamic nav bar, “SIGN IN” and “REGISTER” are replaced by “Welcome”, “CART” and “LOGOUT “when a user is logged in;
 ![dynamicNav](https://github.com/Hrobjartur/mkTime/assets/157384055/1a5e4b18-d4d3-47ef-bb2a-273f67ed0037)
•	Full login and registration functionality to manage user sessions;
•	New arrivals page that pulls the last two products added to the items table;
•	Moving background for New Arrivals segment created in CSS;
•	Functional Search Bar that allows user to search by Item name, gender or description;
•	Database-driven product management;
 ![mkTimeDb](https://github.com/Hrobjartur/mkTime/assets/157384055/8831a36c-90c8-4fd0-a6a1-1b36317be715)
•	Collections pages (ladies/gents) retrieve items from the database based on the gender field;
•	About page includes animated objects using marquee;
•	Products page is accessible only to logged-in users;
•	Users can add or remove items from their cart, modify quantities, and proceed to checkout.  
![cart](https://github.com/Hrobjartur/mkTime/assets/157384055/a1380ed8-047d-48c3-8e2e-45701de775eb)

Database name: **mktime**
Test user first name: **Test**
**Test user email: test@db.com
Password: 1234**

##Development

Frontend: Bootstrap and HTML+CSS
Backend: PHP
Database: MySQL
Project Management: Jira
Testing: Cypress

##Testing

Testing has been conducted with Cypress.

Test Workflow:
•	navigates to the homepage;
•	confirms presence of a specific element to ensure it is on the correct page;
•	clicks Sign in;
•	confirms presence of a specific element to ensure it is on the Login page;
•	selects and types a user’s email;
•	selects and types the correct password;
•	submits the Login form;
•	uses the Search feature to look for a product on the new page;
•	adds the searched product to the shopping cart;
•	advances to the checkout process;
•	places an order;
•	logs out of the account.
![cypress](https://github.com/Hrobjartur/mkTime/assets/157384055/32f9e1f9-8104-46e0-a712-155a744cfa69)

