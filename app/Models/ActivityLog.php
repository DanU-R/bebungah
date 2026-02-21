<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    protected $fillable = [
        'type',
        'event',
        'user_id',
        'subject_type',
        'subject_id',
        'properties',
        'ip_address',
    ];

    protected $casts = [
        'properties' => 'array',
    ];

    /**
     * Helper statis untuk merekam log dengan mudah dari mana saja.
     *
     * Contoh penggunaan:
     *   ActivityLog::record('admin_action', 'invitation.approved', $invitation, ['status' => 'active']);
     */
    public static function record(
        string $type,
        string $event,
        ?Model $subject = null,
        array $properties = [],
        ?string $ipAddress = null
    ): self {
        return self::create([
            'type'         => $type,
            'event'        => $event,
            'user_id'      => auth()->id(),
            'subject_type' => $subject ? get_class($subject) : null,
            'subject_id'   => $subject?->getKey(),
            'properties'   => $properties,
            'ip_address'   => $ipAddress ?? request()->ip(),
        ]);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
