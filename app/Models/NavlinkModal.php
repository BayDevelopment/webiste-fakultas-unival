<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class NavlinkModal extends Model
{
    protected $table = 'nav_links';

    protected $fillable = [
        'group_key',
        'group_label',
        'label',
        'url',
        'route_name',
        'icon',
        'is_external',
        'is_active',
        'group_order',
        'item_order',
    ];

    protected $casts = [
        'is_external' => 'boolean',
        'is_active'   => 'boolean',
        'group_order' => 'integer',
        'item_order'  => 'integer',
    ];

    /* =======================
     |  SCOPES
     =======================*/

    /**
     * Hanya menu yang aktif
     */
    public function scopeActive(Builder $query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Urut sesuai group & item
     */
    public function scopeOrdered(Builder $query)
    {
        return $query
            ->orderBy('group_order')
            ->orderBy('item_order');
    }

    /**
     * Grouping siap pakai untuk sidebar / navbar
     */
    public function scopeGrouped(Builder $query)
    {
        return $query
            ->active()
            ->ordered()
            ->get()
            ->groupBy('group_key');
    }

    /* =======================
     |  ACCESSORS
     =======================*/

    /**
     * Resolve link otomatis (route / url)
     */
    public function getLinkAttribute()
    {
        if ($this->route_name) {
            return route($this->route_name);
        }

        return $this->url ?? '#';
    }

    /**
     * Target link (_blank / _self)
     */
    public function getTargetAttribute()
    {
        return $this->is_external ? '_blank' : '_self';
    }
}
