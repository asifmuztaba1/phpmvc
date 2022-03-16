### This is a model view controller framework design in raw php
#### Instruction to set up:
1) Clone the Repository
2) Open terminal to the project directory and run command `composer install`
3) Go to `index.php` file replace the portion of the code with your database information
`   $config=[
   'host'=>'',
   'db_name'=>'xpeedstudio',
   'username'=>'root',
   'password'=>''
   ];`
4) After first run the project will create the `buyer_info` table automatically in the database. Though the SQL file is given in the `DB` directory.
5) **All done**. Open the project in the browser.


#### Testing Project
1) There are two web pages in the project 
   1) Home ( the form )
   2) Report ( all the data with date range filter)
2) In the `Home` page the form takes the values according to the guided validation from the instruction doc
3) There are two types of validation
   1) From front end with JS that validate the text format of each input.
   2) From Back End with php `Validate Class` that checks the required, text min-max length.
4) The user can place one form submit one time within 24 hrs. For testing you can change the time duration in `custom.js` file
   Change the value of this constant `const MINUIT_TO_BLOCK=24*60;` place 1 for one minuit block and likewise.
5) In the `Report` page there is a horizontally scrollable table with the data of submitted form.
6) The table data can be filtered by placing data range in the top right input filed.

------------
Finished
