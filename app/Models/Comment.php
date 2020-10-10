<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "wp_comments";

    protected $fillable = [
        'comment_post_ID', 'comment_author', 'comment_author_email',
        'comment_author_url','comment_author_IP','comment_date','comment_date_gmt',
        'comment_content','comment_karma','comment_approved','comment_agent','comment_parent','user_id'
    ];
    
}
