<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Field;

class CreateFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fields', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('parent_id')->nullable();
            $table->timestamps();
        });
        
        $params = [
            ['name' => 'プログラミング', 'parent_id' => null],
            ['name' => 'PHP', 'parent_id' => 1],
            ['name' => 'Ruby', 'parent_id' => 1],
            ['name' => 'Laravel', 'parent_id' => 2],
        ];
        
        foreach ($params as $param) {
            Field::create($param);
        }
    }
    
    //
    // 1 | programming | null
    // 2 | PHP         | 1
    // 3 | RUBY        | 1
    // 4 | PHPのObject | 2

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('fields');
    }
}
