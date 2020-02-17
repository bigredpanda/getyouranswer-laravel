<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Question extends Model
{
    const STATUS_UNANSWERED = 'unanswered';
    const STATUS_ANSWERED = 'answered';
    const STATUS_ANSWER_ACCEPTED = 'answer-accepted';

    protected $fillable = ['title', 'body'];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function answers(): HasMany
    {
        return $this->hasMany(Answer::class);
    }

    public function setTitleAttribute(string $value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function getUrlAttribute()
    {
        return route('questions.show', $this->slug);
    }

    public function getCreatedDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    public function getStatusAttribute(): string
    {
        $status = static::STATUS_UNANSWERED;

        if ($this->best_answer_id) {
            $status = static::STATUS_ANSWER_ACCEPTED;
        } elseif ($this->answers_cnt > 0) {
            $status = static::STATUS_ANSWERED;
        }

        return $status;
    }

    public function getBodyHtmlAttribute()
    {
        return \Parsedown::instance()->text($this->body);
    }

}
