<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Todo extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'completed'];
    protected $hidden = ['created_at', 'updated_at'];

    protected function casts(): array
    {
        return [
            'completed' => 'boolean',
        ];
    }

    protected function createdAtFormatted(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->created_at->format('d-m-Y H:i:s'),
        );
    }

    protected $appends = ['created_at_formatted'];

}
