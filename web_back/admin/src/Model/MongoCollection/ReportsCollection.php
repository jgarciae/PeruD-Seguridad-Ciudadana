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
	        	//'dni' => $report['dni'],
        		'school' => $report['school'],
        		'status' => $report['status'],
        		'numero' => $report['numero'],
        		'max_grade' => $report['max_grade'],
        		'min_grade' => $report['min_grade'],
	        	'location' => [
	        		'type' => "Point",
	        		'coordinates' => [
	        			(float)$report['lng'], 
	        			(float)$report['lat']
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
    		/*$n_lat = rand(375, 450);
    		$n_lng = rand(493, 583);
    		$n_lat_d = rand(0, 999);
    		$n_lng_d = rand(0, 999);*/
    		$n_lat = rand(250, 400);
    		$n_lng = rand(530, 700);
    		$n_lat_d = rand(0, 999);
    		$n_lng_d = rand(0, 999);
    		$n_i = rand(1 ,10);
    		//$report['dni'] = $users[$n_r]['dni'];
    		$report['school'] = "Colegio #".$i;
    		$report['status'] = rand(0 ,3);
    		$report['numero'] = rand(50 ,200);
    		$report['max_grade'] = rand(7 ,10);
    		$report['min_grade'] = rand(4 ,7);
    		//$report['location'] = ['type' => "Point", "coordinates" => [(float)("-16." . (string)$n_lat . (string)$n_lat_d), (float)("-71." . (string)$n_lng . (string)$n_lng_d)]];
    		$report['location'] = ['type' => "Point", "coordinates" => [(float)("-99." . (string)$n_lng . (string)$n_lng_d), (float)("19." . (string)$n_lat . (string)$n_lat_d)]];
    		$report['intensity'] = $n_i;
    		$report['modality'] = $modalities[rand(0, 5)];
    		$report['date'] = new MongoDate(strtotime($this->lastRandomDate(date('Y-m-d H:i:s'), $lastDays)));
    		array_push($reports, $report);
    	}
    	return $this->insert($reports);
    }

    public function ratioReports($query)
    {	
    	$cond = (isset($query['modality'])) ? ['modality' => $query['modality']] : [];
    	$find = array_merge([
				'location' => [
					'$geoWithin' => [
						'$centerSphere' => [
							[(float)$query['lng'], (float)$query['lat']], ($query['meters'] / 6378100)
						]
					]
				],
				'date' => [
					'$gte' => new MongoDate(strtotime("-" . (string)$query['last'] . " day"))
				]
			], $cond);
    	return $this->find($find);
    }

    public function routeReports($query)
    {
    	$p1x = (float)$query['p1_lat'];
    	$p1y = (float)$query['p1_lng'];
    	$p2x = (float)$query['p2_lat'];
    	$p2y = (float)$query['p2_lng'];
    	$d = (float)$query['dif'];
    	$m = ($p1y - $p2y) / ($p1x - $p2x);
    	$raq = $d / sqrt(1 + pow($m, 2));

    	$p1x1 = $p1x + $raq; $p1y1 = $p1y + $m * $raq;
    	$p1x2 = $p1x - $raq; $p1y2 = $p1y - $m * $raq;

    	$p2x1 = $p2x + $raq; $p2y1 = $p2y + $m * $raq;
    	$p2x2 = $p2x - $raq; $p2y2 = $p2y - $m * $raq;

    	debug([$p1x1, $p1y1]);
    	debug([$p1x2, $p1y2]);
    	debug([$p2x1, $p2y1]);
    	debug([$p2x2, $p2y2]);
    	//exit();

    	/*return $this->find([
				'location' => [
					'$geoWithin' => [
						'$geometry' => [
							'type' => "Polygon",
							'coordinates' => [ [
								[$p1x1, $p1y1],
								[$p2x1, $p2y1],
								[$p2x2, $p2y2],
								[$p1x2, $p1y2],
								[$p1x1, $p1y1]
							] ]
						]
					]
				]
			]
    	);*/

    	return $this->find([
				'location' => [
					'$geoWithin' => [
						'$geometry' => [
							'type' => "Polygon",
							'coordinates' => [ [
								[-16.396750, -71.531344],
								[-16.394115, -71.534177],
								[-16.386786, -71.519757],
								[-16.389759, -71.518384],
								[-16.396750, -71.531344]
							] ]
						]
					]
				]
			]
    	);
   }

}