<?php




function obtenerLibros()
{
    $lista_libros = [
        [
            'titulo' => 'Cien años de soledad',
            'autor' => 'Gabriel García Márquez',
            'anio_publicacion' => 1967,
            'genero' => 'Realismo mágico',
            'descripcion' => 'La historia de la familia Buendía en el pueblo ficticio de Macondo.'
        ],
        [
            'titulo' => '1984',
            'autor' => 'George Orwell',
            'anio_publicacion' => 1949,
            'genero' => 'Distopía',
            'descripcion' => 'Una visión sombría de un futuro totalitario y opresivo.'
        ],
        [
            'titulo' => 'Orgullo y prejuicio',
            'autor' => 'Jane Austen',
            'anio_publicacion' => 1813,
            'genero' => 'Romance',
            'descripcion' => 'La historia de Elizabeth Bennet y su complicada relación con el Sr. Darcy.'
        ],
        [
            'titulo' => 'Matar a un ruiseñor',
            'autor' => 'Harper Lee',
            'anio_publicacion' => 1960,
            'genero' => 'Drama',
            'descripcion' => 'Una novela sobre la injusticia racial en el sur de Estados Unidos.'
        ],
        [
            'titulo' => 'El señor de los anillos',
            'autor' => 'J.R.R. Tolkien',
            'anio_publicacion' => 1954,
            'genero' => 'Fantasía',
            'descripcion' => 'La épica aventura de Frodo Bolsón para destruir el Anillo Único.'
        ]
    ];

    return   $lista_libros;
}

function mostrarDetallesLibro($libro)
{
    if (count($libro) > 0) {
        $detalles_libro = '';

        foreach ($libro as $data) {
            $detalles_libro .= '<tr>';
            foreach ($data as $info) {
                $detalles_libro .= " <td>$info</td>";
            }
            $detalles_libro .= '</tr>';
        }
        return $detalles_libro;
    } else {
        return "No hay libros Disponibles";
    }
}
