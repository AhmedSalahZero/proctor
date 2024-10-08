<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\RuleSectionPermission
 *
 * @method static \Illuminate\Database\Eloquent\Builder|RuleSectionPermission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RuleSectionPermission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RuleSectionPermission query()
 * @mixin \Eloquent
 */
class RuleSectionPermission extends Model
{

    use HasFactory;

    protected $table = 'rule_section_permission';
}
