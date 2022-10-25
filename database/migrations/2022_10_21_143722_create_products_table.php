<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); //Primo campo
            $table->string('name');
            $table->text('description');
            $table->string('image');
            $table->integer('price');
            $table->timestamps(); //Ultimo campo
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};

/*
INSERT INTO `products` (`id`, `name`, `description`, `image`, `price`, `created_at`, `updated_at`) VALUES
(1, 'TV', 'Best TV dal BD', 'game.png', 1000, '2021-09-30 20:00:00', '2021-09-30 20:00:00'),
(2, 'Chromecast', 'Best Chromecast da DB', 'submarine.png', 30, '2021-09-30 20:00:00', '2021-09-30 20:00:00'),
(3, 'iPhone', 'Best iPhone', 'safe.png', 999, '2021-09-30 20:00:00', '2021-09-30 20:00:00'),
(4, 'Glasses', 'Best Glasses', 'game.png', 100, '2021-09-30 20:00:00', '2021-09-30 20:00:00'),
(5, 'FireStick', 'Amazon', 'game.png', 39, '2022-06-27 11:30:43', '2022-06-27 11:30:43'),
(6, 'Nintendo Switch', 'Consol da gioco', 'game.png', 199, '2022-06-27 11:31:06', '2022-06-27 11:31:06'),
(7, 'Andrea', 'Il Prof', '7.png', 300, '2022-06-29 05:28:06', '2022-06-29 05:28:06');

*/
