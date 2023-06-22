<?php

namespace Database\Seeders;

use App\Models\Classes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Classes::create([
            'class_name' => 'class 1',
            'subjects' => json_encode(['Math','English']),
        ]);
        Classes::create([
            'class_name' => 'class 2',
            'subjects' => json_encode(['Math','English']),
        ]);
        Classes::create([
            'class_name' => 'class 3',
            'subjects' => json_encode(['Math','English']),
        ]);
        Classes::create([
            'class_name' => 'class 4',
            'subjects' => json_encode(['Math','English']),
        ]);
        Classes::create([
            'class_name' => 'class 5',
            'subjects' => json_encode(['Math','English']),
        ]);
        Classes::create([
            'class_name' => 'class 6',
            'subjects' => json_encode(['Higher Math','English','General math']),
        ]);
        Classes::create([
            'class_name' => 'class 7',
            'subjects' => json_encode(['Higher Math','English','General math']),
        ]);
        Classes::create([
            'class_name' => 'class 8',
            'subjects' => json_encode(['Higher Math','English','General math']),
        ]);
        Classes::create([
            'class_name' => 'class 9',
            'subjects' => json_encode(['Higher Math','English','General math','Physics','Chemistry']),
        ]);
        Classes::create([
            'class_name' => 'class 10',
            'subjects' => json_encode(['Higher Math','English','General math','Physics','Chemistry']),
        ]);
        Classes::create([
            'class_name' => 'class 11',
            'subjects' => json_encode(['Math 1st paper','Math 2nd paper','English','General math','Physics','Chemistry']),
        ]);
        Classes::create([
            'class_name' => 'class 12',
            'subjects' => json_encode(['Math 1st paper','Math 2nd paper','English','General math','Physics','Chemistry']),
        ]);

    }
}
