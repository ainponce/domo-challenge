<?php
function validator ($dni, $apellido) {
    if (empty($dni) || empty($apellido)) {
        echo json_encode(
            [
                'status' => 'error',
                'message' => 'debe completar todos los campos'
            ]
        );
        return false;
    } else if (strlen($dni) > 8) {
        echo json_encode(
            [
                'status' => 'error',
                'message' => 'el DNI no debe superar los 8 dígitos'
            ]
        );
        return false;
    } else if (!is_numeric($dni)) {
        echo json_encode(
            [
                'status' => 'error',
                'message' => 'el DNI debe contener sólo dígitos numéricos'
            ]
        );
        return false;
    } else {
        return true;
    }
}

function store ($dni, $apellido) {
    $route_db = '../db/usuarios.csv';

    if (($db = fopen($route_db, 'a+')) !== false) {
        $found = false;
        while (($fila = fgetcsv($db, 100, ';')) !== false) {
            foreach($fila as $dato) {
                if ($dato === $dni) {
                    $found = true;
                }
            }
        }
        
        if ($found === true) {
            http_response_code(400);
            echo json_encode(
                [
                    'status' => 'error',
                    'message' => 'Usuario ya existente'
                ] 
            );
        } else {
            fwrite($db,  "\n" . $dni . ";" . $apellido);
            header('Content-Type: application/json');
            http_response_code(200);
            echo json_encode(
                [
                    'status' => 'succes',
                    'message' => 'Usuario creado exitosamente'
                ]
            ); 
        }

        fclose($db);
    } else {
        echo json_encode(
            [
                'status' => 'error',
                'message' => 'error al leer la base de datos'
            ]
        );
    }
}

$dataFromBody = file_get_contents('php://input');

$data = json_decode($dataFromBody, true);
$dni = $data['dni'];
$apellido = $data['apellido'];
$data_validated = validator($dni, $apellido);

if ($data_validated === true) {
    store($dni, $apellido);
}