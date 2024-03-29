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

namespace Elasticsearch\Endpoints\Ml;

use Elasticsearch\Common\Exceptions\RuntimeException;
use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class PutCalendarJob
 * Elasticsearch API name xpack.ml.put_calendar_job
 *
 * NOTE: this file is autogenerated using util/GenerateEndpoints.php
 * and Elasticsearch 6.8.16 (1f62092)
 */
class PutCalendarJob extends AbstractEndpoint
{
    protected $calendar_id;
    protected $job_id;

    public function getURI(): string
    {
        if (isset($this->calendar_id) !== true) {
            throw new RuntimeException(
                'calendar_id is required for Put_calendar_job'
            );
        }
        $calendar_id = $this->calendar_id;
        if (isset($this->job_id) !== true) {
            throw new RuntimeException(
                'job_id is required for Put_calendar_job'
            );
        }
        $job_id = $this->job_id;

        return "/_xpack/ml/calendars/$calendar_id/jobs/$job_id";
    }

    public function getParamWhitelist(): array
    {
        return [];
    }

    public function getMethod(): string
    {
        return 'PUT';
    }

    public function setCalendarId($calendar_id): PutCalendarJob
    {
        if (isset($calendar_id) !== true) {
            return $this;
        }
        $this->calendar_id = $calendar_id;

        return $this;
    }

    public function setJobId($job_id): PutCalendarJob
    {
        if (isset($job_id) !== true) {
            return $this;
        }
        $this->job_id = $job_id;

        return $this;
    }
}
