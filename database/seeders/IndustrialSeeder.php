<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IndustrialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Cargar categorías
        $categorias = [
            'Petroquímica' => [
                'Plásticos y Caucho' => ['Art. de Plástico', 'Art. de Caucho', 'Neumáticos'],
                'Química Fina' => ['Polímeros Especiales', 'Catalizadores y Adhesivos', 'Tintas, Barnices y Pigmentos', 'Jabones, Detergentes y Productos para Limpiar', 'Agroquímicos', 'Cosméticos y Higiene', 'Fibras Artificiales', 'Fármacos']
            ],
            'Minería-Metal' => [
                'Metalúrgica' => ['Embalajes', 'Estructuras', 'Bigas - Planchas - Tool', 'Otros'],
                'Construcción' => ['Cerámica y Arcilla', 'Piedras', 'Mat. Prefabricados', 'Vidrios'],
                'Transporte' => ['Vehículos y Motos', 'Bicicletas y Otros', 'Aviones', 'Astilleros'],
                'Equipos Tecnológicos' => ['Computadores', 'Mouse', 'Accesorios'],
                'Industria Eléctrica-Mecánica' => ['Calderería', 'Control de Flujos', 'Equip. Mecánicos', 'Equip. Agrícola', 'Elevación y Manipul.', 'Maqui. Herramientas', 'Línea Amarilla', 'Motores y Turbinas', 'Maq. Ind. Alimentos', 'Maq. Ind. Textil', 'Otra Maq. General', 'Otra Maq. Específica', 'Equip. Eléctrico', 'Motores, Generadores y Transformadores', 'Cables', 'Pilas y Baterías', 'Paneles Eléctricos', 'Iluminación', 'Otros Equip. Elect.'],
                'Electrónicos' => ['Semiconductores y Componentes', 'Línea Marrón (TVs, Radio, etc.)', 'Ordenadoras y Teléfonos', 'Equipamientos Ópticos y de Comunicación', 'Media y Almacenamiento']
            ],
            'Agro' => [
                'Textiles' => ['Telas', 'Ropas (Vestir, Cama y Baño)', 'Alfombras, Cuerdas y Otros'],
                'Cuero' => ['Calzados', 'Vestido', 'Cuero'],
                'Madera y Muebles' => ['Madera', 'Aglomerados y Contrachapados', 'Muebles y Carpintería', 'Pallets, Embalajes'],
                'Insumos de Oficina' => ['Impresoras, Hojas, Cuadernos, Esferos', 'Tintas', 'Cartón', 'Artículos de Papel, Etc']
            ]
        ];

        foreach ($categorias as $nombreCategoria => $subcategorias) {
            $categoria = CategoriaIndustrial::create(['nombre' => $nombreCategoria]);

            foreach ($subcategorias as $nombreSubcategoria => $elementos) {
                $subcategoria = $categoria->subcategorias()->create(['nombre' => $nombreSubcategoria]);

                foreach ($elementos as $nombreElemento) {
                    $subcategoria->elementos()->create(['nombre' => $nombreElemento]);
                }
            }
        }
    }
}
