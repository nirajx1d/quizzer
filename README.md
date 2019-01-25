# quizzer :bulb: 
> A quizzing website on which multiple choice type questions can be asked. It
has an admin section from where new questions can be added via a form.

## Tools and Technologies :gear:
* PHP
* MySQL
* HTML
* CSS

## Running Locally :computer:
### Requirements: Xampp Server (Download [here](https://www.apachefriends.org/index.html))
**Cloning this repository:**
- Open your terminal
- cd into your htdocs folder
- Run the command:
```
git clone https://github.com/nirajx1d/quizzer.git
```
**Follow these steps:**
- Open Xampp server and start the 'Apache' and 'MySQL' services
- Open your phpmyadmin
- Create a database named 'quizzer'
- Run the queries in the create.sql file
- Now modify the *your-username* and *your-password* values in the *database.php* file
- With the 'Apache' and 'MySQL' services still running, open your browser and hit:
  ```
  http://localhost/quizzer
  ```
