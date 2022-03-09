<?php

namespace App\Migrations;

use App\Seeders\DatabaseSeeder;
use PDOException;

class Migrate
{
    protected $migrations = [];
    protected $seed;

    public function __construct()
    {
        $this->migrations['cities'] = new CreateCitiesTable;
        $this->migrations['categories'] = new CreateCategoriesTable;
        $this->migrations['users'] = new CreateUsersTable;
        $this->migrations['posts'] = new CreatePostsTable;
        $this->migrations['images'] = new CreatePostsImagesTable;
        $this->seed = new DatabaseSeeder;
    }

    /**
     * Создание базы + заполнение
     */
    public function migrateAndSeed()
    {
        $this->migrate();
        $this->seed();
    }

    /**
     * Создание базы
     */
    public function migrate()
    {
        try {
            foreach ($this->migrations as $migration) {
                $migration->up();
                echo get_class($migration) . ' выполнен успешно<br>';
            }
        } catch (PDOException $e) {
            echo 'Ошибка :' . $e;
        }
    }

    /**
     * Вызов метода для заполнения тестовыми данными базу
     */
    private function seed()
    {
        $this->seed->run();
    }

    /**
     * Пересоздание базы + заполнение
     */
    public function freshAndSeed()
    {
        $this->fresh();
        $this->seed();
    }

    /**
     * Пересоздание базы
     */
    public function fresh()
    {
        try {
            $migrations = array_reverse($this->migrations);
            foreach ($migrations as $migration) {
                $migration->down();
                echo get_class($migration) . ' удален успешно<br>';
            }
            foreach ($this->migrations as $migration) {
                $migration->up();
                echo get_class($migration) . ' выполнен успешно<br>';
            }
        } catch (PDOException $e) {
            echo 'Ошибка :' . $e;
        }
    }

    /**
     * Полное удаление базы данных
     */
    public function drop()
    {
        try {
            $migrations = array_reverse($this->migrations);
            foreach ($migrations as $migration) {
                $migration->down();
                echo get_class($migration) . ' удален успешно<br>';
            }
        } catch (PDOException $e) {
            echo 'Ошибка :' . $e;
        }
    }
}