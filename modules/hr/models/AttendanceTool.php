<?php

namespace app\models\hr;

use Yii;
use yii\base\Model;

class AttendanceTool extends Model
{
    public $workday;
    public $employees;
    public $department;
    public $branch;
    public $company;

    public function rules()
    {
        return [
            [['workday'], 'required'],
            [['employees', 'department', 'branch', 'company'], 'safe'],
        ];
    }

}
