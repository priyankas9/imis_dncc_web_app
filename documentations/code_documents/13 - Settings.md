Version: V1.0.0

# Settings

## User IMS

### Users

**Tables**

Users is under Auth module and uses the following table:

-   *Auth.users*
-   *Auth.roles*
-   *Auth.password_resets*
-   *Auth.permissions*
-   *Auth.model_has_permissions*
-   *Auth.model_has_roles*

Users also uses the following table of public schema:

-   *public.authentication_log*
-   *public.sessions*
-   *public.personal_access_tokens*


The corresponding tables have their respective models that are named in Pascal Case in singular form. User model is located at app\\Models\\

**Views**

All views used by this module is stored in resources\\views\\auth\\users

-   users.index: lists users records.
-   users.create: opens form and calls partial-form for form contents
-   users.partial-form: creates form content
-   users.edit: opens form and calls partial-form for form contents
-   users.login-activity: displays activity detail of particular record
-   users.show: displays all attributes of particular record

**UserController**

app\\Http\\Controllers\\Auth\\UserController.php

The controller’s main function is to provide the connection between the calling route and its subsequent function written in the Service Class.

The basic classes of the controller are:

|  **Function**   | \__construct()                                                         |
|-----------------|------------------------------------------------------------------------|
| **Description** | Initializes authentication, permissions and the service class instance |
| **Parameters**  | Service class instance(UserService)                                    |
| **Return**      | null                                                                   |
| **Source**      | app\\Http\\Controllers\\Auth\\UserController.php                       |

| **Function**    | index()                                                                      |
|-----------------|------------------------------------------------------------------------------|
| **Description** | Returns the index.blade.php page with dropdown values fetched from database. |
| **Parameters**  | null                                                                         |
| **Return**      | users.index compact('users', 'page_title')                                   |
| **Source**      | app\\Http\\Controllers\\Auth\\UserController.php                             |

| **Function**    | create()                                                                            |
|-----------------|-------------------------------------------------------------------------------------|
| **Description** | Returns the form to create new user with dropdown values fetched from the database. |
| **Parameters**  | null                                                                                |
| **Return**      | users.create compact('page_title')                                                  |
| **Source**      | app\\Http\\Controllers\\Auth\\UserController.php                                    |

| **Function**    | store(UserRequest \$request)                                     |
|-----------------|------------------------------------------------------------------|
| **Description** | Calls the service class that handles the process of storing data |
| **Parameters**  | UserRequest \$request                                            |
| **Return**      | Success or error message.                                        |
| **Source**      | app\\Http\\Controllers\\Auth\\UserController.php                 |
| **Remarks**     | storeOrUpdate(\$id = null,\$data) Service Class Function Name    |

| **Function**    | show()                                                                                                                                                                                                                                                                 |
|-----------------|------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| **Description** | Returns the page displaying individual user data                                                                                                                                                                                                                       |
| **Parameters**  | \$id                                                                                                                                                                                                                                                                   |
| **Return**      | users.show[ 'userDetail' =\> \$userDetail, 'userRoles' =\> \$userRoles, 'page_title' =\> \$page_title, 'treatmentPlants' =\> \$user['treatmentPlants'], 'helpDesks' =\> \$user['helpDesks'], 'serviceProviders' =\> \$user['serviceProviders'], 'status' =\> \$status] |
| **Source**      | app\\Http\\Controllers\\Auth\\UserController.php                                                                                                                                                                                                                       |

| **Function**    | edit()                                                                                                                                              |
|-----------------|-----------------------------------------------------------------------------------------------------------------------------------------------------|
| **Description** | Returns the edit form page displaying pre-existing individual user data as well                                                                     |
| **Parameters**  | \$id                                                                                                                                                |
| **Return**      | users.edit compact('page_title', 'user', 'roles', 'treatmentPlants', 'helpDesks', 'serviceProviders', 'status') |
| **Source**      | app\\Http\\Controllers\\Auth\\UserController.php                                                                                                    |

| **Function**    | update()                                                               |
|-----------------|------------------------------------------------------------------------|
| **Description** | Calls the service class that handles the process of updating user data |
| **Parameters**  | UserRequest \$request, \$id                                            |
| **Return**      | Success or error message.                                              |
| **Source**      | app\\Http\\Controllers\\Auth\\UserController.php                       |
| **Remarks**     | storeOrUpdate(Request \$request) (service class function)              |

**UserService**

Location: app\\Services\\Auth\\UserService.php

The Service Class contains all the business logic. It contains all the functions that are being called in the UserController.

|  **Function**   | storeOrUpdate()                                                                                          |
|-----------------|----------------------------------------------------------------------------------------------------------|
| **Description** | Handles the process of adding/updating new user.                                                         |
| **Parameters**  | \$id,\$data                                                                                              |
| **Return**      | Success or error message, stores/updates data to user                                                    |
| **Source**      | app\\Services\\Auth\\UserService.php                                                                     |
| **Logic**       | if \$id is null store new records to database if \$id has some value edit the record of \$id to database. Also flushes other browser sessions if password is updated |

| **Function**    | getAllData()                                             |
|-----------------|----------------------------------------------------------|
| **Description** | Handles the process of fetching user data for html table |
| **Parameters**  | \$data                                                   |
| **Return**      | Returns data of user table for html table                |
| **Source**      | app\\Services\\Auth\\UserService.php                     |
| **Logic**       | Join required tables Return datatable                    |

**UserRequest**

Location: app\\Http\\Requests\\Auth\\UserRequest.php

UserRequest handles all validation login. It handles validation logic as well as error messages to be displayed.

|  **Function**   | authorize()                                |
|-----------------|--------------------------------------------|
| **Description** | Determines if user is authenticated or not |
| **Parameters**  |                                            |
| **Return**      | Returns true                               |
| **Source**      | app\\Http\\Requests\\Auth\\UserRequest.php |

| **Function**    | message()                                                                                                                         |
|-----------------|-----------------------------------------------------------------------------------------------------------------------------------|
| **Description** | Message to be displayed in case of validation error                                                                               |
| **Parameters**  |                                                                                                                                   |
| **Return**      | Return validation message                                                                                                         |
| **Source**      | app\\Http\\Requests\\Auth\\UserRequest.php                                                                                        |
| **Remarks**     | Need to include errors.list.blade that displays the error message in dashboard Format: ‘Field.validation_rule’ =\>”error_message” |

| **Function**    | rules()                                                                           |
|-----------------|-----------------------------------------------------------------------------------|
| **Description** | Contains the validation rules                                                     |
| **Parameters**  |                                                                                   |
| **Return**      | Return validation logic to calling place                                          |
| **Source**      | app\\Http\\Requests\\Auth\\UserRequest.php                                        |
| **Remarks**     | Format for validation rule: ‘field_name’=\>’validation_rule1 \| validation_rule2’ |

**Models**

The models contain the connection between the model and the table defined by

*\$table = ‘auth.users’* as well as the primary key defined by

*primaryKey= ‘id’*

|  **Function**   | hasanyPermissionInGroup()                  |
|-----------------|--------------------------------------------|
| **Description** | Checks if the currently authenticated user has any permissions belonging to the specified permission groups |
| **Parameters**  | array $permgroupNames                      |
| **Return**      | Returns Boolean True or False              |
| **Source**      | app\\Models\\User.php                      |
| **Remarks**     | The method uses `array_intersect()` to check if there is any overlap between the groups the user’s permissions belong to and the provided group names|

### Roles

**Tables**

Roles *is under Auth module and uses the following table:*

-   *Auth.roles*
-   *Auth.users*
-   *Auth.permissions*
-   *Auth.role_has_permissions*
-   *Auth.model_has_roles*

The corresponding tables have their respective models that are named in Pascal Case in singular form. User model is located at app\\Models\\

**Views**

All views used by this module is stored in resources\\views\\auth\\roles

-   roles.index: lists roles records.
-   roles.create: opens form and calls form for form contents
-   roles.form: creates form content
-   roles.edit: opens form and calls form for form contents

**RoleController**

app\\Http\\Controllers\\Auth\\RoleController.php

The controller’s main function is to provide the connection between the calling route and its subsequent function.

The basic classes of the controller are:

|  **Function**   | \__construct()                                    |
|-----------------|---------------------------------------------------|
| **Description** | Initializes authentication and permissions        |
| **Parameters**  | null                                              |
| **Return**      | null                                              |
| **Source**      | app\\Http\\Controllers\\Auth\\RoleController.php  |

| **Function**    | index()                                                                      |
|-----------------|------------------------------------------------------------------------------|
| **Description** | Returns the index.blade.php page with dropdown values fetched from database. |
| **Parameters**  | null                                                                         |
| **Return**      |  ['page_title'=\>\$page_title,'roles' =\> \$roles]                           |
| **Source**      | app\\Http\\Controllers\\Auth\\RoleController.php                             |

| **Function**    | create()                                                                            |
|-----------------|-------------------------------------------------------------------------------------|
| **Description** | Returns the form to create new role with dropdown values fetched from the database. |
| **Parameters**  | null                                                                                |
| **Return**      | roles.create compact('page_title')                                                  |
| **Source**      | app\\Http\\Controllers\\Auth\\UserController.php                                    |

| **Function**    | store(Request \$request)                           |
|-----------------|----------------------------------------------------|
| **Description** | Handles the process of storing data                |
| **Parameters**  | Request \$request                                  |
| **Return**      | Success or error message.                          |
| **Source**      | app\\Http\\Controllers\\Auth\\RoleController.php   |

| **Function**    | edit()                                                                                        |
|-----------------|-----------------------------------------------------------------------------------------------|
| **Description** | Returns the edit form page displaying pre-existing individual role data as well               |
| **Parameters**  | \$id                                                                                          |
| **Return**      | roles.edit compact('page_title', 'role','permission','rolePermissions','grouped_permissions') |
| **Source**      | app\\Http\\Controllers\\Auth\\RoleController.php                                              |

| **Function**    | update()                                                               |
|-----------------|------------------------------------------------------------------------|
| **Description** | Calls the service class that handles the process of updating user data |
| **Parameters**  | Request \$request, \$id                                                |
| **Return**      | Success or error message.                                              |
| **Source**      | app\\Http\\Controllers\\Auth\\RoleController.php                       |

| **Function**    | destroy                                                  |
|-----------------|----------------------------------------------------------|
| **Description** | Soft deletes the roles                                   |
| **Parameters**  | \$id                                                     |
| **Return**      | Redirection to index page with success or failure prompt |
| **Source**      | App\\Http\\Controllers\\Auth\\RolesController.php        |

**Models**

\<-- CODE SNIPPET --\>

*use Spatie\\Permission\\Models\\Role;*

*use Spatie\\Permission\\Models\\Permission;*

**Seeder**

For Seeding permissions we use :

PermissionsSeeder class and file is located at:

Database\\Seeders\\PermissionsSeeder.php

| **Function**    | run()                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          |
|-----------------|------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| **Description** | Run the database seeds. \<-- CODE SNIPPET for permission for Users --\> *\$grouped_permissions = [*  *[*  *"group" =\> "Users",*  *"perms" =\> [*  *[*  *"type" =\> "List",*  *"name" =\> "List Users"*  *],*  *[*  *"type" =\> "View",*  *"name" =\> "View User"*  *],*  *[*  *"type" =\> "Add",*  *"name" =\> "Add User"*  *],*  *[*  *"type" =\> "Edit",*  *"name" =\> "Edit User"*  *],*  *[*  *"type" =\> "Delete",*  *"name" =\> "Delete User"*  *],*  *[*  *"type" =\> "Activity",*  *"name" =\> "View User Login Activity"*  *],*  *]*  *],* *foreach (\$grouped_permissions as \$group) {*  *foreach (\$group['perms'] as \$permission){*  *\$existPermission = DB::table('auth.permissions')*  *-\>where('name', \$permission['name'])*  *-\>first();*  *if (!\$existPermission) {*  *Permission::create([*  *'name' =\> \$permission['name'],*  *'type' =\> \$permission['type'],*  *'group' =\> \$group['group']*  *]);*  *}*  *}*  *}* |
| **Parameters**  | null                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           |
| **Return**      | null                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           |
| **Source**      | Database\\Seeders\\PermissionsSeeder.php                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       |

For Seeding roles we use :

RolesSeeder class and file is located at :

Database\\Seeders\\RolesSeeder.php

| **Function**    | run()                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 |
|-----------------|-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| **Description** | Run the database seeds. \<-- CODE SNIPPET for all roles --\> *$roles=\[\['name'=>'SuperAdmin'\],\['name'=>'Municipality-SuperAdmin',\],\['name'=>'Municipality-Executive',\],\['name'=>'Municipality-BuildingPermitDepartment',\],\['name'=>'Municipality-BuildingSurveyor',\],\['name'=>'Municipality-InfrastructureDepartment',\],\['name'=>'Municipality-TaxDepartment',\],\['name'=>'Municipality-WaterBillingUnit',\],\['name'=>'Municipality-SolidWasteManagementDepartment',\],\['name'=>'Municipality-SanitationDepartment',\],\['name'=>'Municipality-ITAdmin',\],\['name'=>'Municipality-PublicHealthDepartment',\],\['name'=>'Municipality-HelpDesk',\],\['name'=>'ServiceProvider-Admin',\],\['name'=>'ServiceProvider-EmptyingOperator',\],\['name'=>'ServiceProvider-HelpDesk',\],\['name'=>'TreatmentPlant-Admin',\],\['name'=>'Guest',\],\];*                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 |
| **Parameters**  | null                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  |
| **Return**      | null                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  |
| **Source**      | Database\\Seeders\\RoleSeeder.php                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     |
| **Logic**       | Seeders are implemented for each role, and their structure is derived from the roles matrix defined in the Base IMIS's GitHub repository. This matrix acts as the blueprint, specifying the permissions, responsibilities associated with each role. The seeders use this information to populate the database with default role configurations and ensure consistency across environments. |
