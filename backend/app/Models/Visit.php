<?php

namespace App\Models;

use App\Enums\VisitorType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Visit extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'visit_date',
        'reason',
        'visitor_type',
        'individual_visitor_id',
        'group_visitor_id',
    ];

    protected function casts(): array
    {
        return [
            'visit_date' => 'date',
            'visitor_type' => VisitorType::class,
        ];
    }

    public function individualVisitor(): BelongsTo
    {
        return $this->belongsTo(IndividualVisitor::class);
    }

    public function groupVisitor(): BelongsTo
    {
        return $this->belongsTo(GroupVisitor::class);
    }
}
