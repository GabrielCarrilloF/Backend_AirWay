@echo off


echo "               ___   ___ "
echo "     // | |       / /        //   ) ) ||   / |  / /     // | | \\    / / "
echo "    //__| |      / /        //___/ /  ||  /  | / /     //__| |  \\  / / "
echo "   / ___  |     / /        / ___ (    || / /||/ /     / ___  |   \\/ / "
echo "  //    | |    / /        //   | |    ||/ / |  /     //    | |    / / "
echo " //     | | __/ /___     //    | |    |  /  | /     //     | |   / / "

echo         Jesus Valiente - Luis Olmos - Gabriel Carrillo   

:: Pregunta si desea resetear las migraciones
set /p reset_migracion=¿Desea resetear las migraciones? (s/n): 

if exist "C:\xampp\htdocs\Backend_AirWay" (
    cd C:\xampp\htdocs\Backend_AirWay
) else (
    echo Error: El directorio "C:\xampp\htdocs\Backend_AirWay" no existe.
    exit /b
)

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
php artisan migrate --path=/database/migrations/2024_11_13_203140_create_hotel_offers_table.php
echo =========================================================
php artisan migrate

echo.
echo =========================================================
echo      Migraciones completadas en el orden adecuado
echo =========================================================

echo "  _          _                   _             __                 ____       _          _      _  "
echo " | |   _   _(_)___              | | ___  ___ _/_/_ ___           / ___| __ _| |__  _ __(_) ___| | "
echo " | |  | | | | / __|  _____   _  | |/ _ \/ __| | | / __|  _____  | |  _ / _` | '_ \| '__| |/ _ \ | "
echo " | |__| |_| | \__ \ |_____| | |_| |  __/\__ \ |_| \__ \ |_____| | |_| | (_| | |_) | |  | |  __/ | "
echo " |_____\__,_|_|___/          \___/ \___||___/\__,_|___/          \____|\__,_|_.__/|_|  |_|\___|_| "
                                                                                                 
echo .

:: Cuenta regresiva de 10 segundos
echo Iniciando cuenta regresiva de 10 segundos para salir...
for /L %%i in (10,-1,1) do (
    echo %%i...
    timeout /t 1 >nul
)

echo Fin de la cuenta regresiva. El script se cerrará ahora.
