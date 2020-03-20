<?php

namespace Beaver\PowerBI\Resources\DataSet;

class Type
{
    /**
     * DataTypes for creating columns on a table.
     * Int64     Int64.MaxValue and Int64.MinValue not allowed.
     * Double    Double.MaxValue and Double.MinValue values not allowed. NaN not supported.+Infinity and -Infinity not supported in some functions (for example, Min, Max).
     * Boolean   None
     * Datetime  During data loading, we quantize values with day fractions to whole multiples of 1/300 seconds (3.33 ms).
     * String    Currently allows up to 128 K characters.
     */

    const INTEGER = 'Int64';
    const DOUBLE = 'Double';
    const BOOLEAN = 'Boolean';
    const DATETIME = 'Datetime';
    const STRING = 'String';
}
