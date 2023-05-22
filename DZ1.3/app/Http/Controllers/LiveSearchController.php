<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class LiveSearchController extends Controller
{
    function index()
    {
        return view('livesearch');
    }

    function action(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');
            if ($query != '') {
                $data = DB::table('movies')
                    ->where('title', 'like', '%' . $query . '%')
                    ->orWhere('director', 'like', '%' . $query . '%')
                    ->orWhere('genre', 'like', '%' . $query . '%')
                    ->orderBy('id', 'desc')
                    ->get();
            }

            $total_row = $data->count();
            if ($total_row > 0) {
                foreach ($data as $row) {
                    $output .= '
                    <tr>
                    <td>' . $row->id . '</td>
                    <td>' . $row->title . '</td>
                    <td>' . $row->director . '</td>
                    <td>' . $row->genre . '</td>
                    <td>' . $row->release_date . '</td>
                    <td></td>
                    
                    <td>
                        <form action="' . route('movies.destroy', $row->id) . '" method="POST">

                        <button type="submit" class="btn btn-danger">Delete</button>
                        <button class="btn btn-primary" data-id="' . $row->id . '" onclick="window.location.href=\">Edit</button>

                        </form>
                     </td>
                    
                    </tr>
                    ';
                }
            } else {
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
