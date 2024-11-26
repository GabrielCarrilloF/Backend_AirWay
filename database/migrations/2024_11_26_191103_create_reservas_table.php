<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservasTable extends Migration
{
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->id(); // Llave primaria AUTO_INCREMENT
            $table->uuid('offerCode')->default(DB::raw('(UUID())'));
            $table->string('nombre_usuario'); // Nombre del usuario
            $table->string('identificacion_usuario'); // Identificación del usuario
            $table->string('correo_usuario')->unique(); // Correo del usuario
            $table->integer('edad_usuario'); // Edad del usuario
            $table->string('telefono_usuario'); // Teléfono del usuario
            $table->unsignedBigInteger('id_offer'); // Relación con TransportationOffer
            $table->string('companyName', 255); // Ya no es clave primaria
        
            // Llaves foráneas
            $table->foreign('id_offer')
                ->references('id')
                ->on('transportation_offers')
                ->onDelete('cascade');
            
            $table->foreign('companyName')
                ->references('name')
                ->on('company')
                ->onDelete('cascade');
        
            $table->timestamps(); // Created_at y updated_at
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('reservas');
    }
}
