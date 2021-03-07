<?php

namespace App\Shared\Infrastructure\Db;

use Illuminate\Database\DatabaseManager;

class Eloquent extends DatabaseManager implements DbConnection
{
}
