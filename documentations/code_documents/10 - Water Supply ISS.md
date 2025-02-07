Version: V1.0.0

#  Water Supply ISS

The Water Supply Information Support System sub-module maintains information on Water Supply Bill Payment Status data.

## Workflow

Water supply service payment data is imported into watersupply_payments table via CSV file. The file is stored in the server in storage disk path as defined in config\\filesystems.php for 'importwatersupply'.

Consecutively, triggers are run which creates materialized view with few steps of operations including create status table, and updates proportion column in tables ‘wards’ and ‘grids’.

The table watersupply_payment_status is created with calculated due_years based on last_payment_date (default value:99) and Match value based on the presence of bin in the system. For buildings with match customer_name, customer_contact are updated.

## Files

-   Command files: Command files WaterSupplyDataImport.php and WaterSupplyFunctionBuild.php includes the commands or queries that are supposed to run when the php command is run and located at app/Console/Commands.
-   Config file: Config file named ‘watersupply-info.php’ inside the ‘Config’ directory includes all the Sql functions and queries in array form which are called to create commands.
-   Import class file: WaterSupplyImport file inside imports directory includes model, rules, map etc. functions and class is called inside store() function of controller class WaterSupplyController.

    Location: app/Imports/WaterSupplyImport.php

## Commands

For the initial launching, run the following command:

| *php artisan buildfunction:watersupply* |
|-----------------------------------------|

The above code creates/builds functions and triggers in the database.

To test if the import command is working or not. Use Command:

| *php artisan import:watersupply* |
|----------------------------------|
