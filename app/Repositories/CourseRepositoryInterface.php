<?php

namespace App\Repositories;

interface CourseRepositoryInterface
{
    public function all();

    public function find($id);

    public function update($id, array $data);
}
