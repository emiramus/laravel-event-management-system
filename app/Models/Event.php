<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'event_name',
        'date',
        'location',
        'description'
    ];
    
    protected $casts = [
        'date' => 'date',
    ];
    
    /**
     * Scope a query to search events by name or location.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string  $search
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearch($query, $search)
    {
        return $query->where('event_name', 'like', "%$search%")
                     ->orWhere('location', 'like', "%$search%");
    }
    
    /**
     * Get the event's formatted date.
     *
     * @return string
     */
    public function getFormattedDateAttribute()
    {
        return $this->date->format('F j, Y');
    }
}