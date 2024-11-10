@echo off

echo                ___   ___ 
echo      // | |       / /        //   ) ) ||   / |  / /     // | | \\    / /
echo     //__| |      / /        //___/ /  ||  /  | / /     //__| |  \\  / /
echo    / ___  |     / /        / ___ (    || / /||/ /     / ___  |   \\/ /
echo   //    | |    / /        //   | |    ||/ / |  /     //    | |    / /
echo  //     | | __/ /___     //    | |    |  /  | /     //     | |   / /
echo      ©   Jesus Valiente - Luis Olmos - Gabriel Carrillo   ©

:: Pregunta si desea resetear las migraciones
set /p reset_migracion=¿Desea resetear las migraciones? (s/n): 

cd C:\xampp\htdocs\Backend_AirWay

if /i "%reset_migracion%"=="s" (
    echo Reseteando migraciones...
    php artisan migrate:reset
) else (
    echo No se resetearán las migraciones.
)

echo =========================================================
echo Ejecutando migraciones en el orden especificado...
php artisan migrate --path=/database/migrations/2024_11_04_004957_create_authentication_table.php
php artisan migrate --path=/database/migrations/2024_11_04_204450_create_plan_table.php
php artisan migrate --path=/database/migrations/2024_11_04_141107_create_company_table.php
php artisan migrate --path=/database/migrations/2024_11_04_204649_create_service_table.php
php artisan migrate --path=/database/migrations/2024_11_04_205638_create_payment_table.php
php artisan migrate --path=/database/migrations/2024_11_09_215947_create_vehicle_table.php
php artisan migrate --path=/database/migrations/2024_11_09_221025_create_transportation_offers_table.php
php artisan migrate --path=/database/migrations/2024_11_09_222001_create_rooms_table.php
echo =========================================================
php artisan migrate

echo.
echo =========================================================
echo      ¡Migraciones completadas en el orden adecuado!
echo =========================================================

:: Cuenta regresiva de 10 segundos
echo Iniciando cuenta regresiva de 10 segundos para salir...
for /L %%i in (10,-1,1) do (
    echo %%i...
    timeout /t 1 >nul
)

echo Fin de la cuenta regresiva. El script se cerrará ahora.
exit
