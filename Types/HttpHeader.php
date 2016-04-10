<?php
/**
 * This file is part of DoctrineRestDriver.
 *
 * DoctrineRestDriver is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * DoctrineRestDriver is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with DoctrineRestDriver.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace Circle\DoctrineRestDriver\Types;

/**
 * Adds query related headers to the CURLOPT_HTTPHEADER
 *
 * @author    Djane Rey Mabelin <thedjaney@gmail.com>
 * @copyright 2016
 */
class HttpHeader{
    /**
     * Returns an array containing CURLOPT_HTTPHEADER options that can be added to
     * the PHP internal curl library by using curl_setopt_array
     *
     * @param  array $options
     * @return array
     *
     * @SuppressWarnings("PHPMD.StaticAccess")
     */
    public static function create(array $options, array $tokens) {

        $options['CURLOPT_HTTPHEADER'] = array_merge(
            $options['CURLOPT_HTTPHEADER'],
            LimitHttpHeader::create($tokens),
            OrderHttpHeader::create($tokens)
        );

        $options['CURLOPT_HTTPHEADER'] = empty($options['CURLOPT_HTTPHEADER']) ? [] : $options['CURLOPT_HTTPHEADER'];
        $options['CURLOPT_HTTPHEADER'] = is_string($options['CURLOPT_HTTPHEADER']) ? explode(',', $options['CURLOPT_HTTPHEADER']) : $options['CURLOPT_HTTPHEADER'];
        return [
            'CURLOPT_HTTPHEADER'=>$options['CURLOPT_HTTPHEADER']
        ];
    }
}