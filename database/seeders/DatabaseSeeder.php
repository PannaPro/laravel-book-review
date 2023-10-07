<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Review;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Book::factory(33)->create()->each( function($book){

            $numReviews = random_int(5, 30);

            Review::factory()->count($numReviews)
                ->good()
                ->for($book)
                ->create();
        });

        Book::factory(33)->create()->each( function($book){

            $numReviews = random_int(5, 30);

            Review::factory()->count($numReviews)
                ->average()
                ->for($book)
                ->create();
        });

        Book::factory(34)->create()->each( function($book){

            $numReviews = random_int(5, 30);

            Review::factory()->count($numReviews)
                ->bad()
                ->for($book)
                ->create();
        });
    }
}

// фабрика создает для модели Book (колличество экземпляров - записей в бд), метод create запускает , 
        // применяем метод each - чтобы для каждой новой записи применить переданные параметры, в нашем случае это функция
        // которая создает фабрику Отзывы к книге, в указанном рандомном колличестве.
        // к фабрике отзывы применяем внутренний метод good (наши личные параметры), for это встроенный метод, ('применить для')
        
        // Создается 33 записи книги, для каждой записи запускается функция создающая ещё записи для другой фабрики, 
        // ларавель передает созданную книгу в переменную book в функцию, и так как лаавель знает, что мы указали в модели
        // что эти таблицы с отношениями один ко многим. Соотносит записи по ассоциативному ключу.
