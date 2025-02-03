<?php

namespace App\Http\Controllers;

use http\Env\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function get_title($page_name){
        return $page_name." | ".env('APP_NAME');
    }

    public function create_response($data, $layout = 'admin.layout'): \Illuminate\Http\Response {

        return response()
            ->view($layout, ['data' => $data]);
    }

    public function create_response_data($data, $page_name, $page, $title, $menu= 'dashboard'): array
    {
        return [
            'menu' => $menu,
            'title' => $title,
            'data' => $data,
            'page_name' => $page_name,
            'page' => $page
        ];
    }

    public function create_paginaton_parameter($page, $length): array
    {
        return [
            'skip' => $length * ($page - 1),
            'take' => $length
        ];
    }

    public  function create_pagination_from_request($request): array
    {
        $page = $request->has('page') ? $request->get('page') : 1;
        $length = $request->has('length') ? $request->get('length') : 5;

        return $this->create_paginaton_parameter($page,$length);
    }

    public function data_with_pagination($data, $total, $page, $length): array
    {
        return [
            'data' => $data,
            'current_page' => $page,
            'length' => $length,
            'total' => $total,
            'total_page' => ceil($total / $length)
        ];
    }

    public function validate_input($request,$required_fields): array
    {
        foreach ($required_fields as $field) {
            if ($request->has($field) == false) {
                return [
                    'status' => false,
                    'missing_field' => $field
                ];
            }
        }

        return [
            'status' => true,
            'missing_field' => null
        ];
    }

    public function create_alert($type, $message): string
    {
        return json_encode([
            'type' => $type,
            'message' => $message
        ]);
    }
}
