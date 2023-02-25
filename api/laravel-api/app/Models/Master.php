<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Master
 *
 * @property int $id
 * @property int $del_flg
 * @property \Illuminate\Support\Carbon $created_at
 * @property int $created_user_id
 * @property string $created_action
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $upd_user_id
 * @property string|null $upd_action
 * @property string|null $deleted_at
 * @property int|null $del_user_id
 * @property string|null $del_action
 * @property int $category_type
 * @property int $category_key
 * @property string|null $category_value
 * @property string|null $category_memo
 * @property int $sort_no
 * @method static \Illuminate\Database\Eloquent\Builder|Master newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Master newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Master query()
 * @method static \Illuminate\Database\Eloquent\Builder|Master whereCategoryKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Master whereCategoryMemo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Master whereCategoryType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Master whereCategoryValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Master whereCreatedAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Master whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Master whereCreatedUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Master whereDelAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Master whereDelFlg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Master whereDelUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Master whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Master whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Master whereSortNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Master whereUpdAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Master whereUpdUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Master whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Master extends Model
{
    use HasFactory;
    protected $table = 't_master';
}
