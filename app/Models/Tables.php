<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * \App\Models\InformationSchema
 *
 * @mixin \Eloquent
 * @property string $TABLE_CATALOG
 * @property string $TABLE_SCHEMA
 * @property string $TABLE_NAME
 * @property string $TABLE_TYPE
 * @property string|null $ENGINE
 * @property int|null $VERSION
 * @property string|null $ROW_FORMAT
 * @property int|null $TABLE_ROWS
 * @property int|null $AVG_ROW_LENGTH
 * @property int|null $DATA_LENGTH
 * @property int|null $MAX_DATA_LENGTH
 * @property int|null $INDEX_LENGTH
 * @property int|null $DATA_FREE
 * @property int|null $AUTO_INCREMENT
 * @property string|null $CREATE_TIME
 * @property string|null $UPDATE_TIME
 * @property string|null $CHECK_TIME
 * @property string|null $TABLE_COLLATION
 * @property int|null $CHECKSUM
 * @property string|null $CREATE_OPTIONS
 * @property string $TABLE_COMMENT
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tables whereAUTOINCREMENT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tables whereAVGROWLENGTH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tables whereCHECKSUM($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tables whereCHECKTIME($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tables whereCREATEOPTIONS($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tables whereCREATETIME($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tables whereDATAFREE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tables whereDATALENGTH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tables whereENGINE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tables whereINDEXLENGTH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tables whereMAXDATALENGTH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tables whereROWFORMAT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tables whereTABLECATALOG($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tables whereTABLECOLLATION($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tables whereTABLECOMMENT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tables whereTABLENAME($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tables whereTABLEROWS($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tables whereTABLESCHEMA($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tables whereTABLETYPE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tables whereUPDATETIME($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tables whereVERSION($value)
 */
class Tables extends Model
{
	protected $table = 'tables';
}
