<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Answer extends Model
{

    public $fillable = ['body'];

    public static function boot()
    {
        parent::boot();

        static::created(function (Answer $answer) {
            $answer->question->increment('answers_cnt');
            $answer->question->save();
        });
    }

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getCreatedDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    public function getUpdatedDateAttribute()
    {
        return $this->updated_at->forHumans();
    }

    public function getBodyHtmlAttribute()
    {
        return \Parsedown::instance()->text($this->body);
    }
}
