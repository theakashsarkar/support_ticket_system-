<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function assignedAgent(){
        return $this->belongsTo(User::class, 'assigned_agent_id');
    }

    public function replies(){
        return $this->hasMany(TicketReply::class)->latest();
    }

    public function status()
    {
        return $this->belongsTo(TicketStatuses::class);
    }

    public function priority()
    {
        return $this->belongsTo(TicketPriority::class);
    }

    public function category()
    {
        return $this->belongsTo(TicketCategory::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

}
