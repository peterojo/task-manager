# Task Manager
Command-line applet for managing tasks.
# Set up
- Clone the repo; 
``git clone https://github.com/peterojo/task-manager.git``
- Change directory and install dependencies; ``cd task-manager && composer install``
- Make sure `tasks` file is executable; ``chmod +x ./tasks``
- Create database and table; ``sqlite3 db.sqlite``
```
sqlite> create table tasks(
   ...> id INTEGER PRIMARY KEY,
   ...> description TEXT NOT NULL
   ...> );
```
# Usage
- Add a new task: `./tasks add "Learn programming"`
- Show all tasks: `./tasks show`
- Complete a task: `./tasks complete 1`