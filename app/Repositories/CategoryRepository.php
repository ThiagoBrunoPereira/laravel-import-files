<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository
{
  public function fetchByName($name)
  {
    return Category::where('name', $name)->first();
  }
}
