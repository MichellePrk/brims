<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class StudySpecimen extends Pivot
{

    #[\Override]
    protected $table = 'study_specimens';
}
