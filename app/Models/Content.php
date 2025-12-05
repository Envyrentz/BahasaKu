<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Content extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Get the user that owns the Content
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    
    /**
     * Get all of the assesments for the Content
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function assesments()
    {
        return $this->hasMany(UserAssesment::class, 'content_id', 'id');
    }

    /**
     * Get all of the user_contents for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function user_contents()
    {
        return $this->hasMany(UserContent::class, 'content_id', 'id');
    }
}
