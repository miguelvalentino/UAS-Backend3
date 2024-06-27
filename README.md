run the following commands in the terminal:

npm run dev

php artisan serve

php artisan migrate:reset (if there are other databases)

php artisan migrate

php artisan db:seed (optional) used to create fake users to test features

php artisan schedule:work (optional) used for activating the banks interest could be configured in the files interest.php and interest0.php found in app/console/commands
the defaults are:
balance interest is +1/1000 per minute and then depending on how much the balance is, it is reduced because of tax (addition is calculated first before tax)
deposito interes is +1/500 per minute
