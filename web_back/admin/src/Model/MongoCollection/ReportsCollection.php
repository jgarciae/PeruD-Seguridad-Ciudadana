<?php
namespace App\Model\MongoCollection;

use CakeMonga\MongoCollection\BaseCollection;
use MongoDate;

class ReportsCollection extends BaseCollection
{
	private function randomDate($start_date, $end_date)
	{
	    $min = strtotime($start_date);
	    $max = strtotime($end_date);

	    $val = rand($min, $max);

	    return date('Y-m-d H:i:s', $val);
	}

	private function lastRandomDate($date, $lastDays)
	{
		$min = strtotime("-" . (string)$lastDays . " day");
	    $max = strtotime($date);

	    $val = rand($min, $max);

	    return date('Y-m-d H:i:s', $val);
	}

	public function insertTo($report)
    {
        return $this->insert(
        	[
	        	'dni' => $report['dni'], 
	        	'location' => [
	        		'type' => "Point",
	        		'coordinates' => [
	        			(float)$report['lat'], 
	        			(float)$report['lng']
	        		]
	        	],
	        	'intensity' => $report['intensity'],
	        	'modality' => $report['modality'],
	        	'date' => new MongoDate()
	        ]
        );
    }

    public function generateReports($users, $num, $lastDays)
    {
    	$reports = [];
    	$modalities = ["HURTO DE VEHICULO", "ROBO AGRAVADO", "ROBO DE CELULAR", "VIOLACION SEXUAL", "SECUESTRO", "VIOLENCIA FAMILIAR"];
    	for ($i = 0; $i < $num; $i++) { 
    		$report = [];
    		$n_r = rand(0, count($users) - 1);
    		$n_lat = rand(375, 450);
    		$n_lng = rand(493, 583);
    		$n_lat_d = rand(0, 999);
    		$n_lng_d = rand(0, 999);
    		$n_i = rand(1 ,10);
    		$report['dni'] = $users[$n_r]['dni'];
    		$report['location'] = ['type' => "Point", "coordinates" => [(float)("-16." . (string)$n_lat . (string)$n_lat_d), (float)("-71." . (string)$n_lng . (string)$n_lng_d)]];
    		$report['intensity'] = $n_i;
    		$report['modality'] = $modalities[rand(0, 5)];
    		$report['date'] = new MongoDate(strtotime($this->lastRandomDate(date('Y-m-d H:i:s'), $lastDays)));
    		array_push($reports, $report);
    	}
    	return $this->insert($reports);
    }

    public function ratioReports($query)
    {	
    	$cond = ($query['modality'] != "") ? ['modality' => $query['modality']] : [];
    	$find = array_merge([
				'location' => [
					'$geoWithin' => [
						'$centerSphere' => [
							[(float)$query['lat'], (float)$query['lng']], ($query['meters'] / 6378100)
						]
					]
				],
				'date' => [
					'$gte' => new MongoDate(strtotime("-" . (string)$query['last'] . " day"))
				]
			], $cond);
    	return $this->find($find);
    }

    /*public function routeReports($query)
    {
    	$p1x = (float)$query['p1_lat'];
    	$p1y = (float)$query['p1_lng'];
    	$p2x = (float)$query['p2_lat'];
    	$p2y = (float)$query['p2_lng'];
    	$d = (float)$query['dif'];
    	$m = ($p1y - $p2y) / ($p1x - $p2x);
    	$x1 = 

    	return $this->find([
				'location' => [
					'$geoWithin' => [
						'$geometry' => [
							'type' => "Polygon",
							'coordinates' => [ 
								[],
								[],
								[],
								[],
								[]
							]
						]
					]
				]
			]
    	);
    }*/

}