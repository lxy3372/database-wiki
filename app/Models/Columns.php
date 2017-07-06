<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Columns
 *
 * @property string $TABLE_CATALOG
 * @property string $TABLE_SCHEMA
 * @property string $TABLE_NAME
 * @property string $COLUMN_NAME
 * @property int $ORDINAL_POSITION
 * @property string|null $COLUMN_DEFAULT
 * @property string $IS_NULLABLE
 * @property string $DATA_TYPE
 * @property int|null $CHARACTER_MAXIMUM_LENGTH
 * @property int|null $CHARACTER_OCTET_LENGTH
 * @property int|null $NUMERIC_PRECISION
 * @property int|null $NUMERIC_SCALE
 * @property int|null $DATETIME_PRECISION
 * @property string|null $CHARACTER_SET_NAME
 * @property string|null $COLLATION_NAME
 * @property string $COLUMN_TYPE
 * @property string $COLUMN_KEY
 * @property string $EXTRA
 * @property string $PRIVILEGES
 * @property string $COLUMN_COMMENT
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Columns whereCHARACTERMAXIMUMLENGTH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Columns whereCHARACTEROCTETLENGTH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Columns whereCHARACTERSETNAME($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Columns whereCOLLATIONNAME($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Columns whereCOLUMNCOMMENT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Columns whereCOLUMNDEFAULT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Columns whereCOLUMNKEY($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Columns whereCOLUMNNAME($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Columns whereCOLUMNTYPE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Columns whereDATATYPE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Columns whereDATETIMEPRECISION($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Columns whereEXTRA($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Columns whereISNULLABLE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Columns whereNUMERICPRECISION($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Columns whereNUMERICSCALE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Columns whereORDINALPOSITION($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Columns wherePRIVILEGES($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Columns whereTABLECATALOG($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Columns whereTABLENAME($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Columns whereTABLESCHEMA($value)
 * @mixin \Eloquent
 */
class Columns extends Model
{
    protected $table = 'columns';
}
