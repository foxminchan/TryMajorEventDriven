<?php

class Registration
{
	public function addStudent($studentId, $name, $class, $major): void
	{
			$url = 'http://localhost:8000/major';
			$data = [
				'type' => 'ADD_MAJOR',
				'data' => [
					'student_id' => $studentId,
					'name' => $name,
					'class_name' => $class,
					'major' => $major
				]
			];
			$options = [
				'http' => [
					'header' => "Content-type: application/json\r\n",
					'method' => 'POST',
					'content' => json_encode($data)
				]
			];
			$context = stream_context_create($options);
			$result = file_get_contents($url, false, $context);
			if ($result === FALSE) {
				echo "Error";
			}
			var_dump($result);
	}

}
