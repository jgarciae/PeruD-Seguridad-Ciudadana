<?php
namespace App\Model\MongoCollection;

use CakeMonga\MongoCollection\BaseCollection;
use MongoDate;

class ReportsCollection extends BaseCollection
{
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

}