<?php

namespace Database\Seeders;

use App\Models\PlantCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlantCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        PlantCategory::create([
            'pc_name' => 'Cacti and succulents',
            'pc_ideal_moisture' => 30,
            'pc_wilting_point' => 10,
            'pc_description' => 'Cacti and succulents are low-maintenance plants that thrive in well-draining soil and bright, indirect sunlight. To care for them, water only when the top inch of the soil feels dry—typically every 2-3 weeks in the growing season (spring and summer) and less frequently in fall and winter. The ideal moisture level for these plants is low; they prefer to dry out between waterings to prevent root rot. Ensure they receive adequate drainage and avoid letting them sit in water, as this can lead to fungal issues.',
        ]);

        PlantCategory::create([
            'pc_name' => 'Herbs',
            'pc_ideal_moisture' => 40,
            'pc_wilting_point' => 15,
            'pc_description' => 'Herbs are versatile plants that thrive in well-draining soil and require plenty of sunlight, ideally 6-8 hours per day. To care for them, keep the soil consistently moist, watering when the top inch feels dry, usually every few days during warm months and less frequently when it’s cooler. Avoid letting the soil dry out completely, as this can lead to wilting. Regular harvesting promotes growth, so trim leaves as needed to encourage bushier plants and enjoy fresh flavors in your cooking.',
        ]);

        PlantCategory::create([
            'pc_name' => 'Foliage Plants',
            'pc_ideal_moisture' => 60,
            'pc_wilting_point' => 15,
            'pc_description' => 'Foliage plants are popular indoor choices known for their lush, vibrant leaves that enhance any space. To care for them, provide bright, indirect sunlight and keep the soil consistently moist but not waterlogged. Water the plants when the top inch of soil feels dry, usually every week or two, depending on the humidity and temperature of your environment. Be sure to allow for good drainage to prevent root rot, and regularly wipe the leaves to remove dust, promoting healthy growth and appearance. With the right care, foliage plants can thrive and add beauty to your home.',
        ]);
    }
}
