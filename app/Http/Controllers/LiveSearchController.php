<?php

namespace checkUp\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class LiveSearchController extends Controller
{

	function searchAppointment(Request $request) {
		if($request->ajax()) {
			$output = '';
			$query = $request->get('query');
			if($query != '') {
				$data = DB::table('appointment')
				->where('id', 'like', '%'.$query.'%')
				->orWhere('date', 'like', '%'.$query.'%')
				->orWhere('time', 'like', '%'.$query.'%')
				->orWhere('patient_id', 'like', '%'.$query.'%')
				->orWhere('doctor_id', 'like', '%'.$query.'%')
				->orWhere('description', 'like', '%'.$query.'%')
				->orWhere('medicine', 'like', '%'.$query.'%')
				->orWhere('bill_id', 'like', '%'.$query.'%')
				->orderBy('id', 'desc')
				->get();

			}
			else {
				$data = DB::table('appointment')
				->orderBy('id', 'desc')
				->get();
			}
			$total_row = $data->count();
			if($total_row > 0) {
				foreach($data as $row) {
					$output .= '
					<tr>
						<td>'.$row->id.'</td>
						<td>'.$row->date.'</td>
						<td>'.$row->time.'</td>
						<td>'.$row->patient_id.'</td>
						<td>'.$row->doctor_id.'</td>
						<td>'.$row->description.'</td>
						<td>'.$row->medicine.'</td>
						<td>'.$row->bill_id.'</td>
					</tr>
					';
				}
			}
			else {
				$output = '
				<tr>
				<td align="center" colspan="7">No Data Found</td>
				</tr>
				';
			}
			$data = array(
				'table_data'  => $output,
				'total_data'  => $total_row
			);

			echo json_encode($data);
		}
	}

	function searchDoctor(Request $request) {
		if($request->ajax()) {
			$output = '';
			$query = $request->get('query');
			if($query != '') {
				$data = DB::table('doctor')
				->where('id', 'like', '%'.$query.'%')
				->orWhere('first_name', 'like', '%'.$query.'%')
				->orWhere('last_name', 'like', '%'.$query.'%')
				->orWhere('age', 'like', '%'.$query.'%')
				->orWhere('specialty', 'like', '%'.$query.'%')
				->orWhere('city', 'like', '%'.$query.'%')
				->orWhere('address', 'like', '%'.$query.'%')
				->orderBy('id', 'desc')
				->get();

			}
			else {
				$data = DB::table('doctor')
				->orderBy('id', 'desc')
				->get();
			}
			$total_row = $data->count();
			if($total_row > 0) {
				foreach($data as $row) {
					$output .= '
					<tr>
					<td>'.$row->id.'</td>
					<td>'.$row->first_name.'</td>
					<td>'.$row->last_name.'</td>
					<td>'.$row->age.'</td>
					<td>'.$row->specialty.'</td>
					<td>'.$row->city.'</td>
					<td>'.$row->address.'</td>
					</tr>
					';
				}
			}
			else {
				$output = '
				<tr>
				<td align="center" colspan="7">No Data Found</td>
				</tr>
				';
			}
			$data = array(
				'table_data'  => $output,
				'total_data'  => $total_row
			);

			echo json_encode($data);
		}
	}

	

	


}