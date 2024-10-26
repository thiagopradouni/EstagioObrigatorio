<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LensRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'lens_type',
        'sphere_od',
        'sphere_os',
        'cylinder_od',
        'cylinder_os',
        'axis_od',
        'axis_os',
        'add',
        'pupil_distance',
        'lens_material',
        'treatment',
        'notes',
    ];

    public function customer()
    {
        return $this->belongsTo(Cliente::class);
    }
}
