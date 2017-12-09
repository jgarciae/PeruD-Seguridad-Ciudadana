<?php
namespace App\Model\MongoCollection;

use CakeMonga\MongoCollection\BaseCollection;

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
	        	'intensity' => (int)$report['intesity'],
	        	'modality' => (int),
	        	'date' => date('c')
	        ]
        );
    }

}