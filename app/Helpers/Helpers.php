<?php

use Illuminate\Support\Facades\DB;

if (!function_exists('admin_url')) {
	function admin_url()
	{
		return url('admin');
	}
}
if (!function_exists('formated_date')) {
	function formated_date($datee)
	{
		return date("d/m/Y", strtotime($datee));
	}
}
if (!function_exists('date_formated')) {
	function date_formated($datee)
	{
		return date("d-m-Y", strtotime($datee));
	}
}
if (!function_exists('db_date')) {
	function db_date($datee)
	{
		return date("Y-m-d", strtotime($datee));
	}
}
if (!function_exists('js_date_formate')) {
	function js_date_formate()
	{
		return "dd/mm/yyyy";
	}
}
if (!function_exists('dateTimeCC')) {
	function date_time($time)
	{
		return $newDateTime = formated_date($time) . " " . date('h:i A', strtotime($time));
	}
}
if (!function_exists('time_elapsed_string')) {
	function time_elapsed_string($datetime, $full = false)
	{
		$now = new DateTime;
		$ago = new DateTime($datetime);
		$diff = $now->diff($ago);

		$diff->w = floor($diff->d / 7);
		$diff->d -= $diff->w * 7;

		$string = array(
			'y' => 'year',
			'm' => 'month',
			'w' => 'week',
			'd' => 'day',
			'h' => 'hour',
			'i' => 'minute',
			's' => 'second',
		);
		foreach ($string as $k => &$v) {
			if ($diff->$k) {
				$v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
			} else {
				unset($string[$k]);
			}
		}

		if (!$full) $string = array_slice($string, 0, 1);
		return $string ? implode(', ', $string) . ' ago' : 'just now';
	}
}
if (!function_exists('get_complete_table')) {
	function get_complete_table($table_name = '', $primary_key = '', $where_value = '', $orderby = '', $sorted = '')
	{
		$query = DB::table($table_name);
		$query->where('status', '1');
		if ($primary_key) {
			$query->where($primary_key, $where_value);
		}
		if ($sorted) {
			$query->orderBy($orderby, $sorted);
		} else {
			$query->orderBy('id', 'DESC');
		}
		$data = $query->get();
		return $data;
	}
}
if (!function_exists('get_complete_table_2_where')) {
	function get_complete_table_2_where($table_name = '', $column_name1 = '', $where_value1 = '', $column_name2 = '', $where_value2 = '', $orderby = '', $sorted = '')
	{
		$query = DB::table($table_name);
		$query->where('status', '1');
		if ($column_name1) {
			$query->where($column_name1, $where_value1);
		}
		if ($column_name2) {
			$query->where($column_name2, $where_value2);
		}
		if ($sorted) {
			$query->orderBy($orderby, $sorted);
		} else {
			$query->orderBy('id', 'DESC');
		}
		$data = $query->get();
		return $data;
	}
}
if (!function_exists('get_single_row')) {
	function get_single_row($table_name, $primary_key, $where_value)
	{
		$query = DB::table($table_name)
			->where($primary_key, $where_value)
			->first();
		return $query;
	}
}
if (!function_exists('get_single_value')) {
	function get_single_value($table_name, $where_value, $id)
	{
		$query = DB::table($table_name)
			->select($where_value)
			->where('id', $id)
			->first();
		return $query->$where_value;
	}
}
if (!function_exists('get_section_content')) {
	function get_section_content($meta_tag, $meta_key)
	{
		$query = DB::table('settings')
			->select('meta_value')
			->where('meta_tag', $meta_tag)
			->where('meta_key', $meta_key)
			->first();
		return $query->meta_value;
	}
}
if (!function_exists('permanently_deleted')) {
	function permanently_deleted($table_name, $primary_key, $where_id)
	{
		$query = DB::table($table_name)->where($primary_key, $where_id)->delete();
		return $query;
	}
}
if (!function_exists('soft_deleted')) {
	function soft_deleted($table_name, $primary_key, $where_id)
	{
		$query = DB::table($table_name)->where($primary_key, $where_id)
			->update([
				'is_deleted' => '1',
				'deleted_at' => date('Y-m-d H:i:s'),
			]);
		return $query;
	}
}
if (!function_exists('count_table_records')) {
	function count_table_records($table_name, $status = '')
	{
		$query = DB::table($table_name);
		if ($status) {
			$query->where('status', $status);
		}
		return $query->count();
	}
}
if (!function_exists('count_existing_record')) {
	function count_existing_record($table_name, $primary_key, $where_id)
	{
		$query = DB::table($table_name)->where($primary_key, $where_id)->count();
		return $query;
	}
}
if (!function_exists('count_total_records')) {
	function count_total_records($table_name)
	{
		$query = DB::table($table_name);
		return $query->count();
	}
}
if (!function_exists('check_permissions')) {
	function check_permissions($where_value)
	{
		if (Auth()->user()->type == 0) {
			return 1;
		} else {
			$roles = get_single_value('admin_users', 'permissions', Auth()->user()->id);
			$role = explode(',', $roles);
			if (in_array($where_value, $role)) {
				return 1;
			} else {
				return 0;
			}
		}
	}
}
if (!function_exists('find_records')) {
	function find_records($table_name, $where_value, $column_name)
	{
		$query1 = DB::table($table_name)->where($column_name, trim($where_value))->first();
		if (!empty($query1)) {
			return $query1->id;
		} else {
			$new_id = DB::table($table_name)->insertGetId([
				$column_name => $where_value,
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s'),
			]);
			return $new_id;
		}
	}
}
if (!function_exists('count_records')) {
	function count_records($table_name)
	{
		$query = DB::table($table_name);
		return $query->count();
	}
}
if (!function_exists('map_company_type')) {
	function map_company_type($type)
	{
		if ($type == 0) {
			return 'Shipper';
		} else if ($type == 1) {
			return '3rd Party';
		} else if ($type == 2) {
			return 'Freight ';
		} else if ($type == 3) {
			return 'Courier';
		}
	}
}
function mileageCalculator($start_point, $delivery_point)
{
	$start_point = urlencode($start_point);
	$delivery_point = urlencode($delivery_point);
	$mileage = null;
	$api_key = env('MAPS_API_KEY');
	$url = "https://maps.googleapis.com/maps/api/directions/json?origin={$start_point}&destination={$delivery_point}&key={$api_key}";
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	$response = curl_exec($ch);

	if ($response === false) {
		$error = curl_error($ch);
		curl_close($ch);
		// Error Check 1
		return $mileage;
	}
	$data = json_decode($response, true);
	if (isset($data['status']) && $data['status'] != 'OK') {
		// Error Check 2
		return $mileage;
	}

	if (!isset($data['routes'][0]['legs'][0]['distance']['text'])) {
		// Error Check 3
		return $mileage;
	}

	$mileage = $data['routes'][0]['legs'][0]['distance']['text'];
	curl_close($ch);
	return $mileage;
}


if (!function_exists('calculate_address')) {
	function calculate_address($zipcode)
	{
		$api_key = env('MAPS_API_KEY');
		$url = "https://maps.googleapis.com/maps/api/geocode/json?address={$zipcode}&sensor=true&key={$api_key}";
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$response = curl_exec($ch);

		if ($response === false) {
			$error = curl_error($ch);
			curl_close($ch);
			// Error Check 1
			return null;
		}
		$data = json_decode($response, true);
		if (isset($data['status']) && $data['status'] != 'OK') {
			// Error Check 2
			return null;
		}


		if ($data['status'] === 'OK') {
			$result = $data['results'][0];
			$components = $result['address_components'];
			$city = null;
			$state = null;
			$country = null;

			foreach ($components as $component) {
				$types = $component['types'];

				if (in_array('locality', $types)) {
					$city = $component['long_name'];
				} elseif (in_array('administrative_area_level_1', $types)) {
					$state = $component['long_name'];
				} elseif (in_array('country', $types)) {
					$country = $component['long_name'];
				}
				if ($city && $state && $country) {
					break;
				}
			}
			$mail_address_1 = $result['formatted_address'];
		}
		$address = array(
			'city' => $city,
			'state' => $state,
			'country' => $country,
			'mail_address' => $mail_address_1,
		);
		return $address;
	}
}
