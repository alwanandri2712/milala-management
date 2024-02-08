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
 * Class DeleteForecast
 * Elasticsearch API name xpack.ml.delete_forecast
 *
 * NOTE: this file is autogenerated using util/GenerateEndpoints.php
 * and Elasticsearch 6.8.16 (1f62092)
 */
class DeleteForecast extends AbstractEndpoint
{
    protected $job_id;
    protected $forecast_id;

    public function getURI(): string
    {
        if (isset($this->job_id) !== true) {
            throw new RuntimeException(
                'job_id is required for Delete_forecast'
            );
        }
        $job_id = $this->job_id;
        $forecast_id = $this->forecast_id ?? null;

        if (isset($forecast_id)) {
            return "/_xpack/ml/anomaly_detectors/$job_id/_forecast/$forecast_id";
        }
        return "/_xpack/ml/anomaly_detectors/$job_id/_forecast";
    }

    public function getParamWhitelist(): array
    {
        return [
            'allow_no_forecasts',
            'timeout'
        ];
    }

    public function getMethod(): string
    {
        return 'DELETE';
    }

    public function setJobId($job_id): DeleteForecast
    {
        if (isset($job_id) !== true) {
            return $this;
        }
        $this->job_id = $job_id;

        return $this;
    }

    public function setForecastId($forecast_id): DeleteForecast
    {
        if (isset($forecast_id) !== true) {
            return $this;
        }
        $this->forecast_id = $forecast_id;

        return $this;
    }
}
