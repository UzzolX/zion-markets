<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PieChart extends Model
{
    use HasFactory;

    protected $fillable = ['labels_1', 'label_1', 'data_1', 'labels_2', 'label_2', 'data_2'];
}
