# Database

Import file `database/create_database_and_users_table.sql`. It will:

- Create a database named `test_api`.
- Create an user named `test_api`, passsword `dk39aks3` and grant all privileges.
- Create `users` table.
- Insert test data into `users` table.

# Set up apache

Put the project file in apache `htdocs` or `html` folder.

# User
## Read API

GET: http://test-api.local/api/user/read.php?id=1

- id: user id 

## Update API

POST: http://test-api.local/api/user/update.php

Key:
- id
- name
- address
- tel

Request body: raw json

Headers: 

- Content-Type: application/json