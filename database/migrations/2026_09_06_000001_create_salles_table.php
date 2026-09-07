<?php

use Illuminate\Database\Capsule\Manager as Capsule;

return new class
{
    public function up(): void
    {
        Capsule::schema()->create('salles', function ($table) {
            $table->id();
            $table->string('nom');
            $table->string('batiment');
            $table->integer('capacite');

            $table->enum('type', [
                'cours',
                'informatique',
                'laboratoire',
                'amphitheatre',
                'reunion'
            ]);

            $table->boolean('active')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Capsule::schema()->dropIfExists('salles');
    }
};