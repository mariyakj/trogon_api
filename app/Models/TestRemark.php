<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestRemark extends Model
{
    protected $table = 'testremarks'; 

    protected $fillable = ['task_id', 'remark'];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}
