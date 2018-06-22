<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

# Basic Mini CRM

#### Table of contents
- [Installation Instructions](#installation-instructions)
- [Seeds](#seeds)
    - [Seeded Roles](#seeded-roles)
    - [Seeded Permissions](#seeded-permissions)
    - [Seeded Users](#seeded-users)
- [Routes](#routes)
- [Screenshots](#screenshots)

### Installation Instructions
1. Run `git clone https://github.com/simaodcosta/CD-assessment.git CD-assessment`
2. Create a MySQL database for the project
    * ```mysql -u root -p```, if using Vagrant: ```mysql -u homestead -psecret```
    * ```create database homestead;```
    * ```\q```
3. Configure your `.env` file
4. Run `composer update` from the projects root folder
5. From the projects root folder run `php artisan migrate`
6. From the projects root folder run `composer dump-autoload`
7. From the projects root folder run `php artisan db:seed`
8. From the projects root folder run:
    * To seed your database with users: `php artisan db:seed --class=UsersTableSeeder`
    * To seed your database with companies examples: `php artisan db:seed --class=CompaniesTableSeeder`
    * To seed your database with employees examples: `php artisan db:seed --class=EmployeesTableSeeder`
    * Or, to seed with all above use: `php artisan db:seed`

### Seeds
##### Seeded Roles
  * Administrator - Level 5

##### Seeded Permissions
  * view.users
  * create.users
  * edit.users
  * delete.users

##### Seeded Users

|Email|Password|Access|
|:------------|:------------|:------------|
|admin@admin.com|password|Admin Access|

### Routes
```
+--------+-----------+---------------------------+-------------------+----------------------------------------------------------+--------------+
| Domain | Method    | URI                       | Name              | Action                                                   | Middleware   |
+--------+-----------+---------------------------+-------------------+----------------------------------------------------------+--------------+
|        | GET|HEAD  | /                         |                   | Closure                                                  | web          |
|        | GET|HEAD  | api/user                  |                   | Closure                                                  | api,auth:api |
|        | POST      | companies                 | companies.store   | App\Http\Controllers\Company\CompanyController@store     | web,auth     |
|        | GET|HEAD  | companies                 | companies.index   | App\Http\Controllers\Company\CompanyController@index     | web,auth     |
|        | GET|HEAD  | companies/create          | companies.create  | App\Http\Controllers\Company\CompanyController@create    | web,auth     |
|        | DELETE    | companies/{company}       | companies.destroy | App\Http\Controllers\Company\CompanyController@destroy   | web,auth     |
|        | PUT|PATCH | companies/{company}       | companies.update  | App\Http\Controllers\Company\CompanyController@update    | web,auth     |
|        | GET|HEAD  | companies/{company}       | companies.show    | App\Http\Controllers\Company\CompanyController@show      | web,auth     |
|        | GET|HEAD  | companies/{company}/edit  | companies.edit    | App\Http\Controllers\Company\CompanyController@edit      | web,auth     |
|        | POST      | employees                 | employees.store   | App\Http\Controllers\Employee\EmployeeController@store   | web,auth     |
|        | GET|HEAD  | employees                 | employees.index   | App\Http\Controllers\Employee\EmployeeController@index   | web,auth     |
|        | GET|HEAD  | employees/create          | employees.create  | App\Http\Controllers\Employee\EmployeeController@create  | web,auth     |
|        | GET|HEAD  | employees/{employee}      | employees.show    | App\Http\Controllers\Employee\EmployeeController@show    | web,auth     |
|        | PUT|PATCH | employees/{employee}      | employees.update  | App\Http\Controllers\Employee\EmployeeController@update  | web,auth     |
|        | DELETE    | employees/{employee}      | employees.destroy | App\Http\Controllers\Employee\EmployeeController@destroy | web,auth     |
|        | GET|HEAD  | employees/{employee}/edit | employees.edit    | App\Http\Controllers\Employee\EmployeeController@edit    | web,auth     |
|        | GET|HEAD  | home                      | home              | App\Http\Controllers\HomeController@index                | web,auth     |
|        | POST      | login                     |                   | App\Http\Controllers\Auth\LoginController@login          | web,guest    |
|        | GET|HEAD  | login                     | login             | App\Http\Controllers\Auth\LoginController@showLoginForm  | web,guest    |
|        | POST      | logout                    | logout            | App\Http\Controllers\Auth\LoginController@logout         | web          |
+--------+-----------+---------------------------+-------------------+----------------------------------------------------------+--------------+
```

### Screenshots

Welcome
![Welcome](https://i.imgur.com/Nj5iae9.png)

Dashboard
![Dashboard](https://i.imgur.com/aqd1y6o.png)

Create Company
![CreateCompany](https://i.imgur.com/mVqptNf.png)

List Companies
![ListCompanies](https://i.imgur.com/bkRLlLR.png)

Edit Company
![EditCompany](https://i.imgur.com/XMkynvs.png)

Create Employee
![CreateEmployee](https://i.imgur.com/nMhGTxW.png)

List Employees
![ListEmployees](https://i.imgur.com/uupPNUm.png)

Edit Employee
![EditEmployee](https://i.imgur.com/jDOHMjB.png)

Create Employee Menu when there is no companies
![CreateEmployee_handing1](https://i.imgur.com/ryk48Vs.png)

Create Employee Menu with validation error 
![CreateEmployee_handing2](https://i.imgur.com/lPhfCXX.png)

Create Company Menu with validation error 
![CreateCompany_handing2](https://i.imgur.com/Qw830Oa.png)

