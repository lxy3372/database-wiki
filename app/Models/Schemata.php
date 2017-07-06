<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Schemata
 *
 * @property string $CATALOG_NAME
 * @property string $SCHEMA_NAME
 * @property string $DEFAULT_CHARACTER_SET_NAME
 * @property string $DEFAULT_COLLATION_NAME
 * @property string|null $SQL_PATH
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Schemata whereCATALOGNAME($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Schemata whereDEFAULTCHARACTERSETNAME($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Schemata whereDEFAULTCOLLATIONNAME($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Schemata whereSCHEMANAME($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Schemata whereSQLPATH($value)
 * @mixin \Eloquent
 */
class Schemata extends Model
{
    protected $table = 'schemata';
}
