<?php
/**
 * Elasticsearch PHP client
 *
 * @link      https://github.com/elastic/elasticsearch-php/
 * @copyright Copyright (c) Elasticsearch B.V (https://www.elastic.co)
 * @license   http://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
 * @license   https://www.gnu.org/licenses/lgpl-2.1.html GNU Lesser General Public License, Version 2.1 
 * 
 * Licensed to Elasticsearch B.V under one or more agreements.
 * Elasticsearch B.V licenses this file to you under the Apache 2.0 License or
 * the GNU Lesser General Public License, Version 2.1, at your option.
 * See the LICENSE file in the project root for more information.
 */
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Indices;

use Elasticsearch\Common\Exceptions\RuntimeException;
use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class PutMapping
 * Elasticsearch API name indices.put_mapping
 *
 * NOTE: this file is autogenerated using util/GenerateEndpoints.php
 * and Elasticsearch 6.8.16 (1f62092)
 */
class PutMapping extends AbstractEndpoint
{

    public function getURI(): string
    {
        $index = $this->index ?? null;
        $type = $this->type ?? null;

        if (isset($index) && isset($type)) {
            return "/$index/$type/_mappings";
        }
        if (isset($index) && isset($type)) {
            return "/$index/_mappings/$type";
        }
        if (isset($index) && isset($type)) {
            return "/$index/$type/_mapping";
        }
        if (isset($index) && isset($type)) {
            return "/$index/_mapping/$type";
        }
        if (isset($type)) {
            return "/_mappings/$type";
        }
        if (isset($index)) {
            return "/$index/_mappings";
        }
        if (isset($type)) {
            return "/_mapping/$type";
        }
        if (isset($index)) {
            return "/$index/_mapping";
        }
        throw new RuntimeException('Missing parameter for the endpoint indices.put_mapping');
    }

    public function getParamWhitelist(): array
    {
        return [
            'include_type_name',
            'timeout',
            'master_timeout',
            'ignore_unavailable',
            'allow_no_indices',
            'expand_wildcards',
            'update_all_types'
        ];
    }

    public function getMethod(): string
    {
        return 'PUT';
    }

    public function setBody($body): PutMapping
    {
        if (isset($body) !== true) {
            return $this;
        }
        $this->body = $body;

        return $this;
    }
}
