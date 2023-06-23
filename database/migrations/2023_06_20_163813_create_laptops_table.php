<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	/**
	 * Run the migrations.
	 */
	public function up(): void
	{
		Schema::create('laptops', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger('product_id');
			$table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
			$table->string('model');
			$table->string('cpu');
			$table->string('ram');
			$table->string('ssd');
			$table->string('hdd');
			$table->string('gpu');
			$table->string('screen_size');
			$table->string('resolution');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('laptops');
	}
};
