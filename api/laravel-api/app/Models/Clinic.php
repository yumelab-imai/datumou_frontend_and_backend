<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Clinic
 *
 * @property int $id
 * @property int $delete_flag
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
 * @property int $use_flag
 * @property string|null $clinic_name
 * @property string|null $clinic_address
 * @property float $latitude
 * @property float $longitude
 * @property int $prefecture_cd
 * @property int $sort_no
 * @method static \Illuminate\Database\Eloquent\Builder|Clinic newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Clinic newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Clinic query()
 * @method static \Illuminate\Database\Eloquent\Builder|Clinic whereCategoryType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Clinic whereClinicAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Clinic whereClinicName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Clinic whereCreatedAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Clinic whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Clinic whereCreatedUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Clinic whereDelAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Clinic whereDelUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Clinic whereDeleteFlag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Clinic whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Clinic whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Clinic whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Clinic whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Clinic wherePrefectureCd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Clinic whereSortNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Clinic whereUpdAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Clinic whereUpdUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Clinic whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Clinic whereUseFlag($value)
 * @mixin \Eloquent
 */
class Clinic extends Model
{
    use HasFactory;
    protected $table = 'clinics';
    // 複数代入対策
    protected $guarded = ['id', 'sort_no'];
}
