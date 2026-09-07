<?php

use Illuminate\Database\Capsule\Manager as Capsule;

return new class
{
    public function up(): void
    {
        Capsule::schema()->create('reservations', function ($table) {
            $table->id();

            $table->foreignId('salle_id')
                ->constrained('salles')
                ->cascadeOnDelete();

            $table->string('responsable');
            $table->string('email');
            $table->text('motif');

            $table->dateTime('date_debut');
            $table->dateTime('date_fin');

            $table->enum('statut', [
                'confirmee',
                'annulee'
            ])->default('confirmee');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Capsule::schema()->dropIfExists('reservations');
    }
};