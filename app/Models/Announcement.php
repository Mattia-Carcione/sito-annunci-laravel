<?php

namespace App\Models;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'description', 'price', 'category_id' 
    ];

    public function category () {
        return $this->belongsTo(Category::class);
    }

    public function user () {
        return $this->belongsTo(User::class);
    }

    public static function toBeRevisionedCount()
    {
        return Announcement::where('is_accepted', null)->count();
    }

    public function setAccepted($value){
        $this->is_accepted=$value;
        $this->save();
        return true;
    }
}
