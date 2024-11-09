@echo off
cd C:\xampp\htdocs\Backend_AirWay

:: Pregunta si desea resetear las migraciones
set /p reset_migracion=¿Desea resetear las migraciones? (s/n): 

if /i "%reset_migracion%"=="s" (
    echo Reseteando migraciones...
    php artisan migrate:reset
) else (
    echo No se resetearán las migraciones.
)

echo Actualizar rama...
git checkout Developer
git pull origin Developer
echo =========================================================
echo Ejecutando migraciones en el orden especificado...
php artisan migrate --path=/database/migrations/2024_11_04_004957_create_authentication_table.php
php artisan migrate --path=/database/migrations/2024_11_04_204450_create_plan_table.php
php artisan migrate --path=/database/migrations/2024_11_04_141107_create_company_table.php
php artisan migrate --path=/database/migrations/2024_11_04_204649_create_service_table.php
php artisan migrate --path=/database/migrations/2024_11_04_205638_create_payment_table.php
echo =========================================================
php artisan migrate

echo.
echo =========================================================
echo            .-''''''-.
echo           /          \
echo          |            |
echo          |,  .-.  .-. ,|
echo          | )(_o/  \o_)(|
echo          |/     /\     \|
echo          (_     ^^     _)
echo           \__|IIIIII|__/
echo            | \IIIIII/ |
echo            \          /
echo             `--------`
echo.
echo      ¡Migraciones completadas en el orden adecuado!
echo =========================================================
