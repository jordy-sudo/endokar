<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Provincia;
use App\Models\Ciudad;

class ProvinciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $provinciasCiudades = [
            'Azuay' => ['Cuenca', 'Gualaceo', 'Camilo Ponce Enríquez', 'Paute', 'Santa Isabel', 'Chordeleg', 'Girón', 'Sígsig', 'San Fernando', 'Nabón', 'Guachapala', 'Oña', 'Pucará', 'Sevilla de Oro', 'El Pan'],
            'Bolívar' => ['Guaranda', 'San Miguel', 'Caluma', 'Echeandía', 'Chimbo', 'Chillanes', 'Las Naves'],
            'Cañar' => ['La Troncal', 'Azogues', 'Cañar', 'Biblián', 'El Tambo', 'Suscal', 'Déleg'],
            'Carchi' => ['Tulcán', 'San Gabriel', 'El Ángel', 'Huaca', 'Mira', 'Bolívar'],
            'Chimborazo' => ['Riobamba', 'Cumandá', 'Guano', 'Alausí', 'Chambo', 'Pallatanga', 'Chunchi', 'Guamote', 'Villa La Unión (Cajabamba)', 'Penipe'],
            'Cotopaxi' => ['Latacunga', 'La Maná', 'San Miguel de Salcedo', 'Pujilí', 'Saquisilí', 'Sigchos', 'El Corazón'],
            'El Oro' => ['Machala', 'Pasaje', 'Santa Rosa', 'Huaquillas', 'El Guabo', 'Arenillas', 'Piñas', 'Zaruma', 'Portovelo', 'Marcabelí', 'Balsas', 'Paccha', 'La Victoria', 'Chilla'],
            'Esmeraldas' => ['Esmeraldas', 'Rosa Zárate', 'San Lorenzo', 'Atacames', 'Muisne', 'Valdez (Limones)', 'Rioverde'],
            'Galápagos' => ['Puerto Ayora', 'Puerto Baquerizo Moreno', 'Puerto Villamil'],
            'Guayas' => ['Guayaquil', 'Durán', 'Daule', 'Milagro', 'Samborondón', 'General Villamil', 'Velasco Ibarra', 'El Triunfo', 'Naranjal', 'Naranjito', 'Balzar', 'Pedro Carbo', 'Yaguachi', 'Lomas de Sargentillo', 'Salitre', 'Balao', 'Santa Lucía', 'Palestina', 'Narcisa de Jesús', 'Simón Bolívar', 'Isidro Ayora', 'Coronel Marcelino Maridueña', 'Colimes', 'Bucay', 'Jujan'],
            'Imbabura' => ['Ibarra', 'Otavalo', 'Atuntaqui', 'Cotacachi', 'Pimampiro', 'Urcuquí'],
            'Loja' => ['Loja', 'Catamayo', 'Cariamanga', 'Macará', 'Catacocha', 'Alamor', 'Saraguro', 'Celica', 'Zapotillo', 'Pindal', 'Amaluza', 'Gonzanamá', 'Chaguarpamba', 'Quilanga', 'Sozoranga', 'Olmedo'],
            'Los Ríos' => ['Quevedo', 'Babahoyo', 'Buena Fe', 'Ventanas', 'Vinces', 'Valencia', 'Montalvo', 'Puebloviejo', 'Mocache', 'Palenque', 'Catarama', 'Baba', 'Quinsaloma'],
            'Manabí' => ['Manta', 'Portoviejo', 'Montecristi', 'Chone', 'El Carmen', 'Jipijapa', 'Jaramijó', 'Pedernales', 'Bahía de Caráquez', 'Calceta', 'Puerto López', 'Santa Ana', 'Rocafuerte', 'Tosagua', 'San Vicente', 'Flavio Alfaro', 'Paján', 'Junín', 'Sucre', 'Jama', 'Pichincha', 'Olmedo'],
            'Morona Santiago' => ['Macas', 'Sucúa', 'Gualaquiza', 'Palora', 'Gral. Leonidas Plaza Gutiérrez (Limón)', 'Santiago de Méndez', 'Taisha', 'San Juan Bosco', 'Logroño', 'Huamboya', 'Santiago', 'Pablo Sexto'],
            'Napo' => ['Tena', 'Archidona', 'El Chaco', 'Baeza', 'Carlos Julio Arosemena Tola'],
            'Orellana' => ['El Coca', 'La Joya de los Sachas', 'Loreto', 'Tiputini'],
            'Pastaza' => ['Puyo', 'Arajuno', 'Santa Clara', 'Mera'],
            'Pichincha' => ['Quito', 'Sangolquí', 'Cayambe', 'Machachi', 'Tabacundo', 'Pedro Vicente Maldonado', 'San Miguel de Los Bancos', 'Puerto Quito'],
            'Santa Elena' => ['La Libertad', 'Santa Elena', 'Salinas'],
            'Santo Domingo de los Tsáchilas' => ['Santo Domingo', 'La Concordia'],
            'Sucumbíos' => ['Nueva Loja', 'Shushufindi', 'El Dorado de Cascales', 'Lumbaqui', 'Puerto El Carmen de Putumayo', 'Tarapoa', 'La Bonita'],
            'Tungurahua' => ['Ambato', 'Baños de Agua Santa', 'Pelileo', 'Píllaro', 'Cevallos', 'Quero', 'Patate', 'Tisaleo', 'Mocha'],
            'Zamora Chinchipe' => ['Zamora', 'Yantzaza', 'El Pangui', 'Zumba', 'Zumbi', 'Guayzimi', 'Palanda', 'Yacuambi', 'Paquisha'],
        ];

        foreach ($provinciasCiudades as $nombreProvincia => $ciudades) {
            // Crear la provincia
            $provincia = Provincia::create([
                'nombre' => $nombreProvincia,
            ]);

            // Crear las ciudades para la provincia
            foreach ($ciudades as $nombreCiudad) {
                Ciudad::create([
                    'nombre' => $nombreCiudad,
                    'provincia_id' => $provincia->id,
                ]);
            }
        }
    }
}
