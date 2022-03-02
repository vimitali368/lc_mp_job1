<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ImportStatus extends Model
{
    use HasFactory;
    use SoftDeletes;
    const IMPORT_STATUS_INPROGRESS = 1;
    const IMPORT_STATUS_ERROR = 2;
    const IMPORT_STATUS_SUCCESS = 3;

    protected $table = 'import_statuses';
    protected $guarded = false;

    public static function getStatuses() {
        return [
            self::IMPORT_STATUS_INPROGRESS => 'В процессе',
            self::IMPORT_STATUS_ERROR => 'Ошибка во время импорта',
            self::IMPORT_STATUS_SUCCESS => 'Данные успешно импортированы'
        ];
    }
}
